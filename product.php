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
window.history.pushState("string", "S H O P : <?php //echo $row['name'] ?>", "../shop/<?php //echo $row['name'] ?>");
</script>
-->
<div class="product cf">
    <div class="product-img">
        <div class="product-img-big">
            <div id="zoom-wrapper">
                <span class='zoom' id='zoom'>
                    <img src="img/shop/<?php echo $images[0]['pfad']; ?>">
                </span>
            </div>
        </div>

        <div class="product-img-thumbs cf">
            <?php if ($images[0]['pfad'])
            {
            ?>
                <div id="img_1" class="thumb">
                    <a href="#" onClick="imgchange('<?php echo $images[0]['id']; ?>')">
                        <img src="/img/shop/<?php echo $images[0]['pfad']; ?>">
                    </a>
                </div>
            <?php
            }
            ?>

            <?php if ($images[1]['pfad'])
            {
            ?>
                <div id="img_2" class="thumb">
                    <a href="#" onClick="imgchange('<?php echo $images[1]['id']; ?>')">
                        <img src="/img/shop/<?php echo $images[1]['pfad']; ?>">
                    </a>
                </div>
            <?php
            }
            ?>

            <?php if ($images[2]['pfad'])
            {
            ?>
                <div id="img_3" class="thumb img_bottom">
                    <a href="#" onClick="imgchange('<?php echo $images[2]['id']; ?>')">
                        <img src="/img/shop/<?php echo $images[2]['pfad']; ?>">
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <div class="product-desc">
        <h2><?php echo $row['name']; ?></h2>
        <h4><?php echo $row['preis']; ?>&euro;</h4>
        <p class="product-desc-text"><?php echo urldecode($row['description']); ?></p>
        <div id="buy" class="cf">
            <form>
                <select id="select" class="buy-select">
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
                <button id="button" class="buy-button">A D D</button>
            </form>
        </div>
    </div>
</div>


<?php
    include("footer.php");
?>
