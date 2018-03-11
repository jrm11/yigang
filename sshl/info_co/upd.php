<?php
require('../../include/common.inc.php');
require('updcon.php');
checklogin();
$frameid=(isset($_GET['frameid']))?$_GET['frameid']:'';
$kuang=(isset($_GET['kuang']))?$_GET['kuang']:'';
$s_pic=(isset($_GET['s_pic']))?$_GET['s_pic']:'';
$s_typ=(isset($_GET['s_typ']))?$_GET['s_typ']:'';
$s_wid=(isset($_GET['s_wid']))?$_GET['s_wid']:'';
$s_hei=(isset($_GET['s_hei']))?$_GET['s_hei']:'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传文件</title>
<link href="../css/admin_style.css"  type="text/css" rel="stylesheet">
<style>
body{ margin:0px; padding:0px; background-color:#e5ebf1; height:21px; padding-top:1px; overflow:auto;overflow-x:no;overflow-y:no;}
html{overflow:auto;overflow-x:no;overflow-y:no;background-color:#e5ebf1;}
</style>
<script language="javascript">
function check()
{
var sAllowExt="<?php echo $allowext?>";
file_up=document.formn.file_up;
if (file_up.value=="")
{
  alert('提示：请选择要上传的文件！');
  return false
}

if (!IsExt(file_up.value,sAllowExt))
{
	alert("提示：\n\n请选择一个有效的文件，\n支持的格式有（"+sAllowExt+"）！");
	return false;
}

gt('formn').action="updload.php?frameid=<?php echo $frameid?>&kuang=<?php echo $kuang?>&s_pic=<?php echo $s_pic?>&s_typ=<?php echo $s_typ?>&s_wid=<?php echo $s_wid?>&s_hei=<?php echo $s_hei?>"
gt('formn').submit();
} 
// 是否有效的扩展名
function IsExt(url, opt){
	var sTemp;
	var b=false;
	var s=opt.toUpperCase().split("|");
	for (var i=0;i<s.length ;i++ ){
		sTemp=url.substr(url.length-s[i].length-1);
		sTemp=sTemp.toUpperCase();
		s[i]="."+s[i];
		if (s[i]==sTemp){
			b=true;
			break;
		}
	}
	return b;
}
</script>
<script src="../scripts/function.js"></script>
</head>

<body>
<form name="formn" id="formn" method="POST" enctype="multipart/form-data" >  
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxsize?>" />  
<input type="file" name="file_up" size="20" enctype="multipart/form-data" >
<input name=mysubm  type="button" value="上传"  onclick="check()">     
</form> 
</body>
</html>