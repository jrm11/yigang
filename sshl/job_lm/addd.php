<?php
require('../../include/common.inc.php');
checklogin();
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$add_xx=isset($_POST['add_xx'])?html($_POST['add_xx']):'';
$xia=isset($_POST['xia'])?html($_POST['xia']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($fid==''||!checknum($fid)||$title_lm==''||$add_xx==''||$xia==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='insert into `'.$tablepre.'job_lm` (`fid`,`title_lm`,`add_xx`,`xia`,`px`,`wtime`,`ip`) values('.$fid.',"'.$title_lm.'","'.$add_xx.'","'.$xia.'",'.$px.','.time().',"'.getip().'")';
$db->execute($sql);
msg('添加成功','location="default.php"');
?>
