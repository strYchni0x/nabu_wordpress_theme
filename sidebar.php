<?php
/**
 * Sidebar Template (rechte Spalte)
 */
?>
<aside class="sidebar" role="complementary">

	<!-- Sidebar-Navigation (Pills) -->
	<?php if ( has_nav_menu( 'sidebar-nav' ) ) : ?>
	<nav class="nav-main-right hidden-sm-down" aria-label="<?php esc_attr_e( 'Sidebar-Navigation', 'nabu' ); ?>">
		<?php nabu_sidebar_nav(); ?>
	</nav>
	<?php endif; ?>

	<!-- Widget-Bereich -->
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<p>&nbsp;</p>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>

</aside>
