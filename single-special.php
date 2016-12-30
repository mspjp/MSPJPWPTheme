<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
        <?php
        echo get_field('custom_css');
        ?>
    </style>
</head>
<body>
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