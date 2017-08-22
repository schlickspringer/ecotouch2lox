<?php

class EcoTouchReader {
	
	private $IDALToken = null;
	private $tags = null;
	
	public function __construct() {
		if (file_exists(WK_SESSION_FILE)) {
			$this->IDALToken = unserialize(file_get_contents(WK_SESSION_FILE));
		} else {
			$this->getToken();
		}
	}
	
	private function getToken() {
		$ch = curl_init('http://' . WK_IP . '/cgi/login?username=' . WK_USER . '&password=' . WK_PWD);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		if (preg_match("/[a-f0-9]{32}/", $response, $match)) {
			$this->IDALToken = $match[0];
			file_put_contents(WK_SESSION_FILE, serialize($this->IDALToken));
			return true;
		} else {
			throw new Exception('unable to connect to heat pump: ' . $response);
			return false;
		}
	}
	
	public function readTags($tags = array()) {
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		$t=1;
		if (count($tags) == 0) {
			throw new Exception('No EcoTouch tags to be read specified.');
			return false;
		}
		foreach ($tags as $k => $tag) {
			if ($this->isValidTag($k)) {
				$parms .= "&t" . $t . "=" . $ecotags[$k]['tagName'];
				$t++;
			}
		}
		$n = count($tags);
		$ch = curl_init('http://' . WK_IP . '/cgi/readTags?n=' . $n . $parms);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIE, 'IDALToken='. $this->IDALToken);
		$response = curl_exec($ch);
		curl_close($ch);
		if (preg_match("/E_TOO_MANY_USERS/", $response)) {
			throw new Exception('TOO MANY USERS. TRY AGAIN LATER.');
			return false;
		} elseif (preg_match("/E_NEED_LOGIN/", $response)) {
			if ($this->getToken()) {
				$ch = curl_init('http://' . WK_IP . '/cgi/readTags?n=' . $n . $parms);
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
					if ($desc['tagName'] == $match[1]) {
						$this->tags[$i] = new \stdClass();
						$this->tags[$i]->tagName = $desc['tagName'];
						$this->tags[$i]->name = $desc['name'];
						if ($desc['class'] == 'number' && !$desc['divisor']) {
							$this->tags[$i]->value = $match[3]/10;
						} else {
							$this->tags[$i]->value = $match[3];
						}
					}
				}
			}
			$i++;
		}
		return true;		
	}
	
	private function isValidTag($tag) {
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		if (array_key_exists($tag, $ecotags)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getTagByName($tag) {
		if ($this->isValidTag($tag)) {
			foreach ($this->tags as $t) {
				if (strtolower($t->name) == strtolower($tag)) return $t;
			}
			throw new Exception('Tag not found: ' . $tag);
			return false;
		} else {
			throw new Exception('Incorrect tag specified: ' . $tag);
			return false;
		}
	}
	
}

?>