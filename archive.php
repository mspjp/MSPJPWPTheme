<?php get_header();
$post_type = $wp_query->get_queried_object();
?>

<!-- Main Content -->
<div class="main__content">
    <?php
    query_posts($query_string . "&posts_per_page=5&paged=" . $paged);
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <article class="posdt" id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                <a href="<?php the_permalink(); ?>">

                    <div class="post__contaaeant">

                        <h3 class="post__titdle"
                            style="border-bottom:0px solid;"><?php echo mb_substr(get_the_title(), 0, 100); ?></h3>
                        <img width="100%" src="<?php if (has_post_thumbnail()) {
                            echo get_thumbnail_full_url();
                        } else {
                            echo get_template_directory_uri() . "/img/noimage.png";
                        } ?>" alt="">
                        <!-- p class="post__text" style="line-height:2em;"><?php echo mb_substr(strip_tags($post->post_content), 0, 200) . "…"; ?></p-->

                        <p class="post__text"
                           style="line-height:2em;"><?php echo mb_substr(strip_tags($post->post_content), 0, 200) . "…"; ?>
                            <span style="color:green"><b>続きを読む</b></span></p>
                        <!--p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日'); ?></p-->
                    </div>
                    <h3></h3>
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

<div class="main__sidebar" style="margin-top:95px;">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
