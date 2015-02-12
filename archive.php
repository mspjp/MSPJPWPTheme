<?php get_header();
$taxonomy = $wp_query->get_queried_object();
 ?>
			<!-- main -->
			<div id="main">
			<div id="leftcol">
			<h2>アーカイブ</h2>
			<div id="postlist">
			<?php
				query_posts( $query_string . "&posts_per_page=5&paged=".$paged );
				if (have_posts()) : // WordPress ループ
					while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
						<article class="entry-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2>
								<p><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
							</h2>
							<div class="post-description"><?php echo get_post_meta($post->ID , 'description' ,true); ?></div>
							<div class="post-meta">
								<p class="post-date"><?php echo get_the_date(); ?></p>
							</div>
							<div class="entrybody">
								<?php the_content(); ?>
							</div>
							<?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
						</article>
					<?php 
					endwhile; // 繰り返し処理終了		
				else : // ここから記事が見つからなかった場合の処理 ?>
					<!--	<div class="post">
							<h2>記事はありません</h2>
							<p>お探しの記事は見つかりませんでした。</p>
						</div> -->
				<?php
				endif;
				?>
			</div><!-- /postlist -->
			<?php
			if ( $wp_query -> max_num_pages > 1 ) : ?>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
					<div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
				</div>
			<?php 
			endif;
			?>
			<!-- /pager	 -->
			</div>
			<?php get_sidebar(); ?>
			</div>
			<!-- /main -->
		</div>
		<!-- /maincontents -->

<?php get_footer(); ?>
