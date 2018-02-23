<?php
/**
 * Azalea Theme Customizer.
 *
 * @package Azalea
 */

/**
 * Implement Theme Customizer additions and adjustments.
 */
function jgtazalea_customize_register( $wp_customize ) {
	// Double size logo for Retina devices.
	$wp_customize->add_setting( 'jgtazalea_logo_retina', array(
		'sanitize_callback' => 'jgtazalea_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'jgtazalea_logo_retina', array(
		'label'    => esc_html__( 'Check if you use double sized logo.', 'azalea' ),
		'section'  => 'title_tagline',
		'settings' => 'jgtazalea_logo_retina',
		'type'     => 'checkbox',
		'priority' => 9
	) );

	// Header background color.
	$wp_customize->add_setting( 'jgtazalea_header_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jgtazalea_header_background_color', array(
		'label'   => esc_html__( 'Header Background Color', 'azalea' ),
		'section' => 'colors'
	) ) );

	// Theme accent color.
	$wp_customize->add_setting( 'jgtazalea_accent_color', array(
		'default'           => '#ff868f',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jgtazalea_accent_color', array(
		'label'   => esc_html__( 'Accent Color', 'azalea' ),
		'section' => 'colors'
	) ) );

	// Header background image size.
	$wp_customize->add_setting( 'jgtazalea_header_background_size' , array(
		'default'           => 'auto',
		'sanitize_callback' => 'jgtazalea_sanitize_select'
	) );
	$wp_customize->add_control( 'jgtazalea_header_background_size', array(
		'label'    => esc_html__( 'Background Image Size', 'azalea' ),
		'section'  => 'header_image',
		'settings' => 'jgtazalea_header_background_size',
		'type'     => 'select',
		'choices'  => array(
			'auto'    => esc_html__( 'Auto', 'azalea' ),
			'cover'   => esc_html__( 'Cover', 'azalea' ),
			'contain' => esc_html__( 'Contain', 'azalea' )
		)
	) );

	// Header background image repeat.
	$wp_customize->add_setting( 'jgtazalea_header_background_repeat' , array(
		'default'           => 'repeat',
		'sanitize_callback' => 'jgtazalea_sanitize_select'
	) );
	$wp_customize->add_control( 'jgtazalea_header_background_repeat', array(
		'label'    => esc_html__( 'Background Image Repeat', 'azalea' ),
		'section'  => 'header_image',
		'settings' => 'jgtazalea_header_background_repeat',
		'type'     => 'select',
		'choices'  => array(
			'repeat'    => esc_html__( 'Repeat', 'azalea' ),
			'no-repeat' => esc_html__( 'No Repeat', 'azalea' )
		)
	) );

	/**
	 * General Settings Section.
	 */
	$wp_customize->add_section( 'jgtazalea_general_settings', array( 
		'title'    => esc_html__( 'General Settings', 'azalea' ),
		'priority' => 140
	) );

		// Theme layout.
		$wp_customize->add_setting( 'jgtazalea_layout', array(
			'default'           => 'right_sidebar',
			'sanitize_callback' => 'jgtazalea_sanitize_select'
		) );
		$wp_customize->add_control( 'jgtazalea_layout', array(
			'label'    => esc_html__( 'Sidebar Position', 'azalea' ),
			'section'  => 'jgtazalea_general_settings',
			'settings' => 'jgtazalea_layout',
			'type'     => 'radio',
			'choices'  => array(
				'right_sidebar' => esc_html__( 'Right Sidebar', 'azalea' ),
				'left_sidebar'  => esc_html__( 'Left Sidebar', 'azalea' )
			)
		) );

		// Fix top navigation bar.
		$wp_customize->add_setting( 'jgtazalea_fix_top_bar', array(
			'sanitize_callback' => 'jgtazalea_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'jgtazalea_fix_top_bar', array(
			'label'    => esc_html__( 'Fix top navigation bar on scroll.', 'azalea' ),
			'section'  => 'jgtazalea_general_settings',
			'settings' => 'jgtazalea_fix_top_bar',
			'type'     => 'checkbox'
		) );

		// Posts navigation type.
		$wp_customize->add_setting( 'jgtazalea_posts_nav', array(
			'default'           => 'paginated',
			'sanitize_callback' => 'jgtazalea_sanitize_select'
		) );
		$wp_customize->add_control( 'jgtazalea_posts_nav', array(
			'label'    => esc_html__( 'Posts Navigation Type', 'azalea' ),
			'section'  => 'jgtazalea_general_settings',
			'settings' => 'jgtazalea_posts_nav',
			'type'     => 'radio',
			'choices'  => array(
				'paginated' => esc_html__( 'Paginated Links', 'azalea' ),
				'next_prev' => esc_html__( 'Next/Prev Links', 'azalea' )
			)
		) );

		// Custom footer text.
		$wp_customize->add_setting( 'jgtazalea_footer_text', array(
			'default'           => '',
			'sanitize_callback' => 'jgtazalea_sanitize_html'
		) );
		$wp_customize->add_control( 'jgtazalea_footer_text', array(
			'label'    => esc_html__( 'Footer Text', 'azalea' ),
			'section'  => 'jgtazalea_general_settings',
			'settings' => 'jgtazalea_footer_text',
			'type'     => 'textarea'
		) );

	/**
	 * Post Settings Section.
	 */
	$wp_customize->add_section( 'jgtazalea_post_settings', array( 
		'title'    => esc_html__( 'Post Settings', 'azalea' ),
		'priority' => 150
	) );

		// Show automatically generated excerpts.
		$wp_customize->add_setting( 'jgtazalea_auto_excerpt', array(
			'sanitize_callback' => 'jgtazalea_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'jgtazalea_auto_excerpt', array(
			'label'    => esc_html__( 'Show automatically generated post excerpts on the main blog and archive pages.', 'azalea' ),
			'section'  => 'jgtazalea_post_settings',
			'settings' => 'jgtazalea_auto_excerpt',
			'type'     => 'checkbox'
		) );

		// Author box.
		$wp_customize->add_setting( 'jgtazalea_show_author_box', array(
			'sanitize_callback' => 'jgtazalea_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'jgtazalea_show_author_box', array(
			'label'    => esc_html__( 'Display author box in the single post page.', 'azalea' ),
			'section'  => 'jgtazalea_post_settings',
			'settings' => 'jgtazalea_show_author_box',
			'type'     => 'checkbox'
		) );
}

add_action( 'customize_register', 'jgtazalea_customize_register' );

/**
 * Checkbox sanitization callback.
 */
function jgtazalea_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Select and radio sanitization callback.
 */
function jgtazalea_sanitize_select( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * HTML sanitization callback.
 */
function jgtazalea_sanitize_html( $input ) {
	return wp_filter_post_kses( $input );
}

/**
 * No HTML sanitization callback.
 */
function jgtazalea_sanitize_nohtml( $input ) {
	return wp_filter_nohtml_kses( $input );
}

/**
 * Enqueue front-end CSS for the accent color.
 */
function jgtazalea_accent_color_css() {
	$default_color = '#ff868f';
	$custom_color = get_theme_mod( 'jgtazalea_accent_color', '#ff868f' );

	// Don't do anything if the current color is the default.
	if ( $custom_color === $default_color ) {
		return;
	}

	$css = 'blockquote,.nav-previous a,.nav-next a,.nav-links .prev,.nav-links .next,.infinite-scroll #infinite-handle span{border-color:' . esc_attr( $custom_color ) . ';}a,blockquote:before,.main-navigation a:hover,.primary-menu li:hover > a,.primary-menu .current-menu-item > a,.primary-menu .current-menu-ancestor > a,.primary-menu .current_page_item > a,.primary-menu .current_page_ancestor > a,.entry-meta a:hover,.entry-footer a:hover,.navigation a:hover,.page-links a:hover .page-link,.comment-author a:hover,.comment-metadata a:hover,#footer-social-links a:hover,.widget_archive a:hover,.widget_categories a:hover,.widget_pages a:hover,.widget_meta a:hover,.widget_recent_entries a:hover,.widget_recent_comments a:hover,.widget_rss a:hover,.widget_nav_menu a:hover,.infinite-scroll #infinite-handle span:hover{color:' . esc_attr( $custom_color ) . ';}button,input[type="submit"],input[type="button"],input[type="reset"],.widget_tag_cloud a:hover{background-color:' . esc_attr( $custom_color ) . ';border-color:' . esc_attr( $custom_color ) . ';}button:hover,button:focus,input[type="submit"]:hover,input[type="submit"]:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus,button:active,input[type="button"]:active,input[type="reset"]:active,input[type="submit"]:active,.button,.more-link{border-color:' . esc_attr( $custom_color ) . ';color:' . esc_attr( $custom_color ) . ';}.button:hover,.more-link:hover,.slick-arrow:hover,.slick-arrow:focus,.site-footer .top-link{background-color:' . esc_attr( $custom_color ) . ';}';

	wp_add_inline_style( 'jgtazalea-style', $css );
}
add_action( 'wp_enqueue_scripts', 'jgtazalea_accent_color_css', 11 );
