<?php
include('htmlhead.php');
?>

<style>
    <?php
    echo get_field('custom_css');
    ?>
</style>

<?php
    $field =  get_field('custom_html');
    $field_unescape = htmlspecialchars_decode($field);
    echo $field_unescape;
?>

<?php
if (have_posts()) : // WordPress ループ
    while (have_posts()) :
        the_post(); // 繰り返し処理開始
        ?>

        <?php
    endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理
    include('no-article.php');
endif;
?>

</body>
</html>