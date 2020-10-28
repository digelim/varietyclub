<?php
/**
 * The template for displaying all single posts.
 *
 * @package mouche
 */

get_header(); ?>


<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'single' );

endwhile; // End of the loop.
?>

<?php
do_action( 'mouche_sidebar' );
get_footer();
