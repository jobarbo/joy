<?php
/**
 * Azalea functions and definitions.
 *
 * @package Azalea
 */

if ( ! function_exists( 'jgtazalea_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function jgtazalea_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'azalea', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => '100',
		'width'       => '250',
		'flex-width' => true,
		'flex-height' => true,
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 960, 9999 );

	// Register additional image sizes.
	add_image_size( 'jgtazalea-slider', 1400, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'       => esc_html__( 'Primary Menu', 'azalea' ),
		'header_social' => esc_html__( 'Header Social Links', 'azalea' ),
		'footer_social' => esc_html__( 'Footer Social Links', 'azalea' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'video',
		'gallery',
	) );

	// Style the visual editor to resemble the theme style.
	add_editor_style( 'css/editor-style.css' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'jgtazalea_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function jgtazalea_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jgtazalea_content_width', 1140 );
}
add_action( 'after_setup_theme', 'jgtazalea_content_width', 0 );

/**
 * Register widget areas.
 */
function jgtazalea_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'azalea' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Main sidebar that appears on the left or right.', 'azalea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'azalea' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'azalea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'azalea' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'azalea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'azalea' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'azalea' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jgtazalea_widgets_init' );

if ( ! function_exists( 'jgtazalea_fonts_url' ) ) :
/**
 * Register Google fonts for Azalea.
 */
function jgtazalea_fonts_url() {
	$fonts_url = '';
	$fonts = array();

	/* translators: If there are characters in your language that are not
	 * supported by Crimson Text, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Crimson Text font: on or off', 'azalea' ) )
		$fonts[] = 'Crimson Text:400,400italic,700,700italic';

	/* translators: If there are characters in your language that are not
	 * supported by PT Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'azalea' ) )
		$fonts[] = 'PT Sans:400,400italic,700,700italic';

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function jgtazalea_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'jgtazalea-fonts', jgtazalea_fonts_url(), array(), null );
	
	// Theme main stylesheet.
	wp_enqueue_style( 'jgtazalea-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.min.js', array( 'jquery' ), '20170321', true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20170321', true );
	wp_enqueue_script( 'jgtazalea-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery-fitvids', 'jquery-slick' ), '20170321', true );
	wp_localize_script( 'jgtazalea-script', 'jgtazaleaVars', array(
		'screenReaderText' => esc_html__( 'submenu', 'azalea' )
	) );
}
add_action( 'wp_enqueue_scripts', 'jgtazalea_scripts' );

/**
 * Add custom classes to the array of body classes.
 */
function jgtazalea_body_classes( $classes ) {
	// Add a class indicating the theme layout
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	} else {
		$layout = get_theme_mod( 'jgtazalea_layout' );
		if ( 'left_sidebar' === $layout )
			$classes[] = 'left-sidebar';
		else
			$classes[] = 'right-sidebar';
	}

	if ( get_theme_mod( 'jgtazalea_fix_top_bar' ) ) {
		$classes[] = 'fixed-nav';
	}

	// Add a class of no-avatars if avatars are disabled.
	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	// Add a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'jgtazalea_body_classes' );

/**
 * Customize the archive title.
 */
function jgtazalea_archive_title( $title ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Showing all posts in %s', 'azalea' ), '<span class="highlight">' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Showing all posts tagged %s', 'azalea' ), '<span class="highlight">' . single_tag_title( '', false ) . '</span>' );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Showing all posts by %s', 'azalea' ), '<span class="vcard highlight">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Showing all posts in %s', 'azalea' ), '<span class="highlight">' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'azalea' ) ) . '</span>' );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Showing all posts in %s', 'azalea' ), '<span class="highlight">' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'azalea' ) ) . '</span>' );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Showing all posts dated %s', 'azalea' ), '<span class="highlight">' . get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'azalea' ) ) . '</span>' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'jgtazalea_archive_title' );

/**
 * Modify tag cloud widget arguments to have all tags in the widget same font size.
 */
function jgtazalea_widget_tag_cloud_args( $args ) {
	$args['largest'] = 10;
	$args['smallest'] = 10;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'jgtazalea_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Display Azalea Pro info in the Customizer.
 */
require_once get_template_directory() . '/inc/trt-customize-pro/class-customize.php';
