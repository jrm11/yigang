<?php require "conn.php";?>
<?php
	$nav_id=5;
	
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id!=''&&!checknum($id)){
		msg('参数错误');
	}
	
	$sql='select * from info_co where id='.$id.' ';
	$result=$db->query($sql);
	$rs=$db->getrow($result);
	$title=$rs['title'];
	$info_from=$rs['info_from'];
	$z_body=$rs['z_body'];
	$read_num=$rs['read_num'];
	$time=date("Y-m-d",$rs['wtime']);
	$db->freeresult($result);
	
	$db->execute('update info_co set read_num=read_num+1 where id='.$id.'');
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
		<!--banner结束-->
		<!--内页导航-->
		<div class="ny_nav w1170">
			您当前位置：<a href="index.php">首页</a> &gt; <a href="news.php">资讯</a> &gt; <?php echo $title; ?>
		</div>
		<!--新闻详细页-->
		<div class="ny_detail w1170">
			<div class="t"><?php echo $title; ?></div>
			<ul class="message">
				<li><img src="images/ny_detail_01.png" alt="" /> <span>发布时间：<?php echo $time; ?></span> </li>
				<li><img src="images/ny_detail_02.png" alt="" /> <span>发布者： <?php echo $info_from; ?></span> </li>
				<li><img src="images/ny_detail_03.png" alt="" /> <span>浏览次数： <?php echo $read_num; ?>次</span> </li>
			</ul>
			<div class="con">
				 <?php echo $z_body; ?>
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>