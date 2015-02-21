<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <!-- Left Col -->
            <div class="headline">
                <h1 class="headline_title">メンバー</h1>
                <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
            </div>
            <div class="profile_base">
	            <ul>
	            <?php
	            query_posts( $query_string . "&posts_per_page=8&paged=".$paged );
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
	            </ul>
	            
	            <!-- page navigation -->
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
            <!-- Box Left -->

            <?php get_sidebar(); ?>
            </div>
            <!-- /Leftcol -->


<?php get_footer(); ?>
