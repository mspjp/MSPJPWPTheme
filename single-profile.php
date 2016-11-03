<?php get_header(); ?>
<?php wp_link_pages(); ?>
<br>
        <div class="align-left"><a href="http://mspjp.net/メンバー">&laquo; メンバー一覧に戻る</a></div>
            <div class="main__content">
                <!-- Report -->
                <div id="profile-<?php the_ID(); ?>" class="profilepage">
                    <?php
                    if (have_posts()) : // WordPress ループ
                        while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                    <h3 class="profilepage__namea"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    <div class="profilepage__image">
                        <img src="<?php if( has_post_thumbnail() ){echo get_thumbnail_full_url() ;}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" class="2profilepage__icon" width="100%">
                    </div>
                    <?php
                        $fields = get_field("department");
                        if($fields){
                            foreach($fields as $field)
	                        {
		                        echo '<p>hoge ->' . $field . '</p>';
	                        }
                        }
                        
                    ?>
                    <?php if(get_field( "department" )): ?>

                        <p class="profilepage__yeara"><span style="border-radius:5px;background-color:#7cbb00;padding:5px;margin-top:6px;margin-bottom:6px;">職種</span>
                            <?php 
                                $fields = get_field("department");
                                var_dump($fields);
                                foreach($fields as $field): 
                            ?>
                                    <a href="<?php echo get_term_link($field); ?>"><?php echo $field ?></a>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>


                    <br />
                    <span style="border-radius:5px;background-color:#ffbb00;padding:5px;margin-top:6px;margin-bottom:6px;">自己紹介</span>
                    <br />
                    <div class="profilepage__introduce">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <?php
                $args = array(
                    'before' => '<div class="page-link">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                );
                wp_link_pages($args); ?>

                <!-- post navigation -->
                <div class="navigation">
                    <?php
                    if( get_previous_post() ): ?>
                    <div class="align-left"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
                    <?php
                    endif;
                    if( get_next_post() ): ?>
                    <div class="align-right"><?php next_post_link('%link', '%title &raquo;'); ?></div>
                    <?php
                        endif;
                    ?>
                </div>
                <!-- /post navigation -->
                <?php comments_template(); // コメント欄の表示 ?>
                <?php
                endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
                <?php
                endif;
                ?>
            </div>
            <div class="main__sidebar">
                <div class="profile__list">
                    <!-- <h3>プロジェクト</h3> -->
                    <div class="profile__listbody">
                        <ul>
                        <?php $args = array(
                            'numberposts' => 40, //表示する記事の数
                            'post_type' => 'profile' //投稿タイプ名
                            // 条件を追加する場合はここに追記
                        );
                        $customPosts = get_posts($args);
                        if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
                        ?>
                          <p style="line-height:1.5em"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                          <?php endforeach; ?>
                          <?php else : //記事が無い場合 ?>
                          <p>Sorry, no posts matched your criteria.</p>
                        <?php endif;
                        wp_reset_postdata(); //クエリのリセット ?>
                        </ul>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>