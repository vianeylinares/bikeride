<?php

/**
 * Bikeride functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bikeride
 */


function bikeride_scripts(){

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Pacifico&display=swap', array(), null );
    wp_enqueue_style( 'bikeride-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

    wp_enqueue_script( 'bikeride-scripts', get_template_directory_uri() . '/custom.js' , array(), '', true  );

}
add_action( 'wp_enqueue_scripts', 'bikeride_scripts' );


if( ! function_exists( 'wp_body_open' ) ){

    function wp_body_open(){
        do_action( 'wp_body_open' );
    }

}


function bikeride_config(){

    register_nav_menus(
        array(
            'bikeride_main_menu'    => 'Bikeride Main Menu',
        )
    );

    add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'bikeride_config', 0 );


function bikeride_menu_add_class_on_li($classes, $item, $args) {

    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;

}
add_filter('nav_menu_css_class', 'bikeride_menu_add_class_on_li', 1, 3);