<?php get_header(); ?>

<!-- Main Content -->
<div class="cols-md-8">
    <?php
    query_posts($query_string . "&posts_per_page=5&paged=" . $paged);
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <article class="" id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                <a href="<?php the_permalink(); ?>">

                    <div class="">

                        <h3 class=""><?php echo mb_substr(get_the_title(), 0, 100); ?></h3>

                        <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                        <?php echo mb_substr(strip_tags($post->post_content), 0, 200) . "…"; ?>

                        <p class="">
                            <?php echo mb_substr(strip_tags($post->post_content), 0, 200) . "…"; ?>
                            <span>
                                <b>続きを読む</b>
                            </span>
                        </p>
                    </div>
                </a>
            </article>
            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        include('no-article.php');
    endif;
    ?>
    <?php
    if ($wp_query->max_num_pages > 1) : ?>
        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('前のページ'); ?></div>
            <div class="alignright"><?php previous_posts_link('次のページ'); ?></div>
        </div>
        <?php
    endif;
    ?>
</div>
<!-- /Main Content -->

<div class="cols-md-4">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
