<?php require "conn.php";?>
<?php
	$nav_id=3;
	
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id!=''&&!checknum($id)){
		msg('参数错误');
	}
	
	$sql='select * from pro_co where id='.$id.' ';
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
		</div>
		<!--内页导航-->
		<div class="ny_nav">
			<div class="w1170">
				您当前位置：<a href="index.php">首页</a> &gt; <a href="newHouse.php">新房</a> &gt; <?php echo $rstitle; ?>
				<!--<div><a href="#about_01">关于我们</a> 丨 <a href="#about_02">企业文化</a> 丨 <a href="#about_03">发展历程</a></div>-->
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
										$sql='select `id`,`pro_id`,`big_img` from pro_img where pro_id='.$id.' order by id asc';
										$result=$db->query($sql);
										while($rs=$db->getrow($result)){
									?>
									<li><div class="small-img"><img src="<?php echo $rs['big_img'];?>" /></div></li>
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
								$sql='select `id`,`pro_id`,`big_img` from pro_img where pro_id='.$id.' order by id asc';
								$result=$db->query($sql);
								while($rs=$db->getrow($result)){
							?>
							<div class="swiper-slide"><img src="<?php echo $rs['big_img'];?>"/></div>
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
						$sql='select * from pro_co where id='.$id.' ';
						$result=$db->query($sql);
						$rs=$db->getrow($result);
						$jingjiren=$rs['jingjiren']?$rs['jingjiren']:'25';
					?>
					<div class="house_show_t5"><?php echo $rs['title']; ?></div>
					<div class="house_show_t6">均价：<span><?php echo $rs['pro_cs18']; ?> 元/m2</span></div>
					<div class="house_show_t4">基本信息：</div>
					<div>
						详细地址：<?php echo $rs['pro_cs13']; ?> <br />
						主推户型：<div class="huxing"><?php echo $rs['pro_cs14']; ?></div><br />
						开盘时间：<?php echo date('Y-m-d',$rs['pro_cs45']); ?>      交房时间：<?php echo date('Y-m-d',$rs['pro_cs46']); ?>
						
						<div class="secHouse_biaoqian">
							<?php
								$array = explode(",", $rs['pro_cs6']); 
								foreach( $array as $keya => $rowa ){ 
									if( $rowa!='f23'){
										$ts='';
									switch ($rowa){
										 case "f11":$ts='满两年'; break;
										 case "f12":$ts='满五唯一'; break;
										 case "f14":$ts='红本在手'; break;
										 case "f15":$ts='近地铁'; break;
										 case "f16":$ts='不限购'; break;
										 case "f17":$ts='随时看房'; break;
										 case "f18":$ts='急售'; break;
										 case "f19":$ts='南北通透'; break;
										 case "f20":$ts='复式'; break;
										 case "f21":$ts='不看商住两用'; break;
										 case "f22":$ts='新上'; break;
									}

							?>
								<span><?php echo $ts; ?></span>
							<?php
									}
								}
							?>
						</div>
					</div>
					<?php
						$sqll='select * from info_co where id='.$jingjiren.' ';
						$resultl=$db->query($sqll);
						$rsl=$db->getrow($resultl);
					?>
					<div class="jingjiren">
						<img class="img1" src="<?php echo $rsl['img_sl']; ?>"/>
						<div class="jingjiren_con">
							<div class="name"><?php echo $rsl['title']; ?> </div> 好评：<?php echo $rsl['info_from']; ?>
							<div>我了解本房信息，更多请与我联系</div>
							<div class="phone"><a href="tel:<?php echo $rsl['f_body']; ?>"><?php echo $rsl['f_body']; ?></a></div>
						</div>
						<img class="img2" src="<?php echo $rsl['dow_sl']; ?>"/>
					</div>
					<?php  $db->freeresult($resultl); ?>
				</div>
			</div>
			<div class="house_show_box2">
				<!--在售户型-->
				<div class="house_show_t">在售户型</div>
				<div class="secHouse">
					<ul class="newHouse_ul">
						<?php
							$sqla='select * from `'.$tablepre.'pro_co` where `huxing_lm`='.$id.' order by tuijian desc,hot desc,jing desc,px desc,id desc';
							$resulta=$db->query($sqla);
							while($row=$db->getrow($resulta)){
								$hc='';
								switch ($row['pro_cs8']){
								 case "h1":$hc='东';break;
								 case "h2":$hc='南';break;
								 case "h3":$hc='西'; break;
								 case "h4":$hc='北'; break;
								 case "h5":$hc='南北';break;
								}
						?>
						<li>
							<a class="newHouse_ul_img" href="huxingHouse_show.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['img_sl']; ?>"/></a>
							<div class="newHouse_ul_con">
								<a class="t" href="huxingHouse_show.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?>
									<div class="dyj"><?php if($row['tuijian']=='1'){?><span class="ding"></span><?php } ?><?php if($row['hot']=='1'){?><span class="you"></span><?php } ?><?php if($row['jing']=='1'){?><span class="jing"></span><?php } ?>
									</div>
								</a>
								<div>小区名字：<?php echo $row['pro_cs11']; ?></div>
								<dl class="secHouse_mess"><dd>户型<b><?php echo $row['pro_cs14']; ?></b></dd><dd>建筑面积<b><?php echo $row['pro_cs18']; ?>㎡</b></dd><dd>房屋朝向<b><?php echo $hc; ?></b></dd></dl>
								<div class="secHouse_biaoqian">
									<?php
										$array = explode(",", $row['pro_cs6']); 
										foreach( $array as $keya => $rowa ){ 
											if( $rowa!='f23'){
												$ts='';
												switch ($rowa){
													 case "f11":$ts='满两年'; break;
													 case "f12":$ts='满五唯一'; break;
													 case "f14":$ts='红本在手'; break;
													 case "f15":$ts='近地铁'; break;
													 case "f16":$ts='不限购'; break;
													 case "f17":$ts='随时看房'; break;
													 case "f18":$ts='急售'; break;
													 case "f19":$ts='南北通透'; break;
													 case "f20":$ts='复式'; break;
													 case "f21":$ts='不看商住两用'; break;
													 case "f22":$ts='新上'; break;
												}
									?>
										<span><?php echo $ts; ?></span>
									<?php
											}
										}
									?>
								</div>
							</div>
							<div class="newHouse_ul_price"><div class="d1"><?php echo $row['pro_cs19']; ?>万元<div class="d2"><?php echo $row['pro_cs20']; ?>元/㎡</div></div></div>
						</li>
						<?php
							}
							$db->freeresult($resulta);
						?>
					</ul>
				</div>
				<!--楼盘详情-->
				<div class="house_show_t">楼盘详情</div>
				<div class="house_show_t3">基本信息</div>
				<ul class="house_show_jb">
					<li><div class="title">楼盘名称：</div><?php echo $rs['pro_cs11']; ?></li>
					<li><div class="title">楼盘别名：</div><?php echo $rs['pro_cs12']; ?></li>
					<li><div class="title">楼盘地址：</div><?php echo $rs['pro_cs13']; ?></li>
					<li><div class="title">开盘时间：</div><?php echo date('Y-m-d',$rs['pro_cs45']); ?></li>
					<li><div class="title">产     权：</div><?php echo $rs['pro_cs21']; ?></li>
					<li><div class="title">物业公司：</div><?php echo $rs['pro_cs22']; ?></li>
					<li><div class="title">入住时间：</div><?php echo date('Y-m-d',$rs['pro_cs46']); ?></li>
					<li><div class="title">容 积 率：</div><?php echo $rs['pro_cs23']; ?></li>
					<li><div class="title">建筑类型：</div><?php echo $rs['pro_cs24']; ?></li>
					<li><div class="title">规划户数：</div><?php echo $rs['pro_cs25']; ?></li>
					<li><div class="title">物业费用：</div><?php echo $rs['pro_cs27']; ?></li>
					<li><div class="title">开 发 商：</div><?php echo $rs['pro_cs29']; ?></li>
					<li><div class="title">停 车 位：</div><?php echo $rs['pro_cs26']; ?></li>
					<li><div class="title">建筑面积：</div><?php echo $rs['pro_cs28']; ?></li>
					<li><div class="title">物业类型：</div><?php echo $rs['pro_cs30']; ?></li>
					<li><div class="title">绿 化 率：</div><?php echo $rs['pro_cs31']; ?></li>
					<li><div class="title">占地面积：</div><?php echo $rs['pro_cs32']; ?></li>
				</ul>
				<!--小区简介-->
				<div class="house_show_t3">小区简介</div>
				<div><?php echo $rs['pro_cs15']; ?></div>
				<!--交通配套-->
				<div class="house_show_t3">交通配套</div>
				<div>
					<?php echo $rs['pro_cs16']; ?>
				</div>
				<!--附近学校-->
				<div class="house_show_t2">附近学校</div>
				<?php echo $rs['z_body']; ?>
				<!--楼盘图片-->
				<div class="house_show_t2">楼盘图片</div>
				<?php echo $rs['z_body1']; ?>
				
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>