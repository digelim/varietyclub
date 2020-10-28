<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mouche
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php
		the_archive_title( '<h1>', '</h1>' );
		the_archive_description( '<div>', '</div>' );
	?>

	<?php
	get_template_part( 'template-parts/loop' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php
do_action( 'mouche_sidebar' );
get_footer();
