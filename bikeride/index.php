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

<h1 class="page-title">Blog</h1>

<div class="blog-and-sidebar">
    <div class="blog-items">
        <?php

            // If there are any posts
            if( have_posts() ):
                // While posts loop
                while( have_posts() ): the_post();
                    ?>
                    <article <?php post_class(); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div><?php the_excerpt(); ?></div>
                        <div class="meta">
                            <p><?php esc_html_e( 'Published by', 'bikeride' ); ?> <?php the_author_posts_link(); ?>
                            <?php esc_html_e( 'on', 'bikeride' ); ?> <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
                            <br />
                            <?php if( has_category() ): ?>
                                <?php esc_html_e( 'Categories', 'bikeride' ); ?>: <span><?php the_category( ' ' ); ?></span>
                            <?php endif; ?>
                            <br />
                            <?php if( has_tag() ): ?>
                                <?php esc_html_e( 'Tags', 'bikeride' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
                            <?php endif; ?>
                            </p>
                        </div>
                    </article>
                    <?php
                endwhile;

                the_posts_pagination( array(
                    'prev_text'		=> esc_html__( 'Previous', 'bikeride' ),
                    'next_text'		=> esc_html__( 'Next', 'bikeride' ),
                ));
            else:
                ?>
                <p>Nothing to display</p>
                <?php
            endif;

        ?>
    </div>
    <div class="blog-sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>