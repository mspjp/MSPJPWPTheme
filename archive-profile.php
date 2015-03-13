<?php get_header();
$post_type = $wp_query->get_queried_object();
?>
            <div class="headline">
                <h2 class="headline_title"><?php post_type_archive_title(); ?></h2>
                <div class="headline__snsbtns">
                    <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_post_type_archive_link(), $post_type->labels->name );}?>
                </div>
            </div>

            <!-- Main Content -->
            <ul class="profile_list">
                <?php
                query_posts( $query_string . "&posts_per_page=5&paged=".$paged );
                if (have_posts()) : // WordPress ループ
                    while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <li id="post-<?php the_ID(); ?>">
                    <a class="profile" href="<?php the_permalink(); ?>">
                        <img class="profile__icon" src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" alt="">
                        <h3 class="profile__name"><?php echo mb_substr(get_the_title(), 0, 30); ?></h3>
                        <p class="profile__text"><?php echo mb_substr(strip_tags($post-> post_content), 0, 20)."..."; ?></p>
                    </a>
                </li>
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
            </div>
            <!-- /Main Content -->
            <?php
            if ( $wp_query -> max_num_pages > 1 ) : ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
                <div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
            </div>
            <?php 
            endif;
            ?>
<?php get_footer(); ?>
