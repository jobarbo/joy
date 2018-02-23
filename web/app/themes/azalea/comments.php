<?php
/**
 * The template for displaying comments.
 *
 * @package Azalea
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
<?php if ( have_comments() ) : ?>
	<h2 class="comments-title"><?php
		printf( esc_html( _nx( '%s comment', '%s comments', get_comments_number(), 'comments title', 'azalea' ) ), number_format_i18n( get_comments_number() ) );
		if ( comments_open() ) {
			echo ' &#47; <a href="#respond">' . esc_html__( 'Add your comment below', 'azalea' ) . '</a>';
		}
	?></h2>
	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 90,
		) );
	?>
	</ol><!-- .comment-list -->
	<?php
	the_comments_navigation( array(
		'prev_text' => '<span class="meta-nav fa-angle-double-left" aria-hidden="true"></span> ' . esc_html__( 'Older comments', 'azalea' ),
		'next_text' => esc_html__( 'Newer comments', 'azalea' ) . ' <span class="meta-nav fa-angle-double-right" aria-hidden="true"></span>'
	) );
	?>
<?php endif; ?>
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'azalea' ); ?></p>
<?php endif; ?>
<?php
$req      = get_option( 'require_name_email' );
$aria_req = ( $req ? ' aria-required="true"' : '' );
$html_req = ( $req ? ' required="required"' : '' );
comment_form( array(
	'fields'               => array(
		'author' => '<p class="comment-form-author"><label for="author" class="screen-reader-text">' . esc_html__( 'Name', 'azalea' ) . ( $req ? '' : esc_html__( ' (optional)', 'azalea' ) ) . '</label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Name', 'azalea' ) . ( $req ? '' : esc_attr__( ' (optional)', 'azalea' ) ) . '" /></p>',
		'email' => '<p class="comment-form-email"><label for="email" class="screen-reader-text">' . esc_html__( 'Email', 'azalea' ) . ( $req ? '' : esc_html__( ' (optional)', 'azalea' ) ) . '</label> <input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_attr__( 'Email', 'azalea' ) . ( $req ? '' : esc_attr__( ' (optional)', 'azalea' ) ) . '" /></p>',
		'url'    => '<p class="comment-form-url"><label for="url" class="screen-reader-text">' . esc_html__( 'Website', 'azalea' ) . esc_html__( ' (optional)', 'azalea' ) . '</label> <input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website', 'azalea' ) . esc_attr__( ' (optional)', 'azalea' ) . '" /></p>'
	),
	'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="screen-reader-text">' . esc_html__( 'Comment', 'azalea' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required" placeholder="' . esc_attr__( 'Comment', 'azalea' ) . '"></textarea></p>',
	'comment_notes_before' => ''
) );
?>
</div><!-- #comments -->