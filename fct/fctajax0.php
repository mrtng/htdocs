<?php
/*
@Title: Haupt-AJAX-Funktionsdatei

@Description: Hier werden alle AJAX Antwort Funktionen geschrieben bzw. alle Funktionsdateien aufgerufen mit require_once('fctajax_name.php');

@author: Guggisberg
@lastupdate: 2013-06-06
@created: 2012-11-07

@update_nr0: @author: Fetka @desc: Grundstruktur erstellt
@update_nr1: @author: Guggisberg @desc: Verändert

*/
require_once($_SERVER['DOCUMENT_ROOT'].'/fct/fct0.php');

switch($_POST['suffix']) {
	case 'building_create':
		break;
	case 'imgchange':
		$id = $_POST['id'];
		$sql ="SELECT pfad FROM `img` WHERE id = ".$id;
		$images = $GLOBALS['DB']->query($sql);
		?>
        <script src='../zoom-master/jquery.zoom.js' type="text/javascript"></script>
        <script type="text/javascript">
		$(document).ready(function(){
			$('#ex1').zoom();		 
		});
		</script>
		<?php
		$aw = "<span class='zoom' id='ex1'>
                <img src=\"../img/shop/".$images[0]['pfad']."\" width=\"354\" height=\"531\" id='jack'>   
                </span>";
		echo $aw;
		break;
		
	default:
		switch($_GET['suffix']) {	
			case 'imgupload':
				$id = $_GET['refshop'];
				$file = $_FILES['file'];
				$imgid = $_GET['id'];
				
				if($file['name'] != "") {	
					$prev = $_GET['prev'];
					
					if ($prev) $prev = 1;
					else $prev = 0;
					
					if ($imgid != "") {
						$sql = 'DELETE FROM img WHERE id = '.$imgid;
						$produkte = $GLOBALS['DB']->query($sql);	
					}
					fileupload($file, $id, $prev);
				}
				
				header('LOCATION: index.php');
				break;
			
			case 'imgdelete':
				$id = $_GET['refshop'];
				$imgid = $_GET['id'];
				$filename = $_GET['filename'];
				
				$filenames = img_src($id);
				
				$sql = 'DELETE FROM `seas`.`img` WHERE `img`.`ref_shop` = '.$id;
				$GLOBALS['DB']->query($sql);
				
				$sql = 'DELETE FROM `seas`.`shop` WHERE `shop`.`id` = '.$id;
				$GLOBALS['DB']->query($sql);
				
				foreach ($filenames as $filename) {
					if($filename['pfad'] != "") {
						unlink('../img/shop/'.$filename['pfad']);
					}
				}
				
				break;
					
			case 'handle_updateshop':
				$value = $_POST['value'];
				$id = $_POST['id'];
				$tmp = explode("-", $id);
			
				$sql = 'UPDATE shop SET '.$tmp[1].' = \''.$value.'\' WHERE id = '.$tmp[0]; 
				$produkte = $GLOBALS['DB']->query($sql);	
				echo $value;
			
				break;
			 
			default:	
			echo 'Keine Funktion gefunden';
				break;
		}
	break;
}



?>