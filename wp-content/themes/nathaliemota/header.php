<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nathalie_Mota
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<script
		src="https://code.jquery.com/jquery-3.7.1.min.js"
		integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
		crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'nathaliemota'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img class="logo__header" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>">
				</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="hamburger-icon" aria-hidden="true"></span>
					<span class="screen-reader-text"><?php esc_html_e('Toggle Navigation', 'nathaliemota'); ?></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu-top',
					)
				);
				?>
			</nav>

			<!-- Debut du modal de Contact -->
			<div class="popup-overlay">
				<div class="popup-salon">
					<div class="popup-header">
						<!-- Certifique-se de que a imagem está dentro do cabeçalho -->
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/Contactheader.png" alt="Header do Formulário" class="popup-header-img">
						<span class="popup-close"><i class="fa fa-times"></i></span>
					</div>
					<div class="contact-form">
						<?php
						// Insere o formulário de contato
						echo do_shortcode('[contact-form-7 id="eaaac68" title="Formulaire de contact 1"]');
						?>
					</div>
				</div>
			</div>


		</header><!-- #masthead -->