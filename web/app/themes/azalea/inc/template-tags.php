<?php
/**
 * Custom template tags for this theme.
 *
 * @package Azalea
 */

if ( ! function_exists( 'jgtazalea_entry_category' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function jgtazalea_entry_category() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'azalea') );
		if ( $categories_list && jgtazalea_categorized_blog() ) {
			printf( '<div class="cat-links"><span class="meta-before">%1$s</span> %2$s</div>',
				esc_html_x( 'In', 'Used before category links.', 'azalea' ),
				$categories_list
			);
		}
	}
}
endif;

if ( ! function_exists( 'jgtazalea_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post date and author.
 */
function jgtazalea_posted_on() {
	if ( 'post' === get_post_type() ) {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>',
				esc_html_x( 'Featured', 'Used to indicate sticky post.', 'azalea' )
			);
		}
		printf( '<span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span>',
			esc_html_x( 'Author', 'Used before post author name.', 'azalea' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
		jgtazalea_entry_date();
	} elseif ( 'attachment' == get_post_type() ) {
		jgtazalea_entry_date();
		if ( wp_attachment_is_image() ) {
			$metadata = wp_get_attachment_metadata();
			printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
				esc_html_x( 'Full size', 'Used before full size attachment link.', 'azalea' ),
				esc_url( wp_get_attachment_url() ),
				absint( $metadata['width'] ),
				absint( $metadata['height'] )
			);
		}
	}
	if ( comments_open() || get_comments_number() ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'azalea' ), esc_html__( '1 Comment', 'azalea' ), esc_html__( '% Comments', 'azalea' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'jgtazalea_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function jgtazalea_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'azalea') );
		if ( $tags_list ) {
			printf( '<footer class="entry-footer"><div class="tag-links"><span class="screen-reader-text">%1$s</span> %2$s</div></footer>',
				esc_html_x( 'Tags:', 'Used before tag links.', 'azalea' ),
				$tags_list
			);
		}
	} elseif ( 'attachment' === get_post_type() ) {
		previous_post_link( '<footer class="entry-footer"><div class="parent-post-link"><span class="meta-before">' . esc_html__( 'Published in:', 'azalea' ) . '</span> %link</div></footer>', '%title' );
	}
}
endif;

if ( ! function_exists( 'jgtazalea_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 */
function jgtazalea_post_thumbnail() {
	if ( is_attachment() || ! has_post_thumbnail() )
		return;
	if ( is_singular() ) :
	?>
	<div class="post-thumbnail">
		<?php
			if ( is_page_template( 'page-templates/full-width.php' ) ) {
				the_post_thumbnail( 'jgtazalea-slider' );
			} else {
				the_post_thumbnail();
			}
		?>
	</div><!-- .post-thumbnail -->
	<?php else : ?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?></a>
	<?php endif;
}
endif;

if ( ! function_exists( 'jgtazalea_entry_date' ) ) :
/**
 * Prints HTML with date information for the current post.
 */
function jgtazalea_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);
	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		esc_html_x( 'Posted on', 'Used before publish date.', 'azalea' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function jgtazalea_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jgtazalea_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jgtazalea_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jgtazalea_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jgtazalea_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jgtazalea_categorized_blog.
 */
function jgtazalea_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jgtazalea_categories' );
}
add_action( 'edit_category', 'jgtazalea_category_transient_flusher' );
add_action( 'save_post', 'jgtazalea_category_transient_flusher' );

if ( ! function_exists( 'jgtazalea_excerpt_more' ) ) :
/**
 * Replace "[...]" (appended to automatically generated excerpts) with ... and a 'Read More' link.
 */
function jgtazalea_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	$link = sprintf( '<span class="read-more"><a href="%1$s" class="more-link">%2$s</a></span>',
		esc_url( get_permalink( get_the_ID() ) ),
		esc_html__( 'Read More', 'azalea' )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'jgtazalea_excerpt_more' );
endif;

/**
 * Wrap "Read more" link
 */
function jgtazalea_wrap_more_link( $more ) {
	return '<span class="read-more">' . $more . '</span>';
}
add_filter( 'the_content_more_link','jgtazalea_wrap_more_link' );

/**
 * Display navigation to next/previous set of posts when applicable.
 */
function jgtazalea_loop_navigation() {
	if ( get_theme_mod( 'jgtazalea_posts_nav' ) === 'next_prev' ) {
		the_posts_navigation( array (
			'prev_text' => '<span class="meta-nav fa-angle-double-left" aria-hidden="true"></span> ' . esc_html__( 'Older posts', 'azalea' ),
			'next_text' => esc_html__( 'Newer posts', 'azalea' ) . ' <span class="meta-nav fa-angle-double-right" aria-hidden="true"></span>',
		) );
	} else {
		the_posts_pagination( array(
			'prev_text'          => '<span class="meta-nav fa-angle-double-left" aria-hidden="true"></span> ' . esc_html__( 'Previous', 'azalea' ),
			'next_text'          => esc_html__( 'Next', 'azalea' ) . ' <span class="meta-nav fa-angle-double-right" aria-hidden="true"></span>',
			'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'azalea' ) . ' </span>'
		) );
	}
}

/**
 * Prints HTML with the copyright info.
 */
function jgtazalea_site_info() {
	if ( get_theme_mod( 'jgtazalea_footer_text' ) ) {
		echo wp_kses_post( get_theme_mod( 'jgtazalea_footer_text' ) );
	} else {
		printf( esc_html__( '&copy; %1$s %2$s', 'azalea' ), date_i18n( __( 'Y', 'azalea' ) ), sprintf( '<a href="%1$s" rel="home">%2$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name', 'display' ) ) );
		echo '<br />';
		printf( esc_html__( 'Theme by %s.', 'azalea' ), sprintf( '<a href="%s">justgoodthemes.com</a>', esc_url( 'http://justgoodthemes.com/' ) ) );
	}
}
