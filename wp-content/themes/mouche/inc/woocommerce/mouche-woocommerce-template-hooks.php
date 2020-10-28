<?php
/**
 * mouche WooCommerce hooks
 *
 * @package mouche
 */

/**
 * Homepage
 *
 * @see  mouche_product_categories()
 * @see  mouche_recent_products()
 * @see  mouche_featured_products()
 * @see  mouche_popular_products()
 * @see  mouche_on_sale_products()
 * @see  mouche_best_selling_products()
 */
add_action( 'homepage', 'mouche_product_categories', 20 );
add_action( 'homepage', 'mouche_recent_products', 30 );
add_action( 'homepage', 'mouche_featured_products', 40 );
add_action( 'homepage', 'mouche_popular_products', 50 );
add_action( 'homepage', 'mouche_on_sale_products', 60 );
add_action( 'homepage', 'mouche_best_selling_products', 70 );

/**
 * Layout
 *
 * @see  mouche_before_content()
 * @see  mouche_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  mouche_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_main_content', 'mouche_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'mouche_after_content', 10 );
add_action( 'mouche_content_top', 'mouche_shop_messages', 15 );
add_action( 'mouche_before_content', 'woocommerce_breadcrumb', 10 );

add_action( 'woocommerce_after_shop_loop', 'mouche_sorting_wrapper', 9 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );
add_action( 'woocommerce_after_shop_loop', 'mouche_sorting_wrapper_close', 31 );

add_action( 'woocommerce_before_shop_loop', 'mouche_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'mouche_woocommerce_pagination', 30 );
add_action( 'woocommerce_before_shop_loop', 'mouche_sorting_wrapper_close', 31 );

add_action( 'mouche_footer', 'mouche_handheld_footer_bar', 999 );

// Legacy WooCommerce columns filter.
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
	add_filter( 'loop_shop_columns', 'mouche_loop_columns' );
	add_action( 'woocommerce_before_shop_loop', 'mouche_product_columns_wrapper', 40 );
	add_action( 'woocommerce_after_shop_loop', 'mouche_product_columns_wrapper_close', 40 );
}

/**
 * Products
 *
 * @see mouche_edit_post_link()
 * @see mouche_upsell_display()
 * @see mouche_single_product_pagination()
 * @see mouche_sticky_single_add_to_cart()
 */
add_action( 'woocommerce_single_product_summary', 'mouche_edit_post_link', 60 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'mouche_upsell_display', 15 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );

add_action( 'woocommerce_after_single_product_summary', 'mouche_single_product_pagination', 30 );
add_action( 'mouche_after_footer', 'mouche_sticky_single_add_to_cart', 999 );

/**
 * Header
 *
 * @see mouche_product_search()
 * @see mouche_header_cart()
 */
add_action( 'mouche_header', 'mouche_product_search', 40 );
add_action( 'mouche_header', 'mouche_header_cart', 60 );

/**
 * Cart fragment
 *
 * @see mouche_cart_link_fragment()
 */
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'mouche_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'mouche_cart_link_fragment' );
}

/**
 * Integrations
 *
 * @see mouche_woocommerce_brands_archive()
 * @see mouche_woocommerce_brands_single()
 * @see mouche_woocommerce_brands_homepage_section()
 */
if ( class_exists( 'WC_Brands' ) ) {
	add_action( 'woocommerce_archive_description', 'mouche_woocommerce_brands_archive', 5 );
	add_action( 'woocommerce_single_product_summary', 'mouche_woocommerce_brands_single', 4 );
	add_action( 'homepage', 'mouche_woocommerce_brands_homepage_section', 80 );
}
