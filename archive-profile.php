<?php get_header();
$post_type = $wp_query->get_queried_object();
?>
            <div class="headline">
                <h2 class="headline__title"><?php post_type_archive_title(); ?></h2>
                <div class="headline__snsbtns">
                    
                </div>
            </div>

            <!-- Main Content -->
            <ul class="profile_list">
                <?php
                query_posts( $query_string . "&posts_per_page=-1");
                if (have_posts()) : // WordPress ループ
                    while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                <li id="post-<?php the_ID(); ?>">
                    <a class="profile" href="<?php the_permalink(); ?>">
                        <img class="profile__icon" src="<?php if( has_post_thumbnail() ){echo get_thumbnail_url();}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" alt="">
                        <span class="profile__name"><?php echo mb_substr(get_the_title(), 0, 30); ?></span>
                        <?php
                        $field_depart = get_field_object('department');
                        $value_depart = get_field('department');
                        $label = $field_depart['choices'][ $value_depart ];
                        echo '<span class="profile-field-value">'.$label.'</span>';
                        $catch = get_field('catchcopy');
                        echo '<span class="profile-field-value">'.$catch.'</span>';
                        
                        ?>
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
<?php get_footer(); ?>
