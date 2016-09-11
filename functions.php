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
add_action('init', 'unregister_post_posttype');

/* 管理画面の「記事」項目を消すための処理。これを入れるとpost.phpとブッキングしてエラーが起きる
function unregister_post_type( $post_type, $slug = '' ){
    global $wp_post_types;

    if ( isset( $wp_post_types[ $post_type ] ) ) {
        unset( $wp_post_types[ $post_type ] );

        
        //$slug = ( !$slug ) ? 'edit.php?post_type=' . $post_type : $slug;
        //remove_menu_page( $slug );
         
    }
}

function unregister_post_posttype()
{
   unregister_post_type('post');
   # remove_menu_page( 'edit.php' ); 
}
*/

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

function get_lastupdated_time($format) {
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

/*
if( !class_exists('Acf') )
    include_once('external/acf/acf.php' );

if( !class_exists('acf_repeater_plugin') )
    include_once('external/acf-repeater/acf-repeater.php');

if( !class_exists('acf_options_page_plugin') )
    include_once('external/acf-options-page/acf-options-page.php');

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_profile',
        'title' => 'Profile',
        'fields' => array (
            array (
                'key' => 'field_550662193b1c5',
                'label' => '所属チーム',
                'name' => 'team',
                'type' => 'post_object',
                'instructions' => '関連プロジェクトを指定します。',
                'required' => 1,
                'post_type' => array (
                    0 => 'project',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 1,
                'multiple' => 1,
            ),
            array (
                'key' => 'field_55066284a28c1',
                'label' => 'WordPressユーザー名',
                'name' => 'wordpress_username',
                'type' => 'user',
                'instructions' => 'WordPressでの投稿者を指定します。',
                'role' => array (
                    0 => 'all',
                ),
                'field_type' => 'select',
                'allow_null' => 1,
            ),
            array (
                'key' => 'field_550662a4a28c2',
                'label' => '関連する投稿',
                'name' => 'related_articles',
                'type' => 'post_object',
                'instructions' => '関わったイベントなどの開催レポートに関連付けてください。',
                'post_type' => array (
                    0 => 'blog',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 1,
            ),
            array (
                'key' => 'field_550662d4a28c3',
                'label' => '所属年度',
                'name' => 'year',
                'type' => 'taxonomy',
                'instructions' => '所属している(た)年度を選択してください。',
                'required' => 1,
                'taxonomy' => 'year',
                'field_type' => 'checkbox',
                'allow_null' => 0,
                'load_save_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'profile',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_topslider',
        'title' => 'TopSlider',
        'fields' => array (
            array (
                'key' => 'field_5506630dd04af',
                'label' => 'リンク先',
                'name' => 'link',
                'type' => 'page_link',
                'instructions' => 'クリックした時のリンク先を入力してください。',
                'required' => 1,
                'post_type' => array (
                    0 => 'all',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'topslide',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
 */

//---------------------------------------------カスタム投稿タイプ追加

//Info
function info_postype() {
	
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
        'capabilities' => array( 'assign_terms' => 'edit_post_infos' )
    );
    register_taxonomy('year', 'info', $taxonomy );//('タクソノミー名', '所属する投稿タイプ', array);

	/**
	* カスタム投稿タイプ info
	*/
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
        'capability_type' => array( 'info', 'infos' ), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap'    => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'info'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
    );
    register_post_type('info', $args);
    
    $capabilities = array(
    // 自分の投稿を編集する権限
    'edit_posts' => 'edit_infos',
    // 他のユーザーの投稿を編集する権限
    'edit_others_posts' => 'edit_others_infos',
    // 投稿を公開する権限
    'publish_posts' => 'publish_infos',
    // プライベート投稿を閲覧する権限
    'read_private_posts' => 'read_private_infos',
    // 自分の投稿を削除する権限
    'delete_posts' => 'delete_infos',
    // プライベート投稿を削除する権限
    'delete_private_posts' => 'delete_private_infos',
    // 公開済み投稿を削除する権限
    'delete_published_posts' => 'delete_published_infos',
    // 他のユーザーの投稿を削除する権限
    'delete_others_posts' => 'delete_others_infos',
    // プライベート投稿を編集する権限
    'edit_private_posts' => 'edit_private_infos',
    // 公開済みの投稿を編集する権限
    'edit_published_posts' => 'edit_published_infos',
	);
	 
	// 管理者に独自権限を付与
	$role = get_role( 'administrator' );
	foreach ( $capabilities as $cap ) {
	    $role->add_cap( $cap );
	}
}
add_action( 'init', 'info_postype', 0 );
 
 //Blog
function blog_postype() {

	/**
	* カスタム投稿タイプ Blog
	*/
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
        'capability_type' => array( 'blog', 'blogs' ), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap'    => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'blog'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'author', 'editor') ,
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
	$role = get_role( 'administrator' );
	foreach ( $capabilities as $cap ) {
	    $role->add_cap( $cap );
	}
}
add_action( 'init', 'blog_postype', 0 );

 //Profile
function profile_postype() {

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
        'capability_type' => array( 'profile', 'profiles' ), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap'    => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'profile'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'editor','author') ,
    );
    register_post_type( 'profile', $args);

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
	$role = get_role( 'administrator' );
	foreach ( $capabilities as $cap ) {
	    $role->add_cap( $cap );
	}
}
add_action( 'init', 'profile_postype', 0 );


 //Project
function project_postype() {

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
        'capability_type' => array( 'project', 'projects' ), //投稿タイプの閲覧／編集／削除権限をチェックするのに使用。初期値： "post"
        'map_meta_cap'    => true, //ユーザー権限付与関連
        'rewrite' => array('slug' => 'project'), //このフォーマットでパーマリンクをリライトする
        'hierarchical' => false, //この投稿タイプが階層(親の指定が許可されている)かどうか
        'menu_position' => 5,
        'has_archive' => true, // 一覧画面から見れるようにする
        'supports'=> array('title', 'thumbnail', 'editor','author') ,
    );
    register_post_type( 'project', $args);

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
	$role = get_role( 'administrator' );
	foreach ( $capabilities as $cap ) {
	    $role->add_cap( $cap );
	}
}
add_action( 'init', 'project_postype', 0 );


/**
* BlogInfoModeratorとProfProjModerator のログイン後のリダイレクト先を変更
*/
function my_login_redirect( $redirect_to, $request, $user ) {
	// is there a user to check?
	if( !empty( $user->roles ) ) {
		// check for admins
		if( in_array( "BlogModerator", $user->roles ) ) {
			// redirect them to the default place
			return home_url("/wp-admin/index.php");
		} elseif( in_array( "InfoModerator", $user->roles ) ) {
			// redirect them to the default place
			return home_url("/wp-admin/index.php");
		} elseif( in_array( "Member", $user->roles ) ) {
			// redirect them to the default place
			return home_url("/wp-admin/index.php");
		} else {
			return home_url("/wp-admin/");
		}
	}
}
add_filter("login_redirect", "my_login_redirect", 10, 3);



/**
* テーマ有効化時に特殊設定のユーザー権限をセット
* ProfProjModeratorとBlogInfoModerator(Editor+a)の追加
* 寄稿者にupload_filesとunfiltered_html、カスタム投稿の寄稿権限を追加
*/

function mytheme_setup_options () {

	//寄稿者に権限追加
	$role = get_role( 'contributor' );
	$role->add_cap( 'upload_files' );	
	$role->add_cap( 'unfiltered_html' );	
	$role->add_cap( 'edit_infos' );
	$role->add_cap( 'delete_infos' );	
	$role->add_cap( 'edit_blogs' );
	$role->add_cap( 'delete_blogs' );	
	$role->add_cap( 'edit_profiles' );
	$role->add_cap( 'delete_profiles' );
	$role->add_cap( 'edit_projects' );
	$role->add_cap( 'delete_projects' );

	$editor_role  = get_role( 'contributor' );

	//Member作成
	$new_cap_M   = $editor_role->capabilities;
	
	//寄稿者権限に追加
	$new_cap_M['edit_published_infos'] = false;
	$new_cap_M['edit_published_blogs'] = false;
	$new_cap_M['edit_published_profiles'] = true;
	$new_cap_M['edit_published_projects'] = true;
	
	$new_cap_M['moderate_comments'] = false;
	
	add_role( 'Member', 'Member', $new_cap_M );
	
	//BlogModerator作成
	$new_cap_B   = $editor_role->capabilities;
	
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
	
	$new_cap_B['moderate_comments'] = true;
	
	add_role( 'BlogModerator', 'BlogModerator', $new_cap_B );
	
	//InfoModerator作成
	$new_cap_I   = $editor_role->capabilities;
	
	//寄稿者権限に追加
	$new_cap_I['edit_others_infos'] = true;
	$new_cap_I['publish_infos'] = true;
	$new_cap_I['read_private_infos'] = true;
	$new_cap_I['delete_private_infos'] = true;
	$new_cap_I['delete_published_infos'] = true;
	$new_cap_I['delete_others_infos'] = true;
	$new_cap_I['edit_private_infos'] = true;
	$new_cap_I['edit_published_infos'] = true;
	$new_cap_I['edit_published_profiles'] = true;
	$new_cap_I['edit_published_projects'] = true;
	
	$new_cap_I['moderate_comments'] = true;
	
	add_role( 'InfoModerator', 'InfoModerator', $new_cap_I );
	

}
add_action('after_switch_theme', 'mytheme_setup_options');



/**
* テーマ無効化時に特殊設定のユーザー権限をリセット
*/
function mytheme_off_options () {
  remove_role( 'InfoModerator' );
  remove_role( 'BlogModerator' );
  remove_role( 'Member' );
  
  //寄稿者に追加した権限を削除
  $role = get_role( 'contributor' ); 
  $role->remove_cap( 'upload_files' );	
  $role->remove_cap( 'unfiltered_html' );
}
add_action('switch_theme', 'mytheme_off_options');

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
