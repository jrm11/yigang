<?php
require('../../include/common.inc.php');

$q = isset($_GET["q"])?($_GET["q"]):'';
$w = isset($_GET["w"])?($_GET["w"]):'';

	if($q) {
		$hc='1';
		switch ($q){
			case "a1":$hc='162';break;
			case "a2":$hc='163';break;
			case "a3":$hc='164'; break;
			case "a4":$hc='165'; break;
		}
		$sql_ser='select * from `'.$tablepre.'pro_can_zs` where `fid`='.$hc.' order by id_lm asc  ';
		$result_ser=$db->query($sql_ser);
		while ($row_ser=$db->getrow($result_ser)){
		?>
		<div class="asd" style="float:left;">
		<INPUT name="pro_can1" type="radio" id="pro_can1" value="<?php echo $row_ser['id_lm']; ?>"  >
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
		$sql_ser='select * from `'.$tablepre.'pro_can_zs` where `fid`='.$ditie.' order by id_lm asc  ';
		$result_ser=$db->query($sql_ser);
		while ($row_ser=$db->getrow($result_ser)){
		?>
		<div class="asd" style="float:left;">
		<INPUT name="pro_can2" type="radio" id="pro_can1" value="<?php echo $row_ser['id_lm']; ?>" >
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

