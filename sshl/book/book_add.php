<?php
require('../../include/common.inc.php');
checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$z_body=isset($_POST['h_body'])?html($_POST['h_body']):'';
$url=isset($_POST['url'])?$_POST['url']:'';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'book` where `id_re`='.$id.' order by `id` desc limit 1';
$res=$db->query($sql);
if ($rs=$db->getrow($res)){
	$db->execute('update `'.$tablepre.'book` set `wtime`='.time().',`z_body`="'.$z_body.'" where `id`='.$rs["id"].'');
}else{
	$db->execute('insert into `'.$tablepre.'book` (`id_re`,`z_body`,`wtime`)values('.$id.',"'.$z_body.'",'.time().')');
}
$db->freeresult($res);
if ($z_body==''){
	$db->execute('update `'.$tablepre.'book` set `huifu`="no" where `id`='.$id.'');
}else{
	$db->execute('update `'.$tablepre.'book` set `huifu`="yes" where `id`='.$id.'');
}

msg('回复成功','location="book_show.php?id='.$id.'&url='.urlencode($url).'"');
?>