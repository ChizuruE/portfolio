$(document).ready(function() {
	$('#slider').rhinoslider({
		controlsPlayPause: false,
		effect: 'explode',
		showTime: 5000,
		autoPlay: true
	});
//マウスオーバー
	 $('cap img').hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
		  }, function(){
			 if (!$(this).hasClass('currentPage')) {
			 $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
		}
   });
//マウスオーバー

//メニューのスクロール部分
	var nav = $('.nav');
    //表示位置
    var navTop = nav.offset().top+600;
    //ナビゲーションの高さ（シャドウの分だけ足してます）
    var navHeight = nav.height();//+10;
    var showFlag = false;
    nav.css('top', -navHeight+'px');
    //ナビゲーションの位置まできたら表示
    $(window).scroll(function () {
    var winTop = $(this).scrollTop();
    if (winTop >= navTop) {
        if (showFlag == false) {
            showFlag = true;
            nav
                .addClass('fixed')
                .stop().animate({'top' : '0px'}, 200);
        }
    } else if (winTop <= navTop) {
        if (showFlag) {
            showFlag = false;
            nav.stop().animate({'top' : -navHeight+'px'}, 200, function(){
                nav.removeClass('fixed');
            });
        }
    }
    });
});
