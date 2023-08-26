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

}
add_action( 'customize_register', 'bikeride_customizer' );