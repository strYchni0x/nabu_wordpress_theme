<?php
/**
 * NABU Theme Customizer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nabu_customize_register( $wp_customize ) {

	// --------------------------------------------------------
	// NABU Farben
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_colors', array(
		'title'    => esc_html__( 'NABU Farben', 'nabu' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'nabu_primary_color', array(
		'default'           => '#0068B4',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nabu_primary_color', array(
		'label'   => esc_html__( 'Primärfarbe (Navigation & Footer)', 'nabu' ),
		'section' => 'nabu_colors',
	) ) );

	$wp_customize->add_setting( 'nabu_accent_color', array(
		'default'           => '#ef7c00',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nabu_accent_color', array(
		'label'       => esc_html__( 'Akzentfarbe ("Mitmachen"-Button)', 'nabu' ),
		'section'     => 'nabu_colors',
		'description' => esc_html__( 'Farbe für den "Mitmachen"-Button in der Navigation. CSS-Klasse: nav-link-mitmachen', 'nabu' ),
	) ) );

	// --------------------------------------------------------
	// Soziale Medien
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_social', array(
		'title'    => esc_html__( 'Soziale Medien', 'nabu' ),
		'priority' => 40,
	) );

	$social_fields = array(
		'nabu_social_facebook'  => array( 'label' => 'Facebook URL',              'icon' => 'fa-facebook' ),
		'nabu_social_twitter'   => array( 'label' => 'Twitter/X URL',             'icon' => 'fa-twitter' ),
		'nabu_social_youtube'   => array( 'label' => 'YouTube URL',               'icon' => 'fa-youtube' ),
		'nabu_social_instagram' => array( 'label' => 'Instagram URL',             'icon' => 'fa-instagram' ),
		'nabu_social_mastodon'  => array( 'label' => 'Mastodon URL',              'icon' => 'svg-mastodon' ),
		'nabu_social_bluesky'   => array( 'label' => 'BlueSky URL',               'icon' => 'svg-bluesky' ),
		'nabu_social_email'     => array( 'label' => 'E-Mail-Adresse (mailto:)',  'icon' => 'fa-envelope' ),
	);

	foreach ( $social_fields as $setting_id => $field ) {
		$wp_customize->add_setting( $setting_id, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'   => $field['label'],
			'section' => 'nabu_social',
			'type'    => 'url',
		) );
	}

	// --------------------------------------------------------
	// Meta-Navigation Links (Top-Leiste)
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_meta_nav', array(
		'title'       => esc_html__( 'Meta-Navigation Links', 'nabu' ),
		'priority'    => 35,
		'description' => esc_html__( 'Zusätzliche Links in der Meta-Navigation oben rechts. Alternativ: Menü "Meta-Navigation" unter Design > Menüs konfigurieren.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_meta_link_1_text', array(
		'default'           => 'NABU',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_meta_link_1_text', array(
		'label'   => esc_html__( 'Link 1 - Text', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'nabu_meta_link_1_url', array(
		'default'           => 'https://www.nabu.de',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'nabu_meta_link_1_url', array(
		'label'   => esc_html__( 'Link 1 - URL', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'nabu_meta_link_2_text', array(
		'default'           => 'Newsletter',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_meta_link_2_text', array(
		'label'   => esc_html__( 'Link 2 - Text', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'nabu_meta_link_2_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'nabu_meta_link_2_url', array(
		'label'   => esc_html__( 'Link 2 - URL', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'nabu_meta_link_3_text', array(
		'default'           => 'Shop',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_meta_link_3_text', array(
		'label'   => esc_html__( 'Link 3 - Text', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'nabu_meta_link_3_url', array(
		'default'           => 'https://www.nabu.de/nabu/shop/',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'nabu_meta_link_3_url', array(
		'label'   => esc_html__( 'Link 3 - URL', 'nabu' ),
		'section' => 'nabu_meta_nav',
		'type'    => 'url',
	) );

	// --------------------------------------------------------
	// Startseiten-Carousel
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_carousel', array(
		'title'       => esc_html__( 'Startseite – Bildslider', 'nabu' ),
		'priority'    => 45,
		'description' => esc_html__( 'Der Slider auf der Startseite zeigt automatisch die letzten Beiträge mit Beitragsbild an. Aktivieren Sie ein Beitragsbild, um einen Beitrag im Slider anzuzeigen.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_carousel_count', array(
		'default'           => '3',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_carousel_count', array(
		'label'       => esc_html__( 'Anzahl Slider-Bilder', 'nabu' ),
		'section'     => 'nabu_carousel',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 10 ),
	) );

	$wp_customize->add_setting( 'nabu_carousel_cta', array(
		'default'           => 'Mehr erfahren',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_carousel_cta', array(
		'label'   => esc_html__( 'Button-Text im Slider', 'nabu' ),
		'section' => 'nabu_carousel',
		'type'    => 'text',
	) );

	// --------------------------------------------------------
	// Startseite – Neuigkeiten-Slider
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_news', array(
		'title'    => esc_html__( 'Startseite – Neuigkeiten', 'nabu' ),
		'priority' => 46,
	) );

	$wp_customize->add_setting( 'nabu_news_count', array(
		'default'           => '7',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_news_count', array(
		'label'       => esc_html__( 'Anzahl Neuigkeiten im Slider', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 20 ),
	) );

	$wp_customize->add_setting( 'nabu_news_more_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'nabu_news_more_url', array(
		'label'       => esc_html__( 'URL "Weitere Meldungen" Button', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'url',
		'description' => esc_html__( 'Leer lassen für automatische Blog-Seiten-URL.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_posts_per_page', array(
		'default'           => '5',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_posts_per_page', array(
		'label'       => esc_html__( 'Beiträge pro Seite (Hauptseite)', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 20 ),
	) );

	// --------------------------------------------------------
	// Footer – Adresse & Kontakt
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_footer_contact', array(
		'title'       => esc_html__( 'Footer – Adresse & Kontakt', 'nabu' ),
		'priority'    => 50,
		'description' => esc_html__( 'Wird in Footer-Spalte 1 angezeigt, sofern kein Widget zugewiesen ist.', 'nabu' ),
	) );

	$footer_contact_fields = array(
		'nabu_footer_org_name'  => array( 'label' => 'Name der Gruppe / Organisation', 'type' => 'text',     'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_street'    => array( 'label' => 'Straße und Hausnummer',           'type' => 'text',     'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_zip_city'  => array( 'label' => 'PLZ und Ort',                     'type' => 'text',     'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_phone'     => array( 'label' => 'Telefon',                          'type' => 'text',     'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_email'     => array( 'label' => 'E-Mail-Adresse',                   'type' => 'email',    'sanitize' => 'sanitize_email'      ),
		'nabu_footer_website'   => array( 'label' => 'Website-URL',                      'type' => 'url',      'sanitize' => 'esc_url_raw'         ),
	);

	foreach ( $footer_contact_fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => $field['sanitize'],
		) );
		$wp_customize->add_control( $id, array(
			'label'   => esc_html__( $field['label'], 'nabu' ),
			'section' => 'nabu_footer_contact',
			'type'    => $field['type'],
		) );
	}

	// --------------------------------------------------------
	// Footer – Spendenkonto
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_footer_donation', array(
		'title'       => esc_html__( 'Footer – Spendenkonto', 'nabu' ),
		'priority'    => 51,
		'description' => esc_html__( 'Wird in Footer-Spalte 4 angezeigt, sofern kein Widget zugewiesen ist.', 'nabu' ),
	) );

	$footer_donation_fields = array(
		'nabu_footer_donation_holder' => array( 'label' => 'Kontoinhaber',       'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_bank'   => array( 'label' => 'Bank',                'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_iban'   => array( 'label' => 'IBAN',                'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_bic'    => array( 'label' => 'BIC',                 'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_note'   => array( 'label' => 'Zusätzlicher Hinweis','type' => 'textarea', 'sanitize' => 'sanitize_textarea_field' ),
	);

	foreach ( $footer_donation_fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => $field['sanitize'],
		) );
		$wp_customize->add_control( $id, array(
			'label'   => esc_html__( $field['label'], 'nabu' ),
			'section' => 'nabu_footer_donation',
			'type'    => $field['type'],
		) );
	}
}
add_action( 'customize_register', 'nabu_customize_register' );

/**
 * Customizer-Vorschau JS
 */
function nabu_customize_preview_js() {
	wp_enqueue_script(
		'nabu-customizer',
		NABU_URI . '/js/customizer.js',
		array( 'customize-preview' ),
		NABU_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'nabu_customize_preview_js' );
