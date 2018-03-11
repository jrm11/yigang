<?php require "conn.php";?>
<?php
	$search=(isset($_GET['search']))?$_GET['search']:'';
	$keyword=(isset($_GET['keyword']))?$_GET['keyword']:'';
	if($search=='ershou'){
		$url='secHouse.php';
	}
	if($search=='xinfang'){
		$url='newHouse.php';
	}
	if($search=='zufang'){
		$url='rent.php';
	}
	msg('','location="'.$url.'?keyword='.$keyword.'"');
	
?>