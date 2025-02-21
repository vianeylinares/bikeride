<?php
/**
 * Elementor Image PopUp Widget.
 *
 * Elementor widget that inserts an Image with PopUp.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Bikeride_ImagePop_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image with PopUp widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'image-with-popup';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image with Popup widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'BR Image with Popup', 'bikeride' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image with Popup widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Image with Popup widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bikeride' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Image with Popup widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'image', 'popup' ];
	}

	/**
	 * Register Image with Popup widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Image with Popup Content', 'bikeride' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'br_image_with_popup',
                [
                    'label' => esc_html__( 'Choose Image', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

        $this->end_controls_section();

	}

	/**
	 * Render Image with Popup widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$image_attributes = wp_get_attachment_image_src( $settings['br_image_with_popup']['id'], 'full' );

        // get the individual values of the input
        //$br_pos_area = $settings['br_pos_area'];
        $br_random = rand( 1000, 9999 );

		$this->add_render_attribute( 'list', 'class', 'elementor-list-widget' );
		?>
		<div style="text-align: center;">
            <a class="popup-with-zoom-anim" href="#small-dialog-<?php echo $br_random; ?>" >
                <?php
                    // Get image URL
                    echo '<img src="' . $settings['br_image_with_popup']['url'] . '" alt="' . get_post_meta($settings['br_image_with_popup']['id'], '_wp_attachment_image_alt', true) . '" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '" >';
                ?>
            </a>

            <div id="small-dialog-<?php echo $br_random; ?>" class="zoom-anim-dialog image-with-popup-dialog mfp-hide">
                <?php
                    echo '<img src="' . $settings['br_image_with_popup']['url'] . '" alt="' . get_post_meta($settings['br_image_with_popup']['id'], '_wp_attachment_image_alt', true) . '" >';
                ?>
            </div>
		</div>
		<?php
	}

}