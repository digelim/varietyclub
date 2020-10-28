<?php
/**
 * Template used to display post content.
 *
 * @package mouche
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to mouche_loop_post action.
	 *
	 * @hooked mouche_post_header          - 10
	 * @hooked mouche_post_content         - 30
	 */
	do_action( 'mouche_loop_post' );
	?>

</article><!-- #post-## -->
