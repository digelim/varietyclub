<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package mouche
 */

get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();

	do_action( 'mouche_page_before' );

	get_template_part( 'template-parts/content', 'page' );

	/**
	 * Functions hooked in to mouche_page_after action
	 *
	 * @hooked mouche_display_comments - 10
	 */
	do_action( 'mouche_page_after' );

endwhile; // End of the loop.
?>

<?php
do_action( 'mouche_sidebar' );
get_footer();
