<?php
/**
 * NABU Theme Template-Hilfsfunktionen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Beitragsmeta (Datum, Autor, Kategorien) ausgeben
 */
function nabu_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: Veröffentlichungsdatum */
		esc_html_x( 'Veröffentlicht am %s', 'post date', 'nabu' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Kategorien und Tags ausgeben
 */
function nabu_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'nabu' ) );
		if ( $categories_list ) {
			printf(
				'<span class="cat-links">' . esc_html__( 'Kategorien: %1$s', 'nabu' ) . '</span>',
				$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}

		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'nabu' ) );
		if ( $tags_list ) {
			printf(
				'<span class="tags-links"> &middot; ' . esc_html__( 'Schlagwörter: %1$s', 'nabu' ) . '</span>',
				$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"> &middot; ';
		comments_popup_link(
			sprintf(
				wp_kses(
					__( 'Kommentieren <span class="screen-reader-text">für %s</span>', 'nabu' ),
					array( 'span' => array( 'class' => array() ) )
				),
				wp_kses_post( get_the_title() )
			)
		);
		echo '</span>';
	}
}

/**
 * Breadcrumb ausgeben
 */
function nabu_breadcrumb() {
	global $post;
	echo '<nav class="breadcrumb-wrap">';
	echo '<a href="#mobilenavleft" class="hidden-sm-up mobilenavleft"><i class="fa fa-bars" aria-hidden="true"></i></a>';
	echo '<ol class="breadcrumb">';
	echo '<li class="breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i></a></li>';

	if ( is_category() || is_single() ) {
		$cat = get_the_category();
		if ( ! empty( $cat ) ) {
			echo '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $cat[0]->term_id ) ) . '">' . esc_html( $cat[0]->cat_name ) . '</a></li>';
		}
		if ( is_single() ) {
			echo '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
		}
	} elseif ( is_page() ) {
		if ( $post->post_parent ) {
			$ancestors = get_post_ancestors( $post->ID );
			$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $ancestor ) {
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
			}
		}
		echo '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_search() ) {
		echo '<li class="breadcrumb-item active">' . sprintf( esc_html__( 'Suche: "%s"', 'nabu' ), esc_html( get_search_query() ) ) . '</li>';
	} elseif ( is_tag() ) {
		echo '<li class="breadcrumb-item active">' . sprintf( esc_html__( 'Schlagwort: %s', 'nabu' ), single_tag_title( '', false ) ) . '</li>';
	} elseif ( is_author() ) {
		echo '<li class="breadcrumb-item active">' . sprintf( esc_html__( 'Autor: %s', 'nabu' ), esc_html( get_the_author() ) ) . '</li>';
	} elseif ( is_archive() ) {
		echo '<li class="breadcrumb-item active">' . esc_html( get_the_archive_title() ) . '</li>';
	} elseif ( is_404() ) {
		echo '<li class="breadcrumb-item active">' . esc_html__( 'Seite nicht gefunden', 'nabu' ) . '</li>';
	}

	echo '</ol>';
	echo '</nav>';
}

/**
 * Hauptnavigation ausgeben (Desktop + Mobile)
 */
function nabu_main_navigation() {
	$walker = new Nabu_Walker_Nav_Menu();

	// Desktop-Navigation
	echo '<div class="navbar-toggleable-md hidden-md-down">';
	if ( has_nav_menu( 'main-nav' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'main-nav',
			'container'      => false,
			'menu_class'     => 'nav navbar-nav',
			'walker'         => $walker,
			'fallback_cb'    => '__return_false',
		) );
	} else {
		nabu_default_main_nav();
	}
	echo '</div>';

	// Mobile-Navigation
	echo '<div class="navbar-toggleable-md hidden-lg-up collapse" id="mobilenav">';
	if ( has_nav_menu( 'main-nav' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'main-nav',
			'container'      => false,
			'menu_class'     => 'nav',
			'walker'         => $walker,
			'fallback_cb'    => '__return_false',
		) );
	} else {
		nabu_default_main_nav();
	}
	echo '</div>';
}

/**
 * Standard-Navigation wenn kein Menü konfiguriert
 */
function nabu_default_main_nav() {
	echo '<ul class="nav navbar-nav">';
	echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Startseite', 'nabu' ) . '</a></li>';
	wp_list_pages( array(
		'title_li' => '',
		'before'   => '<li class="nav-item">',
		'after'    => '</li>',
		'walker'   => new Nabu_Walker_Nav_Menu(),
	) );
	echo '</ul>';
}

/**
 * Meta-Navigation ausgeben
 */
function nabu_meta_navigation() {
	if ( has_nav_menu( 'meta-nav' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'meta-nav',
			'container'      => false,
			'menu_class'     => '',
			'items_wrap'     => '%3$s',
			'link_class'     => 'nav-link',
			'fallback_cb'    => '__return_false',
		) );
	} else {
		// Fallback: Customizer-Links
		$links = array(
			array(
				'text' => get_theme_mod( 'nabu_meta_link_1_text', 'NABU' ),
				'url'  => get_theme_mod( 'nabu_meta_link_1_url', 'https://www.nabu.de' ),
			),
			array(
				'text' => get_theme_mod( 'nabu_meta_link_2_text', 'Newsletter' ),
				'url'  => get_theme_mod( 'nabu_meta_link_2_url', '' ),
			),
			array(
				'text' => get_theme_mod( 'nabu_meta_link_3_text', 'Shop' ),
				'url'  => get_theme_mod( 'nabu_meta_link_3_url', '' ),
			),
		);

		foreach ( $links as $link ) {
			if ( ! empty( $link['url'] ) && ! empty( $link['text'] ) ) {
				echo '<a class="nav-link" href="' . esc_url( $link['url'] ) . '">' . esc_html( $link['text'] ) . '</a>';
			}
		}
	}
}

/**
 * SVG-Icon-Pfade für Plattformen ohne Font-Awesome-4-Icon
 * Quellen: simpleicons.org (CC0)
 */
function nabu_get_social_svg( $key ) {
	$svgs = array(
		'svg-mastodon' => array(
			'viewBox' => '0 0 24 24',
			'path'    => 'M23.268 5.313c-.35-2.578-2.617-4.61-5.304-5.004C17.51.242 15.792 0 11.813 0h-.03c-3.98 0-4.835.242-5.288.309C3.882.692 1.496 2.518.917 5.127.64 6.412.61 7.837.661 9.143c.074 1.874.088 3.745.26 5.611.118 1.24.325 2.47.62 3.68.55 2.237 2.777 4.098 4.96 4.857 2.336.792 4.849.923 7.256.38.265-.061.527-.132.786-.213.585-.184 1.27-.39 1.774-.753a.057.057 0 0 0 .023-.043v-1.809a.052.052 0 0 0-.02-.041.053.053 0 0 0-.046-.01 20.282 20.282 0 0 1-4.709.545c-2.73 0-3.463-1.284-3.674-1.818a5.593 5.593 0 0 1-.319-1.433.053.053 0 0 1 .066-.054c1.517.363 3.072.546 4.632.546.376 0 .75 0 1.125-.01 1.57-.044 3.224-.124 4.768-.422.038-.008.077-.015.11-.024 2.435-.464 4.753-1.92 4.989-5.604.008-.145.03-1.52.03-1.67.002-.512.167-3.63-.024-5.545zm-3.748 9.195h-2.561V8.29c0-1.309-.55-1.976-1.67-1.976-1.23 0-1.846.79-1.846 2.35v3.403h-2.546V8.663c0-1.56-.617-2.35-1.848-2.35-1.112 0-1.668.668-1.67 1.977v6.218H4.822V8.102c0-1.31.337-2.35 1.011-3.12.696-.77 1.608-1.164 2.74-1.164 1.311 0 2.302.5 2.962 1.498l.638 1.06.638-1.06c.66-.999 1.65-1.498 2.96-1.498 1.13 0 2.043.395 2.74 1.164.675.77 1.012 1.81 1.012 3.12z',
		),
		'svg-bluesky'  => array(
			'viewBox' => '0 0 24 24',
			'path'    => 'M12 10.8c-1.087-2.114-4.046-6.053-6.798-7.995C2.566.944 1.561 1.266.902 1.565.139 1.908 0 3.08 0 3.768c0 .69.378 5.65.624 6.479.815 2.736 3.713 3.66 6.383 3.364.136-.02.275-.039.415-.056-.138.022-.276.04-.415.056-3.912.58-7.387 2.005-2.83 7.078 5.013 5.19 6.87-1.113 7.823-4.308.953 3.195 2.05 9.271 7.733 4.308 4.267-4.308 1.172-6.498-2.74-7.078a8.741 8.741 0 0 1-.415-.056c.14.017.279.036.415.056 2.67.297 5.568-.628 6.383-3.364.246-.828.624-5.79.624-6.478 0-.69-.139-1.861-.902-2.204-.659-.299-1.664-.62-4.3 1.24C16.046 4.748 13.087 8.687 12 10.8z',
		),
	);
	return isset( $svgs[ $key ] ) ? $svgs[ $key ] : null;
}

/**
 * Social Media Links im Footer ausgeben
 */
function nabu_social_links() {
	$social = array(
		'nabu_social_facebook'  => array( 'icon' => 'fa-facebook',  'label' => 'Facebook' ),
		'nabu_social_twitter'   => array( 'icon' => 'fa-twitter',   'label' => 'Twitter/X' ),
		'nabu_social_youtube'   => array( 'icon' => 'fa-youtube',   'label' => 'YouTube' ),
		'nabu_social_instagram' => array( 'icon' => 'fa-instagram', 'label' => 'Instagram' ),
		'nabu_social_mastodon'  => array( 'icon' => 'svg-mastodon', 'label' => 'Mastodon' ),
		'nabu_social_bluesky'   => array( 'icon' => 'svg-bluesky',  'label' => 'BlueSky' ),
		'nabu_social_email'     => array( 'icon' => 'fa-envelope',  'label' => 'E-Mail' ),
	);

	$has_links = false;
	foreach ( $social as $key => $data ) {
		if ( get_theme_mod( $key ) ) {
			$has_links = true;
			break;
		}
	}

	if ( ! $has_links ) {
		return;
	}

	echo '<div class="footer-social">';
	foreach ( $social as $key => $data ) {
		$url = get_theme_mod( $key, '' );
		if ( ! $url ) {
			continue;
		}
		echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer me" title="' . esc_attr( $data['label'] ) . '">';

		if ( substr( $data['icon'], 0, 4 ) === 'svg-' ) {
			// Inline-SVG für Mastodon / BlueSky
			$svg = nabu_get_social_svg( $data['icon'] );
			if ( $svg ) {
				echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="' . esc_attr( $svg['viewBox'] ) . '" width="2em" height="2em" fill="currentColor" aria-hidden="true" focusable="false">'
					. '<path d="' . esc_attr( $svg['path'] ) . '"/>'
					. '</svg>';
			}
		} else {
			// Font Awesome Icon
			echo '<i class="fa ' . esc_attr( $data['icon'] ) . ' fa-2x" aria-hidden="true"></i>';
		}

		echo '<span class="screen-reader-text">' . esc_html( $data['label'] ) . '</span>';
		echo '</a>';
	}
	echo '</div>';
}

/**
 * Logo ausgeben
 */
function nabu_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		echo '<a href="' . esc_url( home_url( '/' ) ) . '">';
		echo '<img src="' . esc_url( NABU_URI . '/img/logo-default.jpg' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" width="160" height="134">';
		echo '</a>';
	}
}

/**
 * Sidebar-Navigation oben ausgeben
 */
function nabu_sidebar_nav() {
	if ( has_nav_menu( 'sidebar-nav' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'sidebar-nav',
			'container'      => false,
			'menu_class'     => 'nav nav-pills nav-stacked',
			'walker'         => new Nabu_Walker_Sidebar_Nav(),
			'fallback_cb'    => '__return_false',
		) );
	}
}

/**
 * Sidebar-Navigation unten ausgeben
 */
function nabu_sidebar_bottom_nav() {
	if ( has_nav_menu( 'sidebar-nav-bottom' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'sidebar-nav-bottom',
			'container'      => false,
			'menu_class'     => 'nav nav-pills nav-stacked',
			'walker'         => new Nabu_Walker_Sidebar_Nav(),
			'fallback_cb'    => '__return_false',
		) );
	}
}
