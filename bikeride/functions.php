<?php

/**
 * Bikeride functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bikeride
 */


function bikeride_scripts(){

    wp_enqueue_style( 'bikeride-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

}
add_action( 'wp_enqueue_scripts', 'bikeride_scripts' );