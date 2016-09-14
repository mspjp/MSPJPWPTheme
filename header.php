<!DOCTYPE html>
<html lang="ja" style="overflow-x : hidden;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Marcellus+SC'  rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        wp_head(); ?>

<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84153203-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- application insights -->
<script type="text/javascript">  var appInsights=window.appInsights||function(config){    function r(config){t[config]=function(){var i=arguments;t.queue.push(function(){t[config].apply(t,i)})}}var t={config:config},u=document,e=window,o="script",s=u.createElement(o),i,f;s.src=config.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js";u.getElementsByTagName(o)[0].parentNode.appendChild(s);try{t.cookie=u.cookie}catch(h){}for(t.queue=[],i=["Event","Exception","Metric","PageView","Trace","Dependency"];i.length;)r("track"+i.pop());return r("setAuthenticatedUserContext"),r("clearAuthenticatedUserContext"),config.disableExceptionTracking||(i="onerror",r("_"+i),f=e[i],e[i]=function(config,r,u,e,o){var s=f&&f(config,r,u,e,o);return s!==!0&&t["_"+i](config,r,u,e,o),s}),t    }({        instrumentationKey:"ad36a47f-5368-4180-b6c3-4ac7b296f368"    });           window.appInsights=appInsights;    appInsights.trackPageView();</script>

</head>
<body <?php body_class(); ?>  style="overflow-x : hidden;">
    <!-- Header -->
    <header>
        <div class="container">
            <div class="box">

                <div class="box__left">

                    <h1 class="title" style='font-family: "Meiryo UI","Meiryo","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック","Osaka",sans-serif;'><a href="/">Microsoft Student Partners JAPAN</a></h1>
                </div>
                <div class="box__right" style="padding-bottom:10px;">
                    <!-- <img class="menu" src="img/menu.png" alt=""> -->
                    <nav>
                        <div class="navbar_box" style="border-left:0px;"><a href="/">トップ</a></div>
                        <div class="navbar_box"><a href="/about">MSPとは</a></div>
                        <!--div class="navbar_box"><a href="/info/">Info</a></div-->
                        <div class="navbar_box"><a href="/メンバー">メンバー</a></div>
                        <div class="navbar_box"><a href="/チーム">プロジェクト</a></div>
                        <div class="navbar_box"><a href="/blog/">ブログ</a></div>
                        <div class="navbar_box" style="border-right:0px;"><a href="/article/">技術記事</a></div>
                        <!--div class="navbar_box"><a href="/contact">Contact</a></div-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- /Header -->
    <!-- Main -->
    <div class="main">
        <!-- Main Container -->
        <div class="container">