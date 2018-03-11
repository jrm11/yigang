<?php
require('../../include/common.inc.php');
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
<script src="../scripts/function.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>

<br />
<FORM name="form1" id="form1" method="post" action="addd.php" onSubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="tdbg">
    <td align="right">账号：</td>
    <td><INPUT name="username" type="text" id="username" size="30" maxlength="80"> <span class="red">*</span></td>
  </tr>
  <tr class="tdbg">
    <td align="right">密码：</td>
    <td><INPUT name="password" type="text" id="password" size="30" maxlength="80"> <span class="red">*</span></td>
  </tr>	
</table>
<p align="center">
<input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
</p>
</FORM>
</body>
</html>