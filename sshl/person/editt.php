<?php
require('../../include/common.inc.php');
checklogin();
$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';
msg('保存成功！','location="'.$url.'"');
?>