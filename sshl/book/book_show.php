<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_GET['id'])?$_GET['id']:'';
$url=(isset($_GET['url'])&&$_GET['url']!='')?$_GET['url']:previous();
if ($id==''||!checknum($id)){
	msg('参数错误！');
}

$htime='';
$h_body='';
$sql='select * from `'.$tablepre.'book` where `id`='.$id.'';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该留言不存在或已删除','',$db,'',$result);
}else{
	$db->execute('update `'.$tablepre.'book` set `chakan`="yes" where `id`='.$id.'');
	$sql='select  * from `'.$tablepre.'book` where `id`='.$id.' limit 1';
	$res=$db->query($sql);
	if ($rs=$db->getrow($res)){
		$htime=$rs['wtime'];
		$h_body=$rs['z_body'];
	}
	$db->freeresult($res);
}
$db->freeresult($result);
$db->close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改产品</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">查看留言</td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
<?php if($row['address']==1){ ?>
<tr class="title">
    <td></td>
    <td>卖房信息</td>
  </tr>
	<?php }elseif($row['address']==2){ ?>
	<tr class="title">
    <td></td>
    <td>租房信息</td>
  </tr>
	<?php }?>
 
  <tr class="tdbg">
    <td align="right">姓名</td>
    <td><?php echo $row['username']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">电话</td>
    <td><?php echo $row['phone']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">所在城市</td>
    <td><?php echo $row['city']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">小区名称</td>
    <td><?php echo $row['xiaoqu']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">整栋</td>
    <td><?php echo $row['loudonghao']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">房号</td>
    <td><?php echo $row['fanghao']?></td>
  </tr>
   <tr class="tdbg">
    <td align="right">户型</td>
    <td><?php echo $row['huxingshi']?>室&nbsp;<?php echo $row['huxingting']?>厅&nbsp;<?php echo $row['huxingchu']?>厨&nbsp;<?php echo $row['huxingwei']?>卫&nbsp;</td>
  </tr>
   <tr class="tdbg">
    <td align="right">面积</td>
    <td><?php echo $row['mianji']?>平米</td>
  </tr>
   <tr class="tdbg">
    <td align="right">售价/预算</td>
    <td><?php echo $row['jiage']?>万元</td>
  </tr>
  <tr class="tdbg">
    <td align="right">时间</td>
    <td><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
  </tr>
  <tr class="tdbg">
    <td align="right">IP</td>
    <td><?php echo $row['ip']?></td>
  </tr>

 
</table>
<p align="center">
<input name="Cancel" type="button"  value=" 返 回 " onClick="location='<?php echo $url?>';" class="btn">
</p>
</body>
</html>
