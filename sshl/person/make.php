<?php
require('../../include/common.inc.php');
checklogin();
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';
if ($ac==''){
	msg('参数错误');
}

//排序
if($ac=='px'){
	$px=isset($_POST['px'])?$_POST['px']:'';
	if ($px==''||!checknum($px))
	{
		msg('参数错误','',$db);
	}
	foreach($px as $k=>$v){
		$sql='update `'.$tablepre.'person` set `px`='.$v.' where `id`='.$k.'';
		$db->execute($sql);
	}
}
else{
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误','',$db);
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	//验证
	if($ac=='yz1'){
		$db->execute('update `'.$tablepre.'person` set `yz`="yes" where `id` in ('.$id.')');
	}
	if($ac=='yz2'){
		$db->execute('update `'.$tablepre.'person` set `yz`="no" where `id` in ('.$id.')');
	}
	//取消屏蔽
	if($ac=='ping1'){
		$db->execute('update `'.$tablepre.'person` set `pass`="yes" where `id` in ('.$id.')');
	}
	//屏蔽
	if($ac=='ping2'){
		$db->execute('update `'.$tablepre.'person` set `pass`="no" where `id` in ('.$id.')');
	}
	//删除
	elseif ($ac=='del'){
		//$db->execute('delete from `'.$tablepre.'person` where `id` in ('.$id.')');
		//$result=$db->query('select username from person where id in ('.$id.')');
		//while($row=$db->getrow($result)){
		//	$db->execute('delete from `'.$tablepre.'person` where `username` ="'.$row['username'].'" ');
		//}
		$db->execute('delete from `'.$tablepre.'person` where `id` in ('.$id.')');
	}
}

msg('操作成功','location="'.$url.'"');
?>