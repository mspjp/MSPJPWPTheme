<?php get_header(); ?>
<?php wp_link_pages(); ?>
<!-- main -->
<div id="main">
    <?php
    if (have_posts()) : // WordPress ループ
        while (have_posts()) : the_post(); // 繰り返し処理開始
            remove_filter('the_content', 'wpautop');
            remove_filter('the_excerpt', 'wpautop');
            $attachment = wp_get_attachment_image_src($post->id, "full");
            ?>
            <article class="" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h2>
                <div class=""><?php the_excerpt(); ?></div>
                <p class="">
                    <span class=""><?php echo get_the_date(); ?></span>
                </p>


                <div class="">
                    <p class="">
                        <a href="<?php echo $attachment[0]; ?>">
                            <img class="" src="<?php echo $attachment[0]; ?>"
                                 width="<?php echo $attachment[1]; ?>" height="<?php echo $attachment[2]; ?>"/>
                        </a>
                    </p>
                    <p class=""><?php the_excerpt(); ?></p>
                </div>

                <?php
                $args = array(
                    'before' => '<div class="page-link">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                );
                wp_link_pages($args); ?>


                <p class="footer-post-meta">
                    <?php the_tags('Tag : ', ', '); ?>
                    <?php if (is_multi_author()): ?>
                        <span class="post-author">
                            作成者 : <a
                                    href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                        </span>
                        <?php
                    endif;
                    ?>
                </p>

            </article>


            <?php
        endwhile; // 繰り返し処理終了
    else : // ここから記事が見つからなかった場合の処理
        include('no-article.php');
    endif;
    ?>

</div>
<!-- /main -->
</div>
<!-- /maincontents -->

<?php get_footer(); ?>
