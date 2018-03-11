<?php
require('../../include/common.inc.php');
checklogin();
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
if ($fid==''||!checknum($fid)||$title_lm==''||$px==''||!checknum($px)){
	msg('参数错误');
}
$sql='insert into `'.$tablepre.'info_lm` (`fid`,`title_lm`,`px`,`add_xx`,`xia`,`info_link`,`info_from`,`info_f_body`,`info_z_body`,`info_img_sl`,`s_pic`,`s_typ`,`s_wid`,`s_hei`,`dow_sl`,`vid_sl`,`info_wtime`,`wtime`,`ip`) values('.$fid.',"'.$title_lm.'",'.$px.',"'.$add_xx.'","'.$xia.'","'.$info_link.'","'.$info_from.'","'.$info_f_body.'","'.$info_z_body.'","'.$info_img_sl.'","'.$s_pic.'","'.$s_typ.'","'.$s_wid.'","'.$s_hei.'","'.$dow_sl.'","'.$vid_sl.'","'.$info_wtime.'",'.time().',"'.getip().'")';
$db->execute($sql);
msg('添加成功','location="default.php"');
?>
