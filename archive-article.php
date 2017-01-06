<?php get_header(); ?>
<script type="text/javascript">
    $(function(){
        $('.list-group li').addClass('list-group-item');
    })
</script>
<div class="container div-archive-container">
    <div class="row div-section">
        <div class="div-section-title div-archive-section-title">
            <div>
                <p><i class="fa fa-laptop" aria-hidden="true"></i> PCユーザー向けの記事</p>
            </div>
        </div>
        <div class="div-archive-section-recent">
            <?php
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('article'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset'=>'0',
                'tax_query' => array(                     //(array) - タクソノミーパラメーターを指定する（バージョン3.1以降で有効）。
                    'relation' => 'AND',                      //(string) - それぞれのタクソノミーを指定するのに'AND'か'OR'が使用できる。
                    array(
                        'taxonomy' => 'tech',                //(string) - タクソノミー。
                        'field' => 'slug',                    //(string) - IDかスラッグのどちらでタクソノミー項を選択するか
                        'terms' => array( 'it' ),    //(int/string/array) - タクソノミー項
                        'include_children' => true,           //(bool) - 階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue
                        'operator' => 'IN'                    //(string) - テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる
                    ),
                )
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <div class="col-sm-4 a-archive-subrecent">
                        <a href="<?php the_permalink(); ?>">
                            <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
            endif;
            ?>

        </div>
        <div class="div-archive-section-recent">
            <?php
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('article'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset'=>'3',
                'tax_query' => array(                     //(array) - タクソノミーパラメーターを指定する（バージョン3.1以降で有効）。
                    'relation' => 'AND',                      //(string) - それぞれのタクソノミーを指定するのに'AND'か'OR'が使用できる。
                    array(
                        'taxonomy' => 'tech',                //(string) - タクソノミー。
                        'field' => 'slug',                    //(string) - IDかスラッグのどちらでタクソノミー項を選択するか
                        'terms' => array( 'it' ),    //(int/string/array) - タクソノミー項
                        'include_children' => true,           //(bool) - 階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue
                        'operator' => 'IN'                    //(string) - テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる
                    ),
                )
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <div class="col-sm-4 a-archive-subrecent">
                        <a href="<?php the_permalink(); ?>">
                            <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
            endif;
            ?>

        </div>
        <div class="div-section-title div-archive-section-title">
            <div>
                <p><i class="fa fa-code" aria-hidden="true"></i> デベロッパー向けの記事</p>
            </div>
        </div>
        <div class="div-archive-section-recent">
            <?php
            query_posts("tech=it" . "&posts_per_page=-1");
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('article'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset'=>'0',
                'tax_query' => array(                     //(array) - タクソノミーパラメーターを指定する（バージョン3.1以降で有効）。
                    'relation' => 'AND',                      //(string) - それぞれのタクソノミーを指定するのに'AND'か'OR'が使用できる。
                    array(
                        'taxonomy' => 'tech',                //(string) - タクソノミー。
                        'field' => 'slug',                    //(string) - IDかスラッグのどちらでタクソノミー項を選択するか
                        'terms' => array( 'program' ),    //(int/string/array) - タクソノミー項
                        'include_children' => true,           //(bool) - 階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue
                        'operator' => 'IN'                    //(string) - テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる
                    ),
                )
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <div class="col-sm-4 a-archive-subrecent">
                        <a href="<?php the_permalink(); ?>">
                            <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
            endif;
            ?>

        </div>
        <div class="div-archive-section-recent">
            <?php
            query_posts("tech=it" . "&posts_per_page=-1");
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('article'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset'=>'3',
                'tax_query' => array(                     //(array) - タクソノミーパラメーターを指定する（バージョン3.1以降で有効）。
                    'relation' => 'AND',                      //(string) - それぞれのタクソノミーを指定するのに'AND'か'OR'が使用できる。
                    array(
                        'taxonomy' => 'tech',                //(string) - タクソノミー。
                        'field' => 'slug',                    //(string) - IDかスラッグのどちらでタクソノミー項を選択するか
                        'terms' => array( 'program' ),    //(int/string/array) - タクソノミー項
                        'include_children' => true,           //(bool) - 階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue
                        'operator' => 'IN'                    //(string) - テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる
                    ),
                )
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <div class="col-sm-4 a-archive-subrecent">
                        <a href="<?php the_permalink(); ?>">
                            <img class="img-archive-recent-thumbnail" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p class="p-archive-sub-title"><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
            endif;
            ?>

        </div>
        <div class="div-section-title div-archive-section-title">
            <div>
                <p><i class="fa fa-search" aria-hidden="true"></i> カテゴリーから探す</p>
            </div>
        </div>
        <div class="div-archive-category">
            <ul class="list-group">
                <?php
                wp_list_categories('title_li=&taxonomy=tech');
                ?>
            </ul>
        </div>
    </div>

</div>




<?php get_footer(); ?>
