<?php
/**
 * The tempplate for displaying all pages
 *
 * This is a template that displays all pages by default.
 * Please note all this is the WordPress construct of pages.
 * and other 'pages' in your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bikeride
 */
?>
<?php get_header(); ?>

<?php
    // If there are any posts
    if( have_posts() ):
        // While posts loop
        while( have_posts() ): the_post();
            $disable_title = ( get_post_meta( get_the_ID(), 'disable_title', true ) ) ? esc_html( get_post_meta( get_the_ID(), 'disable_title', true ) ) : 0 ;
            $disable_title_is_checked = ( $disable_title != 0 ) ? true : false;
            ?>
            <article>
                <?php if( ! $disable_title_is_checked ): ?>
                    <h1 class="page-title"><?php the_title(); ?></h1>
                <?php endif; ?>
                <div><?php the_content(); ?></div>
            </article>
            <?php
        endwhile;
    else:
        ?>
        <p><?php esc_html_e( 'Nothing to display', 'bikeride' ); ?></p>
        <?php
    endif;
?>

<?php get_footer(); ?>