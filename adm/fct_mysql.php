<?php
/**
 * Abstraktionsschicht für die Datenbank (nutzt nur MySQL)
 * 
 * Verbindet zur Datenbank und kapselt alle Anfragen an die 
 * Datenbank....
 * 
 */

class MySQL
{

	//Datenbankverbindungsobjekt 
	public $MySQLiObj = null;

	//Letzte SQL-Abfrage
	public $lastSQLQuery = null;

	//Status der letzten Anfrage 
	public $lastSQLStatus = null;

	/**
	 * Verbindet zur Datenbank und gibt ggf. eine
	 * Fehlermeldung zurück.
	 * 
	 */
	function __construct($server, $user, $password, $db, $port = '3306')
	{

		//Erstellen eines MySQLi-Objektes
		$this->MySQLiObj = new \mysqli($server, $user, $password, $db, $port);
		
		//Prüfen, ob ein Fehler aufgetreten ist.      
		if (mysqli_connect_errno())
		{
			echo "Keine Verbindung zum MySQL-Server möglich.";
			trigger_error("MySQL-Connection-Error", E_USER_ERROR);
			die();
		}
		
		//Characterset der Verbindung auf UTF-8 setzen:
		$this->query("SET NAMES utf8");
	}
	
	/**
	 * Beendet die Verbindung zur Datenbank bei Beenden eines
	 * Skriptes.
	 * 
	 */
	public function __destruct()
	{
		$this->MySQLiObj->close();
	}

	/**
	 * Führt eine SQL-Anfrage durch.
	 * 
	 * Der optionale Parameter bestimmt, ob das Ergebnis als
	 * Array-Struktur zurückgegeben wird oder als normales MySQL-Resultset
	 * 
	 * @param text Die SQL-Anfrage
	 * @param boolean Parameter, ob ein Resultset oder ein Array zurückgegeben werden soll
	 * 
	 * @return Array Gibt eine Ergebnismenge zurück
	 */
	public function query($sqlQuery, $resultset = false)
	{
	    //Letzte SQL-Abfrage aufzeichnen:
	    $this->lastSQLQuery = $sqlQuery;

		//Hier kann später die Protokoll-Methode doLog() 
		//aktiviert werden
		//$this->doLog($sqlQuery);

		$result = $this->MySQLiObj->query($sqlQuery);

		//Das Ergebnis als MySQL-Result "plain" zurückgeben
		if ($resultset == true)
		{
			//Status setzen
			if ($result == false)
			{
				$this->lastSQLStatus = false;
			}
			else
			{
				$this->lastSQLStatus = true;
			}

			return $result;
		}

		$return = $this->makeArrayResult($result);

		return $return;
	}

	/**
	 * Fehlermeldung der letzten Abfrage
	 * 
	 * @return varchar Die letzte Fehlermeldung wird zurückgegeben
	 */
	public function lastSQLError()
	{
		return $this->MySQLiObj->error;
	}
	
	
	/**
     * Maskiert einen Parameter für die Benutzung in einer SQL-Anfrage
     * 
     * @param varchar Attributwert
     * 
     * @return Gibt den Übergebenen Wert maskiert zurück
     */
	public function escapeString($value)
	{

		return $this->MySQLiObj->real_escape_string($value);

	}

	/**
	 * Array-Struktur der Anfrage
	 * 
	 * Lässt ein Ergebnis aussehen, wie das von DBX
	 * 
	 * @param MySQLiObject Das Ergebnisobjekt einer MySQLi-Anfrage 
	 * 
	 * @param boolean/Array Gibt entweder true, false oder eine Ergebnismenge zurück
	 */
	private function makeArrayResult($ResultObj)
	{

		if ($ResultObj === false)
		{
			//Fehler trat auf (z.B. Primärschlüssel schon vorhanden)
			$this->lastSQLStatus = false;
			return false;

		}
		else
			if ($ResultObj === true)
			{
				//UPDATE- INSERT etc. es wird nur TRUE zurückgegeben.
				$this->lastSQLStatus = true;
				return true;

			}
			else
				if ($ResultObj->num_rows == 0)
				{
					//Kein Ergebnis eines SELECT, SHOW, DESCRIBE oder EXPLAIN-Statements
					$this->lastSQLStatus = true;
					return array ();

				}
				else
				{

					$array = array ();

					while ($line = $ResultObj->fetch_array(MYSQLI_ASSOC))
					{
						//Alle Bezeichner in $line klein schreiben
						array_push($array, $line);
					}

					//Status der Abfrage setzen
					$this->lastSQLStatus = true;
					//Das Array sieht nun genauso aus, wie das Ergebnis von dbx
					return $array;
				}

	}

	/**
	 * Protokolliert alle Datenbankzugriffe  
	 * 
	 * @param text Eine SQL-Anfrage, die "gelogt" werden soll
	 */
	private function doLog($sqlQuery)
	{

		//Nur wenn kein SELECT
		$substr = substr($sqlQuery, 0, 6);

		//Eintragen
		if ($substr != "SELECT")
		{

			$sql = "INSERT INTO logging (sql,datum,name) VALUES ".
                   " ('".mysql_escape_string($sqlQuery)."',".
                   date("H:i   d.m.Y", time()).",'".
                   $_SESSION['name']."')";
                   
			//Eintragen
			$this->MySQLiObj->query($sql);
		}

	}
	
	

}
?>