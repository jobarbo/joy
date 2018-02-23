<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Azalea
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="content-sidebar">
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .widget-area -->
</aside><!-- #secondary -->
