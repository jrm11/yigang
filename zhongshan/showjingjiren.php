				<!--其他经纪人-->
				<div class="house_show_t">其他经纪人</div>
				<div class="other_jjr">
					 <?php
						$sql='select * from `'.$tablepre.'info_co` where `pass`="yes" and `lm`=17 and `id`!='.$jingjiren.' order by px desc,id asc limit 4';
						$result=$db->query($sql);
						$list=$db->getrows($result);
						foreach ( $list as $key => $rsl ) {
					?>
					<div class="jingjiren">
						<img class="img1" src="<?php echo $rsl['img_sl']; ?>"/>
						<div class="jingjiren_con">
							<div class="name"><?php echo $rsl['title']; ?></div> 好评：<?php echo $rsl['info_from']; ?>
							<div>我了解本房信息，更多请与我联系</div>
							<div class="phone"><a href="tel:<?php echo $rsl['f_body']; ?>"><?php echo $rsl['f_body']; ?></a></div>
						</div>
						<img class="img2" src="<?php echo $rsl['dow_sl']; ?>"/>
					</div>
					<?php
						}
						$db->freeresult($result);
					?>
				</div>
				