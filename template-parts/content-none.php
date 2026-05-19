<?php
/**
 * Keine Inhalte gefunden
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nichts gefunden', 'nabu' ); ?></h2>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p>
			<?php
			printf(
				wp_kses(
					__( 'Bereit zum Veröffentlichen? <a href="%1$s">Schreiben Sie Ihren ersten Beitrag</a>.', 'nabu' ),
					array( 'a' => array( 'href' => array() ) )
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>
		<?php elseif ( is_search() ) : ?>
		<p>
			<?php esc_html_e( 'Leider wurden keine Ergebnisse gefunden. Bitte versuchen Sie einen anderen Suchbegriff.', 'nabu' ); ?>
		</p>
		<?php get_search_form(); ?>
		<?php else : ?>
		<p>
			<?php esc_html_e( 'Es wurden keine Beiträge gefunden. Vielleicht hilft die Suche?', 'nabu' ); ?>
		</p>
		<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
