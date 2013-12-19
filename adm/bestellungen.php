<?php
session_start();
include('header.php');

$sql = 'SELECT * FROM shop';
$produkte = $GLOBALS['DB']->query($sql);

/*print_r($_SESSION);*/
?>
<!-- Offene Bestellungen -->
<table border="0" cellpadding="0" cellspacing="0" class="adm_table producttable">
    <tr>
    	<td colspan="8" class="headline-order"> O F F E N E &nbsp;&nbsp;&nbsp;B E S T E L L U N G E N
        </td>
    </tr>
    <tr class="headline">
        <td style="width:20px; text-align:center;">ID</td>
        <td>Name</td>
        <td style="width:20px; text-align:center;">S</td>
        <td style="width:20px; text-align:center;">M</td>
        <td style="width:20px; text-align:center;">L</td>
        <td style="width:50px; text-align:center;">Preis</td>
        <td>Beschreibung</td>
        <td></td>
    </tr>
    <?php foreach($produkte as $produkt) {
		?>
        	
    		    <tr class="content">
                	<div>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['id']; ?></td>
                    <td><?php echo $produkt['name']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['s']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['m']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['l']; ?></td>
                    <td style="width:50px; text-align:center;"><?php echo $produkt['preis'].'&euro;'; ?></td>
                    <td><?php echo trim($produkt['desc']); ?></td>
                    <td style="width:40px; text-align:center;"><a href="editproduct.php?id=<?php echo $produkt['id']; ?>"><i class="icon-pencil"></i></a></td>
                    </div>
    			</tr>
    <?php
	}
	?>
</table>
<br>

<!-- Abgeschlossene Bestellungen -->
<table border="0" cellpadding="0" cellspacing="0" class="adm_table producttable">
    <tr>
    	<td colspan="8" class="headline-order"> A B G E S C H L O S S E N E&nbsp;&nbsp;&nbsp;B E S T E L L U N G E N
        </td>
    </tr>
    <tr class="headline">
        <td style="width:20px; text-align:center;">ID</td>
        <td>Name</td>
        <td style="width:20px; text-align:center;">S</td>
        <td style="width:20px; text-align:center;">M</td>
        <td style="width:20px; text-align:center;">L</td>
        <td style="width:50px; text-align:center;">Preis</td>
        <td>Beschreibung</td>
        <td></td>
    </tr>
    <?php foreach($produkte as $produkt) {
		?>
        	
    		    <tr class="content">
                	<div>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['id']; ?></td>
                    <td><?php echo $produkt['name']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['s']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['m']; ?></td>
                    <td style="width:20px; text-align:center;"><?php echo $produkt['l']; ?></td>
                    <td style="width:50px; text-align:center;"><?php echo $produkt['preis'].'&euro;'; ?></td>
                    <td><?php echo trim($produkt['desc']); ?></td>
                    <td style="width:40px; text-align:center;"><a href="editproduct.php?id=<?php echo $produkt['id']; ?>"><i class="icon-pencil"></i></a></td>
                    </div>
    			</tr>
    <?php
	}
	?>
</table>
<br>

<?php
	include('footer.php');
?>