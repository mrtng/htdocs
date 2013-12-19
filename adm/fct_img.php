<?php
function img_src ($id) {
$sql = "SELECT pfad,id FROM img WHERE ref_shop=$id && prevbild IS TRUE";

$row1 = $GLOBALS['DB']->query($sql);

$sql = "SELECT pfad,id FROM img WHERE ref_shop=$id && prevbild IS NOT TRUE";
$row2 = $GLOBALS['DB']->query($sql);

$antw[0]['id'] = $row1[0]['id'];
$antw[1]['id'] = $row2[0]['id'];
$antw[2]['id'] = $row2[1]['id'];

$antw[0]['pfad'] = $row1[0]['pfad'];
$antw[1]['pfad'] = $row2[0]['pfad'];
$antw[2]['pfad'] = $row2[1]['pfad'];

return $antw;
}

function fileupload($file, $id, $prev=0)
{
	if (!empty($file)) {
	
	$tempFile = $file['tmp_name'];
	$targetPath = '../img/shop/';
	$tmp = explode('.',  $file['name']);
	$file_name = reset($tmp).'-'.date(U).'.'.end($tmp);
	$targetFile =  str_replace('//','/',$targetPath) . $file_name;
	
	move_uploaded_file($tempFile,$targetFile);
	
	if($prev) $data['prev']=1;	
	
	else $data['prev']=0;
	
	$sql = 'INSERT INTO img (`ref_shop`, pfad, prevbild) VALUES('.$id.', \''.$file_name.'\', '.$data['prev'].')';
	/*echo $sql;*/
	$produkte = $GLOBALS['DB']->query($sql);	
	}
}
?>