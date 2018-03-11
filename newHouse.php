<?php require "conn.php";?>
<?php
	$nav_id=3;
	
	$keyword=(isset($_REQUEST['keyword']))?$_REQUEST['keyword']:'';
	$act=isset($_REQUEST['act'])?$_REQUEST['act']:'';
	$pct=isset($_REQUEST['pct'])?$_REQUEST['pct']:'';
	
	$a=(isset($_REQUEST['a']))?$_REQUEST['a']:'';
	$b=(isset($_REQUEST['b']))?$_REQUEST['b']:'';
	$c=(isset($_REQUEST['c']))?$_REQUEST['c']:'';
	$d=(isset($_REQUEST['d']))?$_REQUEST['d']:'';
	$e=(isset($_REQUEST['e']))?$_REQUEST['e']:'';
	$f=(isset($_REQUEST['f']))?$_REQUEST['f']:'';
	$g=(isset($_REQUEST['g']))?$_REQUEST['g']:'';
	$h=(isset($_REQUEST['h']))?$_REQUEST['h']:'';
	$i=(isset($_REQUEST['i']))?$_REQUEST['i']:'';
	$j=(isset($_REQUEST['j']))?$_REQUEST['j']:'';
	
	$k=(isset($_REQUEST['k']))?$_REQUEST['k']:'';
	$l=(isset($_REQUEST['l']))?$_REQUEST['l']:'';
	
	$paixu=(isset($_REQUEST['paixu']))?$_REQUEST['paixu']:'moren';
	
	$sc='';
	$sd='';
	$se='';
	$sf='';
	$sg='';
	$sh='';
	$si='';
	$sj='';
	
	$sq=' `lm`=47 and `huxing_lm`=1';
	$pra='';
	$dao='';
	if($act=='post'){
		if($a){
			$sq.=' and `pro_cs1`="'.$a.'"';
			$pra.='&a='.$a.'';
		}
		if($b){
			$sq.=' and `pro_cs2`="'.$b.'"';
			$pra.='&b='.$b.'';
		}
		if($k){
			$sq.=' and `pro_can1`="'.$k.'"  ';
			$pra.='&k='.$k.'';
		}
		if($l){
			$sq.=' and `pro_can2`="'.$l.'" ';
			$pra.='&l='.$l.'';
		}
		if($c){
			$sc=implode('","',$c);
			$zc=implode(',',$c);
			$sq.=' and `pro_cs3` in ("'.$sc.'")';
			$pra.='&c='.$zc;
		}
		if($d){
			$sd=implode('","',$d);
			$zd=implode(',',$d);
			$sq.=' and `pro_cs4` in ("'.$sd.'")';
			$pra.='&d='.$zd.'';
		}
		if($e){
			$se=implode(',',$e);
			foreach($e as $key => $row){
				if($key==0){
					$qwe='`pro_cs41` like "%'.$row.'%" ';
				}else{
					$qwe.=' or `pro_cs41` like "%'.$row.'%"';
				}
			};
			$sq.=' and ( '.$qwe.' ) ';
			$pra.='&e='.$se.'';
		}
		if($f){
			$sf=implode(',',$f);
			foreach($f as $key => $row){
				if($key==0){
					$qwe='`pro_cs6` like "%'.$row.'%" ';
				}else{
					$qwe.=' or `pro_cs6` like "%'.$row.'%"';
				}
			};
			$sq.=' and ( '.$qwe.' ) ';
			$pra.='&f='.$sf.'';
		}
		if($g!=''){
			$sg=implode('","',$g);
			$zg=implode(',',$g);
			$sq.=' and `pro_cs7` in ("'.$sg.'")';
			$pra.='&g='.$zg.'';
		}
		if($h!=''){
			$sh=implode('","',$h);
			$zh=implode(',',$h);
			$sq.=' and `pro_cs8` in ("'.$sh.'")';
			$pra.='&h='.$zh.'';
		}
		if($i!=''){
			$si=implode('","',$i);
			$zi=implode(',',$i);
			$sq.=' and `pro_cs9` in ("'.$si.'")';
			$pra.='&i='.$zi;
		}
		if($j!=''){
			$sj=implode('","',$j);
			$zj=implode(',',$j);
			$sq.=' and `pro_cs10` in ("'.$sj.'")';
			$pra.='&j='.$zj.'';
		}
	}
	
	if($pct=='post'){
		if($a){
			$sq.=' and `pro_cs1`="'.$a.'"';
			$pra.='&a='.$a;
		}
		if($b){
			$sq.=' and `pro_cs2`="'.$b.'"';
			$pra.='&b='.$b;
		}
		if($k){
			$sq.=' and `pro_can1`="'.$k.'"  ';
			$pra.='&k='.$k.'';
		}
		if($l){
			$sq.=' and `pro_can2`="'.$l.'" ';
			$pra.='&l='.$l.'';
		}
		if($c){
			$sq.=' and `pro_cs3`="'.$c.'"';
			$pra.='&c='.$c;
		}
		if($d){
			$sq.=' and `pro_cs4`="'.$d.'"';
			$pra.='&d='.$d;
		}
		if($e){
			$sq.=' and `pro_cs5`="'.$e.'"';
			$pra.='&e='.$e;
		}
		if($f){
			$sq.='and (`pro_cs6` like "%'.$f.'%" )';
			$pra.='&f='.$f;
		}
		if($g!=''){
			$sq.=' and `pro_cs7`="'.$g.'"';
			$pra.='&g='.$g;
		}
		if($h!=''){
			$sq.=' and `pro_cs8`="'.$h.'"';
			$pra.='&h='.$h;
		}
		if($i!=''){
			$sq.=' and `pro_cs9`="'.$i.'"';
			$pra.='&i='.$i;
		}
		if($j!=''){
			$sq.=' and `pro_cs10`="'.$j.'"';
			$pra.='&j='.$j;
		}
	}
	
	$paixua='tuijian desc,hot desc,jing desc';
	if($paixu=='moren'){
		$paixua='tuijian desc,hot desc,jing desc,px desc,id asc';
		$pra.='&paixu=moren';
	}
	if($paixu=='zuixin'){
		$paixua='id desc,px desc';
		$pra.='&paixu=zuixin';
	}
	if($paixu=='junjia'){
		$paixua='pro_cs18 asc';
		$pra.='&paixu=junjia';
	}
	if($paixu=='kaipan'){
		$paixua='pro_cs45 asc';
		$pra.='&paixu=kaipan';
	}
	
	if($keyword!=''){
		$sq.=' and (title like "%'.$keyword.'%" )';
		$pra.='&keyword='.urlencode($keyword).'';
		$dao=' &gt; 搜索结果';
	}
	
	if(isset($_GET['c'])){
		$array = explode(",", $c);
		$sc=implode('","',$array);
		$sq.=' and `pro_cs3` in ("'.$sc.'")';
		$pra.='&c='.$c;
	}
	if(isset($_GET['d'])){
		$array = explode(",", $d);
		$sd=implode('","',$array);
		$sq.=' and `pro_cs4` in ("'.$sd.'")';
		$pra.='&d='.$d;
	}
	if(isset($_GET['e'])){
		$array = explode(",", $e);
		$se=implode('","',$array);
		$sq.=' and `pro_cs5` in ("'.$se.'")';
		$pra.='&e='.$e;
	}
	if(isset($_GET['f'])){
		$array = explode(",", $f);
		$sf=implode('","',$array);
		$sq.=' and `pro_cs6` in ("'.$sf.'")';
		$pra.='&f='.$f;
	}
	if(isset($_GET['g'])){
		$array = explode(",", $g);
		$sg=implode('","',$array);
		$sq.=' and `pro_cs7` in ("'.$sg.'")';
		$pra.='&g='.$g;
	}
	if(isset($_GET['h'])){
		$array = explode(",", $h);
		$sh=implode('","',$array);
		$sq.=' and `pro_cs8` in ("'.$sh.'")';
		$pra.='&h='.$h;
	}
	if(isset($_GET['i'])){
		$array = explode(",", $i);
		$si=implode('","',$array);
		$sq.=' and `pro_cs9` in ("'.$si.'")';
		$pra.='&i='.$i;
	}
	if(isset($_GET['j'])){
		$array = explode(",", $j);
		$sj=implode('","',$array);
		$sq.=' and `pro_cs10` in ("'.$sj.'")';
		$pra.='&j='.$j;
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
		
		
		<?php if($f!=''||$g!=''||$h!=''||$i!=''||$j!=''){?>
		<script type="text/javascript">
			$(function(){
				$('.tiaojian_more').addClass('on');
				$('.tiaojian_more').html('收起选项');
				$('.tiaojian li').show();
			})
		</script>
		<?php }?>
	</head>

	<body>
		<?php require "top.php";?>
		
		<div class="ny_banner">
			<img src="images/ny_banner.jpg"/>
			<div class="ny_banner_d">
				<a href="index.php">首页</a> / <a href="newHouse.php" title="新房">新房</a>
			</div>
		</div>
		<!--banner结束-->
		<!-- 开始找房 -->
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
		<?php if($f!=''||$g!=''||$h!=''||$i!=''||$j!=''){?>
		<script type="text/javascript">
			$(function(){
				$('.tiaojian_more').addClass('on');
				$('.tiaojian_more').html('收起选项');
				$('.tiaojian li').show();
			})
		</script>
		<?php }?>
		<?php 
			$sjiageg='';
			switch ($c){
				 case "c1":$sjiageg='50万以下'; break;
				 case "c2":$sjiageg='50-100万'; break;
				 case "c3":$sjiageg='100-150万'; break;
				 case "c4":$sjiageg='150-200万'; break;
				 case "c5":$sjiageg='200万以上'; break;
			}
			$smianji='';
			switch ($d){
				 case "d1":$smianji='50㎡以下'; break;
				 case "d2":$smianji='50-70㎡'; break;
				 case "d3":$smianji='70-90㎡'; break;
				 case "d4":$smianji='90-110㎡'; break;
				 case "d5":$smianji='110-130㎡'; break;
				 case "d6":$smianji='130-150㎡'; break;
				 case "d7":$smianji='150㎡以上'; break;
			}
		?>
		<!--条件搜索手机版开始-->
		<ul class="tiaojian_phone_trigger">
			<li <?php if($a!=''||$b!=''){echo "class='on'";}?>>区域</li>
			<li <?php if($c!=''){echo "class='on'";}?>><div><?php if($c==''){echo "价格";}else{ echo "$sjiageg"; }?></div></li>
			<li <?php if($d!=''){echo "class='on'";}?>><div><?php if($d==''){echo "面积";}else{ echo "$smianji"; }?></div></li>
			<li <?php if($e||$f||$g||$h||$i||$j){echo "class='on'";}?>>更多</li>
		</ul>
		<div class="tiaojian_phone">
			<ul class="tiaojian_phone_tit">
				<li>区域</li>
				<li>价格</li>
				<li>面积</li>
				<li>更多</li>
			</ul>
			<ul class="tiaojian_phone_con">
			<form name="form1" method="post" action="?pct=post&&keyword=<?php echo $keyword; ?>"> 
				<li>
					<div class="l">
						<div <?php if($a!=''||$b==''){echo 'class="on"';}?>>区域</div>
						<div <?php if($a==''&&$b!=''){echo 'class="on"';}?>>地铁</div>
					</div>
					<div class="r">
						<div class="r_con">
							<div class="r_con_l">
								<span class="<?php if($a==""){echo 'on';}?>">
									<input type="radio" name="a" id="padd0" value="" <?php if($a==""){echo 'checked';}?> style="display:none;"  />
									<label for="padd0">不限</label>
								</span>
								<span class="<?php if($a=="a1"){echo 'on';}?>">
									<input type="radio" name="a" id="padd1" value="a1" <?php if($a=="a1"){echo 'checked';}?>  style="display:none;" />
									<label for="padd1">南山</label>
								</span>
								<span class="<?php if($a=="a2"){echo 'on';}?>">
									<input type="radio" name="a" id="padd2" value="a2" <?php if($a=="a2"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd2">福田</label></span>
								<span class="<?php if($a=="a3"){echo 'on';}?>">
									<input type="radio" name="a" id="padd3" value="a3" <?php if($a=="a3"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd3">罗湖</label></span>
								<span class="<?php if($a=="a4"){echo 'on';}?>">
									<input type="radio" name="a" id="padd4" value="a4" <?php if($a=="a4"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd4">宝安</label></span>
								<span class="<?php if($a=="a5"){echo 'on';}?>">
									<input type="radio" name="a" id="padd5" value="a5" <?php if($a=="a5"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd5">龙岗</label></span>
								<span class="<?php if($a=="a6"){echo 'on';}?>">
									<input type="radio" name="a" id="padd6" value="a6" <?php if($a=="a6"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd6">龙华新区</label></span>
								<span class="<?php if($a=="a7"){echo 'on';}?>">
									<input type="radio" name="a" id="padd7" value="a7" <?php if($a=="a7"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd7">光明新区</label></span>
								<span class="<?php if($a=="a8"){echo 'on';}?>">
									<input type="radio" name="a" id="padd8" value="a8" <?php if($a=="a8"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd8">盐田</label></span>
								<span class="<?php if($a=="a9"){echo 'on';}?>">
									<input type="radio" name="a" id="padd9" value="a9" <?php if($a=="a9"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd9">坪山新区</label></span>
								<span class="<?php if($a=="a0"){echo 'on';}?>">
									<input type="radio" name="a" id="padd10" value="a0" <?php if($a=="a0"){echo 'checked';}?>  style="display:none;" /> 
									<label for="padd10">大鹏新区</label></span>
							</div>
							<div class="r_con_r">
								<?php if($a!=''){?>
								<span class="<?php if($k==""){echo 'on';}?>">
									<input type="radio" name="k" id="k00" value="" <?php if($k==""){echo 'checked';}?> style="display:none;"  />
									<label for="k00">不限</label>
								</span>
								<?php
									$dizhi='1';
									switch ($a){
										case "a1":$dizhi='51';break;
										case "a2":$dizhi='61';break;
										case "a3":$dizhi='62'; break;
										case "a4":$dizhi='63'; break;
										case "a5":$dizhi='64';break;
										case "a6":$dizhi='65';break;
										case "a7":$dizhi='66';break;
										case "a8":$dizhi='67';break;
										case "a9":$dizhi='68';break;
										case "a0":$dizhi='69';break;
									}
									$sql='select * from `'.$tablepre.'pro_can` where `fid`='.$dizhi.' order by id_lm asc  ';
									$result=$db->query($sql);
									$list=$db->getrows($result);
									foreach ( $list as $key => $row ) {
									?>
									
									<span class="<?php if($k==$row['id_lm']){echo 'on';}?>">
									<input type="radio" name="k" id="k<?php echo $key; ?>" value="<?php echo $row['id_lm']; ?>" <?php if($k==$row['id_lm']){echo 'checked';}?>  style="display:none;" /> 
									<label for="k<?php echo $key; ?>"><?php echo $row['title_lm']; ?></label></span>
									<?php
										}
										$db->freeresult($result);
								?>
								<?php } ?>
							</div>
						</div>
						<div class="r_con" style="display: none;">
							<div class="r_con_l">
								<span class="<?php if($b==""){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro0" value="" <?php if($b==""){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro0">不限</label></span>
								<span class="<?php if($b=="b10"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro1" value="b10" <?php if($b=="b10"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro1">罗宝线（1号线）</label></span>
								<span class="<?php if($b=="b11"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro2" value="b11" <?php if($b=="b11"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro2">蛇口线（2号线）</label></span>
								<span class="<?php if($b=="b12"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro3" value="b12" <?php if($b=="b12"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro3">龙岗线（3号线）</label></span>
								<span class="<?php if($b=="b13"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro4" value="b13" <?php if($b=="b13"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro4">龙华线（4号线）</label></span>
								<span class="<?php if($b=="b14"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro5" value="b14" <?php if($b=="b14"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro5">环中线（5号线）</label></span>
								<span class="<?php if($b=="b15"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro6" value="b15" <?php if($b=="b15"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro6">机场专线（11号线）</label></span>
								<span class="<?php if($b=="b16"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro7" value="b16" <?php if($b=="b16"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro7">西丽线（7号线）</label></span>
								<span class="<?php if($b=="b17"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro8" value="b17" <?php if($b=="b17"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro8">梅林线（9号线）</label></span>
								<span class="<?php if($b=="b18"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro9" value="b18" <?php if($b=="b18"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro9">光明线（6号线）</label></span>
								<span class="<?php if($b=="b19"){echo 'on';}?>">
									<input type="radio" name="b" id="pmetro10" value="b19" <?php if($b=="b19"){echo 'checked';}?>  style="display:none;" /> 
									<label for="pmetro10">坂田线（10号线）</label></span>
							</div>
							<div class="r_con_r">
								<?php if($b!=''){?><span class="<?php if($k==""){echo 'on';}?>">
								<input type="radio" name="l" id="l00" value="" <?php if($l==""){echo 'checked';}?> style="display:none;"  />
								<label for="l00">不限</label>
								</span>
								<?php
									$ditie='1';
									switch ($b){
										case "b10":$ditie='70';break;
										case "b11":$ditie='71';break;
										case "b12":$ditie='72';break;
										case "b13":$ditie='73'; break;
										case "b14":$ditie='74'; break;
										case "b15":$ditie='75';break;
										case "b16":$ditie='76';break;
										case "b17":$ditie='77';break;
										case "b18":$ditie='78';break;
										case "b19":$ditie='79';break;
									}
									$sql='select * from `'.$tablepre.'pro_can` where `fid`='.$ditie.' order by id_lm asc  ';
									$result=$db->query($sql);
									$list=$db->getrows($result);
									foreach ( $list as $key => $row ) {
									?>
									
									<span class="<?php if($k==$row['id_lm']){echo 'on';}?>">
									<input type="radio" name="l" id="l<?php echo $key; ?>" value="<?php echo $row['id_lm']; ?>" <?php if($l==$row['id_lm']){echo 'checked';}?>  style="display:none;" /> 
									<label for="l<?php echo $key; ?>"><?php echo $row['title_lm']; ?></label></span>
									<?php
										}
										$db->freeresult($result);
								?>
								<?php } ?>
							</div>
						</div>
					</div>
				</li>
				<li>
					<dl>
						<dd <?php if($c==''){echo "class='on'";}?>>
							<input type="radio" name="c" id="pinput1b" value="" <?php if($c==''){echo 'checked';}?>  style="display:none;"/> 
							<label for="pinput1b">不限</label></dd>
						<dd <?php if($c=='c1'){echo "class='on'";}?>>
							<input type="radio" name="c" id="pinput1" value="c1" <?php if($c=="c1"){echo 'checked';}?>  style="display:none;"/> 
							<label for="pinput1">50万元以下</label></dd>
						<dd <?php if($c=='c2'){echo "class='on'";}?>> 
							<input type="radio" name="c" id="pinput2" value="c2" <?php if($c=="c2"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput2">50-100万元</label></dd>
						<dd <?php if($c=='c3'){echo "class='on'";}?>>
							<input type="radio" name="c" id="pinput3" value="c3" <?php if($c=="c3"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput3">100-150万元</label></dd>
						<dd <?php if($c=='c4'){echo "class='on'";}?>>
							<input type="radio" name="c" id="pinput4" value="c4" <?php if($c=="c4"){echo 'checked';}?> style="display:none;"/>
							<label for="pinput4">150-200万元</label></dd>
						<dd <?php if($c=='c5'){echo "class='on'";}?>>
							<input type="radio" name="c" id="pinput51" value="c5" <?php if($c=="c5"){echo 'checked';}?> style="display:none;"/>
							<label for="pinput51">200万元以上</label></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dd <?php if($d==""){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput5b" value="" <?php if($d==""){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput5b">不限</label></dd>
						<dd <?php if($d=="d1"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput5" value="d1" <?php if($d=="d1"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput5">50平方以下</label></dd>
						<dd <?php if($d=="d2"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput6" value="d2" <?php if($d=="d2"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput6">50-70平方</label></dd>
						<dd <?php if($d=="d3"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput7" value="d3" <?php if($d=="d3"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput7">70-90平方</label></dd>
						<dd <?php if($d=="d4"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput8" value="d4"<?php if($d=="d4"){echo 'checked';}?>  style="display:none;"/>
							<label for="pinput8">90-110平方</label></dd>
						<dd <?php if($d=="d5"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput9" value="d5"<?php if($d=="d5"){echo 'checked';}?> style="display:none;"/>
							<label for="pinput9">110-130平方</label></dd>
						<dd <?php if($d=="d6"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput10" value="d6"<?php if($d=="d6"){echo 'checked';}?> style="display:none;"/>
							<label for="pinput10">130-150平方</label></dd>
						<dd <?php if($d=="d7"){echo 'class="on"';}?>>
							<input type="radio" name="d" id="pinput101" value="d7"<?php if($d=="d7"){echo 'checked';}?> style="display:none;"/>
							<label for="pinput101">150平方以上</label></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>户型</dt>
						<dd <?php if($e=="e1"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput12" value="e1"<?php if($e=="e1"){echo 'checked';}?>/><label for="pinput12">一室</label></dd>
						<dd <?php if($e=="e2"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput13" value="e2"<?php if($e=="e2"){echo 'checked';}?>/> <label for="pinput13">二室</label></dd>
						<dd <?php if($e=="e3"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput14" value="e3"<?php if($e=="e3"){echo 'checked';}?>/> <label for="pinput14">三室</label></dd>
						<dd <?php if($e=="e4"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput15" value="e4"<?php if($e=="e4"){echo 'checked';}?>/> <label for="pinput15">四室</label></dd>
						<dd <?php if($e=="e5"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput16" value="e5"<?php if($e=="e5"){echo 'checked';}?>/> <label for="pinput16">五室以上</label></dd>
						<dd <?php if($e=="e6"){echo 'class="on"';}?>><input type="radio"  style="display:none;" name="e" id="pinput17" value="e6"<?php if($e=="e6"){echo 'checked';}?>/> <label for="pinput17">别墅</label></dd>
					</dl>
					<dl>
						<dt>特色</dt>
						<dd <?php if($f=="f11"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput18"  style="display:none;" value="f11"<?php if($f=="f11"){echo 'checked';}?>/> <label for="pinput18">满两年</label></dd>
						<dd <?php if($f=="f12"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput19"  style="display:none;" value="f12"<?php if($f=="f12"){echo 'checked';}?>/> <label for="pinput19">满五唯一</label></dd>
						<dd <?php if($f=="f14"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput20"  style="display:none;" value="f14"<?php if($f=="f14"){echo 'checked';}?>/> <label for="pinput20">红本在手</label></dd>
						<dd <?php if($f=="f15"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput21"  style="display:none;" value="f15"<?php if($f=="f15"){echo 'checked';}?>/> <label for="pinput21">近地铁</label></dd>
						<dd <?php if($f=="f16"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput22"  style="display:none;" value="f16"<?php if($f=="f16"){echo 'checked';}?>/> <label for="pinput22">不限购</label></dd>
						<dd <?php if($f=="f17"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput23"  style="display:none;" value="f17"<?php if($f=="f17"){echo 'checked';}?>/> <label for="pinput23">随时看房</label></dd>
						<dd <?php if($f=="f18"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput24"  style="display:none;" value="f18"<?php if($f=="f18"){echo 'checked';}?>/> <label for="pinput24">急售</label></dd>
						<dd <?php if($f=="f19"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput25"  style="display:none;" value="f19"<?php if($f=="f19"){echo 'checked';}?>/> <label for="pinput25">南北通透</label></dd>
						<dd <?php if($f=="f20"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput26"  style="display:none;" value="f20"<?php if($f=="f20"){echo 'checked';}?>/> <label for="pinput26">复式</label></dd>
						<dd <?php if($f=="f21"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput27"  style="display:none;" value="f21"<?php if($f=="f21"){echo 'checked';}?>/> <label for="pinput27">不看商住两用</label></dd>
						<dd <?php if($f=="f22"){echo 'class="on"';}?>><input type="radio" name="f" id="pinput28"  style="display:none;" value="f22"<?php if($f=="f22"){echo 'checked';}?>/> <label for="pinput28">新上</label></dd>
					</dl>
					<dl>
						<dt>楼层</dt>
						<dd <?php if($g=="g1"){echo 'class="on"';}?>><input type="radio" name="g" id="pinput29"  style="display:none;" value="g1"<?php if($g=="g1"){echo 'checked';}?>/> <label for="pinput29">6层以下</label></dd>
						<dd <?php if($g=="g2"){echo 'class="on"';}?>><input type="radio" name="g" id="pinput30"  style="display:none;" value="g2"<?php if($g=="g2"){echo 'checked';}?>/> <label for="pinput30">6-12层 </label></dd>
						<dd <?php if($g=="g3"){echo 'class="on"';}?>><input type="radio" name="g" id="pinput31"  style="display:none;" value="g3"<?php if($g=="g3"){echo 'checked';}?>/> <label for="pinput31">12层以上 </label></dd>
						
					
					</dl>
					<dl>
						<dt>朝向</dt>
						<dd <?php if($h=="h1"){echo 'class="on"';}?>><input type="radio" name="h"  style="display:none;" id="pinput311" value="h1"<?php if($h=="h1"){echo 'checked';}?>/> <label for="pinput311">东</label></dd>
						<dd <?php if($h=="h2"){echo 'class="on"';}?>><input type="radio" name="h"  style="display:none;" id="pinput32" value="h2"<?php if($h=="h2"){echo 'checked';}?>/> <label for="pinput32">南 </label></dd>
						<dd <?php if($h=="h3"){echo 'class="on"';}?>><input type="radio" name="h"  style="display:none;" id="pinput33" value="h3"<?php if($h=="h3"){echo 'checked';}?>/> <label for="pinput33">西 </label></dd>
						<dd <?php if($h=="h4"){echo 'class="on"';}?>><input type="radio" name="h"  style="display:none;" id="pinput34" value="h4"<?php if($h=="h4"){echo 'checked';}?>/> <label for="pinput34">北 </label></dd>
						<dd <?php if($h=="h5"){echo 'class="on"';}?>><input type="radio" name="h"  style="display:none;" id="pinput35" value="h5"<?php if($h=="h5"){echo 'checked';}?>/> <label for="pinput35">南北 </label></dd>
						
					</dl>
					<dl>
						<dt>装修</dt>
						<dd <?php if($i=="i1"){echo 'class="on"';}?>><input type="radio" name="i"  style="display:none;" id="pinput36" value="i1"<?php if($i=="i1"){echo 'checked';}?>/> <label for="pinput36">毛胚</label></dd>
						<dd <?php if($i=="i2"){echo 'class="on"';}?>><input type="radio" name="i"  style="display:none;" id="pinput37" value="i2"<?php if($i=="i2"){echo 'checked';}?>/> <label for="pinput37">普通装修</label></dd>
						<dd <?php if($i=="i3"){echo 'class="on"';}?>><input type="radio" name="i"  style="display:none;" id="pinput38" value="i3"<?php if($i=="i3"){echo 'checked';}?>/> <label for="pinput38">精装修</label></dd>
						<dd <?php if($i=="i4"){echo 'class="on"';}?>><input type="radio" name="i"  style="display:none;" id="pinput39" value="i4"<?php if($i=="i4"){echo 'checked';}?>/> <label for="pinput39">豪华装修</label></dd>
					</dl>
					<dl>
						<dt>房龄</dt>
						<dd <?php if($j=="j1"){echo 'class="on"';}?>><input type="radio" name="j"  style="display:none;" id="pinput40" value="j1"<?php if($j=="j1"){echo 'checked';}?>/> <label for="pinput40">5年内</label></dd>
						<dd <?php if($j=="j2"){echo 'class="on"';}?>><input type="radio" name="j"  style="display:none;" id="pinput41" value="j2"<?php if($j=="j2"){echo 'checked';}?>/> <label for="pinput41">5-10年</label></dd>
						<dd <?php if($j=="j3"){echo 'class="on"';}?>><input type="radio" name="j"  style="display:none;" id="pinput42" value="j3"<?php if($j=="j3"){echo 'checked';}?>/> <label for="pinput42">10-20年 </label></dd>
						<dd <?php if($j=="j4"){echo 'class="on"';}?>><input type="radio" name="j"  style="display:none;" id="pinput43" value="j4"<?php if($j=="j4"){echo 'checked';}?>/> <label for="pinput43">20年以上</label></dd>
					</dl>
					<!--<div class="reset_submit">
						<div>重置</div>
						<input type="submit" value="查询" />
					</div>-->
				</li>
					<input type="radio" name="paixu" id="ppaixu1" value="moren" <?php if($paixu=="moren"){echo 'checked';}?> style="display:none;"/>
					<input type="radio" name="paixu" id="ppaixu2" value="zuixin" <?php if($paixu=="zuixin"){echo 'checked';}?> style="display:none;"/>
					<input type="radio" name="paixu" id="ppaixu3" value="junjia" <?php if($paixu=="junjia"){echo 'checked';}?> style="display:none;" />
					<input type="radio" name="paixu" id="ppaixu4" value="kaipan" <?php if($paixu=="kaipan"){echo 'checked';}?> style="display:none;"/>
				</form>
			</ul>
		</div>
		<script>
			$('.tiaojian_phone_con input').click(function(){
				$('.tiaojian_phone_con form').submit();
			})
		</script>
		<!--条件搜索手机版结束-->
		
		<!--条件搜索-->
		<ul class="tiaojian w1170">
		<form name="form1" method="post" action="?act=post&&keyword=<?php echo $keyword; ?>"> 
			<li>
				<div class="tiaojian_tit">位置</div>
				<div class="address"><span class="on">按区域</span><span>按地铁</span></div>
				<div class="address_quyu" >
					<div class="address_con">
						<span><input type="radio" name="a" id="add0" value="" <?php if($a==""){echo 'checked';}?> style="display:none;"  />
							<label for="add0" class="<?php if($a==""){echo 'on';}?>">不限</label></span>
						<span><input type="radio" name="a" id="add1" value="a1" <?php if($a=="a1"){echo 'checked';}?>  style="display:none;" />
							<label for="add1" class="<?php if($a=="a1"){echo 'on';}?>">南山</label></span>
						<span><input type="radio" name="a" id="add2" value="a2" <?php if($a=="a2"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add2" class="<?php if($a=="a2"){echo 'on';}?>">福田</label></span>
						<span><input type="radio" name="a" id="add3" value="a3" <?php if($a=="a3"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add3" class="<?php if($a=="a3"){echo 'on';}?>">罗湖</label></span>
						<span><input type="radio" name="a" id="add4" value="a4" <?php if($a=="a4"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add4" class="<?php if($a=="a4"){echo 'on';}?>">宝安</label></span>
						<span><input type="radio" name="a" id="add5" value="a5" <?php if($a=="a5"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add5" class="<?php if($a=="a5"){echo 'on';}?>">龙岗</label></span>
						<span><input type="radio" name="a" id="add6" value="a6" <?php if($a=="a6"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add6" class="<?php if($a=="a6"){echo 'on';}?>">龙华新区</label></span>
						<span><input type="radio" name="a" id="add7" value="a7" <?php if($a=="a7"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add7" class="<?php if($a=="a7"){echo 'on';}?>">光明新区</label></span>
						<span><input type="radio" name="a" id="add8" value="a8" <?php if($a=="a8"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add8" class="<?php if($a=="a8"){echo 'on';}?>">盐田</label></span>
						<span><input type="radio" name="a" id="add9" value="a9" <?php if($a=="a9"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add9" class="<?php if($a=="a9"){echo 'on';}?>">坪山新区</label></span>
						<span><input type="radio" name="a" id="add10" value="a0" <?php if($a=="a0"){echo 'checked';}?>  style="display:none;" /> 
							<label for="add10" class="<?php if($a=="a0"){echo 'on';}?>">大鹏新区</label></span>
							<?php if($a!=''){?>	
							<div class="address_cont">
								<span><input type="radio" name="k" id="k000" value="" <?php if($k==''){echo 'checked';}?>  style="display:none;" /> 
									<label for="k000" class="<?php if($k==''){echo 'on';}?>">不限</label></span>
							<?php
								$dizhi='1';
								switch ($a){
									case "a1":$dizhi='51';break;
									case "a2":$dizhi='61';break;
									case "a3":$dizhi='62'; break;
									case "a4":$dizhi='63'; break;
									case "a5":$dizhi='64';break;
									case "a6":$dizhi='65';break;
									case "a7":$dizhi='66';break;
									case "a8":$dizhi='67';break;
									case "a9":$dizhi='68';break;
									case "a0":$dizhi='69';break;
								}
								$sql='select * from `'.$tablepre.'pro_can` where `fid`='.$dizhi.' order by id_lm asc  ';
								$result=$db->query($sql);
								$list=$db->getrows($result);
								foreach ( $list as $key => $row ) {
								?>
								<span><input type="radio" name="k" id="k<?php echo $key; ?>" value="<?php echo $row['id_lm']; ?>" <?php if($k==$row['id_lm']){echo 'checked';}?>  style="display:none;" /> 
									<label for="k<?php echo $key; ?>" class="<?php if($k==$row['id_lm']){echo 'on';}?>"><?php echo $row['title_lm']; ?></label></span>
								
								<?php
									}
									$db->freeresult($result);
							?>
							</div>
							<?php }?>
					</div>
				</div>
				<div class="address_quyu" style="display:none">
					<div class="address_con">
						<span><input type="radio" name="b" id="metro0" value="" <?php if($b==""){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro0" class="<?php if($b==""){echo 'on';}?>">不限</label></span>
						<span><input type="radio" name="b" id="metro1" value="b10" <?php if($b=="b10"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro1" class="<?php if($b=="b10"){echo 'on';}?>">罗宝线（1号线）</label></span>
						<span><input type="radio" name="b" id="metro2" value="b11" <?php if($b=="b11"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro2" class="<?php if($b=="b11"){echo 'on';}?>">蛇口线（2号线）</label></span>
						<span><input type="radio" name="b" id="metro3" value="b12" <?php if($b=="b12"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro3" class="<?php if($b=="b12"){echo 'on';}?>">龙岗线（3号线）</label></span>
						<span><input type="radio" name="b" id="metro4" value="b13" <?php if($b=="b13"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro4" class="<?php if($b=="b13"){echo 'on';}?>">龙华线（4号线）</label></span>
						<span><input type="radio" name="b" id="metro5" value="b14" <?php if($b=="b14"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro5" class="<?php if($b=="b14"){echo 'on';}?>">环中线（5号线）</label></span>
						<span><input type="radio" name="b" id="metro6" value="b15" <?php if($b=="b15"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro6" class="<?php if($b=="b15"){echo 'on';}?>">机场专线（11号线）</label></span>
						<span><input type="radio" name="b" id="metro7" value="b16" <?php if($b=="b16"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro7" class="<?php if($b=="b16"){echo 'on';}?>">西丽线（7号线）</label></span>
						<span><input type="radio" name="b" id="metro8" value="b17" <?php if($b=="b17"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro8" class="<?php if($b=="b17"){echo 'on';}?>">梅林线（9号线）</label></span>
						<span><input type="radio" name="b" id="metro9" value="b18" <?php if($b=="b18"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro9" class="<?php if($b=="b18"){echo 'on';}?>">光明线（6号线）</label></span>
						<span><input type="radio" name="b" id="metro10" value="b19" <?php if($b=="b19"){echo 'checked';}?>  style="display:none;" /> 
							<label for="metro10" class="<?php if($b=="b19"){echo 'on';}?>">坂田线（10号线）</label></span>
							<?php if($b!=''){?>
							<div class="address_cont">
								<span><input type="radio" name="l" id="l000" value="" <?php if($l==''){echo 'checked';}?>  style="display:none;" /> 
									<label for="l000" class="<?php if($l==''){echo 'on';}?>">不限</label></span>
							<?php
								$ditie='1';
								switch ($b){
									case "b10":$ditie='70';break;
									case "b11":$ditie='71';break;
									case "b12":$ditie='72';break;
									case "b13":$ditie='73'; break;
									case "b14":$ditie='74'; break;
									case "b15":$ditie='75';break;
									case "b16":$ditie='76';break;
									case "b17":$ditie='77';break;
									case "b18":$ditie='78';break;
									case "b19":$ditie='79';break;
								}
								$sql='select * from `'.$tablepre.'pro_can` where `fid`='.$ditie.' order by id_lm asc  ';
								$result=$db->query($sql);
								$list=$db->getrows($result);
								foreach ( $list as $key => $row ) {
								?>
								<span><input type="radio" name="l" id="l<?php echo $key; ?>" value="<?php echo $row['id_lm']; ?>" <?php if($l==$row['id_lm']){echo 'checked';}?>  style="display:none;" /> 
									<label for="l<?php echo $key; ?>" class="<?php if($l==$row['id_lm']){echo 'on';}?>"><?php echo $row['title_lm']; ?></label></span>
								
								<?php
									}
									$db->freeresult($result);
							?>
							</div>
							<?php } ?>
					</div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">价格</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="c[]" id="input1" value="c1" <?php if(strstr($sc,"c1")){echo 'checked';}?>/> <label for="input1">50万元以下</label></div>
					<div><input type="checkbox" name="c[]" id="input2" value="c2" <?php if(strstr($sc,"c2")){echo 'checked';}?>/> <label for="input2">50-100万元</label></div>
					<div><input type="checkbox" name="c[]" id="input3" value="c3" <?php if(strstr($sc,"c3")){echo 'checked';}?>/> <label for="input3">100-150万元</label></div>
					<div><input type="checkbox" name="c[]" id="input4" value="c4" <?php if(strstr($sc,"c4")){echo 'checked';}?>/> <label for="input4">150-200万元</label></div>
					<div><input type="checkbox" name="c[]" id="input51" value="c5" <?php if(strstr($sc,"c5")){echo 'checked';}?>/> <label for="input51">200万元以上</label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">面积</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="d[]" id="input5" value="d1" <?php if(strstr($sd,"d1")){echo 'checked';}?> /> <label for="input5">50平方以下</label></div>
					<div><input type="checkbox" name="d[]" id="input6" value="d2" <?php if(strstr($sd,"d2")){echo 'checked';}?> /> <label for="input6">50-70平方</label></div>
					<div><input type="checkbox" name="d[]" id="input7" value="d3" <?php if(strstr($sd,"d3")){echo 'checked';}?> /> <label for="input7">70-90平方</label></div>
					<div><input type="checkbox" name="d[]" id="input8" value="d4" <?php if(strstr($sd,"d4")){echo 'checked';}?> /> <label for="input8">90-110平方</label></div>
					<div><input type="checkbox" name="d[]" id="input9" value="d5" <?php if(strstr($sd,"d5")){echo 'checked';}?>/> <label for="input9">110-130平方</label></div>
					<div><input type="checkbox" name="d[]" id="input10" value="d6"<?php if(strstr($sd,"d6")){echo 'checked';}?>/> <label for="input10">130-150平方</label></div>
					<div><input type="checkbox" name="d[]" id="input101" value="d7"<?php if(strstr($sd,"d7")){echo 'checked';}?>/> <label for="input101">150平方以上</label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">户型</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="e[]" id="input12" value="e1"<?php if(strstr($se,"e1")){echo 'checked';}?>/> <label for="input12">一室</label></div>
					<div><input type="checkbox" name="e[]" id="input13" value="e2"<?php if(strstr($se,"e2")){echo 'checked';}?>/> <label for="input13">二室</label></div>
					<div><input type="checkbox" name="e[]" id="input14" value="e3"<?php if(strstr($se,"e3")){echo 'checked';}?>/> <label for="input14">三室</label></div>
					<div><input type="checkbox" name="e[]" id="input15" value="e4"<?php if(strstr($se,"e4")){echo 'checked';}?>/> <label for="input15">四室</label></div>
					<div><input type="checkbox" name="e[]" id="input16" value="e5"<?php if(strstr($se,"e5")){echo 'checked';}?>/> <label for="input16">五室以上</label></div>
					<div><input type="checkbox" name="e[]" id="input17" value="e6"<?php if(strstr($se,"e6")){echo 'checked';}?>/> <label for="input17">别墅</label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">特色</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="f[]" id="input18" value="f11"<?php if(strstr($sf,"f11")){echo 'checked';}?>/> <label for="input18">满两年</label></div>
					<div><input type="checkbox" name="f[]" id="input19" value="f12"<?php if(strstr($sf,"f12")){echo 'checked';}?>/> <label for="input19">满五唯一</label></div>
					<div><input type="checkbox" name="f[]" id="input20" value="f14"<?php if(strstr($sf,"f14")){echo 'checked';}?>/> <label for="input20">红本在手</label></div>
					<div><input type="checkbox" name="f[]" id="input21" value="f15"<?php if(strstr($sf,"f15")){echo 'checked';}?>/> <label for="input21">近地铁</label></div>
					<div><input type="checkbox" name="f[]" id="input22" value="f16"<?php if(strstr($sf,"f16")){echo 'checked';}?>/> <label for="input22">不限购</label></div>
					<div><input type="checkbox" name="f[]" id="input23" value="f17"<?php if(strstr($sf,"f17")){echo 'checked';}?>/> <label for="input23">随时看房</label></div>
					<div><input type="checkbox" name="f[]" id="input24" value="f18"<?php if(strstr($sf,"f18")){echo 'checked';}?>/> <label for="input24">急售</label></div>
					<div><input type="checkbox" name="f[]" id="input25" value="f19"<?php if(strstr($sf,"f19")){echo 'checked';}?>/> <label for="input25">南北通透</label></div>
					<div><input type="checkbox" name="f[]" id="input26" value="f20"<?php if(strstr($sf,"f20")){echo 'checked';}?>/> <label for="input26">复式</label></div>
					<div><input type="checkbox" name="f[]" id="input27" value="f21"<?php if(strstr($sf,"f21")){echo 'checked';}?>/> <label for="input27">不看商住两用</label></div>
					<div><input type="checkbox" name="f[]" id="input28" value="f22"<?php if(strstr($sf,"f22")){echo 'checked';}?>/> <label for="input28">新上</label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">楼层</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="g[]" id="input29" value="g1"<?php if(strstr($sg,"g1")){echo 'checked';}?>/> <label for="input29">6层以下</label></div>
					<div><input type="checkbox" name="g[]" id="input30" value="g2"<?php if(strstr($sg,"g2")){echo 'checked';}?>/> <label for="input30">6-12层 </label></div>
					<div><input type="checkbox" name="g[]" id="input31" value="g3"<?php if(strstr($sg,"g3")){echo 'checked';}?>/> <label for="input31">12层以上 </label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">朝向</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="h[]" id="input311" value="h1"<?php if(strstr($sh,"h1")){echo 'checked';}?>/> <label for="input311">东</label></div>
					<div><input type="checkbox" name="h[]" id="input32" value="h2"<?php if(strstr($sh,"h2")){echo 'checked';}?>/> <label for="input32">南 </label></div>
					<div><input type="checkbox" name="h[]" id="input33" value="h3"<?php if(strstr($sh,"h3")){echo 'checked';}?>/> <label for="input33">西 </label></div>
					<div><input type="checkbox" name="h[]" id="input34" value="h4"<?php if(strstr($sh,"h4")){echo 'checked';}?>/> <label for="input34">北 </label></div>
					<div><input type="checkbox" name="h[]" id="input35" value="h5"<?php if(strstr($sh,"h5")){echo 'checked';}?>/> <label for="input35">南北 </label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">装修</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="i[]" id="input36" value="i1"<?php if(strstr($si,"i1")){echo 'checked';}?>/> <label for="input36">毛胚</label></div>
					<div><input type="checkbox" name="i[]" id="input37" value="i2"<?php if(strstr($si,"i2")){echo 'checked';}?>/> <label for="input37">普通装修</label></div>
					<div><input type="checkbox" name="i[]" id="input38" value="i3"<?php if(strstr($si,"i3")){echo 'checked';}?>/> <label for="input38">精装修</label></div>
					<div><input type="checkbox" name="i[]" id="input39" value="i4"<?php if(strstr($si,"i4")){echo 'checked';}?>/> <label for="input39">豪华装修</label></div>
				</div>
			</li>
			<li>
				<div class="tiaojian_tit">房龄</div>
				<div class="tiaojian_con">
					<div><input type="checkbox" name="j[]" id="input40" value="j1"<?php if(strstr($sj,"j1")){echo 'checked';}?>/> <label for="input40">5年内</label></div>
					<div><input type="checkbox" name="j[]" id="input41" value="j2"<?php if(strstr($sj,"j2")){echo 'checked';}?>/> <label for="input41">5-10年  </label></div>
					<div><input type="checkbox" name="j[]" id="input42" value="j3"<?php if(strstr($sj,"j3")){echo 'checked';}?>/> <label for="input42">10-20年 </label></div>
					<div><input type="checkbox" name="j[]" id="input43" value="j4"<?php if(strstr($sj,"j4")){echo 'checked';}?>/> <label for="input43">20年以上</label></div>
				</div>
			</li>
			<div class="tiaojian_more">更多条件 </div>
				<input type="radio" name="paixu" id="paixu1" value="moren" <?php if($paixu=="moren"){echo 'checked';}?> style="display:none;"/>
				<input type="radio" name="paixu" id="paixu2" value="zuixin" <?php if($paixu=="zuixin"){echo 'checked';}?> style="display:none;"/>
				<input type="radio" name="paixu" id="paixu3" value="junjia" <?php if($paixu=="junjia"){echo 'checked';}?> style="display:none;" />
				<input type="radio" name="paixu" id="paixu4" value="kaipan" <?php if($paixu=="kaipan"){echo 'checked';}?> style="display:none;"/>
			</form>
		</ul>
		<script>
			$('.tiaojian input').click(function(){
				$('.tiaojian form').submit();
			})
		</script>
		<!--条件搜索结束-->
		<!--新房-->
		<div class="newHouse">
			<!--<div class="ind_t">
				<div class="t">深圳新房源</div>
				<div>行业引领者和颠覆者，承诺真实房源，提供安心服务，保障消费者权益</div>
			</div>-->
			<div class="w1170">
				<div class="houseSort">排序：
						<label for="paixu1" class="sort <?php if($paixu=="moren"){echo 'on';}?>">默认</label>
						<label for="paixu2" class="sort <?php if($paixu=="zuixin"){echo 'on';}?>">最新</label>
						<label for="paixu3" class="sort <?php if($paixu=="junjia"){echo 'on';}?>">均价</label>
						<label for="paixu4" class="sort <?php if($paixu=="kaipan"){echo 'on';}?>">开盘时间</label>
						
						
						<label for="ppaixu1" class="sort <?php if($paixu=="moren"){echo 'on';}?>">默认</label>
						<label for="ppaixu2" class="sort <?php if($paixu=="zuixin"){echo 'on';}?>">最新</label>
						<label for="ppaixu3" class="sort <?php if($paixu=="junjia"){echo 'on';}?>">均价</label>
						<label for="ppaixu4" class="sort <?php if($paixu=="kaipan"){echo 'on';}?>">开盘时间</label>
				</div>
				<ul class="newHouse_ul">
					<?php
							$sqlcount='select count(*) from pro_co where '.$sq.'';
							$sql='select * from `'.$tablepre.'pro_co` where '.$sq.' order by  '.$paixua.'';
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
						<a class="newHouse_ul_img" href="newHouse_show.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['img_sl']?>"/></a>
						<div class="newHouse_ul_con">
							<a class="t" href="newHouse_show.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']?>
								<div class="dyj"><?php if($row['tuijian']=='1'){?><span class="ding">热</span><?php } ?><?php if($row['hot']=='1'){?><span class="you">顶</span><?php } ?><?php if($row['jing']=='1'){?><span class="jing">精</span><?php } ?>
								</div>
							</a>
							<div class="">地址：<?php echo $row['pro_cs13']; ?></div>
							<div>主推户型：<span class="color1"><?php echo $row['pro_cs14']; ?></span> </div>  
							<div><span class="sp">开盘时间：<?php echo date('Y-m-d',$row['pro_cs45']); ?></span>      <span class="sp">交房时间：<?php echo date('Y-m-d',$row['pro_cs46']); ?></span></div>
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
						<div class="newHouse_ul_price"><?php echo $row['pro_cs18']; ?>元/㎡</div>
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

