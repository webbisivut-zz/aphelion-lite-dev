<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aphelion_Lite
 */

?>
</div><!-- .row -->
</div><!-- .container-fluid -->
</div><!-- #aphelion_content_wrapper -->
</div><!-- #aphelion_page -->

<?php if( _MOBILE_FOOTER ) { ?>
	<div id="wb_aphelion_mobile_search">
		<div id="close_mobile_search"><img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg' ?>"></div>
		
		<div class="wb_aphelion_mobile_footer_content_container">
			<form id="searchform_mobile" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" id="wb_aphelion_header_search_input_mobile" name="s" placeholder="Haku" value="<?php echo get_search_query(); ?>">
				<input type="submit" value="Hae" class="search_submit_mobile">
			</form>
		</div>
	</div>

	<div id="wb_aphelion_mobile_cart">
		<div id="close_mobile_cart"><img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg' ?>"></div>
		
		<div class="wb_aphelion_mobile_footer_content_container">	
			<div id="wb_aphelion_mobile_cart_container"><?php if(function_exists('woocommerce_mini_cart')) woocommerce_mini_cart() ?></div>
		</div>
	</div>

	<div id="wb_aphelion_sticky_mobile_footer">
		<div class="wb_aphelion_sticky_mobile_item" id="wb_aphelion_sticky_mobile_cart">
			<div id="wb_aphelion_footer_cart">
				<div class="wb_aphelion_cart_widget_totals_outer_wrap">
					<div class="wb_aphelion_cart_widget_totals_inner_wrap">
						<div class="wb_aphelion_cart_widget_totals_sum">
							<?php
								global $woocommerce;
								if(isset($woocommerce->cart)) {
									echo $woocommerce->cart->cart_contents_count;
								} else {
									echo 0;
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wb_aphelion_sticky_mobile_item" id="wb_aphelion_sticky_mobile_search">
			<div id="wb_aphelion_footer_search"></div>
		</div>
	</div>
<?php } // end if ?>

<div id="wb_aphelion_footer_content_wrap">
	<footer id="wb_aphelion_footer_wrap">
		<div class="wb_aphelion_footer_inner_wrap">
		<?php if( _FOOTER_COLUMNS == 2 ) { ?>
			<div class="container-fluid">  
				<div class="row"> 
					<div class="wb-aphelion-col-md-6">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="wb-aphelion-col-md-6">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				</div>
			</div>
		<?php } else if(  _FOOTER_COLUMNS == 3) { ?>
			<div class="container-fluid">  
				<div class="row"> 
					<div class="wb-aphelion-col-md-6">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				</div>
			</div>
		<?php } else if(  _FOOTER_COLUMNS == 4) { ?>
			<div class="container-fluid">  
				<div class="row"> 
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div> 
					<div class="wb-aphelion-col-md-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				</div>
			</div>
		<?php } // end if ?>
		</div>
	</footer>

	<div id="wb_aphelion_copyright">
		<div class="container-fluid">
			<div class="wb_aphelion_footer_inner_wrap">
				<div class="row"> 
					<div class="wb-aphelion-col-md-12">
						<p><?php echo _FOOTER_COPYRIGHT_TEXT . ' ' . date("Y"); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 

<div id="wb_aphelion_overlay_menu_is_open"></div>

<div class="wb_aphelion_overlay wb_aphelion_overlay-slidedown">
	<div class="wb_aphelion_overlay-wrap-main-menu">
		<div class="wb_aphelion_overlay-navigation-header-wrap"></div>
		
		<div id="wb_aphelion_overlay-close" class="wb_aphelion_overlay-right-menu-item"><img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg' ?>"></div>

		<ul id="wb_aphelion_overlay-container">
			<li class="wb_aphelion_overlay-container-item" id="wb_aphelion_overlay-container-menu">
				<div class="wb_aphelion_overlay-navigation-wrap">
					<nav class="wb_aphelion_overlay-navigation" role="navigation">
						<?php 
							$menu = wp_nav_menu(
								array (
									'theme_location' => 'aphelion-mobile-menu',
									'echo' => FALSE,
									'fallback_cb' => '__return_false'
								)
							);
							
							if ( ! empty ( $menu ) ) {
								wp_nav_menu( array( 'menu' => 'aphelion-mobile-menu', 'container_class' => 'aphelion_mobile_menu', 'menu_id' => 'wb_aphelion_overlay_menu'  ) );
							} else {
								wp_nav_menu( array( 'menu' => 'primary', 'menu_id' => 'wb_aphelion_overlay_menu' ) ); 
							}
						?>
					</nav>
				</div>
			</li>
		</ul>
	</div>

<?php wp_footer(); ?>

</body>
</html>
