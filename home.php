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
                <div class="topslider-item">
                    <h3><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                    <div class="slideritem-image">
                         <p><img src='<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>'></p>
                    </div>
                    <div class="slideritem-meta">
                        <p class="slideritem-date">公開日: <?php echo get_the_date(); ?></p>
                    </div>
                    <p class="slideritem-description">
                        <?php echo mb_substr(strip_tags($post-> post_content), 0, 45)."..."; ?>	
                    </p>
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
<?php get_footer(); ?>
