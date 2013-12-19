<?php
session_start();
include_once('fct0.php');
	if($_GET['doLogout'] == TRUE)
	{
		unset($_SESSION);
		session_destroy();
	}
	
	if($_SESSION['MG_id'] == NULL)
	{
		header('LOCATION: login.php');
	}
?>
<html>
<head>
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/blackbarstyleadm.css">
<link rel="stylesheet" href="../css/style.css">
<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.jeditable.js"></script>
<script type="text/javascript" src="../js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript">
$(document).keydown(function(evt){
    if (((evt.metaKey) || (evt.ctrlKey)) && (evt.keyCode==89)){
        evt.preventDefault();
        self.location.href="../adm/index.php?doLogout=true";
    }
});
</script>
<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
-->
</head>
<body>
    <nav class="top-bar">
        <div class="adm_row">
            <div class="adm_col" style="float:left; left:0;">
                <div id="left">
                    <div id="parent" class="adm_row-text">
                        <a id="child" class="row-text-link-adm" href="users.php">Userverwaltung<br><i class="icon-group"></i></a>
                    </div>
                    <div id="parent" class="adm_row-text">
                        <a id="child" class="row-text-link-adm" href="bestellungen.php">Bestellungen<br><i class="icon-envelope-alt"></i></a>
                    </div>
                    <div id="parent" class="adm_row-text">
                        <a id="child" class="row-text-link-adm" href="index.php">Produktverwaltung<br><i class="icon-briefcase"></i></a>
                    </div>
                </div>
            </div>
            <div class="adm_col" style="float:right; right:0;">
                <div id="right">
                    <div id="parent" class="adm_row-text">
                        <a id="child" class= "row-text-link-adm" href="index.php?doLogout=true">Logout<br><i class="icon-signout"></i></a>
                    </div>
                    <div id="parent" class="adm_row-text">
                        <a id="child" class="row-text-link-adm" href="protokoll.php">Protokoll<br><i class="icon-terminal"></i></a>
                    </div>
                    <div id="parent" class="adm_row-text">
                        <a id="child" class="row-text-link-adm" href="admins.php">Adminuserverwaltung<br><i class="icon-user"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<div class="inhalt">
<br><br>