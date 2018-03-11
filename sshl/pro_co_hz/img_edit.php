<?php
require('../../include/common.inc.php');
require('img_con.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
$pro_id=isset($_GET['pro_id'])?$_GET['pro_id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if ($pro_id!=''&&!checknum($pro_id)){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多图上传</title>
<link href="../css/admin_style.css" rel="stylesheet" />
<style>
html{overflow-x:hidden;}
body{margin:0px; padding:0px;overflow-x:hidden;}
</style>
<script language="javascript">
function check(){
	var sAllowExt="<?php echo $allowext?>";
	var file_up=document.formn.file_up;
	if (file_up.value==""){
	  alert("请选择要上传的文件");
	  return false;
	}
	if (!IsExt(sAllowExt,file_up.value)){
		alert("请选择一个有效的文件，\n\n支持的格式有（"+sAllowExt+"）");
		return false;
	}
} 
function IsExt(opt,url){
	var sTemp;
	var b=false;
	var s=opt.toUpperCase().split("|");
	ext=url.substr(url.lastIndexOf( ".")+1);
	ext=ext.toUpperCase();
	for (var i=0;i<s.length ;i++ ){
		if (s[i]==ext){
			b=true;
			break;
		}
	}
	return b;
}
</script>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" >
<form name="formn" method="POST" action="img_editt.php" enctype="multipart/form-data" >
<input id="id"  type="hidden" name="id" value="<?php echo $id?>"/>
<input id="pro_id"  type="hidden" name="pro_id" value="<?php echo $pro_id?>"/>
  <tr>
    <td><input type="file" name="file_up" id="file_up" size="20" enctype="multipart/form-data" ></td>
    <td>&nbsp;<input name=mysubm  type="submit" value="上传" >  <input name=mysubm  type="button" value="返回" onclick="history.back()" ></td>
  </tr>
</form>
</table>
</body>
</html>
