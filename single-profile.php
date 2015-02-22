<?php get_header(); ?>
<?php wp_link_pages(); ?>
            <!-- Left Col -->
            <div class="box">
            <div id="box__left">
            <?php
            if (have_posts()) : // WordPress ループ
                while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="entry-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post_date"><?php echo get_the_date(); ?></div>
                    <div class="post_title">
                      <h1><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
                    </div>
                    <div class="post_meta">
                      <div class="post_category">
                        <ul>
                            <li><?php the_category('</li><li>') ?></li>
                        </ul>
                      </div>
                     <!-- メタデータを追加する場合はここ -->
                       <div class="comment_num">
                         <p><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></p>
                       </div>
                    </div>

                    <div class="entry_body">
                    <?php the_content(); ?>
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
