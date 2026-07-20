<?php
/**
 * Keine Inhalte gefunden
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing found', 'nabu' ); ?></h2>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p>
			<?php
			printf(
				wp_kses(
					__( 'Ready to publish? <a href="%1$s">Write your first post</a>.', 'nabu' ),
					array( 'a' => array( 'href' => array() ) )
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>
		<?php elseif ( is_search() ) : ?>
		<p>
			<?php esc_html_e( 'Unfortunately no results were found. Please try a different search term.', 'nabu' ); ?>
		</p>
		<?php get_search_form(); ?>
		<?php else : ?>
		<p>
			<?php esc_html_e( 'No posts were found. Perhaps a search will help?', 'nabu' ); ?>
		</p>
		<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
