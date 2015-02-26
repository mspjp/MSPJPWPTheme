<?php
// メインコンテンツの幅を指定
if ( ! isset( $content_width ) ) $content_width = 600;

// RSS2 の feed リンクを出力
add_theme_support( 'automatic-feed-links' );

// 自動挿入のpタグを消去
remove_filter('the_content', 'wpautop');

function custom_login_logo() {
    echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/img/noimage.jpg) contain no-repeat !important; }</style>';
}

add_action('login_head', 'custom_login_logo');

function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}

// カスタムメニューを有効化
add_theme_support( 'menus' );

// アイキャッチを有効化
add_theme_support( 'post-thumbnails');
set_post_thumbnail_size( 200, 200, true );

// Get the featured image URL
function get_thumbnail_url() { 
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); 
    echo $image_url[0]; 
}

// カスタムメニューの「場所」を設定
register_nav_menu( 'header-nav', 'ヘッダーのナビゲーション' );

// Info
function info_postype() {
    $labels = array(
        'name' => 'お知らせ',
        'singular_name' => 'お知らせ',
        'add_new' => '新規追加',
        'add_new_item' => '新規お知らせを追加',
        'edit_item' => 'お知らせを編集',
        'new_item' => '新規お知らせ',
        'view_item' => 'お知らせを表示',
        'search_items' => 'お知らせを検索',
        'not_found' =>  '投稿されたお知らせはありません',
        'not_found_in_trash' => 'ゴミ箱にお知らせはありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => 'page', //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'rewrite' => array('slug' => 'info'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
    );
    register_post_type( 'info', $args);

    $taxonomy = array(
        'label' => '年度',
        'labels' => array(
            'name' => '年度',
            'singular_name' => '年度',
            'search_items' => '年度を検索',
            'popular_items' => '人気の年度',
            'all_items' => 'すべての年度',
            'parent_item' => '親',
            'edit_item' => '年度の編集',
            'update_item' => '更新',
            'add_new_item' => '新規年度を追加',
            'new_item_name' => '新しい年度',
        ),
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true, //fales→通常投稿のタグのような扱いになります。
        'show_tagcloud' => true,
        'rewrite' => array( 'slug' => 'year' ),
    );
    register_taxonomy('year', 'info', $taxonomy );//('タクソノミー名', '所属する投稿タイプ', array);
}

add_action( 'init', 'info_postype' );

// Blog
function blog_postype() {
    $labels = array(
        'name' => '記事',
        'singular_name' => '記事',
        'add_new' => '新規追加',
        'add_new_item' => '新規記事を追加',
        'edit_item' => '記事を編集',
        'new_item' => '新規記事',
        'view_item' => '記事を表示',
        'search_items' => '記事を検索',
        'not_found' =>  '投稿された記事はありません',
        'not_found_in_trash' => 'ゴミ箱に記事はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => 'page', //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'rewrite' => array('slug' => 'blog'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
    );
    register_post_type( 'blog', $args);
}

add_action( 'init', 'blog_postype' );

// トップスライド
function topslide_postype() {
    $labels = array(
        'name' => 'トップスライド',
        'singular_name' => 'トップスライド',
        'add_new' => '新規追加',
        'add_new_item' => '新規スライドを追加',
        'edit_item' => 'トップスライドを編集',
        'new_item' => '新規トップスライド',
        'view_item' => 'トップスライドを表示',
        'search_items' => 'トップスライドを検索',
        'not_found' =>  '投稿されたトップスライドはありません',
        'not_found_in_trash' => 'ゴミ箱にトップスライドはありません。',
        'parent_item_colon' => '',
        'query_var' => 'false', // 専用のURLを用意しない
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => true, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => 'page', //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'rewrite' => array('slug' => 'topslide'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => false, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'author', 'excerpt') ,
    );
    register_post_type( 'topslide', $args);
}
add_action( 'init', 'topslide_postype' );

// profile
function profile_postype() {
    $labels = array(
        'name' => 'メンバー',
        'singular_name' => 'メンバー',
        'add_new' => '新規メンバーを追加',
        'add_new_item' => '新規メンバーを追加',
        'edit_item' => 'メンバーを編集',
        'new_item' => '新規メンバー',
        'view_item' => 'メンバーを表示',
        'search_items' => 'メンバーを検索',
        'not_found' =>  '投稿されたメンバーはいません。',
        'not_found_in_trash' => 'ゴミ箱にメンバー情報はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => 'post', //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'rewrite' => array('slug' => 'profile'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'editor') ,
    );
    register_post_type( 'profile', $args);
}

add_action( 'init', 'profile_postype' );

// profile
function project_postype() {
    $labels = array(
        'name' => 'プロジェクト',
        'singular_name' => 'プロジェクト',
        'add_new' => '新規プロジェクトを追加',
        'add_new_item' => '新規プロジェクトを追加',
        'edit_item' => 'プロジェクト情報を編集',
        'new_item' => '新規プロジェクト',
        'view_item' => 'プロジェクトを表示',
        'search_items' => 'プロジェクトを検索',
        'not_found' =>  '投稿されたプロジェクトはまだありません。',
        'not_found_in_trash' => 'ゴミ箱にプロジェクト情報はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => 'post', //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'rewrite' => array('slug' => 'project'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'editor','author') ,
    );
    register_post_type( 'project', $args);
}

add_action( 'init', 'project_postype' );


// サイドバーウィジットを有効化
register_sidebar( array(
    'name' => 'サイドバーウィジット下',
    'id' => 'sidebar-bottom',
    'description' => 'サイドバーのウィジットエリア(下)です。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
) );

// サイドバーウィジットを有効化
register_sidebar( array(
    'name' => 'トップサイドバーウィジット上',
    'id' => 'sidebar-top',
    'description' => 'サイドバーのウィジットエリア(上)です。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
) );

// Short Codes
function linkshortCode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'title' => "参考リンク",
    ), $atts ));

    return '<div class="link-container"><h4>' . $title . '</h4>' . $content . '</div>';
}

function columnshortCode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'title' => "",
    ), $atts ));

    return '<div class="column"><h4>' . $title . '</h4>' . $content . '</div>';
}

function codeshortCode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'description' => "",
    ), $atts ));

    return '<div class="code-container"><div class="code-body">' . $content . '</div><div class="code-description">' . $description . '</div></div>' ;
}

add_shortcode('links', 'linkshortCode');
add_shortcode('column', 'columnshortCode');
add_shortcode('codes', 'codeshortCode');

?>
