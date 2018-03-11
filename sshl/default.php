<?php
require('../include/common.inc.php');
checkdefault();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>深圳市盛世互联信息技术有限公司后台管理</title>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<script src="scripts/function.js"></script>
</head>
<style>
body {
	font-family:"宋体";
	font-size:12px;
	margin:0px;
	padding:0px;
}
form{
	margin:0;
	padding:0;
}

input{
	font-family:"宋体";
	font-size:12px;
	padding:1px 2px;
	border:#66b2e6 1px solid;
	height:18px;
	line-height:18px;
}

.layout {
	width:1003px;
	height:586px;
	margin:0 auto;/*居中*/
	background:url(images/dl.jpg) no-repeat center top;
}
#log_in {
	width:275px;
	padding:230px 0 0 500px;
}
</style>
<body onload=document.form1.username.focus()>
<div id="content" class="layout" >
  <div id="log_in">
    <form action="admin_login.php" method="post" name="form1" >
      <table width="250" border="0" align="center" cellspacing="8">
        <tr>
          <td align="right">用户名：</td>
          <td width="164"><input name="username" type="text" class="username" size="25" maxlength="50"></td>
        </tr>
        <tr>
          <td align="right">密　码：</td>
          <td><input name="password" type="password" class="password" size="25" maxlength="50"></td>
        </tr>
        <tr>
          <td align="right">验证码：</td>
          <td><input name="safecode" type="text" class="safecode" size="8" style="float:left;"><img src="../include/code.php?t=Math.random()" onClick="this.src='../include/code.php?t='+Math.random()" style="cursor:pointer;float:left; margin-left:5px;"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="submit" type="image" src="images/sub_btn.gif" style="width:57px; height:23px; border:none; margin:0px; padding:0px;"/>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

</body>
</html>