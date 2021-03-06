<?php
// メインコンテンツの幅を指定
if (!isset($content_width)) $content_width = 600;

// 自動挿入のpタグを消去
remove_filter('the_content', 'wpautop');


function get_mtime($format)
{
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

function get_lastupdated_time($format)
{
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return get_the_time($format);
    } else {
        return get_the_modified_time($format);
    }
}

// カスタムメニューを有効化
add_theme_support('menus');
// メニュー登録
register_nav_menu('main_menu', 'メインメニュー');
// アイキャッチを有効化
add_theme_support('post-thumbnails');
set_post_thumbnail_size(200, 200, true);

// Get the featured image URL
function get_thumbnail_url($has_post_thumbnail = false)
{
    if (has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
        return $image_url[0];
    } else {
        return get_template_directory_uri() . "/img/noimage.png";
    }
}

// Get the featured image URL
function get_thumbnail_full_url($has_post_thumbnail = false)
{
    if (has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id, 'full', true);
        return $image_url[0];
    } else {
        return get_template_directory_uri() . "/img/noimage.png";
    }
}

function get_twitter_url()
{
    return "http://twitter.com/_mspjp";
}

function get_facebook_url()
{
    return "https://www.facebook.com/mspjp";
}

function get_rss_url()
{
    return "http://mspjp.hatenablog.com/rss";
}

function get_github_url()
{
    return "https://github.com/mspjp";
}

function get_seminar_url()
{
    return "https://mspjp.connpass.com";
}

function get_imagine_url(){
    return "http://mspjp.hatenablog.com/archive/category/Imagine%20Cup";
}

function get_blog_url(){
    return "http://mspjp.hatenablog.com";
}

// カスタムメニューの「場所」を設定
register_nav_menu('header-nav', 'ヘッダーのナビゲーション');


//---------------------------------------------カスタム投稿タイプ追加
//capabilityについて参考 http://gatespace.jp/2012/05/24/custom-post-type-and-user-role-fix/

//specialPage
function special_postype()
{
    /**
     * カスタム投稿タイプ special
     */
    $labels = array(
        'name' => 'ランディングページ',
        'singular_name' => 'ランディングページ',
        'add_new' => '新規追加',
        'add_new_item' => '新規ランディングページを追加',
        'edit_item' => 'ランディングページを編集',
        'new_item' => '新規ランディングページ',
        'view_item' => 'ランディングページを表示',
        'search_items' => 'ランディングページを検索',
        'not_found' => '投稿されたランディングページはありません',
        'not_found_in_trash' => 'ゴミ箱にランディングページはありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => array('special', 'specials'), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap' => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'special'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports' => array('title', 'thumbnail', 'author', 'editor'),
    );
    register_post_type('special', $args);

    $capabilities = array(
        // 自分の投稿を編集する権限
        'edit_posts' => 'edit_specials',
        // 他のユーザーの投稿を編集する権限
        'edit_others_posts' => 'edit_others_specials',
        // 投稿を公開する権限
        'publish_posts' => 'publish_specials',
        // プライベート投稿を閲覧する権限
        'read_private_posts' => 'read_private_specials',
        // 自分の投稿を削除する権限
        'delete_posts' => 'delete_specials',
        // プライベート投稿を削除する権限
        'delete_private_posts' => 'delete_private_specials',
        // 公開済み投稿を削除する権限
        'delete_published_posts' => 'delete_published_specials',
        // 他のユーザーの投稿を削除する権限
        'delete_others_posts' => 'delete_others_specials',
        // プライベート投稿を編集する権限
        'edit_private_posts' => 'edit_private_specials',
        // 公開済みの投稿を編集する権限
        'edit_published_posts' => 'edit_published_specials',
    );

    // 管理者に独自権限を付与
    $role = get_role('administrator');
    foreach ($capabilities as $cap) {
        $role->add_cap($cap);
    }
}

add_action('init', 'special_postype', 0);

//Blog
function blog_postype()
{

    /**
     * カスタム投稿タイプ Blog
     */
    $labels = array(
        'name' => 'ブログ',
        'singular_name' => 'ブログ',
        'add_new' => '新規追加',
        'add_new_item' => '新規ブログを追加',
        'edit_item' => 'ブログを編集',
        'new_item' => '新規ブログ',
        'view_item' => 'ブログを表示',
        'search_items' => 'ブログを検索',
        'not_found' => '投稿されたブログはありません',
        'not_found_in_trash' => 'ゴミ箱にブログはありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => array('blog', 'blogs'), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap' => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'blog'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports' => array('title', 'thumbnail', 'author', 'editor'),
    );
    register_post_type('blog', $args);

    $capabilities = array(
        // 自分の投稿を編集する権限
        'edit_posts' => 'edit_blogs',
        // 他のユーザーの投稿を編集する権限
        'edit_others_posts' => 'edit_others_blogs',
        // 投稿を公開する権限
        'publish_posts' => 'publish_blogs',
        // プライベート投稿を閲覧する権限
        'read_private_posts' => 'read_private_blogs',
        // 自分の投稿を削除する権限
        'delete_posts' => 'delete_blogs',
        // プライベート投稿を削除する権限
        'delete_private_posts' => 'delete_private_blogs',
        // 公開済み投稿を削除する権限
        'delete_published_posts' => 'delete_published_blogs',
        // 他のユーザーの投稿を削除する権限
        'delete_others_posts' => 'delete_others_blogs',
        // プライベート投稿を編集する権限
        'edit_private_posts' => 'edit_private_blogs',
        // 公開済みの投稿を編集する権限
        'edit_published_posts' => 'edit_published_blogs',
    );

    // 管理者に独自権限を付与
    $role = get_role('administrator');
    foreach ($capabilities as $cap) {
        $role->add_cap($cap);
    }
}

add_action('init', 'blog_postype', 0);


//Profile
function profile_postype()
{

    /**
     * カスタム投稿タイプ Profile
     */
    $labels = array(
        'name' => 'メンバー',
        'singular_name' => 'メンバー',
        'add_new' => '新規メンバーを追加',
        'add_new_item' => '新規メンバーを追加',
        'edit_item' => 'メンバーを編集',
        'new_item' => '新規メンバー',
        'view_item' => 'メンバーを表示',
        'search_items' => 'メンバーを検索',
        'not_found' => '投稿されたメンバーはいません。',
        'not_found_in_trash' => 'ゴミ箱にメンバー情報はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => array('profile', 'profiles'), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap' => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'profile'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports' => array('title', 'thumbnail', 'editor', 'author'),
    );
    register_post_type('profile', $args);

    $capabilities = array(
        // 自分の投稿を編集する権限
        'edit_posts' => 'edit_profiles',
        // 他のユーザーの投稿を編集する権限
        'edit_others_posts' => 'edit_others_profiles',
        // 投稿を公開する権限
        'publish_posts' => 'publish_profiles',
        // プライベート投稿を閲覧する権限
        'read_private_posts' => 'read_private_profiles',
        // 自分の投稿を削除する権限
        'delete_posts' => 'delete_profiles',
        // プライベート投稿を削除する権限
        'delete_private_posts' => 'delete_private_profiles',
        // 公開済み投稿を削除する権限
        'delete_published_posts' => 'delete_published_profiles',
        // 他のユーザーの投稿を削除する権限
        'delete_others_posts' => 'delete_others_profiles',
        // プライベート投稿を編集する権限
        'edit_private_posts' => 'edit_private_profiles',
        // 公開済みの投稿を編集する権限
        'edit_published_posts' => 'edit_published_profiles',
    );

    // 管理者に独自権限を付与
    $role = get_role('administrator');
    foreach ($capabilities as $cap) {
        $role->add_cap($cap);
    }
}

add_action('init', 'profile_postype', 0);


//Project
function project_postype()
{

    /**
     * カスタム投稿タイプ Project
     */
    $labels = array(
        'name' => 'プロジェクト',
        'singular_name' => 'プロジェクト',
        'add_new' => '新規プロジェクトを追加',
        'add_new_item' => '新規プロジェクトを追加',
        'edit_item' => 'プロジェクト情報を編集',
        'new_item' => '新規プロジェクト',
        'view_item' => 'プロジェクトを表示',
        'search_items' => 'プロジェクトを検索',
        'not_found' => '投稿されたプロジェクトはまだありません。',
        'not_found_in_trash' => 'ゴミ箱にプロジェクト情報はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => array('project', 'projects'), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap' => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'project'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports' => array('title', 'thumbnail', 'editor', 'author'),
    );
    register_post_type('project', $args);

    $capabilities = array(
        // 自分の投稿を編集する権限
        'edit_posts' => 'edit_projects',
        // 他のユーザーの投稿を編集する権限
        'edit_others_posts' => 'edit_others_projects',
        // 投稿を公開する権限
        'publish_posts' => 'publish_projects',
        // プライベート投稿を閲覧する権限
        'read_private_posts' => 'read_private_projects',
        // 自分の投稿を削除する権限
        'delete_posts' => 'delete_projects',
        // プライベート投稿を削除する権限
        'delete_private_posts' => 'delete_private_projects',
        // 公開済み投稿を削除する権限
        'delete_published_posts' => 'delete_published_projects',
        // 他のユーザーの投稿を削除する権限
        'delete_others_posts' => 'delete_others_projects',
        // プライベート投稿を編集する権限
        'edit_private_posts' => 'edit_private_projects',
        // 公開済みの投稿を編集する権限
        'edit_published_posts' => 'edit_published_projects',
    );

    // 管理者に独自権限を付与
    $role = get_role('administrator');
    foreach ($capabilities as $cap) {
        $role->add_cap($cap);
    }
}

add_action('init', 'project_postype', 0);

//Article
function article_postype()
{

    $taxonomy = array(
        'label' => 'テクノロジー',
        'labels' => array(
            'name' => 'テクノロジー',
            'singular_name' => 'テクノロジー',
            'search_items' => 'テクノロジーを検索',
            'popular_items' => '人気のテクノロジー',
            'all_items' => 'すべてのテクノロジー',
            'parent_item' => '親テクノロジー',
            'edit_item' => 'テクノロジーの編集',
            'update_item' => '更新',
            'add_new_item' => '新規テクノロジーを追加',
            'new_item_name' => '新しいテクノロジー',
        ),
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true, //fales→通常投稿のタグのような扱いになります。
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'tech'),
        'capabilities' => array('assign_terms' => 'edit_articles')
    );
    register_taxonomy('tech', 'article', $taxonomy);//('タクソノミー名', '所属する投稿タイプ', array);

    /**
     * カスタム投稿タイプ 技術記事
     */
    $labels = array(
        'name' => '技術記事',
        'singular_name' => '技術記事',
        'add_new' => '新規追加',
        'add_new_item' => '新規技術記事を追加',
        'edit_item' => '技術記事を編集',
        'new_item' => '新規技術記事',
        'view_item' => '技術記事を表示',
        'search_items' => '技術記事を検索',
        'not_found' => '投稿された技術記事はありません',
        'not_found_in_trash' => 'ゴミ箱に技術記事はありません。',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true, //フロントエンドで post_type クエリが実行可能かどうか
        'show_ui' => true, //この投稿タイプを管理するデフォルト UI を生成するかどうか
        'exclude_from_search' => false, //この投稿タイプを検索結果から除外するかどうか
        'capability_type' => array('article', 'articles'), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap' => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'article'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => true, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports' => array('title', 'thumbnail', 'author', 'editor'),
    );
    register_post_type('article', $args);


    $capabilities = array(
        // 自分の投稿を編集する権限
        'edit_posts' => 'edit_articles',
        // 他のユーザーの投稿を編集する権限
        'edit_others_posts' => 'edit_others_articles',
        // 投稿を公開する権限
        'publish_posts' => 'publish_articles',
        // プライベート投稿を閲覧する権限
        'read_private_posts' => 'read_private_articles',
        // 自分の投稿を削除する権限
        'delete_posts' => 'delete_articles',
        // プライベート投稿を削除する権限
        'delete_private_posts' => 'delete_private_articles',
        // 公開済み投稿を削除する権限
        'delete_published_posts' => 'delete_published_articles',
        // 他のユーザーの投稿を削除する権限
        'delete_others_posts' => 'delete_others_articles',
        // プライベート投稿を編集する権限
        'edit_private_posts' => 'edit_private_articles',
        // 公開済みの投稿を編集する権限
        'edit_published_posts' => 'edit_published_articles',
    );

    // 管理者に独自権限を付与
    $role = get_role('administrator');
    foreach ($capabilities as $cap) {
        $role->add_cap($cap);
    }

}

add_action('init', 'article_postype', 0);


/**
 * テーマ有効化時に特殊設定のユーザー権限をセット(※ テーマを有効化しないと権限が反映されないので注意)
 * ProfProjModeratorとBlogInfoModerator(Editor+a)の追加
 * 寄稿者にupload_filesとunfiltered_html、カスタム投稿の寄稿権限を追加
 */

function mytheme_setup_options()
{

    //寄稿者に権限追加
    $role = get_role('contributor');
    $role->add_cap('upload_files');
    $role->add_cap('unfiltered_html');
    $role->add_cap('edit_infos');
    $role->add_cap('delete_infos');
    $role->add_cap('edit_blogs');
    $role->add_cap('delete_blogs');
    $role->add_cap('edit_profiles');
    $role->add_cap('delete_profiles');
    $role->add_cap('edit_projects');
    $role->add_cap('delete_projects');
    $role->add_cap('edit_articles');
    $role->add_cap('delete_articles');

    $editor_role = get_role('contributor');

    //Member作成
    $new_cap_M = $editor_role->capabilities;

    //寄稿者権限に追加
    $new_cap_M['edit_published_specials'] = false;
    $new_cap_M['edit_published_blogs'] = false;
    $new_cap_M['edit_published_profiles'] = true;
    $new_cap_M['edit_published_projects'] = true;
    $new_cap_M['edit_published_articles'] = true;

    $new_cap_M['moderate_comments'] = false;

    add_role('Writer', 'Writer', $new_cap_M);

    //BlogModerator作成
    $new_cap_B = $editor_role->capabilities;

    //寄稿者権限に追加
    $new_cap_B['edit_others_blogs'] = true;
    $new_cap_B['publish_blogs'] = true;
    $new_cap_B['read_private_blogs'] = true;
    $new_cap_B['delete_private_blogs'] = true;
    $new_cap_B['delete_published_blogs'] = true;
    $new_cap_B['delete_others_blogs'] = true;
    $new_cap_B['edit_private_blogs'] = true;
    $new_cap_B['edit_published_blogs'] = true;

    $new_cap_B['edit_published_profiles'] = true;
    $new_cap_B['edit_published_projects'] = true;

    $new_cap_B['edit_others_articles'] = true;
    $new_cap_B['publish_articles'] = true;
    $new_cap_B['read_private_articles'] = true;
    $new_cap_B['delete_private_articles'] = true;
    $new_cap_B['delete_published_articles'] = true;
    $new_cap_B['delete_others_articles'] = true;
    $new_cap_B['edit_private_articles'] = true;
    $new_cap_B['edit_published_articles'] = true;

    $new_cap_B['edit_others_specials'] = true;
    $new_cap_B['publish_specials'] = true;
    $new_cap_B['read_private_specials'] = true;
    $new_cap_B['delete_private_specials'] = true;
    $new_cap_B['delete_published_specials'] = true;
    $new_cap_B['delete_others_specials'] = true;
    $new_cap_B['edit_private_specials'] = true;
    $new_cap_B['edit_published_specials'] = true;
    $new_cap_B['edit_published_specials'] = true;
    $new_cap_B['edit_published_specials'] = true;

    $new_cap_B['moderate_comments'] = true;

    add_role('Reviewer', 'Reviewer', $new_cap_B);
}

add_action('after_switch_theme', 'mytheme_setup_options');


/**
 * テーマ無効化時に特殊設定のユーザー権限をリセット
 */
function mytheme_off_options()
{
    remove_role('Reviewer');
    remove_role('Writer');

    //寄稿者に追加した権限を削除
    $role = get_role('contributor');
    $role->remove_cap('upload_files');
    $role->remove_cap('unfiltered_html');
}

add_action('switch_theme', 'mytheme_off_options');


// サイドバーウィジットを有効化
register_sidebar(array(
    'name' => 'メインウィジェット',
    'id' => 'main-widget',
    'description' => 'メインウィジェットです',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

function mysite_feed_request($vars)
{
    if (isset($vars['feed']) && !isset($vars['post_type'])) {
        $vars['post_type'] = array(
            'post',
            'blog',
            'article'
        );
    }
    return $vars;
}

add_filter('request', 'mysite_feed_request');

class Recent_Widget extends WP_Widget
{
    /**
     * Widgetを登録する
     */
    function __construct()
    {
        parent::__construct(
            'recent_widget', // Base ID
            '最近の投稿', // Name
            array('description' => '最近のカスタム投稿を表示します',) // Args
        );
    }

    /**
     * 表側の Widget を出力する
     *
     * @param array $args 'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
     * @param array $instance Widgetの設定項目
     */
    public function widget($args, $instance)
    {
        $title = $instance['title'];
        $custom_id = $instance['custom_id'];
        echo $args['before_widget'];

        if($title != '') {
            echo '<h2>' . $title . '</h2>';
        }
        $myQuery = new WP_Query();
        $param = array(
            'paged' => 0,
            'posts_per_page' => '5',
            'post_type' => array($custom_id),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'offset' => '0'
        );
        $myQuery->query($param);
        if ($myQuery->have_posts()) :
            while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                <a class="a-widget-recent" href="<?php the_permalink(); ?>">
                    <div>
                    <img src="<?php echo get_thumbnail_url(has_post_thumbnail()) ?>" alt="">
                    </div>
                    <span><?php echo mb_substr(get_the_title(),0,35).'...' ?></span>

                </a>

                <?php
            endwhile; // 繰り返し処理終了
        else : // ここから記事が見つからなかった場合の処理
        endif;

        echo $args['after_widget'];
    }

    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form($instance)
    {
        $title = $instance['title'];
        $title_name = $this->get_field_name('title');
        $title_id = $this->get_field_id('title');
        ?>
        <p>
            <label for="<?php echo $title_id; ?>">ウィジェットタイトル:</label>
            <input class="widefat" id="<?php echo $title_id; ?>" name="<?php echo $title_name; ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
        $custom = $instance['custom_id'];
        $custom_name = $this->get_field_name('custom_id');
        $custom_id = $this->get_field_id('custom_id');
        ?>
        <p>
            <label for="<?php echo $custom_id; ?>">カスタム投稿のID:</label>
            <input class="widefat" id="<?php echo $custom_id; ?>" name="<?php echo $custom_name; ?>" type="text"
                   value="<?php echo esc_attr($custom); ?>">
        </p>
        <?php
    }

    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance form()から入力された新しい設定データ
     * @param array $old_instance 前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}

add_action('widgets_init', function () {
    register_widget('Recent_Widget');  //WidgetをWordPressに登録する
    register_sidebar(array(  //「サイドバー」を登録する
        'name' => 'サイドバー(上部)',
        'id' => 'recent_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
});

