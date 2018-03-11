<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'pro_lm_hz` where `id_lm`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该分类不存在或已删除');
}
$db->freeresult($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改产品分类</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if(gt('title_lm').value==''){
		alert('分类名称不能为空');
		gt('title_lm').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('分类的显示顺序不能为空');
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
    <td colspan="2">修改产品分类</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加分类</a></td>
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
    <td width="120" align="right">上级分类：</td>
    <td>
    <select name="fid" id="fid">
      <option value="0" selected="selected">无{作为一级分类}</option>
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
			$sql='select * from `'.$tablepre.'pro_lm_hz` where `fid`='.$fid.' and `xia`="yes" order by `px` desc,`id_lm` desc';
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
    <td width="120" align="right">分类名称：</td>
    <td><INPUT name="title_lm" type="text" id="title_lm" size="30" maxlength="150" value="<?php echo $row['title_lm']?>"> <span class="red">*</span></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">分类属性：</td>
    <td>	<input name="add_xx" id="add_xx" type="radio" value="yes" <?php if ($row['add_xx']=='yes'){echo' checked';}?> >是
			<input name="add_xx" id="add_xx" type="radio"  value="no" <?php if ($row['add_xx']=='no'){echo' checked';}?>>
		  否 可以添加产品</td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">下级分类：</td>
    <td><input name="xia" id="xia" type="radio" value="yes" <?php if ($row['xia']=='yes'){echo' checked';}?> >是
		<input name="xia" id="xia" type="radio"  value="no" <?php if ($row['xia']=='no'){echo' checked';}?> >
		  否 有下级分类</td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="10"  value="<?php echo $row['px']?>">
      <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
<p align="center">
<input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
</p>
</FORM>
</body>
</html>
