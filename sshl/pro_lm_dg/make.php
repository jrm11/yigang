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
		$sql='update `'.$tablepre.'pro_lm_dg` set `px`='.$v.' where `id_lm`='.$k.'';
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
		$sql='select `id_lm`,`xia` from `'.$tablepre.'pro_lm_dg` where `id_lm` in ('.$id.')';
		$result=$db->query($sql);
		while ($row=$db->getrow($result)){
			$db->execute('delete from `'.$tablepre.'pro_lm_dg` where `id_lm`='.$row['id_lm'].'');
			$sql='select `id`,`img_sl` from `'.$tablepre.'pro_co_dg` where `lm` = '.$row['id_lm'].'';
			$re=$db->query($sql);
			while($rs=$db->getrow($re)){
				if ($rs['img_sl']!=''){
					delfile($rs['img_sl']);
					delfile(substr($rs['img_sl'],0,strrpos($rs['img_sl'],'/')+1).'d'.substr($rs['img_sl'],strrpos($rs['img_sl'],'/')+1));
				}
				$db->execute('delete from `'.$tablepre.'pro_co_dg` where `id`='.$rs['id'].'');
			}
			$db->freeresult($re);
			if ($row['xia']=='yes'){
				dellm($row['id_lm']);
			}
		}
		$db->freeresult($result);
	}
}

msg('操作成功','location="default.php"');


//循环删除下级分类和数据
function dellm($id_lm){
	global $db,$tablepre;
	$sql='select `id_lm`,`xia` from `'.$tablepre.'pro_lm_dg` where `fid`='.$id_lm.'';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		$db->execute('delete from `'.$tablepre.'pro_lm_dg` where `id_lm`='.$rsk["id_lm"].'');
		$sql='select `id`,`img_sl` from `'.$tablepre.'pro_co_dg` where `lm` = '.$rsk['id_lm'].'';
		$ren=$db->query($sql);
		while($rsn=$db->getrow($ren)){
			if ($rsn['img_sl']!=''){
				delfile($rsn['img_sl']);
				delfile(substr($rsn['img_sl'],0,strrpos($rsn['img_sl'],'/')+1).'d'.substr($rsn['img_sl'],strrpos($rsn['img_sl'],'/')+1));
			}
			$db->execute('delete from `'.$tablepre.'pro_co_dg` where `id`='.$rsn['id'].'');
		}
		$db->freeresult($ren);
		if ($rsk['xia']=='yes'){
			dellm($rsk['id_lm']);
		}
	}
	$db->freeresult($rek);
}
?>