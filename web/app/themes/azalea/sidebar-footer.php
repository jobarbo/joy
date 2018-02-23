<?php
/**
 * The sidebar containing the footer widget areas.
 *
 * @package Azalea
 */

if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) :
?>
<div id="footer-columns" class="footer-columns">
	<div class="inner">
		<div class="grid">
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div class="widget-area one-third">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		</div><!-- .grid -->
	</div><!-- .inner -->
</div><!-- .footer-columns -->
<?php endif; ?>
