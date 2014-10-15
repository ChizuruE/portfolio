<!DOCTYPE html>
<html>
<head>
	<title>めたたぐ/TOP</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <?php 
        require 'php/html/seo.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/toppage.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <!--スライド-->
    <link type="text/css" rel="stylesheet" href="css/slide/rhinoslider-1.05.css" />
    <script type="text/javascript" src="js/slide/rhinoslider-1.05.min.js"></script>
    <!-- <script type="text/javascript" src="js/slide/mousewheel.js"></script> -->
    <script type="text/javascript" src="js/slide/easing.js"></script>
    <!--スライド-->
    <script type="text/javascript" src="js/common.js"></script>
    <link href="css/light_box/lightbox.css" type="text/css" rel="stylesheet" media="all" />
    <script src="js/light_box/lightbox.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="img/favicon.ico" /><!--ファビコン-->

    <link type="text/css" rel="stylesheet" href="css/slide/rhinoslider-1.05.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="js/slide/rhinoslider-1.05.min.js"></script>
    <script type="text/javascript" src="js/slide/mousewheel.js"></script>
    <script type="text/javascript" src="js/slide/easing.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <!--<script src="js/jquery-1.7.2.min.js"></script>--><!--lightbox-->
    <!--<script src="js/lightbox.js"></script>--><!--lightbox-->
    <!--<link href="css/lightbox.css" rel="stylesheet" />--><!--lightbox-->

    <script type="text/javascript">
        $(window).load(function() {
            var liTotalWidth = 0;
            var marginR = 0;
            var li_menu = $("ul.dummy_menu li");

            li_menu.each(function() {
                liTotalWidth += $(this).outerWidth();
            });
            marginR = Math.floor( ( $("ul.dummy_menu").width() - liTotalWidth ) / ( li_menu.length - 1 ) );
            li_menu.not(":last-child").css({
                marginRight: marginR + 'px'
            });
        });


 </script>
</head>


<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
    <!--hedaer-->
    <header class="nav">
        <nav>
            <div id="blueline"></div>
            <div id="menu">
                <div id="logo"><a href="./"><img src="img/logo.png"></a></div><!--/#logo-->   
                <div id="main_menu">
                    <div id ="space_width20"></div>
                    <div id="social_menu">
                        <a href="https://www.facebook.com/metatag.kyoto" target="_blank"><img src="img/facebook.png" class="fb_margin"></a>
                        <!--                    <div id ="space_width20"></div>-->
                        <a href="https://twitter.com/metatag_kcg" target="_blank"><img src="img/twitter_icon.png"></a>
                    </div>
                    <div class="clear"></div>

                    <div id="menu_bar">
                        <a href= "./#news"><div id="menu1"><img src="img/menu_news.png" class="eachmenu"></div></a>
                        <a href= "./aboutus/"><div id="menu2"><img src="img/menu_aboutus.png" alt="aboutus" class="eachmenu"></div></a>
                        <a href= "./works/"><div id="menu3"><img src="img/menu_works.png" alt="works" class="eachmenu"></div></a>
                        <a href= "./schedule/"><div id="menu4"><img src="img/menu_schedule.png" alt="schedule" class="eachmenu"></div></a>
                        <a href= "./#contact"><div id="menu5"><img src="img/contact.png" alt="contact"></div></a>	
                    </div>

                </div><!--/#main_menu-->
            </div><!--/#menu--> 
        </nav><!--/nav--> 
    </header>
    <!--/header -->

    <!--#slideshow-->
    <div id="slideshow">
       <div id="page">
          <ul id="slider" class="rhinoslider" >
             <li><img src="img/slider/01.jpg" alt="" /></li>
             <li><img src="img/slider/02.jpg" alt="" /></li>
             <li><img src="img/slider/03.jpg" alt="" /></li>
             <li><img src="img/slider/04.jpg" alt="" /></li>
             <li><img src="img/slider/05.jpg" alt="" /></li>
         </ul>
     </div>
 </div>
 <!--/#slideshow-->


 <!--#news_twi-->
 <a name="news"></a>
 <div class="news_twi">
    <div id="left_box"><!-- 左側のボックス -->   
    <!--
            <div class="news">
                <div id="news_title"><img src="img/sub_title.png"></div>
                
                <div id="news_box">
                    <p>14.04.05 / <a href="https://www.facebook.com/metatag.kyoto" target="_blank">めたたぐの公式Facebookページ</a>ができました。</p>
                    <p>14.04.05 / めたたぐWebサイトオープンしました。</p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </div>
            </div>
            <div id="ad"><img src="img/top_comming%20.png"></div>
    -->

        <!-- 影を隠すよ -->
        <div class="face_book_plgin_shadow_hidden"> </div>
        <!-- この中にFBページを閉じ込めるよ -->
        <section class="face_book_plgin_proposal_2"> <!-- ここでデザインもするよ -->
          <!-- FBページ -->
         <!-- <div class="fb-like-box" data-href="https://www.facebook.com/metatag.kyoto" data-width="575" data-height="350" data-show-faces="true" data-stream="false" data-header="false"></div>
          <img class="face_book_plgin_logo_proposal_2" src="../../permalinks/2013-06-12_facebook_likebox_customize/likebox/test_iphone5-ios7.png">
        -->
        <div class="fb-like-box" data-href="https://www.facebook.com/metatag.kyoto" data-width="575" data-height="350" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>

          <!-- FBページから強制出力されるborderを隠す(トップ) -->
          <div class="face_book_plgin_border_top"> </div>
          <!-- FBページから強制出力されるborderを隠す(ライト) -->
          <div class="face_book_plgin_border_right"> </div>
          <!-- FBページから強制出力されるborderを隠す(ボトム) -->
          <div class="face_book_plgin_border_bottom"> </div>
          <!-- FBページから強制出力されるborderを隠す(レフト) -->
          <div class="face_book_plgin_border_left"> </div>

    </section>
    
    </div>

    <div class="twitter"><!-- 右︎側のボックス -->
        <a class="twitter-timeline" width="315px" height="350px" href="https://twitter.com/metatag_kcg"  data-widget-id="451253944694497280">@metatag_kcg からのツイート</a>

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        </script>
    </div>
    <div class="clear"></div><!-- floatクリア -->
</div>
<!--/#news_twi-->

<hr class="style-one">

<!--#aboutus-->
<div class="aboutus">
    <div class="contents"><a href="aboutus/index.php"><img src="img/contents_aboutus.png" alt="contents_aboutus"></a></div>
    <div id="aboutus_sentense">
        <h2 class="indent">もはや学びは強制されない。</h2>
        <h2 class="indent">しかし、ここが最後の学び場だ。<h3>
            <div id="aboutus_studybox">    
                <h3 class="indent">● 勉強会</h3>
                <h3 class="indent">● スマートフォンアプリ開発</h3>
                <h3 class="indent">● ホームページ制作 etc..</h3>
            </div>
            <!--            <h4 class="indent">めたたぐについての詳細はこちら</h4>-->

        </div>
        <div id="aboutus_face"><img src="img/yukki03.png"></div> 
    </div>
    <!--/#aboutus-->
    
    <hr class="style-one">

    <!--#works-->    
    <div class="works">
        <div class="contents"><a href="works/index.php"><img src="img/contents_works.png" alt="contents_aboutus"></a></div>
        <div id="works_pics">
		<!--<a href="img/works/01_big.png" rel="lightbox">
			<cap><img src="img/works/01_off.png"></cap>
		</a>
		<a href="img/works/02_big.png" rel="lightbox">
			<cap><img src="img/works/02_off.png"></cap>
		</a>
	</div> -->

    <ul class="dummy_menu clearfix">

        <li><cap><a href="img/works/01_big.png" rel="lightbox[roadtrip]"><img src="img/works/01_off.png"></a></cap></li>
        <li><cap><a href="img/works/02_big.png" rel="lightbox[roadtrip]"><img src="img/works/02_off.png"></a></cap></li>

        <li><cap><a href="img/works/03_big.png" rel="lightbox[roadtrip]"><img src="img/works/03_off.png"></a></cap></li>
        <li><img src="img/works/04-thumb.png"></li>
    </ul>    
</div> 
</div>
<!--/#works-->
<br><br>

<hr class="style-one">

<!--#schedule-->
<div class="schedule">
    <div class="contents"><a href="schedule/index.php"><img src="img/contents_schedule.png" alt="contents_aboutus"></div>
    <iframe src="gcalendar-wrapper.php?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=500&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=4uld363ldgo0692u5nvk9qegqo%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=Asia%2FTokyo" style=" border-width:0 " width="100%" height="300" frameborder="0" scrolling="no"></iframe>
    <!--<div class="contents"><a href="schedule/index.html"><img src="img/contents_schedule.png" alt="contents_aboutus"></a></div> -->
</div>
<!--/#schedule-->

<a name="contact"></a>    
<hr class="style-one">

<!--#contact-->
<div class="contact">
    <div class="contents"><img src="img/contents_contact.png" alt="contents_aboutus"></div> 
    <div class="contact_address"><img src="img/contact_contens.png"></div>
</div>
<!--/#contact-->

<!-- <hr class="style-one"> -->

<footer id="blueline" class="font_white">
Copyright © 2014 めたたぐ All Rights Reserved.
</footer>

</body>
</html>