<?php

class EcoTouchReader {
	
	private $IDALToken = null;
	public $tags = null;
	
	public function __construct() {
		$this->getToken();
	}
	
	private function getToken($refresh = false) {
		if ($refresh === true) {
			unlink(sys_get_temp_dir() . '/ecotouch2lox-php-token.txt');
		} else {
			if (file_exists(sys_get_temp_dir() . '/ecotouch2lox-php-token.txt')) {
				$this->IDALToken = file_get_contents(sys_get_temp_dir() . '/ecotouch2lox-php-token.txt');
			}
			return true;
		}
		$ch = curl_init('http://' . WK_IP . '/cgi/login?username=' . WK_USER . '&password=' . WK_PWD);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		if (preg_match("/[a-f0-9]{32}/", $response, $match)) {
			$this->IDALToken = $match[0];
			file_put_contents(sys_get_temp_dir() . '/ecotouch2lox-php-token.txt', $this->IDALToken);
			return true;
		} else {
			throw new Exception('unable to connect to heat pump: ' . $response);
			return false;
		}
	}
	
	public function writeTag($tagName, $tagValue) {
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		$tagFound = false;
		foreach ($ecotags as $tag => $desc) {
			if ($desc['tagName'] == $tagName && $desc['class'] == 'switch') {
				$tagValue *= $desc['divisor'];
				$tagFound = true;
			}
		}
		if ($tagFound === true) {
			$ch = curl_init('http://' . WK_IP . '/cgi/writeTags?returnValue=true&n=1&t1=' . $tagName . '&v1=' . $tagValue);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_COOKIE, 'IDALToken='. $this->IDALToken);
			$response = curl_exec($ch);
			curl_close($ch);
			if (preg_match('/S_OK/', $response)) {
				return $response;
			} else {
				return false;
			}
		} else {
			throw new Exception("The given tag $tagName is not known. Request has not been sent to EcoTouch.");
			return false;
		}
	}
	
	public function readAllTags() {
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		$t = 1;
		$parms = '';
		foreach ($ecotags as $k => $tag) {
			if ($tag['class'] == 'number') {
				$parms .= "&t" . $t . "=" . $tag['tagName'];
				$t++;
			}
		}
		$ch = curl_init('http://' . WK_IP . '/cgi/readTags?n=' . $t . $parms);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIE, 'IDALToken='. $this->IDALToken);
		$response = curl_exec($ch);
		curl_close($ch);
		if (preg_match("/E_TOO_MANY_USERS/", $response)) {
			throw new Exception('TOO MANY USERS. TRY AGAIN LATER.');
			return false;
		} elseif (preg_match("/E_NEED_LOGIN/", $response)) {
			if ($this->getToken(true)) {
				$ch = curl_init('http://' . WK_IP . '/cgi/readTags?n=' . $t . $parms);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_COOKIE, 'IDALToken='. $this->IDALToken);
				$response = curl_exec($ch);
				curl_close($ch);
			} else {
				throw new Exception('UNABLE TO GET TOKEN.');
				return false;
			}
		}
		$lines = explode("#", $response);
		$i=0;
		foreach ($lines as $line) {
			$line = "#" . $line;
			if (preg_match("/#(.+)\\s+S_OK[^0-9-]+([0-9-]+)\\s+([0-9-]+)/", $line, $match)) {
				foreach ($ecotags as $tag => $desc) {
					if ($desc['tagName'] == $match[1] && $desc['class'] == 'number') {
						$this->tags[$i] = new \stdClass();
						$this->tags[$i]->tagName = $desc['tagName'];
						$this->tags[$i]->name = $desc['name'];
						if ($desc['class'] == 'number' && !isset($desc['divisor'])) {
							$this->tags[$i]->value = intval($match[3])/10;
						} elseif (is_numeric($desc['divisor'])) {
							$this->tags[$i]->value = intval($match[3])/$desc['divisor'];
						} else {
							$this->tags[$i]->value = intval($match[3]);
						}
					}
				}
			}
			$i++;
		}
		return true;		
	}
		
}

?>