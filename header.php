<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Diet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
	<!-- Google tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-H7CWSFTBX6">
	</script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-H7CWSFTBX6');
	</script>
</head>

<body <?php body_class(); ?>>
	<?php if(isset($_SESSION['testmode'])): ?>
	<input type="hidden" id="testmode" value="1">
	<?php endif; ?>
	<div class="loader-overlay"><img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/loader.gif'; ?>"></div>
	<div class="custom-modal" style="display:none;">
		<div class="custom-modal__inner">
			<div class="custom-modal__close"><i class="fas fa-times"></i></div>
			<div class="custom-modal__content"></div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/content-modals'); ?>
	<?php get_template_part( 'template-parts/content-contact-us'); ?>
	<?php get_template_part( 'template-parts/content-terms-conditions'); ?>
	<header class="site-header header-navbar">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if(wp_is_mobile() && get_the_ID() == 22670): ?>
						<style>
						.site-header.header-navbar {
							background-color: #40E0D0;
						}
						.in-mobile.page-template-template-shop-dev #primary {
							margin-top: 74px!important;
						}
						</style>
						<span class="text-logo"><h1 style="margin: 0;">DIET IN A BOX</h1></span>
					<?php elseif(is_front_page()): ?>
						<img class="logo" src="<?php echo get_template_directory_uri() ?>/dist/images/logo-white.png">
					<?php else: ?>
						<img class="logo" src="<?php echo get_template_directory_uri() ?>/dist/images/logo.png">
					<?php endif; ?>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarMain">
					<?php
						wp_nav_menu( array(
							'container'		=> false,
							'menu_class' 	=> 'navbar-nav ml-auto',
							'menu_id'       => 'menu-main',
						) );
					?>
				</div>
				<!--
				<div class="cart-icon"><?php echo do_shortcode("[woo_cart_but]"); ?></div>
						-->
			</div>
		</nav>
	</header>

