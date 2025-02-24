<?php

/**
 * Bikeride functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bikeride
 */


 /**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Elementor additions.
 */
require_once get_template_directory() . '/elementor/register.php';


function bikeride_scripts(){

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome.css', 'all' );
    //wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Pacifico&display=swap', array(), null );
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

    $textdomain = 'bikeride';
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

    add_theme_support( 'title-tag' );

    /*add_theme_support( 'custom-logo', array(
            'height'        => 50,
            'width'         => 200,
            'flex-height'   => true,
            'flex-width'    => true
        )
    );*/

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'bikeride_config', 0 );


function bikeride_menu_add_class_on_li( $classes, $item, $args ) {

    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;

}
add_filter( 'nav_menu_css_class', 'bikeride_menu_add_class_on_li', 1, 3 );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */

function bikeride_sidebars(){
	register_sidebar( array(
		'name'			=> esc_html__( 'Bike Ride Blog Sidebar', 'bikeride' ),
		'id'			=> 'bikeride-sidebar-1',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'bikeride' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}
add_action( 'widgets_init', 'bikeride_sidebars' );


function bikeride_logo_class(){

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image_array = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $html = '<img src="' . $image_array[0] . '" class="logo-image">';

    return $html;

}
//add_filter( 'get_custom_logo', 'bikeride_logo_class' );


function bikeride_page_settings_metabox(){

    add_meta_box(
        'bikeride_page_settings_metabox',
        'Bikeride page settings',
        'bikeride_page_settings_callback',
        'page'
    );

}
add_action( 'add_meta_boxes', 'bikeride_page_settings_metabox' );


function bikeride_page_settings_callback( $post ){

    wp_nonce_field( basename(__FILE__), 'Bikeride_page_settings_nonce' );

    $disable_title = ( get_post_meta( $post->ID, 'disable_title', true ) ) ? esc_html( get_post_meta( $post->ID, 'disable_title', true ) ) : 0 ;
    $disable_title_is_checked = ( $disable_title != 0 ) ? 'checked' : '';
    $content_behind_menu = ( get_post_meta( $post->ID, 'content_behind_menu', true ) ) ? esc_html( get_post_meta( $post->ID, 'content_behind_menu', true ) ) : 0 ;
    $content_behind_menu_checked = ( $content_behind_menu != 0 ) ? 'checked' : '';
    $white_logo = ( get_post_meta( $post->ID, 'white_logo', true ) ) ? esc_html( get_post_meta( $post->ID, 'white_logo', true ) ) : 0 ;
    $white_logo_checked = ( $white_logo != 0 ) ? 'checked' : '';

    ?>

        <div>
            <input type="checkbox" name="disable_title" value="<?php echo $post->ID; ?>" <?php echo $disable_title_is_checked; ?> /> Disable title<br/>
            <input type="checkbox" name="content_behind_menu" value="<?php echo $post->ID; ?>" <?php echo $content_behind_menu_checked; ?> /> Transparent menu bar<br/>
            <input type="checkbox" name="white_logo" value="<?php echo $post->ID; ?>" <?php echo $white_logo_checked; ?> /> White color logo and menu bar text
            <input type="hidden" name="page_settings" value="<?php echo $post->ID; ?>" />
        </div>

    <?php

}

function bikeride_meta_save( $post_id ){

    if ( wp_verify_nonce( $_POST['_inline_edit'], 'inlineeditnonce' ) )
        return;

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST['Bikeride_page_settings_nonce'] ) && wp_verify_nonce( $_POST['Bikeride_page_settings_nonce'], basename(__FILE__) ) ) ? "true" : "false";

    if( $is_autosave || $is_revision || !$is_valid_nonce ){
        return;
    }

    if( isset( $_POST['page_settings'] ) ){
        update_post_meta( $post_id, 'disable_title', $_POST['disable_title'] );
        update_post_meta( $post_id, 'content_behind_menu', $_POST['content_behind_menu'] );
        update_post_meta( $post_id, 'white_logo', $_POST['white_logo'] );
    }

}
add_action( 'save_post', 'bikeride_meta_save' );


function bikeride_frontend_styles(){
    ?>

    <style>

        <?php

            global $post;

            if( get_theme_mod( 'set_sticky_menu' ) == true ){
                ?>
                    .main-content{
                        padding-top: 50px;
                    }
                <?php
            }

            if( get_post_meta( $post->ID, 'content_behind_menu', true ) != 0 ){
                ?>
                    .header{
                        background-color: transparent;
                    }
                    .main-content{
                        padding-top: 0;
                    }
                <?php
            }

        ?>

    </style>

    <?php
}
add_action( 'wp_head', 'bikeride_frontend_styles', 999 );


function bikeride_mini_cart_shortcode() {

    ?>

    <a href="#" id="mini-cart" class="dropdown-back" data-toggle="dropdown">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <div class="basket-item-count" style="display: inline;">
            <span class="cart-items-count count">
                <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-mini-cart">
        <li>
            <div class="widget_shopping_cart_content">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </li>
    </ul>

    <?php

}
add_shortcode( 'bikeride_mini_cart', 'bikeride_mini_cart_shortcode' );


function bikeride_preload_images(){

    global $post;

    if( $post->ID == 1848 ){
        ?>

            <link rel="preload" fetchpriority="high" as="image" href="<?php echo home_url(); ?>/wp-content/uploads/2025/02/home-banner.webp" />
            <link rel="preload" fetchpriority="high" as="image" href="<?php echo home_url(); ?>/wp-content/uploads/2025/02/home-banner-mobile.webp" />

        <?php
    }

    if( $post->ID == 1914 || $post->ID == 1934 || $post->ID == 1943 || $post->ID == 1958 ){
        ?>

            <link rel="preload" fetchpriority="high" as="image" href="<?php echo home_url(); ?>/wp-content/uploads/2025/02/header-banner-wide-short.webp" />

        <?php
    }

}
add_action( "wp_head", "bikeride_preload_images" );