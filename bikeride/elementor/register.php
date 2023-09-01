<?php

function bikeride_register_widgets( $widgets_manager ) {

    require_once get_template_directory() . '/elementor/widgets/heading.php';
    require_once get_template_directory() . '/elementor/widgets/news.php';
    require_once get_template_directory() . '/elementor/widgets/know.php';
    require_once get_template_directory() . '/elementor/widgets/info.php';

    $widgets_manager->register( new \Bikeride_Headging_Widget() );
    $widgets_manager->register( new \Bikeride_News_Widget() );
    $widgets_manager->register( new \Bikeride_Know_Widget() );
    $widgets_manager->register( new \Bikeride_Info_Widget() );

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