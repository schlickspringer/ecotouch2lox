<?php

include("EcoTouchTags.class.php");
include("EcoTouchReader.class.php");
include("config.php");

$ecotouch = new EcoTouchReader();
if ($ecotouch->readAllTags()) {
	echo json_encode($ecotouch->tags);
} else {
	echo 'unable to read EcoTouch tags.';
}

?>