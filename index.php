<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title><?php echo "인디, 고! - 인디 게임 개발자들을 위한 소통 공간" ?></title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" href="styles.css" />

</head>
<?php if(!isset($_COOKIE['t'])) setcookie("t", "light");  

require('dark.php'); require('counter.php'); ?>

<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
	    <?php include "main.php";?>
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
