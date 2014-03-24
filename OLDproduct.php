<?php
    include_once('fct/fct0.php');
    $id=(int)$_GET['id'];
    $query = "SELECT shop.*, img.pfad FROM shop 
              LEFT JOIN img ON img.ref_shop = shop.id
              WHERE shop.id = $id
              ORDER BY id ASC";
              
    $sql = 'SELECT id FROM shop WHERE id = '.$id;
    $idcheck = $GLOBALS['DB']->query($sql);
    #Wenn übergeben ID nicht vorhanden ist mittels 'header('LOCATION: ../shop/');' zurückverweisen
    if($id != $idcheck[0]['id'] || $id == '') header('LOCATION: shop.php');
    
    $row = $GLOBALS['DB']->query($query);
    $row = $row[0];
    $titel = "S H O P : ".$row['name']; 
    
    include("header.php");

    $images = img_src($row['id']);
?> 
<!-- ÄNDERT DIE ANGEZEIGTE URL -->
<!--
<script type="text/javascript">
window.history.pushState("string", "S H O P : <?php echo $row['name'] ?>", "../shop/<?php echo $row['name'] ?>");
</script>  
-->
<div class="product cf">
    <div class="productleft">
        <div id="img_wrapper">
            <div id="img_img">            
                <span class='zoom' id='ex1'> 
                 
                <img src="img/shop/<?php echo $images[0]['pfad']; ?>" width="354" height="531" id='jack'>   
                </span>            
            </div>
            <div id="img_slide" class="img_slide">
                <?php if ($images[0]['pfad'] != '')
                {
                ?>
                    <a href="#" onClick="imgchange('<?php echo $images[0]['id']; ?>')">
                        <div id="img_1" class="thumb">
                            <img src="/img/shop/<?php echo $images[0]['pfad']; ?>">
                        </div>
                    </a>
                <?php
                }
                ?>
                
                <?php if ($images[1]['pfad'] != '')
                {
                ?>
                    <a href="#" onClick="imgchange('<?php echo $images[1]['id']; ?>')">
                        <div id="img_2" class="thumb">
                            <img src="/img/shop/<?php echo $images[1]['pfad']; ?>">
                        </div>
                    </a>
                <?php
                }
                ?>
                
                <?php if ($images[2]['pfad'] != '')
                {
                ?>
                    <a href="#" onClick="imgchange('<?php echo $images[2]['id']; ?>')">
                        <div id="img_3" class="thumb img_bottom">
                            <img src="/img/shop/<?php echo $images[2]['pfad']; ?>">
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


    <div class="productright">
        <div class="productrightcontent">
            <div id="text">
                <p id="productname"><?php echo $row['name']; ?></p>
                <p id="productprice"><?php echo $row['preis']; ?>&euro;</p>
                <p class="productdescription"><?php echo urldecode($row['description']); ?></p>
            </div>
            <div id="buy" class="cf">
            <form>
                <select id="select" class="productselect">
                    <?php if ($row['s'] != 0) 
                    {
                    ?>
                    <option><!--<?php echo $row['s']; ?> - -->S M A L L<!-- - <?php echo $row['preis']; ?>&euro;--></option>
                    <?php   
                    }
                    ?>
                    <?php if ($row['m'] != 0) 
                    {
                    ?>
                    <option><!--<?php echo $row['m']; ?> - -->M E D I U M<!-- - <?php echo $row['preis']; ?>&euro;--></option>
                    <?php   
                    }
                    ?>
                    <?php if ($row['l'] != 0) 
                    {
                    ?>
                    <option><!--<?php echo $row['l']; ?> - -->L A R G E<!-- - <?php echo $row['preis']; ?>&euro;--></option>
                    <?php   
                    }
                    ?>    
                </select>
                <button id="button" class="productbutton">A D D</button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include("footer.php");
?>
