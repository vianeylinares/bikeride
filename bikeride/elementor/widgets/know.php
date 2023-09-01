<?php
/**
 * Bikeride Did you know? Elementor Widget.
 *
 * Elementor widget that inserts a Did you know? legend.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly.
}


class Bikeride_Know_Widget extends \Elementor\Widget_Base{

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
        return 'Bikeride Did you know';
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
        return esc_html__( 'BR Did you know?', 'bikeride' );
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
        return 'eicon-text-area';
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
        return [ 'know' ];
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
                'br_know_legend',
                [
                    'label' => esc_html__( 'BR Did you know? legend', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR Did you know? legend here', 'bikeride' ),
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
                'br_know_color',
                [
                    'label' => esc_html__( 'BR Did you know? color', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .br-know-color' => 'color: {{VALUE}};',
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
        $br_know_legend = $settings['br_know_legend'];

        ?>

        <!-- Start rendering the output -->        
        <p class="br-know-color" style="font-style: italic;">
            <?php echo $br_know_legend;  ?>
        </p>        
        <!-- End rendering the output -->

        <?php

    }

}