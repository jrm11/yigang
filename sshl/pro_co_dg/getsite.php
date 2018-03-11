<?php
require('../../include/common.inc.php');

$id=isset($_GET['id'])?$_GET['id']:'';
$q = isset($_GET["q"])?($_GET["q"]):'';

if($id){
	$sql='select * from `'.$tablepre.'pro_co_dg` where `id`='.$id.'';
	$result=$db->query($sql);
	$row=$db->getrow($result);
	$pro_can1=$row['pro_can1'];
	$db->freeresult($result);
}
	if($q) {
		$hc='1';
		switch ($q){
			case "a1":$hc='122';break;
			case "a2":$hc='123';break;
			case "a3":$hc='125';break;
			case "a5":$hc='126';break;
			case "a6":$hc='127';break;
			case "a7":$hc='128';break;
			case "a8":$hc='162';break;
			case "a9":$hc='163';break;
		}
		$sql_ser='select * from `'.$tablepre.'pro_can_dg` where `fid`='.$hc.' order by id_lm asc  ';
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
	}
?>

