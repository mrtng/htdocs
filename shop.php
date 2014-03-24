<!-- S H O P -->
<?php
	$titel = "S H O P";
	include("header.php");

  $query = "SELECT shop.*, images.pfad FROM shop 
            LEFT JOIN (SELECT * FROM img WHERE img.prevbild IS TRUE) AS images ON images.ref_shop = shop.id
            ORDER BY id ASC";
?> 
<div class="grid cf"> 
  <?php        
    $rows = $GLOBALS['DB']->query($query);
    
    foreach ($rows as $row)
    {
  ?>
    <div class="grid-element">
      <a href="product.php?id=<?php echo $row['id']; ?>">
        <div class="grid-element-img">
          <img src="img/shop/<?php echo $row['pfad']; ?>">
        </div>
        <div class="grid-element-details">
          <h4><?php echo $row['name']; ?></h4>
        </div>
      </a>
    </div>
  <?php
    }
  ?>
</div>


<?php
	include("footer.php");
?>
