</div><!-- #main-content -->

<footer>
	<div class="container">
		<div class="row">

			<!-- Footer-Spalte 1: Adresse & Kontakt -->
			<div class="col-md-3">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php else : ?>
					<h5><?php esc_html_e( 'Adresse & Kontakt', 'nabu' ); ?></h5>
					<?php
					$org     = get_theme_mod( 'nabu_footer_org_name' );
					$street  = get_theme_mod( 'nabu_footer_street' );
					$zipcity = get_theme_mod( 'nabu_footer_zip_city' );
					$phone   = get_theme_mod( 'nabu_footer_phone' );
					$email   = get_theme_mod( 'nabu_footer_email' );
					$website = get_theme_mod( 'nabu_footer_website' );

					if ( $org || $street || $zipcity ) : ?>
						<address>
							<?php if ( $org )     : ?><strong><?php echo esc_html( $org ); ?></strong><br><?php endif; ?>
							<?php if ( $street )  : ?><?php echo esc_html( $street ); ?><br><?php endif; ?>
							<?php if ( $zipcity ) : ?><?php echo esc_html( $zipcity ); ?><?php endif; ?>
						</address>
					<?php endif; ?>
					<?php if ( $phone ) : ?>
						<p><?php esc_html_e( 'Tel.:', 'nabu' ); ?> <?php echo esc_html( $phone ); ?></p>
					<?php endif; ?>
					<?php if ( $email ) : ?>
						<p><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
					<?php endif; ?>
					<?php if ( $website ) : ?>
						<p><a href="<?php echo esc_url( $website ); ?>"><?php echo esc_html( $website ); ?></a></p>
					<?php elseif ( ! $org && ! $street && ! $zipcity && ! $phone && ! $email ) : ?>
						<p><?php bloginfo( 'name' ); ?></p>
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_url( home_url( '/' ) ); ?></a></p>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<!-- Footer-Spalte 2 -->
			<div class="col-md-3">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php else : ?>
					<h5><?php bloginfo( 'name' ); ?></h5>
					<p><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div>

			<!-- Footer-Spalte 3 -->
			<div class="col-md-3">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php else : ?>
					<h5><?php esc_html_e( 'Navigation', 'nabu' ); ?></h5>
					<?php if ( has_nav_menu( 'footer-nav' ) ) : ?>
						<?php wp_nav_menu( array(
							'theme_location' => 'footer-nav',
							'container'      => false,
							'menu_class'     => 'footer-links',
							'depth'          => 1,
							'fallback_cb'    => '__return_false',
						) ); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<!-- Footer-Spalte 4: Spendenkonto -->
			<div class="col-md-3">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php else : ?>
					<h5><?php esc_html_e( 'Spendenkonto', 'nabu' ); ?></h5>
					<?php
					$holder = get_theme_mod( 'nabu_footer_donation_holder' );
					$bank   = get_theme_mod( 'nabu_footer_donation_bank' );
					$iban   = get_theme_mod( 'nabu_footer_donation_iban' );
					$bic    = get_theme_mod( 'nabu_footer_donation_bic' );
					$note   = get_theme_mod( 'nabu_footer_donation_note' );

					if ( $holder || $bank || $iban || $bic ) : ?>
						<table class="footer-donation-table">
							<?php if ( $holder ) : ?>
								<tr><th><?php esc_html_e( 'Kontoinhaber', 'nabu' ); ?>:</th><td><?php echo esc_html( $holder ); ?></td></tr>
							<?php endif; ?>
							<?php if ( $bank ) : ?>
								<tr><th><?php esc_html_e( 'Bank', 'nabu' ); ?>:</th><td><?php echo esc_html( $bank ); ?></td></tr>
							<?php endif; ?>
							<?php if ( $iban ) : ?>
								<tr><th>IBAN:</th><td><?php echo esc_html( $iban ); ?></td></tr>
							<?php endif; ?>
							<?php if ( $bic ) : ?>
								<tr><th>BIC:</th><td><?php echo esc_html( $bic ); ?></td></tr>
							<?php endif; ?>
						</table>
					<?php endif; ?>
					<?php if ( $note ) : ?>
						<p><?php echo nl2br( esc_html( $note ) ); ?></p>
					<?php endif; ?>
				<?php endif; ?>
			</div>

		</div><!-- .row -->

		<!-- Soziale Medien -->
		<?php nabu_social_links(); ?>

	</div><!-- .container -->
</footer>

<nav id="mobilenavleft" class="hidden-md-up" aria-label="<?php esc_attr_e( 'Mobile Sidebar-Navigation', 'nabu' ); ?>"></nav>

<?php wp_footer(); ?>
</body>
</html>
