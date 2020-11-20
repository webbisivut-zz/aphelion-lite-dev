<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aphelion_Lite
 */

get_header();

$col_class = _MAIN_SIDEBAR_ACTIVE ? 'wb-aphelion-col-md-8' : 'wb-aphelion-col-md-12';
?>
	<div class="<?php echo $col_class; ?>">
		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'aphelion-lite' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'aphelion-lite' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>
<?php
if(_MAIN_SIDEBAR_ACTIVE) {
	?>
	<div class="wb-aphelion-col-md-4">
		<?php get_sidebar(); ?>
	</div>
<?php
}
get_footer();
