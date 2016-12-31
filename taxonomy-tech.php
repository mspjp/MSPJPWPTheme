<?php get_header(); ?>
<!-- main -->
<div id="main">
    <h2><?php echo esc_html($taxonomy->name) ?>に関連する新着タイトル</h2>
    <!-- recentposts -->
    <div id="recentposts">
        <?php
        query_posts($query_string . "&posts_per_page=3&paged=" . $paged);
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="recentpost">
                    <div class="recentpost-link metrolink">
                        <div class="recentpost-body">
                            <div class="recentpost-image">
                                <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            </div>
                            <h3><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                            <div class="recentpost-meta">
                                <p class="recentpost-date">公開日: <?php echo get_the_date(); ?></p>
                            </div>
                            <p class="recentpost-description">
                                <?php echo mb_substr(strip_tags($post->post_content), 0, 60) . "..."; ?>
                            </p>
                        </div>
                        <p class="recentpost-linkarea"><a href="<?php the_permalink(); ?>">Read more</a></p>
                    </div>
                </article>
                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理

            include('no-article.php');
        endif;
        ?>
    </div>

</div>
<!-- /main -->
</div>
<!-- /maincontents -->

<?php get_footer(); ?>
