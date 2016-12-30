<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="col-md-8">
        <!-- Report -->
        <div id="post-<?php the_ID(); ?>" <?php post_class("report"); ?>>
            <?php
            if (have_posts()) : // WordPress ループ
            while (have_posts()) :
            the_post(); // 繰り返し処理開始
            ?>
            <div class="report__meta">
                <div class="post_title">

                    <h3 class="report__title_"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </h3>
                    <br/>
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <?php if (comments_open()) : ?>
                    <p><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></p>
                <?php endif; // comments_open()
                ?>


            </div>

            <?php the_content(); ?>
            <p class="report__info">筆者: <?php the_author(); ?> | <?php echo get_the_date(); ?></p>
        </div>

        <?php
        $args = array(
            'before' => '<div class="page-link">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
        );
        wp_link_pages($args);
        ?>

        <!-- post navigation -->
        <div class="navigation">
            <?php
            if (get_previous_post()): ?>
                <div class="align-left"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
                <?php
            endif;
            if (get_next_post()): ?>
                <div class="align-right"><?php next_post_link('%link', '%title &raquo;'); ?></div>
                <?php
            endif;
            ?>
        </div>
        <!-- /post navigation -->
        <?php
        comments_template(); // コメント欄の表示
        ?>
        <?php
        endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            include('no-article.php');
        endif;
        ?>
    </div>
    <!-- /Main Content -->
    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>