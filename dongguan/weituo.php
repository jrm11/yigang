<?php require "conn.php";?>
<?php
	$nav_id=6;
	
	$act=isset($_GET['act'])?$_GET['act']:'';
	if($act=="post"){
		$username=isset($_POST['username'])?html(trim($_POST['username'])):'';
		$phone=isset($_POST['phone'])?html(trim($_POST['phone'])):'';
		$city=isset($_POST['city'])?html(trim($_POST['city'])):'';
		$xiaoqu=isset($_POST['xiaoqu'])?html(trim($_POST['xiaoqu'])):'';
		$loudonghao=isset($_POST['loudonghao'])?html(trim($_POST['loudonghao'])):'';
		$fanghao=isset($_POST['fanghao'])?html(trim($_POST['fanghao'])):'';
		$huxingshi=isset($_POST['huxingshi'])?html(strtolower(trim($_POST['huxingshi']))):'';
		$huxingting=isset($_POST['huxingting'])?html(strtolower(trim($_POST['huxingting']))):'';
		$huxingchu=isset($_POST['huxingchu'])?html(strtolower(trim($_POST['huxingchu']))):'';
		$huxingwei=isset($_POST['huxingwei'])?html(strtolower(trim($_POST['huxingwei']))):'';
		$mianji=isset($_POST['huxingwei'])?html(strtolower(trim($_POST['huxingwei']))):'';
		$jiage=isset($_POST['jiage'])?html(strtolower(trim($_POST['jiage']))):'';
		$address=isset($_POST['address'])?html(trim($_POST['address'])):'';
		
		if(!preg_match('/1[34578]{1}\d{9}$/',$phone)) {
			 msg ('手机号码不正确');
		}
		
		$sql='insert into book (`username`,`phone`,`city`,`xiaoqu`,`loudonghao`,`fanghao`,`huxingshi`,`huxingting`,`huxingchu`,`huxingwei`,`mianji`,`jiage`,`address`,`wtime`,`ip`,`chakan`,`huifu`,`pass`)values("'.$username.'","'.$phone.'","'.$city.'","'.$xiaoqu.'","'.$loudonghao.'","'.$fanghao.'","'.$huxingshi.'","'.$huxingting.'","'.$huxingchu.'","'.$huxingwei.'","'.$mianji.'","'.$jiage.'","'.$address.'",'.time().',"'.getip().'","no","no","yes")';
		$db->execute($sql);
		
		msg('留言成功，感谢您的留言','location="weituo.php";');
	}
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
		
		<div class="weituo">
			<div class="weituo_nav">
				<a href="index.php">首页</a> / <a href="weituo.php" title="资讯">业主委托</a>
			</div>
			<!---->
			<div class="weituo_form">
				<div class="weituo_form_nav">
					<div class="on">我要卖房</div>
					<div>我要出租</div>
				</div>
				<ul class="weituo_form_con">
					<form name="form1" method="post" action="?act=post"> 
					<input type="hidden" name="address" value="1" />
					<li><div class="tit">所在城市：</div><div class="con">
							<select name="city">
									<option value="请选择">请选择</option>
									<option value="深圳">深圳</option>
									<option value="东莞">东莞</option>
									<option value="惠州">惠州</option>
									<option value="中山">中山</option>
							</select></div></li>
					<li><div class="tit"><span class="red">*</span>小区名称：</div><div class="con"><input type="text" name="xiaoqu" placeholder="请输入小区名称" required/></div></li>
					<li><div class="tit"><span class="red">*</span>整 栋：</div><div class="con"><input type="text" name="loudonghao" placeholder="楼栋号" required/></div></li>
					<li><div class="tit"><span class="red">*</span>房号：</div><div class="con"><input type="text" name="fanghao" placeholder="房号" required/></div></li>
					<li>
						<div class="tit"><span class="red">*</span>户型：</div>
						<div class="con">
							<select name="huxingshi">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							室 &emsp;
							<select name="huxingting">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							厅 &emsp;
							<select name="huxingchu">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							厨 &emsp;
							<select name="huxingwei">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							卫
						</div>
					</li>
					<li><div class="tit"><span class="red">*</span>面积：</div><div class="con"><input class="w225" type="text" name="mianji" placeholder="请填写面积" required/> 平米</div></li>
					<li><div class="tit"><span class="red">*</span>期望售价：</div><div class="con"><input class="w225" type="text" name="jiage" placeholder="请填写您希望出售价格" required/> 万元</div></li>
					<li><div class="tit"><span class="red">*</span>您的称呼：</div><div class="con"><input class="w225" type="text" name="username" placeholder="请填写您的姓名" required/></div></li>
					<li><div class="tit"><span class="red">*</span>手机号码：</div><div class="con"><input class="w225" type="text" name="phone" maxlength="11" placeholder="请填写您的手机号码"required /></div></li>
					<li><div class="tit"></div><div class="con"><input class="w225" type="submit" value="提交委托" /></div></li>
					</form>
				</ul>
				<ul class="weituo_form_con" style="display: none;">
					<form name="form1" method="post" action="?act=post"> 
					<input type="hidden" name="address" value="2" />
					<li><div class="tit">所在城市：</div><div class="con"><input type="text" readonly placeholder="深圳"  name="city" value="深圳"/></div></li>
					<li><div class="tit"><span class="red">*</span>小区名称：</div><div class="con"><input type="text" name="xiaoqu" placeholder="请输入小区名称"required /></div></li>
					<li><div class="tit"><span class="red">*</span>整 栋：</div><div class="con"><input type="text" name="loudonghao" placeholder="楼栋号" required/></div></li>
					<li><div class="tit"><span class="red">*</span>房号：</div><div class="con"><input type="text" name="fanghao" placeholder="房号"required /></div></li>
					<li>
						<div class="tit"><span class="red">*</span>户型：</div>
						<div class="con">
							<select name="huxingshi">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							室 &emsp;
							<select name="huxingting">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							厅 &emsp;
							<select name="huxingchu">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							厨 &emsp;
							<select name="huxingwei">
								<option value="请选择">请选择</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							卫
						</div>
					</li>
					<li><div class="tit"><span class="red">*</span>面积：</div><div class="con"><input class="w225" type="text" name="mianji" placeholder="请填写面积"required /> 平米</div></li>
					<li><div class="tit"><span class="red">*</span>期望租金：</div><div class="con"><input class="w225" type="text" name="jiage" placeholder="请填写您的期望租金" required/> 万元</div></li>
					<li><div class="tit"><span class="red">*</span>您的称呼：</div><div class="con"><input class="w225" type="text" name="username" placeholder="请填写您的姓名" required/></div></li>
					<li><div class="tit"><span class="red">*</span>手机号码：</div><div class="con"><input class="w225" type="text" name="phone" maxlength="11" placeholder="请填写您的手机号码"required /></div></li>
					<li><div class="tit"></div><div class="con"><input class="w225" type="submit" value="提交委托" /></div></li>
					</form>
				</ul>
			</div>
		</div>
		<script type="text/javascript" src="js/index.js" ></script>
		<?php require "bottom.php";?>
	</body>

</html>