<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <div class="main__content">
                <!-- Report -->
                <div id="profile-<?php the_ID(); ?>" <?php post_class("profilepage"); ?>>
                    <?php
                    if (have_posts()) : // WordPress ループ
                        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                    <h3 class="profilepage__name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    <div class="profilepage__image alignn-center">
                        <img src="http://" alt="">
                    </div>
                    <ul class="report__category">
                        <?php wp_list_categories(); ?>
                    </ul>
                    <p><?php the_meta(); ?></p>

                    <?php if(get_field( "year" )): ?>
						<p class="profilepage__year"><a href="#">所属年度：<?php the_field( "year" ); ?></a></p>
						<!-- 所属年度がそのまま出てくるようにしたい(今は3,とかで出てくる) -->
					<?php endif; ?>

                    <?php if(get_field( "wordpress_username" )): ?>
						<p class="profilepage__username"><a href="#">ユーザ名：<?php the_field( "wordpress_username" ); ?></a></p>
						<!-- ユーザー情報の中でも重要なのだけ抽出したい -->
					<?php endif; ?>
                    
                    
                    <p>所属プロジェクト：</p>
                    <ul class="profilepage__projects">
						<!-- プロジェクトの記事idは取得できた。あとはURLとタイトルの取得&表示 -->
						<?php

						$teams = get_field('team');
						if($teams)
						{
							echo '<ul>';

							foreach($teams as $teamid)
							{
								echo '<li><a href="' . get_permalink( echo $teamid ) . '#">' . $teamid . '</a></li>';
							}

							echo '</ul>';
						}

						// always good to see exactly what you are working with
						var_dump($teams);

						?>
                        <li><a href="#">その他</a></li>
                        <li><a href="#">その他</a></li>
                    </ul>

                    <div class="profilepage__introduce">
                        <?php the_content(); ?>
                    </div>

                </div>

                <h3>関連投稿</h3>
						<!-- 手つかずなう -->
						<!-- 参考コード  http://www.advancedcustomfields.com/resources/code-examples/ -->

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
                <!-- /Report -->
                <div class="main__sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <!-- /Main Content -->
<?php get_footer(); ?>
