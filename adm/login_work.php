<?php
session_start();
include_once('fct0.php');

$benutzer = $_POST['user'];
$pw = md5($_POST['pw']);

$sql = "SELECT * FROM user WHERE name = '$benutzer' AND pw = '$pw'";
$user = $GLOBALS['DB']->query($sql);

if($user != NULL)
{
	$_SESSION['MG_id'] = $user[0]['id'];
	$_SESSION['MG_user'] = $user[0]['name'];
	sleep(3);
	header('LOCATION: index.php');
	/*
    echo "<div class='loginloadimg'>"; 
    echo 	"<img src='../img/loading1.gif'>";
    echo "</div>";
    */	
} else {
	header('LOCATION: login.php?id=404');
}
?>