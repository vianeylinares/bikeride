<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
            ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_content(); ?></div>
            </article>
            <?php
        endwhile;
    else:
        ?>
        <p>Nothing to display</p>
        <?php
    endif;

?>

<?php get_footer(); ?>