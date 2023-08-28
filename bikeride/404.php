<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bikeride
 */

get_header(); ?>
<div class="error-404">
    <div class="not-found-texts">   
        <h1><?php esc_html_e( 'Page not found', 'bikeride' ); ?></h1>
        <p><?php esc_html_e( 'Unfortunately, the page you tried to reach does not exist on this site', 'bikeride' ); ?></p>
    </div>
    <div class="recent-entries">
        <?php
            the_widget( 'WP_Widget_Recent_Posts', 
                array(
                    'title'		=> esc_html__( 'Take a Look at Our Latest Posts', 'bikeride' ),
                    'number'	=> 5,
                )
            );
        ?>
    </div>
</div>
<?php get_footer(); ?>