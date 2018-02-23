<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<section>

		<h1><?= get_the_title(); ?></h1>
		<?php get_template_part('blocks/flexible-content'); ?>

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>