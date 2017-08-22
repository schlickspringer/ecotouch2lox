<?php

include("EcoTouchTags.class.php");
include("EcoTouchReader.class.php");
include("config.php");

$ecotouch = new EcoTouchReader();
$response = $ecotouch->readAllTags($lox_vi);

foreach ($lox_vi as $tag => $vi) {
	$lox_url = 'http://' . LOXONE_USER . ':' . LOXONE_PWD . '@' . LOXONE_IP . '/dev/sps/io/' . $vi . '/' . $ecotouch->getTagByName($tag)->value;
	$ch = curl_init($lox_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	if (!preg_match("/Code=\"200\"/", $response)) {
		echo "Request to Loxone Miniserver at $lox_url failed. Reponse: $response\n";
	}
	curl_close($ch);
}

?>