<?php get_header(); ?>

	<section>

		<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

	</section>

<?php get_footer(); ?>