<?php
/**
 * Startseite Template
 * Zeigt Carousel (im Header), Neuigkeiten-Tabs mit Slider und Seiteninhalt
 */

get_header();
?>

<div class="container">
	<div class="row">

		<!-- Haupt-Bereich (9 Spalten) -->
		<div class="col-md-9">

			<?php
			// Mobile Sidebar-Menü-Toggle
			if ( has_nav_menu( 'sidebar-nav' ) ) :
			?>
			<a href="#mobilenavleft" class="hidden-sm-up mobilenavleft" aria-label="<?php esc_attr_e( 'Menü öffnen', 'nabu' ); ?>">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</a>
			<?php endif; ?>

			<!-- Tabs: Aktuelle Meldungen + Soziale Medien -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active"
						data-toggle="tab"
						href="#aktuelles"
						role="tab"
						aria-controls="aktuelles"
						aria-selected="true">
						<?php esc_html_e( 'Aktuelle', 'nabu' ); ?><span class="hidden-sm-up"><?php esc_html_e( 's', 'nabu' ); ?></span><span class="hidden-sm-down"> <?php esc_html_e( 'Meldungen', 'nabu' ); ?></span>
					</a>
				</li>
				<?php if ( get_theme_mod( 'nabu_social_youtube', '' ) ) : ?>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#youtube" role="tab" aria-controls="youtube">
						<i class="fa fa-youtube" aria-hidden="true"></i>
						<span class="screen-reader-text">YouTube</span>
					</a>
				</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'nabu_social_facebook', '' ) ) : ?>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#facebook" role="tab" aria-controls="facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<span class="screen-reader-text">Facebook</span>
					</a>
				</li>
				<?php endif; ?>
			</ul>

			<div class="row">
				<div class="tab-content">

					<!-- Tab: Aktuelle Meldungen -->
					<div class="tab-pane active" id="aktuelles" role="tabpanel">
						<div class="slick" id="nabu-news-slider">
							<?php
							$news_count = absint( get_theme_mod( 'nabu_news_count', 7 ) );
							$news_args  = array(
								'post_type'           => 'post',
								'posts_per_page'      => $news_count,
								'ignore_sticky_posts' => true,
							);
							$news_query = new WP_Query( $news_args );

							while ( $news_query->have_posts() ) :
								$news_query->the_post();
							?>
							<div class="col-md-4 teaser">
								<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
									<?php the_post_thumbnail( 'nabu-teaser', array( 'class' => 'img-responsive' ) ); ?>
								</a>
								<?php endif; ?>
								<h5>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h5>
								<p>
									<?php echo wp_trim_words( get_the_excerpt(), 20, ' [&hellip;]' ); ?>
									<a href="<?php the_permalink(); ?>" role="button">
										<?php esc_html_e( 'mehr →', 'nabu' ); ?>
									</a>
								</p>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div><!-- .slick -->

						<div class="col-md-12">
							<p>&nbsp;</p>
							<div class="btn-toolbar" role="toolbar">
								<?php
								$more_url = get_theme_mod( 'nabu_news_more_url', '' );
								if ( ! $more_url ) {
									$blog_page = get_option( 'page_for_posts' );
									$more_url  = $blog_page ? get_permalink( $blog_page ) : get_post_type_archive_link( 'post' );
								}
								if ( ! $more_url ) {
									$more_url = home_url( '/' );
								}
								?>
								<a href="<?php echo esc_url( $more_url ); ?>" class="btn btn-secondary">
									<?php esc_html_e( 'Weitere Meldungen im Überblick', 'nabu' ); ?> &rarr;
								</a>
								<div class="btn-group" role="group" aria-label="<?php esc_attr_e( 'Slider Navigation', 'nabu' ); ?>">
									<button class="btn btn-secondary" id="slickleft" aria-label="<?php esc_attr_e( 'Zurück', 'nabu' ); ?>">
										<i class="fa fa-arrow-left" aria-hidden="true"></i>
									</button>
									<button class="btn btn-secondary" id="slickright" aria-label="<?php esc_attr_e( 'Weiter', 'nabu' ); ?>">
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div><!-- #aktuelles -->

					<!-- Tab: YouTube (optional) -->
					<?php if ( get_theme_mod( 'nabu_social_youtube', '' ) ) : ?>
					<div class="tab-pane" id="youtube" role="tabpanel">
						<div class="col-md-12">
							<p>&nbsp;</p>
							<a href="<?php echo esc_url( get_theme_mod( 'nabu_social_youtube' ) ); ?>" class="btn btn-secondary" target="_blank" rel="noopener noreferrer">
								<i class="fa fa-youtube" aria-hidden="true"></i>
								<?php esc_html_e( 'Unser YouTube-Kanal', 'nabu' ); ?>
							</a>
						</div>
					</div>
					<?php endif; ?>

					<!-- Tab: Facebook (optional) -->
					<?php if ( get_theme_mod( 'nabu_social_facebook', '' ) ) : ?>
					<div class="tab-pane" id="facebook" role="tabpanel">
						<div class="col-md-12">
							<p>&nbsp;</p>
							<a href="<?php echo esc_url( get_theme_mod( 'nabu_social_facebook' ) ); ?>" class="btn btn-secondary" target="_blank" rel="noopener noreferrer">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								<?php esc_html_e( 'Unsere Facebook-Seite', 'nabu' ); ?>
							</a>
						</div>
					</div>
					<?php endif; ?>

				</div><!-- .tab-content -->
			</div><!-- .row -->

		</div><!-- .col-md-9 -->

		<!-- Sidebar (3 Spalten) -->
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- .row -->
</div><!-- .container -->

<hr>

<?php if ( have_posts() ) : ?>
<div class="container content">
	<div class="row">
		<div class="col-md-9">
			<?php if ( is_home() ) : ?>

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
						<p><?php
							echo wp_trim_words(
								get_the_content(),
								150,
								'&hellip; <a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Weiterlesen', 'nabu' ) . ' &rarr;</a>'
							);
						?></p>
					</div>
					<footer class="entry-footer">
						<?php nabu_posted_on(); ?>
						<?php nabu_entry_footer(); ?>
					</footer>
				</article>
				<hr>
				<?php endwhile; ?>

				<div class="nabu-pagination">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '&laquo;',
						'next_text' => '&raquo;',
					) );
					?>
				</div>

			<?php else : ?>

				<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Seiten:', 'nabu' ),
						'after'  => '</div>',
					) );
					?>
				</div>
				<?php endwhile; ?>

			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div><!-- .container.content -->
<?php endif; ?>

<?php get_footer(); ?>
