<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="container div-single-container">

        <div class="col-md-8">
            <!-- Report -->
            <div class="div-single-post" id="post-<?php the_ID(); ?>" <?php post_class("report"); ?>>
                <?php
                if (have_posts()) : // WordPress ループ
                while (have_posts()) :
                the_post(); // 繰り返し処理開始
                ?>
                <p class="p-single-title">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </p>
                <p class="p-single-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                </p>
                <?php
                if (has_post_thumbnail()):
                    ?>
                    <div class="div-single-thumbnail"
                         style="background-image: url(<?php echo get_thumbnail_url(has_post_thumbnail()) ?>)">
                    </div>
                    <?php
                endif;
                ?>
                <?php if (comments_open()) : ?>
                    <p><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></p>
                <?php endif; // comments_open()
                ?>

                <?php the_content(); ?>
                <?php
                $author_id = get_the_author_meta('ID');
                ?>
                <?php
                $args_profile = array(
                    'post_type' => array(                   //(string / array) - 投稿タイプを指定する。デフォルト値は'post'で、投稿が表示される。
                        'profile'                  // - カスタム投稿タイプ (例: movies)
                    ),
                    'posts_per_page' => -1,
                );
                $query_profile = new WP_Query($args_profile);
                // ループ
                if ($query_profile->have_posts()) :
                    while ($query_profile->have_posts()) : $query_profile->the_post();
                        $field_userid = get_field_objects()['wp_userid']['value'];
                        $id = $field_userid['ID'];

                        $value_department = get_field_objects()['department']['value'];
                        $choice_department = get_field_objects()['department']['choices'][$value_department];

                        $value_catch = get_field_objects()['catchcopy']['value'];

                        if ($author_id == $id):
                            ?>
                            <p class="p-single-author-title">著者情報</p>
                            <div class="div-single-author">
                                <a class="btn" href="<?php echo get_the_permalink() ?>">
                                <div class="div-single-author-icon" style="background-image: url(<?php echo get_thumbnail_url(has_post_thumbnail()) ?>)">
                                    <span class="span-single-author-department"><?php echo $choice_department ?></span>
                                </div>
                                </a>
                                <div class="div-single-author-description">
                                    <p class="p-single-author-section">名前</p>
                                    <p class="p-single-author-name"><?php echo get_the_title() ?></p>
                                    <p class="p-single-author-section">キャッチコピー</p>
                                    <p class="p-single-author-catch"><?php echo $value_catch ?></p>
                                </div>
                            </div>
                        <?php
                            break;
                        endif;
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
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
        <div class="col-md-4 div-single-widget">
            <?php get_sidebar(); ?>
        </div>


    </div>
<?php get_footer(); ?>