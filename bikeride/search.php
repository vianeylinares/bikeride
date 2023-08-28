<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bikeride
 */

get_header(); ?>

<h1><?php esc_html_e( 'Search results for', 'bikeride' ); ?>: <?php echo get_search_query(); ?></h1>

<?php 

    get_search_form();    
    
    // If there are any posts
    if( have_posts() ):
        ?>
        <div class="search-results-list">
            <?php
                // Load posts loop
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
                // We're using numeric page navigation here.
                the_posts_pagination( array(
                    'prev_text'		=> esc_html__( 'Previous', 'bikeride' ),
                    'next_text'		=> esc_html__( 'Next', 'bikeride' ),
                ));
            ?>
        </div>
        <?php     
    else:
    ?>
        <p class="no-search-results"><?php esc_html_e( 'There are no results for your query.', 'bikeride' ); ?></p>
    <?php

    endif;

?>
				
<?php get_footer(); ?>