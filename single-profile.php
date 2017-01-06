<?php get_header(); ?>
<?php wp_link_pages(); ?>
    <div class="container-fluid">

<?php
if (have_posts()) : // WordPress ループ
    while (have_posts()) :
        the_post(); // 繰り返し処理開始
        ?>
        <div class="row div-singleprofile-row">
            <!-- Report -->
            <div class="div-singleprofile-back"
                 style="background-image: url(<?php echo get_thumbnail_full_url(has_post_thumbnail()) ?>)">

            </div>
            <div id="profile-<?php the_ID(); ?>" class="div-singleprofile-content">
                <div class="col-sm-5 div-singleprofile-thumbnail">

                    <div class="div-singleprofile-icon"
                         style="background-image: url(<?php echo get_thumbnail_full_url(has_post_thumbnail()) ?>)">
                    </div>
                    <p class="p-singleprofile-name">
                        <?php echo get_the_title(); ?>
                    </p>
                    <?php
                    $value = get_field('catchcopy');
                    echo '<p>' . $value . '</p>';
                    ?>

                </div>
                <div class="col-sm-7">
                    <div class="div-singleprofile-field-wrap">
                        <p class="p-singleprofile-field">
                            <span class="profile-field-name"><i class="fa fa-briefcase"
                                                                aria-hidden="true"></i> 職種</span>
                            <?php
                            $field = get_field_object('department');
                            $value = get_field('department');
                            $label = $field['choices'][$value];
                            echo '<span class="span-singleprofile-field-value">' . $label . '</span>';
                            ?>
                        </p>
                        <p class="p-singleprofile-field">
                        <span class="profile-field-name"><i class="fa fa-graduation-cap"
                                                            aria-hidden="true"></i>大学</span>
                            <?php
                            $value = get_field('university');
                            echo '<span class="span-singleprofile-field-value">' . $value . '</span>';
                            ?>
                        </p>
                        <p class="p-singleprofile-field">
                            <span class="profile-field-name"><i class="fa fa-star" aria-hidden="true"></i> 専門</span>
                            <?php
                            $value = get_field('major');
                            echo '<span class="span-singleprofile-field-value">' . $value . '</span>';
                            ?>
                            <?php
                            $value = get_field('grade');
                            echo '<span class="span-singleprofile-field-grade">' . $value . '</span>';
                            ?>
                        </p>
                        <p class="p-singleprofile-field">
                            <span class="profile-field-name"><i class="fa fa-tag" aria-hidden="true"></i> ニックネーム</span>
                            <?php
                            $value = get_field('nickname');
                            echo '<span class="span-singleprofile-field-value span-singleprofile-field-nick">' . $value . '</span>';
                            ?>
                        </p>
                        <p class="p-singleprofile-field">
                            <span class="profile-field-name"><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i> 興味</span>
                            <?php
                            $value = get_field('interest');
                            echo '<span class="span-singleprofile-field-value">' . $value . '</span>';
                            ?>
                        </p>
                    </div>
                </div>


            </div>


        </div>

        </div>
        <div class="container">
        <div class="row">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理
    include('no-article.php');
endif;
?>
    <p>
        <a href="/profile">&laquo; メンバー一覧に戻る</a>
    </p>
    </div>
<?php get_footer(); ?>