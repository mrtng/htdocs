<?php
include_once('fct/fct0.php');
/*include_once($_SERVER['DOCUMENT_ROOT'].'/fct/fct0.php');*/
?>
<!DOCTYPE html>
<html lang="de">
<head>
<?php
//FORCE HTTPS
/*if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}*/
?>

<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<!-- <link rel="stylesheet" href="n64.css"> -->
<script src="js/orbit/jquery.orbit-1.2.3.min.js" type="text/javascript"></script>
<script src='js/zoom/jquery.zoom.js' type="text/javascript"></script>
<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->
<script>
$(document).keydown(function(evt){
    if (evt.keyCode==83 && (evt.ctrlKey)){
        evt.preventDefault();
        alert('worked');
    }
});
</script>
<!--
<script>    
$(document).keydown(function(evt){
    if ((evt.metaKey) || (evt.ctrlKey) || (e.which)){
        evt.preventDefault();
        alert('worked');
    }
});
</script>
-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#zoom').zoom();		 
		});
</script>
<script type="text/javascript">
 $(window).load(function() {
	 $('#featured').orbit(
		{
			 animation: 'fade',                 // fade, horizontal-slide, vertical-slide, horizontal-push
			 animationSpeed: 300,               // how fast animtions are(800)
			 timer: true, 			 			// true or false to have the timer
			 advanceSpeed: 2000, 		 	    // if timer is enabled, time between transitions 
			 pauseOnHover: true, 		 		// if you hover pauses the slider
			 startClockOnMouseOut: true, 	 	// if clock should start on MouseOut
			 startClockOnMouseOutAfter: 0, 		// how long after MouseOut should the timer start again
			 directionalNav: false, 		 	// manual advancing directional navs
			 captions: true, 			 		// do you want captions?
			 captionAnimation: 'fade', 		 	// fade, slideOpen, none
			 captionAnimationSpeed: 800, 	 	// if so how quickly should they animate in
			 bullets: true,			 			// true or false to activate the bullet navigation
			 bulletThumbs: false,		 		// thumbnails for the bullets
			 bulletThumbLocation: '',		 	// location from this file where thumbs will be
			 afterSlideChange: function(){} 	// empty function 
		}
	);
 });
</script>
<script type="text/javascript">  
// jQuery(function($){
// 	$('.bar').mosaic({
// 		animation	:	'slide',
// 		speed : 250,
// 	 	opacity : 1,
// 		preload : 0,
// 		anchor_x : 'bottom',
// 		anchor_y : 'left',
// 		hover_x : '0px',
// 		hover_y : '0px'
// 	});
// });
</script>
<script>
function imgchange(id) {
  $('#zoom-wrapper').load('fct/fctajax0.php',{'id':id, 'suffix':'imgchange'});
  $('#zoom').zoom();
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/orbit-1.2.3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/blackbarstyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

<link rel="apple-touch-icon" href="favicon.ico">
<link rel="icon" href="favicon.ico">
<!--[if IE]><link rel="shortcut icon" href="../favicon.ico"><![endif]-->
<!-- or, set /favicon.ico for IE10 win -->
<meta name="msapplication-TileColor" content="#D83434">
<meta name="msapplication-TileImage" content="favicon.ico">
<link rel="apple-touch-icon-precomposed" href="favicon.ico"> <!--apple-touch-icon-152x152-precomposed-->

<title><?php
    	if($titel != "") echo $titel;
        else echo "H O M E"; 
    	?>
</title>
</head>
<body>
    <nav class="top-bar">
        <div class="row">
        <ul>
        	<li class="row-text">
                <a href="index.php" class="row-text-link">H O M E</a>
                <a href="shop.php" class="row-text-link">S H O P</a>
	        </li>
            <li class="row-logo">
            	<a href="#"></a>
            </li>
            <li class="row-text">
                <a href="info.php" class="row-text-link">I N F O</a>
                <a href="cart.php" class="row-text-link">C A R T (0)</a>
            </li>
        </ul>    
        </div>
    </nav>
<div class="inhalt">
