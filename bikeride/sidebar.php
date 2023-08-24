<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Bikeride
 */
?>

<?php if( is_active_sidebar( 'bikeride-sidebar-1' ) ): ?>
	<aside>
		<?php dynamic_sidebar( 'bikeride-sidebar-1' ); ?>
	</aside>
<?php endif;