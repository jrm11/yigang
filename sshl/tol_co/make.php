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
		msg('参数错误');
	}
	foreach($px as $k=>$v){
		$sql='update `'.$tablepre.'tol_co` set `px`='.$v.' where `id`='.$k.'';
		$db->execute($sql);
	}
}
else{
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	//删除
	elseif ($ac=='del'){
		$db->execute('delete from `'.$tablepre.'tol_co` where `id` in ('.$id.')');
	}
}

msg('操作成功','location="'.$url.'"');
?>