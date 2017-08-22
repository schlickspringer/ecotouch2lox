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
	
	public function readAllTags() {
		$refl = new ReflectionClass('EcoTouchTags');
		$tags = $refl->getConstants();
		$t=1;
		foreach ($tags as $tag => $desc) {
			$parms .= "&t" . $t . "=" . $tag;
			$t++;
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
				foreach ($tags as $tag => $desc) {
					if ($tag == $match[1]) {
						$this->tags[$i] = new \stdClass();
						$this->tags[$i]->tag = $tag;
						$this->tags[$i]->name = $desc['name'];
						if ($desc['class'] == 'number') {
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
	
	public function getTagById($tag) {
		if ($this->_tags == null) $this->readAllTags();
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		if (array_key_exists($tag, $ecotags)) {
			foreach ($this->tags as $t) {
				if ($t->tag == $tag) return $t;
			}
			throw new Exception('Tag not found: ' . $tag);
			return false;
		} else {
			throw new Exception('Incorrect tag specified: ' . $tag);
		}
	}
	
	public function getTagByName($tag_name) {
		if ($this->_tags == null) $this->readAllTags();
		$refl = new ReflectionClass('EcoTouchTags');
		$ecotags = $refl->getConstants();
		foreach ($ecotags as $et) {
			if ($et['name'] == $tag_name) {
				foreach ($this->tags as $t) {
					if ($t->name == $et['name']) return $t;
				}
			}
		}
		throw new Exception('Tag not found: ' . $tag_name);
		return false;
	}
}

?>