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
                        <ul class="report__category">
                            <?php wp_list_categories(); ?>
                        </ul>
                        <?php if ( comments_open() ) : ?>
                            <p><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></p>
                        <?php endif; // comments_open() ?>

                        <p class="report__info">by <?php the_author(); ?> | <?php echo get_the_date(); ?></p>
                    </div>

                    <div class="entry_body">
                    <?php the_content(); ?>
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
                    <div class="align-left"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
                    <?php
                    endif;
                    if( get_next_post() ): ?>
                    <div class="align-right"><?php next_post_link('%link', '%title &raquo;'); ?></div>
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
            <!-- /Main Content -->
            <div class="main__sidebar">
            	<div class="project__list">
            		<h2>プロジェクト一覧</h2>
	                <ul>
					  <?php $args = array(
					    'numberposts' => 15, //表示する記事の数
					    'post_type' => 'project' //投稿タイプ名
					    // 条件を追加する場合はここに追記
					  );
					  $customPosts = get_posts($args);
					  if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
					  ?>
					  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					  <?php endforeach; ?>
					  <?php else : //記事が無い場合 ?>
					  <p>Sorry, no posts matched your criteria.</p>
					  <?php endif;
					  wp_reset_postdata(); //クエリのリセット ?>
					</ul>
				</div>
                <?php get_sidebar(); ?>
            </div>
<?php get_footer(); ?>
