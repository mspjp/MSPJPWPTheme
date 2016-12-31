<?php get_header(); ?>

<!--test start-->
<div class="col-md-8">
    <!-- Main Content -->
    <div class="main__content">
        <?php
        // query_posts( $query_string . "&posts_per_page=10&paged=0");
        $myQuery = new WP_Query();
        $param = array(
            'paged' => 0,
            'posts_per_page' => '10',
            'post_type' => array('blog'),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $myQuery->query($param);
        if ($myQuery->have_posts()) :
            while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                <article class="posdt" id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                    <a href="<?php the_permalink(); ?>">

                        <div class="post__contaaeant">

                            <h3 class="post__titdle"><?php echo mb_substr(get_the_title(), 0, 100); ?></h3>
                            <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <p class="post__text"><?php echo mb_substr(strip_tags($post->post_content), 0, 200) . "…"; ?>
                                <span style="color:green"><b>続きを読む</b></span>
                            </p>
                            <!--p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日'); ?></p-->
                        </div>
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


</div>


<div class="col-md-4">
    <!--記事スタート-->
    <div class="topinfos__list">
        <p>
            <b>
                <span style="border-radius:5px;background-color:#7cbb00;padding:5px;margin-top:6px;margin-bottom:6px;">おすすめ記事</span>
            </b>
        </p>


        <?php
        // query_posts( $query_string . "&posts_per_page=10&paged=0");
        $myQuery = new WP_Query();
        $param = array(
            'paged' => 0,
            'posts_per_page' => '10',
            'post_type' => array('blog'),
            'post_status' => 'publish',
            'orderby' => 'rand',
            'order' => 'desc'
        );
        $myQuery->query($param);
        if ($myQuery->have_posts()) :
            while ($myQuery->have_posts()) : $myQuery->the_post(); ?>

                <div>
                    <p>
                        <span style="
list-style-position: outside;
font-size:11px;
text-indent:-2em;
padding-left:2em;
border-left: 2px solid #ccc;
padding-left:10px;
line-height:20px;
">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </span>
                    </p>
                </div>

                <?php
            endwhile;
        else :?>
            <?php
        endif;
        ?>

    </div>
    <!--記事エンド-->
    <!-- お知らせスタート -->


    <div class="topinfos__list">
        <p>
            <b>
                <span>お知らせ</span>
            </b>
        </p>

        <?php
        // query_posts( $query_string . "&posts_per_page=10&paged=0");
        $myQuery = new WP_Query();
        $param = array(
            'paged' => 0,
            'posts_per_page' => '10',
            'post_type' => array('info'),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $myQuery->query($param);
        if ($myQuery->have_posts()) :
            while ($myQuery->have_posts()) : $myQuery->the_post(); ?>

                <div>
                    <p style="">
                        <a href="<?php the_permalink(); ?>">
                            <span><?php echo get_the_title(); ?></span>
                            <p>
                                <span><?php echo get_the_date(); ?></span>
                            </p>
                        </a>
                    </p>
                </div>

                <?php
            endwhile;
        else :?>
            <?php
        endif;
        ?>


    </div>

</div>


<!-- お知らせエンド -->


</div>
<?php get_footer(); ?>






                  