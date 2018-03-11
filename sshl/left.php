<?php 
require('../include/common.inc.php');
chklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台左侧</title>
<script src="scripts/function.js"></script>
<style>
html,BODY {SCROLLBAR-FACE-COLOR: #65A8E5;SCROLLBAR-HIGHLIGHT-COLOR: #65A8E5;SCROLLBAR-SHADOW-COLOR: #BDD6EE;SCROLLBAR-3DLIGHT-COLOR: #ffffff;SCROLLBAR-ARROW-COLOR: #ffffff;SCROLLBAR-TRACK-COLOR:#BDD6EE;SCROLLBAR-DARKSHADOW-COLOR: #65A8E5; font-family:Arial, Helvetica, sans-serif;}
body{background: #fbfbfb url(images/aa_left1.gif) no-repeat left top; margin:0px; width:181px; height:100%; font-size:12px;}
ul,li{list-style:none; margin:0px; padding:0px;}
a {COLOR: #000000;  TEXT-DECORATION: none}
a:link {COLOR: #000000;  TEXT-DECORATION: none}
a:visited {COLOR: #000000;  TEXT-DECORATION: none}
a:active {COLOR: #000000;  TEXT-DECORATION: none}
a:hover {COLOR: #000000; TEXT-DECORATION: underline}
#left_main{ width:158px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;margin:0px 0 0 8px; background-color:#f8f8f8;}
#left_main h3{ padding:0 0 0 8px; margin:0px; height:25px; line-height:25px; font-size:12px; color:#494949; background:url(images/title_bg_show.gif) no-repeat left top;}
#left_main ul{ padding:5px 0 5px;}
#left_main ul li{ background:url(images/project2.gif) no-repeat 6px 2px; padding:3px 0 1px 26px;}
#left_main ul .li_01{background:url(images/news_catch_up.gif) no-repeat 6px 2px;}
#left_main ul .li_02{background:url(images/mail_send_all.gif) no-repeat 6px 2px;}
#left_main ul .li_02 a{ color:#FF0000; font-weight:bold;}
#left_main ul .li_03{background:url(images/favorites.gif) no-repeat 6px 2px;}
</style>
</head>

<body>
<div style="height:9px;"></div>
<div id="left_main">
	<!--<h3>资料管理</h3>
    <ul>
    	<li><a href="tol_lm/default.php" target="mainFrame">资料栏目管理</a> | <a href="tol_lm/add.php"  target="mainFrame">添加</a></li>
        <li><a href="tol_co/default.php" target="mainFrame">资料内容管理</a> | <a href="tol_co/add.php"  target="mainFrame">添加</a></li>
    </ul>-->
	<h3>信息管理</h3>
    <ul>
    	<li><a href="info_lm/default.php" target="mainFrame">信息栏目管理</a> | <a href="info_lm/add.php"  target="mainFrame">添加</a></li>
        <li><a href="info_co/default.php" target="mainFrame">信息内容管理</a> | <a href="info_co/add.php"  target="mainFrame">添加</a></li>
    </ul>
	<h3>深圳房源管理</h3>
    <ul>
    	<li><a href="pro_lm/default.php" target="mainFrame">房源分类管理</a> | <a href="pro_lm/add.php" target="mainFrame">添加</a></li>
    	<li><a href="pro_can/default.php" target="mainFrame">房源地址管理</a> | <a href="pro_can/add.php" target="mainFrame">添加</a></li>
		<li>
			<a href="pro_co/default.php?lm=46" target="mainFrame"><b>二手房源信息列表</b></a><br/> 
			|— <a href="pro_co/add.php?lm=46" target="mainFrame">添加二手房源</a>
		</li>
		<li> 
			<a href="pro_co/default.php?lm=49" target="mainFrame"><b>二手房小区信息列表</b></a><br/> 
			|— <a href="pro_co/addxiaoqu.php" target="mainFrame">添加二手小区房</a>
		</li>
        <li>
			<a href="pro_co/default.php?lm=50" target="mainFrame"><b>二手房学区信息列表</b></a><br/> 
			|— <a href="pro_co/add.php?lm=50" target="mainFrame">添加二手学区房源</a>
		</li>
        <li>
			<a href="pro_co/default.php?lm=47" target="mainFrame"><b>新房源信息列表</b></a><br/> 
			|— <a href="pro_co/addnew.php" target="mainFrame">添加新房源</a> <br/> 
			|— <a href="pro_co/addhuxing.php" target="mainFrame">添加新户型</a>
		</li>
        <li>
			<a href="pro_co/default.php?lm=48" target="mainFrame"><b>租房信息列表</b></a><br/> 
			|— <a href="pro_co/addrent.php" target="mainFrame">添加租房房源</a>
		</li>
    </ul>
	<h3>东莞房源管理</h3>
    <ul>
    	<li><a href="pro_lm_dg/default.php" target="mainFrame">房源分类管理</a> | <a href="pro_lm_dg/add.php" target="mainFrame">添加</a></li>
    	<li><a href="pro_can_dg/default.php" target="mainFrame">房源地址管理</a> | <a href="pro_can_dg/add.php" target="mainFrame">添加</a></li>
		<li>
			<a href="pro_co_dg/default.php?lm=46" target="mainFrame"><b>二手房源信息列表</b></a><br/> 
			|— <a href="pro_co_dg/add.php?lm=46" target="mainFrame">添加二手房源</a>
		</li>
		<li> 
			<a href="pro_co_dg/default.php?lm=49" target="mainFrame"><b>二手房小区信息列表</b></a><br/> 
			|— <a href="pro_co_dg/addxiaoqu.php" target="mainFrame">添加二手小区房</a>
		</li>
        <li>
			<a href="pro_co_dg/default.php?lm=50" target="mainFrame"><b>二手房学区信息列表</b></a><br/> 
			|— <a href="pro_co_dg/add.php?lm=50" target="mainFrame">添加二手学区房源</a>
		</li>
        <li>
			<a href="pro_co_dg/default.php?lm=47" target="mainFrame"><b>新房源信息列表</b></a><br/> 
			|— <a href="pro_co_dg/addnew.php" target="mainFrame">添加新房源</a> <br/> 
			|— <a href="pro_co_dg/addhuxing.php" target="mainFrame">添加新户型</a>
		</li>
        <li>
			<a href="pro_co_dg/default.php?lm=48" target="mainFrame"><b>租房信息列表</b></a><br/> 
			|— <a href="pro_co_dg/addrent.php" target="mainFrame">添加租房房源</a>
		</li>
    </ul>
	<h3>惠州房源管理</h3>
    <ul>
    	<li><a href="pro_lm_hz/default.php" target="mainFrame">房源分类管理</a> | <a href="pro_lm_hz/add.php" target="mainFrame">添加</a></li>
    	<li><a href="pro_can_hz/default.php" target="mainFrame">房源地址管理</a> | <a href="pro_can_hz/add.php" target="mainFrame">添加</a></li>
		<li>
			<a href="pro_co_hz/default.php?lm=46" target="mainFrame"><b>二手房源信息列表</b></a><br/> 
			|— <a href="pro_co_hz/add.php?lm=46" target="mainFrame">添加二手房源</a>
		</li>
		<li> 
			<a href="pro_co_hz/default.php?lm=49" target="mainFrame"><b>二手房小区信息列表</b></a><br/> 
			|— <a href="pro_co_hz/addxiaoqu.php" target="mainFrame">添加二手小区房</a>
		</li>
        <li>
			<a href="pro_co_hz/default.php?lm=50" target="mainFrame"><b>二手房学区信息列表</b></a><br/> 
			|— <a href="pro_co_hz/add.php?lm=50" target="mainFrame">添加二手学区房源</a>
		</li>
        <li>
			<a href="pro_co_hz/default.php?lm=47" target="mainFrame"><b>新房源信息列表</b></a><br/> 
			|— <a href="pro_co_hz/addnew.php" target="mainFrame">添加新房源</a> <br/> 
			|— <a href="pro_co_hz/addhuxing.php" target="mainFrame">添加新户型</a>
		</li>
        <li>
			<a href="pro_co_hz/default.php?lm=48" target="mainFrame"><b>租房信息列表</b></a><br/> 
			|— <a href="pro_co_hz/addrent.php" target="mainFrame">添加租房房源</a>
		</li>
    </ul>
	<h3>中山房源管理</h3>
    <ul>
    	<li><a href="pro_lm_zs/default.php" target="mainFrame">房源分类管理</a> | <a href="pro_lm_zs/add.php" target="mainFrame">添加</a></li>
    	<li><a href="pro_can_zs/default.php" target="mainFrame">房源地址管理</a> | <a href="pro_can_zs/add.php" target="mainFrame">添加</a></li>
		<li>
			<a href="pro_co_zs/default.php?lm=46" target="mainFrame"><b>二手房源信息列表</b></a><br/> 
			|— <a href="pro_co_zs/add.php?lm=46" target="mainFrame">添加二手房源</a>
		</li>
		<li> 
			<a href="pro_co_zs/default.php?lm=49" target="mainFrame"><b>二手房小区信息列表</b></a><br/> 
			|— <a href="pro_co_zs/addxiaoqu.php" target="mainFrame">添加二手小区房</a>
		</li>
        <li>
			<a href="pro_co_zs/default.php?lm=50" target="mainFrame"><b>二手房学区信息列表</b></a><br/> 
			|— <a href="pro_co_zs/add.php?lm=50" target="mainFrame">添加二手学区房源</a>
		</li>
        <li>
			<a href="pro_co_zs/default.php?lm=47" target="mainFrame"><b>新房源信息列表</b></a><br/> 
			|— <a href="pro_co_zs/addnew.php" target="mainFrame">添加新房源</a> <br/> 
			|— <a href="pro_co_zs/addhuxing.php" target="mainFrame">添加新户型</a>
		</li>
        <li>
			<a href="pro_co_zs/default.php?lm=48" target="mainFrame"><b>租房信息列表</b></a><br/> 
			|— <a href="pro_co_zs/addrent.php" target="mainFrame">添加租房房源</a>
		</li>
    </ul>
   <!-- <h3>人才招聘</h3>
    <ul>
        <li class="li_03"><a href="job_lm/default.php" target="mainFrame">人才招聘管理</a></li>
        <li class="li_03"><a href="job_co/default.php" target="mainFrame">职位应聘管理</a></li>
    </ul>-->
    <h3>留言管理</h3>
    <ul>
        <li class="li_03"><a href="book/default.php" target="mainFrame">留言信息管理</a></li>
    </ul>
	<h3>配置管理</h3>
    <ul>
        <li class="li_03"><a href="setup/index.php" target="mainFrame">基本配置管理</a></li>
    </ul>
	<h3>Instant Messenger</h3>
    <ul>
    	<li class="li_01">
			<SCRIPT LANGUAGE="JavaScript">
				<!--
				document.write("Javascript 可执行") 
				//-->
            </SCRIPT>
            <noscript>Javascript 不执行</noscript>
        </li>
    	<li class="li_01">
			<SCRIPT LANGUAGE="JavaScript">   
				<!--  
				function chkFlash() {
					var isIE = (navigator.appVersion.indexOf("MSIE") >= 0);
					var hasFlash = true;
				
					if(isIE) {
						try{
							var objFlash = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
						} catch(e) {
							hasFlash = false;
						}
					} else {
						if(!navigator.plugins["Shockwave Flash"]) {
							hasFlash = false;
						}
					}
					return hasFlash;
				}
				(chkFlash)?document.write('Flash 插件已安装'):document.write('Flash 插件未安装');          
				//-->       
            </SCRIPT>
  		</li>
    </ul>
</div>
</body>
</html>
