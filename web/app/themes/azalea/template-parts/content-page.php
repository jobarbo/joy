<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Azalea
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			edit_post_link( esc_html__( 'Edit', 'azalea' ), '<div class="entry-meta">', '</div>' );
		?>
	</header><!-- .entry-header -->
	<?php jgtazalea_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'azalea' ) . '</span>',
				'after'       => '</p>',
				'link_before' => '<span class="page-link">',
				'link_after'  => '</span>'
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
