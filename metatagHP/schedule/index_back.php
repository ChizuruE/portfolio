<!DOCTYPE html>
<html>
<head>
	<title>めたたぐ/スケジュール</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
     <?php 
        require '../php/html/seo.php';
    ?>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css" />
	<link rel="stylesheet" type="text/css" href="../css/schedule.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../css/slide/rhinoslider-1.05.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="../js/slide/rhinoslider-1.05.min.js"></script>
	<script type="text/javascript" src="../js/slide/mousewheel.js"></script>
	<script type="text/javascript" src="../js/slide/easing.js"></script>
		<script type="text/javascript" src="../js/common.js"></script>
		<script>
		    $(function() {
            var nav = $('.nav');
            //表示位置
            var navTop = nav.offset().top+500;
            //ナビゲーションの高さ（シャドウの分だけ足してます）
            var navHeight = nav.height()+10;
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
		</script>		
</head>

<body>
<header class="nav">
    <nav>
        <div id="blueline"></div>
        <div id="menu">
            <div id="logo"><a href="../"><img src="../img/logo.png"></a></div><!--/#logo-->
            <div id="main_menu">
                <div id ="space_width20"></div>
                <div id="social_menu">
                    <a href="https://www.facebook.com/metatag.kyoto" target="_blank"><img src="../img/facebook.png" class="fb_margin"></a>
<!--                    <div id ="space_width20"></div>-->
                    <a href="https://twitter.com/metatag_kcg" target="_blank"><img src="../img/twitter_icon.png"></a>
                </div>
                <div class="clear"></div>
                
                <div id="menu_bar">
                    <a href= "../#news"><div id="menu1"><img src="../img/menu_news.png" class="eachmenu"></div></a>
                    <a href= "../aboutus/"><div id="menu2"><img src="../img/menu_aboutus.png" alt="aboutus" class="eachmenu"></div></a>
                    <a href= "../works/"><div id="menu3"><img src="../img/menu_works.png" alt="works" class="eachmenu"></div></a>
                    <a href= "./"><div id="menu4"><img src="../img/menu_schedule.png" alt="schedule" class="eachmenu"></div></a>
                    <a href= "../#contact"><div id="menu5"><img src="../img/contact.png" alt="contact"></div></a>	
                </div>
                
            </div><!--/#main_menu-->
        </div><!--/#menu--> 
    </nav><!--/nav--> 
</header><!--/#header -->


<div id="schedule_mainIMG">
	<img src= "../img/schedule/schedule_main.jpg" height="200px" width="900px" alt="schedule_mainIMG"></a>
</div>


<div id="schedule_title">
	<img src="../img/contents_schedule.png" alt="schedule_titleIMG">
</div>

<div id="facebook_link">
	<h3>参加をご希望の場合はこちらの <a href="https://www.facebook.com/metatag.kyoto">めたたぐfacebookページ</a> から</h3>
</div>

<div id="schedule_calender">

 	<div id="schedule"><!--↓にアップロードしたPHPファイルの絶対パスを入れる--
		<iframe 
		src= "../php/gcalendar-wrapper.php?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=375&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=4uld363ldgo0692u5nvk9qegqo%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=Asia%2FTokyo"
		style=" border-width:0 " width="600" height="375" frameborder="0" scrolling="no">
		</iframe> -->
	</div>
	 <div id='calendar'><!--↓にアップロードしたPHPファイルの絶対パスを入れる--> http://localhost/php/gcalendar-wrapper.php? 
		<iframe 	
		 src="../php/gcalendar-wrapper.php?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=400&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=4uld363ldgo0692u5nvk9qegqo%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=Asia%2FTokyo"
		 style=" border-width:0 " width="300" height="400" frameborder="0" scrolling="no">
		</iframe>	
	</div>	
	 
</div><!-- /schedule_calender -->

<div class="clear"></div>

<footer id="blueline" class="font_white">
Copyright © 2014 めたたぐ All Rights Reserved.
</footer>

</body>
</html>