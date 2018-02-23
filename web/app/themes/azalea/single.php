<?php
/**
 * The template for displaying all single posts.
 *
 * @package Azalea
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="inner">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					// Include the template for the content.
					get_template_part( 'template-parts/content', get_post_format() );
					if ( is_singular( 'post' ) ) :
						// Previous/next post navigation.
						the_post_navigation( array(
							'prev_text' => '<span class="meta-nav fa-angle-double-left" aria-hidden="true"></span> ' . esc_html__( 'Previous Post', 'azalea' ),
							'next_text' => esc_html__( 'Next Post', 'azalea' ) . ' <span class="meta-nav fa-angle-double-right" aria-hidden="true"></span>'
						) );
					endif;
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
