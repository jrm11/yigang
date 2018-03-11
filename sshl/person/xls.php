<?php
require('../../include/common.inc.php');
?>
<script type="text/javascript" src="../../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../../js/city.js"></script>
<?



$file_name='../../upimg/'.date('YmdHis').rand(10,99).'.xls';
$html = "<table width=100% border=0>
<tr>
	<td>会员编号</td>
	<td>姓名</td>
	<td>性质</td>
	<td>人员状态</td>
	<td>性别</td>
	<td>学历</td>
	<td>专业</td>
	<td>工作年限</td>
	<td>意向地</td>
	<td>工作时间</td>
	<td>第１意向职位</td>
	<td>第２意向职位</td>
	<td>第3意向职位</td>
	<td>意向企业性质</td>
	<td>电脑技能</td>
	<td>语言</td>
</tr>";

$sqls='select * from `'.$tablepre.'person` where pass="yes" order by id asc';
$rss=$db->query($sqls);
while($s=$db->getrow($rss)){
	
if($s['dyys']=="其他"){
	$dyys=$s['dyys'].$s['dyqt'];
}else{
	$dyys=$s['dyys'];
}
	
if($s['deys']=="其他"){
	$deys=$s['deys'].$s['deqt'];
}else{
	$deys=$s['deys'];
}
	
if($s['dsys']=="其他"){
	$dsys=$s['dsys'].$s['dsqt'];
}else{
	$dsys=$s['dsys'];
}

if($s['post']<>''){
	$sql='select c.title,l.title_lm from hsx_co c left join hsx_lm l on c.lm=l.id_lm where c.id in ('.$s['post'].') order by l.id_lm asc';
	$result=$db->query($sql);
	$a=1;
	while ($rowpic=$db->getrow($result)){
		if ($a==1)
		{
			$files="".$rowpic["title_lm"].":".$rowpic["title"];
			$a++;
		}else{
			$files.="、".$rowpic["title_lm"].":".$rowpic["title"];
		}
	}
}



$html.= "<tr>
<td align=left style=vnd.ms-excel.numberformat:@>".$s['sfzh']."</td>
<td align=left>".$s['fname']."</td>
<td align=left>".$s['shxz']."</td>
<td align=left>".$s['city']."</td>
<td align=left>".$s['sex']."</td>
<td align=left>".$s['province']."</td>
<td align=left>".$s['zuy']."</td>
<td align=left>".$s['phone']."</td>
<td align=left>".$s['csly']."</td>
<td align=left>".$s['gzsj']."</td>
<td align=left>".$dyys."</td>
<td align=left>".$deys."</td>
<td align=left>".$dsys."</td>
<td align=left>".$s['qyxz']."</td>
<td align=left>".$s['fax']."</td>
<td align=left>".$files."</td>
</tr>";
}


$html.= "</table>";


$handle = fopen($file_name,'w');
if(!fwrite($handle,$html))msg('生成信息失败');
fclose($handle);

$url=$db->getQueryAllRow('select url from `'.$tablepre.'person_dao`');
unlink($url);
$db->execute('delete from `'.$tablepre.'person_dao`');


$result=$db->execute('insert into `'.$tablepre.'person_dao` (`url`) values("'.$file_name.'")');


force_download($file_name);

msg('','location="default.php";');

?>