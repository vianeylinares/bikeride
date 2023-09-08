<?php
/**
 * Bikeride Theme Customizer
 *
 * @package Bikeride
 */


function bikeride_customizer( $wp_customize ){

	// Copyright section

	$wp_customize->add_section(
		'sec_copyright', array(
			'title'         => __( 'Copyright Settings', 'bikeride' ),
			'description'   => __( 'Copyright Section', 'bikeride' )
		)
	);

			// Copyright
			$wp_customize->add_setting(
				'set_copyright', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control(
				'set_copyright', array(
					'label'         => __( 'Copyright', 'bikeride' ),
					'description'   => __( 'Please, add your copyright information here', 'bikeride' ),
					'section'       => 'sec_copyright',
					'type'          => 'text'
				)
			);


    // Social networks section

	$wp_customize->add_section(
		'sec_socials', array(
			'title'         => __( 'Social Network Settings', 'bikeride' ),
			'description'   => __( 'Social Network Section', 'bikeride' )
		)
	);

			// Facebook
			$wp_customize->add_setting(
				'set_facebook', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'sanitize_url'
				)
			);

			$wp_customize->add_control(
				'set_facebook', array(
					'label'         => __( 'Facebook', 'bikeride' ),
					'description'   => __( 'Please, add your Facebook link here', 'bikeride' ),
					'section'       => 'sec_socials',
					'type'          => 'url'
				)
			);

            // Instagram
			$wp_customize->add_setting(
				'set_instagram', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'sanitize_url'
				)
			);

			$wp_customize->add_control(
				'set_instagram', array(
					'label'         => __( 'Instagram', 'bikeride' ),
					'description'   => __( 'Please, add your Instagram link here', 'bikeride' ),
					'section'       => 'sec_socials',
					'type'          => 'url'
				)
			);

            // Pinterest
			$wp_customize->add_setting(
				'set_pinterest', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'sanitize_url'
				)
			);

			$wp_customize->add_control(
				'set_pinterest', array(
					'label'         => __( 'Pinterest', 'bikeride' ),
					'description'   => __( 'Please, add your Pinterest link here', 'bikeride' ),
					'section'       => 'sec_socials',
					'type'          => 'url'
				)
			);

            // YouTube
			$wp_customize->add_setting(
				'set_youtube', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'sanitize_url'
				)
			);

			$wp_customize->add_control(
				'set_youtube', array(
					'label'         => __( 'YouTube', 'bikeride' ),
					'description'   => __( 'Please, add your YouTube link here', 'bikeride' ),
					'section'       => 'sec_socials',
					'type'          => 'url'
				)
			);

    // Sticky menu section

	$wp_customize->add_section(
		'sec_sticky_menu', array(
			'title'         => __( 'Sticky Menu Settings', 'bikeride' ),
			'description'   => __( 'Sticky Menu Section', 'bikeride' )
		)
	);

            // Enable sticky menu
			$wp_customize->add_setting(
				'set_sticky_menu', array(
					'type'                  => 'theme_mod',
					'default'               => '',
					'sanitize_callback'     => 'bikeride_sanitize_checkbox'
				)
			);

			$wp_customize->add_control(
				'set_sticky_menu', array(
					'label'         => __( 'Show Sticky Menu?', 'bikeride' ),
					'section'       => 'sec_sticky_menu',
					'type'          => 'checkbox'
				)
			);

	// Logo

	$wp_customize->add_section(
		'sec_logo', array(
			'title'         => __( 'Logo Settings', 'bikeride' ),
			'description'   => __( 'Logo Section', 'bikeride' )
		)
	);

			// Logo black
			$wp_customize->add_setting(
				'set_logo_black',
				array(
					'type'                  => 'theme_mod',
					'sanitize_callback'     => 'absint'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'set_logo_black',
					array(
						'label'     => __( 'Logo black', 'bikeride' ),
						'section'   => 'sec_logo',
						'mime_type' => 'image'
					)
				)
			);

			// Logo white
			$wp_customize->add_setting(
				'set_logo_white',
				array(
					'type'                  => 'theme_mod',
					'sanitize_callback'     => 'absint'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'set_logo_white',
					array(
						'label'     => __( 'Logo white', 'bikeride' ),
						'section'   => 'sec_logo',
						'mime_type' => 'image'
					)
				)
			);

}
add_action( 'customize_register', 'bikeride_customizer' );


function bikeride_sanitize_checkbox( $checked ){
	return ( ( isset ( $checked ) && true == $checked ) ? true : false );
}