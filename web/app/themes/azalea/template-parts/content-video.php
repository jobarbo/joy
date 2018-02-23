<?php
/**
 * Template part for displaying video posts.
 *
 * @package Azalea
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			jgtazalea_entry_category();
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
		<div class="entry-meta">
			<?php
				jgtazalea_posted_on();
				edit_post_link( esc_html__( 'Edit', 'azalea' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php
		$content = apply_filters( 'the_content', get_the_content( esc_html__( 'Read More', 'azalea' ) ) );
		$embeds = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		if ( ! empty( $embeds ) ) {
			foreach( $embeds as $embed_html ) {
				if( strpos( $embed_html, 'video' ) || strpos( $embed_html, 'youtube' ) || strpos( $embed_html, 'vimeo' ) ) {
					$content = str_replace( $embed_html, '', $content );
					printf( '<div class="post-video">%s</div>', $embed_html );
					break;
				}
			}
		}
	?>
	<div class="entry-content">
		<?php
			if ( is_search() || ( get_theme_mod( 'jgtazalea_auto_excerpt' ) && ! is_singular() ) ) {
				the_excerpt();
			} else {
				echo $content;
				wp_link_pages( array(
					'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'azalea' ) . '</span>',
					'after'       => '</p>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>'
				) );
			}
		?>
	</div><!-- .entry-content -->
	<?php jgtazalea_entry_footer(); ?>
	<?php
	if ( is_single() && ! is_attachment() && get_theme_mod( 'jgtazalea_show_author_box' ) ) :
		get_template_part( 'template-parts/biography' );
	endif;
	?>
</article><!-- #post-## -->
