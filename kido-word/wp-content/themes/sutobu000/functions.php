<?php
register_sidebar( array(
'name' => 'サイドバーウィジット-1',
'id' => 'sidebar-1',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
) );

add_theme_support( 'automatic-feed-links' );

function load_jquery(){
    wp_enqueue_script('jquery');
	wp_enqueue_script( 'script',  get_template_directory_uri() . '/js/script.js', array(jquery));
}
add_action('init', 'load_jquery');

function resets() {
    wp_enqueue_style('reset',  get_template_directory_uri() . '/css/reset.css', array(), null, 'all');
}
add_action( 'wp_enqueue_scripts', 'resets');
