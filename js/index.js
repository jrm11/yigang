//开始找房切换
$(function () {
    $('.findhouse li').each(function () {
        $(this).click(function () {
            $(this).addClass('on').siblings('li').removeClass('on');
        })
    })
    //委托
    var weituo_form_nav = $('.weituo_form_nav div');
    if (weituo_form_nav != '' && weituo_form_nav != null) {
        weituo_form_nav.each(function (i) {
            $(this).click(function () {
                $(this).addClass('on').siblings('div').removeClass();
                $('.weituo_form_con').eq(i).show().siblings('.weituo_form_con').hide();
            })
        })
    }

    //条件查找
    var addr = $('.address span');
    if (addr != '' && addr != null && addr != undefined) {
        addr.each(function (i) {
            $(this).click(function () {
                $(this).addClass('on').siblings().removeClass('on');
                $('.address_quyu').eq(i).show().siblings('.address_quyu').hide();
            })
        })
        var addr2 = $('.address_con span');
        addr2.each(function (i) {
            $(this).click(function () {
                $(this).addClass('on').siblings().removeClass('on');
            })
        })
        //更多按钮
        $('.tiaojian_more').click(function () {
            var f = this.classList.contains('on');
            if (!f) {
                $(this).html('收起选项');
                $('.tiaojian li').show();
            } else {
                $(this).html('更多条件');
                $('.tiaojian li').slice(4).hide();
            }
            $(this).toggleClass('on');
        })
    }
    if ($('.tiaojian_phone_trigger')[0] != '' && $('.tiaojian_phone_trigger')[0] != undefined && $('.tiaojian_phone_trigger')[0] != null) {
        //手机版 查询
        $('.tiaojian_phone_trigger li').each(function (i) {
            $(this).click(function () {
                $('.tiaojian_phone').addClass('tiaojian_phone_fixed').show();
                $('.tiaojian_phone_tit li').eq(i).addClass('on').siblings('li').removeClass('on');
                $('.tiaojian_phone_con li').eq(i).show().siblings('li').hide();
            })
        })
        $('.tiaojian_phone_tit li').each(function (j) {
            $(this).click(function () {
                //选中在点击就关闭
                if (this.classList.contains('on')) {
                    $('.tiaojian_phone').removeClass('tiaojian_phone_fixed').hide();
                    $('html,body').css({width: 'auto', height: 'auto', overflow: 'auto'});
                }
                //点击添加class，移除兄弟元素class
                $(this).addClass('on').siblings('li').removeClass('on');
                //点击显示对应的内容
                $('.tiaojian_phone_con li').eq(j).show().siblings('li').hide();
            })
        })
        $('.tiaojian_phone_con li:first-child .l div').each(function (j) {
            $(this).click(function () {
                $(this).addClass('on').siblings('div').removeClass('on');
                $('.tiaojian_phone_con li:first-child .r .r_con').eq(j).show().siblings('.r_con').hide();
            })
        })
        $('.tiaojian_phone_con li:first-child .r .r_con span').each(function (j) {
            $(this).click(function () {
                $(this).addClass('on').siblings('span').removeClass('on');
            })
        })
        $('.tiaojian_phone_con dd').each(function (j) {
            $(this).click(function () {
                $(this).addClass('on').siblings('dd').removeClass('on');
            })
        })
        $('.reset_submit div').click(function () {
            $('.tiaojian_phone_con li:last-child dd').removeClass('on');
        })
        window.onload = function () {
            var top1 = document.querySelector('.tiaojian_phone_trigger').offsetTop;
            $(window).scroll(function () {
                var top2 = $(window).scrollTop();
                if (top2 > top1) {
                    $('.tiaojian_phone_trigger').css({position: 'fixed', top: '0px', 'z-index': '2', 'width': '100%'})
                }
                if (top2 < top1) {
                    $('.tiaojian_phone_trigger').css({position: 'static', top: '0px', 'z-index': '2', 'width': '100%'})
                }
            })
        }
    }
})

