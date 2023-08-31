<?php

function bikeride_register_heading_widget( $widgets_manager ) {

    require_once get_template_directory() . '/elementor/widgets/heading.php';

    $widgets_manager->register( new \Bikeride_Headging_Widget() );

}
add_action( 'elementor/widgets/register', 'bikeride_register_heading_widget' );


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