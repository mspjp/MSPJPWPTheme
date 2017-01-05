<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="container div-archive-container">
        <div class="row div-section">
            <div class="div-section-title div-archive-section-title">
                <div>
                    <p><i class="fa fa-newspaper-o" aria-hidden="true"></i> ブログ</p>
                </div>
            </div>
            <div class="div-archive-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '1',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset' => '0'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-6">
                            <a href="<?php the_permalink(); ?>">

                                <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">

                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php the_permalink(); ?>">
                                <p class="p-archive-top-title"><?php echo get_the_title() ?></p>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>

                            </a>
                            <p><?php echo mb_substr(get_the_content(),0,200); ?></p>

                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>

            <div class="div-archive-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '2',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset'=>'1'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-6 a-archive-subrecent">
                            <a href="<?php the_permalink(); ?>">
                                <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>

            <div class="div-archive-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset'=>'3'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-4 a-archive-subrecent">
                            <a href="<?php the_permalink(); ?>">
                                <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>

            <div class="div-archive-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset'=>'6'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-4 a-archive-subsubrecent">
                            <a href="<?php the_permalink(); ?>">
                                <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>

            <div class="div-archive-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset'=>'9'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-4 a-archive-subsubrecent">
                            <a href="<?php the_permalink(); ?>">
                                <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>
        </div>


    </div>
<?php get_footer(); ?>