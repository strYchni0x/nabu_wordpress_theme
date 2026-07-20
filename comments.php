<?php
/**
 * Kommentar-Template
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<h3 class="comments-title">
		<?php
		$nabu_comment_count = get_comments_number();
		if ( '1' === $nabu_comment_count ) {
			printf(
				esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'nabu' ),
				'<span>' . wp_kses_post( get_the_title() ) . '</span>'
			);
		} else {
			printf(
				esc_html( _n(
					'%1$s comment on &ldquo;%2$s&rdquo;',
					'%1$s comments on &ldquo;%2$s&rdquo;',
					$nabu_comment_count,
					'nabu'
				) ),
				number_format_i18n( $nabu_comment_count ),
				'<span>' . wp_kses_post( get_the_title() ) . '</span>'
			);
		}
		?>
	</h3>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 42,
		) );
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="comment-navigation navigation" aria-label="<?php esc_attr_e( 'Comment navigation', 'nabu' ); ?>">
		<div class="nav-links">
			<?php
			if ( $prev_link = get_previous_comments_link( esc_html__( '&larr; Older comments', 'nabu' ) ) ) :
				printf( '<div class="nav-previous">%s</div>', $prev_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;

			if ( $next_link = get_next_comments_link( esc_html__( 'Newer comments &rarr;', 'nabu' ) ) ) :
				printf( '<div class="nav-next">%s</div>', $next_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;
			?>
		</div>
	</nav>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="no-comments">
		<?php esc_html_e( 'Comments are closed for this post.', 'nabu' ); ?>
	</p>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h3>',
		'class_submit'       => 'btn btn-primary',
		'label_submit'       => esc_html__( 'Post comment', 'nabu' ),
		'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.', 'nabu' ) . '</span>' .
			( $req = get_option( 'require_name_email' ) ? esc_html__( ' Required fields are marked *.', 'nabu' ) : '' ) . '</p>',
	) );
	?>

</div><!-- #comments -->
