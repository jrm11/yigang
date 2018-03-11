<?php
require('../../include/common.inc.php');
checklogin();
isset($_GET['keyword'])?$keyword=stripslashes($_GET['keyword']):$keyword='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资料管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td >会员资料管理</td>
  </tr>

</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>会员检索：</strong></td>
    <td width="224">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
	<td><a href="xls.php"><strong>会员导出</strong></a></td>
  </tr>
</table>
</form>
<br />
<form id="form1" name="form1" action="make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td>昵称</td>
    <td align="center">邮箱</td>
    <td align="center">注册时间</td>
    <td   align="center">登陆次数</td>
    <td width="70" align="center">状态</td>
    <td width="200" align="center">管理操作</td>
  </tr>
<?php
$sq='';

//如果有关键字
if ($keyword!=''){
	$sq.=' and username like "%'.$keyword.'%"';
}

$sqlcount='select COUNT(*) from `'.$tablepre.'person`';
$counter=$db->getqueryallrow($sqlcount);
$sql='select * from `'.$tablepre.'person` where 1=1 '.$sq.' order by `id` desc';
$p=new page();
$p->setpage($counter,25);
$sql.=$p->getlimit();
$result=$db->query($sql);
while ($row=$db->getrow($result)){
$zt='';
($row['pass']=='yes')?$zt='正常':$zt='<span class="green">屏蔽</span>';
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td><?php echo $row['username']?></td>
		<td align="center"><?php echo $row['email']?></td>
        <td align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
        <td align="center"><?php echo $row['login_num']?></td>
		<td align="center"><?php echo $zt?></td>
        <td align="center">
        <a href="edit.php?id=<?php echo $row['id']?>">查看</a> | 
		<?php 
		if ($row['pass']=='yes'){
			echo'<a href="make.php?id='.$row['id'].'&ac=ping2">屏蔽</a> | ';
		}else{
			echo'<a href="make.php?id='.$row['id'].'&ac=ping1" class="green">取消</a> | ';
		}
		?>
        <a href="make.php?id=<?php echo $row['id']?>&ac=del"  onClick="return confirm('确定要删除该数据吗?')">删除</a>       
         </td>
    </tr>
<?php
}
$db->freeresult($result);
$db->close();
?>
</table>
<p class="p">
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="button"  class="btn" value="批量屏蔽" onclick="act('form1','ping2');"/>&nbsp;<input name="" type="button"  class="btn" value="取消屏蔽" onclick="act('form1','ping1');"/>&nbsp;<input name="" type="button"  class="btn" value="删除选中" onclick="act('form1','del');"/>
</p>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td align="center">
    	<?php $p->getpagemenu('&keyword='.$keyword.'')?></td>
  </tr>
</table>
</form>
</body>
</html>
