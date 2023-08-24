<?php
/**
 * The tempplate for displaying all single posts
 *
 * This is a template that displays all posts by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bikeride
 */
?>
<?php get_header(); ?>

<div class="blog-and-sidebar">
    <div class="blog-items">
        <?php
            if( have_posts() ):
                while( have_posts() ): the_post();
                    ?>
                    <article <?php post_class(); ?>>
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <div><?php the_content(); ?></div>
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
                    // If comments are open or we have at least one comment, load up the comment template.
                    if( comments_open() || get_comments_number() ):
                        comments_template();
                    endif;
                endwhile;
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