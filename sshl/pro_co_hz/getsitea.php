<?php
require('../../include/common.inc.php');

$q = isset($_GET["q"])?($_GET["q"]):'';

	if($q) {
		$hc='1';
		switch ($q){
			case "a1":$hc='162';break;
			case "a2":$hc='163';break;
			case "a3":$hc='164'; break;
		}
		$sql_ser='select * from `'.$tablepre.'pro_can_hz` where `fid`='.$hc.' order by id_lm asc  ';
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
	}
?>

