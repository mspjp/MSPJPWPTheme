<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <div class="main__content">
                <!-- Report -->
                <div id="profile-<?php the_ID(); ?>" <?php post_class("profilepage"); ?>>
                    <?php
                    if (have_posts()) : // WordPress ループ
                        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                    <h3 class="profilepage__name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    <div class="profilepage__image">
                        <img src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" alt="">
                    </div>

                    <?php if(get_field( "year" )): ?>
                        <p class="profilepage__year">所属年度：
                            <?php 
                                $years = get_field("year");
                                foreach($years as $year): ?>
                                    <a href="<?php echo get_term_link($year); ?>"><?php echo $year->name ?></a>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>

                    <?php if(get_field( "wordpress_username" )): ?>
                        <p class="profilepage__username"><a href="#">ユーザ名：<?php echo get_field( "wordpress_username" )["display_name"]; ?></a></p>
                        <!-- ユーザー情報の中でも重要なのだけ抽出したい -->
                    <?php endif; ?>


                    <?php if(get_field( "team" )): ?>
                    <p>所属プロジェクト：</p>
                    <ul class="profilepage__projects">
                    <?php 
                        $teams = get_field("team");
                        foreach($teams as $team): ?>
                        <li>
                            <a href="<?php echo get_permalink($team->ID); ?>"><?php echo get_the_title($team->ID); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <div class="profilepage__introduce">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if(get_field( "related_articles" )): ?>
                <h3>関連投稿</h3>
                <?php 
                    $articles = get_field("related_articles");
                    foreach($articles as $article): ?>
                    <?php setup_postdata($article); ?>
                    <article class="post">
                        <a href="#">
                            <div class="post__thumb">
                                <img src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" alt="">
                            </div>
                            <div class="post__content">
                                <h3 class="post__title"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                                <p class="post__text"><?php echo mb_substr(strip_tags($article->post_content), 0, 60)."..."; ?></p>
                                <p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日') ;?> | <?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></p>
                            </div>
                    </a>
                  </article>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>

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
            <div class="main__sidebar">
                <?php get_sidebar(); ?>
            </div>
<?php get_footer(); ?>
