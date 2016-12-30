<?php
include('htmlhead.php');
?>
<!-- Header -->
<header>
    <div class="container">
        <div class="box">

            <div class="box__left">

                <h1 class="title"
                <a href="/">Microsoft Student Partners JAPAN</a>
                </h1>
            </div>
            <div class="box__right" style="padding-bottom:10px;">
                <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => 'nav-menu', 'menu_id' => 'main-menu' ) ); ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- /Header -->
<!-- Main -->
<div class="container">