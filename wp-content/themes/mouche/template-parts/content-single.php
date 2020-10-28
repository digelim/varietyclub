<?php
/**
 * Template used to display post content on single pages.
 *
 * @package mouche
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'mouche_single_post_top' );

	/**
	 * Functions hooked into mouche_single_post add_action
	 *
	 * @hooked mouche_post_header          - 10
	 * @hooked mouche_post_content         - 30
	 */
	do_action( 'mouche_single_post' );

	/**
	 * Functions hooked in to mouche_single_post_bottom action
	 *
	 * @hooked mouche_post_nav         - 10
	 * @hooked mouche_display_comments - 20
	 */
	do_action( 'mouche_single_post_bottom' );
	?>

</article><!-- #post-## -->
