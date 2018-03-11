<?php require "conn.php";?>
<?php
	$nav_id=2;
	
	$sq=' `lm`=49';
	$pra='';
	$dao='';
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
			<div class="ny_banner_d">
				<a href="index.php">首页</a> / <a href="news.php" title="资讯">二手房</a> / <a href="secHouse_xq.php" title="资讯">小区房</a>
			</div>
		</div>
		<!--banner结束-->
		<!--开始找房-->
		<div class="findhouse w1170 showphone">
			<form class="form" action="search.php" method="get">
				<ul>
					<li class="on">
						<input type="radio" name="search" id="ershou" value="ershou" style="display:none" checked/>
						<label for="ershou">二手房</label>
					</li>
					<li>
						<input type="radio" name="search" id="xinfang" value="xinfang" style="display:none" />
						<label for="xinfang">找新房</label>
					</li>
					<li>
						<input type="radio" name="search" id="zufang" value="zufang" style="display:none" />
						<label for="zufang">找租房</label>
					</li>
				</ul>
				<input type="text" value="" name="keyword"/>
				<input type="submit" class="submit" value="" />
			</form>
		</div>
		<!--精选资讯推荐-->
		<div class="secHouse_xq w1170">
			<div class="ind_box2">
				<!--<div class="ind_t">
					<div class="t">深圳二手房小区</div>
					<div>行业引领者和颠覆者，承诺真实房源，提供安心服务，保障消费者权益</div>
				</div>-->
				<ul>
					<?php
						$sqlcount='select count(*) from pro_co_dg where '.$sq.'';
						$sql='select * from `'.$tablepre.'pro_co_dg` where '.$sq.' order by px desc,id desc';
						$counter=$db->getqueryallrow($sqlcount);
						$p=new page();
						$p->setpage($counter,20);
						$sql.=$p->getlimit();
						$result=$db->query($sql);
						$list=$db->getrows($result);
						$db->freeresult($result);
						if ($list){
							foreach ($list as $row){
					?>
						<li>
							<a class="ind_box2_img" href="secHouse_xq_show.php?id=<?php echo $row['id']; ?>" title=""><img src="../<?php echo $row['img_sl']; ?>"/></a>
							<a class="ind_box2_t" href="secHouse_xq_show.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
							<div>区域：<?php echo $row['pro_cs12']; ?></div>
							<div>均价：<?php echo $row['pro_cs44']; ?>元/m2</div>
						</li>
					<?php
							}
						}
					?>
				</ul>
				<div class="page">
					<?php
					if (isset($counter)&&$counter){
					?>
						<table border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td>
								<?php
								echo $p->getpagemenu($pra,2,'','<div><img src="images/page_pre.png" /></div>','<div><img src="images/page_next.png" /></div>','');
								?></td>
							</tr>
						</table>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>