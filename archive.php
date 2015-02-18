<?php get_header();
$taxonomy = $wp_query->get_queried_object();
?>
            <div id="leftcol">
            <div class="headline">
                <h1 class="headline_title">アーカイブ</h1>
                <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
            </div>

            <!-- Box -->
            <div class="box">
                <div class="box__left blog__left">
                <?php
                query_posts( $query_string . "&posts_per_page=5&paged=".$paged );
                if (have_posts()) : // WordPress ループ
                    while (have_posts()) : the_post(); // 繰り返し処理開始 ?>

                <a class="blog" id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?> href="<?php the_permalink(); ?>">
                    <div class="box content">
                        <div class="box__left content__left">
                            <img class="clearfix" src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/images/noimage200.png";} ?>" alt="" />
                        </div>
                        <div class="box__right content__right clearfix">
                            <h2 class="content_title"><i class="fa fa-star"></i><?php echo mb_substr(get_the_title(), 0, 30); ?></h2>
                            <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
                            <!-- 場合によってはイメージで -->
                            <div class="outine"><?php echo mb_substr(strip_tags($post-> post_content), 0, 60)."..."; ?></div>
                            <div class="content_info">by <?php the_author(); ?> | <?php the_time('Y年n月j日') ;?> | <?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></div>
                        </div>
                    </div>
                </a>
                <?php
                endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>アーカイブはありません</h2>
                    <p>お探しのアーカイブは見つかりませんでした。</p>
                </div>
                <?php
                endif;
                ?>
            </div>
            <!-- /Box -->
            <?php
            if ( $wp_query -> max_num_pages > 1 ) : ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
                <div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
            </div>
            <?php 
            endif;
            ?>
            </div>
            <!-- LeftCol -->
            <?php get_sidebar(); ?>
<?php get_footer(); ?>
