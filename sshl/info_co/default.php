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
<title>信息管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">信息管理首页</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加信息</a></td>
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
                        $sql='select * from `'.$tablepre.'info_lm` where `fid`='.$fid.'  order by `px` desc,`id_lm` desc';
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
<form name="form1" id="form1" action="make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td width="40" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td>标题</td>
    <td>时间</td>
    <td width="50"  align="center">点击量</td>
    <td width="70" align="center">状态</td>
    <td width="200" align="center" style=" font-weight:normal;">修改 | 推荐<!-- | 热点--> | 屏蔽 | 删除</td>
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
	global $db,$st,$tablepre;
	$sql='select `id_lm` from `'.$tablepre.'info_lm` where `fid`='.$lm.'';
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
$sql='select COUNT(*) from `'.$tablepre.'info_co` a, `'.$tablepre.'info_lm` b where a.`lm`=b.`id_lm` '.$sq.'';
$counter=$db->getqueryallrow($sql);
$p=new page();
$p->setpage($counter,25);
$sql=$p->getlimit();
$sql='select a.`id`,a.`lm`,a.`title`,a.`wtime`,a.`color_font`,a.`img_sl`,a.`px`,a.`read_num`,a.`pass`,a.`tuijian`,a.`hot`,b.`title_lm` from `'.$tablepre.'info_co` a left join `'.$tablepre.'info_lm` b on a.`lm`=b.`id_lm` where `pass`<>"" '.$sq.' order by a.`px` desc,a.`id` desc'.$sql;
$result=$db->query($sql);
while ($row=$db->getrow($result)){
$zt='';
$zt=($row['tuijian']=='yes')?'<span class="blue">推 </span>':'';
$zt.=($row['hot']=='yes')?'<span class="red">热 </span>':'';
$zt.=($row['pass']=='no')?'<span class="green">屏</span>':'';
$zt=($zt!='')?$zt:'<span class="black">正常</span>';
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="center"><input name="px[<?php echo $row['id']?>]" type="text" id="px[<?php echo $row['id']?>]" value="<?php echo $row['px']?>" class="num"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td><?php echo '<b>[</b><a href="default.php?lm='.$row['lm'].'">'.$row['title_lm'].'</a><b>] </b><a href="edit.php?id='.$row['id'].'" '.(($row['color_font']!='')?'style="color:'.$row["color_font"].'"':'').'>'.$row['title'].'</a> '.(($row['img_sl']!='')?'<a href="../../'.$row['img_sl'].'"  target=_blank><img src="../images/img.gif" border="0" onmouseover="popImage(this,\'../../'.$row['img_sl'].'\');" onmouseout="hideLayer();"/></a>':'')?></td>
        <td align="center"><?php echo date("Y-m-d",$row['wtime'])?></td>
        <td align="center"><?php echo $row['read_num']?></td>
        <td align="center"><?php echo $zt?></td>
        <td align="center">
        <a href="edit.php?id=<?php echo $row['id']?>">修改</a> | <?php 
		//推荐
		if ($row['tuijian']=='yes'){
			echo'<a href="make.php?id='.$row['id'].'&ac=tuijian2" class="blue">取消</a> | ';
		}else{
			echo'<a href="make.php?id='.$row['id'].'&ac=tuijian1">推荐</a> | ';
		}
		//热点
		//if ($row['hot']=='yes'){
//			echo'<a href="make.php?id='.$row['id'].'&ac=hot2"class="red">取消</a> | ';
//		}else{
//			echo'<a href="make.php?id='.$row['id'].'&ac=hot1" >热点</a> | ';
//		}
		//屏蔽
		if ($row['pass']=='yes'){
			echo'<a href="make.php?id='.$row['id'].'&ac=ping2">屏蔽</a> | ';
		}else{
			echo'<a href="make.php?id='.$row['id'].'&ac=ping1" class="green">取消</a> | ';
		}
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
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="submit"  class="btn" value="排序" />&nbsp;<input name="" type="button"  class="btn" value="批量推荐" onclick="act('form1','tuijian1');"/>&nbsp;<input name="" type="button"  class="btn" value="取消推荐" onclick="act('form1','tuijian2');"/>&nbsp;<input name="" type="button"  class="btn" value="批量热点" onclick="act('form1','hot1');"/>&nbsp;<input name="" type="button"  class="btn" value="取消热点" onclick="act('form1','hot2');"/>&nbsp;<input name="" type="button"  class="btn" value="批量屏蔽" onclick="act('form1','ping2');"/>&nbsp;<input name="" type="button"  class="btn" value="取消屏蔽" onclick="act('form1','ping1');"/>&nbsp;<input name="" type="button"  class="btn" value="批量删除" onclick="act('form1','del');"/>
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
