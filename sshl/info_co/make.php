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
		$sql='update `'.$tablepre.'info_co` set `px`='.$v.' where `id`='.$k.'';
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
	//推荐
	if($ac=='tuijian1'){
		$db->execute('update `'.$tablepre.'info_co` set `tuijian`="yes" where `id` in ('.$id.')');
	}
	//取消推荐
	if($ac=='tuijian2'){
		$db->execute('update `'.$tablepre.'info_co` set `tuijian`="no" where `id` in ('.$id.')');
	}
	//热点
	if($ac=='hot1'){
		$db->execute('update `'.$tablepre.'info_co` set `hot`="yes" where `id` in ('.$id.')');
	}
	//取消热点
	if($ac=='hot2'){
		$db->execute('update `'.$tablepre.'info_co` set `hot`="no" where `id` in ('.$id.')');
	}
	//取消屏蔽
	if($ac=='ping1'){
		$db->execute('update `'.$tablepre.'info_co` set `pass`="yes" where `id` in ('.$id.')');
	}
	//屏蔽
	if($ac=='ping2'){
		$db->execute('update `'.$tablepre.'info_co` set `pass`="no" where `id` in ('.$id.')');
	}
	//删除
	elseif ($ac=='del'){
		$sql='select `id`,`img_sl` from `'.$tablepre.'info_co` where `id` in ('.$id.')';
		$result=$db->query($sql);
		while($row=$db->getrow($result)){
			if ($row['img_sl']!=''){
				delfile($row['img_sl']);
				delfile(substr($row['img_sl'],0,strrpos($row['img_sl'],'/')+1).'d'.substr($row['img_sl'],strrpos($row['img_sl'],'/')+1));
			}
			$db->execute('delete from `'.$tablepre.'info_co` where `id`='.$row['id'].'');
		}
		$db->freeresult($result);
	}
}

msg('操作成功','location="'.$url.'"');
?>