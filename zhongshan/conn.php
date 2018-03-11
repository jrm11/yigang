<?php
require('../include/common.inc.php');

$sql='select site_title,site_key,site_des,site_bot from `'.$tablepre.'setup` where id=1 ';
$result=$db->query($sql);
if($row=$db->getrow($result)){
	$site_title=$row['site_title'];
	$site_key=$row['site_key'];
	$site_des=$row['site_des'];
	$site_bot=$row['site_bot'];
}
$db->freeresult($result);
?>