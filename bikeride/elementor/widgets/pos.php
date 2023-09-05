<?php
/**
 * Elementor Points of Sale Widget.
 *
 * Elementor widget that inserts Points of Sale locations and areas.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Bikeride_POS_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Point of sale widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'point-of-sale';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Point of Sale widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'BR Point of Sale', 'bikeride' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Point of Sale widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-posts';
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
	 * Retrieve the list of categories the Point of Sale widget belongs to.
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
	 * Retrieve the list of keywords the Point of Sale widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'point', 'points', 'sale' ];
	}

	/**
	 * Register Point of Sale widget controls.
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
				'label' => esc_html__( 'Point of Sale Content', 'bikeride' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'br_pos_area',
                [
                    'label' => esc_html__( 'BR Point of Sale area', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR Point of Sale area', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_pos_image',
                [
                    'label' => esc_html__( 'Choose Image', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            /* Start repeater */

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'pos_name',
                [
                    'label' => esc_html__( 'Point of Sale name', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Point of Sale name', 'bikeride' ),
                    'default' => '',
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater->add_control(
                'pos_address',
                [
                    'label' => esc_html__( 'Point of Sale address', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Point of Sale address', 'bikeride' ),
                    'default' => '',
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater->add_control(
                'pos_phone',
                [
                    'label' => esc_html__( 'Point of Sale phone', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Point of Sale phone', 'bikeride' ),
                    'default' => '',
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            /* End repeater */

            $this->add_control(
                'list_items',
                [
                    'label' => esc_html__( 'Point of Sale Items', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),           /* Use our repeater */
                    'default' => [
                        [
                            'pos_name' => esc_html__( 'Point of Sale Item #1', 'bikeride' ),
                            'pos_address' => '',
                        ],
                        [
                            'pos_name' => esc_html__( 'Point of Sale Item #2', 'bikeride' ),
                            'pos_address' => '',
                        ],
                        [
                            'pos_name' => esc_html__( 'Point of Sale Item #3', 'bikeride' ),
                            'pos_address' => '',
                        ],
                        
                    ],
                    'title_field' => '{{{ pos_name }}}',
                ]
            );

            $this->end_controls_section();

	}

	/**
	 * Render Point of Sale widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

        // get the individual values of the input
        $br_pos_area = $settings['br_pos_area'];
        $br_random = rand( 1000, 9999 );

		$this->add_render_attribute( 'list', 'class', 'elementor-list-widget' );
		?>
		<div>
            <a class="popup-with-zoom-anim" href="#small-dialog-<?php echo $br_random; ?>" >
                <?php
                    // Get image URL
                    echo '<img src="' . $settings['br_pos_image']['url'] . '" alt="' . $settings['br_pos_image']['alt'] . '" >';
                ?>
            </a>

            <div id="small-dialog-<?php echo $br_random; ?>" class="zoom-anim-dialog pos-dialog mfp-hide" style="text-align: left; color: #000;">
                <div class="pos-box-header">
                    <div class="pos-pre-title">
                        <?php echo __( 'POINT OF SALE', 'bikeride' ); ?>
                    </div>
                    <h3 class="pos-title">
                        <?php echo $br_pos_area;  ?>
                    </h3>
                    <p class="pos-post-title">
                        * Souvenirs for pre-sale
                    </p>
                </div>
                <div class="pos-content">
                    <?php
                        foreach ( $settings['list_items'] as $index => $item ) {
                            $repeater_setting_key = $this->get_repeater_setting_key( 'pos_name', 'list_items', $index );
                            $this->add_render_attribute( $repeater_setting_key, 'class', 'pos-location-item' );
                            //$this->add_inline_editing_attributes( $repeater_setting_key );
                            ?>
                            <div <?php $this->print_render_attribute_string( $repeater_setting_key ); ?>>                            
                                <h4><?php echo $settings['list_items'][$index]['pos_name']; ?></h4>
                                <p><?php echo $settings['list_items'][$index]['pos_address']; ?></p>
                                <p><?php echo $settings['list_items'][$index]['pos_phone']; ?></p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <div class="pos-box-footer">
                    <?php echo __( 'Souvenirs are delivered only during the event', 'bikeride' ); ?>
                </div>
            </div>
		</div>
		<?php
	}

}