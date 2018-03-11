<?php
require('../../include/common.inc.php');
checklogin();
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
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
		$sql='update `'.$tablepre.'tol_lm` set `px`='.$v.' where `id_lm`='.$k.'';
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
	if ($ac=='del'){
		$sql='select `id_lm`,`xia` from `'.$tablepre.'tol_lm` where `id_lm` in ('.$id.')';
		$result=$db->query($sql);
		while ($row=$db->getrow($result)){
			$db->execute('delete from `'.$tablepre.'tol_lm` where `id_lm`='.$row['id_lm'].'');
			$db->execute('delete from `'.$tablepre.'tol_co` where `lm`='.$row['id_lm'].'');
			if ($row['xia']=='yes'){
				dellm($row['id_lm']);
			}
		}
		$db->freeresult($result);
	}
}

msg('操作成功','location="default.php"');


//循环删除下级栏目和数据
function dellm($id_lm){
	global $db,$tablepre;
	$sql='select `id_lm`,`xia` from `'.$tablepre.'tol_lm` where `fid`='.$id_lm.'';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		$db->execute('delete from `'.$tablepre.'tol_lm` where `id_lm`='.$rsk["id_lm"].'');
		$db->execute('delete from `'.$tablepre.'tol_co` where `lm`='.$rsk["id_lm"].'');
		if ($rsk['xia']=='yes'){
			dellm($rsk['id_lm']);
		}
	}
	$db->freeresult($rek);
}
?>