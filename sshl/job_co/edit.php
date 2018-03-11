<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
$img_sl="";
$dow_sl="";
$vid_sl="";
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'job_co` where `id`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该信息不存在或已删除');
}
else{
	$lm=$row['lm'];
	$img_sl=$row['img_sl'];
	$dow_sl=$row['dow_sl'];
	$vid_sl=$row['vid_sl'];
	}
$db->freeresult($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改信息</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if (gt('lm').value=="n"){
		alert("请选择栏目");
		gt('lm').focus();
		return false;
	}
	if (gt('lm').value=="no"){
		alert("所选栏目不允许添加信息");
		gt('lm').focus();
		return false;
	}
	if(gt('title').value==''){
		alert('标题不能为空');
		gt('title').focus();
		return false;
	}
	if((gt('uselink').checked==true)&&(gt('link_url').value=="http://"||gt('link_url').value=="")){
		alert("提示：请填写外部连接地址！");
		gt('link_url').focus();
		return false;
	} 
	if(gt('px').value==''){
		alert('信息的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
<script>
<?php 
echo'shu_lm=new Array();'."\n";
$sql='select * from `'.$tablepre.'job_lm`';
$result=$db->query($sql);
$a=0;
while($rs=$db->getrow($result)){
	echo'shu_lm['.$a.']=new Array('.$rs['id_lm'].',"'.$rs['info_link'].'","'.$rs['info_from'].'","'.$rs['info_f_body'].'","'.$rs['info_z_body'].'","'.$rs['info_img_sl'].'","'.$rs['info_wtime'].'","'.$rs['s_pic'].'","'.$rs['s_typ'].'","'.$rs['s_wid'].'","'.$rs['s_hei'].'","'.$rs['dow_sl'].'","'.$rs['vid_sl'].'")'."\n";
	if($rs['id_lm']=$lm)
	{
		$s_pic=$rs['s_pic'];
		$s_typ=$rs['s_typ'];
		$s_wid=$rs['s_wid'];
		$s_hei=$rs['s_hei'];
		}
	$a++;
}
$db->freeresult($result);
echo'var counter='.$a.';'."\n";
?>
function check_display(){
	var dis_uselink=gt("dis_uselink");
	var dis_info_from=gt("dis_info_from");
	var dis_f_body=gt("dis_f_body");
	var dis_z_body=gt("dis_z_body");
	var dis_img_sl=gt("dis_img_sl");
	var dis_dow_sl=gt("dis_dow_sl");
	var dis_vid_sl=gt("dis_vid_sl");
	var dis_wtime=gt("dis_wtime");
	var dis_frame1=document.getElementById("frame1");
	var lm=gt('lm').value;
	for(i=0;i<counter;i++){
		if(lm==shu_lm[i][0]){
			(shu_lm[i][1]=='yes')?dis_uselink.style.display='':dis_uselink.style.display='none';
			(shu_lm[i][2]=='yes')?dis_info_from.style.display='':dis_info_from.style.display='none';
			(shu_lm[i][3]=='yes')?dis_f_body.style.display='':dis_f_body.style.display='none';
			(shu_lm[i][4]=='yes')?dis_z_body.style.display='':dis_z_body.style.display='none';
			if(shu_lm[i][5]=="yes"){
				dis_img_sl.style.display="";
				dis_frame1.src="uploadd.php?frameid=frame1&kuang=img_sl&img_sl=<?php echo $img_sl?>&s_pic="+shu_lm[i][7]+"&s_typ="+shu_lm[i][8]+"&s_wid="+shu_lm[i][9]+"&s_hei="+shu_lm[i][10];
			}else{
				dis_img_sl.style.display="none";
			}
			(shu_lm[i][11]=="yes")?dis_dow_sl.style.display="":dis_dow_sl.style.display="none";
			(shu_lm[i][12]=="yes")?dis_vid_sl.style.display="":dis_vid_sl.style.display="none";
			(shu_lm[i][6]=='yes')?dis_wtime.style.display='':dis_wtime.style.display='none';
			break;
		}
	}
}
function checklink(){
	var dis_uselink=gt("dis_uselink");
	var dis_info_from=gt("dis_info_from");
	var dis_f_body=gt("dis_f_body");
	var dis_z_body=gt("dis_z_body");
	var dis_img_sl=gt("dis_img_sl");
	var dis_dow_sl=gt("dis_dow_sl");
	var dis_vid_sl=gt("dis_vid_sl");
	var dis_wtime=gt("dis_wtime");
	var uselink=gt("uselink");
	var link_url=gt("link_url");
	var lm=gt('lm').value;
	if (uselink.checked==true){
		dis_info_from.style.display="none";
		dis_f_body.style.display="none";
		dis_z_body.style.display="none";
		dis_wtime.style.display="none";
			for (i=0;i<counter;i++){
				 if (lm==shu_lm[i][0]){
					(shu_lm[i][5]=='yes')?dis_img_sl.style.display='':dis_img_sl.style.display='none';
				 	break;
				 }
			 }
	}else{
		check_display();
	}
}
</script>
<script src="../scripts/function.js"></script>

<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="../ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改信息</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加信息</a></td>
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
    <td width="120" align="right">所属栏目：</td>
    <td>
    <select name="lm" id="lm" onchange="check_display()">
      <option value="n" selected="selected">请选择栏目</option>
    	<?php
		addlm(0,'');
		$db->close();
		function addlm($fid,$i){
			global $db,$tablepre;
			if ($i==''){
				$i='• ';
			}elseif ($i=='• '){
				$i=' 　|—';
			}else{
				$i=' 　|'.$i;
			}
			$sql='select * from `'.$tablepre.'job_lm` where `fid`='.$fid.' order by `px` desc,`id_lm` desc';
			$rek=$db->query($sql);
			while($rsk=$db->getrow($rek)){
				if($rsk['add_xx']=='yes'){
					echo'<option value="'.$rsk["id_lm"].'">'.$i.$rsk["title_lm"].'</option>'."\n";	
				}else{
					echo'<option value="no">'.$i.$rsk["title_lm"].'×</option>'."\n";
				}
				addlm($rsk['id_lm'],$i);
			}
			$db->freeresult($rek);
		}
		?>
    </select>
    <script>
    	gt('lm').value='<?php echo $row['lm']?>';
    </script>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">标　　题：</td>
    <td>
    <INPUT name="title" type="text" id="title" size="50" maxlength="150" value="<?php echo $row['title']?>"> <span class="red">*</span>
    <select name="color_font" id="color_font">
      <option value="" selected>颜色</option>
      <option value="#000000" style="background-color:#000000"></option>
      <option value="#FFFFFF" style="background-color:#FFFFFF"></option>
      <option value="#008000" style="background-color:#008000"></option>
      <option value="#800000" style="background-color:#800000"></option>
      <option value="#808000" style="background-color:#808000"></option>
      <option value="#000080" style="background-color:#000080"></option>
      <option value="#800080" style="background-color:#800080"></option>
      <option value="#808080" style="background-color:#808080"></option>
      <option value="#FFFF00" style="background-color:#FFFF00"></option>
      <option value="#00FF00" style="background-color:#00FF00"></option>
      <option value="#00FFFF" style="background-color:#00FFFF"></option>
      <option value="#FF00FF" style="background-color:#FF00FF"></option>
      <option value="#FF0000" style="background-color:#FF0000"></option>
      <option value="#0000FF" style="background-color:#0000FF"></option>
      <option value="#008080" style="background-color:#008080"></option>
    </select>
    <script>
    	gt('color_font').value='<?php echo $row['color_font']?>';
    </script>
    </td>
  </tr>
  <tr  class="tdbg" id="dis_uselink" <?php echo ($row['uselink']=='yes')?'':'style="display:none;"'?> >
    <td align="right">连接地址：</td>
    <td>
    <input type="checkbox" name="uselink" id="uselink" value="yes" <?php echo ($row['uselink']=='yes')?' checked':''?> >
    <input name="link_url" type="text" id="link_url" size="57" maxlength="150" value="<?php echo ($row['link_url']!='')?$row['link_url']:'http://'?>">
    </td>
  </tr>
  <tr class="tdbg" id="dis_info_from" style="display:none;">           
    <td width="120" align="right">信息来源：</td>          
    <td ><input name="info_from" type="text" id="info_from" value="<?php echo $row['info_from']?>" size="24"   maxlength="50">
          <!--&nbsp; 信息作者：<input name="info_author" type="text" id="info_author" value="<?php echo $row['info_author']?>" size="23"   maxlength="50"/>-->
    </td >
  </tr>
  <tr class="tdbg"  id="dis_f_body" style="display:none;">
    <td align="right" valign="top"><strong><br>
    </strong>信息精要：</td>
    <td ><textarea name="f_body" rows="4" id="f_body" style="width:574px;"><?php echo rehtml($row['f_body'])?></textarea></td>
  </tr>
  <tr class="tdbg"  id="dis_z_body">
    <td width="120" align="right">内　　容：</td>
    <td>
	<script id="editor" name="z_body" type="text/plain" style="width:700px;height:400px;"><?php echo $row['z_body'];?></script>
    </td>
  </tr>
  <tr class="tdbg" id="dis_img_sl" style="display:none;">          
    <td width="120" align="right">图片上传：</td>          
    <td ><IFRAME style="margin-top:2px;" height="22" src="uploadd.php?frameid=frame1&kuang=img_sl&img_sl=<?php echo $row['img_sl']?>&s_pic=<?php echo $s_pic?>&s_typ=<?php echo $s_typ?>&s_wid=<?php echo $s_wid?>&s_hei=<?php echo $s_hei?>" width="380" frameborder=0  scrolling=no name="frame1" id="frame1" ></iframe><input type="hidden" name="img_sl" id="img_sl" value="<?php echo $row['img_sl']?>"></td>
  </tr>
    <tr class="tdbg" id="dis_dow_sl" style="display:none;">          
        <td width="120" align="right">文件上传：</td>          
        <td ><IFRAME name="frame2" id="frame2" style="margin-top:2px;"height=22 src="updloadd.php?frameid=frame2&kuang=dow_sl&img_sl=<?php echo $row['dow_sl']?>" width="380" frameborder=0  scrolling=no  ></iframe><input type="hidden" name="dow_sl" id="dow_sl" value="<?php echo $row['dow_sl']?>"></td>
    </tr>
    <tr class="tdbg" id="dis_vid_sl" style="display:none;" >          
        <td width="120" align="right">视频上传：</td>          
        <td ><IFRAME name="frame3" id="frame3" style="margin-top:2px;"height=22 src="upvloadd.php?frameid=frame3&kuang=vid_sl&img_sl=<?php echo $row['vid_sl']?>" width="380" frameborder=0  scrolling=no  ></iframe><input type="hidden" name="vid_sl" id="vid_sl" value="<?php echo $row['vid_sl']?>"></td>
    </tr>
  <tr class="tdbg" id="dis_wtime">
    <td width="120" align="right">发布时间：</td>
    <td ><input name="wtime" type="text" id="wtime" value="<?php echo date('Y-m-d H:i:s',$row['wtime'])?>" maxlength="50">              时间格式为“年-月-日 时:分:秒”，如：<font color="#0000FF">2016-5-7 15:30:12</font></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="11" value="<?php echo $row['px']?>" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">点击数量：</td>
    <td><INPUT name="read_num" type="text" id="read_num" size="5" maxlength="11" value="<?php echo $row['read_num']?>" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
<p align="center">
<input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='<?php echo $url?>';" class="btn">
</p>
</FORM>
<script>checklink();</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


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
