<?php
require('../../include/common.inc.php');
checklogin();
$username=isset($_POST['username'])?html($_POST['username']):'';
$password=isset($_POST['password'])?html($_POST['password']):'';

/*for($i=0;$i<count($youhui);$i++){
	
}
*/


$sql='insert into `'.$tablepre.'person` (`username`,`password`) values("'.$username.'","'.$password.'")';
$db->execute($sql);
msg('添加成功','location="default.php"');
?>