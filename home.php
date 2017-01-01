<?php
include('htmlhead.php');
?>

<div class="div-home-eyecatch">
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
            <a class="btn">
                <div class="div-home-topbutton div-home-topbutton-left">
                    <i class="fa fa-laptop i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">勉強系に行く</p>
                    <p class="p-home-topbutton-caption">MSPは全国で学生向け勉強会を開催しています</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <a class="btn">
                <div class="div-home-topbutton div-home-topbutton-center">
                    <i class="fa fa-trophy i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">コンテストに出る</p>
                    <p class="p-home-topbutton-caption">ImagineCupはあなたのアイデアで世界と競うことができます</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <a class="btn">
                <div class="div-home-topbutton div-home-topbutton-right">
                    <i class="fa fa-twitter i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">フォローする</p>
                    <p class="p-home-topbutton-caption">学生に役に立つMSテクノロジー情報を発信しています</p>
                </div>
            </a>
        </div>
    </div>

    <div class="row div-home-section">
        <div class="div-home-section-title div-home-section-title-about">
            <div>
                <p>Microsoft Studnet Partnersとは</p>
            </div>
        </div>
        <p class="p-home-section-description">
            Microsoftの製品技術(VisualStudioやOfficeなど)の楽しさを学生に伝えるために活動を行う有志の学生団体です。</p>
        <p class="p-home-section-description">SNSで情報発信を行ったり、全国でハンズオンを開いたりしています。</p>
        <div class="div-home-section-button">
            <a class="btn a-home-section-button a-home-section-button-about">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
    </div>

    <div class="row div-home-section">
        <div class="div-home-section-title div-home-section-title-recent">
            <div>
                <p>最新情報</p>
            </div>
        </div>
        <div class="div-home-section-recent">
            <?php
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('blog'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <div class="col-sm-4">
                        <a class="btn" href="<?php the_permalink(); ?>">
                            <img class="" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>"
                                 alt="">
                            <div>
                                <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                                <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
                include('no-article.php');
            endif;
            ?>
        </div>

        <div class="div-home-section-subrecent">
            <?php
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '4',
                'post_type' => array('blog'),
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => '3'
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                    <a class="btn" href="<?php the_permalink(); ?>">
                        <img class="" height="60px" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                        <div>
                            <p class="p-home-section-recent-date"><?php the_time('Y/n/j'); ?></p>
                            <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                        </div>
                    </a>
                    <?php
                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
                include('no-article.php');
            endif;
            ?>
        </div>

        <div class="div-home-section-button">
            <a class="btn a-home-section-button a-home-section-button-recent">
                <p>グローバルサイト <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
            <a class="btn a-home-section-button a-home-section-button-recent">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
    </div>

    <div class="row div-home-section">
        <div class="row div-home-section-title div-home-section-title-imagine">
            <div>
                <p>Imagine Cup</p>
            </div>
        </div>
        <div class="row div-home-section-imagine-description">
            <div class="col-sm-6">
                <img src="<?php echo get_template_directory_uri() . "/img/imaginecup.jpg" ?>" width="80%"/>
            </div>
            <div class="col-sm-6">
                <img src="<?php echo get_template_directory_uri() . "/img/imagine_logo.jpg" ?>" width="50%"/>
                <p>ImagineCupはMicrosoftのテクノロジーを利用して出場できる世界最大規模の学生向けITコンテストです</p>
            </div>
        </div>
        <div class="div-home-section-imagine-register">
            <p>ImagineCup出場の流れ</p>
        </div>
        <div class="div-home-section-button">
            <a class="btn a-home-section-button a-home-section-button-imagine">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
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






                  