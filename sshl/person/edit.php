<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误！');
}

$sql='select * from `'.$tablepre.'person` where `id`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该信息不存在或已删除');
}
$db->freeresult($result);
(previous())?$url=previous():$url='default.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改资料</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../../scripts/checkform.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td >修改会员资料</td>
  </tr>
</table>
<br />
<FORM id=frm name=frm onSubmit="return checkForm('frm')" action=editt.php method=post>
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td width="120" align="right" class="tdbg">账号：</td>
    <td colspan="3" class="tdbg"><?php echo $row['username']?>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">密码：</td>
    <td colspan="3" class="tdbg">
    <?php echo $row['password']?>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">性别：</td>
    <td  class="tdbg"><?php echo $row['sex']?></td>
    <td width="120" align="right" class="tdbg">邮箱：</td>
    <td  class="tdbg" colspan="3"><?php echo $row['email']?></td> 
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">密保问题：</td>
    <td  class="tdbg"><?php echo $row['safe_question']?></td>
    <td width="120" align="right" class="tdbg">密保答案：</td>
    <td  class="tdbg" colspan="3"><?php echo $row['safe_answers']?></td> 
  </tr>
   <tr>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">注册时间</td>
	  <td width="220" bgcolor="#FFFFFF" class="tdbg"><?php echo date('Y-m-d H:i:s',$row['etime'])?></td>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">注册 IP</td>
	  <td bgcolor="#FFFFFF" class="tdbg"><?php echo $row['eip']?></td>
	</tr> 
	<tr>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">上次登录时间：</td>
	  <td width="220" bgcolor="#FFFFFF" class="tdbg"><?php echo ($row['ltime']==0)?'':date('Y-m-d H:i:s',$row['ltime']);?></td>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">上次登录 IP</td>
	  <td bgcolor="#FFFFFF" class="tdbg"><?php echo $row['lip']?></td>
	</tr>
	<tr>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">最后登录时间：</td>
	  <td width="220" bgcolor="#FFFFFF" class="tdbg"><?php echo ($row['ltime']==0)?'':date('Y-m-d H:i:s',$row['ltime']);?></td>
	  <td width="120" align="right" bgcolor="#FFFFFF" class="tdbg">最后登录 IP</td>
	  <td bgcolor="#FFFFFF" class="tdbg"><?php echo $row['lip']?></td>
	</tr>

    
</table>
<p align="center">
<input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='<?php echo $url?>';" class="btn">
</p>
</FORM>
</body>
</html>
