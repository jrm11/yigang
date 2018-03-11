<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加信息栏目</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if(gt('title_lm').value==''){
		alert('栏目名称不能为空');
		gt('title_lm').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('栏目的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加信息栏目</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加栏目</a></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="addd.php" onSubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">上级栏目：</td>
    <td>
    <select name="fid" id="fid">
      <option value="0" selected="selected">无{作为一级栏目}</option>
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
			$sql='select * from `'.$tablepre.'info_lm` where `fid`='.$fid.' and `xia`="yes" order by `px` desc,`id_lm` desc';
			$rek=$db->query($sql);
			while($rsk=$db->getrow($rek)){
				echo'<option value="'.$rsk["id_lm"].'">'.$i.$rsk["title_lm"].'</option>'."\n";
				addlm($rsk['id_lm'],$i);
			}
			$db->freeresult($rek);
		}
		?>
    </select>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">栏目名称：</td>
    <td><INPUT name="title_lm" type="text" id="title_lm" size="30" maxlength="150"> <span class="red">*</span></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
    <tr class="tdbg">
    <td align="right">栏目属性：</td>
    <td>
      <input name="gao" type="checkbox" id="gao" value="yes" onClick="if(this.checked==true){gt('gaoji').style.display='';}else{gt('gaoji').style.display='none';}">
    显示高级设置</td>
  </tr>
  <tr class="tdbg"  id="gaoji" style="display:none;">
    <td align="right">&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30"><label>
          <input name="add_xx" type="radio" id="add_xx" value="yes" checked>
          是
          <input type="radio" name="add_xx" id="add_xx" value="no">
        否 可以添加信息</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input name="xia" type="radio" id="xia" value="yes">
          是
          <input type="radio" name="xia" id="xia" value="no" checked>
        否 有下级栏目</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input name="info_link" type="radio" id="info_link" value="yes">
          是
          <input name="info_link" type="radio" id="info_link" value="no" checked>
        否 有外部连接</label></td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_from" type="radio" id="info_from" value="yes">
          是
          <input name="info_from" type="radio" id="info_from" value="no" checked>
        否 有信息来源和信息作者</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_f_body" type="radio" id="info_f_body" value="yes">
          是
          <input name="info_f_body" type="radio" id="info_f_body" value="no" checked>
        否 有简要介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_z_body" type="radio" id="info_z_body" value="yes" checked>
          是
          <input name="info_z_body" type="radio" id="info_z_body" value="no">
        否 有详细介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_img_sl" type="radio" id="info_img_sl" value="yes" onclick="document.getElementById('tr_s').style.display=''">
          是
          <input name="info_img_sl" type="radio" id="info_img_sl" value="no" checked onclick="document.getElementById('tr_s').style.display='none'">
        否 有图片上传</td>
      </tr>
      <tr id="tr_s" style="display:none;">
        <td height="30">
          <input type="radio" name="s_pic" id="s_pic" value="yes" onclick="document.getElementById('tb_s').style.display=''">
          是
          <input name="s_pic" type="radio" id="s_pic" value="no" checked  onclick="document.getElementById('tb_s').style.display='none'">
        否 生成缩略图
        <table border="0" cellspacing="0" cellpadding="2" id="tb_s" style="display:none;">
          <tr>
          <td>类型</td>
            <td>
            <select name="s_typ" id="s_typ">
                <option value="yes">固定尺寸</option>
                <option value="no" selected="selected">不超过尺寸</option>
            </select></td>
            <td>宽度</td>
            <td><input type="text" size="8" name="s_wid" /></td>
            <td>高度</td>
            <td><input type="text" size="8" name="s_hei" /></td>
          </tr>
        </table>

        </td>
      </tr>
      <tr>
        <td height="30">
          <input name="dow_sl" type="radio" value="yes">
          是
          <input name="dow_sl" type="radio" value="no" checked>
        否 有图片二上传</td>
      </tr>
      <tr>
        <td height="30">
          <input name="vid_sl" type="radio" value="yes">
          是
          <input name="vid_sl" type="radio" value="no" checked>
        否 有视频上传</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_wtime" type="radio" id="info_wtime" value="yes" checked>
          是
          <input name="info_wtime" type="radio" id="info_wtime" value="no">
        否 有发布时间</td>
      </tr>

    </table></td>
  </tr>
</table>
<p align="center">
<input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
</p>
</FORM>
</body>
</html>
