<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$add_xx=isset($_POST['add_xx'])?html($_POST['add_xx']):'';
$xia=isset($_POST['xia'])?html($_POST['xia']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($id==''||!checknum($id)||$fid==''||!checknum($fid)||$title_lm==''||$add_xx==''||$xia==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sq='';
$st='';
xialm($id);
$sq=$id.$st;
$sq=explode(',',$sq);
if (in_array($fid,$sq)){
	msg('不能把所属上级栏目设为当前栏目和当前栏目的下级栏目');
}

//读取所有下级
function xialm($lm){
	global $db,$tablepre,$st;
	$sql='select `id_lm` from `'.$tablepre.'job_lm` where `fid`='.$lm.'';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		$st.=','.$rsk['id_lm'];
		xialm($rsk['id_lm']);
	}
	$db->freeresult($rek);
}
$sql='update `'.$tablepre.'job_lm` set `fid`='.$fid.',`title_lm`="'.$title_lm.'",`add_xx`="'.$add_xx.'",`xia`="'.$xia.'",`px`='.$px.' where `id_lm`='.$id.'';
$db->execute($sql);
msg('保存成功','location="default.php"');
?>
