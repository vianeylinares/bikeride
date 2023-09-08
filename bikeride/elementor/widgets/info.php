<?php
/**
 * Bikeride Info Elementor Widget.
 *
 * Elementor widget that inserts info entries.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly.
}


class Bikeride_Info_Widget extends \Elementor\Widget_Base{

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
        return 'bikeride-info';
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
        return esc_html__( 'BR Info', 'bikeride' );
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
        return 'eicon-editor-list-ul';
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
        return [ 'info' ];
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
                'br_info_title',
                [
                    'label' => esc_html__( 'BR Info title', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__( 'Your BR Info title here', 'bikeride' ),
                ]
            );

            $this->add_control(
                'br_info_description',
                [
                    'label' => esc_html__( 'BR Info Description', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => '',
                    'placeholder' => esc_html__( 'Your BR Description here', 'bikeride' ),
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
        $br_info_title = $settings['br_info_title'];
        $br_info_description = $settings['br_info_description'];

        ?>

        <!-- Start rendering the output -->        
        <div class="elem-info-space">
            <div class="info-space-square"></div>
            <div class="info-space-data">
                <div class="info-space-title">
                    <?php echo $br_info_title; ?>
                </div>
                <div class="info-space-description">
                <?php echo $br_info_description; ?>
                </div>
            </div>
        </div>        
        <!-- End rendering the output -->

        <?php

    }

}