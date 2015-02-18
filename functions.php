<?php
// メインコンテンツの幅を指定
if ( ! isset( $content_width ) ) $content_width = 600;

// RSS2 の feed リンクを出力
add_theme_support( 'automatic-feed-links' );

// 自動挿入のpタグを消去
remove_filter('the_content', 'wpautop');

function custom_login_logo() {
		echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/noimage.jpg) contain no-repeat !important; }</style>';
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
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );

/*
function stick_admin_bar_to_bottom_css() {
	   echo "
	   <style type='text/css'>
	   	html {
	   		margin-top: -28px !important;
	   		padding-top: 28px !important;
		}
	   </style>
	   ";
}
add_action('wp_before_admin_bar_render', 'stick_admin_bar_to_bottom_css');
*/

// add
function article_postype() {
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
				'rewrite' => array('slug' => 'articles'), //このフォーマットでパーマリンクをリライトする
				'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
				'menu_position' => 5,
				'has_archive' => true, // 一覧画面から見れるようにする
				'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
		);
		register_post_type( 'article', $args);
}

add_action( 'init', 'article_postype' );

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
				'rewrite' => array('slug' => 'articles'), //このフォーマットでパーマリンクをリライトする
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
				'rewrite' => array('slug' => 'articles'), //このフォーマットでパーマリンクをリライトする
				'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
				'menu_position' => 5,
				'has_archive' => true, // 一覧画面から見れるようにする
				'supports'=> array('title', 'thumbnail', 'editor') ,
		);
		register_post_type( 'project', $args);
}

add_action( 'init', 'project_postype' );

// トピック
function topic_postype() {
		$labels = array(
				'name' => 'トピック',
				'singular_name' => 'トピック',
				'add_new' => '新規追加',
				'add_new_item' => '新規トピックを追加',
				'edit_item' => 'トピックを編集',
				'new_item' => '新規トピック',
				'view_item' => 'トピックを表示',
				'search_items' => 'トピックを検索',
				'not_found' =>  '投稿されたトピックはありません',
				'not_found_in_trash' => 'ゴミ箱にトピックはありません。',
				'parent_item_colon' => '',
		);
		$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
				'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
				'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
				'capability_type' => 'page',
				'rewrite' => array('slug' => 'topics'), //このフォーマットでパーマリンクをリライトする
				'hierarchical' => true, //この投稿タイプが階層(親の指定が許可されている)かどうか
				'menu_position' => 5,
				'has_archive' => true, // 一覧画面から見れるようにする
				'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
		);

		register_post_type( 'topic', $args);
		$taxonomy = array(
				'label' => '関連する技術',
				'labels' => array(
						'name' => '関連技術',
						'singular_name' => '関連技術',
						'search_items' => '関連技術を検索',
						'popular_items' => 'よく使われている技術',
						'all_items' => 'すべての関連技術',
						'parent_item' => '親技術',
						'edit_item' => '関連技術の編集',
						'update_item' => '更新',
						'add_new_item' => '新規関連技術を追加',
						'new_item_name' => '新しい関連技術',
				),
				'public' => true,
				'show_ui' => true,
				'hierarchical' => true, //fales→通常投稿のタグのような扱いになります。
				'show_tagcloud' => true,
				'rewrite' => array( 'slug' => 'technology' ),
		);
		register_taxonomy('technology', 'topic', $taxonomy );//('タクソノミー名', '所属する投稿タイプ', array);
}

add_action( 'init', 'topic_postype' );

// サイドバーウィジットを有効化
register_sidebar( array(
	'name' => 'サイドバーウィジット-1',
	'id' => 'sidebar-1',
	'description' => 'サイドバーのウィジットエリアです。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );

// サイドバーウィジットを有効化
register_sidebar( array(
	'name' => 'トップサイドバーウィジット',
	'id' => 'sidebar-top',
	'description' => 'サイドバーのウィジットエリアです。',
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
