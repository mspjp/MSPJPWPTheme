<?php get_header();
$post_type = $wp_query->get_queried_object();
?>

<div class="headline">
    <h2 class="headline__title"><?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</h2>
</div>

<!-- Main Content -->
<div class="main__content">
    <?php
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <article class="post">
                <a href="<?php the_permalink(); ?>">
                    <div class="post__thumb">
                        <img src="<?php if (has_post_thumbnail()) {
                            echo get_thumbnail_url();
                        } else {
                            echo get_template_directory_uri() . "/img/noimage.png";
                        } ?>" alt="">
                    </div>
                    <div class="post__content">
                        <h3 class="post__title"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                        <p class="post__text"><?php echo mb_substr(strip_tags($post->post_content), 0, 60) . "..."; ?></p>
                        <p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日'); ?></p>
                    </div>
                </a>
            </article>
            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        include('no-article.php');
    endif;
    ?>
    <!-- pager -->
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
<!-- /MainContent -->
<div class="main__sidebar">
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
