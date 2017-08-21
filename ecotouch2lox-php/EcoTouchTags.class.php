<?php

abstract class EcoTouchTags {
	
	// Aussentemperatur
	const A1 = array('name' => 'temperature_outside', 'class' => 'number');
	
	// Aussentemperatur gemittelt ueber 1h
	const A2 = array('name' => 'temperature_outside_1h', 'class' => 'number');
	
	// Aussentemperatur gemittelt ueber 24h
	const A3 = array('name' => 'temperature_outside_24h', 'class' => 'number'); 
	
	// Quelleneintrittstemperatur
	const A4 = array('name' => 'temperature_source_in', 'class' => 'number'); 
	
	// Quellenaustrittstemperatur
	const A5 = array('name' => 'temperature_source_out', 'class' => 'number'); 
	
	// Verdampfungstemperatur
	const A6 = array('name' => 'temperature_evaporation', 'class' => 'number'); 
	
	// Sauggastemperatur
	const A7 = array('name' => 'temperature_suction', 'class' => 'number'); 
	
	// Verdampfungsdruck
	const A8 = array('name' => 'pressure_evaporation', 'class' => 'number'); 
	
	// Temperatur Ruecklauf Soll
	const A10 = array('name' => 'temperature_return_set', 'class' => 'number'); 
	
	// Temperatur Ruecklauf
	const A11 = array('name' => 'temperature_return', 'class' => 'number'); 
	
	// Temperatur Vorlauf
	const A12 = array('name' => 'temperature_flow', 'class' => 'number'); 
	
	// Kondensationstemperatur
	const A14 = array('name' => 'temperature_condensation', 'class' => 'number');

	// more to follow
	
}

?>