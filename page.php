<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <div class="main__content">
                <!-- Report -->
                <div id="post-<?php the_ID(); ?>" <?php post_class("report"); ?>>
                    <?php
                    if (have_posts()) : // WordPress ループ
                        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                    <div class="report__meta">
                        <div class="post_title">
                            <h3 class="report__title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        </div>
                    </div>

                    <div class="entry_body">
                    <?php the_content(); ?>
                    
                    <div class="report__meta">
                        <ul class="report__category">
                            <?php wp_list_categories(); ?>
                        </ul>

                        <p class="report__info">by <?php the_author(); ?> | <?php echo get_the_date(); ?></p>
                    </div>
                    </div>

                </div>
                <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
                <?php
                $args = array(
                    'before' => '<div class="page-link">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                );
                wp_link_pages($args); ?>

                <!-- post navigation -->
                <div class="navigation">
                    <?php
                    if( get_previous_post() ): ?>
                    <div class="alignleft"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
                    <?php
                    endif;
                    if( get_next_post() ): ?>
                    <div class="alignright"><?php next_post_link('%link', '%title &raquo;'); ?></div>
                    <?php
                        endif;
                    ?>
                </div>
                <!-- /post navigation -->
                <?php
                endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
                <?php
                endif;
                ?>
                </div>
                <!-- /Report -->
                <div class="main__sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <!-- /Main Content -->
<?php get_footer(); ?>
