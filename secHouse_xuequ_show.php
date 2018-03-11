<?php require "conn.php";?>
<?php
	$nav_id=2;
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
		<!--<div class="ny_banner">
			<img src="images/ny_banner.jpg"/>
			<div class="ny_banner_d">
				<a href="index.php">首页</a> / <a href="secHouse.php" title="二手房">二手房</a>
			</div>
		</div>-->
		<!--内页导航-->
		<div class="ny_nav">
			<div class="w1170">
				您当前位置：<a href="index.php">首页</a> &gt; <a href="secHouse.php">二手房</a> &gt; <a href="secHouse_xq.php">房源</a> &gt; 新一代国际公寓，实用户型景观采光优越装修保养好
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
									<li><div class="small-img"><img src="images/index_box2_01.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_02.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_03.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_04.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_04.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_04.jpg" /></div></li>
									<li><div class="small-img"><img src="images/index_box2_01.jpg" /></div></li>
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
				<div class="house_show_box1_r">
					<div class="house_show_t5">新一代国际公寓，实用户型景观采光优越装修保养好 </div>
					<div class="secHouse_t1">
						720万
						<div>912162元/m2</div>
					</div>
					<dl class="secHouse_mess"><dd><b>2室2厅</b>户型</dd><dd><b>74.69平米</b>建筑面积</dd><dd><b>南北</b>房屋朝向</dd></dl>
					<div>
						装修情况：精装 | 套内面积65㎡ <br />
						小区名称：新一代国际公寓<br />
						详细地址：观澜大道锦山公园北侧<br />
						房源编号S1133494 (房协编号U177572315127) 
					</div>
					<div class="jingjiren">
						<img class="img1" src="images/jingjiren_01.jpg"/>
						<div class="jingjiren_con">
							<div class="name">方小玲</div> 好评：100%
							<div>我了解本房信息，更多请与我联系</div>
							<div class="phone">15875454118</div>
						</div>
						<img class="img2" src="images/jingjiren_02.jpg"/>
					</div>
				</div>
			</div>
			<div class="house_show_box2">
				<!--楼盘详情-->
				<div class="house_show_t">小区概况</div>
				<div class="house_show_t2">基本信息</div>
				<!--小区简介-->
				<div class="house_show_t3" style="margin: 0;">小区简介</div>
				<div>雨田村二期，坐落于福田福田莲花路与雨田路交汇处，占地面积9000㎡，小区总共有3栋、总共约有208户，主要户型有：212.51平米的5室2厅、107.01平米的4室2厅、154.99平米的4室2厅、108平米的4室2厅；小区绿化率高，附近五公里内购物中心有梅林购物广场、景田综合市场、星光广场；超市有华润万家生鲜超市、大润华生活超市、华润万家便利超市、万家惠超市(梅林店)、华润万家生鲜超市；菜市场有佰华洲净菜市场、惠民街市莲花北店、景田肉菜市场；楼盘1公里范围内有地铁站莲花北、梅村，公交车站有莲花北村①、北环中学、彩田村北、华茂苑、上梅林、上梅林村、梅林牌坊、彩田村②、上梅林市场、彩田村①，购物和出行都很方便。</div>
				<!--交通配套-->
				<div class="house_show_t3">交通配套</div>
				<div>
					地铁距4号线莲花北站 432米距9号线梅村站 952米<br />
					公交莲花北村①站112米(14班车经过)福盛美超市站188米(1班车经过)莲花北村②站259米(5班车经过)
				</div>
				<!--房源介绍-->
				<div class="house_show_t2">房源介绍</div>
				<div class="house_show_t3" style="margin: 0;">房源亮点</div>
				<div>这个户型使用率非常高，72个平米的房子做三房完全不会感觉拥挤，设计非常合理。总共18层的小高层，这套房子在15楼以上，视野采光都非常好。</div>
				<div class="house_show_t3">产权状况</div>
				<div>业主红本在手，满五年，名下只有这一套房子。</div>
				<div class="house_show_t3">税费解析</div>
				<div>房子税费只有一个点的契税，个人所得税和增值税都是没有的，税费很低。</div>
				
				<!--附近学校-->
				<div class="house_show_t2">附近学校</div>
				<ul class="house_school">
					<li><div>学校名称</div><div>类别</div><div>办学性质</div><div>所在城区</div><div>学校地址</div></li>
					<li><div>彩田学校</div><div>初中部</div><div>公办</div><div>龙华 </div><div>深圳市福田区彩田村内</div></li>
					<li><div>彩田学校</div><div>小学</div><div>公办</div><div>龙华 </div><div>深圳市福田区彩田村内</div></li>
				</ul>
				<!--楼盘图片-->
				<div class="house_show_t2">楼盘图片</div>
				<img src="images/newHouse_show_01.jpg" alt="" />
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>