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
	<?php if(_SHOW_STICKY_HEADER) { ?> 
		<div class="wb_aphelion_sticky-header" id="wb_aphelion_sticky-header">
			<div class="aphelion_header_inner_wrapper_sticky">
				<div class="aphelion_header_left">
					<a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php header_image(); ?>" alt="logo" /></a>
				</div>

				<div class="aphelion_header_right">
					<div class="aphelion_desktop_menu_wrapper">
						<nav id="wb_aphelion_site-navigation" class="main-navigation" role="navigation">
							<?php wp_nav_menu( array( 'menu' => 'primary', 'menu_class' => 'wb_aphelion_menu-class', 'menu_id' => 'aphelion-menu-id' ) ); ?>									
						</nav>
					</div>

					<div class="aphelion_mobile_menu_wrapper_sticky">
						<div id="trigger-wb_aphelion_overlay_sticky" class="wb_aphelion_hamburger-trigger" type="button">
							<div class="wb_aphelion_hamburger-box"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

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
			<div class="aphelion_header_left">
				<a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php header_image(); ?>" alt="logo" /></a>
			</div>

			<div class="aphelion_header_right">
				<div class="aphelion_desktop_menu_wrapper">
					<nav id="wb_aphelion_site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'menu' => 'primary', 'menu_class' => 'wb_aphelion_menu-class', 'menu_id' => 'aphelion-menu-id' ) ); ?>									
					</nav>
				</div>

				<div class="aphelion_mobile_menu_wrapper">
					<div id="trigger-wb_aphelion_overlay" class="wb_aphelion_hamburger-trigger" type="button">
						<div class="wb_aphelion_hamburger-box"></div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #aphelion_header -->

	<?php 
	if(_SHOW_SUB_HEADER) {
		if(!is_front_page()) { 
			if(is_404()) {
				$title = __( "Virhe 404", 'aphelion' );
			} else if(is_archive()) {
				$title = get_the_archive_title();
			} else if(is_category() || is_single() || is_home()) {
				$title = __( "Ajankohtaista", 'aphelion' );
		
				if(function_exists('is_product') && is_product()) {
					global $product;
			
					$product = wc_get_product( get_the_id() );
					$title = $product->get_name();
				}
			} else if(function_exists('is_woocommerce') && is_woocommerce()) {
				$title = __( "Tuotteet", 'aphelion' );
		
				if(function_exists('is_product_category') && is_product_category()) {
					$title = single_cat_title( '', false );
				}
			} else if(is_search()) {
				if ( have_posts() ) {
					$title = __( "Hakutulokset", 'aphelion' );
				} else {
					$title = __( "Ei hakutuloksia", 'aphelion' );
				}
			} else {
				$title = get_the_title();
			}
		?>
			<div id="aphelion_sub_header">
				<?php echo '<h2 class="sub_header_h2">' . $title . '</h2>'; ?>
			</div>
		<?php } 
	} ?>

	<div id="aphelion_content_wrapper">
		<div class="container-fluid">
			<div class="row">