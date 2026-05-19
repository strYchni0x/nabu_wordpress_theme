<?php
/**
 * 404 - Seite nicht gefunden
 */

get_header();
?>

<div class="unterseite content">
	<div class="container">
		<div class="row">

			<div class="col-md-9">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Seite nicht gefunden', 'nabu' ); ?></h2>
				</header>

				<div class="page-content">
					<p class="lead">
						<?php esc_html_e( 'Die gesuchte Seite konnte leider nicht gefunden werden. Möglicherweise wurde sie verschoben oder gelöscht.', 'nabu' ); ?>
					</p>

					<form class="search-form form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="input-group">
							<input type="search"
								class="form-control"
								placeholder="<?php esc_attr_e( 'Suche nach...', 'nabu' ); ?>"
								name="s">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<?php esc_html_e( 'Suchen', 'nabu' ); ?>
								</button>
							</span>
						</div>
					</form>

					<p>&nbsp;</p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
						<i class="fa fa-home" aria-hidden="true"></i>
						<?php esc_html_e( 'Zur Startseite', 'nabu' ); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>
