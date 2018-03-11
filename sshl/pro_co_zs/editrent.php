<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'pro_co_zs` where `id`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该产品不存在或已删除');
}
$db->freeresult($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改产品</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if (gt('lm').value=="n"){
		alert("请选择分类");
		gt('lm').focus();
		return false;
	}
	if (gt('lm').value=="no"){
		alert("所选分类不允许添加产品");
		gt('lm').focus();
		return false;
	}
	if(gt('title').value==''){
		alert('产品名称不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('产品的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>

<script src="../../js/jquery-1.10.1.min.js"></script>

<script src="../scripts/function.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
<style>
.border tr td div.asd {
	float: left;
	width: 88px;
	height: 24px;
}
</style>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
	<tr class="topbg">
		<td colspan="2">修改产品</td>
	</tr>
	<tr class="tdbg">
		<td width="70" height="26" align="right"><strong>管理导航：</strong></td>
		<td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加产品</a></td>
	</tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="editt.php" onSubmit="return check()">
	<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
	<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
	<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
		<tr class="title">
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">所属分类：</td>
			<td><select name="lm" id="lm">
					<option value="48" selected="selected">中山租房源</option>
					
				</select>
				<script>
    	gt('lm').value='<?php echo $row['lm']?>';
    </script></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">所属经纪人：</td>
			<td><select name="jingjiren" id="jingjiren">
					<option value="">选择所属经纪人</option>
					<?php
						$sql_ser='select * from `'.$tablepre.'info_co` where `lm`=17 order by px desc,id desc  ';
						$result_ser=$db->query($sql_ser);
						$jingjiren=$row['jingjiren'];
						while ($row_ser=$db->getrow($result_ser)){
					?>
					<option value="<?php echo $row_ser['id']; ?>" <?php if($row_ser['id']==$jingjiren){ echo ' selected="selected"'; }?> ><?php echo $row_ser['title']; ?></option>
					<?php
						}
						$db->freeresult($result_ser);
					?>
				</select></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">房源名称：</td>
			<td><INPUT name="title" type="text" id="title" size="30" maxlength="80" value="<?php echo $row['title']?>">
				<span class="red">*</span></td>
		</tr>
		<tr class="tdbg2">
			<td width="120" align="right" class="red">检索选项：</td>
			<td><table border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td colspan="3">
							<tr>
							<div class="weizhi">
								<div class="asd">
									<INPUT name="pro_cs1" type="radio" id="pro_can1"  value="a1" <?php if(strstr($row['pro_cs1'],"a1")){echo 'checked';}?>>
									中山市区</div>
								<div class="asd">
									<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a2" <?php if(strstr($row['pro_cs1'],"a2")){echo 'checked';}?>>
									深中大桥区</div>
								<div class="asd">
									<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a3" <?php if(strstr($row['pro_cs1'],"a3")){echo 'checked';}?>>
									临珠海区</div>
								<div class="asd">
									<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a4" <?php if(strstr($row['pro_cs1'],"a4")){echo 'checked';}?>>
									西北片区</div>
									<div style="clear:both"></div>
								</div>
							</div>
						</tr>
						<tr>
							<div id="abc"><br/></div><br/><br/>
						</tr>
						
					</tr>
					<tr>
						<td>价格：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c1"<?php if(strstr($row['pro_cs3'],"c1")){echo 'checked';}?>>
								1000元以下</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c2"<?php if(strstr($row['pro_cs3'],"c2")){echo 'checked';}?>>
								1000-2000元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c3"<?php if(strstr($row['pro_cs3'],"c3")){echo 'checked';}?>>
								2000-3000元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c4"<?php if(strstr($row['pro_cs3'],"c4")){echo 'checked';}?>>
								3000-4000元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c5"<?php if(strstr($row['pro_cs3'],"c5")){echo 'checked';}?>>
								4000-5000元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c6"<?php if(strstr($row['pro_cs3'],"c6")){echo 'checked';}?>>
								5000-6000元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c7"<?php if(strstr($row['pro_cs3'],"c7")){echo 'checked';}?>>
								6000元以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>面积：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d1"<?php if(strstr($row['pro_cs4'],"d1")){echo 'checked';}?>>
								50平方以下</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d2"<?php if(strstr($row['pro_cs4'],"d2")){echo 'checked';}?>>
								50-70平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d3"<?php if(strstr($row['pro_cs4'],"d3")){echo 'checked';}?>>
								70-90平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d4"<?php if(strstr($row['pro_cs4'],"d4")){echo 'checked';}?>>
								90-110平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d5"<?php if(strstr($row['pro_cs4'],"d5")){echo 'checked';}?>>
								110-130平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d6"<?php if(strstr($row['pro_cs4'],"d6")){echo 'checked';}?>>
								130-150平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d7"<?php if(strstr($row['pro_cs4'],"d7")){echo 'checked';}?>>
								150平方以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>户型：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e1"<?php if(strstr($row['pro_cs5'],"e1")){echo 'checked';}?>>
								一室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e2"<?php if(strstr($row['pro_cs5'],"e2")){echo 'checked';}?>>
								二室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e3"<?php if(strstr($row['pro_cs5'],"e3")){echo 'checked';}?>>
								三室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e4"<?php if(strstr($row['pro_cs5'],"e4")){echo 'checked';}?>>
								四室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e5"<?php if(strstr($row['pro_cs5'],"e5")){echo 'checked';}?>>
								五室以上</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e6"<?php if(strstr($row['pro_cs5'],"e6")){echo 'checked';}?>>
								别墅</div>
							<div class="asd" style="display:none">
								<INPUT name="pro_cs41[]" type="checkbox" id="pro_can1" value="e7" checked />
								1</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>特色：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f11" <?php if(strstr($row['pro_cs6'],"f11")){echo 'checked';}?>>
								满两年</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f12"<?php if(strstr($row['pro_cs6'],"f12")){echo 'checked';}?>>
								满五唯一</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f14"<?php if(strstr($row['pro_cs6'],"f14")){echo 'checked';}?>>
								红本在手</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f15"<?php if(strstr($row['pro_cs6'],"f15")){echo 'checked';}?>>
								近地铁</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f16"<?php if(strstr($row['pro_cs6'],"f16")){echo 'checked';}?>>
								不限购</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f17"<?php if(strstr($row['pro_cs6'],"f17")){echo 'checked';}?>>
								随时看房</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f18"<?php if(strstr($row['pro_cs6'],"f18")){echo 'checked';}?>>
								急售</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f19"<?php if(strstr($row['pro_cs6'],"f19")){echo 'checked';}?>>
								南北通透</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f20"<?php if(strstr($row['pro_cs6'],"f20")){echo 'checked';}?>>
								复式</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f21"<?php if(strstr($row['pro_cs6'],"f21")){echo 'checked';}?>>
								不看商住两用</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f22"<?php if(strstr($row['pro_cs6'],"f22")){echo 'checked';}?>>
								新上</div>
							<div class="asd" style="display:none;">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f23" checked />
								隐藏</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>楼层：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g1"<?php if(strstr($row['pro_cs7'],"g1")){echo 'checked';}?>>
								6层以下</div>
							<div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g2"<?php if(strstr($row['pro_cs7'],"g2")){echo 'checked';}?>>
								6-12层</div>
							<div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g3"<?php if(strstr($row['pro_cs7'],"g3")){echo 'checked';}?>>
								12层以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>朝向：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h1"<?php if(strstr($row['pro_cs8'],"h1")){echo 'checked';}?>>
								东</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h2"<?php if(strstr($row['pro_cs8'],"h2")){echo 'checked';}?>>
								南</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h3"<?php if(strstr($row['pro_cs8'],"h3")){echo 'checked';}?>>
								西</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h4"<?php if(strstr($row['pro_cs8'],"h4")){echo 'checked';}?>>
								北</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h5"<?php if(strstr($row['pro_cs8'],"h5")){echo 'checked';}?>>
								南北</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>装修：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i1"<?php if(strstr($row['pro_cs9'],"i1")){echo 'checked';}?>>
								毛胚</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i2"<?php if(strstr($row['pro_cs9'],"i2")){echo 'checked';}?>>
								普通装修</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i3"<?php if(strstr($row['pro_cs9'],"i3")){echo 'checked';}?>>
								精装修</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i4"<?php if(strstr($row['pro_cs9'],"i4")){echo 'checked';}?>>
								豪华装修</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>房龄：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j1"<?php if(strstr($row['pro_cs10'],"j1")){echo 'checked';}?>>
								5年内</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j2"<?php if(strstr($row['pro_cs10'],"j2")){echo 'checked';}?>>
								5-10年</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j3"<?php if(strstr($row['pro_cs10'],"j3")){echo 'checked';}?>>
								10-20年</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j4"<?php if(strstr($row['pro_cs10'],"j4")){echo 'checked';}?>>
								20年以上</div>
							<div style="clear:both"></div></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">小区名称：</td>
			<td><INPUT name="pro_cs11" type="text" id="pro_can1" size="30" maxlength="80" value="<?php echo $row['pro_cs11']; ?>"></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">详细地址：</td>
			<td><INPUT name="pro_cs12" type="text" id="pro_can1" size="30" maxlength="80" value="<?php echo $row['pro_cs12']; ?>"></td>
		</tr>
		<tr class="tdbg2">
			<td width="120" align="right" class="red">参　　数：</td>
			<td><table border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td>户型：</td>
						<td><INPUT name="pro_cs13" type="text" id="pro_can1"  maxlength="50" value="<?php echo $row['pro_cs13']; ?>"></td>
						<td>月租：</td>
						<td><INPUT name="pro_cs42" type="text" id="pro_can3"  maxlength="50" value="<?php echo $row['pro_cs42']; ?>">
							元/月</td>
					</tr>
					<tr>
						<td>建筑面积：</td>
						<td><INPUT name="pro_cs18" type="text" id="pro_can2"  maxlength="50" value="<?php echo $row['pro_cs18']; ?>">
							平米</td>
						<td>套内面积：</td>
						<td><INPUT name="pro_cs19" type="text" id="pro_can2"  maxlength="50" value="<?php echo $row['pro_cs19']; ?>">
							平米</td>
					</tr>
					<tr>
						<td>楼层：</td>
						<td><INPUT name="pro_cs20" type="text" id="pro_can3"  maxlength="50" value="<?php echo $row['pro_cs20']; ?>"></td>
						<td>楼龄：</td>
						<td><INPUT name="pro_cs21" type="text" id="pro_can4"  maxlength="50" value="<?php echo $row['pro_cs21']; ?>"></td>
					</tr>
					<tr>
						<td>房屋现状：</td>
						<td><INPUT name="pro_cs22" type="text" id="pro_can3"  maxlength="50" value="<?php echo $row['pro_cs22']; ?>"></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg2">
			<td width="120" align="right" class="red">房屋标签：</td>
			<td><table border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td>标签1：</td>
						<td><INPUT name="pro_cs23" type="text" id="pro_can1"  maxlength="50" value="<?php echo $row['pro_cs23']; ?>"></td>
						<td>标签2：</td>
						<td><INPUT name="pro_cs24" type="text" id="pro_can2"  maxlength="50" value="<?php echo $row['pro_cs24']; ?>"></td>
					</tr>
					<tr>
						<td>标签3：</td>
						<td><INPUT name="pro_cs25" type="text" id="pro_can3"  maxlength="50" value="<?php echo $row['pro_cs25']; ?>"></td>
						<td>标签4：</td>
						<td><INPUT name="pro_cs26" type="text" id="pro_can3"  maxlength="50" value="<?php echo $row['pro_cs26']; ?>"></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg2">
			<td width="120" align="right" class="red">房屋配置：</td>
			<td><table border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td>电梯：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs27" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs27'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs27" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs27'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>空调：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs28" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs28'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs28" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs28'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>冰箱：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs29" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs29'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs29" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs29'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>洗衣机：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs30" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs30'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs30" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs30'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>热水器：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs31" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs31'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs31" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs31'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>燃气灶：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs32" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs32'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs32" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs32'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>床：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs33" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs33'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs33" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs33'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>沙发：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs34" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs34'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs34" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs34'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>餐桌：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs35" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs35'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs35" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs35'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>衣柜：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs36" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs36'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs36" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs36'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>电视：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs37" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs37'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs37" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs37'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>抽油烟机：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs38" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs38'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs38" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs38'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>橱柜：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs39" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs39'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs39" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs39'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>马桶：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs40" type="radio" id="pro_can1" value="yes"<?php if(strstr($row['pro_cs40'],"yes")){echo 'checked';}?>>
								有</div>
							<div class="asd">
								<INPUT name="pro_cs40" type="radio" id="pro_can1" value="no"<?php if(strstr($row['pro_cs40'],"no")){echo 'checked';}?>>
								无</div>
							<div style="clear:both"></div></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg">
			<td align="right" valign="top"><strong><br>
				</strong>基本信息：</td>
			<td > 小区简介：<br/>
				<textarea name="pro_cs15" rows="4" id="pro_cs15" style="width:574px;"><?php echo rehtml($row['pro_cs15'])?></textarea>
				<br/>
				交通配套：<br/>
				<textarea name="pro_cs16" rows="4" id="pro_cs16" style="width:574px;"><?php echo rehtml($row['pro_cs16'])?></textarea>
				<br/></td>
		</tr>
		<tr class="tdbg">
			<td align="right" valign="top"><strong><br>
				</strong>房源介绍：</td>
			<td > 房源亮点：<br/>
				<textarea name="pro_cs17" rows="4" id="pro_cs17" style="width:574px;"><?php echo rehtml($row['pro_cs17'])?></textarea>
				<br/></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">楼盘图片：</td>
			<td><script id="editor2" name="z_body1" type="text/plain" style="width:700px;height:400px;"><?php echo $row['z_body1'];?></script></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">图片上传：</td>
			<td ><IFRAME style="margin-top:2px;"height=22 src="uploadd.php?frameid=frame1&kuang=img_sl&img_sl=<?php echo $row['img_sl']?>" width="380" frameborder=0  scrolling=no name="frame1" id="frame1"></iframe>
				<input type="hidden" name="img_sl" id="img_sl" value="<?php echo $row['img_sl']?>"></td>
		</tr>
		<!--多图上传-->
		<tr class="tdbg">
			<td width="120" align="right">多图片上传：</td>
			<td><IFRAME id="fra" name="fra"  height=340 src="img_default.php?pro_id=<?php echo $id?>" width="630" frameborder=0 scrolling="auto"></iframe></td>
		</tr>
		<!--多图上传end-->
		<tr class="tdbg">
			<td width="120" align="right">显示顺序：</td>
			<td><INPUT name="px" type="text" id="px" size="5" maxlength="11" value="<?php echo $row['px']?>" >
				<span class="red">* (从大到小排序)</span></td>
		</tr>
	</table>
	<p align="center">
		<input type="submit" name="Submit" value=" 保 存 " class="btn">
		&nbsp; &nbsp; &nbsp;
		<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='<?php echo $url?>';" class="btn">
	</p>
</FORM>
<script>
	$('.weizhi input').each(function(){
		var q=$(this).val();
		var id=<?php echo $id;?>;
		
		$(this).click(function(){
			$.ajax({
				url: "getsite.php", 
				type: "get",//提交类型
				dataType:"html",
				data: {'q':q,'id':id},//提交数据
				success: function(msg){ //回调函数9
					console.log(msg)
					$("#abc").html(msg);
				}
			});
		})
		
	})
</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
	var ue2 = UE.getEditor('editor2');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
</body>
</html>
