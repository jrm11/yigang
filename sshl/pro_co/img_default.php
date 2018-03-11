<?php
require('../../include/common.inc.php');
require('img_con.php');
checklogin();
$pro_id=isset($_GET['pro_id'])?$_GET['pro_id']:'';
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
<form name="formn" method="POST" action="img_addd.php" enctype="multipart/form-data" onsubmit="return check()">
  <input id="pro_id"  type="hidden" name="pro_id" value="<?php echo $pro_id?>"/>
  <tr>
    <td><input type="file" name="file_up" id="file_up" size="20" enctype="multipart/form-data" ></td>
    <td>&nbsp;<input name=mysubm  type="submit" value="上传" >  </td>
  </tr>
</form>
</table>
<table border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
  <tr>
    <?php
    if (($pro_id!=''&&checknum($pro_id))||(isset($_SESSION['p_id'])&&$_SESSION['p_id']!=''&&checknum($_SESSION['p_id']))){
		if ($pro_id!=''){
			$sql='select * from pro_img where pro_id='.$pro_id.' and sma_img=1 order by id asc';
		}else{
			$sql='select * from pro_img where pro_id='.$_SESSION['p_id'].' and sma_img=1 order by id asc';
		}
		$res=$db->query($sql);
		$a=1;
		while($rs=$db->getrow($res)){
	?>
    <td width="100" height="160" align="center">
    <table  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="border:1px solid #e4e4e4" width="80" height="80" align="center" valign="middle"><img src="../../<?php echo $rs['big_img']?>" width="70" height="70" border="0" /></td>
      </tr>
      <tr>
        <td align="center" height="25"><input name="12" type="button" value="修改" onclick="location='img_edit.php?id=<?php echo $rs['id']?>&pro_id=<?php echo $pro_id?>'" />&nbsp;<input name="32" type="button" value="删除" onclick="location='img_make.php?id=<?php echo $rs['id']?>&pro_id=<?php echo $pro_id?>'"/></td>
      </tr>
    </table>
    </td>
    <?php
		if($a%6==0){
			echo'</tr><tr>';
		}
		$a++;
	}
	}
	?>
  </tr>
</table>
</body>
</html>
