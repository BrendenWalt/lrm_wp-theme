<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laura_Renee_Mehl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|', true, 'right');?></title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Theme files -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,500,500i,700|Arapey:400|Tangerine:400,700" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/assets/font_awesome/css/all.css">
	<script src="<?php bloginfo('stylesheet_directory')?>/assets/js/scripts.js" defer></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'laura-renee-mehl' ); ?></a>

	<header>
		<?php if (is_page_template('page-main.php')) { ?>

		<div id="site-nav" class="navigation-wrapper top-nav">
			
			<?php 
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'container' 				=> 'nav',
					'container_class'		=> 'nav-links-wrapper',
					'menu_class'				=> 'nav-links'
				));
			?>
			<div id="mobile-nav">
				<div></div>
				<div></div>
				<div></div>
			</div>
			
		</div>
		<?php	} ?>
	</header>



	