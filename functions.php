<?php
/**
 * NABU Theme - functions.php
 * Theme-Setup, Skripte, Widgets, Menüs und Customizer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme-Konstanten
define( 'NABU_VERSION', '1.2.6' );
define( 'NABU_DIR', get_template_directory() );
define( 'NABU_URI', get_template_directory_uri() );

// Zusätzliche Dateien einbinden
require NABU_DIR . '/inc/customizer.php';
require NABU_DIR . '/inc/template-tags.php';
require NABU_DIR . '/inc/class-nabu-rss-widget.php';

/**
 * Theme-Setup
 */
function nabu_setup() {
	load_theme_textdomain( 'nabu', NABU_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Block Editor (Gutenberg) Unterstützung
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'NABU Blau', 'nabu' ),
			'slug'  => 'nabu-blau',
			'color' => '#0068B4',
		),
		array(
			'name'  => esc_html__( 'NABU Dunkelblau', 'nabu' ),
			'slug'  => 'nabu-dunkelblau',
			'color' => '#003c68',
		),
		array(
			'name'  => esc_html__( 'NABU Grün', 'nabu' ),
			'slug'  => 'nabu-gruen',
			'color' => '#76b828',
		),
		array(
			'name'  => esc_html__( 'NABU Orange', 'nabu' ),
			'slug'  => 'nabu-orange',
			'color' => '#ef7c00',
		),
		array(
			'name'  => esc_html__( 'Hintergrund Beige', 'nabu' ),
			'slug'  => 'nabu-hintergrund',
			'color' => '#e3e2d4',
		),
		array(
			'name'  => esc_html__( 'Weiß', 'nabu' ),
			'slug'  => 'nabu-weiss',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html__( 'Text Dunkel', 'nabu' ),
			'slug'  => 'nabu-text',
			'color' => '#333333',
		),
	) );

	// Bildgrößen für das NABU-Design
	add_image_size( 'nabu-carousel', 940, 300, true );
	add_image_size( 'nabu-teaser',   220, 110, true );
	add_image_size( 'nabu-page',     680, 453, true );
	add_image_size( 'nabu-wide',     700, 350, true );

	// Custom Logo
	add_theme_support( 'custom-logo', array(
		'height'      => 152,
		'width'       => 160,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Navigationsmenüs registrieren
	register_nav_menus( array(
		'meta-nav'           => esc_html__( 'Meta-Navigation (oben rechts)', 'nabu' ),
		'main-nav'           => esc_html__( 'Haupt-Navigation (blaue Leiste)', 'nabu' ),
		'sidebar-nav'        => esc_html__( 'Sidebar-Navigation oben (neben Slider)', 'nabu' ),
		'sidebar-nav-bottom' => esc_html__( 'Sidebar-Navigation unten (neben Beiträgen)', 'nabu' ),
		'footer-nav'         => esc_html__( 'Footer-Navigation', 'nabu' ),
	) );
}
add_action( 'after_setup_theme', 'nabu_setup' );

/**
 * Inhaltsbreite festlegen
 */
function nabu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nabu_content_width', 700 );
}
add_action( 'after_setup_theme', 'nabu_content_width', 0 );

/**
 * Widget-Bereiche registrieren
 */
function nabu_widgets_init() {
	// Hauptsidebar (rechts)
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nabu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets in der rechten Seitenleiste.', 'nabu' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	// Sidebar unten (neben Beiträgen)
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar unten (neben Beiträgen)', 'nabu' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets in der rechten Seitenleiste unterhalb der Trennlinie.', 'nabu' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	// RSS-Feed Widget
	register_widget( 'Nabu_RSS_Widget' );

	// Footer-Bereiche (4 Spalten)
	$footer_labels = array(
		1 => esc_html__( 'Footer: Adresse & Kontakt', 'nabu' ),
		2 => esc_html__( 'Footer: Spalte 2', 'nabu' ),
		3 => esc_html__( 'Footer: Spalte 3', 'nabu' ),
		4 => esc_html__( 'Footer: Spendenkonto', 'nabu' ),
	);

	foreach ( $footer_labels as $i => $label ) {
		register_sidebar( array(
			'name'          => $label,
			'id'            => 'footer-' . $i,
			'description'   => sprintf( esc_html__( 'Widgets im %d. Footer-Bereich.', 'nabu' ), $i ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'nabu_widgets_init' );

/**
 * Skripte und Stile einbinden
 */
function nabu_scripts() {
	// Google Fonts: Source Sans Pro
	wp_enqueue_style(
		'nabu-fonts',
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,700italic&subset=latin',
		array(),
		null
	);

	// Haupt-CSS (originales NABU CSS)
	wp_enqueue_style(
		'nabu-main-css',
		NABU_URI . '/css/nabu.css',
		array( 'nabu-fonts' ),
		NABU_VERSION
	);

	// WordPress Theme CSS (style.css mit Korrekturen)
	wp_enqueue_style(
		'nabu-style',
		get_stylesheet_uri(),
		array( 'nabu-main-css' ),
		NABU_VERSION
	);

	// jQuery (Bootstrap 4 alpha benötigt eine spezifische Version)
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', NABU_URI . '/js/jquery-3.1.1.min.js', array(), '3.1.1', false );
	wp_enqueue_script( 'jquery' );

	// Bootstrap 4 alpha
	wp_enqueue_script(
		'nabu-bootstrap',
		NABU_URI . '/js/bootstrap.min.js',
		array( 'jquery' ),
		'4.0.0-alpha.5',
		true
	);

	// Slick Slider
	wp_enqueue_script(
		'nabu-slick',
		NABU_URI . '/js/slick.min.js',
		array( 'jquery' ),
		'1.6.0',
		true
	);

	// NABU Custom JS
	wp_enqueue_script(
		'nabu-js',
		NABU_URI . '/js/nabu.js',
		array( 'jquery', 'nabu-bootstrap', 'nabu-slick' ),
		NABU_VERSION,
		true
	);

	// Daten an nabu.js übergeben
	wp_localize_script( 'nabu-js', 'nabuVars', array(
		'homeUrl'           => esc_url( home_url( '/' ) ),
		'searchLabel'       => esc_html__( 'Suche', 'nabu' ),
		'moreLabel'         => esc_html__( 'mehr →', 'nabu' ),
	) );

	// Kommentar-Script wenn nötig
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nabu_scripts' );

/**
 * Custom Walker für die Haupt-Navigation (Bootstrap 4 alpha Klassen)
 */
class Nabu_Walker_Nav_Menu extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nav-item';

		if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
			$classes[] = 'active';
		}

		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		$atts          = array();
		$atts['href']  = ! empty( $item->url ) ? $item->url : '';
		$atts['class'] = 'nav-link';

		if ( in_array( 'current-menu-item', (array) $item->classes ) ) {
			$atts['class'] .= ' active';
		}

		// Benutzerdefinierte Klassen (z.B. nav-link-mitmachen) auf den Link übertragen
		$custom_link_classes = array_filter( (array) $item->classes, function( $c ) {
			return substr( $c, 0, 9 ) === 'nav-link-';
		} );
		if ( ! empty( $custom_link_classes ) ) {
			$atts['class'] .= ' ' . implode( ' ', $custom_link_classes );
		}

		if ( ! empty( $item->attr_title ) ) {
			$atts['title'] = $item->attr_title;
		}
		if ( ! empty( $item->target ) ) {
			$atts['target'] = $item->target;
			if ( '_blank' === $item->target ) {
				$atts['rel'] = 'noopener noreferrer';
			}
		}

		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value      = 'href' === $attr ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title        = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= isset( $args->link_before ) ? $args->link_before : '';
		$item_output .= $title;
		$item_output .= isset( $args->link_after ) ? $args->link_after : '';
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Custom Walker für die Sidebar-Navigation (Pills-Design)
 */
class Nabu_Walker_Sidebar_Nav extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nav-item';

		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		$link_class = 'nav-link';
		if ( in_array( 'current-menu-item', (array) $item->classes ) || in_array( 'current-menu-ancestor', (array) $item->classes ) ) {
			$link_class .= ' active';
		}

		$atts          = array();
		$atts['href']  = ! empty( $item->url ) ? $item->url : '';
		$atts['class'] = $link_class;

		if ( ! empty( $item->target ) ) {
			$atts['target'] = $item->target;
		}

		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value      = 'href' === $attr ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output  = '<a' . $attributes . '>';
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</a>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Körperklassen erweitern
 */
function nabu_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'unterseite-page';
	}
	return $classes;
}
add_filter( 'body_class', 'nabu_body_classes' );

/**
 * Block-Stilvarianten registrieren
 */
function nabu_register_block_styles() {
	register_block_style( 'core/button', array(
		'name'  => 'nabu-mitmachen',
		'label' => esc_html__( 'Mitmachen (Orange)', 'nabu' ),
	) );

	register_block_style( 'core/quote', array(
		'name'  => 'nabu-hervorhebung',
		'label' => esc_html__( 'NABU Hervorhebung', 'nabu' ),
	) );

	register_block_style( 'core/separator', array(
		'name'  => 'nabu',
		'label' => esc_html__( 'NABU Blau', 'nabu' ),
	) );

	register_block_style( 'core/image', array(
		'name'  => 'nabu-teaser',
		'label' => esc_html__( 'NABU Teaser', 'nabu' ),
	) );
}
add_action( 'init', 'nabu_register_block_styles' );

/**
 * Beiträge pro Seite für den Hauptseiten-Loop steuern
 */
function nabu_posts_per_page_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
		$query->set( 'posts_per_page', absint( get_theme_mod( 'nabu_posts_per_page', 5 ) ) );
	}
}
add_action( 'pre_get_posts', 'nabu_posts_per_page_filter' );

/**
 * Archiv-Beschreibung vor dem Inhalt
 */
function nabu_excerpt_more( $more ) {
	return ' [&hellip;] <a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'mehr', 'nabu' ) . '</a>';
}
add_filter( 'excerpt_more', 'nabu_excerpt_more' );

/**
 * Auszugslänge
 */
function nabu_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'nabu_excerpt_length', 999 );

/**
 * Dynamisch generierten CSS für Customizer-Farben ausgeben
 */
function nabu_customizer_css() {
	$primary_color = get_theme_mod( 'nabu_primary_color', '#0068B4' );
	$accent_color  = get_theme_mod( 'nabu_accent_color', '#ef7c00' );

	// Nur ausgeben wenn von Standard abweichend
	if ( '#0068B4' === $primary_color && '#ef7c00' === $accent_color ) {
		return;
	}

	$css = '';

	if ( '#0068B4' !== $primary_color ) {
		$css .= '
		.bg-primary, .navbar.navbar-dark.bg-primary { background-color: ' . esc_attr( $primary_color ) . ' !important; }
		.btn-primary { background-color: ' . esc_attr( $primary_color ) . ' !important; border-color: ' . esc_attr( $primary_color ) . ' !important; }
		.nav-pills .nav-item a.active { background-color: ' . esc_attr( $primary_color ) . ' !important; }
		footer { background: ' . esc_attr( $primary_color ) . ' !important; }
		.nav-tabs { border-color: ' . esc_attr( $primary_color ) . ' !important; }
		.nav-tabs .nav-link.active { border-color: ' . esc_attr( $primary_color ) . ' !important; color: ' . esc_attr( $primary_color ) . ' !important; }
		';
	}

	if ( '#ef7c00' !== $accent_color ) {
		$css .= '
		.nav-link-mitmachen { background: ' . esc_attr( $accent_color ) . ' !important; }
		.btn-danger { background-color: ' . esc_attr( $accent_color ) . ' !important; border-color: ' . esc_attr( $accent_color ) . ' !important; }
		';
	}

	if ( $css ) {
		echo '<style id="nabu-customizer-css">' . $css . '</style>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'nabu_customizer_css' );
