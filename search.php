<?php get_header(); ?>
			<!-- main -->
			<div id="main">
				<h2><?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</h2>
				<div class="entry-list">
			<?php
				if (have_posts()) : // WordPress ループ
					while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
						<article class="article">
							<div class="entry-image-container">
									<p><img src='<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/images/noimage200.png";} ?>' /></p>
							</div>
							<h3><a href="<?php the_permalink(); ?>"><?php echo mb_substr(get_the_title(), 0, 30); ?></a></h3>
							<p class="entry-meta">
								<span class="entry-date">公開日: <?php the_time('Y年n月j日') ;?></span>
							</p>
							<p class="entry-description">
								<?php echo mb_substr(strip_tags($post-> post_content), 0, 60)."..."; ?>	
							</p>
						</article>
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
				<!-- entrylist -->
				<!-- pager -->
				<?php
				if ( $myQuery-> max_num_pages > 1 ) : ?>
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
						<div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
					</div>
				<?php 
				endif;
				?>
			</div>
			<!-- main -->
		</div>
		<!-- maincontents -->

<?php get_footer(); ?>
