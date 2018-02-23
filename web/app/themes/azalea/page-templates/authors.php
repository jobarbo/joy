<?php
/**
 * Template Name: Authors
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
				while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
								the_title( '<h1 class="entry-title">', '</h1>' );
								edit_post_link( esc_html__( 'Edit', 'azalea' ), '<div class="entry-meta">', '</div>' );
							?>
						</header><!-- .entry-header -->
						<?php jgtazalea_post_thumbnail(); ?>
						<div class="entry-content">
							<?php 
							the_content();
							$author_ids = get_users( array(
								'fields'  => 'ID',
								'orderby' => 'post_count',
								'order'   => 'DESC',
								'who'     => 'authors',
							) );
							foreach ( $author_ids as $author_id ) :
								$post_count = count_user_posts( $author_id );
								if ( ! $post_count )
									continue;
							?>
							<div class="author-info">
								<div class="author-avatar">
									<?php echo get_avatar( $author_id, 110 ); ?>
								</div>
								<div class="author-details">
								<div class="author-stats"><?php printf( esc_html( _n( '%d post', '%d posts', $post_count, 'azalea' ) ), number_format_i18n( $post_count ) ); ?></div>
									<h2 class="author-title"><a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" rel="author"><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></a></h2>
									<?php if ( get_the_author_meta( 'description', $author_id ) ) : ?>
									<p class="author-description"><?php echo wp_kses_post( get_the_author_meta( 'description', $author_id ) ); ?></p>
									<?php endif; ?>
								</div><!-- .author-details -->
							</div><!-- .author-info -->
							<?php endforeach; ?>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				<?php endwhile; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
