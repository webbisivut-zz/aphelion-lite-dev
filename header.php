<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aphelion_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="aphelion_page" class="site">
	<?php if(_SHOW_TOP_HEADER) { ?> 
		<div id="aphelion_top_header_outer_wrap">
			<div class="aphelion_top_header_inner_wrap">
				<div class="aphelion_top_header_content" id="aphelion_top_header_left">
					<?php dynamic_sidebar( 'sidebar-top-left' ); ?>
				</div>
				<div class="aphelion_top_header_content" id="aphelion_top_header_right">
					<?php dynamic_sidebar( 'sidebar-top-right' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<header id="aphelion_header" class="site-header">		
		<div class="aphelion_header_inner_wrapper">
			<div id="aphelion_header_left">
				<a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php header_image(); ?>" alt="logo" /></a>
			</div>

			<div id="aphelion_header_right">
				<div id="aphelion_desktop_menu_wrapper">
					<nav id="wb_aphelion_site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'menu' => 'primary', 'menu_class' => 'wb_aphelion_menu-class', 'menu_id' => 'aphelion-menu-id' ) ); ?>									
					</nav>
				</div>

				<div id="aphelion_mobile_menu_wrapper">
					<div id="trigger-wb_aphelion_overlay" class="wb_aphelion_hamburger-trigger" type="button">
						<div class="wb_aphelion_hamburger-box"></div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #aphelion_header -->

	<div id="aphelion_content_wrapper">
		<div class="container-fluid">
			<div class="row">