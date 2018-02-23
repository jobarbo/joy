<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Azalea
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="inner">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Sorry, that page can&rsquo;t be found.', 'azalea' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php printf( wp_kses( __( 'Either something went wrong or the page doesn&rsquo;t exist anymore. Visit our <a href="%s">homepage</a> or search the best match below.', 'azalea' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( home_url( '/' ) ) ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
