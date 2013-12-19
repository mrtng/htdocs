<?php
/*
@Title: Hauptfunktionsdatei

@Description: Hier werden alle Funktionen geschrieben bzw. alle Funktionsdateien aufgerufen mit require_once('fct_name.php');

@author: Fetka
@lastupdate: 2013-02-20
@created: 2013-02-20

@update_nr0: @author: Fetka @desc: Grundstruktur erstellt



*/
//Fehlerreporting
error_reporting(E_ALL ^ E_NOTICE); /*(E_ERROR);*/

//DEBUG-MODUS (wenn true, wird die Debug-Konsole angezeigt)
define('DEBUG',true);

//DATENBANKVERBINDUNGS-DATEN
define('DB_SERVER',"127.0.0.1");
define('DB_PORT',"3306");
define('DB_NAME',"seas");

//Datenbankbenutzer
define('DB_USER',"seas");
//Benutzerpasswort
define('DB_PASSWORD',"danklorix666");


//seit PHP 5.3 sollte die Zeitzone gesetzt werden
date_default_timezone_set('Europe/Berlin');
#DB Connection Simple MySQLi Klasse
require_once('fct_mysql.php');
#DB MYSQL Klasse automatisch starten DATENBANK: 
if(!isset($GLOBALS['DB']))$DB = new MySQL(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);
require_once('fct_dbhandle.php');
require_once('fct_img.php');
?>
