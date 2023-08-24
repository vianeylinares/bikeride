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
            ?>
            <article>
                <h1 class="page-title"><?php the_title(); ?></h1>
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