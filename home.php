<?php
include('htmlhead.php');
?>

<div class="row" style="width: 100%;">
    <div class="div-home-eyecatchback">
        <img src="<?php echo get_template_directory_uri() . "/img/top-eyecatch.jpg" ?>" width="100%"/>
        <div class="div-home-eyecatchover">
            <div class="p-home-captionleft">
                <p>Microsoftテクノロジーの</p>
                <p>"楽しさ"を伝えることが</p>
                <p>我々のミッションです</p>
            </div>
            <p class="p-home-captionright">Microsoft Student Partners Japan</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row div-home-nav">
        <?php include('navbar.php'); ?>
    </div>
    <div class="row div-home-intro">
        <div class="col-sm-4 dic-home-topbutton-container">
            <a>
                <div class="div-home-topbutton div-home-topbutton-left">
                    <i class="fa fa-laptop i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">勉強系に行く</p>
                    <p class="p-home-topbutton-caption">MSPは全国で学生向け勉強会を開催しています</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <div class="div-home-topbutton div-home-topbutton-center">
                <i class="fa fa-trophy i-home-topbutton-icon" aria-hidden="true"></i>
                <p class="p-home-topbutton-title">コンテストに出る</p>
                <p class="p-home-topbutton-caption">ImagineCupはあなたのアイデアで世界と競うことができます</p>
            </div>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <div class="div-home-topbutton div-home-topbutton-right">
                <i class="fa fa-twitter i-home-topbutton-icon" aria-hidden="true"></i>
                <p class="p-home-topbutton-title">フォローする</p>
                <p class="p-home-topbutton-caption">学生に役に立つMSテクノロジー情報を発信しています</p>
            </div>
        </div>
    </div>

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






                  