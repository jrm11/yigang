<!--手机菜单-->
<div class="phone_menu_trigger">
	<div></div>
	<div></div>
	<div></div>
</div>
<ul class="phone_menu">
	<li><a href="index.php">首页</a></li>
	<li class="phone_menu_sec"><a href="javascript:;">二手房</a>
		<dl>
			<dd><a href="secHouse.php">房源</a></dd>
			<dd><a href="secHouse_xq.php">小区</a></dd>
			<dd><a href="secHouse_xuequ.php">学区房</a></dd>
		</dl>
	</li>
	<li><a href="newHouse.php">新房</a></li>
	<li><a href="rent.php">租房</a></li>
	<li><a href="news.php">资讯</a></li>
	<li><a href="weituo.php">业主委托</a></li>
	<li><a href="about.php">关于我们</a></li>
	<li><a href="contact.php">联系我们</a></li>
</ul>
<script type="text/javascript">
	$(function(){
		function slideupdown(obj){
			var visible=obj.is(':visible');
			if(visible){
				obj.prev().removeClass('open');
				obj.slideUp();
			}else{
				obj.prev().addClass('open');
				obj.slideDown().parent().siblings('li').find('dl').slideUp().prev().removeClass();
			}
		}
		function slideupdown2(obj){
			var visible=obj.is(':visible');
			if(visible){
				obj.slideUp();
				$('body,html').css({'height':'auto','overflow':'visible'});
			}else{
				obj.slideDown();
				$('body,html').css({'height':'100%','overflow':'hidden'});
			}
		}
		//手机菜单栏控制
		$(function(){
			$('.phone_menu_trigger').click(function(){
				$(this).toggleClass('on');
				var phone_menu=$('.phone_menu');
				slideupdown2(phone_menu);
			})
			$('.phone_menu li').each(function(){
				$(this).click(function(){
					var dls=$(this).find('dl');
					slideupdown(dls);
				})
			})
		})
	})
</script>
<!--手机菜单结束-->
<div class="fixed_bottom">
	<a href="index.php"><img src="images/fix_index.png" alt="返回首页" /><br />返回首页</a>
	<?php
		$sql='select * from `'.$tablepre.'info_co` where lm=32 limit 1';
		$result=$db->query($sql);
		$list=$db->getrow($result);
	?>
	<a href="tel:<?php echo $list['title']; ?>"><img src="images/fix_phone2.png" alt="电话咨询" /><br />电话咨询</a>
	<?php
		$db->freeresult($result);
	?>
	<?php
		$sql='select * from `'.$tablepre.'info_co` where lm=34 limit 1';
		$result=$db->query($sql);
		$list=$db->getrow($result);
	?>
	<a href="mqqwpa://im/chat?chat_type=wpa&uin=<?php echo $list['title'];?>&version=1&src_type=web&web_src=oicqzone.com" target="_blank"><img src="images/fix_online2.png" alt="在线咨询" /><br />QQ咨询</a>
	<?php
		$db->freeresult($result);
	?>
	
	<a href="about.php"><img src="images/fix_about.png" alt="qq" /><br />关于我们</a>
</div>
<!--css-->
<style>
	.fixed_bottom{position: fixed;bottom: 0;left: 0;width: 100%;display: none;z-index: 999999999;font: normal 13px/16px "微软雅黑";}
	.fixed_bottom:after{content: '';display:block;clear:both}
	.fixed_bottom a{display: block;float: left;width: 25%;background:#008033;text-align: center;color: #fff;padding:7px 0;}
	.fixed_bottom a img{width: 24px;}
	@media only screen and (max-width:768px ) {
		.fixed_bottom{display:block}
	}
</style>

<div class="header">
	<div class="w1170">
		<div class="header_l">买房就上亿港地产！<span class='address_sel'>中山</span></div>
		<div class="header_r">
			<div class="header_r_d">
				<img src="images/header_01.jpg" alt=""/>
				 联系人：
				<?php
					$sql='select * from `'.$tablepre.'info_co` where lm=30 limit 1';
					$result=$db->query($sql);
					$list=$db->getrow($result);
					echo $list['title'];
					$db->freeresult($result);
				?>
			</div>
			<div class="header_r_d">
				分享到：<div class="bshare-custom icon-medium"><div class="bsPromo bsPromo2"></div><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=3&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
			</div>
		</div>
	</div>
</div>
<!--导航菜单-->
<div class="header2 w1170">
	<a class="header2_logo" href="index.php"><img src="images/index_logo.jpg" alt="亿港地产"/></a>
	<span class='address_sel'>中山</span>
	<ul class="nav">
		<li <?php if($nav_id==1){echo 'class="on"';}?>><a href="index.php">首页</a></li>
		<li <?php if($nav_id==2){echo 'class="on"';}?>><a href="secHouse.php">二手房</a>
			<dl class="nav_sec">
				<dd><a href="secHouse.php">房源</a></dd>
				<dd><a href="secHouse_xq.php">小区</a></dd>
				<dd><a href="secHouse_xuequ.php">学区房</a></dd>
			</dl>
		</li>
		<li <?php if($nav_id==3){echo 'class="on"';}?>>
			<a href="newHouse.php">新房</a>
		</li>
		<li <?php if($nav_id==4){echo 'class="on"';}?>>
			<a href="rent.php">租房</a>
		</li>
		<li <?php if($nav_id==5){echo 'class="on"';}?>><a href="news.php">资讯</a></li>
		<li <?php if($nav_id==6){echo 'class="on"';}?>><a href="weituo.php">业主委托</a></li>
		<li <?php if($nav_id==7){echo 'class="on"';}?>><a href="about.php">关于我们</a></li>
		<li <?php if($nav_id==8){echo 'class="on"';}?>><a href="contact.php">联系我们</a>
		</li>
	</ul>
</div>
<!--右侧侧边栏-->
<ul class="fixed">
	<li class="close">
		<img src="images/fix_online.png" alt="" />
		<div class="hover_con">
			24小时在线客服
		</div>
	</li>
	<li>
		<img src="images/fix_phone.png" alt="" />
		<div class="hover_con">
			<?php
				$sql='select * from `'.$tablepre.'info_co` where lm=27 limit 1';
				$result=$db->query($sql);
				$list=$db->getrow($result);
				echo $list['title'];
				$db->freeresult($result);
			?>
		</div>
	</li>
	<li>
		<img src="images/fix_qq.png" alt="" />
		<?php
			$sql='select * from `'.$tablepre.'info_co` where lm=28 limit 1';
			$result=$db->query($sql);
			$list=$db->getrow($result);
		?>
		<a href="tencent://AddContact/?fromId=45&fromSubId=1&subcmd=all&uin=<?php echo $list['title']; ?>"><div class="hover_con">
		<?php
			$db->freeresult($result);
		?>
			QQ在线
		</div></a>
	</li>
	<li>
		<img src="images/fix_wx.png" alt="" />
		<div class="hover_con">
			<?php
				$sql='select * from `'.$tablepre.'info_co` where lm=29 limit 1';
				$result=$db->query($sql);
				$list=$db->getrow($result);
			?>
			<img class="weixin" src="<?php echo $list['img_sl']; ?>" alt="icon" />
			<?php
				$db->freeresult($result);
			?>
		</div>
	</li>
	<li class="scrolltop"><img src="images/fix_top.png" alt="icon" /></li>
</ul>
<div class="bound-city bounceIn" id="boundCity">
	<div class="bound-city-bg"></div>
	<div class="bound-city-cont">
		<div class="bound-city-bg" style="position:absolute;"></div>
		<div class="city-box">
			<h5>
				<a class="bound-closed change-city-closed" href="javascript:;">x</a>切换城市
			</h5>
			<div class="city-text">
				<p class="city-tit">亲爱的用户您好，</p>
				<p>选择目标城市，让我们为您提供更准确的房源信息</p>
				<p class="city-dw">点击进入<span id="000002" class="change-city-closed">中山</span>或切换到以下城市</p>
				<div class="city-name">
					
					<a href="http://shenfang8.com/">深圳</a>
					<a href="http://shenfang8.com/dongguan">东莞</a>
					<a href="http://shenfang8.com/huizhou">惠州</a>
				</div>
				<p class="last">其它城市正在开通中，敬请期待～</p>
			</div>
		</div>
	</div>
</div>
<!--右侧侧边栏js-->
<script>
	$(function(){
		var st=$('.scrolltop');
		st.click(function(){
			$('body,html').animate({scrollTop:0},500)
		})
		showorhide(st);
		$(window).scroll(function(){
			showorhide(st);
		})
	})
	function showorhide(obj){
		var w_top=$(window).scrollTop();
		if(w_top>300){
			obj.fadeIn();
		}else{
			obj.fadeOut();
		}
	}
	function showorhide(obj){
		var w_top=$(window).scrollTop();
		if(w_top>300){
			obj.fadeIn();
		}else{
			obj.fadeOut();
		}
	}
	//选择地址
	$('.address_sel').click(function(){
		$('#boundCity').show();
	})
	$('.bound-closed').click(function(){
		$('#boundCity').hide();
	})
</script>
