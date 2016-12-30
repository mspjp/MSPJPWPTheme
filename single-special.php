<?php
include('htmlhead.php');
?>

<style>
    <?php
    echo get_field('custom_css');
    ?>
</style>

<?php
if (have_posts()) : // WordPress ループ
    while (have_posts()) :
        the_post(); // 繰り返し処理開始
        ?>

        <?php
    endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理
    ?>
    <div class="post">
        <h2>記事はありません</h2>
        <p>お探しの記事は見つかりませんでした。</p>
    </div>
    <?php
endif;
?>

</body>
</html>