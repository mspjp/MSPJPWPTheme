<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<!-- <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" /> -->
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
		<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
		<script src="//code.jquery.com/jquery-latest.min.js"></script>
		<script src="<?php echo get_template_directory_uri()."/js/jquery.flexslider.js"; ?>"></script>
		<script src="<?php echo get_template_directory_uri()."/js/jquery.meanmenu.js"; ?>"></script>
		<script src="<?php echo get_template_directory_uri()."/js/header.js"; ?>"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- Header -->
	<header>
			<div id="toplogo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="<?php bloginfo('name'); ?>" /></a>
			</div>

			<nav>
				<?php wp_nav_menu( array ( 'theme_location' => 'header-navi' ) ); ?>

				<div id="search-menu">
					<?php get_search_form(); ?>
				</div>
			</nav>

			<div id="menubtn"></div>

		</div>
	</header>
	<!-- /Header -->

	<div id="maincontents">

