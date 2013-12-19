<?php
session_start();
include_once('fct0.php');
	if($_SESSION['MG_id'] == TRUE)
	{
		header('LOCATION: index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>L O G I N</title>

<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css" />
<!--<link rel="stylesheet" href="/css/bootstrap-responsive.css" />
--><link rel="stylesheet" href="../css/bootstrap.css" />
</head>

<body>
<div class="loginform">
    <div class="logincontent">
        <p class="loginformheader">LOGIN</p><br />
        <form action="login_work.php" method="post">
            <div class="input-prepend input-prepend-allrounded">
                <!--<span class="add-on">
                    <i class="icon-envelope"></i>
                </span>-->
                <input type="text" name="user" placeholder="Username" autofocus="autofocus" class="formularelement"/>
            </div>
            <br />
            <div class="input-prepend input-prepend-allrounded">
                <!--<span class="add-on">
                    <i class="icon-key"></i>
                </span>-->
                <input type="password" name="pw" placeholder="Password" class="formularelement"/>
            </div>
            <br />
            <input type="submit" class="btn" value="L O G I N"/>
        </form>
        <p class="loginunsuccessful"><?php
        $id = (int) $_GET['id'];
        if ($id == 404)
        {
        ?>Login war nicht erfolgreich.<?php
        }
        ?></p>
    </div>
</div>
</body>
</html>