<?php
session_start();
include('header.php');
$sql = 'SELECT * FROM shop';
$sql_delete = 'DELETE FROM `seas`.`shop` WHERE `shop`.`id` = '.$produkt['id'].'';
$produkte = $GLOBALS['DB']->query($sql);
$del = $GLOBALS['DB']->query($sql_delete);
?>
<script type="text/javascript">
 $(document).ready(function() {
     $('.edit_id').editable('fctajax0.php?suffix=handle_updateshop', {
         type	   : 'text',
		 indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 height    : '30px',
		 select    : true,
		 style     : 'padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; text-align:center; width: 20px;'
     });
	 $('.edit_name').editable('fctajax0.php?suffix=handle_updateshop', {
         type	   : 'text',
		 indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 height    : '30px',
		 select    : true,
		 style     : 'padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; text-align:center; width: 170px; font-size: 24px; font-family: monospace;'
     });
	 $('.edit_size').editable('fctajax0.php?suffix=handle_updateshop', {
         type	   : 'text',
		 indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 height    : '30px',
		 select    : true,
		 style     : 'padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; text-align:center; width: 20px;'
     });
	 $('.edit_price').editable('fctajax0.php?suffix=handle_updateshop', {
         type	   : 'text',
		 indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 height    : '30px',
		 select    : true,
		 style     : 'padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; text-align:center; width: 40px;'
     });
     $('.edit_area').editable('fctajax0.php?suffix=handle_updateshop', { 
         id		   : 'target',
		 type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="img/indicator.gif">',
         tooltip   : 'Click to edit...',
		 height    : '60px',
		 select    : true,
		 cssclass  : "selected",
		 style     : 'padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;'
     });
 });
</script>
<script>
$(document).ready(function() {
	$("#target").autoGrow();
});
</script>
<table border="0" cellpadding="0" cellspacing="0" class="adm_table producttable">
    <tr class="headline">
        <td style="width:20px; text-align:center;">ID</td>
        <td style="width:175px; text-align:center;">Name</td>
        <td style="width:20px; text-align:center;">S</td>
        <td style="width:20px; text-align:center;">M</td>
        <td style="width:20px; text-align:center;">L</td>
        <td style="width:60px; text-align:center;" colspan="2">Preis</td>
        <td style="width:550px; text-align:center;" colspan="2">Beschreibung</td>
        <td style="width:75px; text-align:center;" colspan="3">Bilder</td>
        <td></td>
    </tr>
    <?php foreach($produkte as $produkt) {
		$img = img_src($produkt['id']);
		?>
        	
            <tr class="content">
                <div>
                <td style="width:20px; text-align:center;" class="edit" id="<?php echo $produkt['id'];?>-id"><?php echo $produkt['id']; ?></td>
                <td style="width:175px; text-align:center;" class="edit_name" id="<?php echo $produkt['id'];?>-name"><?php echo urldecode($produkt['name']); ?></td>
                <td style="width:20px; text-align:center;" class="edit_size" id="<?php echo $produkt['id'];?>-s"><?php echo $produkt['s']; ?></td>
                <td style="width:20px; text-align:center;" class="edit_size" id="<?php echo $produkt['id'];?>-m"><?php echo $produkt['m']; ?></td>
                <td style="width:20px; text-align:center;" class="edit_size" id="<?php echo $produkt['id'];?>-l"><?php echo $produkt['l']; ?></td>
                <td style="width:40px; text-align:right;" class="edit_price" id="<?php echo $produkt['id'];?>-preis"><?php echo $produkt['preis']; ?></td><td style="width:20px; text-align:left;">&euro;</td>
                <td colspan="2" class="edit_area"id="<?php echo $produkt['id'];?>-description"><?php echo urldecode(trim($produkt['description'])); ?></td>
                <td style="width:25px; text-align:center;" class="iconlink">
                	<a>
                    	<form action="fctajax0.php?suffix=imgupload&refshop=<?php echo $produkt['id'];?>&prev=1&id=<?php echo $img[0]['id']; ?>" method="post" enctype="multipart/form-data">
                        <label class="filebutton">
                            <i class="icon-picture magnify">
                                <?php if($img[0]['pfad'] != "") {?>
                                <img src="../img/shop/<?php echo $img[0]['pfad']; ?>" class="magnify-img" style="margin-left:125px;">
                                <?php } ?>
                            </i>
                            <span>
                            	<input name="file" type="file" onChange="this.form.submit()">
                            </span>
                        </label>
                        </form>
                    </a>
                </td>
                <td style="width:25px; text-align:center;" class="iconlink">
                    <a>
                        <form action="fctajax0.php?suffix=imgupload&refshop=<?php echo $produkt['id'];?>&prev=0&id=<?php echo $img[1]['id']; ?>" method="post" enctype="multipart/form-data">
                        <label class="filebutton">
                            <i class="icon-picture magnify">
                                <?php if($img[1]['pfad'] != "") {?>
                                <img src="../img/shop/<?php echo $img[1]['pfad']; ?>" class="magnify-img" style="margin-left:100px;">
                                <?php } ?>
                            </i>
                            <span>
                                <input name="file" type="file" onChange="this.form.submit()">
                            </span>
                        </label>
                        </form>
                    </a>
                </td>
                <td style="width:25px; text-align:center;" class="iconlink">
                    <a>
                        <form action="fctajax0.php?suffix=imgupload&refshop=<?php echo $produkt['id'];?>&id=<?php echo $img[2]['id']; ?>" method="post" enctype="multipart/form-data">
                        <label class="filebutton">
                            <i class="icon-picture magnify">
                                <?php if($img[2]['pfad'] != "") {?>                                
                                <img src="../img/shop/<?php echo $img[2]['pfad']; ?>" class="magnify-img" style="margin-left:75px;">
                                <?php } ?>
                            </i>
                            <span>
                                <input name="file" type="file" onChange="this.form.submit()">
                            </span>
                        </label>
                        </form>
                    </a>
                </td>
                <td style="width:40px; text-align:center;">
                    <a href="fctajax0.php?suffix=imgdelete&refshop=<?php echo $produkt['id'];?>&id=<?php echo $img[0]['id']; ?>&filename=<?php echo $img[2]['pfad']; ?>" class="iconlink" onClick="confirm('Wirklich l&ouml;schen?')">
                        <i class="icon-trash">
                        </i>
                    </a>
                </td>
                </div>
            </tr>
<?php	}	?>
            <tr style="border:#CCC 1px; background-color:FAFAFA;" class="content">
            <form name="addproduct" action="handle_createproduct.php" method="post" enctype="multipart/form-data">
                	<td colspan="2"><input type="text" name="name" placeholder="Name" style="width:195px; text-align:center;" autofocus required></td>
                    <td><input type="text" name="s" placeholder="S" style="width:20px; text-align:center;" autocomplete="off"></td>
                    <td><input type="text" name="m" placeholder="M" style="width:20px; text-align:center;" autocomplete="off"></td>
                    <td><input type="text" name="l" placeholder="L" style="width:20px; text-align:center;" autocomplete="off"></td>
                    <td style="width:40px; text-align:right;"><input type="text" name="preis" placeholder="Preis" style="text-align:center; width:92%;" required></td>
                    <td>&euro;</td>
                    <td style="width:300px;"><textarea name="desc" rows="6" placeholder="Beschreibung" style="width:100%;" class="formtextarea" id="target"></textarea></td>
					<td style="width:275px; text-align:right;">
                        <input type="file" name="datei1" required>
                        <input type="file" name="datei2">
                        <input type="file" name="datei3">
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="width:40px; text-align:center;"><button type="submit" class="content-button"><i class="icon-plus"></i></button></td>
            </form>
            </tr>
</table>
<!--
<script type="text/javascript" language="JavaScript">
document.forms['addproduct'].elements['name'].focus();
</script>
-->
<?php
	include('footer.php');
?>