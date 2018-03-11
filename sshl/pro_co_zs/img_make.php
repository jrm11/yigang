<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';	
$pro_id=isset($_REQUEST['pro_id'])?$_REQUEST['pro_id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$sql='select * from `'.$tablepre.'pro_img_zs` where `id`='.$id.'';
$result=$db->query($sql);
$row=$db->getrow($result);
$db->freeresult($result);
if($row){
	if ($row['sma_img']!=''){
		delfile($row['sma_img']);
	}
	if ($row['mid_img']!=''){
		delfile($row['mid_img']);
	}
	if ($row['big_img']!=''){
		delfile($row['big_img']);
	}
	$db->execute('delete from `'.$tablepre.'pro_img_zs` where `id`='.$row['id'].'');
}

msg('','location="img_default.php?pro_id='.$pro_id.'"');
?>