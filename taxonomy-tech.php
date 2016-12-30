<?php get_header();
$taxonomy = $wp_query->get_queried_object();
?>
<!-- main -->
<div id="main">
    <h2><?php echo esc_html($taxonomy->name) ?>に関連する新着タイトル</h2>
    <!-- recentposts -->
    <div id="recentposts">
        <?php
        query_posts($query_string . "&posts_per_page=3&paged=" . $paged);
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="recentpost">
                    <div class="recentpost-link metrolink">
                        <div class="recentpost-body">
                            <div class="recentpost-image"
                                 style="background-image: url('<?php if (has_post_thumbnail()) {
                                     echo get_thumbnail_url();
                                 } else {
                                     echo get_template_directory_uri() . "/images/noimage.jpg";
                                 } ?>')"></div>
                            <h3><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                            <div class="recentpost-meta">
                                <p class="recentpost-date">公開日: <?php echo get_the_date(); ?></p>
                            </div>
                            <p class="recentpost-description">
                                <?php echo mb_substr(strip_tags($post->post_content), 0, 60) . "..."; ?>
                            </p>
                        </div>
                        <p class="recentpost-linkarea"><a href="<?php the_permalink(); ?>">Read more</a></p>
                    </div>
                </article>
                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            ?>
            <!--	<div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div> -->
            <?php
        endif;
        ?>
    </div>
    <h2><?php echo esc_html($taxonomy->name) ?>に関連するタイトル一覧</h2>
    <div class="entry-list">
        <?php
        /*
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //現在のページ番号取得
        $myQuery = new WP_Query(); // WP_Queryオブジェクト生成
        $param = array( //パラメータ。
                'paged' => $paged, //常に現在のページ番号を渡す
                'posts_per_page' => '-1', //（整数）- 1ページに表示する記事数。-1 ならすべての投稿を取得。
                'post_type' => 'topic', //カスタム投稿タイプのみを指定。
                'taxonomy' => 'technology',
                'orderby' => 'modified',
                'order' => 'DESC' //降順。大きい値から小さい値の順。
        );
        $myQuery->query($param);  // クエリにパラメータを渡す
        if ($myQuery->have_posts()) : // WordPress ループ
            while ($myQuery->have_posts()) : $myQuery->the_post(); // 繰り返し処理開始 ?>
         */
        query_posts($query_string . "&posts_per_page=-1&paged=" . $paged);
        if (have_posts()) : // WordPress ループ
            while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <article class="topic">
                    <div class="entry-image-container">
                        <p><img src='<?php if (has_post_thumbnail()) {
                                echo get_thumbnail_url();
                            } else {
                                echo get_template_directory_uri() . "/images/noimage200.png";
                            } ?>'/></p>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo mb_substr(get_the_title(), 0, 30); ?></a></h3>
                    <p class="entry-meta">
                        <span class="entry-date">最終更新日: <?php the_modified_date('Y年n月j日') ?></span>
                    </p>
                    <div class="category">
                        <?php echo get_the_term_list($post->ID, 'technology', '<li>', '</li><li>', '</li>'); ?>
                    </div>
                    <p class="entry-description">
                        <?php echo get_post_meta($post->ID, 'description', true); ?>
                    </p>
                </article>
                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
            ?>
            <div class="post">
                <h2>記事はありません</h2>
                <p>お探しの記事は見つかりませんでした。</p>
            </div>
            <?php
        endif;
        ?>
    </div>
    <!-- entry-list -->
</div>
<!-- /main -->
</div>
<!-- /maincontents -->

<?php get_footer(); ?>
