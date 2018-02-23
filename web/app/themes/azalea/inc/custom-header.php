<?php
/**
 * Custom Header functionality.
 *
 * @package Azalea
 */

/**
 * Set up the WordPress core custom header feature.
 */
function jgtazalea_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jgtazalea_custom_header_args', array(
		'default-text-color' => '1d1e1f',
		'width'              => 250,
		'height'             => 250,
		'flex-height'        => true,
		'flex-width'         => true
	) ) );

	register_default_headers( array(
		'white_wall_hash'  => array(
			'url'           => '%s/images/white_wall_hash.png',
			'thumbnail_url' => '%s/images/white_wall_hash_thumb.png',
			'description'   => esc_html__( 'White Wall Hash', 'azalea' )
		),
		'wet_snow'  => array(
			'url'           => '%s/images/wet_snow.png',
			'thumbnail_url' => '%s/images/wet_snow_thumb.png',
			'description'   => esc_html__( 'Wet Snow', 'azalea' )
		),
		'fresh_snow'  => array(
			'url'           => '%s/images/fresh_snow.png',
			'thumbnail_url' => '%s/images/fresh_snow_thumb.png',
			'description'   => esc_html__( 'Fresh Snow', 'azalea' )
		),
		'subtle_white_feathers'  => array(
			'url'           => '%s/images/subtle_white_feathers.png',
			'thumbnail_url' => '%s/images/subtle_white_feathers_thumb.png',
			'description'   => esc_html__( 'Subtle White Feathers', 'azalea' )
		),
		'subtle_grunge'  => array(
			'url'           => '%s/images/subtle_grunge.png',
			'thumbnail_url' => '%s/images/subtle_grunge_thumb.png',
			'description'   => esc_html__( 'Subtle Grunge', 'azalea' )
		)
	) );
}
add_action( 'after_setup_theme', 'jgtazalea_custom_header_setup' );

/**
 * Enqueues front-end CSS for the site header background.
 */
function jgtazalea_header_background_css() {
	$header_image = get_header_image();
	$header_bg_color = get_theme_mod( 'jgtazalea_header_background_color', '#ffffff' );
	$css = '';

	if ( $header_bg_color !== '#ffffff' ) {
		$css .= 'background-color:' . esc_attr( $header_bg_color ) . ';border-color:' . esc_attr( $header_bg_color ) . ';';
	}

	if ( ! empty( $header_image ) ) {
		$css .= 'background-image:url(' . esc_url( $header_image ) . ');background-repeat:' . esc_attr( get_theme_mod( 'jgtazalea_header_background_repeat', 'repeat' ) ) . ';background-position:50% 0%;background-size:' . esc_attr( get_theme_mod( 'jgtazalea_header_background_size', 'auto' ) ) . ';';
	}

	if ( empty( $css ) ) {
		return;
	}

	$css = '.site-header{' . $css . '}';
	wp_add_inline_style( 'jgtazalea-style', $css );
}
add_action( 'wp_enqueue_scripts', 'jgtazalea_header_background_css', 11 );

/**
 * Enqueues front-end CSS for the site header text.
 */
function jgtazalea_header_text_css() {
	$default_color = get_theme_support( 'custom-header', 'default-text-color' );
	$header_text_color = get_header_textcolor();

	if ( $header_text_color === $default_color ) {
		return;
	}

	$css = '.site-title a,.site-description { color: #' . esc_attr( $header_text_color ) . '; }';
	wp_add_inline_style( 'jgtazalea-style', $css );
}
add_action( 'wp_enqueue_scripts', 'jgtazalea_header_text_css', 11 );
