<?php get_header(); ?>

	<!-- section -->
	<section>

		<h1><?php _e( 'Lastest posts', 'theme' ); ?></h1>

    <?php
    // LIST POSTS
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $postsperpage = get_option('posts_per_page');

    query_posts(array(
      'post_type' => 'post',
      'posts_per_page' => $postsperpage,
      'post_status'    => 'publish',
      'paged'          => $paged
    ));

    while(have_posts()): the_post();
      get_template_part('blocks/post-box');
    endwhile; ?>

    <div class="pagination">
      <?= pagination(); ?>
    </div>

    <?php wp_reset_query(); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>