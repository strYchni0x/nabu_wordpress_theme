<?php
/**
 * Archiv-Template (Kategorien, Tags, Datum, Autor)
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<div class="col-md-9">

				<header class="page-header">
					<h2 class="page-title">
						<?php the_archive_title(); ?>
					</h2>
					<?php the_archive_description( '<div class="taxonomy-description lead">', '</div>' ); ?>
				</header>

				<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'teaser' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'nabu-teaser', array( 'class' => 'img-responsive' ) ); ?>
					</a>
					<?php endif; ?>

					<header class="entry-header">
						<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
						<div class="entry-meta">
							<?php nabu_posted_on(); ?>
						</div>
					</header>

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</article>

				<hr>

				<?php endwhile; ?>

				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => '&larr; ' . esc_html__( 'Neuere Beiträge', 'nabu' ),
					'next_text' => esc_html__( 'Ältere Beiträge', 'nabu' ) . ' &rarr;',
				) );
				?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			</div><!-- .col-md-9 -->

			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .unterseite -->

<?php get_footer(); ?>
