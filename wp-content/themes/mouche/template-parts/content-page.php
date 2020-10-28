<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package mouche
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to mouche_page add_action
	 *
	 * @hooked mouche_page_header          - 10
	 * @hooked mouche_page_content         - 20
	 */
	do_action( 'mouche_page' );
	?>
</article><!-- #post-## -->
