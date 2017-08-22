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
$lox_vi['temperature_outside'] = "VI3";
$lox_vi['temperature_outside_1h'] = "VI4";
$lox_vi['temperature_outside_24h'] = "VI5";
$lox_vi['temperature_source_in'] = "VI6";
$lox_vi['temperature_source_out'] = "VI7";
$lox_vi['temperature_evaporation'] = "VI8";
$lox_vi['temperature_return_set'] = "VI9";
$lox_vi['temperature_return'] = "VI10";
$lox_vi['temperature_flow'] = "VI11";

?>