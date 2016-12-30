<?php if ( is_active_sidebar( 'main-widget' ) ) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'main-widget' ); ?>
    </div><!-- #primary-sidebar -->
<?php endif; ?>