<?php get_header();
$post_type = $wp_query->get_queried_object();
?>
<div class="headline">
    <h2 class="headline__title"><?php post_type_archive_title(); ?></h2>
    <div class="headline__snsbtns">

    </div>
</div>

<!-- Main Content -->
<ul class="profile_list">
    <?php
    query_posts($query_string . "&posts_per_page=-1");
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <li id="post-<?php the_ID(); ?>">
                <a class="profile" href="<?php the_permalink(); ?>">
                    <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                    <span class=""><?php echo mb_substr(get_the_title(), 0, 30); ?></span>
                    <?php
                    $field_depart = get_field_object('department');
                    $value_depart = get_field('department');
                    $label = $field_depart['choices'][$value_depart];
                    echo '<span class="profile__department">' . $label . '</span>';
                    $catch = get_field('catchcopy');
                    echo '<span class="profile__catchcopy">' . $catch . '</span>';

                    ?>
                </a>
            </li>
            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        include('no-article.php');
    endif;
    ?>
</ul>
<!-- /Main Content -->
<?php get_footer(); ?>
