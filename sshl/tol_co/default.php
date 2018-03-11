<?php
require('../../include/common.inc.php');
checklogin();
isset($_GET['lm'])?$lm=$_GET['lm']:$lm='';
isset($_GET['keyword'])?$keyword=stripslashes($_GET['keyword']):$keyword='';
if ($lm!=''&&!checknum($lm)){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资料管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">资料管理首页</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加资料</a></td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>分类检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
                <select name="lm" id="lm">
                	<option value="" selected>所有栏目</option>
					<?php
                    addlm(0,'');
                    function addlm($fid,$i){
						global $db,$tablepre;
                        if ($i==''){
                            $i='• ';
                        }elseif ($i=='• '){
                            $i=' 　|—';
                        }else{
                            $i=' 　|'.$i;
                        }
                        $sql='select * from `'.$tablepre.'tol_lm` where `fid`='.$fid.'  order by `px` desc,`id_lm` desc';
                        $rek=$db->query($sql);
                        while($rsk=$db->getrow($rek)){
                            echo'<option value="'.$rsk["id_lm"].'">'.$i.$rsk["title_lm"].'</option>'."\n";
                            addlm($rsk['id_lm'],$i);
                        }
                        $db->freeresult($rek);
                    }
                    ?>
                </select>&nbsp;
				 <script language="javascript">
					gt("lm").value="<?php echo $lm?>";
                 </script>
            </td>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>
<br />
<form name="form1" action="make.php" method="post" >
<input name="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="48" align="center">选中</td>
    <td width="40" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td>标题</td>
    <td width="200" align="center">管理操作</td>
  </tr>
<?php
$sq='';
$st='';
//如果有分类栏目
if($lm!=''){
	xialm($lm);
	$sq=' and a.`lm` in('.$lm.$st.')';
}
//读取所有下级
function xialm($lm){
	global $db,$tablepre,$st;
	$sql='select `id_lm` from `'.$tablepre.'tol_lm` where `fid`='.$lm.'';
	$rek=$db->query($sql);
	while($rsk=$db->getrow($rek)){
		$st.=','.$rsk['id_lm'];
		xialm($rsk['id_lm']);
	}
	$db->freeresult($rek);
}
//如果有关键字
if ($keyword!=''){
	$sq.=' and a.title like "%'.$keyword.'%"';
}
//开始读信息
$sqlcount='select COUNT(*) from `'.$tablepre.'tol_co` a, `'.$tablepre.'tol_lm` b where a.`lm`=b.`id_lm` '.$sq.'';
$counter=$db->getqueryallrow($sqlcount);
$sql='select a.`id`,a.`lm`,a.`title`,a.`px`,b.`title_lm` from `'.$tablepre.'tol_co` a, `'.$tablepre.'tol_lm` b where a.`lm`=b.`id_lm` '.$sq.' order by a.`px` desc,a.`id` desc';
$p=new page();
$p->setpage($counter,25);
$sql.=$p->getlimit();
$result=$db->query($sql);
while ($row=$db->getrow($result)){
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="center"><input name="px[<?php echo $row['id']?>]" type="text" id="px[<?php echo $row['id']?>]" value="<?php echo $row['px']?>" class="num"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td><?php echo '<b>[</b>'.$row['title_lm'].'<b>] </b><a href="edit.php?id='.$row['id'].'">'.$row['title'].'</a>'?></td>
        <td align="center">
        <a href="edit.php?id=<?php echo $row['id']?>">修改</a> | <?php 
		?><a href="make.php?id=<?php echo $row['id']?>&ac=del"  onClick="return confirm('确定要删除该数据吗?')">删除</a>
        </td>
    </tr>
<?php
}
$db->freeresult($result);
$db->close();
?>
</table>
<p class="p">
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="submit"  class="btn" value="排序" />&nbsp;<input name="" type="button"  class="btn" value="删除选中" onclick="act('form1','del');"/>
</p>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td align="center">
    	<?php
        if ($counter){
		$p->getpagemenu('&lm='.$lm.'&keyword='.urlencode($keyword).'');
		}
		?></td>
  </tr>
</table>
</form>
</body>
</html>
