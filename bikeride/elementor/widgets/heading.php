<?php
/**
 * Bikeride Heading Elementor Widget.
 *
 * Elementor widget that inserts a heading title with an underline.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly.
}


class Bikeride_Headging_Widget extends \Elementor\Widget_Base{

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
        return 'bikeride-heading';
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
        return esc_html__( 'BR Heading', 'bikeride' );
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
        return 'eicon-heading';
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
        return [ 'heading' ];
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
                'br_heading_title',
                [
                    'label' => esc_html__( 'BR title', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR title here', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_heading_title_type',
                [
                    'label' => esc_html__( 'Heading type', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'h1' => esc_html__( 'H1', 'bikeride' ),
                        'h2' => esc_html__( 'H2', 'bikeride' ),
                        'h3' => esc_html__( 'H3', 'bikeride' ),
                        'h4' => esc_html__( 'H4', 'bikeride' ),
                        'h5' => esc_html__( 'H5', 'bikeride' ),
                        'h6' => esc_html__( 'H6', 'bikeride' ),
                    ],
                    'default' => 'h2',
                ]
            );

		$this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style Section', 'essential-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'br_heading_color',
                [
                    'label' => esc_html__( 'BR title color', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .br-heading-color' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .br-line' => 'border-bottom-color: {{VALUE}};',
                    ],
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
        $br_heading_title = $settings['br_heading_title'];
        $br_heading_title_type = $settings['br_heading_title_type'];

        ?>

        <!-- Start rendering the output -->        
        <<?php echo $br_heading_title_type; ?> class="br-heading-color br-line">
            <?php echo $br_heading_title;  ?>
        </<?php echo $br_heading_title_type; ?>>        
        <!-- End rendering the output -->

        <?php

    }

}