<?php
/**
 * mouche hooks
 *
 * @package mouche
 */

/**
 * General
 *
 * @see  mouche_header_widget_region()
 * @see  mouche_get_sidebar()
 */
add_action( 'mouche_before_content', 'mouche_header_widget_region', 10 );
add_action( 'mouche_sidebar', 'mouche_get_sidebar', 10 );

/**
 * Header
 *
 * @see  mouche_skip_links()
 * @see  mouche_secondary_navigation()
 * @see  mouche_site_branding()
 * @see  mouche_primary_navigation()
 */
add_action( 'mouche_header', 'mouche_header_container', 0 );
add_action( 'mouche_header', 'mouche_skip_links', 5 );
add_action( 'mouche_header', 'mouche_site_branding', 20 );
add_action( 'mouche_header', 'mouche_secondary_navigation', 30 );
add_action( 'mouche_header', 'mouche_header_container_close', 41 );
add_action( 'mouche_header', 'mouche_primary_navigation_wrapper', 42 );
add_action( 'mouche_header', 'mouche_primary_navigation', 50 );
add_action( 'mouche_header', 'mouche_primary_navigation_wrapper_close', 68 );

/**
 * Footer
 *
 * @see  mouche_footer_widgets()
 * @see  mouche_credit()
 */
add_action( 'mouche_footer', 'mouche_footer_widgets', 10 );
add_action( 'mouche_footer', 'mouche_credit', 20 );

/**
 * Homepage
 *
 * @see  mouche_homepage_content()
 */
add_action( 'homepage', 'mouche_homepage_content', 10 );

/**
 * Posts
 *
 * @see  mouche_post_header()
 * @see  mouche_post_meta()
 * @see  mouche_post_content()
 * @see  mouche_paging_nav()
 * @see  mouche_single_post_header()
 * @see  mouche_post_nav()
 * @see  mouche_display_comments()
 */
add_action( 'mouche_loop_post', 'mouche_post_header', 10 );
add_action( 'mouche_loop_post', 'mouche_post_content', 30 );
add_action( 'mouche_loop_post', 'mouche_post_taxonomy', 40 );
add_action( 'mouche_loop_after', 'mouche_paging_nav', 10 );
add_action( 'mouche_single_post', 'mouche_post_header', 10 );
add_action( 'mouche_single_post', 'mouche_post_content', 30 );
add_action( 'mouche_single_post_bottom', 'mouche_edit_post_link', 5 );
add_action( 'mouche_single_post_bottom', 'mouche_post_taxonomy', 5 );
add_action( 'mouche_single_post_bottom', 'mouche_post_nav', 10 );
add_action( 'mouche_single_post_bottom', 'mouche_display_comments', 20 );
add_action( 'mouche_post_header_before', 'mouche_post_meta', 10 );
add_action( 'mouche_post_content_before', 'mouche_post_thumbnail', 10 );

/**
 * Pages
 *
 * @see  mouche_page_header()
 * @see  mouche_page_content()
 * @see  mouche_display_comments()
 */
add_action( 'mouche_page', 'mouche_page_header', 10 );
add_action( 'mouche_page', 'mouche_page_content', 20 );
add_action( 'mouche_page', 'mouche_edit_post_link', 30 );
add_action( 'mouche_page_after', 'mouche_display_comments', 10 );

/**
 * Homepage Page Template
 *
 * @see  mouche_homepage_header()
 * @see  mouche_page_content()
 */
add_action( 'mouche_homepage', 'mouche_homepage_header', 10 );
add_action( 'mouche_homepage', 'mouche_page_content', 20 );
