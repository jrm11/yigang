<?php require "conn.php";?>
<?php
	$nav_id=7;
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
			您当前位置：<a href="index.php">首页</a> &gt; <a href="about.php">关于我们</a>
			<div><a href="#about_01">关于我们</a> 丨 <a href="#about_02">企业文化</a> 丨 <a href="#about_03">发展历程</a></div>
		</div>
		<div class="about w1170">
			<div class="about_about">
				<?php 
					$sql='select * from info_co where lm=20 ';
					$result=$db->query($sql);
					$rs=$db->getrow($result);
				?>
				<div class="contact_t1" id="about_01"><?php echo $rs['title']; ?></div>
				<div class="contact_t2"><?php echo $rs['f_body']; ?></div>
				<?php echo $rs['z_body']; ?>
				<?php
					$db->freeresult($result);
				?>
			</div>
			<div class="about_wenhua">
				<?php 
					$sql='select * from info_co where lm=21 ';
					$result=$db->query($sql);
					$rs=$db->getrow($result);
				?>
				<div class="contact_t1" id="about_02"><?php echo $rs['title']; ?></div>
				<div class="contact_t2"><?php echo $rs['f_body']; ?></div>
				<div class="about_cul">
				<?php echo $rs['z_body']; ?>
				</div>
				<?php
					$db->freeresult($result);
				?>
			</div>
			<div class="about_licheng">
				<?php 
					$sql='select * from info_co where lm=22 ';
					$result=$db->query($sql);
					$rs=$db->getrow($result);
				?>
				<div class="contact_t1" id="about_03"><?php echo $rs['title']; ?></div>
				<div class="contact_t2"><?php echo $rs['f_body']; ?></div>
				<?php echo $rs['z_body']; ?>
				<?php
					$db->freeresult($result);
				?>
				<ul>
					<li><span>2012</span><div>1月年亿港地产公司成立，成立时3个成员</div></li>
					<li><span>2013</span><div>亿港地产成交额达到八千万，扩展到3家店，员工15给人</div></li>
					<li><span>2014</span><div>亿港公司成交额突破两亿，员工达到50人</div></li>
					<li><span>2015</span><div>亿港地产成交员工店面突破20家</div></li>
					<li><span>2016</span><div>一个地产进行产业优化，开始从事地产开发</div></li>
					<li><span>2017</span><div>亿港开启产业多元化，开始完善地产生态链</div></li>
				</ul>
			</div>
		</div>
		<!--banner结束-->
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>