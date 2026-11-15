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
		'title'    => esc_html__( 'NABU colours', 'nabu' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'nabu_primary_color', array(
		'default'           => '#0068B4',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nabu_primary_color', array(
		'label'   => esc_html__( 'Primary colour (navigation & footer)', 'nabu' ),
		'section' => 'nabu_colors',
	) ) );

	$wp_customize->add_setting( 'nabu_accent_color', array(
		'default'           => '#e47600',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nabu_accent_color', array(
		'label'       => esc_html__( 'Accent colour ("Get involved" button)', 'nabu' ),
		'section'     => 'nabu_colors',
		'description' => esc_html__( 'Colour of the "Get involved" button in the navigation. CSS class: nav-link-mitmachen', 'nabu' ),
	) ) );

	// --------------------------------------------------------
	// Soziale Medien
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_social', array(
		'title'    => esc_html__( 'Social media', 'nabu' ),
		'priority' => 40,
	) );

	$social_fields = array(
		'nabu_social_facebook'  => array( 'label' => 'Facebook URL',              'icon' => 'fa-facebook' ),
		'nabu_social_twitter'   => array( 'label' => 'Twitter/X URL',             'icon' => 'fa-twitter' ),
		'nabu_social_youtube'   => array( 'label' => 'YouTube URL',               'icon' => 'fa-youtube' ),
		'nabu_social_instagram' => array( 'label' => 'Instagram URL',             'icon' => 'fa-instagram' ),
		'nabu_social_mastodon'  => array( 'label' => 'Mastodon URL',              'icon' => 'svg-mastodon' ),
		'nabu_social_bluesky'   => array( 'label' => 'BlueSky URL',               'icon' => 'svg-bluesky' ),
		'nabu_social_email'     => array( 'label' => esc_html__( 'Email address (mailto:)', 'nabu' ), 'icon' => 'fa-envelope' ),
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
		'title'       => esc_html__( 'Meta navigation links', 'nabu' ),
		'priority'    => 35,
		'description' => esc_html__( 'Additional links in the meta navigation at the top right. Alternatively configure the "Meta navigation" menu under Appearance > Menus.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_meta_link_1_text', array(
		'default'           => 'NABU',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_meta_link_1_text', array(
		'label'   => esc_html__( 'Link 1 - text', 'nabu' ),
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
		'label'   => esc_html__( 'Link 2 - text', 'nabu' ),
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
		'label'   => esc_html__( 'Link 3 - text', 'nabu' ),
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
		'title'       => esc_html__( 'Front page – image slider', 'nabu' ),
		'priority'    => 45,
		'description' => esc_html__( 'The slider on the front page automatically shows the latest posts that have a featured image. Set a featured image to include a post in the slider.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_carousel_count', array(
		'default'           => '3',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_carousel_count', array(
		'label'       => esc_html__( 'Number of slider images', 'nabu' ),
		'section'     => 'nabu_carousel',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 10 ),
	) );

	$wp_customize->add_setting( 'nabu_carousel_autoplay', array(
		'default'           => false,
		'sanitize_callback' => 'nabu_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'nabu_carousel_autoplay', array(
		'label'       => esc_html__( 'Advance the slider automatically', 'nabu' ),
		'section'     => 'nabu_carousel',
		'type'        => 'checkbox',
		'description' => esc_html__( 'Off by default for accessibility reasons: automatically moving content is hard to follow for some visitors. When switched on, the slider shows a pause button, and visitors who have asked their system for reduced motion never get the automatic movement.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_carousel_cta', array(
		'default'           => 'Learn more',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'nabu_carousel_cta', array(
		'label'   => esc_html__( 'Button text in the slider', 'nabu' ),
		'section' => 'nabu_carousel',
		'type'    => 'text',
	) );

	// --------------------------------------------------------
	// Startseite – Neuigkeiten-Slider
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_news', array(
		'title'    => esc_html__( 'Front page – news', 'nabu' ),
		'priority' => 46,
	) );

	$wp_customize->add_setting( 'nabu_news_count', array(
		'default'           => '7',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_news_count', array(
		'label'       => esc_html__( 'Number of news items in the slider', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 20 ),
	) );

	$wp_customize->add_setting( 'nabu_news_more_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'nabu_news_more_url', array(
		'label'       => esc_html__( 'URL for the "More news" button', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'url',
		'description' => esc_html__( 'Leave empty to use the automatic blog page URL.', 'nabu' ),
	) );

	$wp_customize->add_setting( 'nabu_posts_per_page', array(
		'default'           => '5',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'nabu_posts_per_page', array(
		'label'       => esc_html__( 'Posts per page (front page)', 'nabu' ),
		'section'     => 'nabu_news',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 20 ),
	) );

	// --------------------------------------------------------
	// Footer – Adresse & Kontakt
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_footer_contact', array(
		'title'       => esc_html__( 'Footer – address & contact', 'nabu' ),
		'priority'    => 50,
		'description' => esc_html__( 'Shown in footer column 1 unless a widget is assigned.', 'nabu' ),
	) );

	$footer_contact_fields = array(
		'nabu_footer_org_name'  => array( 'label' => esc_html__( 'Name of the group / organisation', 'nabu' ), 'type' => 'text',  'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_street'    => array( 'label' => esc_html__( 'Street and house number', 'nabu' ),          'type' => 'text',  'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_zip_city'  => array( 'label' => esc_html__( 'Postcode and city', 'nabu' ),                'type' => 'text',  'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_phone'     => array( 'label' => esc_html__( 'Phone', 'nabu' ),                            'type' => 'text',  'sanitize' => 'sanitize_text_field' ),
		'nabu_footer_email'     => array( 'label' => esc_html__( 'Email address', 'nabu' ),                    'type' => 'email', 'sanitize' => 'sanitize_email'      ),
		'nabu_footer_website'   => array( 'label' => esc_html__( 'Website URL', 'nabu' ),                      'type' => 'url',   'sanitize' => 'esc_url_raw'         ),
	);

	foreach ( $footer_contact_fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => $field['sanitize'],
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $field['label'],
			'section' => 'nabu_footer_contact',
			'type'    => $field['type'],
		) );
	}

	// --------------------------------------------------------
	// Footer – Spendenkonto
	// --------------------------------------------------------
	$wp_customize->add_section( 'nabu_footer_donation', array(
		'title'       => esc_html__( 'Footer – donation account', 'nabu' ),
		'priority'    => 51,
		'description' => esc_html__( 'Shown in footer column 4 unless a widget is assigned.', 'nabu' ),
	) );

	$footer_donation_fields = array(
		'nabu_footer_donation_holder' => array( 'label' => esc_html__( 'Account holder', 'nabu' ),   'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_bank'   => array( 'label' => esc_html__( 'Bank', 'nabu' ),             'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_iban'   => array( 'label' => esc_html__( 'IBAN', 'nabu' ),             'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_bic'    => array( 'label' => esc_html__( 'BIC', 'nabu' ),              'type' => 'text',     'sanitize' => 'sanitize_text_field'     ),
		'nabu_footer_donation_note'   => array( 'label' => esc_html__( 'Additional note', 'nabu' ),  'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field' ),
	);

	foreach ( $footer_donation_fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => $field['sanitize'],
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $field['label'],
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

/**
 * Sanitize-Callback für Checkbox-Einstellungen
 */
function nabu_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === (bool) $checked );
}
