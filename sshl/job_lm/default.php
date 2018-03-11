<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品分类管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">产品分类管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加分类</a></td>
  </tr>
</table>
<br />
<form name="form1" action="make.php" method="post" >
<input name="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="40" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td>分类名称</td>
    <td width="200" align="center">管理操作</td>
  </tr>
  <?php 
  deflm(0,'• ');
  $db->close();
  function deflm($fid,$i){
  	global $db,$tablepre;
  	if ($i=='• '){
		$i='';
	}elseif ($i==''){
		$i=' &nbsp;&nbsp;|—';
	}else{
		$i=' &nbsp;│&nbsp;'.$i;
  	}
	$sql='select * from `'.$tablepre.'job_lm` where `fid`='.$fid.' order by `px` desc,`id_lm` desc';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		echo '<tr class="tdbg" onMouseOver="DoHL();" onMouseOut="DoLL();" onClick="DoSL();">'."\n";
		echo'<td align="center"><input name="px['.$rsk["id_lm"].']" id="px['.$rsk["id_lm"].']" type="text" value="'.$rsk["px"].'" maxlength="11" class="num"></td>'."\n";
		echo'<td align="center">'.$rsk["id_lm"].'</td>'."\n";
		$img=($rsk['xia']=='yes')?'<img src="../images/tree_folder4.gif" />':'<img src="../images/tree_folder3.gif" />';
		$title_lm=($i=='')?'<b>'.$rsk["title_lm"].'</b>':$rsk['title_lm'];
		echo'<td>'.$i.$img.$title_lm.'</td>'."\n";
		echo'<td align="center"><A href="edit.php?id='.$rsk["id_lm"].'">修改</A> | <A href="make.php?id='.$rsk["id_lm"].'&ac=del"  onClick="return confirm(\'真的要删除该分类吗?\r\n\r\n所属该分类的所有产品将被删除！\')" >删除</A></td>'."\n";
		echo'</tr>'."\n";
		if ($rsk['xia']=='yes'){
			deflm($rsk['id_lm'],$i);
		}
    }
	$db->freeresult($rek);
}
  ?> 
</table>
<p class="p">
<input name="" type="submit"  class="btn" value="排序"/>
</p>
</form>
</body>
</html>
