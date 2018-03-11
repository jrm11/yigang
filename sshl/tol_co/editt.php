<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$url=isset($_POST['url'])?$_POST['url']:'';
if ($id==''||!checknum($id)||$lm==''||!checknum($lm)||$title==''||$px==''||!checknum($px)){
	msg('参数错误');
}
$sql='update `'.$tablepre.'tol_co` set `lm`='.$lm.',`title`="'.$title.'",`z_body`="'.$z_body.'",`px`='.$px.',`wtime`='.time().' where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="'.$url.'"');
?>