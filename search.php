<?php
/**
 * Suchergebnis-Template
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<div class="col-md-9">

				<header class="page-header">
					<h2 class="page-title">
						<?php
						printf(
							esc_html__( 'Search results for: %s', 'nabu' ),
							'<em>' . esc_html( get_search_query() ) . '</em>'
						);
						?>
					</h2>
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
						<?php
						$post_type_object = get_post_type_object( get_post_type() );
						if ( $post_type_object ) {
							echo '<span class="post-type-label">' . esc_html( $post_type_object->labels->singular_name ) . '</span> ';
						}
						the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
						?>
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
					'prev_text' => '&larr; ' . esc_html__( 'Previous results', 'nabu' ),
					'next_text' => esc_html__( 'Next results', 'nabu' ) . ' &rarr;',
				) );
				?>

				<?php else : ?>

				<p class="lead">
					<?php
					printf(
						esc_html__( 'No results were found for "%s". Please try a different search term.', 'nabu' ),
						'<em>' . esc_html( get_search_query() ) . '</em>'
					);
					?>
				</p>

				<form class="search-form form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="input-group">
						<input type="search"
							class="form-control"
							placeholder="<?php esc_attr_e( 'Enter a search term...', 'nabu' ); ?>"
							name="s"
							value="<?php echo esc_attr( get_search_query() ); ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<?php esc_html_e( 'Search', 'nabu' ); ?>
							</button>
						</span>
					</div>
				</form>

				<?php endif; ?>

			</div><!-- .col-md-9 -->

			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .unterseite -->

<?php get_footer(); ?>
