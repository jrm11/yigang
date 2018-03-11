<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$pro_can1=isset($_POST['pro_can1'])?html($_POST['pro_can1']):'';
$pro_can2=isset($_POST['pro_can2'])?html($_POST['pro_can2']):'';
$pro_can3=isset($_POST['pro_can3'])?html($_POST['pro_can3']):'';
$pro_can4=isset($_POST['pro_can4'])?html($_POST['pro_can4']):'';
$f_body=isset($_POST['f_body'])?html($_POST['f_body']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$z_body1=isset($_POST['z_body1'])?$_POST['z_body1']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$url=isset($_POST['url'])?$_POST['url']:'default.php';
$jingjiren=isset($_POST['jingjiren'])?html($_POST['jingjiren']):'';
$huxing=isset($_POST['huxing'])?html($_POST['huxing']):'1';

$pro_cs1=isset($_POST['pro_cs1'])?html($_POST['pro_cs1']):'';
$pro_cs2=isset($_POST['pro_cs2'])?html($_POST['pro_cs2']):'';
$pro_cs3=isset($_POST['pro_cs3'])?html($_POST['pro_cs3']):'';
$pro_cs4=isset($_POST['pro_cs4'])?html($_POST['pro_cs4']):'';
$pro_cs5=isset($_POST['pro_cs5'])?html($_POST['pro_cs5']):'';
$pro_cs6=isset($_POST['pro_cs6'])?html($_POST['pro_cs6']):'';
$pro_cs7=isset($_POST['pro_cs7'])?html($_POST['pro_cs7']):'';
$pro_cs8=isset($_POST['pro_cs8'])?html($_POST['pro_cs8']):'';
$pro_cs9=isset($_POST['pro_cs9'])?html($_POST['pro_cs9']):'';
$pro_cs10=isset($_POST['pro_cs10'])?html($_POST['pro_cs10']):'';
$pro_cs11=isset($_POST['pro_cs11'])?html($_POST['pro_cs11']):'';
$pro_cs12=isset($_POST['pro_cs12'])?html($_POST['pro_cs12']):'';
$pro_cs13=isset($_POST['pro_cs13'])?html($_POST['pro_cs13']):'';
$pro_cs14=isset($_POST['pro_cs14'])?html($_POST['pro_cs14']):'';
$pro_cs15=isset($_POST['pro_cs15'])?($_POST['pro_cs15']):'';
$pro_cs16=isset($_POST['pro_cs16'])?($_POST['pro_cs16']):'';
$pro_cs17=isset($_POST['pro_cs17'])?($_POST['pro_cs17']):'';
$pro_cs18=isset($_POST['pro_cs18'])?html($_POST['pro_cs18']):'0';
$pro_cs19=isset($_POST['pro_cs19'])?html($_POST['pro_cs19']):'';
$pro_cs20=isset($_POST['pro_cs20'])?html($_POST['pro_cs20']):'';
$pro_cs21=isset($_POST['pro_cs21'])?html($_POST['pro_cs21']):'';
$pro_cs22=isset($_POST['pro_cs22'])?html($_POST['pro_cs22']):'';
$pro_cs23=isset($_POST['pro_cs23'])?html($_POST['pro_cs23']):'';
$pro_cs24=isset($_POST['pro_cs24'])?html($_POST['pro_cs24']):'';
$pro_cs25=isset($_POST['pro_cs25'])?html($_POST['pro_cs25']):'';
$pro_cs26=isset($_POST['pro_cs26'])?html($_POST['pro_cs26']):'';
$pro_cs27=isset($_POST['pro_cs27'])?html($_POST['pro_cs27']):'';
$pro_cs28=isset($_POST['pro_cs28'])?html($_POST['pro_cs28']):'';
$pro_cs29=isset($_POST['pro_cs29'])?html($_POST['pro_cs29']):'';
$pro_cs30=isset($_POST['pro_cs30'])?html($_POST['pro_cs30']):'';
$pro_cs31=isset($_POST['pro_cs31'])?html($_POST['pro_cs31']):'';
$pro_cs32=isset($_POST['pro_cs32'])?html($_POST['pro_cs32']):'';
$pro_cs33=isset($_POST['pro_cs33'])?html($_POST['pro_cs33']):'';
$pro_cs34=isset($_POST['pro_cs34'])?html($_POST['pro_cs34']):'';
$pro_cs35=isset($_POST['pro_cs35'])?html($_POST['pro_cs35']):'';
$pro_cs36=isset($_POST['pro_cs36'])?html($_POST['pro_cs36']):'';
$pro_cs37=isset($_POST['pro_cs37'])?html($_POST['pro_cs37']):'';
$pro_cs38=isset($_POST['pro_cs38'])?html($_POST['pro_cs38']):'';
$pro_cs39=isset($_POST['pro_cs39'])?html($_POST['pro_cs39']):'';
$pro_cs40=isset($_POST['pro_cs40'])?html($_POST['pro_cs40']):'';
$pro_cs41=isset($_POST['pro_cs41'])?html($_POST['pro_cs41']):'';
$pro_cs42=isset($_POST['pro_cs42'])?html($_POST['pro_cs42']):'0';
$pro_cs43=isset($_POST['pro_cs43'])?html($_POST['pro_cs43']):'0';
$pro_cs44=isset($_POST['pro_cs44'])?html($_POST['pro_cs44']):'0';

$pro_cs45=isset($_POST['pro_cs45'])?strtotime(html($_POST['pro_cs45'])):'0';
$pro_cs46=isset($_POST['pro_cs46'])?strtotime(html($_POST['pro_cs46'])):'0';

$pro_cs47=isset($_POST['pro_cs47'])?html($_POST['pro_cs47']):'0';
$pro_cs48=isset($_POST['pro_cs48'])?html($_POST['pro_cs48']):'0';
$pro_cs49=isset($_POST['pro_cs49'])?html($_POST['pro_cs49']):'0';
$pro_cs50=isset($_POST['pro_cs50'])?html($_POST['pro_cs50']):'0';
if($pro_cs41==''){
	$pro_cs41[]='隐藏';
}

$pro_cs6str=implode(",",$pro_cs6);
$pro_cs41str=implode(";",$pro_cs41);

if ($id==''||!checknum($id)||$lm==''||!checknum($lm)||$title==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update `'.$tablepre.'pro_co_dg` set `lm`='.$lm.',`title`="'.$title.'",`pro_can1`="'.$pro_can1.'",`pro_can2`="'.$pro_can2.'",`pro_can3`="'.$pro_can3.'",`pro_can4`="'.$pro_can4.'",`f_body`="'.$f_body.'",`z_body`="'.$z_body.'",`z_body1`="'.$z_body1.'",`img_sl`="'.$img_sl.'",`px`='.$px.',`pro_cs1`="'.$pro_cs1.'",`pro_cs2`="'.$pro_cs2.'",`pro_cs3`="'.$pro_cs3.'",`pro_cs4`="'.$pro_cs4.'",`pro_cs5`="'.$pro_cs5.'",`pro_cs6`="'.$pro_cs6str.'",`pro_cs7`="'.$pro_cs7.'",`pro_cs8`="'.$pro_cs8.'",`pro_cs9`="'.$pro_cs9.'",`pro_cs10`="'.$pro_cs10.'",`pro_cs11`="'.$pro_cs11.'",`pro_cs12`="'.$pro_cs12.'",`pro_cs13`="'.$pro_cs13.'",`pro_cs14`="'.$pro_cs14.'",`pro_cs15`="'.$pro_cs15.'",`pro_cs16`="'.$pro_cs16.'",`pro_cs17`="'.$pro_cs17.'",`pro_cs18`="'.$pro_cs18.'",`pro_cs19`="'.$pro_cs19.'",`pro_cs20`="'.$pro_cs20.'",`pro_cs21`="'.$pro_cs21.'",`pro_cs22`="'.$pro_cs22.'",`pro_cs23`="'.$pro_cs23.'",`pro_cs24`="'.$pro_cs24.'",`pro_cs25`="'.$pro_cs25.'",`pro_cs26`="'.$pro_cs26.'",`pro_cs27`="'.$pro_cs27.'",`pro_cs28`="'.$pro_cs28.'",`pro_cs29`="'.$pro_cs29.'",`pro_cs30`="'.$pro_cs30.'",`pro_cs31`="'.$pro_cs31.'",`pro_cs32`="'.$pro_cs32.'",`pro_cs33`="'.$pro_cs33.'",`pro_cs34`="'.$pro_cs34.'",`pro_cs35`="'.$pro_cs35.'",`pro_cs36`="'.$pro_cs36.'",`pro_cs37`="'.$pro_cs37.'",`pro_cs38`="'.$pro_cs38.'",`pro_cs39`="'.$pro_cs39.'",`pro_cs40`="'.$pro_cs40.'",`pro_cs41`="'.$pro_cs41str.'",`pro_cs42`='.$pro_cs42.',`pro_cs43`='.$pro_cs43.',`pro_cs44`='.$pro_cs44.',`pro_cs45`='.$pro_cs45.',`pro_cs46`='.$pro_cs46.',`pro_cs47`='.$pro_cs47.',`pro_cs48`='.$pro_cs48.',`pro_cs49`='.$pro_cs49.',`pro_cs50`='.$pro_cs50.',`jingjiren`="'.$jingjiren.'",`huxing_lm`="'.$huxing.'" where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="'.$url.'"');
?>