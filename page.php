<?php
/**
 * Unterseiten-Template (statische Seiten)
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<!-- Haupt-Inhalt (9 Spalten) -->
			<div class="col-md-9">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail( 'nabu-page', array( 'class' => 'img-responsive' ) ); ?>
					</div>
					<p>&nbsp;</p>
					<?php endif; ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Seiten:', 'nabu' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									__( 'Seite bearbeiten <span class="screen-reader-text">"%s"</span>', 'nabu' ),
									array( 'span' => array( 'class' => array() ) )
								),
								wp_kses_post( get_the_title() )
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer>
					<?php endif; ?>
				</article>

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>

				<?php endwhile; endif; ?>

			</div><!-- .col-md-9 -->

			<!-- Sidebar (3 Spalten) -->
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .unterseite -->

<?php get_footer(); ?>
