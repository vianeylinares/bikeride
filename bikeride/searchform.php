<?php
/**
 * Template for displaying search forms in Bikeride
 *
 * @package Bikeride
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bikeride' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'bikeride' ); ?></span></button>
	<input type="hidden" value="post" name="post_type" id="post_type">
</form>