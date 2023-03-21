<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!----- MAKING WEBSITE RESPONSIVE ----->

	<meta name="apple-mobile-web-app-capable" content="yes"><!----- ALLOWING iOS COMPATIBLE ----->
	<meta name="apple-mobile-web-app-title" content="La Pizzeria Restaurant"><!----- SETTING WEB APP NAME FOR iOS ----->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.jpg"><!----- SETTING APP ICON FOR iOS ----->

	<meta name="mobile-web-app-capable" content="yes"><!----- ALLOWING ANDROID COMPATIBLE ----->
	<meta name="application-name" content="La Pizzeria Restaurant"><!----- PUTTING WEB APP NAME FOR ANDROID ----->
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/icon.png" sizes="192x192"><!----- SETTING APP ICON FOR ANDROID ----->
	<meta name="theme-color" content="#a61206"><!----- SETTING APP THEME COLOR FOR ANDROID ----->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php 
						if(function_exists('the_custom_logo')){
							the_custom_logo(); //DISPLAYING LOGO
						} 
					?>
				</a>
			</div><!--.logo-->
			<div class="header-information">
				<div class="socials"> <!----- DISPLAYING SOCIAL MENU ----->
					<?php
						wp_nav_menu($args = array(
							'theme_location' => 'social-menu',
							'container' => 'nav',
							'container_class' => 'socials',
							'container_id' => 'socials',
							'link_before' => '<span class="sr-text">',
							'link_after' => '</span>'
						)); 
					?>
				</div><!--.socials-->
				<div class="address"> <!----- DISPLAYING ADDRESS ----->
					<p><?php echo esc_html(get_option('lapizzeria_locations'))?></p>
					<p>Phone Number: <?php echo esc_html(get_option('lapizzeria_phone'))?></p>
				</div><!--.address-->
			</div><!--.header-information-->
		</div><!--.container-->
	</header><!--.site-header-->
	<div class="site-menu">
		<div class="mobile-menu">
			<a class="mobile" href="#"><i class="fa fa-bars"></i>Menu</a>
		</div><!--.mobile-menu-->
		<div class="navigation container"> <!----- DISPLAYING HEADER MENU ----->
			<?php
				wp_nav_menu($args = array(
					'theme_location' => 'header-menu',
					'container' => 'nav',
					'container_class' => 'site-nav',
					'container_id' => 'site-nav'
				));
			?>
		</div><!--.navigation container-->
	</div><!--.site-menu-->
