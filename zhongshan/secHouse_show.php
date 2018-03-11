<?php require "conn.php";?>
<?php
	$nav_id=2;
	
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id!=''&&!checknum($id)){
		msg('参数错误');
	}
	
	$sql='select * from pro_co_zs where id='.$id.' ';
	$result=$db->query($sql);
	$rs=$db->getrow($result);
	$rstitle=$rs['title'];
	$db->freeresult($result);
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
		<div class="ny_banner hidePhone">
			<img src="images/ny_banner.jpg"/>
			<div class="ny_banner_d">
				<a href="index.php">首页</a> / <a href="secHouse.php" title="二手房">二手房</a>
			</div>
		</div>
		<!--内页导航-->
		<div class="ny_nav">
			<div class="w1170">
				您当前位置：<a href="index.php">首页</a> &gt; <a href="secHouse.php">二手房</a> &gt; <a href="secHouse.php">房源</a> &gt; <?php echo $rstitle; ?>
			</div>
		</div>
		<!--banner结束-->
		<!--新房展示-->
		<div class="house_show w1170">
			<div class="house_show_box1">
				<div class="house_show_box1_l">
					<div class="magnifier" id="magnifier1">
						<div class="magnifier-container">
							<div class="images-cover"></div>
							<!--当前图片显示容器-->
							<div class="move-view"></div>
							<!--跟随鼠标移动的盒子-->
						</div>
						<div class="magnifier-assembly">
							<div class="magnifier-btn">
								<span class="magnifier-btn-left">&lt;</span>
								<span class="magnifier-btn-right">&gt;</span>
							</div>
							<!--按钮组-->
							<div class="magnifier-line">
								<ul class="clearfix animation03">
									<?php
										$sql='select `id`,`pro_id`,`big_img` from pro_img_zs where pro_id='.$id.' order by id asc';
										$result=$db->query($sql);
										while($rs=$db->getrow($result)){
									?>
									<li><div class="small-img"><img src="../<?php echo $rs['big_img'];?>" /></div></li>
									<?php
										}
										$db->freeresult($result);
									?>
								</ul>
							</div>
							<!--缩略图-->
						</div>
						<div class="magnifier-view"></div>
						<!--经过放大的图片显示容器-->
					</div>
					<link rel="stylesheet" href="js/magnifier/magnifier.css" />
					<script type="text/javascript" src="js/magnifier/magnifier.js"></script>
					<script type="text/javascript">
					$(function() {
						var magnifierConfig = {
							magnifier : "#magnifier1",//最外层的大容器
							width :570,//承载容器宽
							height :440,//承载容器高
							moveWidth : null,//如果设置了移动盒子的宽度，则不计算缩放比例
							zoom : 5//缩放比例
						};
						var _magnifier = magnifier(magnifierConfig);
					});
					</script>
				</div>
				<!--手机版产品图开始-->
					<div class="swiper-container swlb_phone">
						<a class="arrow-left" href="#"></a>
						<a class="arrow-right" href="#"></a>
						<div class="swiper-wrapper">
							<?php
								$sql='select `id`,`pro_id`,`big_img` from pro_img_zs where pro_id='.$id.' order by id asc';
								$result=$db->query($sql);
								while($rs=$db->getrow($result)){
							?>
							<div class="swiper-slide"><img src="../<?php echo $rs['big_img'];?>"/></div>
							<?php
								}
								$db->freeresult($result);
							?>
						</div>
						<div class="pagination page_prodet"></div>
					</div>
					<script src="js/swiper/idangerous.swiper.js"></script>
					<script>
					var mySwiper = new Swiper('.swlb_phone',{
						pagination: '.page_prodet',
						paginationClickable: true,
						loop:true,
						autoplay:0,//自动切换时间
						autoplayDisableOnInteraction:false,//用户操作后不停止
						slidesPerView:1,//容器可视个数
						slidesPerGroup:1,//多少个为一组
						//		useCSS3Transforms:false,
					})
					var len=$('.page_prodet span').length;
					$('.page_prodet span').each(function(i){
						$(this).html((i+1)+'/'+len);
					})
					</script>
					<!--手机版产品图结束-->

				<div class="house_show_box1_r">
					<?php
						$sql='select * from pro_co_zs where id='.$id.' ';
						$result=$db->query($sql);
						$rs=$db->getrow($result);
						$jingjiren=$rs['jingjiren']?$rs['jingjiren']:'25';
						
								$hc='';
								switch ($rs['pro_cs8']){
								 case "h1":$hc='东';break;
								 case "h2":$hc='南';break;
								 case "h3":$hc='西'; break;
								 case "h4":$hc='北'; break;
								 case "h5":$hc='南北';break;
								}
								$zx='';
								switch ($rs['pro_cs9']){
								 case "i1":$zx='毛胚';break;
								 case "i2":$zx='普通装修';break;
								 case "i3":$zx='精装修'; break;
								 case "i4":$zx='豪华装修'; break;
								}
					?>
					<div class="house_show_t5"><?php echo $rs['title']; ?> </div>
					<div class="secHouse_t1">
						<?php echo $rs['pro_cs43']; ?>万
						<div><?php echo $rs['pro_cs44']; ?>元/m2</div>
					</div>
					<dl class="secHouse_mess"><dd>户型<b><?php echo $rs['pro_cs14']; ?></b></dd><dd>建筑面积<b><?php echo $rs['pro_cs18']; ?>㎡</b></dd><dd>房屋朝向<b><?php echo $hc; ?></b></dd></dl>
					<div>
						装修情况：<?php echo $zx; ?> | 套内面积<?php echo $rs['pro_cs21']; ?>㎡ <br />
						楼层高度：<?php echo $rs['pro_cs22']; ?> <br />
						小区名称：<?php echo $rs['pro_cs11']; ?><br />
						详细地址：<?php echo $rs['pro_cs12']; ?><br />
						房源编号：<?php echo $rs['pro_cs13']; ?> 
					</div>
					<?php
						
						$sqll='select * from info_co where id='.$jingjiren.' ';
						$resultl=$db->query($sqll);
						$rsl=$db->getrow($resultl);
					?>
					<div class="jingjiren">
						<img class="img1" src="../<?php echo $rsl['img_sl']; ?>"/>
						<div class="jingjiren_con">
							<div class="name"><?php echo $rsl['title']; ?> </div> 好评：<?php echo $rsl['info_from']; ?>
							<div>我了解本房信息，更多请与我联系</div>
							<div class="phone"><a href="tel:<?php echo $rsl['f_body']; ?>"><?php echo $rsl['f_body']; ?> </a></div>
						</div>
						<img class="img2" src="../<?php echo $rsl['dow_sl']; ?>"/>
					</div>
					<?php  $db->freeresult($resultl); ?>
				</div>
			</div>
			<div class="house_show_box2">
				<!--小区概况-->
				<div class="house_show_t">小区概况</div>
				<!--小区简介-->
				<div class="house_show_t2">基本信息</div>
				<div class="house_show_t3" style="margin: 0;">附近学校</div>
				<div>
					<?php echo $rs['pro_cs15']; ?>
				</div>
				<!--交通配套-->
				<div class="house_show_t3">交通配套</div>
				<div>
					<?php echo $rs['pro_cs16']; ?>
				</div>
				<!--房源介绍-->
				<div class="house_show_t2">房源介绍</div>
				<div class="house_show_t3" style="margin: 0;">房源亮点</div>
				<div><?php echo $rs['pro_cs17']; ?></div>
				<!--附近学校-->
				<div class="house_show_t2">小区简介</div>
				<?php echo $rs['z_body']; ?>
				
				<!--楼盘图片-->
				<div class="house_show_t2">楼盘图片</div>
				<?php echo $rs['z_body1']; ?>
				<?php  $db->freeresult($result); ?>
				
				<!--其他经纪人-->
				<?php require "showjingjiren.php";?>
				
				<!--周边同价房源-->
				<?php require "showtongjia.php";?>
				
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		
		<!--底部-->
		<?php require "bottom.php";?>
	</body>

</html>