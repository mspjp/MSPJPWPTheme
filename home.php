<?php get_header(); ?>
            <!-- TopSlider -->
            <div class="topslider">
            <?php
            // query_posts( $query_string . "&posts_per_page=3&paged=0");
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('topslide'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                <div class="slide">
                    <a href="<?php the_permalink(); ?>" title="<?php echo mb_substr(get_the_title(), 0, 30); ?>">
                        <img src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo "http://dummyimage.com/1020x300/ccc/fff";} ?>" alt="<?php echo mb_substr(get_the_title(), 0, 30); ?>">
                        <div class="slide__description">
                            <h3 class="slide__title"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                            <p class="slide__date"><?php echo get_the_date(); ?></p>
                            <p class="slide__text"><?php echo mb_substr(strip_tags($post-> post_content), 0, 60)."..."; ?></p>
                        </div>
                    </a>
                </div>
            <?php
            endwhile;
            else :?>
            <?php
            endif;
            ?>
            </div>
            <!-- /TopSlider -->
            <!-- Top Info -->
            <div class="topinfo">
                <!-- Top Info Left -->
                <div class="topinfo__left">
                    <h2>Information</h2>
                    <ul class="topinfo__list">
                    <?php
                    // query_posts( $query_string . "&posts_per_page=3&paged=0");
                    $myQuery = new WP_Query();
                    $param = array(
                        'paged' => 0,
                        'posts_per_page' => '5',
                        'post_type' => array('info'),
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $myQuery->query($param);
                    if ($myQuery->have_posts()) :
                        while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><span class="topinfo__date"><?php echo get_the_date(); ?></span><?php echo mb_substr(get_the_title(), 0, 30); ?></a></li>
                    <?php
                    endwhile;
                    else :?>
                    <?php
                    endif;
                    ?>
                    </ul>
                </div>
                <!-- /Top Info Left -->
                <!-- Top Info Right -->
                <div class="topinfo__right">
                    <h2>Blog</h2>
                    <ul class="topinfo__list">
                    <?php
                    // query_posts( $query_string . "&posts_per_page=3&paged=0");
                    $myQuery = new WP_Query();
                    $param = array(
                        'paged' => 0,
                        'posts_per_page' => '5',
                        'post_type' => array('blog'),
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $myQuery->query($param);
                    if ($myQuery->have_posts()) :
                        while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><span class="topinfo__date"><?php echo get_the_date(); ?></span><?php echo mb_substr(get_the_title(), 0, 30); ?></a></li>
                    <?php
                    endwhile;
                    else :?>
                    <?php
                    endif;
                    ?>
                    </ul>
                </div>
                <!-- /Top Info Right -->
            </div>
            <!-- /Top Info -->
            <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
            <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css/slick/slick.min.js"></script>
            <script>
            $(document).ready(function(){
              $('.topslider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                arrows: true,
              });
            });
            </script>
<?php get_footer(); ?>

