<?php

/*
error_reporting(E_ALL);
ini_set("display_errors", TRUE);
require_once('../../Connections/db_c.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}*/
/**
S3-Cloud
Connection


if (!class_exists('S3')) require_once '../../s3/S3.php';

// AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'HUGMVCQS75VAUXBLVA6L');
if (!defined('awsSecretKey')) define('awsSecretKey', 'FMXKVV9NACG58K8HPCBN97TPUQ92XDMJQ87PWF39');

// Check for CURL
if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll'))
	exit("\nERROR: CURL extension not loaded\n\n");

// Pointless without your keys!
if (awsAccessKey == 'change-this' || awsSecretKey == 'change-this')
	exit("\nERROR: AWS access information required\n\nPlease edit the following lines in this file:\n\n".
	"define('awsAccessKey', 'change-me');\ndefine('awsSecretKey', 'change-me');\n\n");


################################################################################
S3::setAuth(awsAccessKey, awsSecretKey);
$s3 = new S3(awsAccessKey, awsSecretKey); 

$bucketName = 'cloud.moitzi-torprofi.at';
*/
/*
Uploadify v2.1.0
Release Date: August 24, 2009

Copyright (c) 2009 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);
		echo "1";
	// } else {
	// 	echo 'Invalid file type.';
	// }
}*/

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db_c = "data.moitzi-torprofi.at";
$database_db_c = "moitzi";
$username_db_c = "webadmin";
$password_db_c = "f1a2b3i4";
$db_c = mysql_pconnect($hostname_db_c, $username_db_c, $password_db_c) or trigger_error(mysql_error(),E_USER_ERROR); 


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!empty($_FILES)) {
	$id = rand();
	$auftrag = $_GET['auftrag'];
	$anbot = $_GET['anbot'];
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = '../../uploadify/uploads/';
	$tmp = explode('.',  $_FILES['file']['name']);
	$file_name = $anbot.$auftrag.'-'.date(U).'.'.end($tmp);
	$targetFile =  str_replace('//','/',$targetPath) . $file_name;
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
		srand ((double)microtime()*1000000);

  $insertSQL = sprintf("INSERT INTO kunde_files (id, auftrag, pfad, ext, beschreibung, zuordnung, anbot) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($id, "int"),
                       GetSQLValueString($auftrag, "int"),
                       GetSQLValueString($file_name, "text"),
                       GetSQLValueString($_FILES['file']['type'], "text"),
                       GetSQLValueString(urlencode($_FILES['file']['name']), "text"),
					   GetSQLValueString($_GET['zuordnung'], "int"),
					   GetSQLValueString($_GET['anbot'], "int"));


  mysql_select_db($database_db_c, $db_c);
  $Result1 = mysql_query($insertSQL, $db_c) or die(mysql_error());

  	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
	if($Result1) {

		move_uploaded_file($tempFile,$targetFile);
		
$cloud_path ='/dashboard/uploads/'.$file_name;
/*
//move the file  
$s3->putObjectFile($targetFile, $bucketName, $cloud_path, S3::ACL_PUBLIC_READ);
*/		 
		 echo "1";	

	 } else {
	 	echo $insertSQL;
	 }
}
?>