<?php
/**
 * The template for displaying the header.
 *
 * @package Azalea
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'azalea' ); ?>">
		<div class="inner">
			<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-icon" aria-hidden="true"></span><?php esc_html_e( 'Menu', 'azalea' ); ?></button>
			<button id="search-show" class="search-show"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'azalea' ); ?></span></button>
			<div id="menu-container" class="menu-container">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'primary-menu'
				) );
				if ( has_nav_menu( 'header_social' ) ) :
					wp_nav_menu( array(
						'theme_location' => 'header_social',
						'container'      => false,
						'menu_id'        => 'header-social-links',
						'menu_class'     => 'social-links-menu',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>'
					) );
				endif;
				?>
			</div>
		</div><!-- .inner -->
	</nav><!-- .main-navigation -->

	<header id="masthead" class="site-header">
		<div class="inner">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					$custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
					$logo_width = get_theme_mod( 'jgtazalea_logo_retina' ) ? floor( $custom_logo[1]/2 ) : $custom_logo[1];
					printf( '<a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" width="%3$s" alt="%4$s" /></a>',
						esc_url( home_url( '/' ) ),
						esc_url( $custom_logo[0] ),
						esc_attr( $logo_width ),
						esc_attr( get_bloginfo( 'name', 'display' ) )
					);
				}
				$site_title_link = sprintf( '<a href="%1$s" rel="home">%2$s</a>',
					esc_url( home_url( '/' ) ),
					esc_attr( get_bloginfo( 'name', 'display' ) )
				);
				$header_text_class = ( display_header_text() ) ? '' : ' screen-reader-text';
				?>
				<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title<?php echo $header_text_class; ?>"><?php echo $site_title_link; ?></h1>
				<?php else : ?>
				<p class="site-title<?php echo $header_text_class; ?>"><?php echo $site_title_link; ?></p>
				<?php endif; ?>
				<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p class="site-description<?php echo $header_text_class; ?>"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</div><!-- .inner -->
	</header><!-- .site-header -->
