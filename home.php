<?php get_header(); ?>
			<!-- main -->
			<div id="main">
			<h2>新着更新</h2>
			<!-- recentposts -->
			<div id="recentposts">
			<?php
				// query_posts( $query_string . "&posts_per_page=3&paged=0");
				$myQuery = new WP_Query(); // WP_Queryオブジェクト生成
				$param = array( //パラメータ。
						'paged' => 0, //常に現在のページ番号を渡す
						'posts_per_page' => '3', //（整数）- 1ページに表示する記事数。-1 ならすべての投稿を取得。
						'post_type' => array('post','article'), //カスタム投稿タイプのみを指定。
						'post_status' => 'publish', //取得するステータスを指定：publish（公開済み）
						'orderby' => 'date',
						'order' => 'DESC' //降順。大きい値から小さい値の順。
				);
				$myQuery->query($param);  // クエリにパラメータを渡す
				if ($myQuery->have_posts()) : // WordPress ループ
					while ($myQuery->have_posts()) : $myQuery->the_post(); // 繰り返し処理開始 ?>
						<article class="recentpost">
							<div class="recentpost-link metrolink">
								<div class="recentpost-body">
									<div class="recentpost-image" style="background-image: url('<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/images/noimage.jpg";} ?>')"></div>
									<h3><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
									<div class="recentpost-meta">
										<p class="recentpost-date">公開日: <?php echo get_the_date(); ?></p>
									</div>
									<p class="recentpost-description">
										<?php echo mb_substr(strip_tags($post-> post_content), 0, 45)."..."; ?>	
									</p>
								</div>
								<p class="recentpost-linkarea"><a href="<?php the_permalink(); ?>">Read more</a></p> 
							</div>
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
				</div>
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
			<!-- pager -->
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
			<!-- /main -->

		</div>
		<!-- /maincontents -->
<?php get_footer(); ?>
