<?php
/**
 * Template part for displaying gallery posts.
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
		$gallery = get_post_gallery( get_the_ID(), false );
		if ( ! empty( $gallery ) ) {
			echo '<div class="post-gallery">';
			$gallery_ids = explode( ',', $gallery['ids'] );
			foreach( $gallery_ids as $id ) {
				$gallery_image = wp_get_attachment_image_src( $id, 'post-thumbnail' );
				$image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
				echo '<div><img src="' . esc_url( $gallery_image[0] ) . '" alt="' . esc_attr( $image_alt ) . '" /></div>';
			}
			echo '</div>';
		}
	?>
	<div class="entry-content">
		<?php
			if ( is_search() || ( get_theme_mod( 'jgtazalea_auto_excerpt' ) && ! is_singular() ) ) {
				the_excerpt();
			} else {
				$content = get_the_content( esc_html__( 'Read More', 'azalea' ) );
				preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );
				if ( ! empty( $matches ) ) {
					foreach ( $matches as $shortcode ) {
						if ( 'gallery' === $shortcode[2] ) {
							$content = str_replace( $shortcode[0], '', $content );
							break;
						}
					}
				}
				echo apply_filters( 'the_content', $content );
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
