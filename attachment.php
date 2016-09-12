<?php get_header(); ?>
<?php wp_link_pages(); ?>
			<!-- main -->
			<div id="main">
				<?php 
				if (have_posts()) : // WordPress ループ
						while (have_posts()) : the_post(); // 繰り返し処理開始
							remove_filter('the_content','wpautop');remove_filter('the_excerpt','wpautop');
							$attachment = wp_get_attachment_image_src($post->id,"full");
				?>
						<article class="entry-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2>
								<big><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></big>
							</h2>
							<div class="post-description"><?php the_excerpt(); ?></div>
							<p class="post-meta">
								<span class="post-date"><?php echo get_the_date(); ?></span>
							</p>

							<?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>

							<div class="entrybody">
								<p class="attachment-image-container"><a href="<?php echo $attachment[0];?>"><img class="attachment-image" src="<?php echo $attachment[0];?>" width="<?php echo $attachment[1];?>" height="<?php echo $attachment[2];?>"/></a></p>
								<p class="attachment-description"><?php the_excerpt(); ?></p>
							</div>
							
							<?php 
							$args = array(
								'before' => '<div class="page-link">',
								'after' => '</div>',
								'link_before' => '<span>',
								'link_after' => '</span>',
							);
							wp_link_pages($args); ?>


							<?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>

							<p class="footer-post-meta">
								<?php the_tags('Tag : ',', '); ?>
								<?php if ( is_multi_author() ): ?> 
								<span class="post-author">作成者 : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
								<?php
								endif;
								?>
							</p>

						</article>
						
						<!-- post navigation -->
<!--
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
-->
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
			<!-- /main -->
		</div>
		<!-- /maincontents -->

<?php get_footer(); ?>
