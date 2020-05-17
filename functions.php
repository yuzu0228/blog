<?php
function theme_setup() {
    register_nav_menus(
        [
            'menu-1' => 'メイン',
            'menu-2' => 'フッター'
        ]
        );

    add_theme_support( 'editor-styles' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    
}
add_action('after_setup_theme', 'theme_setup');

function my_excerpt_more( $more ) {
    return '...';
  }
  add_filter( 'excerpt_more', 'my_excerpt_more' );

  function my_widgets_init() {
	register_sidebar(
		[
			'name'          => 'サイドメニュー',
			'id'            => 'sidemenu',
			'description'   => 'サイドメニューにウィジェット表示',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action( 'widgets_init', 'my_widgets_init' );

add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y-m-d');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

function twpp_change_excerpt_length( $length ) {
	$length = 70;

	if(is_single()) {
		$length = 30;
	}
	return $length;
  }
  add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );