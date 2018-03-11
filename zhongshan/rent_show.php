<?php require "conn.php";?>
<?php
	$nav_id=4;
	
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
				您当前位置：<a href="index.php">首页</a> &gt; <a href="rent.php">租房</a> &gt; <?php echo $rstitle; ?>
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
						<?php echo $rs['pro_cs42']; ?>元/月
					</div>
					<dl class="secHouse_mess"><dd>户型<b><?php echo $rs['pro_cs13']; ?></b></dd><dd>建筑面积<b><?php echo $rs['pro_cs18']; ?>㎡</b></dd><dd>房屋朝向<b><?php echo $hc; ?></b></dd></dl>
					<div>
						<span class='color_span'>装修：</span><?php echo $zx; ?> <br />
						<span class='color_span'>楼层：</span><?php echo $rs['pro_cs20']; ?>&emsp;<?php /*echo $rs['pro_cs21']; */?> &emsp;<br/>
						<span class='color_span'>地址：</span><?php echo $rs['pro_cs12']; ?>
					</div>
					<div class="secHouse_biaoqian rent_show_biaoqian">
						<?php if($rs['pro_cs23']){?><span><?php echo $rs['pro_cs23']; ?> </span>
						<?php }
						if($rs['pro_cs24']){?><span><?php echo $rs['pro_cs24']; ?></span>
						<?php }
						if($rs['pro_cs25']){?><span><?php echo $rs['pro_cs25']; ?></span>
						<?php }
						if($rs['pro_cs26']){?><span><?php echo $rs['pro_cs26']; ?></span>
						<?php } ?></div>
					<?php
					if(isset($rs['jingjiren'])&&$rs['jingjiren']!=''){
						$jingjiren=$rs['jingjiren'];
						$sqll='select * from info_co where id='.$jingjiren.' ';
						$resultl=$db->query($sqll);
						$rsl=$db->getrow($resultl);
					?>
					<div class="jingjiren">
						<img class="img1" src="../<?php echo $rsl['img_sl']; ?>"/>
						<div class="jingjiren_con">
							<div class="name"><?php echo $rsl['title']; ?> </div> 好评：<?php echo $rsl['info_from']; ?>
							<div>我了解本房信息，更多请与我联系</div>
							<div class="phone"><a href="tel:<?php echo $rsl['f_body']; ?>"><?php echo $rsl['f_body']; ?></a></div>
						</div>
						<img class="img2" src="../<?php echo $rsl['dow_sl']; ?>"/>
					</div>
					<?php  $db->freeresult($resultl); 
						}
					?>
				</div>
			</div>
			<div class="house_show_box2">
				<div class="rent_show">
					<div class="rent_show_l">
						<!--小区概况-->
						<div class="house_show_t">房源介绍</div>
						<!--小区简介-->
						<div class="house_show_t3">基本信息</div>
						<div class="rent_show_jb"><span>建筑面积：<?php echo $rs['pro_cs18']; ?>㎡</span><span>套内面积<?php echo $rs['pro_cs19']; ?>㎡</span><span>所在楼层：<?php echo $rs['pro_cs20']; ?></span><span>房屋朝向：<?php echo $hc; ?></span><span>建筑年代：<?php echo $rs['pro_cs21']; ?> </span><span>房屋现状：<?php echo $rs['pro_cs22']; ?></span></div>
						<!--交通配套-->
						<div class="house_show_t3">房屋配置</div>
						<ul class="house_show_rent">
							<li style="display:<?php if($rs['pro_cs27']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons7_03.png" />
								电梯
							</li>
							<li style="display:<?php if($rs['pro_cs28']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons2_03.png" />
								空调
							</li>
							<li style="display:<?php if($rs['pro_cs29']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons3_03.png" />
								冰箱
							</li>
							<li style="display:<?php if($rs['pro_cs30']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons10_03.png" />
								洗衣机
							</li>
							<li style="display:<?php if($rs['pro_cs31']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons9_03.png" />
								热水器
							</li>
							<li style="display:<?php if($rs['pro_cs32']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons11_03.png" />
								燃气灶
							</li>
							<li style="display:<?php if($rs['pro_cs33']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons6_03.png" />
								床
							</li>
							<li style="display:<?php if($rs['pro_cs34']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons5_03.png" />
								沙发
							</li>
							<li style="display:<?php if($rs['pro_cs35']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons12_03.png" />
								餐桌
							</li>
							<li style="display:<?php if($rs['pro_cs35']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons7_03.png" />
								衣柜
							</li>
							<li style="display:<?php if($rs['pro_cs37']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons1_03.png" />
								电视
							</li>
							<li style="display:<?php if($rs['pro_cs38']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons4_03.png" />
								抽油烟机
							</li>
							<li style="display:<?php if($rs['pro_cs39']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons8_03.png" />
								橱柜
							</li>
							<li style="display:<?php if($rs['pro_cs40']=='yes'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons13_03.png" />
								马桶
							</li>
							
							<li class="on" style="display:<?php if($rs['pro_cs27']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons7_03.png" />
								电梯
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs28']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons2_03.png" />
								空调
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs29']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons3_03.png" />
								冰箱
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs30']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons10_03.png" />
								洗衣机
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs31']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons9_03.png" />
								热水器
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs32']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons11_03.png" />
								燃气灶
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs33']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons6_03.png" />
								床
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs34']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons5_03.png" />
								沙发
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs35']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons12_03.png" />
								餐桌
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs35']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons7_03.png" />
								衣柜
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs37']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons1_03.png" />
								电视
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs38']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons4_03.png" />
								抽油烟机
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs39']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons8_03.png" />
								橱柜
							</li>
							<li class="on" style="display:<?php if($rs['pro_cs40']=='no'){echo 'block';}else{ echo 'none';}?>">
								<img src="images/icons13_03.png" />
								马桶
							</li>
						</ul>
						<!--房源介绍-->
						<div class="house_show_t3">房源特色</div>
						<div>
							<?php echo $rs['pro_cs15']; ?> 
						</div>
					</div>
					<div class="rent_show_r">
						<ul class="rent_show_jiqiao">
							<li class="t">租房小技巧</li>
							<?php
								$sql='select * from `'.$tablepre.'info_co` where `lm`=25 and pass="yes" order by px desc,id desc ';
								$result=$db->query($sql);
								$list=$db->getrows($result);
								foreach ( $list as $key => $rsl ) {
							?>
							<li><a href="news_show.php?id=<?php echo $rsl['id']; ?>"><?php echo $rsl['title']; ?></a></li>
							<?php
								}
								$db->freeresult($result);
							?>
							<li><a class="more" href="newsrent.php">更多 >></a></li>
						</ul>
						<ul class="rent_show_fangyuan">
							<li class="t">周边同价位房源</li>
							<?php
								$sql='select * from `'.$tablepre.'pro_co_zs` where `pass`="yes" and `lm`='.$rs['lm'].' and `pro_cs1`="'.$rs['pro_cs1'].'" and `pro_cs3`="'.$rs['pro_cs3'].'" and `id`!='.$id.' order by px desc,id asc limit 4';
								$result=$db->query($sql);
								$list=$db->getrows($result);
								foreach ( $list as $key => $rsl ) {
							?>
							<li>
								<a class="img" href="rent_show.php?id=<?php echo $rsl['id']; ?>"><img src="../<?php echo $rsl['img_sl']; ?>"/></a>
								<div class="con">
									<a class="con_t1"><?php echo getstr($rsl['title'],14); ?></a>
									<div class="con_t2"><?php echo $rsl['pro_cs14']; ?>元/月</div>
									<div class="con_t3"><?php echo $rsl['pro_cs23']; ?>   <?php echo $rsl['pro_cs24']; ?></div>
								</div>
							</li>
							<?php
								}
								$db->freeresult($result);
							?>
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>