<?php

class EcoTouchReader {
	
	private $IDALToken = null;
	public $tags = null;
	
	public function __construct() {
		$this->getToken();
	}
	
	private function getToken() {
		$ch = curl_init('http://' . WK_IP . '/cgi/login?username=' . WK_USER . '&password=' . WK_PWD);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		if (preg_match("/[a-f0-9]{32}/", $response, $match)) {
			$this->IDALToken = $match[0];
			return true;
		} else {
			throw new Exception('unable to connect to heat pump: ' . $response);
			return false;
		}
	}
	
	public function readAllTags() {
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		$t=1;
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
			if ($this->getToken()) {
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