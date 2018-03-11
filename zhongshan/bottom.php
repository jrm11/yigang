
<div class="footer1">
	<div class="footer1_con">
		<div>
			<div class="footer1_con_t1">随时，随地浏览最新房源</div>
			<div class="footer1_con_t2">一切以客户价值为依归</div>
			<img src="images/code.jpg"/>
		</div>
	</div>
</div>
<div class="footer2">
<form name="form1" method="post" action="secHouse.php?act=post"> 
	<div class="mianzeshengming">
		<?php
			$sql='select * from `'.$tablepre.'info_co` where lm=31 limit 1';
			$result=$db->query($sql);
			$list=$db->getrow($result);
			echo $list['f_body'];
			$db->freeresult($result);
		?>
	</div>
	<ul class="footer2_ul w1170">
		<li>
			<img src="images/bottom1_logo.png"/>
			<div>一切以客户价值为依归</div>
		</li>
		
		<li class="tijiao">
			<div>
				<a><input type="radio" name="add" id="ershou1" value="南山" style="display:none;"  /><label for="ershou1">南山二手房</label></a>
				<a><input type="radio" name="add" id="ershou2" value="福田" style="display:none;"  /><label for="ershou2">福田二手房</label></a>
				<a><input type="radio" name="add" id="ershou3" value="罗湖" style="display:none;"  /><label for="ershou3">罗湖二手房</label></a>
				<a><input type="radio" name="add" id="ershou4" value="宝安" style="display:none;"  /><label for="ershou4">宝安二手房</label></a>
			</div>
			<div class="">
				<a><input type="radio" name="add" id="ershou5" value="龙岗" style="display:none;"  /><label for="ershou5">龙岗二手房</label></a>
				<a><input type="radio" name="add" id="ershou6" value="龙华" style="display:none;"  /><label for="ershou6">龙华二手房</label></a>
				<a><input type="radio" name="add" id="ershou7" value="光明" style="display:none;"  /><label for="ershou7">光明二手房</label></a>
				<a><input type="radio" name="add" id="ershou8" value="盐田" style="display:none;"  /><label for="ershou8">盐田二手房</label></a>
			</div>
		</li>
		 <?php
			$sql='select * from `'.$tablepre.'info_co` where lm=24 order by px desc,id asc limit 2';
			$result=$db->query($sql);
			$list=$db->getrows($result);
			foreach ( $list as $key => $row ) {
		?>
			<li><?php echo $row['z_body']; ?></li>
		<?php
			}
			$db->freeresult($result);
		?>
	</ul>
	</form>
		<script>
			$('.tijiao input').click(function(){
				$('.footer2 form').submit();
			})
		</script>
</div>
<div class="footer3">
	<?php echo $site_bot; ?>
	推广支持：<a href="http://www.shizhanren.cn" target="_blank">实战人互联</a>  <script src="https://s22.cnzz.com/z_stat.php?id=1271413914&web_id=1271413914" language="JavaScript"></script>
</div>


<!--图片延时加载-->
<script type="text/javascript" src="js/echo/echo.min.js" ></script>
<script type="text/javascript">
	Echo.init({
		offset:0,
		throttle:0
	})
</script>