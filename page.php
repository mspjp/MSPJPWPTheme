<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="main__content">
        <!-- Report -->
        <div id="post-<?php the_ID(); ?>" <?php post_class("report"); ?>>
            <?php
            if (have_posts()) : // WordPress ループ
            while (have_posts()) :
            the_post(); // 繰り返し処理開始
            ?>
            <div class="report__meta">
                <div class="post_title">
                    <h2 class="reportbhb__title" style="border:0px;">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </h2>
                </div>
            </div>

            <div class="entry_body">
                <?php the_content(); ?>
            </div>

        </div>

        <?php
        $args = array(
            'before' => '<div class="page-link">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
        );
        wp_link_pages($args); ?>

        <!-- /post navigation -->
        <?php
        endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            include('no-article.php');
        endif;
        ?>
    </div>
    <!-- /Report -->

    <!-- removed sidebar -->

    <div class="main__sidebar" style="margin-top:95px;">
        <?php get_sidebar(); ?>
    </div>
    </div>
    <!-- /Main Content -->
<?php get_footer(); ?>