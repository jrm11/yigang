<?php
require('../../include/common.inc.php');

$id=isset($_GET['id'])?$_GET['id']:'';
$q = isset($_GET["q"])?($_GET["q"]):'';
$w = isset($_GET["w"])?($_GET["w"]):'';

if($id){
	$sql='select * from `'.$tablepre.'pro_co` where `id`='.$id.'';
	$result=$db->query($sql);
	$row=$db->getrow($result);
	$pro_can1=$row['pro_can1'];
	$pro_can2=$row['pro_can2'];
	$db->freeresult($result);
}

	if($q) {
		$hc='1';
		switch ($q){
			case "a1":$hc='51';break;
			case "a2":$hc='61';break;
			case "a3":$hc='62'; break;
			case "a4":$hc='63'; break;
			case "a5":$hc='64';break;
			case "a6":$hc='65';break;
			case "a7":$hc='66';break;
			case "a8":$hc='67';break;
			case "a9":$hc='68';break;
			case "a0":$hc='69';break;
		}
		$sql_ser='select * from `'.$tablepre.'pro_can` where `fid`='.$hc.' order by id_lm asc  ';
		$result_ser=$db->query($sql_ser);
		while ($row_ser=$db->getrow($result_ser)){
		?>
		<div class="asd" style="float:left;">
		<INPUT name="pro_can1" type="radio" id="pro_can1" value="<?php echo $row_ser['id_lm']; ?>" <?php if($row_ser['id_lm']==$pro_can1){echo 'checked'; }?> >
		<?php echo $row_ser['title_lm']; ?>
		</div>
		<?php
			}
			$db->freeresult($result_ser);
		?>
		<div class="clear"></div>			
 <?php
	}elseif($w){
		$ditie='1';
		switch ($w){
			case "b10":$ditie='70';break;
			case "b11":$ditie='71';break;
			case "b12":$ditie='72';break;
			case "b13":$ditie='73'; break;
			case "b14":$ditie='74'; break;
			case "b15":$ditie='75';break;
			case "b16":$ditie='76';break;
			case "b17":$ditie='77';break;
			case "b18":$ditie='78';break;
			case "b19":$ditie='79';break;
		}
		$sql_ser='select * from `'.$tablepre.'pro_can` where `fid`='.$ditie.' order by id_lm asc  ';
		$result_ser=$db->query($sql_ser);
		while ($row_ser=$db->getrow($result_ser)){
		?>
		<div class="asd" style="float:left;">
		<INPUT name="pro_can2" type="radio" id="pro_can1" value="<?php echo $row_ser['id_lm']; ?>" <?php if($row_ser['id_lm']==$pro_can2){echo 'checked'; }?> >
		<?php echo $row_ser['title_lm']; ?>
		</div>
		<?php
			}
			$db->freeresult($result_ser);
		?>
		<div class="clear"></div>			
 <?php
	}
?>

