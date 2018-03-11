<?php require "conn.php"; ?>
<?php
$nav_id = 1;
?>

<!--主页-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="http://www.shenfang8.com/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>【深房吧】亿港地产旗下深圳东莞惠州专业的小产权门户网站</title>
    <!-- 关键词 -->
    <meta name="keywords" content="小产权房,深圳小产权房,东莞小产权房,龙岗小产权房">
    <!-- 描述 -->
    <meta name="description"
          content="专业承接深圳、东莞、惠州各类小产权一手楼盘,有团队,有销售渠道及大量客户群.有多年的集资房策划销售经验,有多个成功火爆销售的小产权案例！‘深房吧’、‘亿港地产’、‘购房100房产咨询网’ 是深圳小产权房综合性网站,我们包含了深圳龙岗区,深圳龙华区,深圳宝安区,深圳龙华区、深圳光明新区、东莞长安虎门大岭山、深圳二手房等最新最热最火房源信息,为您找到最适合的房源,相信您在深圳小产权房网可以找到深圳小产权、深圳小产权房、小产权、深圳、租房、买房相关资料与信息。">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.bootcss.com/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
    <![endif]-->
    <link href="css/css.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="js/swiper/idangerous.swiper.css"/>
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
</head>
<body>
<!--    引入头部文件-->
<?php require "top.php"; ?>

<!--banner 开始-->
<div class="swiper-container sw1">
    <a class="arrow-left" href="#"></a>
    <a class="arrow-right" href="#"></a>
    <div class="swiper-wrapper">
        <?php
        $sql = 'select * from `' . $tablepre . 'info_co` where lm=16 order by px desc,id desc';
        $result = $db->query($sql);
        $list = $db->getrows($result);
        foreach ($list as $key => $row) {
            ?>
            <div class="swiper-slide"><img src="<?php echo $row['img_sl']; ?>"/></div>
            <?php
        }
        $db->freeresult($result);
        ?>
    </div>
    <div class="pagination page_sw1"></div>
</div>
<script src="js/swiper/idangerous.swiper.js"></script>
<script>
    var mySwiper = new Swiper('.sw1', {
        pagination: '.page_sw1',
        paginationClickable: true,
        loop: true,
        autoplay: 4000,//自动切换时间
        autoplayDisableOnInteraction: false,//用户操作后不停止
        slidesPerView: 1,//容器可视个数
        slidesPerGroup: 1,//多少个为一组
        //		useCSS3Transforms:false,
    })
    window.onload = function () {
        //	var wr=window.getComputedStyle(document.getElementsByTagName('body')[0], null).getPropertyValue("width");
        //	document.getElementsByClassName('swiper-wrapper')[0].style.transform='translate3d(-'+wr+', 0px, 0px)';
    }
    $('.arrow-left').on('click', function (e) {
        e.preventDefault()
        mySwiper.swipePrev()
    })
    $('.arrow-right').on('click', function (e) {
        e.preventDefault()
        mySwiper.swipeNext()
    })
</script>
<!--banner结束-->


<!--开始找房-->
<div class="findhouse w1170">
    <form class="form" action="search.php" method="get">
        <ul>
            <li class="on">
                <input type="radio" name="search" id="ershou" value="ershou" style="display:none" checked/>
                <label for="ershou">二手房</label>
            </li>
            <li>
                <input type="radio" name="search" id="xinfang" value="xinfang" style="display:none"/>
                <label for="xinfang">找新房</label>
            </li>
            <li>
                <input type="radio" name="search" id="zufang" value="zufang" style="display:none"/>
                <label for="zufang">找租房</label>
            </li>
        </ul>
        <input type="text" value="" name="keyword"/>
        <input type="submit" class="submit" value=""/>
    </form>
</div>
<ul class="ind_box1 w1170">
    <li>
        <a href="secHouse.php" title="找二手房">
            <img src="images/index_box1_01.jpg" alt=""/>
            <div class="ind_box1_t">找二手房</div>
            <div>真实房源，假一赔百</div>
        </a>
    </li>
    <li>
        <a href="newHouse.php" title="找新房">
            <img src="images/index_box1_02.jpg" alt=""/>
            <div class="ind_box1_t">找新房</div>
            <div>优质生活，从新出发</div>
        </a>
    </li>
    <li>
        <a href="rent.php" title="找租房">
            <img src="images/index_box1_03.jpg" alt=""/>
            <div class="ind_box1_t">找租房</div>
            <div>舒适省心，租又何妨</div>
        </a>
    </li>
    <li>
        <a href="weituo.php" title="业主委托">
            <img src="images/index_box1_04.jpg" alt=""/>
            <div class="ind_box1_t">业主委托</div>
            <div>足不出户，在线委托</div>
        </a>
    </li>
    <li>
        <a href="yuyue.php" title="预约看房">
            <img src="images/index_box1_04.jpg" alt=""/>
            <div class="ind_box1_t">预约看房</div>
            <div>在线委托，预约看房</div>
        </a>
    </li>
</ul>

<!--精选二手房推荐-->
<div class="ind_box2 w1170">
    <div class="ind_t">
        <div class="t">精选二手房推荐</div>
        <div>行业引领者和颠覆者，承诺真实房源，提供安心服务，保障消费者权益</div>
    </div>
    <ul>
        <?php
        $sql = 'select * from pro_co where lm=46 and tuijian=1 order by px desc,id desc limit 4';
        $result = $db->query($sql);
        while ($rs = $db->getrow($result)) {
            ?>
            <li>
                <a class="ind_box2_img" href="secHouse_show.php?id=<?php echo $rs['id']; ?>" title=""><img
                            src="<?php echo $rs['img_sl']; ?>" alt="<?php echo $rs['title']; ?>"/></a>
                <a class="ind_box2_t"
                   href="secHouse_show.php?id=<?php echo $rs['id']; ?>"><?php echo getstr($rs['title'], 20); ?></a>
                <div><?php echo $rs['pro_cs14']; ?> 建面<?php echo $rs['pro_cs18']; ?>㎡</div>
                <div class="ind_box2_price"><?php echo $rs['pro_cs43']; ?>万</div>
            </li>
            <?php
        }
        $db->freeresult($result);
        ?>

    </ul>
    <a class="ind_more" href="secHouse.php">更多二手房 <img src="images/index_more.png"/></a>
</div>
<!--优质新房推荐-->
<div class="ind_box3">
    <div class="ind_box2 w1170">
        <div class="ind_t">
            <div class="t">优质新房推荐</div>
            <div>专业服务，开心看房，安全的成交</div>
        </div>
        <ul>
            <?php
            $sql = 'select * from pro_co where lm=47 and tuijian=1 and huxing_lm=1 order by px desc,id desc limit 4';
            $result = $db->query($sql);
            while ($rs = $db->getrow($result)) {
                $aquyu = '';
                switch ($rs['pro_cs1']) {
                    case "a1":
                        $aquyu = '南山';
                        break;
                    case "a2":
                        $aquyu = '福田';
                        break;
                    case "a3":
                        $aquyu = '罗湖';
                        break;
                    case "a4":
                        $aquyu = '宝安';
                        break;
                    case "a5":
                        $aquyu = '龙岗';
                        break;
                    case "a6":
                        $aquyu = '龙华新区';
                        break;
                    case "a7":
                        $aquyu = '光明新区';
                        break;
                    case "a8":
                        $aquyu = '盐田';
                        break;
                    case "a9":
                        $aquyu = '坪山新区';
                        break;
                    case "a0":
                        $aquyu = '大鹏新区';
                        break;
                }
                ?>
                <li>
                    <a class="ind_box2_img" href="newHouse_show.php?id=<?php echo $rs['id']; ?>" title=""><img
                                src="<?php echo $rs['img_sl']; ?>" alt="<?php echo $rs['title']; ?>"/></a>
                    <a class="ind_box2_t"
                       href="newHouse_show.php?id=<?php echo $rs['id']; ?>"><?php echo $rs['title']; ?></a>
                    <div>区域：<?php echo $aquyu; ?> </div>
                    <div>均价：<?php echo $rs['pro_cs18']; ?>元/㎡</div>
                </li>
                <?php
            }
            $db->freeresult($result);
            ?>
        </ul>
        <a class="ind_more" href="newHouse.php">更多新房 <img src="images/index_more.png"/></a>
    </div>
</div>
<!--精选租房推荐-->
<div class="ind_box2 w1170">
    <div class="ind_t">
        <div class="t">精选租房推荐</div>
        <div>专业服务，开心看房，安全的成交</div>
    </div>
    <ul>
        <?php
        $sql = 'select * from pro_co where lm=48 and tuijian=1 order by px desc,id desc limit 4';
        $result = $db->query($sql);
        while ($rs = $db->getrow($result)) {
            ?>
            <li>
                <a class="ind_box2_img" href="rent_show.php?id=<?php echo $rs['id']; ?>" title=""><img
                            src="<?php echo $rs['img_sl']; ?>" alt="<?php echo $rs['title']; ?>"/></a>
                <a class="ind_box2_t" href="rent_show.php?id=<?php echo $rs['id']; ?>"><?php echo $rs['title']; ?></a>
                <div class="ind_box4_price"><?php echo $rs['pro_cs13']; ?> 建面<?php echo $rs['pro_cs18']; ?>㎡
                    <span><?php echo $rs['pro_cs42']; ?>元/月</span></div>
            </li>
            <?php
        }
        $db->freeresult($result);
        ?>
    </ul>
    <a class="ind_more" href="rent.php">更多出租房 <img src="images/index_more.png"/></a>
</div>
<!--精选资讯推荐-->
<div class="ind_box2 w1170">
    <div class="ind_t">
        <div class="t">精选资讯推荐</div>
        <div>购房知识·政策·流程</div>
    </div>
    <ul>
        <?php
        $sql = 'select * from info_co where lm=18 and tuijian="yes" order by px desc,id desc limit 4';
        $result = $db->query($sql);
        while ($rs = $db->getrow($result)) {
            ?>
            <li>
                <a class="ind_box2_img" href="news_show.php?id=<?php echo $rs['id']; ?>" title=""><img
                            src="<?php echo $rs['img_sl']; ?>" alt="<?php echo $rs['title']; ?>"/></a>
                <a class="ind_box2_t" href="news_show.php?id=<?php echo $rs['id']; ?>"><?php echo $rs['title']; ?></a>
                <div><?php echo date('Y/m/d', $rs['wtime']); ?></div>
            </li>
            <?php
        }
        $db->freeresult($result);
        ?>
    </ul>
    <a class="ind_more" href="news.php">更多资讯<img src="images/index_more.png"/></a>
</div>
<script type="text/javascript" src="js/index.js"></script>
<?php require "bottom.php"; ?>
<div style='width:1px;height:1px;top:114px;left:14px; z-index:38'>
    <div style='overflow:hidden;width:100%;height:100%'>
        <div style="margin:0;padding:0;height:100%;border:0px #dddddd solid;background:#fff;">
            <div style="padding:0px">
                <p>网站简介：<br/>
                    亿港地产专业承接深圳、东莞、惠州各类小产权一手楼盘,有团队,有销售渠道及大量客户群.有多年的集资房策划销售经验,有多个成功火爆销售的小产权案例！本站展示深圳、东莞周边区域小产权信息楼盘图片及行业相关最新资讯等。
                </p>
                <p>网站关键词：<br/> <span
                            style="color:red;"><strong>小产权房</strong>|<strong>深圳小产权房</strong>|<strong>东莞小产权房</strong>|<strong>南山小产权房</strong>|<strong>龙岗小产权房</strong>|<strong>罗湖小产权房</strong>|<strong>蛇口小产权房</strong>|</span>
                </p>
                <p>相关网站推荐：<br/><span><a href="http://www.baidu.com/">百度</a></span></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>