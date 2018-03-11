<?php
require('../../include/common.inc.php');
checklogin();

$pro_cs6='';
$pro_cs41='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加产品</title>
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
		<td colspan="2">添加产品</td>
	</tr>
	<tr class="tdbg">
		<td width="70" height="26" align="right"><strong>管理导航：</strong></td>
		<td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加产品</a></td>
	</tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="addd.php" onSubmit="return check()">
	<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
		<tr class="title">
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">所属分类：</td>
			<td><select name="lm" id="lm">
					<option value="47" selected="selected">中山新房源</option>
					
				</select></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">所属新房源：</td>
			<td><select name="huxing" id="huxing">
					<option value="" selected="selected">选择所属新房源</option>
					<?php
						$sql_ser='select * from `'.$tablepre.'pro_co_zs` where `lm`=47 order by px desc,id desc  ';
						$result_ser=$db->query($sql_ser);
						while ($row_ser=$db->getrow($result_ser)){
					?>
					<option value="<?php echo $row_ser['id']; ?>"><?php echo $row_ser['title']; ?></option>
					<?php
						}
						$db->freeresult($result_ser);
					?>
				</select></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">所属经纪人：</td>
			<td><select name="jingjiren" id="jingjiren">
					<option value="" selected="selected">选择所属经纪人</option>
					<?php
						$sql_ser='select * from `'.$tablepre.'info_co` where `lm`=17 order by px desc,id desc  ';
						$result_ser=$db->query($sql_ser);
						while ($row_ser=$db->getrow($result_ser)){
					?>
					<option value="<?php echo $row_ser['id']; ?>"><?php echo $row_ser['title']; ?></option>
					<?php
						}
						$db->freeresult($result_ser);
					?>
				</select></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">户型名称：</td>
			<td><INPUT name="title" type="text" id="title" size="30" maxlength="80">
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
										<INPUT name="pro_cs1" type="radio" id="pro_can1"  value="a1">
										中山市区</div>
									<div class="asd">
										<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a2">
										深中大桥区</div>
									<div class="asd">
										<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a3">
										临珠海区</div>
									<div class="asd">
										<INPUT name="pro_cs1" type="radio" id="pro_can1" value="a4">
										西北片区</div>
									<div style="clear:both"></div>
								</div>
							</tr>
							<tr>
								<div id="abc"><br/></div><br/><br/>
							</tr>
							
						</td>
					</tr>
					<tr>
						<td>价格：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c1">
								50万以下</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c2">
								50-100万元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c3">
								100-150万元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c4">
								150-200万元</div>
							<div class="asd">
								<INPUT name="pro_cs3" type="radio" id="pro_can1" value="c5">
								200万元以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>面积：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d1">
								50平方以下</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d2">
								50-70平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d3">
								70-90平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d4">
								90-110平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d5">
								110-130平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d6">
								130-150平方</div>
							<div class="asd">
								<INPUT name="pro_cs4" type="radio" id="pro_can1" value="d7">
								150平方以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>户型：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e1">
								一室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e2">
								二室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e3">
								三室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e4">
								四室</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e5">
								五室以上</div>
							<div class="asd">
								<INPUT name="pro_cs5" type="radio" id="pro_can1" value="e6">
								别墅</div>
							<div class="asd" style="display:none">
								<INPUT name="pro_cs41[]" type="checkbox" id="pro_can1" value="e7" checked />
								隐藏</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>特色：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f11" <?php if(strstr($pro_cs6,"f11")){echo 'checked';}?>>
								满两年</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f12"<?php if(strstr($pro_cs6,"f13")){echo 'checked';}?>>
								满五唯一</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f14"<?php if(strstr($pro_cs6,"f14")){echo 'checked';}?>>
								红本在手</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f15"<?php if(strstr($pro_cs6,"f15")){echo 'checked';}?>>
								近地铁</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f16"<?php if(strstr($pro_cs6,"f16")){echo 'checked';}?>>
								不限购</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f17"<?php if(strstr($pro_cs6,"f17")){echo 'checked';}?>>
								随时看房</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f18"<?php if(strstr($pro_cs6,"f18")){echo 'checked';}?>>
								急售</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f19"<?php if(strstr($pro_cs6,"f19")){echo 'checked';}?>>
								南北通透</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f20"<?php if(strstr($pro_cs6,"f20")){echo 'checked';}?>>
								复式</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f21"<?php if(strstr($pro_cs6,"f21")){echo 'checked';}?>>
								不看商住两用</div>
							<div class="asd">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f22"<?php if(strstr($pro_cs6,"f22")){echo 'checked';}?>>
								新上</div>
							<div class="asd" style="display:none;">
								<INPUT name="pro_cs6[]" type="checkbox" id="pro_can1" value="f23" checked />
								隐藏</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>楼层：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g1">
								6层以下</div>
							<div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g2">
								6-12层</div>
							<div class="asd">
								<INPUT name="pro_cs7" type="radio" id="pro_can1" value="g3">
								12层以上</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>朝向：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h1">
								东</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h2">
								南</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h3">
								西</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h4">
								北</div>
							<div class="asd">
								<INPUT name="pro_cs8" type="radio" id="pro_can1" value="h5">
								南北</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>装修：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i1">
								毛胚</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i2">
								普通装修</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i3">
								精装修</div>
							<div class="asd">
								<INPUT name="pro_cs9" type="radio" id="pro_can1" value="i4">
								豪华装修</div>
							<div style="clear:both"></div></td>
					</tr>
					<tr>
						<td>房龄：</td>
						<td colspan="3"><div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j1">
								5年内</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j2">
								5-10年</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j3">
								10-20年</div>
							<div class="asd">
								<INPUT name="pro_cs10" type="radio" id="pro_can1" value="j4">
								20年以上</div>
							<div style="clear:both"></div></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">小区名称：</td>
			<td><INPUT name="pro_cs11" type="text" id="pro_can1" size="30" maxlength="80"></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">详细地址：</td>
			<td><INPUT name="pro_cs12" type="text" id="pro_can1" size="30" maxlength="80"></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">房源编号：</td>
			<td><INPUT name="pro_cs13" type="text" id="pro_can1" size="30" maxlength="80"></td>
		</tr>
		<tr class="tdbg2">
			<td width="120" align="right" class="red">参　　数：</td>
			<td><table border="0" cellspacing="0" cellpadding="2">
					<tr>
						<td>户型：</td>
						<td><INPUT name="pro_cs14" type="text" id="pro_can1"  maxlength="50"></td>
						<td>面积：</td>
						<td><INPUT name="pro_cs18" type="text" id="pro_can2"  maxlength="50" required="required">
							㎡</td>
					</tr>
					<tr>
						<td>售价：</td>
						<td><INPUT name="pro_cs19" type="text" id="pro_can3"  maxlength="50" required="required">
							万</td>
						<td>每平米售价：</td>
						<td><INPUT name="pro_cs20" type="text" id="pro_can4"  maxlength="50" required="required">
							元/㎡</td>
					</tr>
					<tr>
						<td>套内面积：</td>
						<td><INPUT name="pro_cs21" type="text" id="pro_can3"  maxlength="50" required="required">
							㎡</td>
					</tr>
					<tr>
						<td>楼层高度：</td>
						<td><INPUT name="pro_cs22" type="text" id="pro_can3"  maxlength="50"></td>
					</tr>
				</table></td>
		</tr>
		<tr class="tdbg">
			<td align="right" valign="top"><strong><br>
				</strong>基本信息：</td>
			<td > 小区简介：<br/>
				<textarea name="pro_cs15" rows="4" id="f_body" style="width:574px;"></textarea>
				<br/>
				交通配套：<br/>
				<textarea name="pro_cs16" rows="4" id="f_body" style="width:574px;"></textarea>
				<br/></td>
		</tr>
		<tr class="tdbg">
			<td align="right" valign="top"><strong><br>
				</strong>房源介绍：</td>
			<td > 房源亮点：<br/>
				<textarea name="pro_cs17" rows="4" id="f_body" style="width:574px;"></textarea>
				<br/></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">附近学校：</td>
			<td><script id="editor" name="z_body" type="text/plain" style="width:700px;height:400px;"></script></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">楼盘图片：</td>
			<td><script id="editor2" name="z_body1" type="text/plain" style="width:700px;height:400px;"></script></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">图片上传：</td>
			<td ><IFRAME style="margin-top:2px;"height=22 src="up.php?frameid=frame1&kuang=img_sl" width="380" frameborder=0  scrolling=no   name="frame1" id="frame1"></iframe>
				<input type="hidden" name="img_sl" id="img_sl"></td>
		</tr>
		<tr class="tdbg">
			<td width="120" align="right">多图片上传：</td>
			<td ><IFRAME id="fra" name="fra"  height=340 src="img_default.php" width="630" frameborder=0 scrolling="auto"></iframe></td>
		</tr>
		
			<td width="120" align="right">显示顺序：</td>
			<td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
				<span class="red">* (从大到小排序)</span></td>
		</tr>
	</table>
	<p align="center">
		<input type="submit" name="Submit" value=" 提 交 " class="btn">
		&nbsp; &nbsp; &nbsp;
		<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
	</p>
</FORM>
<script>
	$('.weizhi input').each(function(){
		var q=$(this).val();
		
		$(this).click(function(){
			$.ajax({
				url: "getsitea.php", 
				type: "get",//提交类型
				dataType:"html",
				data: {'q':q},//提交数据
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
