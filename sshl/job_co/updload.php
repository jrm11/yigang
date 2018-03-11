<?php 
require('../../include/common.inc.php');
require('../../include/uploadfile.class.php');
require('updcon.php');
checklogin();
$frameid=(isset($_REQUEST['frameid']))?$_REQUEST['frameid']:'';
$kuang=(isset($_REQUEST['kuang']))?$_REQUEST['kuang']:'';
$s_pic_s=(isset($_REQUEST['s_pic']))?$_REQUEST['s_pic']:'';
$s_typ_s=(isset($_REQUEST['s_typ']))?$_REQUEST['s_typ']:'';
$s_wid=(isset($_REQUEST['s_wid']))?$_REQUEST['s_wid']:'';
$s_hei=(isset($_REQUEST['kuang']))?$_REQUEST['s_hei']:'';

if($s_pic_s=='yes'){
	    $s_pic=true;
	}
	else{
		$s_pic=false;
		}
if($s_typ_s=='yes'){
	    $s_typ=true;
	}
	else{
		$s_typ=false;
		}

//$s_wid=100;
//$s_hei=100;

//文件路径
$sava_path=$path;
//文件名,如果为空，就用上传的文件的名
if ($s_pic){
	$file_name='d'.date('YmdHis').rand(10,99);
}else{
	$file_name=date('YmdHis').rand(10,99);
}

//允许上传的文件类型
$allow_types=$allowext;
//允许上传的大小
$max_size=$maxsize;
//是否可以覆盖
$overfile=false;

if (isset($_FILES['file_up'])){
	$file=$_FILES['file_up'];
	$up=new UploadFile();
	if($row=$up->upLoad($file,$sava_path,$file_name,$allow_types,$max_size,$overfile)){
		$s_name=$row['name'];
		if($s_pic){
			$s_name=substr($row['name'],0,strrpos($row['name'],'/')+1).substr($row['name'],strrpos($row['name'],'/')+2);
			$up->makesmall($row['name'],$s_typ,$s_wid,$s_hei,$s_name);
		}
		if ($frameid!=''&&$kuang!=''){
			echo'<script>parent.document.getElementById("'.$kuang.'").value="'.$s_name.'";</script>';
			echo'<script>location="updloadd.php?frameid='.$frameid.'&kuang='.$kuang.'&img_sl='.$s_name.'"</script>';
		}else{
			echo '<script>alert("文件上传成功！");location="'.previous().'";</script>';
			exit();
		}
	}
	else{
		echo '<script>alert("'.$up->error().'");parent.frames["'.$frameid.'"].history.back();</script>';
		exit();
	}
}

?>