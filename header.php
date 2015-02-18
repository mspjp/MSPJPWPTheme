<!DOCTYPE html>
<html lang="ja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        wp_head(); ?>
    </head>
</head>
<body <?php body_class(); ?>>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="box">
                <div class="box__left">
                    <h1 class="title">Microsoft Student Partners JAPAN</h1>
                </div>
                <div class="box__right">
                    <!-- <img class="menu" src="img/menu.png" alt=""> -->
                    <div class="navbar">
                      <div class="navbar_box"><a href="#">Top</a></div>
                      <div class="navbar_box"><a href="#">About</a></div>
                      <div class="navbar_box"><a href="#">Info</a></div>
                      <div class="navbar_box"><a href="#">Profile</a></div>
                      <div class="navbar_box"><a href="#">Project</a></div>
                      <div class="navbar_box"><a href="#">Blog</a></div>
                      <div class="navbar_box"><a href="#">Contact</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /Header -->
    <!-- Main -->
    <div class="main">
        <!-- Main Container -->
        <div class="container">
