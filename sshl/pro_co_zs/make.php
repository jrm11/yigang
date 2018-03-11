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
		$sql='update `'.$tablepre.'pro_co_zs` set `px`='.$v.' where `id`='.$k.'';
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
		$db->execute('update `'.$tablepre.'pro_co_zs` set `tuijian`="1" where `id` in ('.$id.')');
	}
	//取消推荐
	if($ac=='tuijian2'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `tuijian`="0" where `id` in ('.$id.')');
	}
	//热点
	if($ac=='hot1'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `hot`="1" where `id` in ('.$id.')');
	}
	//取消热点
	if($ac=='hot2'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `hot`="0" where `id` in ('.$id.')');
	}
	//精
	if($ac=='jing1'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `jing`="1" where `id` in ('.$id.')');
	}
	//取消热点
	if($ac=='jing2'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `jing`="0" where `id` in ('.$id.')');
	}
	//取消屏蔽
	if($ac=='ping1'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `pass`="yes" where `id` in ('.$id.')');
	}
	//屏蔽
	if($ac=='ping2'){
		$db->execute('update `'.$tablepre.'pro_co_zs` set `pass`="no" where `id` in ('.$id.')');
	}
	//删除
	elseif ($ac=='del'){
		$sql='select `id`,`img_sl` from `'.$tablepre.'pro_co_zs` where `id` in ('.$id.')';
		$result=$db->query($sql);
		while($row=$db->getrow($result)){
			if ($row['img_sl']!=''){
				delfile($row['img_sl']);
				delfile(substr($row['img_sl'],0,strrpos($row['img_sl'],'/')+1).'d'.substr($row['img_sl'],strrpos($row['img_sl'],'/')+1));
			}
			$db->execute('delete from `'.$tablepre.'pro_co_zs` where `id`='.$row['id'].'');
		}
		$db->freeresult($result);
	}
}

msg('操作成功','location="'.$url.'"');
?>