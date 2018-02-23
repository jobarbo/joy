<?php
/**
 * The template for displaying search results pages.
 *
 * @package Azalea
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="inner">
			<section id="primary" class="content-area">
				<main id="main" class="site-main">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search results for %s', 'azalea' ), '<span class="highlight">&#147;' . esc_html( get_search_query() ) . '&#148;</span>' ); ?></h1>
					</header><!-- .page-header -->
					<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the template for the content.
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					// Posts navigation.
					jgtazalea_loop_navigation();
				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				</main><!-- #main -->
			</section><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
