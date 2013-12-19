<?php
session_start();
include('header.php');

$sql = 'SELECT * FROM shop';
$produkte = $GLOBALS['DB']->query($sql);

/*print_r($_SESSION);*/
?>



<?php
	include('footer.php');
?>