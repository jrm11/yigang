<?php require "conn.php";?>
<?php
	$nav_id=8;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no">
		<meta name="format-detection" content="email=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php echo $site_title ?></title>
        <!-- 关键词 --><meta name="keywords" content="<?php echo $site_key ?>">
        <!-- 描述 --><meta name="description" content="<?php echo $site_des ?>">
		<!--[if lt IE 9]>
	    	<script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
	    	<script src="https://cdn.bootcss.com/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
		<![endif]-->
		<link href="css/css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="js/swiper/idangerous.swiper.css" />
		<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	</head>

	<body>
		<?php require "top.php";?>
		<div class="ny_banner">
			<img src="images/ny_banner.jpg"/>
		</div>
		<!--内页导航-->
		<div class="ny_nav w1170">
			您当前位置：<a href="index.php">首页</a> &gt; <a href="conteact.php">联系我们</a>
			<div><a href="#contact">联系方式</a></div>
		</div>
		<div class="contact" id="contact">
			<?php 
				$sql='select * from info_co where lm=23 ';
				$result=$db->query($sql);
				$rs=$db->getrow($result);
			?>
			<div class="contact_t1" id="about_03"><?php echo $rs['title']; ?></div>
			<div class="contact_t2"><?php echo $rs['f_body']; ?></div>
			<?php echo $rs['z_body']; ?>
			<?php
				$db->freeresult($result);
			?>
		</div>
		<!--banner结束-->
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>