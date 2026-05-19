<?php
/**
 * Einzelner Beitrag
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<!-- Beitrag (9 Spalten) -->
			<div class="col-md-9">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						<div class="entry-meta">
							<?php nabu_posted_on(); ?>
						</div>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail( 'nabu-page', array( 'class' => 'img-responsive', 'alt' => esc_attr( get_the_title() ) ) ); ?>
					</div>
					<p>&nbsp;</p>
					<?php endif; ?>

					<div class="entry-content">
						<?php
						the_content( sprintf(
							wp_kses(
								__( 'Weiterlesen<span class="screen-reader-text"> "%s"</span>', 'nabu' ),
								array( 'span' => array( 'class' => array() ) )
							),
							wp_kses_post( get_the_title() )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Seiten:', 'nabu' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<footer class="entry-footer">
						<?php nabu_entry_footer(); ?>
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									__( 'Beitrag bearbeiten <span class="screen-reader-text">"%s"</span>', 'nabu' ),
									array( 'span' => array( 'class' => array() ) )
								),
								wp_kses_post( get_the_title() )
							),
							'<span class="edit-link"> | ',
							'</span>'
						);
						?>
					</footer>
				</article>

				<!-- Vorheriger / Nächster Beitrag -->
				<nav class="navigation post-navigation" aria-label="<?php esc_attr_e( 'Beitragsnavigation', 'nabu' ); ?>">
					<div class="nav-links">
						<?php
						previous_post_link( '<div class="nav-previous">%link</div>', '&larr; %title' );
						next_post_link( '<div class="nav-next">%link</div>', '%title &rarr;' );
						?>
					</div>
				</nav>

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
