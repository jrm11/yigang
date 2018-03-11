<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$add_xx=isset($_POST['add_xx'])?html($_POST['add_xx']):'';
$xia=isset($_POST['xia'])?html($_POST['xia']):'';
$info_link=isset($_POST['info_link'])?html($_POST['info_link']):'';
$info_from=isset($_POST['info_from'])?html($_POST['info_from']):'';
$info_f_body=isset($_POST['info_f_body'])?html($_POST['info_f_body']):'';
$info_z_body=isset($_POST['info_z_body'])?html($_POST['info_z_body']):'';
$info_img_sl=isset($_POST['info_img_sl'])?html($_POST['info_img_sl']):'';
$s_pic=isset($_POST['s_pic'])?html($_POST['s_pic']):'';
$s_typ=isset($_POST['s_typ'])?html($_POST['s_typ']):'';
$s_wid=isset($_POST['s_wid'])?html($_POST['s_wid']):'';
$s_hei=isset($_POST['s_hei'])?html($_POST['s_hei']):'';
$dow_sl=isset($_POST['dow_sl'])?html($_POST['dow_sl']):'';
$vid_sl=isset($_POST['vid_sl'])?html($_POST['vid_sl']):'';
$info_wtime=isset($_POST['info_wtime'])?html($_POST['info_wtime']):'';
if ($id==''||!checknum($id)||$fid==''||!checknum($fid)||$title_lm==''||$px==''||!checknum($px)){
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
	$sql='select `id_lm` from `'.$tablepre.'info_lm` where `fid`='.$lm.'';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		$st.=','.$rsk['id_lm'];
		xialm($rsk['id_lm']);
	}
	$db->freeresult($rek);
}
$sql='update `'.$tablepre.'info_lm` set `fid`='.$fid.',`title_lm`="'.$title_lm.'",`px`='.$px.',`add_xx`="'.$add_xx.'",`xia`="'.$xia.'",`info_link`="'.$info_link.'",`info_from`="'.$info_from.'",`info_f_body`="'.$info_f_body.'",`info_z_body`="'.$info_z_body.'",`info_img_sl`="'.$info_img_sl.'",`s_pic`="'.$s_pic.'",`s_typ`="'.$s_typ.'",`s_wid`="'.$s_wid.'",`s_hei`="'.$s_hei.'",`dow_sl`="'.$dow_sl.'",`vid_sl`="'.$vid_sl.'",`info_wtime`="'.$info_wtime.'" where `id_lm`='.$id.'';
$db->execute($sql);
msg('保存成功','location="default.php"');
?>
