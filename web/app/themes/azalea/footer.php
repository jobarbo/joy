<?php
/**
 * The template for displaying the footer.
 *
 * @package Azalea
 */
?>
	<footer id="colophon" class="site-footer">
		<?php get_sidebar( 'footer' ); ?>
		<?php if ( has_nav_menu( 'footer_social' ) ) : ?>
		<div class="footer-links">
			<div class="inner">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer_social',
					'container'      => false,
					'menu_id'        => 'footer-social-links',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
				?>
				<a href="#page" id="top-link" class="top-link"><i class="fa-angle-double-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to the top', 'azalea' ); ?></span></a>
			</div><!-- .inner -->
		</div><!-- .footer-links -->
		<div class="site-info">
			<div class="inner">
				<?php jgtazalea_site_info(); ?>
			</div><!-- .inner -->
		</div><!-- .site-info -->
		<?php else: ?>
		<div class="site-info">
			<div class="inner">
				<?php jgtazalea_site_info(); ?>
				<a href="#page" id="top-link" class="top-link"><i class="fa-angle-double-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to the top', 'azalea' ); ?></span></a>
			</div><!-- .inner -->
		</div><!-- .site-info -->
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="search-box" class="site-search">
	<div class="inner">
		<?php get_search_form(); ?>
	</div><!-- .inner -->
</div><!-- .search-box -->
<div id="search-hide" class="search-hide"></div>

<?php wp_footer(); ?>

</body>
</html>