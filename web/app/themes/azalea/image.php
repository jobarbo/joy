<?php
/**
 * The template for displaying image attachments.
 *
 * @package Azalea
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="inner">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<div class="entry-meta">
								<?php
								jgtazalea_posted_on();
								edit_post_link( esc_html__( 'Edit', 'azalea' ), '<span class="edit-link">', '</span>' );
								?>
							</div><!-- .entry-meta -->

						</header><!-- .entry-header -->
						<div class="entry-content">
							<div class="entry-attachment">
								<?php echo wp_get_attachment_image( get_the_ID(), 'post-thumbnail' );?>
								<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .entry-attachment -->
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
						<?php jgtazalea_entry_footer(); ?>
					</article><!-- #post-## -->
					<?php
					// Show navigation if there is more than one attachment
					$attachments = array_values( get_children( array(
						'post_parent'    => $post->post_parent,
						'post_status'    => 'inherit',
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'order'          => 'ASC',
						'orderby'        => 'menu_order ID'
					) ) );
					if ( count( $attachments ) > 1 ) :
					?>
					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, '<span class="meta-nav fa-angle-double-left" aria-hidden="true"></span> ' . esc_html__( 'Previous Image', 'azalea' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'azalea' ) . ' <span class="meta-nav fa-angle-double-right" aria-hidden="true"></span>' ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- #image-navigation -->
					<?php 
					endif;
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
