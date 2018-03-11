<?php 
require('../../include/common.inc.php');
require('../../include/uploadfile.class.php');
require('img_con.php');
checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$pro_id=isset($_POST['pro_id'])?html($_POST['pro_id']):'';



if ($id==''||!checknum($id)){
	msg('参数错误');
}
if ($pro_id!=''&&!checknum($pro_id)){
	msg('参数错误');
}

//文件路径
$sava_path=$path;
//文件名,如果为空，就用上传的文件的名

$file_name='d'.date('YmdHis').rand(10,99);


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
		$big_img=$row['name'];
		if($z_typ){//读取设置生成中图
			$mid_img=substr($row['name'],0,strrpos($row['name'],'/')+1).'z'.substr($row['name'],strrpos($row['name'],'/')+2);
			$up->makesmall($row['name'],false,$z_wid,$z_hei,$mid_img);
		}else{
			$mid_img="";
		}
		if($s_typ){//读取设置生成小图
			$sma_img=substr($row['name'],0,strrpos($row['name'],'/')+1).substr($row['name'],strrpos($row['name'],'/')+2);
			$up->makesmall($row['name'],false,$s_wid,$s_hei,$sma_img);
		}else{
			$sma_img="";
		}
		$sql='select * from `'.$tablepre.'pro_img` where `id`='.$id.'';
		$result=$db->query($sql);
		$row=$db->getrow($result);
		$db->freeresult($result);
		if($row){
			if ($row['sma_img']!=''){
				delfile($row['sma_img']);
			}
			if ($row['mid_img']!=''){
				delfile($row['mid_img']);
			}
			if ($row['big_img']!=''){
				delfile($row['big_img']);
			}
		}
		$db->execute('update pro_img set sma_img="1",mid_img="'.$mid_img.'",big_img="'.$big_img.'" where id='.$id.'');
		msg('','location="img_default.php?pro_id='.$pro_id.'"');
	}
	else{
		echo '<script>alert("'.$up->error().'");history.back();</script>';
		exit();
	}
}

?>