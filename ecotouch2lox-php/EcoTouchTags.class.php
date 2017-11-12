<?php

abstract class EcoTouchTags {
	
	// Aussentemperatur
	const TEMPERATURE_OUTSIDE = array('tagName' => 'A1', 'name' => "temperature_outside", 'class' => 'number');
	
	// Aussentemperatur gemittelt ueber 1h
	const TEMPERATURE_OUTSIDE_1H = array('tagName' => 'A2', 'name' => "temperature_outside_1h", 'class' => 'number');
	
	// Aussentemperatur gemittelt ueber 24h
	const TEMPERATURE_OUTSIDE_24H = array('tagName' => 'A3', 'name' => "temperature_outside_24h", 'class' => 'number'); 
	
	// Quelleneintrittstemperatur
	const TEMPERATURE_SOURCE_IN = array('tagName' => 'A4', 'name' => "temperature_source_in", 'class' => 'number'); 
	
	// Quellenaustrittstemperatur
	const TEMPERATURE_SOURCE_OUT = array('tagName' => 'A5', 'name' => "temperature_source_out", 'class' => 'number'); 
	
	// Verdampfungstemperatur
	const TEMPERATURE_EVAPORATION = array('tagName' => 'A6', 'name' => "temperature_evaporation", 'class' => 'number'); 
	
	// Sauggastemperatur
	const TEMPERATURE_SUCTION = array('tagName' => 'A7', 'name' => "temperature_suction", 'class' => 'number'); 
	
	// Verdampfungsdruck
	const PRESSURE_EVAPORATION = array('tagName' => 'A8', 'name' => "pressure_evaporation", 'class' => 'number'); 
	
	// Temperatur Ruecklauf Soll
	const TEMPERATURE_RETURN_SET = array('tagName' => 'A10', 'name' => "temperature_return_set", 'class' => 'number'); 
	
	// Temperatur Ruecklauf
	const TEMPERATURE_RETURN = array('tagName' => 'A11', 'name' => "temperature_return", 'class' => 'number'); 
	
	// Temperatur Vorlauf
	const TEMPERATURE_FLOW = array('tagName' => 'A12', 'name' => "temperature_flow", 'class' => 'number'); 
	
	// Kondensationstemperatur
	const TEMPERATURE_CONDENSATION = array('tagName' => 'A14', 'name' => "temperature_condensation", 'class' => 'number');

	// Kondensationsdruck
	const PRESSURE_CONDENSATION = array('tagName' => 'A15', 'name' => "pressure_condensation", 'class' => 'number');

	// Speichertemperatur
	const TEMPERATURE_STORAGE = array('tagName' => 'A16', 'name' => "temperature_storage", 'class' => 'number');
	
	// Raumtemperatur
	const TEMPERATURE_ROOM = array('tagName' => 'A17', 'name' => "temperature_room", 'class' => 'number');

	// Raumtemperatur gemittelt über 1h
	const TEMPERATURE_ROOM_1H = array('tagName' => 'A18', 'name' => "temperature_room_1h", 'class' => 'number');
	
	// Warmwassertemperatur
	const TEMPERATURE_WATER = array('tagName' => 'A19', 'name' => "temperature_water", 'class' => 'number');
	
	// Pooltemperatur
	const TEMPERATURE_POOL = array('tagName' => 'A20', 'name' => "temperature_pool", 'class' => 'number');
	
	// Solarkollektortemperatur
	const TEMPERATURE_SOLAR = array('tagName' => 'A21', 'name' => "temperature_solar", 'class' => 'number');
	
	// Solarkreis Vorlauf
	const TEMPERATURE_SOLAR_FLOW = array('tagName' => 'A22', 'name' => "temperature_solar_flow", 'class' => 'number');
	
	// Ventilöffnung elektrisches Expansionsventil
	const POSITION_EXPANSION_VALVE = array('tagName' => 'A23', 'name' => "position_expansion_valve", 'class' => 'number');
	
	// elektrische Leistung Verdichter
	const POWER_COMPRESSOR = array('tagName' => 'A25', 'name' => "power_compressor", 'class' => 'number');
	
	// abgegebene thermische Heizleistung der Wärmepumpe
	const POWER_HEATING = array('tagName' => 'A26', 'name' => "power_heating", 'class' => 'number');
	
	// abgegebene thermische KälteLeistung der Wärmepumpe
	const POWER_COOLING = array('tagName' => 'A27', 'name' => "power_cooling", 'class' => 'number');
	
	// COP Heizleistung
	const COP_HEATING = array('tagName' => 'A28', 'name' => "cop_heating", 'class' => 'number');
	
	// COP Kälteleistungleistung
	const COP_COOLING = array('tagName' => 'A29', 'name' => "cop_cooling", 'class' => 'number');
	
	// Aktuelle Heizkreistemperatur
	const TEMPERATURE_HEATING_RETURN = array('tagName' => 'A30', 'name' => "temperature_heating_return", 'class' => 'number');
	
	// Geforderte Temperatur im Heizbetrieb
	const TEMPERATURE_HEATING_SET = array('tagName' => 'A31', 'name' => "temperature_heating_set", 'class' => 'number');
	
	// Sollwertvorgabe Heizkreistemperatur
	const TEMPERATURE_HEATING_SET2 = array('tagName' => 'A32', 'name' => "temperature_heating_set2", 'class' => 'number', 'divisor' => 10);

	// Sollwertvorgabe Heizkreistemperatur
	const TEMPERATURE_HEATING_SET3 = array('tagName' => 'A32', 'name' => "temperature_heating_set2", 'class' => 'switch', 'divisor' => 10);
	
	// Aktuelle Kühlkreistemperatur
	const TEMPERATURE_COOLING_RETURN = array('tagName' => 'A33', 'name' => "temperature_cooling_return", 'class' => 'number');
	
	// Geforderte Temperatur im Kühlbetrieb
	const TEMPERATURE_COOLING_SET = array('tagName' => 'A34', 'name' => "temperature_cooling_set", 'class' => 'number');
	
	// Sollwertvorgabe Kühlbetrieb
	const TEMPERATURE_COOLING_SET2 = array('tagName' => 'A35', 'name' => "temperature_cooling_set2", 'class' => 'number');
	
	// Geforderte Warmwassertemperatur
	const TEMPERATURE_WATER_SET = array('tagName' => 'A37', 'name' => "temperature_water_set", 'class' => 'number');
	
	// Sollwertvorgabe Warmwassertemperatur
	const TEMPERATURE_WATER_SET2 = array('tagName' => 'A38', 'name' => "temperature_water_set2", 'class' => 'number');
	
	// Sollwert Poolwassertemperatur
	const TEMPERATURE_POOL_SET = array('tagName' => 'A40', 'name' => "temperature_pool_set", 'class' => 'number');
	
	// Sollwertvorgabe Poolwassertemperatur
	const TEMPERATURE_POOL_SET2 = array('tagName' => 'A41', 'name' => "temperature_pool_set2", 'class' => 'number');
	
	// geforderte Verdichterleistung
	const COMPRESSOR_POWER = array('tagName' => 'A50', 'name' => "compressor_power", 'class' => 'number');
	
	// % Heizungsumwälzpumpe
	const PERCENT_HEAT_CIRC_PUMP = array('tagName' => 'A51', 'name' => "percent_heat_circ_pump", 'class' => 'number');
	
	// % Quellenpumpe
	const PERCENT_SOURCE_PUMP = array('tagName' => 'A52', 'name' => "percent_source_pump", 'class' => 'number');
	
	// % Leistung Verdichter
	const PERCENT_COMPRESSOR = array('tagName' => 'A58', 'name' => "percent_compressor", 'class' => 'number');
	
	// Hysterese Heizung
	const HYSTERESIS_HEATING = array('tagName' => 'A61', 'name' => "hysteresis_heating", 'class' => 'number');
	
	// Außentemperatur gemittelt über 1h (scheinbar identisch zu A2)
	const TEMPERATURE2_OUTSIDE_1H = array('tagName' => 'A90', 'name' => "temperature2_outside_1h", 'class' => 'number');
	
	// Heizkurve - nviNormAussen
	const NVINORMAUSSEN = array('tagName' => 'A91', 'name' => "nviNormAussen", 'class' => 'number');
	
	// Heizkurve - nviHeizkreisNorm
	const NVIHEIZKREISNORM = array('tagName' => 'A92', 'name' => "nviHeizkreisNorm", 'class' => 'number');
	
	// Heizkurve - nviTHeizgrenze
	const NVITHEIZGRENZE = array('tagName' => 'A93', 'name' => "nviTHeizgrenze", 'class' => 'number');
	
	// Heizkurve - nviTHeizgrenze
	const NVITHEIZGRENZESOLL = array('tagName' => 'A94', 'name' => "nviTHeizgrenzeSoll", 'class' => 'number');
	
	// Grenze für Vorlaufsolltemperatur (max.)
	const MAXVLTEMP = array('tagName' => 'A95', 'name' => "maxVLTemp", 'class' => 'number', 'divisor' => 10);

	// Grenze für Vorlaufsolltemperatur (max.)
	const MAXVLTEMP_SET = array('tagName' => 'A95', 'name' => "maxVLTemp_set", 'class' => 'switch', 'divisor' => 10);
	
	// undokumentiert: Heizkreis Soll-Temp bei 0° Aussen
	const TEMPSET0DEG = array('tagName' => 'A97', 'name' => "tempSet0Deg", 'class' => 'number');

	// Grenze für Vorlaufsolltemperatur (min.)
	const MINVLTEMP = array('tagName' => 'A104', 'name' => "minVLTemp", 'class' => 'number', 'divisor' => 10);

	// Grenze für Vorlaufsolltemperatur (min.)
	const MINVLTEMP_SET = array('tagName' => 'A104', 'name' => "minVLTemp_set", 'class' => 'switch', 'divisor' => 10);
	
	// undokumentiert: Kühlen Einschalt-Temp. Aussentemp (??)
	const COOLENABLETEMP = array('tagName' => 'A108', 'name' => "coolEnableTemp", 'class' => 'number');
	
	// Heizkurve - nviSollKuehlen
	const NVISOLLKUEHLEN = array('tagName' => "nviSollKuehlen", 'class' => 'number');
	
	// Temperaturveränderung Heizkreis bei PV-Ertrag
	const TEMPCHANGE_HEATING_PV = array('tagName' => "tempchange_heating_pv", 'class' => 'number');
	
	// Temperaturveränderung Kühlkreis bei PV-Ertrag
	const TEMPCHANGE_COOLING_PV = array('tagName' => 'A683', 'name' => "tempchange_cooling_pv", 'class' => 'number');
	
	// Temperaturveränderung Warmwasser bei PV-Ertrag
	const TEMPCHANGE_WARMWATER_PV = array('tagName' => 'A684', 'name' => "tempchange_warmwater_pv", 'class' => 'number');
	
	// Temperaturveränderung Pool bei PV-Ertrag
	const TEMPCHANGE_POOL_PV = array('tagName' => 'A685', 'name' => "tempchange_pool_pv", 'class' => 'number');
	
	// Frostschutztemperatur
	const ANTIFREEZETEMP = array('tagName' => 'A1231', 'name' => "antifreeze_temp", 'class' => 'number');
	
	// undokumentiert: Firmware-Version Regler
	const VERSION_CONTROLLER = array('tagName' => 'I1', 'name' => "version_controller", 'class' => 'number', 'type' => 'word');
	
	// undokumentiert: Firmware-Build Regler
	const VERSION_CONTROLLER_BUILD = array('tagName' => 'I2', 'name' => "version_controller_build", 'class' => 'number', 'type' => 'word');
	
	// undokumentiert: BIOS-Version
	const VERSION_BIOS = array('tagName' => 'I3', 'name' => "version_bios", 'class' => 'number', 'type' => 'word');

	// undokumentiert: Datum: Tag
	const DATE_DAY = array('tagName' => 'I5', 'name' => "date_day", 'class' => 'number', 'type' => 'word');

	// undokumentiert: Datum: Monat
	const DATE_MONTH = array('tagName' => 'I6', 'name' => "date_month", 'class' => 'number', 'type' => 'word');

	// undokumentiert: Datum: Jahr
	const DATE_YEAR = array('tagName' => 'I7', 'name' => "date_year", 'class' => 'number', 'type' => 'word');

	// undokumentiert: Uhrzeit: Stunde
	const TIME_HOUR = array('tagName' => 'I8', 'name' => "time_hour", 'class' => 'number', 'type' => 'word');
	
	// undokumentiert: Uhrzeit: Minute
	const TIME_MINUTE = array('tagName' => 'I9', 'name' => "time_minute", 'class' => 'number', 'type' => 'word');
	
	// Betriebsstunden Verdichter 1
	const OPERATING_HOURS_COMPRESSOR1 = array('tagName' => 'I10', 'name' => "operating_hours_compressor1", 'class' => 'number', 'type' => 'word');

	// Betriebsstunden Verdichter 2
	const OPERATING_HOURS_COMPRESSOR2 = array('tagName' => 'I14', 'name' => "operating_hours_compressor2", 'class' => 'number', 'type' => 'word');

	// Betriebsstunden Heizungsumwälzpumpe
	const OPERATING_HOURS_CIRCULATION_PUMP = array('tagName' => 'I18', 'name' => "operating_hours_circulation_pump", 'class' => 'number', 'type' => 'word');
	
	// Betriebsstunden Quellenpumpe
	const OPERATING_HOURS_SOURCE_PUMP = array('tagName' => 'I20', 'name' => "operating_hours_source_pump", 'class' => 'number', 'type' => 'word');
	
	// Betriebsstunden Solarkreis
	const OPERATING_HOURS_SOLAR = array('tagName' => 'I22', 'name' => "operating_hours_solar", 'class' => 'number', 'type' => 'word');

	// Betriebsmodus Heizung
	// 0: Aus, 1: Auto, 2: Manuell
	const HEATING_MODE = array('tagName' => 'I30', 'name' => "heating_mode", 'class' => 'number', 'divisor' => false);
	
	// Handabschaltung Heizbetrieb
	const ENABLE_HEATING = array('tagName' => 'I30', 'name' => "enable_heating", 'class' => 'switch', 'type' => 'word');

	// Betriebsmodus Kühlen
	// 0: Aus, 1: Auto, 2: Manuell
	const COOLING_MODE = array('tagName' => 'I31', 'name' => "cooling_mode", 'class' => 'number', 'divisor' => false);
	
	// Handabschaltung Kühlbetrieb
	const ENABLE_COOLING = array('tagName' => 'I31', 'name' => "enable_cooling", 'class' => 'switch', 'type' => 'word');

	// Betriebsmodus Warmwasser
	// 0: Aus, 1: Auto, 2: Manuell
	const WARMWATER_MODE = array('tagName' => 'I32', 'name' => "warmwater_mode", 'class' => 'number', 'divisor' => false);
	
	// Handabschaltung Warmwasserbetrieb
	const ENABLE_WARMWATER = array('tagName' => 'I32', 'name' => "enable_warmwater", 'class' => 'switch', 'type' => 'word');

	// Handabschaltung Pool_Heizbetrieb
	const ENABLE_POOL = array('tagName' => 'I33', 'name' => "enable_pool", 'class' => 'switch', 'type' => 'word');
	
	// undokumentiert: vermutlich Betriebsmodus PV 0=Aus, 1=Auto, 2=Ein
	const ENABLE_PV = array('tagName' => 'I41', 'name' => "enable_pv", 'class' => 'number', 'type' => 'word');
	
	const STATE = array('tagName' => 'I51', 'name' => "state", 'class' => 'number', 'type' => 'word');
	
	// Status der Wärmepumpenkomponenten: Quellenpumpe
	const STATE_SOURCEPUMP = array('tagName' => 'I51', 'name' => "state_sourcepump", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 0);
	
	// Status der Wärmepumpenkomponenten: Heizungsumwälzpumpe
	const STATE_HEATINGPUMP = array('tagName' => 'I51', 'name' => "state_heatingpump", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 1);

	// Status der Wärmepumpenkomponenten: Freigabe Regelung EVD / Magnetventil
	const STATE_EVD = array('tagName' => 'I51', 'name' => "state_evd", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 2);

	// Status der Wärmepumpenkomponenten: Verdichter 1
	const STATE_COMPRESSOR1 = array('tagName' => 'I51', 'name' => "state_compressor1", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 3);
	
	// Status der Wärmepumpenkomponenten: Verdichter 2
	const STATE_COMPRESSOR2 = array('tagName' => 'I51', 'name' => "state_compressor2", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 4);
	
	// Status der Wärmepumpenkomponenten: externer Wärmeerzeuger
	const STATE_EXTHEATER = array('tagName' => 'I51', 'name' => "state_extheater", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 5);
	
	// Status der Wärmepumpenkomponenten: Alarmausgang
	const STATE_ALARM = array('tagName' => 'I51', 'name' => "state_alarm", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 6);
	
	// Status der Wärmepumpenkomponenten: Motorventil Kühlbetrieb
	const STATE_COOLING = array('tagName' => 'I51', 'name' => "state_cooling", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 7);

	// Status der Wärmepumpenkomponenten: Motorventil Warmwasser
	const STATE_WATER = array('tagName' => 'I51', 'name' => "state_water", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 8);

	// Status der Wärmepumpenkomponenten: Motorventil Pool
	const STATE_POOL = array('tagName' => 'I51', 'name' => "state_pool", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 9);

	// Status der Wärmepumpenkomponenten: Solarbetrieb
	const STATE_SOLAR = array('tagName' => 'I51', 'name' => "state_solar", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 10);

	// Status der Wärmepumpenkomponenten: 4-Wegeventil im Kältekreis
	const STATE_COOLING4WAY = array('tagName' => 'I51', 'name' => "state_cooling4way", 'class' => 'switch', 'type' => 'bitfield', 'bitnum' => 11);
	
	// Meldungen von Ausfällen F0xx die zum Wärmepumpenausfall führen
	// Bit 0: F100: Motorschutzschalter 1 
	// Bit 1: F101: Motorschutzschalter 2 
	// Bit 2: F102: Phasenfehler
	// Bit 3: F103: Primärseite
	// Bit 4: F110: HD-Pressostat
	// Bit 5: F120: ND-Pressostat
	// Bit 6: F121: Drucküberwachung Verdampfer
	// Bit 7: F122: Temperaturüberwachung Verdampfer 
	// Bit 8: F123: Nasslauf
	// Bit 9: F111: Ausfall Verflüssigungstemperatur zu niedrig 
	// Bit 10: F104: Störung Sekundärseite
	// Bit 11: F105: Motorschutzschalter 3
	// Bit 12: F130: Ausfall 4-Wege-Ventil
	// Bit 13: -
	// Bit 14: Kommunikationstrigger
	// Bit 15: Fxxx: Sammelmeldung
	const ALARM = array('tagName' => 'I52', 'name' => "alarm", 'class' => 'number', 'type' => 'word');
	
	// Unterbrechungen
	const INTERRUPTIONS = array('tagName' => 'I53', 'name' => "interruptions", 'class' => 'number', 'type' => 'word');

	// Serviceebene (0: normal, 1: service)
	const STATE_SERVICE = array('tagName' => 'I135', 'name' => "state_service", 'class' => 'number', 'type' => 'word');

	// Temperaturanpassung für die Heizung	
	// value range 0..8 => -2K .. +2K
	const ADAPT_HEATING = array('tagName' => 'I263', 'name' => "adapt_heating", 'class' => 'number', 'type' => 'word');

	// Heizungsregelung
	// 0: Witterungsgeführt, 1: Sollwertvorgabe, 2: Sollwertvorgabe BMS, 3: Sollwertvorgabe EXT, 4: Sollwertvorgabe 0-10V
	const HEATING_CONTROL = array('tagName' => 'I265', 'name' => "heating_control", 'class' => 'number', 'type' => 'word', 'divisor' => false);
	
	// Handschaltung Heizungspumpe (H-0-A)
	// H:Handschaltung Ein 0:Aus A:Automatik
	// Kodierung: 0:? 1:? 2:Automatik
	const MANUAL_HEATINGPUMP = array('tagName' => 'I1270', 'name' => "manual_heatingpump", 'class' => 'number', 'type' => 'word');
	
	const MANUAL_HEATINGPUMP_SET = array('tagName' => 'I1270', 'name' => "manual_heatingpump_set",  'class' => 'switch', 'divisor' => 10);
	
	// Handschaltung Quellenpumpe (H-0-A)
	const MANUAL_SOURCEPUMP = array('tagName' => 'I1281', 'name' => "manual_sourcepump", 'class' => 'number', 'type' => 'word');

	// Handschaltung Solarpumpe 1 (H-0-A)	
	const MANUAL_SOLARPUMP1 = array('tagName' => 'I1287', 'name' => "manual_solarpump1", 'class' => 'number', 'type' => 'word');

	// Handschaltung Solarpumpe 2 (H-0-A)
	const MANUAL_SOLARPUMP2 = array('tagName' => 'I1289', 'name' => "manual_solarpump2", 'class' => 'number', 'type' => 'word');

	// Handschaltung Speicherladepumpe (H-0-A)
	const MANUAL_TANKPUMP = array('tagName' => 'I1291', 'name' => "manual_tankpump", 'class' => 'number', 'type' => 'word');

	// Handschaltung Brauchwasserventil (H-0-A)	
	const MANUAL_VALVE = array('tagName' => 'I1293', 'name' => "manual_valve", 'class' => 'number', 'type' => 'word');

	// Handschaltung Poolventil (H-0-A)	
	const MANUAL_POOLVALVE = array('tagName' => 'I1295', 'name' => "manual_poolvalve", 'class' => 'number', 'type' => 'word');

	// Handschaltung Kühlventil (H-0-A)
	const MANUAL_COOLVALVE = array('tagName' => 'I1297', 'name' => "manual_coolvalve", 'class' => 'number', 'type' => 'word');

	// Handschaltung Vierwegeventil (H-0-A)	
	const MANUAL_4WAYVALVE = array('tagName' => 'I1299', 'name' => "manual_4wayvalve", 'class' => 'number', 'type' => 'word');

	// Handschaltung Multiausgang Ext. (H-0-A)	
	const MANUAL_MULTIEXT = array('tagName' => 'I1319', 'name' => "manual_multiext", 'class' => 'number', 'type' => 'word');

	// Umgebung
	const TEMPERATURE_SURROUNDING = array('tagName' => 'I2020', 'name' => "temperature_surrounding", 'class' => 'number', 'divisor' => 100);

	// Sauggas
	const TEMPERATURE_SUCTION_AIR = array('tagName' => 'I2021', 'name' => "temperature_suction_air", 'class' => 'number', 'divisor' => 100);
	
	// Ölsumpf
	const TEMPERATURE_SUMP = array('tagName' => 'I2023', 'name' => "temperature_sump", 'class' => 'number', 'divisor' => 100);
	
}

?>