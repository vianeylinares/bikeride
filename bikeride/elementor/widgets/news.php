<?php
/**
 * Bikeride News Elementor Widget.
 *
 * Elementor widget that inserts news entries.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly.
}


class Bikeride_News_Widget extends \Elementor\Widget_Base{

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
        return 'Bikeride news';
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
        return esc_html__( 'BR News', 'bikeride' );
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
        return 'eicon-single-post';
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
        return [ 'news', 'blog' ];
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
                'br_news_number',
                [
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'label' => esc_html__( 'How many news entries?', 'bikeride' ),
                    'placeholder' => '0',
                    'min' => 1,
                    'max' => 5,
                    'step' => 1,
                    'default' => 2,
                ]
            );

		$this->end_controls_section();

        /*$this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style Section', 'essential-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'br_news_color',
                [
                    'label' => esc_html__( 'BR title color', 'bikeride' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .br-news-color' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .br-line' => 'border-bottom-color: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();*/

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
        $br_news_number = $settings['br_news_number'];

        /* Get post entries */
        $args = array(
            'post_type' => 'post',
            'post_status' => array('publish'),
            'posts_per_page' => $br_news_number,
            'ignore_sticky_posts' => 1
        );

        $news = new WP_Query($args);

        ?>

        <!-- Start rendering the output -->        
        <div class="elem-news-box">
            <?php
                if( $news->have_posts() ):
                    while( $news->have_posts() ): $news->the_post();                        
                        $thumbnail_image = ( has_post_thumbnail() )? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"' : '' ;
                        ?>
                            <div class="news-entry" <?php echo $thumbnail_image; ?>>
                                <div class="news-entry-data">
                                    <h3 class="news-title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <a href="<?php the_permalink(); ?>" class="news-link">
                                    <?php esc_html_e( 'Read More', 'bikeride' ); ?>
                                    </a>
                                </div>
                            </div>
                        <?php
                    endwhile;
                else:
                    ?>
                    <p><?php esc_html_e( 'Nothing to display', 'bikeride' ); ?></p>
                    <?php
                endif;
            ?>            
        </div>        
        <!-- End rendering the output -->

        <?php

    }

}