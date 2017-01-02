<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="container div-archive-container">
        <div class="row div-section">
            <div class="div-section-title div-home-section-title-recent">
                <div>
                    <p>最新情報</p>
                </div>
            </div>
            <div class="div-home-section-recent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '1',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <div class="col-sm-8">
                            <a class="btn" href="<?php the_permalink(); ?>">
                                <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>"
                                     alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <?php mb_substr(get_the_content(),0,100); ?>
                        </div>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>

            </div>

            <div class="div-home-section-recent">
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
                        <div class="col-sm-6">
                            <a class="btn" href="<?php the_permalink(); ?>">
                                <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>"
                                     alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
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

            <div class="div-home-section-recent">
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
                        <div class="col-sm-4">
                            <a class="btn" href="<?php the_permalink(); ?>">
                                <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>"
                                     alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
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

            <div class="div-home-section-recent">
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
                        <div class="col-sm-4">
                            <a class="btn" href="<?php the_permalink(); ?>">
                                <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>"
                                     alt="">
                                <div>
                                    <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                    <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
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


            <div class="div-home-section-subrecent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset' => '2'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <a class="btn" href="<?php the_permalink(); ?>">
                            <img class="" height="60px" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>
            </div>

            <div class="div-home-section-subrecent">
                <?php
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('blog'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset' => '5'
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <a class="btn" href="<?php the_permalink(); ?>">
                            <img class="" height="60px" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>
            </div>

            <div class="div-home-button">
                <a class="btn a-section-button a-home-section-button-recent">
                    <p>グローバルサイト <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                </a>
                <a class="btn a-section-button a-home-section-button-recent">
                    <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                </a>
            </div>
        </div>


    </div>
<?php get_footer(); ?>