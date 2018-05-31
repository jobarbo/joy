<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link href="<?= home_url(); ?>/favicon.ico" rel="shortcut icon">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>



		<div class="page-wrapper">
			<header role="banner" class="wrapper">

				<div class="logo">
					<a href="<?= home_url(); ?>">
						<img src="/img/logo.png" alt="Logo">
					</a>
				</div>

				<nav role="navigation" class="nav main-nav">
					<?php wp_nav_menu( array(
						'theme_location'  => 'main'
					)); ?>
				</nav>

			</header>

			<main role="main">