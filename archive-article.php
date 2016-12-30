<?php get_header();
$post_type = $wp_query->get_queried_object();
?>
<div class="headline">
    <h2 class="headline__title"><?php post_type_archive_title(); ?></h2>
    <div class="headline__snsbtns">

    </div>
</div>

<h3>IT系の記事</h3>
<!-- Main Content -->
<ul class="profile_list">
    <?php
    query_posts("tech=it" . "&posts_per_page=-1");
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <li id="post-<?php the_ID(); ?>">
                <a class="profile" href="<?php the_permalink(); ?>">
                    <img class="profile__icon" src="<?php if (has_post_thumbnail()) {
                        echo get_thumbnail_url();
                    } else {
                        echo get_template_directory_uri() . "/img/noimage.png";
                    } ?>" alt="">
                    <h3 class="profile__name"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                    <p class="profile__text"><?php echo mb_substr(strip_tags($post->post_content), 0, 24) . "..."; ?></p>
                </a>
            </li>
            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        ?>
        <div class="post">
            <h2>アーカイブはありません</h2>
            <p>お探しのアーカイブは見つかりませんでした。</p>
        </div>
        <?php
    endif;
    ?>
</ul>
<h3>プログラミング系の記事</h3>
<!-- Main Content -->
<ul class="profile_list">
    <?php
    query_posts("tech=program" . "&posts_per_page=-1");
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <li id="post-<?php the_ID(); ?>">
                <a class="profile" href="<?php the_permalink(); ?>">
                    <img class="profile__icon" src="<?php if (has_post_thumbnail()) {
                        echo get_thumbnail_url();
                    } else {
                        echo get_template_directory_uri() . "/img/noimage.png";
                    } ?>" alt="">
                    <h3 class="profile__name"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                    <p class="profile__text"><?php echo mb_substr(strip_tags($post->post_content), 0, 24) . "..."; ?></p>
                </a>
            </li>
            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        ?>
        <div class="post">
            <h2>アーカイブはありません</h2>
            <p>お探しのアーカイブは見つかりませんでした。</p>
        </div>
        <?php
    endif;
    ?>
</ul>
<h3>カテゴリーから探す</h3>
<ul class="search_category">
    <?php
    wp_list_categories('title_li=&taxonomy=tech');
    ?>
</ul>
<!-- /Main Content -->
<?php get_footer(); ?>
