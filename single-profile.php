<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <!-- Left Col -->
            <div class="profile_base">
            <?php
            if (have_posts()) : // WordPress ループ
                while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <li>
                <a class="profile_box" href="<?php the_permalink(); ?>">
                	<?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?> <!-- img  -->
                	<h1 class="profile_header"><?php echo get_the_title(); ?></h1>
                	<div class="profile_content">
                		<?php the_content(); ?>
                	</div>
                </a>
                </li>
    

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
                <?php comments_template(); // コメント欄の表示 ?>
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
            <!-- Box Left -->

            <?php get_sidebar(); ?>
            </div>
            <!-- /Leftcol -->


<?php get_footer(); ?>
