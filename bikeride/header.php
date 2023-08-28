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
            <?php $sticky_menu = ( get_theme_mod( 'set_sticky_menu', 0 ) )? 'sticky_header' : '' ; ?>
            <header class="header <?php echo $sticky_menu; ?>">
                <div class="mobile-menu-control">
                    <button id="menu-toggle" type="button">
                        <span></span>
                    </button>
                    <a href="" class="brand">
                        <?php if( has_custom_logo() ): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <span class="logo-text"><?php bloginfo( 'title' ); ?></span>
                        <?php endif; ?>
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