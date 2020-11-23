<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aphelion_Lite
 */

get_header();

$col_class = _PAGE_SIDEBAR_ACTIVE ? 'wb-aphelion-col-md-8' : 'wb-aphelion-col-md-12';

?>
	<div class="<?php echo $col_class; ?>">
		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>
<?php
if(_PAGE_SIDEBAR_ACTIVE) {
	?>
	<div class="wb-aphelion-col-md-4">
		<?php get_sidebar('page'); ?>
	</div>
<?php
}

get_footer();