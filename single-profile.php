<?php get_header(); ?>
<?php wp_link_pages(); ?>
<br>
        <div class="align-left">
            <a href="http://mspjp.net/メンバー">&laquo; メンバー一覧に戻る</a>
        </div>
            <div class="main__content">
                <!-- Report -->
                <div id="profile-<?php the_ID(); ?>" class="profilepage">
                    
                    <?php
                    if (have_posts()) : // WordPress ループ
                        while (have_posts()) : the_post(); // 繰り返し処理開始 
                    ?>
                    <h3 class="profilepage__namea">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_title(); ?>
                        </a>
                    </h3>
                    <div class="profilepage__image">
                        <img src="<?php if( has_post_thumbnail() ){echo get_thumbnail_full_url() ;}else{echo get_template_directory_uri()."/img/noimage.png";} ?>" class="2profilepage__icon" width="60%">
                    </div>
                    
                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">職種</span>
                        <?php
                            $field = get_field_object('department');
                            $value = get_field('department');
                            $label = $field['choices'][ $value ];
                            echo '<span class="profile-field-value">'.$label.'</span>';
                        ?>
                    </div>

                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">大学</span>
                        <?php
                            $value = get_field('university');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    </div>

                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">学部・学科・専門</span>
                        <?php
                            $value = get_field('major');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    </div>

                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">学年</span>
                        <?php
                            $value = get_field('grade');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    </div>

                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">キャッチコピー</span>
                        <?php
                            $value = get_field('catchcopy');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    </div>
                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">ニックネーム</span>
                        <?php
                            $value = get_field('nickname');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    <div>
                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">興味のあるテクノロジー</span>
                        <?php
                            $value = get_field('interest');
                            echo '<span class="profile-field-value">'.$value.'</span>';
                        ?>
                    </div>
                    <br />
                    <br />
                    <br />
                    <div class="profile-field-wrap">
                        <span class="profile-field-name">自己紹介</span>
                    </div>
                    <br />
                    <div class="profilepage__introduce">
                        <?php the_content(); ?>
                    </div>
                </div>
                
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
                <!--
                <div class="profile__list">
                    
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
                -->
            </div>
<?php get_footer(); ?>