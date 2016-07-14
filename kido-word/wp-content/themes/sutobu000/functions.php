<?php

function my_styles() {
    wp_enqueue_style( 'reset', get_bloginfo( 'stylesheet_directory') . '/css/reset.css', array(), null, 'all');
}
add_action( 'wp_enqueue_scripts', 'my_styles');

function my_scripts() {
    wp_enqueue_script( 'script', get_bloginfo( 'stylesheet_directory') . '/js/script.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts');