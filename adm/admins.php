<?php
session_start();
include('header.php');

$sql = 'SELECT * FROM user';
$produkte = $GLOBALS['DB']->query($sql);

/*print_r($_SESSION);*/
?>
<table border="0" cellpadding="0" cellspacing="0" class="adm_table producttable">
    <tr class="headline">
        <td style="width:20px; text-align:center;">ID</td>
        <td style="width:500px; text-align:center;">Name</td>
        <td style="width:50px; text-align:center;">Passwort</td>
        <td></td>
    </tr>
    <?php foreach($produkte as $produkt) {
		?>
        	
    		    <tr class="content">
                	<div>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['id']; ?></td>
                    <td style="width:500px; text-align:center;"><?php echo $produkt['name']; ?></td>
                    <td style="width:50px; text-align:center;"><?php echo $produkt['pw']; ?></td>
                    <td style="width:40px; text-align:center;"><a href="editproduct.php?id=<?php echo $produkt['id']; ?>"><i class="icon-pencil"></i></a></td>
                    </div>
    			</tr>
    <?php
	}
	?>
    <tr>
    <form>
    <td colspan="2"><input type="text" name="name" placeholder="Name"></td>
    <td></td>
    </form>
    </tr>
</table>
<br>

<form action="handle_createproduct.php" method="post" enctype="application/x-www-form-urlencoded">
<table class="adm_table" border="0">
    <tr>
        <td>
	        <input type="text" name="name" placeholder="Name"><br>
        </td>
    </tr>
    <tr>
	    <td><input type="text" name="preis" placeholder="Preis"></td>
    </tr>
    <tr>
	    <td><textarea name="desc" rows="4" style="width:500px;" placeholder="Beschreibung"></textarea></td>
    </tr>
<tr>
<td>
<input type="file" name="datei1"><br>
<input type="file" name="datei2"><br>
<input type="file" name="datei3"><br>
</td>
</tr>
<td><br>
<input type="submit">
</td>
</table>
</form>
<?php
	include('footer.php');
?>