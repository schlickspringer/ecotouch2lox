<?php

include("EcoTouchTags.class.php");
include("EcoTouchReader.class.php");
include("config.php");

try {
	$ecotouch = new EcoTouchReader();
	if ($_GET['writeTag'] == 1) {
		if ($return = $ecotouch->writeTag($_GET['t1'], $_GET['v1'])) {
			echo $return;
		} else {
			echo 'unable to write EcoTouch tag.';
		}
	} else {
		if ($ecotouch->readAllTags()) {
			echo json_encode($ecotouch->tags);
		} else {
			echo 'unable to read EcoTouch tags.';
		}
	}
} catch (Exception $e) {
	echo $e;
}


http://192.168.3.66/cgi/writeTags?returnValue=true&n=1&t1=A32&v1=160&_=1505740236189'


?>