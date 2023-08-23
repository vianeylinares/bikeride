<?php
/**
 * The header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bikeride
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div class="main-wrapper">
            <header class="header sticky_header">
                <div class="mobile-menu-control">
                    <button id="menu-toggle" type="button">
                        <span></span>
                    </button>
                    <a href="" class="brand">
                        <img src="" alt="" class="logo-image" style="display: none;" alt="">
                        <span class="logo-text">The Bike Ride</span>
                    </a>
                </div>
                <nav class="nav-menu">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'bikeride_main_menu',
                                'depth'             => 5,
                                'container'         => 'ul',
                                'container_class'   => '',
                                'container_id'      => '',
                                'menu_class'        => 'nav',
                                'add_li_class'      => 'nav-item'
                            )
                        );
                    ?>
                </nav>
                <div class="shop-items">
                    Store items
                </div>
            </header>
            <main class="main-content">