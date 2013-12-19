<?php
session_start();
include('header.php');
include_once('fct0.php');

/*DATENAUFBEREITUNG*/
$insert_blocka['name'] = $_POST['name'];
$insert_blocka['s'] = $_POST['s'];
$insert_blocka['m'] = $_POST['m'];
$insert_blocka['l'] = $_POST['l'];
$insert_blocka['preis'] = $_POST['preis'];
$insert_blocka['description'] = $_POST['desc'];
$insert_blocka['zart'] = "INSERT";
$insert_blocka['ztable'] = "shop";

handle_db($insert_blocka);

$row = $DB->query("SELECT id FROM shop ORDER BY id DESC LIMIT 1");
$id = $row[0]['id'];
	
/*print_r($_FILES);*/	
	
	$file1 = $_FILES['datei1'];
	$file2 = $_FILES['datei2'];
	$file3 = $_FILES['datei3'];

	if($file1['name'] != "")	fileupload($file1, $id, 1);
	if($file2['name'] != "")	fileupload($file2, $id, 0);
	if($file3['name'] != "")	fileupload($file3, $id, 0);

?>

<meta http-equiv="refresh" content="0;url=index.php" />
<?php
	include('footer.php');
?>