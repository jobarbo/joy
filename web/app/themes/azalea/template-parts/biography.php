<?php
/**
 * The template for displaying author biography.
 *
 * @package Azalea
 */
?>
<div class="author-box">
	<div class="author-info">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 110 ); ?>
		</div><!-- .author-avatar -->
		<div class="author-details">
			<h2 class="author-title"><?php 
				printf( esc_html__( 'Written by %s', 'azalea' ),
					sprintf( '<a href="%1$s" rel="author">%2$s</a>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author()
					)
				);
			?></h2>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			<?php endif; ?>
		</div><!-- .author-details -->
	</div><!-- .author-info -->
</div><!-- .author-box -->
