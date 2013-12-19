<?php
session_start();
include('header.php');

$id = (int) $_GET['id'];

$sql = 'SELECT * FROM shop WHERE id = '.$id;
$produkte = $GLOBALS['DB']->query($sql);
$produkt = $produkte[0];

/*print_r($_SESSION);*/
?>

<form action="handle_editproduct.php" method="post" enctype="application/x-www-form-urlencoded">
<input type="text" name="name" placeholder="Name" value="<?php echo $produkt['name'] ?>" autofocus="autofocus"><br>
<input type="text" name="s" placeholder="S" value="<?php echo $produkt['s'] ?>">
<input type="text" name="m" placeholder="M" value="<?php echo $produkt['m'] ?>">
<input type="text" name="l" placeholder="L" value="<?php echo $produkt['l'] ?>"><br>
<input type="text" name="preis" placeholder="Preis" value="<?php echo $produkt['preis'] ?>"><br>
<textarea name="desc"><?php echo $produkt['desc'] ?></textarea><br>
<input type="file" name="datei1"><br>
<input type="file" name="datei2"><br>
<input type="file" name="datei3"><br>
<br>
<input type="submit">
</form>

<?php
	include('footer.php');
?>