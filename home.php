<?php
include('htmlhead.php');
?>

<script type="text/javascript">
    $(function(){
        $('.p-home-captionleft').css('opacity','0');
        $('.p-home-captionright').css('opacity','0');
        setTimeout(function(){
            $('.p-home-captionleft').animate({
                opacity:1.0
            },1000);
        },500);
        setTimeout(function(){
            $('.p-home-captionright').animate({
                opacity:1.0
            },1000);
        },1500);

        $.get('http://mspjp.hatenablog.com/rss',function(data) {
            $(data).find('item').each(function (index) {
                if(index >= 6){
                    return false;
                }
                var entry = $(this);
                var entryElement =
                    '<div class="col-sm-4 div-home-blog">' +
                        '<a class="link-home-blog" href="{url}">' +
                            '<img width="100%" height="auto" src="{img}" class="img-home-blog" />' +
                            '<p class="date-home-blog">{date}</p>' +
                            '<div class="title-home-blog">' +
                    '           <p>{title}</p>' +
                    '       </div>' +
                        '</a>' +
                    '</div>';
                var pubDate = new Date(entry.find('pubDate').text());
                pubDate = pubDate.getFullYear()+'/'+(pubDate.getMonth()+1)+'/'+pubDate.getDate();

                entryElement = entryElement.replace('{img}',entry.find('enclosure').attr('url'));
                entryElement = entryElement.replace('{url}',entry.find('link').text());
                entryElement = entryElement.replace('{title}',entry.find('title').text());
                //entryElement = entryElement.replace('{category}',entry.find('category').first().text());
                entryElement = entryElement.replace('{date}',pubDate);

                if(index<3) {
                    $('.div-home-section-recent1').append(entryElement);
                }else{
                    $('.div-home-section-recent2').append(entryElement);
                }
            });
        });
    });
</script>

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
            <a class="btn" href="<?php echo get_seminar_url() ?>" target="_blank">
                <div class="div-home-topbutton div-home-topbutton-left">
                    <i class="fa fa-laptop i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">勉強系に行く</p>
                    <p class="p-home-topbutton-caption">MSPは全国で学生向け勉強会を開催しています</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <a class="btn" href="<?php echo get_imagine_url() ?>">
                <div class="div-home-topbutton div-home-topbutton-center">
                    <i class="fa fa-trophy i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">コンテストに出る</p>
                    <p class="p-home-topbutton-caption">ImagineCupはあなたのアイデアで世界と競うことができます</p>
                </div>
            </a>
        </div>
        <div class="col-sm-4 dic-home-topbutton-container">
            <a class="btn" href="<?php echo get_twitter_url() ?>" target="_blank">
                <div class="div-home-topbutton div-home-topbutton-right">
                    <i class="fa fa-twitter i-home-topbutton-icon" aria-hidden="true"></i>
                    <p class="p-home-topbutton-title">フォローする</p>
                    <p class="p-home-topbutton-caption">学生に役に立つMSテクノロジー情報を発信しています</p>
                </div>
            </a>
        </div>
    </div>

    <div class="row div-section">
        <div class="div-section-title div-home-section-title-about">
            <div>
                <p>Microsoft Studnet Partnersとは</p>
            </div>
        </div>
        <p class="p-section-description">
            Microsoftの製品技術(VisualStudioやOfficeなど)の楽しさを学生に伝えるために活動を行う有志の学生団体です。</p>
        <p class="p-section-description">SNSで情報発信を行ったり、全国でハンズオンを開いたりしています。</p>
        <div class="div-section-button">
            <a class="btn a-section-button a-home-section-button-about" href="/profile">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
    </div>

    <div class="row div-section">
        <div class="div-section-title div-home-section-title-recent">
            <div>
                <p>最新情報</p>
            </div>
        </div>
        <div class="div-home-section-recent1 row">
        </div>
        <div class="div-home-section-recent2 row">
        </div>

        <div class="div-section-button">
            <a class="btn a-section-button a-home-section-button-recent" href="https://msp-times.net/">
                <p>グローバルサイト <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
            <a class="btn a-section-button a-home-section-button-recent" href="<?php echo get_blog_url() ?>">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
    </div>

    <div class="row div-section">
        <div class="row div-section-title div-home-section-title-imagine">
            <div>
                <p>Imagine Cup</p>
            </div>
        </div>
        <div class="row div-section-imagine-description">
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
            <div>
                <img width="60%" src="<?php echo get_template_directory_uri() . "/img/imagine_register.png" ?>">
                <div class="div-home-section-imagine-register-caption">
                    <div class="col-sm-4">
                        <p class="p-home-section-imagine-register-title">アイデアの提出</p>
                        <p class="p-home-section-imagine-register-sub">未定</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="p-home-section-imagine-register-title">開発</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="p-home-section-imagine-register-title">プレゼンビデオの作成</p>
                        <p class="p-home-section-imagine-register-sub">未定</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="div-section-button">
            <a class="btn a-section-button a-home-section-button-imagine" href="<?php echo get_imagine_url() ?>">
                <p>もっと詳しく知る <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
    </div>

    <div class="row div-section">
        <div class="div-section-title div-home-section-title-tech">
            <div>
                <p>技術情報</p>
            </div>
        </div>
        <p class="p-section-description">MSP JapanのQiita Organizationができました！今後はこちらに技術情報を投稿していきます！</p>
        <div class="div-section-button">
            <a class="btn a-section-button a-home-section-button-tech" href="http://qiita.com/organizations/mspjp/activities">
                <p>Qiita <i class="fa fa-angle-right" aria-hidden="true"></i></p>
            </a>
        </div>
        <div class="div-home-section-tech">
            <div class="col-sm-6">
                <p><i class="fa fa-code" aria-hidden="true"></i> デベロッパー向け</p>
                <?php
                // query_posts( $query_string . "&posts_per_page=10&paged=0");
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('article'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tech',
                            'field' => 'slug',
                            'terms' => array( 'program' ),
                            'include_children' => true,
                        )
                    )
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <a class="btn" href="<?php the_permalink(); ?>">
                            <img class="" height="60px" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-tech-date"><?php the_time('Y/n/j'); ?></p>
                                <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>
                <div class="div-section-button">
                    <a class="btn a-section-button a-home-section-button-tech" href="/article">
                        <p>他の情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <p><i class="fa fa-laptop" aria-hidden="true"></i> PCユーザー向け</p>
                <?php
                // query_posts( $query_string . "&posts_per_page=10&paged=0");
                $myQuery = new WP_Query();
                $param = array(
                    'paged' => 0,
                    'posts_per_page' => '3',
                    'post_type' => array('article'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tech',
                            'field' => 'slug',
                            'terms' => array( 'it' ),
                            'include_children' => true,
                        )
                    )
                );
                $myQuery->query($param);
                if ($myQuery->have_posts()) :
                    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                        <a class="btn" href="<?php the_permalink(); ?>">
                            <img class="" height="60px" src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                            <div>
                                <p class="p-home-section-tech-date"><?php the_time('Y/n/j'); ?></p>
                                <p><?php echo mb_substr(get_the_title(), 0, 100); ?></p>
                            </div>
                        </a>
                        <?php
                    endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理
                    include('no-article.php');
                endif;
                ?>
                <div class="div-section-button">
                    <a class="btn a-section-button a-home-section-button-tech" href="/article">
                        <p>他の情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
