<?php
require('../../include/common.inc.php');
checklogin();
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($lm==''||!checknum($lm)||$title==''||$px==''||!checknum($px)){
	msg('参数错误!');
}
$sql='insert into `'.$tablepre.'tol_co` (`lm`,`title`,`z_body`,`px`,`wtime`,`ip`) values('.$lm.',"'.$title.'","'.$z_body.'",'.$px.','.time().',"'.getip().'")';
$db->execute($sql);
msg('添加成功','location="default.php"');
?>