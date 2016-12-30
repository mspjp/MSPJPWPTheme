<?php get_header();
$taxonomy = $wp_query->get_queried_object();
?>
<!-- main -->
<div id="main">
    <h2><?php single_cat_title(); ?>に関連する新着記事</h2>
    <!-- recentposts -->
    <div id="recentposts">
        <?php
        query_posts($query_string . "&posts_per_page=3&paged=" . $paged);
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="recentpost">
                    <div class="recentpost-link metrolink">
                        <div class="recentpost-body">
                            <div class="recentpost-image"
                                 style="background-image: url('<?php if (has_post_thumbnail()) {
                                     echo get_thumbnail_url();
                                 } else {
                                     echo get_template_directory_uri() . "/images/noimage.jpg";
                                 } ?>')"></div>
                            <h3><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                            <div class="recentpost-meta">
                                <p class="recentpost-date">公開日: <?php echo get_the_date(); ?></p>
                            </div>
                            <p class="recentpost-description">
                                <?php echo mb_substr(strip_tags($post->post_content), 0, 45) . "..."; ?>
                            </p>
                        </div>
                        <p class="recentpost-linkarea"><a href="<?php the_permalink(); ?>">Read more</a></p>
                    </div>
                </article>
                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            ?>
            <!--	<div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div> -->
            <?php
        endif;
        ?>
    </div>
    <h2><?php single_cat_title(); ?>に関連する記事一覧</h2>
    <div class="entry-list">
        <?php
        query_posts($query_string . "&posts_per_page=-1&paged=" . $paged);
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="topic">
                    <div class="entry-image-container">
                        <p><img src='<?php if (has_post_thumbnail()) {
                                echo get_thumbnail_url();
                            } else {
                                echo get_template_directory_uri() . "/images/noimage200.png";
                            } ?>'/></p>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo mb_substr(get_the_title(), 0, 30); ?></a></h3>
                    <p class="entry-meta">
                        <span class="entry-date">公開日: <?php the_time('Y年n月j日') ?></span>
                    </p>
                    <div class="category">
                        <ul>
                            <li><?php the_category('</li><li>') ?></li>
                        </ul>
                    </div>
                    <p class="entry-description">
                        <?php echo mb_substr(strip_tags($post->post_content), 0, 60) . "..."; ?>
                    </p>
                </article>
                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            ?>
            <!--	<div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div> -->
            <?php
        endif;
        ?>
    </div>
    <!-- entry-list -->
    <?php
    if ($myQuery->max_num_pages > 1) : ?>
        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
            <div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
        </div>
        <?php
    endif;
    ?>
</div>
<!-- /main -->
</div>
<!-- /maincontents -->

<?php get_footer(); ?>
