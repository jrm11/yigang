<?php
require('../../include/common.inc.php');
checklogin();
isset($_GET['keyword'])?$keyword=stripslashes($_GET['keyword']):$keyword='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">留言管理首页</td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>留言检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>
<br />
<form name="form1" action="make.php" method="post" >
<input name="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td width="40" align="center">ID</td>
    <td>姓名</td>
    <td width="160" align="center">时间</td>
    <td width="120" align="center">状态</td>
    <td width="200" align="center" ><strong>常规管理操作</strong></td>
  </tr>
<?php
$sq='';

//如果有关键字
if ($keyword!=''){
	$sq.=' and title like "%'.$keyword.'%"';
}
//开始读留言
$sqlcount='select COUNT(*) from `'.$tablepre.'book` where 1=1 '.$sq.'';
$counter=$db->getqueryallrow($sqlcount);
$sql='select * from `'.$tablepre.'book`  where 1=1 '.$sq.' order by `id` desc';
$p=new page();
$p->setpage($counter,25);
$sql.=$p->getlimit();
$result=$db->query($sql);
while ($row=$db->getrow($result)){
$zt='';
$zt=($row['chakan']=='yes')?'<span class="black">已看 </span>&nbsp;':'<span class="blue">未看 </span>&nbsp;';
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td><?php echo $row['username']?> [ <?php if($row['address']==1){echo '卖房信息'; }elseif($row['address']==2){echo '租房信息';}elseif($row['address']==3){echo '预约看房';}?> ] </td>
        <td  align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
        <td align="center"><?php echo $zt?></td>
        <td align="center">
			<a href="book_show.php?id=<?php echo $row['id']?>"<?php if($row['chakan']=='no'){echo' class="blue"';}?> >查看</a> | 
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
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="button"  class="btn" value="批量删除" onclick="act('form1','del');"/>
</p>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td align="center">
    	<?php 
		if($counter){
			echo $p->getpagemenu('&keyword='.$keyword.'');
		}
		?></td>
  </tr>
</table>
</form>

</body>
</html>
