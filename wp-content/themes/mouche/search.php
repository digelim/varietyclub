<?php
/**
 * The template for displaying search results pages.
 *
 * @package mouche
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<h1>
		<?php
			/* translators: %s: search term */
			printf( esc_attr__( 'Search Results for: %s', 'mouche' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>

	<?php
	get_template_part( 'template-parts/', 'loop' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php
do_action( 'mouche_sidebar' );
get_footer();
