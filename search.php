<?php get_header();
$post_type = $wp_query->get_queried_object();
?>

<div class="container div-archive-container">
    <div class="col-sm-8">
    <div class="row div-section">
        <div class="div-section-title div-archive-section-title">
            <div>
                <p><i class="fa fa-search" aria-hidden="true"></i> <?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</p>
            </div>
        </div>
    </div>
    <div class="row div-section">
        <ul class="list-group">
        <?php
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <li class="list-group-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post__content">
                            <h3 class="post__title"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                            <p class="post__text"><?php echo mb_substr(strip_tags($post->post_content), 0, 60) . "..."; ?></p>
                            <p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日'); ?></p>
                        </div>
                    </a>
                </li>
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
        </ul>

    </div>
    </div>
    <div class="col-md-4 div-single-widget">
        <?php get_sidebar(); ?>
    </div>
</div>


<!-- Main Content -->
<div class="main__content">

</div>
<!-- /MainContent -->
<div class="main__sidebar">
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
