<?php
/**
 * Template Name: Full Width
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
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
