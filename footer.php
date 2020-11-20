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

<div id="wb_aphelion_footer_content_wrap">
	<footer id="wb_aphelion_footer_wrap">
		<div id="wb_aphelion_footer_inner_wrap">
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

<?php wp_footer(); ?>

</body>
</html>
