<?php

function bikeride_register_widgets( $widgets_manager ) {

    require_once get_template_directory() . '/elementor/widgets/heading.php';
    require_once get_template_directory() . '/elementor/widgets/news.php';
    require_once get_template_directory() . '/elementor/widgets/know.php';
    require_once get_template_directory() . '/elementor/widgets/info.php';
    require_once get_template_directory() . '/elementor/widgets/testimonial.php';
    require_once get_template_directory() . '/elementor/widgets/hotel.php';
    require_once get_template_directory() . '/elementor/widgets/pos.php';
    require_once get_template_directory() . '/elementor/widgets/imagepop.php';

    $widgets_manager->register( new \Bikeride_Headging_Widget() );
    $widgets_manager->register( new \Bikeride_News_Widget() );
    $widgets_manager->register( new \Bikeride_Know_Widget() );
    $widgets_manager->register( new \Bikeride_Info_Widget() );
    $widgets_manager->register( new \Bikeride_Testimonial_Widget() );
    $widgets_manager->register( new \Bikeride_Hotel_Widget() );
    $widgets_manager->register( new \Bikeride_POS_Widget() );
    $widgets_manager->register( new \Bikeride_ImagePop_Widget() );

}
add_action( 'elementor/widgets/register', 'bikeride_register_widgets' );


function bikeride_add_elementor_widget_category( $elements_manager ) {

	$elements_manager->add_category(
		'bikeride',
		[
			'title' => esc_html__( 'Bikeride', 'bikeride' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'bikeride_add_elementor_widget_category' );


function bikeride_elementor_scripts(){

    // For Point of sale (POS) widget
    wp_register_style( 'magnific-popup-css',  get_template_directory_uri() . '/elementor/vendor/magnific-popup.css', array(), "", 'all' );
    wp_register_script( 'magnific-popup-js',  get_template_directory_uri() . '/elementor/vendor/magnific-popup.js', array('jquery'), "", true );
    wp_register_script( 'magnific-popup-activation-js',  get_template_directory_uri() . '/elementor/js/magnific-popup-activation.js', array('jquery'), "", true );

}
add_action( 'wp_enqueue_scripts', 'bikeride_elementor_scripts' );