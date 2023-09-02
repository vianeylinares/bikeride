<?php
/**
 * Bikeride Hotel Elementor Widget.
 *
 * Elementor widget that inserts hotel entries.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly.
}


class Bikeride_Hotel_Widget extends \Elementor\Widget_Base{

    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name(){
        return 'Bikeride hotel';
    }


    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title(){
        return esc_html__( 'BR Hotel', 'bikeride' );
    }


    /**
     * Get widget icon.
     *
     * Retrieve widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon(){
        return 'eicon-database';
    }


    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more hotelrmation about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url(){
        return 'https://essentialwebapps.com/category/elementor-tutorial/';
    }


    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories(){
        return [ 'bikeride' ];
    }


    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords(){
        return [ 'hotel' ];
    }


    /**
    * Register widget controls.
    *
    * Add input fields to allow the user to customize the widget settings.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function register_controls(){ 

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'essential-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'br_hotel_name',
                [
                    'label' => esc_html__( 'BR Hotel name', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR Hotel name here', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_hotel_addresss',
                [
                    'label' => esc_html__( 'BR Hotel Address', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => '',
                    'placeholder' => esc_html__( 'Your BR Address here', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_hotel_phone',
                [
                    'label' => esc_html__( 'BR Phone number', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR Hotel phone number here', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_hotel_website',
                [
                    'label' => esc_html__( 'Link', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );

		$this->end_controls_section();

    }


    /**
    * Render widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render(){

        // get our input from the widget settings.
        $settings = $this->get_settings_for_display();

        // get the individual values of the input
        $br_hotel_name = $settings['br_hotel_name'];
        $br_hotel_addresss = $settings['br_hotel_addresss'];
        $br_hotel_phone = $settings['br_hotel_phone'];

        ?>

        <!-- Start rendering the output -->        
        <div class="elem-hotel-box">
            <div class="hotel-space-name">
                <?php echo $br_hotel_name; ?>
            </div>       
            <div class="hotel-space-address">
                <?php echo $br_hotel_addresss; ?>
            </div>
            <div class="hotel-space-phone">
                <?php echo $br_hotel_phone; ?>
            </div>       
            <div class="hotel-space-website">
                <?php
                    if ( ! empty( $settings['br_hotel_website']['url'] ) ) {
                        $this->add_link_attributes( 'br_hotel_website', $settings['br_hotel_website'] );
                    }
                    ?>
                    <a <?php echo $this->get_render_attribute_string( 'br_hotel_website' ); ?>>
                        <?php echo $settings['br_hotel_website']['url']; ?>
                    </a>
            </div>
        </div>        
        <!-- End rendering the output -->

        <?php

    }

}