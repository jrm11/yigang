<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$color_font=isset($_POST['color_font'])?html($_POST['color_font']):'';
$uselink=isset($_POST['uselink'])?html($_POST['uselink']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$info_from=isset($_POST['info_from'])?html($_POST['info_from']):'';
$info_author=isset($_POST['info_author'])?html($_POST['info_author']):'';
$f_body=isset($_POST['f_body'])?html($_POST['f_body']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$dow_sl=isset($_POST['dow_sl'])?html($_POST['dow_sl']):'';
$vid_sl=isset($_POST['vid_sl'])?html($_POST['vid_sl']):'';
$wtime=isset($_POST['wtime'])?strtotime(html($_POST['wtime'])):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$read_num=isset($_POST['read_num'])?html($_POST['read_num']):'';
$url=isset($_POST['url'])?$_POST['url']:'default.php';
if ($id==''||!checknum($id)||$lm==''||!checknum($lm)||$title==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update `'.$tablepre.'info_co` set `lm`='.$lm.',`title`="'.$title.'",`color_font`="'.$color_font.'",`uselink`="'.$uselink.'",`link_url`="'.$link_url.'",`info_from`="'.$info_from.'",`info_author`="'.$info_author.'",`f_body`="'.$f_body.'",`z_body`="'.$z_body.'",`img_sl`="'.$img_sl.'",`dow_sl`="'.$dow_sl.'",`vid_sl`="'.$vid_sl.'",`wtime`="'.$wtime.'",`px`='.$px.',`read_num`='.$read_num.' where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="'.$url.'"');
?>