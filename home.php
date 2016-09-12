<?php get_header(); ?>



            <div class="topslider" style="margin-bottom:0px;">



<div class="slide" >
                    <a href="http://mspjp.net/about" title="MSP">
                        
                        <img src="http://mspjp.net/wp-content/uploads/2015/12/Screen-Shot-2015-12-19-at-16.35.29.png" alt="MSP" style="width:100%">
                        <div class="slide__description" style="min-width:300px;width:50%;height:122px;margin:0px;">
                            <h4 class="slide__title" style="border:0px;font-size:24px;" >MSPのページへようこそ！</h4>
                            <p class="slide__text">MSPは、マイクロソフトが全世界で展開する学生向けのパートナープログラムです。</p>
                        </div>
                    </a>
                </div>

            <?php
            // query_posts( $query_string . "&posts_per_page=3&paged=0");
            $myQuery = new WP_Query();
            $param = array(
                'paged' => 0,
                'posts_per_page' => '3',
                'post_type' => array('topslide'),
                'post_status' => 'publish',
                'orderby' => 'rand',
                'order' => 'DESC'
            );
            $myQuery->query($param);
            if ($myQuery->have_posts()) :
                while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                <div class="slide" >
                    <a href="<?php the_field('link'); ?>" title="<?php echo mb_substr(get_the_title(), 0, 30); ?>">
                        <?php
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id, "full"); ?>
                        <img src="<?php if( has_post_thumbnail() ){echo $image_url[0]; }else{echo "http://dummyimage.com/1020x300/ccc/fff";} ?>" alt="<?php echo mb_substr(get_the_title(), 0, 30); ?>" style="width:100%">
                        <div class="slide__description" style="min-width:300px;width:50%;height:122px;margin:0px;">
                            <h4 class="slide__title" style="border:0px;font-size:24px;" ><?php echo mb_substr(get_the_title(), 0, 30); ?></h4>
                            <!--p class="slide__date"><?php echo get_the_date(); ?></p-->
                            <p class="slide__text"><?php echo mb_substr(strip_tags($post-> post_excerpt), 0, 60); ?></p>
                        </div>
                    </a>
                </div>
            <?php
            endwhile;
            else :?>
            <?php
            endif;
            ?>
            </div>


<!--test start-->

            <!-- Main Content -->
            <div class="main__content" style="margin-right:30px;margin-top:0px;>
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

                          <h3 class="post__titdle" style="border-bottom:0px solid;"><?php echo mb_substr(get_the_title(), 0, 100); ?></h3>
                            <img width="100%" src="<?php if( has_post_thumbnail() ){echo get_thumbnail_full_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" alt="">
                          <p class="post__text" style="line-height:2em;"><?php echo mb_substr(strip_tags($post-> post_content), 0, 200)."…"; ?><span style="color:green"><b>続きを読む</b></span></p>
                          <!--p class="post__info">by <?php the_author(); ?> | <?php the_time('Y年n月j日') ;?></p-->
                        </div>
<h3></h3>
                    </a>
                </article>
                <?php
                endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>アーカイブはありません</h2>
                    <p>お探しのアーカイブは見つかりませんでした。</p>
                </div>
                <?php
                endif;
                ?>
                <?php
                if ( $wp_query -> max_num_pages > 1 ) : ?>
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link('前のページ'); ?></div>
                    <div class="alignright"><?php previous_posts_link('次のページ'); ?></div>
                </div>
            <?php 
            endif;
            ?>
            </div>
            <!-- /Main Content -->






<!--記事スタート-->
                  <div class="topinfos__list" style="margin-top:120px;padding-left:30px;padding-right:30px" >
<p><b><span style="border-radius:5px;background-color:#7cbb00;padding:5px;margin-top:6px;margin-bottom:6px;">おすすめ記事</span></b></p><br>


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



<div style="padding:0px 0px 0 10px;margin-left:10px;" >

               <p>         <span style="
list-style-position: outside;
font-size:11px;
text-indent:-2em;
padding-left:2em;
border-left: 2px solid #ccc;
padding-left:10px;
line-height:20px;
"><a href="<?php the_permalink(); ?>">
<?php 
echo get_the_title();  
?>
</a></span></p><br>
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
  

                  <div class="topinfos__list" style="margin-top:50px;padding-left:30px;padding-right:30px" >
<p><b><span style="border-radius:5px;background-color:#ffbb00;padding:5px;margin-top:6px;margin-bottom:6px;">お知らせ</span></b></p>
<br>

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



<div style="padding:0px 0px 0 10px;margin-left:10px;" >

                        <p style=""><a href="<?php the_permalink(); ?>">
<span style="font-size:11px;border-left: 2px solid #ccc;padding-left:10px"><?php 
echo get_the_title();  
?></span>
<p style="text-align:right">
<span style="border-radius:5px;background-color:#ccc;padding:2px;margin-top:6px;margin-bottom:6px;font-size:7px;">
<?php echo get_the_date(); ?>
</span>
</p>



</a></p>
                    </div>                    

                    <?php
                    endwhile;
                    else :?>
                    <?php
                    endif;
                    ?>




                    </div>




<!-- お知らせエンド -->






           </div>
<!--test end-->




            <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
            <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css/slick/slick.min.js"></script>
            <script>
            $(document).ready(function(){
              $('.topslider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                arrows: true,
              });
            });
            </script>
<?php get_footer(); ?>






                  