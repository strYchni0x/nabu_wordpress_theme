<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Zum Inhalt springen', 'nabu' ); ?></a>

<div class="header">
	<div class="container">

		<!-- NABU-Logo -->
		<div class="nabu-logo">
			<?php nabu_logo(); ?>
		</div>

		<div class="header-content">
			<!-- Meta-Navigation (oben rechts) + Suche -->
			<nav class="nav metanav hidden-md-down" aria-label="<?php esc_attr_e( 'Meta-Navigation', 'nabu' ); ?>">
				<?php nabu_meta_navigation(); ?>
				<form class="form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="input-group">
						<input type="search"
							class="form-control"
							placeholder="<?php esc_attr_e( 'Suche nach...', 'nabu' ); ?>"
							value="<?php echo esc_attr( get_search_query() ); ?>"
							name="s"
							title="<?php esc_attr_e( 'Suchbegriff eingeben', 'nabu' ); ?>">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<?php esc_html_e( 'Suchen', 'nabu' ); ?>
							</button>
						</span>
					</div>
				</form>
			</nav>

			<!-- Blaue Leiste (ohne Navigation) -->
			<nav class="navbar navbar-dark bg-primary" aria-label="<?php esc_attr_e( 'Haupt-Navigation', 'nabu' ); ?>">
			</nav>
		</div><!-- .header-content -->

		<?php if ( is_front_page() && ! is_paged() ) : ?>
			<?php
			// Carousel nur auf der Startseite
			$carousel_count = absint( get_theme_mod( 'nabu_carousel_count', 3 ) );
			$carousel_cta   = get_theme_mod( 'nabu_carousel_cta', esc_html__( 'Mehr erfahren', 'nabu' ) );
			$carousel_args  = array(
				'post_type'      => 'post',
				'posts_per_page' => $carousel_count,
				'meta_key'       => '_thumbnail_id',
				'meta_compare'   => 'EXISTS',
			);
			$carousel_query = new WP_Query( $carousel_args );
			if ( $carousel_query->have_posts() ) :
			?>
			<div id="nabu-carousel" class="carousel slide" data-ride="carousel" aria-label="<?php esc_attr_e( 'Bildslider', 'nabu' ); ?>">
				<ol class="carousel-indicators">
					<?php $ci = 0; while ( $carousel_query->have_posts() ) : $carousel_query->the_post(); ?>
					<li data-target="#nabu-carousel"
						data-slide-to="<?php echo esc_attr( $ci ); ?>"
						<?php if ( 0 === $ci ) : ?>class="active" aria-current="true"<?php endif; ?>>
					</li>
					<?php $ci++; endwhile; $carousel_query->rewind_posts(); ?>
				</ol>

				<div class="carousel-inner" role="listbox">
					<?php $ci = 0; while ( $carousel_query->have_posts() ) : $carousel_query->the_post(); ?>
					<div class="carousel-item <?php echo 0 === $ci ? 'active' : ''; ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'nabu-carousel', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
						<?php endif; ?>
						<div class="carousel-caption">
							<h2><?php the_title(); ?></h2>
							<p>
								<a class="btn btn-danger"
									href="<?php the_permalink(); ?>"
									role="button">
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
									<?php echo esc_html( $carousel_cta ); ?>
								</a>
							</p>
						</div>
					</div>
					<?php $ci++; endwhile; wp_reset_postdata(); ?>
				</div>

				<a class="left carousel-control" href="#nabu-carousel" role="button" data-slide="prev">
					<span class="icon-prev" aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
					<span class="sr-only"><?php esc_html_e( 'Zurück', 'nabu' ); ?></span>
				</a>
				<a class="right carousel-control" href="#nabu-carousel" role="button" data-slide="next">
					<span class="icon-next" aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
					<span class="sr-only"><?php esc_html_e( 'Weiter', 'nabu' ); ?></span>
				</a>
			</div><!-- #nabu-carousel -->
			<?php endif; // carousel_query->have_posts() ?>

		<?php else : ?>
			<?php nabu_breadcrumb(); ?>
		<?php endif; ?>

	</div><!-- .container -->
</div><!-- .header -->

<div id="main-content">
