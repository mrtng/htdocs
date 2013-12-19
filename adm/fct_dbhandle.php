<?php
/* Automatische Datenbankfunktionen - INSERT, UPDATE
		Anwendung: handle_db($data);
		$data ... Array
						zart: 	INSERT, UPDATE
						ztable: welche Tabelle ist betroffen
						zid: 	ID bei Update

!!! Abhängig von $GLOBALS['DB'] !!!
*/
function feld_db($feld)
{
    $s = preg_match("/,/i", $feld);
    
    $a = explode(',', $feld);
    if (!($s === false)) {
        return $a[0];
    } else {
        return $feld;
    }
}
function values_db($value, $feld)
{
    $s = preg_match("/,/i", $feld);
    
    $a = explode(',', $feld);
    if (is_array($a)) {
        switch ($a[1]) {
            case 'n':
                return (float) $value;
                break;
            case 'd':
                $datum       = explode('.', $value);
                $finishdatum = $datum[2] . '-' . $datum[1] . '-' . $datum[0];
                return "'" . $finishdatum . "'";
                break;
            default:
                return "'" . urlencode($value) . "'";
                break;
        }
    } else {
        return "'" . urlencode($value) . "'";
    }
}

function insert_db($tbl, $data)
{  
    
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $fields .= feld_db($key) . ', ';
            $values .= values_db($value, $key) . ", ";
        }
        $fields = substr($fields, 0, -2);
        $values = substr($values, 0, -2);
        $query  = "INSERT INTO " . $tbl . " (" . $fields . ") VALUES (" . $values . ")";
		$GLOBALS['DB']->query($query);
        return $query;
        
    } else {
        return 'Fehler in Anweisung - Übermittelte Daten sind kein Array.';
    }
}
function update_db($tbl, $data, $id)
{ 
    
    if (is_array($data)) {
        $update = '';
        foreach ($data as $key => $value) {
            $update .= feld_db($key) . " = " . values_db($value, $key) . ", ";
        }
        $update = substr($update, 0, -2);
        $query  = "UPDATE " . $tbl . " SET " . $update . " WHERE id = " . $id;
        $GLOBALS['DB']->query($query);
        
        return $query;
        
    } else {
        return 'Fehler in Anweisung - Übermittelte Daten sind kein Array.';
    }
}
function handle_db($data)
{
    
    $art = explode(',', $data['zart']);
    if (is_array($art)) {
        $tbl = explode(',', $data['ztable']);
        $id  = explode(',', $data['zid']);
        unset($data['ztable'], $data['zid'], $data['zart']);
        foreach ($art as $key => $value) {
            
            
            switch ($value) {
                case 'INSERT':
                   insert_db($tbl[$key], $data);
                    break;
                case 'UPDATE':
                    $data['id'] = $id[$key];
                    update_db($tbl[$key], $data, $id[$key]);
                    break;
                default:
                    return 'ERROR Fehler in Anweisung.' . __LINE__ . ' - ' . __FILE__;
                    break;
            }
        }
    } else {
        $id  = $data['zid'];
        $tbl = $data['ztable'];
        unset($data['ztable'], $data['zid'], $data['zart']);
        switch ($art) {
            case 'INSERT':
               insert_db($tbl, $data);
                break;
            case 'UPDATE':
                $data['id'] = $id;
                update_db($tbl, $data, $id);
                break;
            default:
                return 'ERROR Fehler in Anweisung.' . __LINE__ . ' - ' . __FILE__;
                break;
        }
    }
    
    return true;
	
}
?>