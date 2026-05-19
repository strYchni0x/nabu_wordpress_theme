<?php
/**
 * Haupt-Index (Blog-Übersicht, Fallback)
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<!-- Beiträge (9 Spalten) -->
			<div class="col-md-9">

				<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Aktuelle Meldungen', 'nabu' ); ?></h2>
				</header>
				<?php endif; ?>

				<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'teaser' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'nabu-wide', array( 'class' => 'img-responsive' ) ); ?>
					</a>
					<?php endif; ?>

					<header class="entry-header">
						<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
					</header>

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>

					<footer class="entry-footer">
						<?php nabu_posted_on(); ?>
						<?php nabu_entry_footer(); ?>
					</footer>
				</article>

				<hr>

				<?php endwhile; ?>

				<!-- Seitennavigation -->
				<div class="d-flex justify-content-between">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '&larr; ' . esc_html__( 'Neuere Beiträge', 'nabu' ),
						'next_text' => esc_html__( 'Ältere Beiträge', 'nabu' ) . ' &rarr;',
					) );
					?>
				</div>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			</div><!-- .col-md-9 -->

			<!-- Sidebar (3 Spalten) -->
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .unterseite -->

<?php get_footer(); ?>
