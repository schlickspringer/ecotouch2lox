<?php

// tested with Waterkotte WWPR2

define(WK_IP, ""); // ip address of Waterkotte heat pump
define(WK_USER, 'waterkotte'); // username of web interface
define(WK_PWD, 'waterkotte'); // password of web interface

define(WK_SESSION_FILE, '/tmp/wk_token.tmp'); // used to save and reuse the session if possible

define(LOXONE_IP, ''); // ip address of Loxone Miniserver
define(LOXONE_USER, ''); // Loxone username
define(LOXONE_PWD, ''); // Loxone password

// specify the virtual input for each ecotouch tag you're interested in
$lox_vi['TEMPERATURE_OUTSIDE'] = "VI3";
$lox_vi['TEMPERATURE_OUTSIDE_1H'] = "VI4";
$lox_vi['TEMPERATURE_OUTSIDE_24H'] = "VI5";
$lox_vi['TEMPERATURE_SOURCE_IN'] = "VI6";
$lox_vi['TEMPERATURE_SOURCE_OUT'] = "VI7";
$lox_vi['TEMPERATURE_EVAPORATION'] = "VI8";
$lox_vi['TEMPERATURE_RETURN_SET'] = "VI9";
$lox_vi['TEMPERATURE_RETURN'] = "VI10";
$lox_vi['TEMPERATURE_FLOW'] = "VI11";

?>