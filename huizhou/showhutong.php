				<!--周边同价房源-->
				<div class="ind_box2 w1170">
					<div class="ind_t">
						<div class="t">周边同价房源</div>
						<div>专业服务，开心看房，安全的成交</div>
					</div>
					<ul>
						 <?php
							$sqlq='select * from pro_co_hz where id='.$id.' ';
							$resultq=$db->query($sqlq);
							$rs=$db->getrow($resultq);
							
						 	
							$sql='select * from `'.$tablepre.'pro_co_hz` where `pass`="yes" and `lm`='.$rs['lm'].' and `pro_cs1`="'.$rs['pro_cs1'].'" and `pro_cs3`="'.$rs['pro_cs3'].'" and `huxing_lm`!=1 order by px desc,id asc limit 4';
							$result=$db->query($sql);
							$list=$db->getrows($result);
							foreach ( $list as $key => $rsl ) {
						?>
						<li>
							<a class="ind_box2_img" href="huxingHouse_show.php?id=<?php echo $rsl['id']; ?>" title=""><img src="../<?php echo $rsl['img_sl']; ?>"/></a>
							<a class="ind_box2_t" href="huxingHouse_show.php?id=<?php echo $rsl['id']; ?>"><?php echo getstr($rsl['title'],30); ?></a>
							<div class="ind_box4_price"><?php echo $rsl['pro_cs14']; ?> 建面<?php echo $rsl['pro_cs18']; ?>㎡     <span><?php echo $rsl['pro_cs19']; ?></span></div>
						</li>
						<?php
							}
							$db->freeresult($result);
							$db->freeresult($resultq);
						?>
					</ul>
				</div>