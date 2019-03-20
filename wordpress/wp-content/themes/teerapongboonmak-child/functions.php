<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));

	// enqueue additional css
    wp_enqueue_style( 'bootstrap-style',get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'custom-style',get_stylesheet_directory_uri() . '/css/custom.css');
	// enqueue additional js
    wp_enqueue_script( 'jquery-slim', get_stylesheet_directory_uri() . '/js/jquery-3.3.1.slim.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'script-js', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
//
// Your code goes below
//