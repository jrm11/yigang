<?php
require('../../include/common.inc.php');
checklogin();
 
$site_title=isset($_POST['site_title'])?html($_POST['site_title']):'';
$site_key=isset($_POST['site_key'])?html($_POST['site_key']):'';
$site_des=isset($_POST['site_des'])?html($_POST['site_des']):'';
$site_bot=isset($_POST['site_bot'])?$_POST['site_bot']:'';
$site_email=isset($_POST['site_email'])?html($_POST['site_email']):'';
 


$sql="update `setup` SET `site_bot` = '".$site_bot."',`site_title` = '".$site_title."',`site_key`= '".$site_key."',`site_des`='".$site_des."' where id= 1" ;
$db->execute($sql);
msg('修改成功','location="../setup/"');
?>