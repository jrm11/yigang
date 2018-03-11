<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'info_lm` where `id_lm`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该栏目不存在或已删除');
}
$db->freeresult($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改信息栏目</title>
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
    <td colspan="2">修改信息栏目</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a><!--&nbsp;|&nbsp;<a href="add.php">添加栏目</a>--></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="editt.php" onSubmit="return check()">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
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
    <script>
    gt('fid').value='<?php echo $row['fid']?>';
    </script>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">栏目名称：</td>
    <td><INPUT name="title_lm" type="text" id="title_lm" size="30" maxlength="150" value="<?php echo $row['title_lm']?>"> <span class="red">*</span></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="10"  value="<?php echo $row['px']?>">
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
          <input name="add_xx" type="radio" id="add_xx" value="yes" <?php if ($row['add_xx']=='yes'){echo' checked';}?>>
          是
          <input type="radio" name="add_xx" id="add_xx" value="no" <?php if ($row['add_xx']=='no'){echo' checked';}?>>
        否 可以添加信息</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input name="xia" type="radio" id="xia" value="yes" <?php if ($row['xia']=='yes'){echo' checked';}?>>
          是
          <input type="radio" name="xia" id="xia" value="no" <?php if ($row['xia']=='no'){echo' checked';}?>>
        否 有下级栏目</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input name="info_link" type="radio" id="info_link" value="yes" <?php if ($row['info_link']=='yes'){echo' checked';}?>>
          是
          <input name="info_link" type="radio" id="info_link" value="no"  <?php if ($row['info_link']=='no'){echo' checked';}?>>
        否 有外部连接</label></td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_from" type="radio" id="info_from" value="yes" <?php if ($row['info_from']=='yes'){echo' checked';}?>>
          是
          <input name="info_from" type="radio" id="info_from" value="no"  <?php if ($row['info_from']=='no'){echo' checked';}?>>
        否 有信息来源和信息作者</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_f_body" type="radio" id="info_f_body" value="yes" <?php if ($row['info_f_body']=='yes'){echo' checked';}?>>
          是
          <input name="info_f_body" type="radio" id="info_f_body" value="no"  <?php if ($row['info_f_body']=='no'){echo' checked';}?>>
        否 有简要介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_z_body" type="radio" id="info_z_body" value="yes" <?php if ($row['info_z_body']=='yes'){echo' checked';}?>>
          是
          <input name="info_z_body" type="radio" id="info_z_body" value="no"  <?php if ($row['info_z_body']=='no'){echo' checked';}?>>
        否 有详细介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_img_sl" type="radio" id="info_img_sl" value="yes" <?php if ($row['info_img_sl']=='yes'){echo' checked';}?> onclick="document.getElementById('tr_s').style.display=''">
          是
          <input name="info_img_sl" type="radio" id="info_img_sl" value="no"  <?php if ($row['info_img_sl']=='no'){echo' checked';}?>  onclick="document.getElementById('tr_s').style.display='none'">
        否 有图片上传</td>
      </tr>
      <tr id="tr_s" <?php if ($row['info_img_sl']=='no'){echo' style="display:none;"';}?>>
        <td height="30">
          <input type="radio" name="s_pic" id="s_pic" value="yes" <?php if ($row['s_pic']=='yes'){echo' checked';}?> onclick="document.getElementById('tb_s').style.display=''">
          是
          <input name="s_pic" type="radio" id="s_pic" value="no" <?php if ($row['s_pic']=='no'){echo' checked';}?>  onclick="document.getElementById('tb_s').style.display='none'">
        否 生成缩略图
        <table border="0" cellspacing="0" cellpadding="2" id="tb_s" <?php if ($row['s_pic']=='no'){echo' style="display:none;"';}?>>
          <tr>
          <td>类型</td>
            <td>
            <select name="s_typ" id="s_typ">
                <option value="yes">固定尺寸</option>
                <option value="no">不超过尺寸</option>
            </select>
            <script>
            document.getElementById("s_typ").value="<?php echo $row['s_typ'] ?>";
            </script>
            </td>
            <td>宽度</td>
            <td><input type="text" size="8" name="s_wid" value="<?php echo $row['s_wid'] ?>" /></td>
            <td>高度</td>
            <td><input type="text" size="8" name="s_hei" value="<?php echo $row['s_hei'] ?>" /></td>
          </tr>
        </table>

        </td>
      </tr>
      <tr>
        <td height="30">
          <input name="dow_sl" type="radio" value="yes" <?php if ($row['dow_sl']=='yes'){echo' checked';}?>>
          是
          <input name="dow_sl" type="radio" value="no" <?php if ($row['dow_sl']=='no'){echo' checked';}?>>
        否 有图片二上传</td>
      </tr>
      <tr>
        <td height="30">
          <input name="vid_sl" type="radio" value="yes" <?php if ($row['vid_sl']=='yes'){echo' checked';}?>>
          是
          <input name="vid_sl" type="radio" value="no" <?php if ($row['vid_sl']=='no'){echo' checked';}?> >
        否 有视频上传</td>
      </tr>
      <tr>
        <td height="30">
          <input name="info_wtime" type="radio" id="info_wtime" value="yes" <?php if ($row['info_wtime']=='yes'){echo' checked';}?>>
          是
          <input name="info_wtime" type="radio" id="info_wtime" value="no"  <?php if ($row['info_wtime']=='no'){echo' checked';}?>>
        否 有发布时间</td>
      </tr>

    </table></td>
  </tr>
</table>
<p align="center">
<input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
</p>
</FORM>
</body>
</html>
