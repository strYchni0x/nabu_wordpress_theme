<?php
/**
 * Sidebar-Template unten (neben Beiträgen)
 */
?>
<aside class="sidebar" role="complementary">

	<!-- Sidebar-Navigation unten (Pills) -->
	<?php if ( has_nav_menu( 'sidebar-nav-bottom' ) ) : ?>
	<nav class="nav-main-right hidden-sm-down" aria-label="<?php esc_attr_e( 'Sidebar-Navigation unten', 'nabu' ); ?>">
		<?php nabu_sidebar_bottom_nav(); ?>
	</nav>
	<?php endif; ?>

	<!-- Widget-Bereich unten -->
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<p>&nbsp;</p>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	<?php endif; ?>

</aside>
