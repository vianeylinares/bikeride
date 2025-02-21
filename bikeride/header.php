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
            <?php
                $menu_options = ( get_post_meta( $post->ID, 'content_behind_menu', true ) )? 'header-over-content' : '' ;
                $menu_options .= ( get_theme_mod( 'set_sticky_menu', 0 ) )? ' sticky-header' : '' ;
                $menu_options .= ( get_post_meta( $post->ID, 'white_logo', true ) )? ' white-logo-and-header-text' : '' ;
            ?>
            <header id="header" class="header <?php echo $menu_options; ?>">
                <div class="mobile-menu-control">
                    <button id="menu-toggle" type="button">
                        <span></span>
                    </button>
                    <a href="<?php echo home_url(); ?>" class="brand">
                        <?php if( !empty( get_theme_mod( 'set_logo_black' ) ) || !empty( get_theme_mod( 'set_logo_white' ) ) ):
                            $white_logo = ( get_post_meta( $post->ID, 'white_logo', true ) ) ? esc_html( get_post_meta( $post->ID, 'white_logo', true ) ) : 0 ;
                            $white_logo_checked = ( $white_logo != 0 ) ? 'checked' : '';
                            $logo = ( $white_logo !=0 )? "white" : "black" ;
                            ?>
                            <img src="<?php echo wp_get_attachment_url( get_theme_mod( 'set_logo_' . $logo ) ); ?>" alt="logo" />
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
                    <?php 
                        if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                            echo do_shortcode( '[bikeride_mini_cart]' );
                        }
                    ?>
                </div>
            </header>
            <main class="main-content">