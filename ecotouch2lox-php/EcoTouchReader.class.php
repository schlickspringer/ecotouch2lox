<?php

class EcoTouchReader {
	
	private $IDALToken = null;
	
	public function __construct() {
		if (file_exists(WK_SESSION_FILE) && WK_USE_SESSION) {
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
			if (WK_USE_SESSION) file_put_contents(WK_SESSION_FILE, serialize($this->IDALToken));
			return true;
		} else {
			throw new Exception('unable to connect to heat pump: ' . $response);
			return false;
		}
	}
	
	public function readTags() {
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
				return $response;
			} else {
				throw new Exception('UNABLE TO GET TOKEN.');
				return false;
			}
		} else {
			return $response;
		}
	}	
	
}

?>