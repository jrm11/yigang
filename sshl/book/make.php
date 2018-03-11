<?php
require('../../include/common.inc.php');
checklogin();
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';
if ($ac==''){
	msg('参数错误');
}

//排序
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误','',$db);
}
if (is_array($id)){
	$id=implode(',',$id);
}
//取消屏蔽
if($ac=='ping1'){
	$db->execute('update `'.$tablepre.'book` set `pass`="yes" where `id` in ('.$id.')');
}
//屏蔽
if($ac=='ping2'){
	$db->execute('update `'.$tablepre.'book` set `pass`="no" where `id` in ('.$id.')');
}
//删除
elseif ($ac=='del'){
	$db->execute('delete from `'.$tablepre.'book` where `id` in ('.$id.')');
}


msg('操作成功','location="'.$url.'"');
?>