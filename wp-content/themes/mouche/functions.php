<?php
require_once( 'wp-less/bootstrap.php' );
/**
 * mouche engine room
 *
 * @package mouche
 */

/**
 * Assign the mouche version to a var
 */
$theme              = wp_get_theme( 'mouche' );
$mouche_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$mouche = (object) array(
	'version'    => $mouche_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-mouche.php',
	'customizer' => require 'inc/customizer/class-mouche-customizer.php',
);

require 'inc/mouche-functions.php';
require 'inc/mouche-template-hooks.php';
require 'inc/mouche-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$mouche->jetpack = require 'inc/jetpack/class-mouche-jetpack.php';
}

if ( mouche_is_woocommerce_activated() ) {
	$mouche->woocommerce            = require 'inc/woocommerce/class-mouche-woocommerce.php';

	require 'inc/woocommerce/mouche-woocommerce-template-hooks.php';
	require 'inc/woocommerce/mouche-woocommerce-template-functions.php';
	require 'inc/woocommerce/mouche-woocommerce-functions.php';
}

define( 'ACF_PATH', get_template_directory() . '/inc/acf/' );
define( 'ACF_URL', get_template_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( ACF_PATH . 'acf.php' );

include_once( 'safe-svg/safe-svg.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return ACF_URL;
}

// Add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

if( function_exists('acf_add_local_field_group') ) {
	acf_add_local_field_group(array(
		'key' => 'group_5db88fa324148',
		'title' => 'Theme options',
		'fields' => array(
			array(
				'key' => 'field_5f30bb16ff5vvbf',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5ed7a2b930840hh',
				'label' => 'Theme colors',
				'name' => 'theme_colors',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed7a2d230841hh',
						'label' => 'Color primary',
						'name' => 'color_primary',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#000000',
					),
					array(
						'key' => 'field_5ed7a2e730842hh',
						'label' => 'Color secondary',
						'name' => 'color_secondary',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#000000',
					),
					array(
						'key' => 'field_5ed7a2f930843hh',
						'label' => 'Color tertiary',
						'name' => 'color_tertiary',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#000000',
					),
				),
			),
			array(
			'key' => 'field_5ed74b04b8f7bgg',
			'label' => 'Border color',
			'name' => 'border_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '#E8E8E8',
		),
		array(
			'key' => 'field_5ed751edb8f9cgg',
			'label' => 'Border radius',
			'name' => 'border_radius',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5ed751f6b8f9dgg',
					'label' => 'Small',
					'name' => 'small',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => 6,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => '',
					'step' => 1,
				),
				array(
					'key' => 'field_5ed75217b8f9egg',
					'label' => 'Medium',
					'name' => 'medium',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => 16,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => '',
					'step' => 1,
				),
				array(
					'key' => 'field_5ed75237b8f9fgg',
					'label' => 'Large',
					'name' => 'large',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => 24,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => '',
					'step' => 1,
				),
			),
		),
			array(
				'key' => 'field_5e53b4j9d8a122',
				'label' => 'Social networks',
				'name' => 'social_networks',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e53j5e78a124',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'facebook' => 'facebook',
							'twitter' => 'twitter',
							'pinterest' => 'pinterest',
							'youtube' => 'youtube',
							'instagram' => 'instagram',
							'linkedin' => 'linkedin',
							'medium' => 'medium',
						),
						'default_value' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5e53b7765358c',
						'label' => 'Url',
						'name' => 'url',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '#',
						'placeholder' => 'https://',
					),
				),
			),
			array(
				'key' => 'field_5e35cb05a2g7a6',
				'label' => 'Add shadow to elements?',
				'name' => 'shadow',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5db71e1d52e26',
				'label' => 'Make buttons round?',
				'name' => 'round',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'round' => 'yes',
					'' => 'No',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => 'round',
				'layout' => 'vertical',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5ed74edbb8f89gg',
				'label' => 'Box shadow',
				'name' => 'box_shadow',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed74eecb8f8agg',
						'label' => 'X',
						'name' => 'x',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed74f1fb8f8bgg',
						'label' => 'Y',
						'name' => 'y',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed74f3ab8f8cgg',
						'label' => 'Blur radius',
						'name' => 'blur_radius',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed74f5eb8f8dgg',
						'label' => 'Spread radius',
						'name' => 'spread_radius',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed8b615f4392',
						'label' => 'Color',
						'name' => 'color',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'table',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed8b64bf4393bb',
								'label' => 'Red',
								'name' => 'red',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 0,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => 255,
								'step' => 1,
							),
							array(
								'key' => 'field_5ed8b66df4394bb',
								'label' => 'Green',
								'name' => 'green',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 0,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => 255,
								'step' => 1,
							),
							array(
								'key' => 'field_5ed8b674f4395bb',
								'label' => 'Blue',
								'name' => 'blue',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 0,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => 255,
								'step' => 1,
							),
							array(
								'key' => 'field_5ed8b7334b4f4bb',
								'label' => 'Alpha',
								'name' => 'alpha',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => '0.1',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => 1,
								'step' => '0.01',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_5ftt30bb16ff5bf',
				'label' => 'Header & Footer',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5db8fb129236a',
				'label' => 'White logo',
				'name' => 'white_logo',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5db8fbbb129236a',
				'label' => 'Sticky menu logo',
				'name' => 'sticky_menu_logo',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5db8fb691e6ee',
				'label' => 'Black logo',
				'name' => 'black_logo',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5dbcacf9df85a',
				'label' => 'Extra navigation elements',
				'name' => 'extra_navigation_elements',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
				array(
					'key' => 'field_5ec241fbe76fe',
					'label' => 'Item',
					'name' => 'item',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'social_icons' => 'social_icons',
						'custom_icon' => 'custom_icon',
						'button' => 'button',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5ec246c9cec9a',
					'label' => 'Item class',
					'name' => 'item_class',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ec2436207f37',
					'label' => 'label',
					'name' => 'label',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'button',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ec2443107f3e',
					'label' => 'size',
					'name' => 'size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'button',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'small' => 'small',
						'medium' => 'medium',
						'large' => 'large',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5ec2445607f3f',
					'label' => 'color',
					'name' => 'color',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'button',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'primary' => 'primary',
						'secondary' => 'secondary',
						'tertiary' => 'tertiary',
						'ghost-white' => 'ghost-white',
						'ghost-black' => 'ghost-black',
						'transparent' => 'transparent',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5ec244ac07f40',
					'label' => 'New tab?',
					'name' => 'target',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'button',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 0,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5ec2450907f42',
					'label' => 'Url',
					'name' => 'url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'button',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ec2455707f43',
					'label' => 'Url',
					'name' => 'icon_url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'custom_icon',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ec2458907f44',
					'label' => 'Icon class',
					'name' => 'icon_class',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5ec241fbe76fe',
								'operator' => '==',
								'value' => 'custom_icon',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			),
			array(
				'key' => 'field_5dbcb4ec39811',
				'label' => 'Navigation theme',
				'name' => 'navigation_theme',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'dark' => 'dark',
					'light' => 'light',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5dbcdfcb1fd46',
				'label' => 'Navigation background color',
				'name' => 'navigation_background_color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#ffffff',
			),
			array(
				'key' => 'field_5dbcdddfcb1fd46',
				'label' => 'Sticky navigation background color',
				'name' => 'sticky_navigation_background_color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#ffffff',
			),
			array(
				'key' => 'field_5dbe3c434313f',
				'label' => 'Footer theme',
				'name' => 'footer_theme',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'dark' => 'dark',
					'light' => 'light',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => 'light',
				'layout' => 'vertical',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5dbe3c5d43140',
				'label' => 'Footer background color',
				'name' => 'footer_background_color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#ffffff',
			),
			array(
				'key' => 'field_5fww30bb16ff5bf',
				'label' => 'Typography',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5e4fx8a24149ef',
				'label' => 'Google fonts',
				'name' => 'fonts',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e4f8xa32149f0',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'ABeeZee' => 'ABeeZee',
							'Abel' => 'Abel',
							'Abhaya Libre' => 'Abhaya Libre',
							'Abril Fatface' => 'Abril Fatface',
							'Aclonica' => 'Aclonica',
							'Acme' => 'Acme',
							'Actor' => 'Actor',
							'Adamina' => 'Adamina',
							'Advent Pro' => 'Advent Pro',
							'Aguafina Script' => 'Aguafina Script',
							'Akronim' => 'Akronim',
							'Aladin' => 'Aladin',
							'Aldrich' => 'Aldrich',
							'Alef' => 'Alef',
							'Alegreya' => 'Alegreya',
							'Alegreya SC' => 'Alegreya SC',
							'Alegreya Sans' => 'Alegreya Sans',
							'Alegreya Sans SC' => 'Alegreya Sans SC',
							'Alex Brush' => 'Alex Brush',
							'Alfa Slab One' => 'Alfa Slab One',
							'Alice' => 'Alice',
							'Alike' => 'Alike',
							'Alike Angular' => 'Alike Angular',
							'Allan' => 'Allan',
							'Allerta' => 'Allerta',
							'Allerta Stencil' => 'Allerta Stencil',
							'Allura' => 'Allura',
							'Almendra' => 'Almendra',
							'Almendra Display' => 'Almendra Display',
							'Almendra SC' => 'Almendra SC',
							'Amarante' => 'Amarante',
							'Amaranth' => 'Amaranth',
							'Amatic SC' => 'Amatic SC',
							'Amatica SC' => 'Amatica SC',
							'Amethysta' => 'Amethysta',
							'Amiko' => 'Amiko',
							'Amiri' => 'Amiri',
							'Amita' => 'Amita',
							'Anaheim' => 'Anaheim',
							'Andada' => 'Andada',
							'Andika' => 'Andika',
							'Angkor' => 'Angkor',
							'Annie Use Your Telescope' => 'Annie Use Your Telescope',
							'Anonymous Pro' => 'Anonymous Pro',
							'Antic' => 'Antic',
							'Antic Didone' => 'Antic Didone',
							'Antic Slab' => 'Antic Slab',
							'Anton' => 'Anton',
							'Arapey' => 'Arapey',
							'Arbutus' => 'Arbutus',
							'Arbutus Slab' => 'Arbutus Slab',
							'Architects Daughter' => 'Architects Daughter',
							'Archivo' => 'Archivo',
							'Archivo Black' => 'Archivo Black',
							'Archivo Narrow' => 'Archivo Narrow',
							'Aref Ruqaa' => 'Aref Ruqaa',
							'Arima Madurai' => 'Arima Madurai',
							'Arimo' => 'Arimo',
							'Arizonia' => 'Arizonia',
							'Armata' => 'Armata',
							'Arsenal' => 'Arsenal',
							'Artifika' => 'Artifika',
							'Arvo' => 'Arvo',
							'Arya' => 'Arya',
							'Asap' => 'Asap',
							'Asap Condensed' => 'Asap Condensed',
							'Asar' => 'Asar',
							'Asset' => 'Asset',
							'Assistant' => 'Assistant',
							'Astloch' => 'Astloch',
							'Asul' => 'Asul',
							'Athiti' => 'Athiti',
							'Atma' => 'Atma',
							'Atomic Age' => 'Atomic Age',
							'Aubrey' => 'Aubrey',
							'Audiowide' => 'Audiowide',
							'Autour One' => 'Autour One',
							'Average' => 'Average',
							'Average Sans' => 'Average Sans',
							'Averia Gruesa Libre' => 'Averia Gruesa Libre',
							'Averia Libre' => 'Averia Libre',
							'Averia Sans Libre' => 'Averia Sans Libre',
							'Averia Serif Libre' => 'Averia Serif Libre',
							'Bad Script' => 'Bad Script',
							'Bahiana' => 'Bahiana',
							'Baloo' => 'Baloo',
							'Baloo Bhai' => 'Baloo Bhai',
							'Baloo Bhaijaan' => 'Baloo Bhaijaan',
							'Baloo Bhaina' => 'Baloo Bhaina',
							'Baloo Chettan' => 'Baloo Chettan',
							'Baloo Da' => 'Baloo Da',
							'Baloo Paaji' => 'Baloo Paaji',
							'Baloo Tamma' => 'Baloo Tamma',
							'Baloo Tammudu' => 'Baloo Tammudu',
							'Baloo Thambi' => 'Baloo Thambi',
							'Balthazar' => 'Balthazar',
							'Bangers' => 'Bangers',
							'Barrio' => 'Barrio',
							'Basic' => 'Basic',
							'Battambang' => 'Battambang',
							'Baumans' => 'Baumans',
							'Bayon' => 'Bayon',
							'Belgrano' => 'Belgrano',
							'Bellefair' => 'Bellefair',
							'Belleza' => 'Belleza',
							'BenchNine' => 'BenchNine',
							'Bentham' => 'Bentham',
							'Berkshire Swash' => 'Berkshire Swash',
							'Bevan' => 'Bevan',
							'Bigelow Rules' => 'Bigelow Rules',
							'Bigshot One' => 'Bigshot One',
							'Bilbo' => 'Bilbo',
							'Bilbo Swash Caps' => 'Bilbo Swash Caps',
							'BioRhyme' => 'BioRhyme',
							'BioRhyme Expanded' => 'BioRhyme Expanded',
							'Biryani' => 'Biryani',
							'Bitter' => 'Bitter',
							'Black Ops One' => 'Black Ops One',
							'Bokor' => 'Bokor',
							'Bonbon' => 'Bonbon',
							'Boogaloo' => 'Boogaloo',
							'Bowlby One' => 'Bowlby One',
							'Bowlby One SC' => 'Bowlby One SC',
							'Brawler' => 'Brawler',
							'Bree Serif' => 'Bree Serif',
							'Bubblegum Sans' => 'Bubblegum Sans',
							'Bubbler One' => 'Bubbler One',
							'Buda' => 'Buda',
							'Buenard' => 'Buenard',
							'Bungee' => 'Bungee',
							'Bungee Hairline' => 'Bungee Hairline',
							'Bungee Inline' => 'Bungee Inline',
							'Bungee Outline' => 'Bungee Outline',
							'Bungee Shade' => 'Bungee Shade',
							'Butcherman' => 'Butcherman',
							'Butterfly Kids' => 'Butterfly Kids',
							'Cabin' => 'Cabin',
							'Cabin Condensed' => 'Cabin Condensed',
							'Cabin Sketch' => 'Cabin Sketch',
							'Caesar Dressing' => 'Caesar Dressing',
							'Cagliostro' => 'Cagliostro',
							'Cairo' => 'Cairo',
							'Calligraffitti' => 'Calligraffitti',
							'Cambay' => 'Cambay',
							'Cambo' => 'Cambo',
							'Candal' => 'Candal',
							'Cantarell' => 'Cantarell',
							'Cantata One' => 'Cantata One',
							'Cantora One' => 'Cantora One',
							'Capriola' => 'Capriola',
							'Cardo' => 'Cardo',
							'Carme' => 'Carme',
							'Carrois Gothic' => 'Carrois Gothic',
							'Carrois Gothic SC' => 'Carrois Gothic SC',
							'Carter One' => 'Carter One',
							'Catamaran' => 'Catamaran',
							'Caudex' => 'Caudex',
							'Caveat' => 'Caveat',
							'Caveat Brush' => 'Caveat Brush',
							'Cedarville Cursive' => 'Cedarville Cursive',
							'Ceviche One' => 'Ceviche One',
							'Changa' => 'Changa',
							'Changa One' => 'Changa One',
							'Chango' => 'Chango',
							'Chathura' => 'Chathura',
							'Chau Philomene One' => 'Chau Philomene One',
							'Chela One' => 'Chela One',
							'Chelsea Market' => 'Chelsea Market',
							'Chenla' => 'Chenla',
							'Cherry Cream Soda' => 'Cherry Cream Soda',
							'Cherry Swash' => 'Cherry Swash',
							'Chewy' => 'Chewy',
							'Chicle' => 'Chicle',
							'Chivo' => 'Chivo',
							'Chonburi' => 'Chonburi',
							'Cinzel' => 'Cinzel',
							'Cinzel Decorative' => 'Cinzel Decorative',
							'Clicker Script' => 'Clicker Script',
							'Coda' => 'Coda',
							'Coda Caption' => 'Coda Caption',
							'Codystar' => 'Codystar',
							'Coiny' => 'Coiny',
							'Combo' => 'Combo',
							'Comfortaa' => 'Comfortaa',
							'Coming Soon' => 'Coming Soon',
							'Concert One' => 'Concert One',
							'Condiment' => 'Condiment',
							'Content' => 'Content',
							'Contrail One' => 'Contrail One',
							'Convergence' => 'Convergence',
							'Cookie' => 'Cookie',
							'Copse' => 'Copse',
							'Corben' => 'Corben',
							'Cormorant' => 'Cormorant',
							'Cormorant Garamond' => 'Cormorant Garamond',
							'Cormorant Infant' => 'Cormorant Infant',
							'Cormorant SC' => 'Cormorant SC',
							'Cormorant Unicase' => 'Cormorant Unicase',
							'Cormorant Upright' => 'Cormorant Upright',
							'Courgette' => 'Courgette',
							'Cousine' => 'Cousine',
							'Coustard' => 'Coustard',
							'Covered By Your Grace' => 'Covered By Your Grace',
							'Crafty Girls' => 'Crafty Girls',
							'Creepster' => 'Creepster',
							'Crete Round' => 'Crete Round',
							'Crimson Text' => 'Crimson Text',
							'Croissant One' => 'Croissant One',
							'Crushed' => 'Crushed',
							'Cuprum' => 'Cuprum',
							'Cutive' => 'Cutive',
							'Cutive Mono' => 'Cutive Mono',
							'Damion' => 'Damion',
							'Dancing Script' => 'Dancing Script',
							'Dangrek' => 'Dangrek',
							'David Libre' => 'David Libre',
							'Dawning of a New Day' => 'Dawning of a New Day',
							'Days One' => 'Days One',
							'Dekko' => 'Dekko',
							'Delius' => 'Delius',
							'Delius Swash Caps' => 'Delius Swash Caps',
							'Delius Unicase' => 'Delius Unicase',
							'Della Respira' => 'Della Respira',
							'Denk One' => 'Denk One',
							'Devonshire' => 'Devonshire',
							'Dhurjati' => 'Dhurjati',
							'Didact Gothic' => 'Didact Gothic',
							'Diplomata' => 'Diplomata',
							'Diplomata SC' => 'Diplomata SC',
							'Domine' => 'Domine',
							'Donegal One' => 'Donegal One',
							'Doppio One' => 'Doppio One',
							'Dorsa' => 'Dorsa',
							'Dosis' => 'Dosis',
							'Dr Sugiyama' => 'Dr Sugiyama',
							'Droid Sans' => 'Droid Sans',
							'Droid Sans Mono' => 'Droid Sans Mono',
							'Droid Serif' => 'Droid Serif',
							'Duru Sans' => 'Duru Sans',
							'Dynalight' => 'Dynalight',
							'EB Garamond' => 'EB Garamond',
							'Eagle Lake' => 'Eagle Lake',
							'Eater' => 'Eater',
							'Economica' => 'Economica',
							'Eczar' => 'Eczar',
							'El Messiri' => 'El Messiri',
							'Electrolize' => 'Electrolize',
							'Elsie' => 'Elsie',
							'Elsie Swash Caps' => 'Elsie Swash Caps',
							'Emblema One' => 'Emblema One',
							'Emilys Candy' => 'Emilys Candy',
							'Encode Sans' => 'Encode Sans',
							'Encode Sans Condensed' => 'Encode Sans Condensed',
							'Encode Sans Expanded' => 'Encode Sans Expanded',
							'Encode Sans Semi Condensed' => 'Encode Sans Semi Condensed',
							'Encode Sans Semi Expanded' => 'Encode Sans Semi Expanded',
							'Engagement' => 'Engagement',
							'Englebert' => 'Englebert',
							'Enriqueta' => 'Enriqueta',
							'Erica One' => 'Erica One',
							'Esteban' => 'Esteban',
							'Euphoria Script' => 'Euphoria Script',
							'Ewert' => 'Ewert',
							'Exo' => 'Exo',
							'Exo 2' => 'Exo 2',
							'Expletus Sans' => 'Expletus Sans',
							'Fanwood Text' => 'Fanwood Text',
							'Farsan' => 'Farsan',
							'Fascinate' => 'Fascinate',
							'Fascinate Inline' => 'Fascinate Inline',
							'Faster One' => 'Faster One',
							'Fasthand' => 'Fasthand',
							'Fauna One' => 'Fauna One',
							'Faustina' => 'Faustina',
							'Federant' => 'Federant',
							'Federo' => 'Federo',
							'Felipa' => 'Felipa',
							'Fenix' => 'Fenix',
							'Finger Paint' => 'Finger Paint',
							'Fira Mono' => 'Fira Mono',
							'Fira Sans' => 'Fira Sans',
							'Fira Sans Condensed' => 'Fira Sans Condensed',
							'Fira Sans Extra Condensed' => 'Fira Sans Extra Condensed',
							'Fjalla One' => 'Fjalla One',
							'Fjord One' => 'Fjord One',
							'Flamenco' => 'Flamenco',
							'Flavors' => 'Flavors',
							'Fondamento' => 'Fondamento',
							'Fontdiner Swanky' => 'Fontdiner Swanky',
							'Forum' => 'Forum',
							'Francois One' => 'Francois One',
							'Frank Ruhl Libre' => 'Frank Ruhl Libre',
							'Freckle Face' => 'Freckle Face',
							'Fredericka the Great' => 'Fredericka the Great',
							'Fredoka One' => 'Fredoka One',
							'Freehand' => 'Freehand',
							'Fresca' => 'Fresca',
							'Frijole' => 'Frijole',
							'Fruktur' => 'Fruktur',
							'Fugaz One' => 'Fugaz One',
							'GFS Didot' => 'GFS Didot',
							'GFS Neohellenic' => 'GFS Neohellenic',
							'Gabriela' => 'Gabriela',
							'Gafata' => 'Gafata',
							'Galada' => 'Galada',
							'Galdeano' => 'Galdeano',
							'Galindo' => 'Galindo',
							'Gentium Basic' => 'Gentium Basic',
							'Gentium Book Basic' => 'Gentium Book Basic',
							'Geo' => 'Geo',
							'Geostar' => 'Geostar',
							'Geostar Fill' => 'Geostar Fill',
							'Germania One' => 'Germania One',
							'Gidugu' => 'Gidugu',
							'Gilda Display' => 'Gilda Display',
							'Give You Glory' => 'Give You Glory',
							'Glass Antiqua' => 'Glass Antiqua',
							'Glegoo' => 'Glegoo',
							'Gloria Hallelujah' => 'Gloria Hallelujah',
							'Goblin One' => 'Goblin One',
							'Gochi Hand' => 'Gochi Hand',
							'Gorditas' => 'Gorditas',
							'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
							'Graduate' => 'Graduate',
							'Grand Hotel' => 'Grand Hotel',
							'Gravitas One' => 'Gravitas One',
							'Great Vibes' => 'Great Vibes',
							'Griffy' => 'Griffy',
							'Gruppo' => 'Gruppo',
							'Gudea' => 'Gudea',
							'Gurajada' => 'Gurajada',
							'Habibi' => 'Habibi',
							'Halant' => 'Halant',
							'Hammersmith One' => 'Hammersmith One',
							'Hanalei' => 'Hanalei',
							'Hanalei Fill' => 'Hanalei Fill',
							'Handlee' => 'Handlee',
							'Hanuman' => 'Hanuman',
							'Happy Monkey' => 'Happy Monkey',
							'Harmattan' => 'Harmattan',
							'Headland One' => 'Headland One',
							'Heebo' => 'Heebo',
							'Henny Penny' => 'Henny Penny',
							'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
							'Hind' => 'Hind',
							'Hind Guntur' => 'Hind Guntur',
							'Hind Madurai' => 'Hind Madurai',
							'Hind Siliguri' => 'Hind Siliguri',
							'Hind Vadodara' => 'Hind Vadodara',
							'Holtwood One SC' => 'Holtwood One SC',
							'Homemade Apple' => 'Homemade Apple',
							'Homenaje' => 'Homenaje',
							'IM Fell DW Pica' => 'IM Fell DW Pica',
							'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
							'IM Fell Double Pica' => 'IM Fell Double Pica',
							'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
							'IM Fell English' => 'IM Fell English',
							'IM Fell English SC' => 'IM Fell English SC',
							'IM Fell French Canon' => 'IM Fell French Canon',
							'IM Fell French Canon SC' => 'IM Fell French Canon SC',
							'IM Fell Great Primer' => 'IM Fell Great Primer',
							'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
							'Iceberg' => 'Iceberg',
							'Iceland' => 'Iceland',
							'Imprima' => 'Imprima',
							'Inconsolata' => 'Inconsolata',
							'Inder' => 'Inder',
							'Indie Flower' => 'Indie Flower',
							'Inika' => 'Inika',
							'Inknut Antiqua' => 'Inknut Antiqua',
							'Irish Grover' => 'Irish Grover',
							'Istok Web' => 'Istok Web',
							'Italiana' => 'Italiana',
							'Italianno' => 'Italianno',
							'Itim' => 'Itim',
							'Jacques Francois' => 'Jacques Francois',
							'Jacques Francois Shadow' => 'Jacques Francois Shadow',
							'Jaldi' => 'Jaldi',
							'Jim Nightshade' => 'Jim Nightshade',
							'Jockey One' => 'Jockey One',
							'Jolly Lodger' => 'Jolly Lodger',
							'Jomhuria' => 'Jomhuria',
							'Josefin Sans' => 'Josefin Sans',
							'Josefin Slab' => 'Josefin Slab',
							'Joti One' => 'Joti One',
							'Judson' => 'Judson',
							'Julee' => 'Julee',
							'Julius Sans One' => 'Julius Sans One',
							'Junge' => 'Junge',
							'Jura' => 'Jura',
							'Just Another Hand' => 'Just Another Hand',
							'Just Me Again Down Here' => 'Just Me Again Down Here',
							'Kadwa' => 'Kadwa',
							'Kalam' => 'Kalam',
							'Kameron' => 'Kameron',
							'Kanit' => 'Kanit',
							'Kantumruy' => 'Kantumruy',
							'Karla' => 'Karla',
							'Karma' => 'Karma',
							'Katibeh' => 'Katibeh',
							'Kaushan Script' => 'Kaushan Script',
							'Kavivanar' => 'Kavivanar',
							'Kavoon' => 'Kavoon',
							'Kdam Thmor' => 'Kdam Thmor',
							'Keania One' => 'Keania One',
							'Kelly Slab' => 'Kelly Slab',
							'Kenia' => 'Kenia',
							'Khand' => 'Khand',
							'Khmer' => 'Khmer',
							'Khula' => 'Khula',
							'Kite One' => 'Kite One',
							'Knewave' => 'Knewave',
							'Kotta One' => 'Kotta One',
							'Koulen' => 'Koulen',
							'Kranky' => 'Kranky',
							'Kreon' => 'Kreon',
							'Kristi' => 'Kristi',
							'Krona One' => 'Krona One',
							'Kumar One' => 'Kumar One',
							'Kumar One Outline' => 'Kumar One Outline',
							'Kurale' => 'Kurale',
							'La Belle Aurore' => 'La Belle Aurore',
							'Laila' => 'Laila',
							'Lakki Reddy' => 'Lakki Reddy',
							'Lalezar' => 'Lalezar',
							'Lancelot' => 'Lancelot',
							'Lateef' => 'Lateef',
							'Lato' => 'Lato',
							'League Script' => 'League Script',
							'Leckerli One' => 'Leckerli One',
							'Ledger' => 'Ledger',
							'Lekton' => 'Lekton',
							'Lemon' => 'Lemon',
							'Lemonada' => 'Lemonada',
							'Libre Barcode 128' => 'Libre Barcode 128',
							'Libre Barcode 128 Text' => 'Libre Barcode 128 Text',
							'Libre Barcode 39' => 'Libre Barcode 39',
							'Libre Barcode 39 Extended' => 'Libre Barcode 39 Extended',
							'Libre Barcode 39 Extended Text' => 'Libre Barcode 39 Extended Text',
							'Libre Barcode 39 Text' => 'Libre Barcode 39 Text',
							'Libre Baskerville' => 'Libre Baskerville',
							'Libre Franklin' => 'Libre Franklin',
							'Life Savers' => 'Life Savers',
							'Lilita One' => 'Lilita One',
							'Lily Script One' => 'Lily Script One',
							'Limelight' => 'Limelight',
							'Linden Hill' => 'Linden Hill',
							'Lobster' => 'Lobster',
							'Lobster Two' => 'Lobster Two',
							'Londrina Outline' => 'Londrina Outline',
							'Londrina Shadow' => 'Londrina Shadow',
							'Londrina Sketch' => 'Londrina Sketch',
							'Londrina Solid' => 'Londrina Solid',
							'Lora' => 'Lora',
							'Love Ya Like A Sister' => 'Love Ya Like A Sister',
							'Loved by the King' => 'Loved by the King',
							'Lovers Quarrel' => 'Lovers Quarrel',
							'Luckiest Guy' => 'Luckiest Guy',
							'Lusitana' => 'Lusitana',
							'Lustria' => 'Lustria',
							'Macondo' => 'Macondo',
							'Macondo Swash Caps' => 'Macondo Swash Caps',
							'Mada' => 'Mada',
							'Magra' => 'Magra',
							'Maiden Orange' => 'Maiden Orange',
							'Maitree' => 'Maitree',
							'Mako' => 'Mako',
							'Mallanna' => 'Mallanna',
							'Mandali' => 'Mandali',
							'Manuale' => 'Manuale',
							'Marcellus' => 'Marcellus',
							'Marcellus SC' => 'Marcellus SC',
							'Marck Script' => 'Marck Script',
							'Margarine' => 'Margarine',
							'Marko One' => 'Marko One',
							'Marmelad' => 'Marmelad',
							'Martel' => 'Martel',
							'Martel Sans' => 'Martel Sans',
							'Marvel' => 'Marvel',
							'Mate' => 'Mate',
							'Mate SC' => 'Mate SC',
							'Maven Pro' => 'Maven Pro',
							'McLaren' => 'McLaren',
							'Meddon' => 'Meddon',
							'MedievalSharp' => 'MedievalSharp',
							'Medula One' => 'Medula One',
							'Meera Inimai' => 'Meera Inimai',
							'Megrim' => 'Megrim',
							'Meie Script' => 'Meie Script',
							'Merienda' => 'Merienda',
							'Merienda One' => 'Merienda One',
							'Merriweather' => 'Merriweather',
							'Merriweather Sans' => 'Merriweather Sans',
							'Metal' => 'Metal',
							'Metal Mania' => 'Metal Mania',
							'Metamorphous' => 'Metamorphous',
							'Metrophobic' => 'Metrophobic',
							'Michroma' => 'Michroma',
							'Milonga' => 'Milonga',
							'Miltonian' => 'Miltonian',
							'Miltonian Tattoo' => 'Miltonian Tattoo',
							'Miniver' => 'Miniver',
							'Miriam Libre' => 'Miriam Libre',
							'Mirza' => 'Mirza',
							'Miss Fajardose' => 'Miss Fajardose',
							'Mitr' => 'Mitr',
							'Modak' => 'Modak',
							'Modern Antiqua' => 'Modern Antiqua',
							'Mogra' => 'Mogra',
							'Molengo' => 'Molengo',
							'Molle' => 'Molle',
							'Monda' => 'Monda',
							'Monofett' => 'Monofett',
							'Monoton' => 'Monoton',
							'Monsieur La Doulaise' => 'Monsieur La Doulaise',
							'Montaga' => 'Montaga',
							'Montez' => 'Montez',
							'Montserrat' => 'Montserrat',
							'Montserrat Alternates' => 'Montserrat Alternates',
							'Montserrat Subrayada' => 'Montserrat Subrayada',
							'Moul' => 'Moul',
							'Moulpali' => 'Moulpali',
							'Mountains of Christmas' => 'Mountains of Christmas',
							'Mouse Memoirs' => 'Mouse Memoirs',
							'Mr Bedfort' => 'Mr Bedfort',
							'Mr Dafoe' => 'Mr Dafoe',
							'Mr De Haviland' => 'Mr De Haviland',
							'Mrs Saint Delafield' => 'Mrs Saint Delafield',
							'Mrs Sheppards' => 'Mrs Sheppards',
							'Mukta' => 'Mukta',
							'Mukta Mahee' => 'Mukta Mahee',
							'Mukta Malar' => 'Mukta Malar',
							'Mukta Vaani' => 'Mukta Vaani',
							'Muli' => 'Muli',
							'Mystery Quest' => 'Mystery Quest',
							'NTR' => 'NTR',
							'Neucha' => 'Neucha',
							'Neuton' => 'Neuton',
							'New Rocker' => 'New Rocker',
							'News Cycle' => 'News Cycle',
							'Niconne' => 'Niconne',
							'Nixie One' => 'Nixie One',
							'Nobile' => 'Nobile',
							'Nokora' => 'Nokora',
							'Norican' => 'Norican',
							'Nosifer' => 'Nosifer',
							'Nothing You Could Do' => 'Nothing You Could Do',
							'Noticia Text' => 'Noticia Text',
							'Noto Sans' => 'Noto Sans',
							'Noto Serif' => 'Noto Serif',
							'Nova Cut' => 'Nova Cut',
							'Nova Flat' => 'Nova Flat',
							'Nova Mono' => 'Nova Mono',
							'Nova Oval' => 'Nova Oval',
							'Nova Round' => 'Nova Round',
							'Nova Script' => 'Nova Script',
							'Nova Slim' => 'Nova Slim',
							'Nova Square' => 'Nova Square',
							'Numans' => 'Numans',
							'Nunito' => 'Nunito',
							'Nunito Sans' => 'Nunito Sans',
							'Odor Mean Chey' => 'Odor Mean Chey',
							'Offside' => 'Offside',
							'Old Standard TT' => 'Old Standard TT',
							'Oldenburg' => 'Oldenburg',
							'Oleo Script' => 'Oleo Script',
							'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
							'Open Sans' => 'Open Sans',
							'Open Sans Condensed' => 'Open Sans Condensed',
							'Oranienbaum' => 'Oranienbaum',
							'Orbitron' => 'Orbitron',
							'Oregano' => 'Oregano',
							'Orienta' => 'Orienta',
							'Original Surfer' => 'Original Surfer',
							'Oswald' => 'Oswald',
							'Over the Rainbow' => 'Over the Rainbow',
							'Overlock' => 'Overlock',
							'Overlock SC' => 'Overlock SC',
							'Overpass' => 'Overpass',
							'Overpass Mono' => 'Overpass Mono',
							'Ovo' => 'Ovo',
							'Oxygen' => 'Oxygen',
							'Oxygen Mono' => 'Oxygen Mono',
							'PT Mono' => 'PT Mono',
							'PT Sans' => 'PT Sans',
							'PT Sans Caption' => 'PT Sans Caption',
							'PT Sans Narrow' => 'PT Sans Narrow',
							'PT Serif' => 'PT Serif',
							'PT Serif Caption' => 'PT Serif Caption',
							'Pacifico' => 'Pacifico',
							'Padauk' => 'Padauk',
							'Palanquin' => 'Palanquin',
							'Palanquin Dark' => 'Palanquin Dark',
							'Pangolin' => 'Pangolin',
							'Paprika' => 'Paprika',
							'Parisienne' => 'Parisienne',
							'Passero One' => 'Passero One',
							'Passion One' => 'Passion One',
							'Pathway Gothic One' => 'Pathway Gothic One',
							'Patrick Hand' => 'Patrick Hand',
							'Patrick Hand SC' => 'Patrick Hand SC',
							'Pattaya' => 'Pattaya',
							'Patua One' => 'Patua One',
							'Pavanam' => 'Pavanam',
							'Paytone One' => 'Paytone One',
							'Peddana' => 'Peddana',
							'Peralta' => 'Peralta',
							'Permanent Marker' => 'Permanent Marker',
							'Petit Formal Script' => 'Petit Formal Script',
							'Petrona' => 'Petrona',
							'Philosopher' => 'Philosopher',
							'Piedra' => 'Piedra',
							'Pinyon Script' => 'Pinyon Script',
							'Pirata One' => 'Pirata One',
							'Plaster' => 'Plaster',
							'Play' => 'Play',
							'Playball' => 'Playball',
							'Playfair Display' => 'Playfair Display',
							'Playfair Display SC' => 'Playfair Display SC',
							'Podkova' => 'Podkova',
							'Poiret One' => 'Poiret One',
							'Poller One' => 'Poller One',
							'Poly' => 'Poly',
							'Pompiere' => 'Pompiere',
							'Pontano Sans' => 'Pontano Sans',
							'Poppins' => 'Poppins',
							'Port Lligat Sans' => 'Port Lligat Sans',
							'Port Lligat Slab' => 'Port Lligat Slab',
							'Pragati Narrow' => 'Pragati Narrow',
							'Prata' => 'Prata',
							'Preahvihear' => 'Preahvihear',
							'Press Start 2P' => 'Press Start 2P',
							'Pridi' => 'Pridi',
							'Princess Sofia' => 'Princess Sofia',
							'Prociono' => 'Prociono',
							'Prompt' => 'Prompt',
							'Prosto One' => 'Prosto One',
							'Proza Libre' => 'Proza Libre',
							'Puritan' => 'Puritan',
							'Purple Purse' => 'Purple Purse',
							'Quando' => 'Quando',
							'Quantico' => 'Quantico',
							'Quattrocento' => 'Quattrocento',
							'Quattrocento Sans' => 'Quattrocento Sans',
							'Questrial' => 'Questrial',
							'Quicksand' => 'Quicksand',
							'Quintessential' => 'Quintessential',
							'Qwigley' => 'Qwigley',
							'Racing Sans One' => 'Racing Sans One',
							'Radley' => 'Radley',
							'Rajdhani' => 'Rajdhani',
							'Rakkas' => 'Rakkas',
							'Raleway' => 'Raleway',
							'Raleway Dots' => 'Raleway Dots',
							'Ramabhadra' => 'Ramabhadra',
							'Ramaraja' => 'Ramaraja',
							'Rambla' => 'Rambla',
							'Rammetto One' => 'Rammetto One',
							'Ranchers' => 'Ranchers',
							'Rancho' => 'Rancho',
							'Ranga' => 'Ranga',
							'Rasa' => 'Rasa',
							'Rationale' => 'Rationale',
							'Ravi Prakash' => 'Ravi Prakash',
							'Redressed' => 'Redressed',
							'Reem Kufi' => 'Reem Kufi',
							'Reenie Beanie' => 'Reenie Beanie',
							'Revalia' => 'Revalia',
							'Rhodium Libre' => 'Rhodium Libre',
							'Ribeye' => 'Ribeye',
							'Ribeye Marrow' => 'Ribeye Marrow',
							'Righteous' => 'Righteous',
							'Risque' => 'Risque',
							'Roboto' => 'Roboto',
							'Roboto Condensed' => 'Roboto Condensed',
							'Roboto Mono' => 'Roboto Mono',
							'Roboto Slab' => 'Roboto Slab',
							'Rochester' => 'Rochester',
							'Rock Salt' => 'Rock Salt',
							'Rokkitt' => 'Rokkitt',
							'Romanesco' => 'Romanesco',
							'Ropa Sans' => 'Ropa Sans',
							'Rosario' => 'Rosario',
							'Rosarivo' => 'Rosarivo',
							'Rouge Script' => 'Rouge Script',
							'Rozha One' => 'Rozha One',
							'Rubik' => 'Rubik',
							'Rubik Mono One' => 'Rubik Mono One',
							'Ruda' => 'Ruda',
							'Rufina' => 'Rufina',
							'Ruge Boogie' => 'Ruge Boogie',
							'Ruluko' => 'Ruluko',
							'Rum Raisin' => 'Rum Raisin',
							'Ruslan Display' => 'Ruslan Display',
							'Russo One' => 'Russo One',
							'Ruthie' => 'Ruthie',
							'Rye' => 'Rye',
							'Sacramento' => 'Sacramento',
							'Sahitya' => 'Sahitya',
							'Sail' => 'Sail',
							'Saira' => 'Saira',
							'Saira Condensed' => 'Saira Condensed',
							'Saira Extra Condensed' => 'Saira Extra Condensed',
							'Saira Semi Condensed' => 'Saira Semi Condensed',
							'Salsa' => 'Salsa',
							'Sanchez' => 'Sanchez',
							'Sancreek' => 'Sancreek',
							'Sansita' => 'Sansita',
							'Sarala' => 'Sarala',
							'Sarina' => 'Sarina',
							'Sarpanch' => 'Sarpanch',
							'Satisfy' => 'Satisfy',
							'Scada' => 'Scada',
							'Scheherazade' => 'Scheherazade',
							'Schoolbell' => 'Schoolbell',
							'Scope One' => 'Scope One',
							'Seaweed Script' => 'Seaweed Script',
							'Secular One' => 'Secular One',
							'Sedgwick Ave' => 'Sedgwick Ave',
							'Sedgwick Ave Display' => 'Sedgwick Ave Display',
							'Sevillana' => 'Sevillana',
							'Seymour One' => 'Seymour One',
							'Shadows Into Light' => 'Shadows Into Light',
							'Shadows Into Light Two' => 'Shadows Into Light Two',
							'Shanti' => 'Shanti',
							'Share' => 'Share',
							'Share Tech' => 'Share Tech',
							'Share Tech Mono' => 'Share Tech Mono',
							'Shojumaru' => 'Shojumaru',
							'Short Stack' => 'Short Stack',
							'Shrikhand' => 'Shrikhand',
							'Siemreap' => 'Siemreap',
							'Sigmar One' => 'Sigmar One',
							'Signika' => 'Signika',
							'Signika Negative' => 'Signika Negative',
							'Simonetta' => 'Simonetta',
							'Sintony' => 'Sintony',
							'Sirin Stencil' => 'Sirin Stencil',
							'Six Caps' => 'Six Caps',
							'Skranji' => 'Skranji',
							'Slabo 13px' => 'Slabo 13px',
							'Slabo 27px' => 'Slabo 27px',
							'Slackey' => 'Slackey',
							'Smokum' => 'Smokum',
							'Smythe' => 'Smythe',
							'Sniglet' => 'Sniglet',
							'Snippet' => 'Snippet',
							'Snowburst One' => 'Snowburst One',
							'Sofadi One' => 'Sofadi One',
							'Sofia' => 'Sofia',
							'Sonsie One' => 'Sonsie One',
							'Sorts Mill Goudy' => 'Sorts Mill Goudy',
							'Source Code Pro' => 'Source Code Pro',
							'Source Sans Pro' => 'Source Sans Pro',
							'Source Serif Pro' => 'Source Serif Pro',
							'Space Mono' => 'Space Mono',
							'Special Elite' => 'Special Elite',
							'Spectral' => 'Spectral',
							'Spicy Rice' => 'Spicy Rice',
							'Spinnaker' => 'Spinnaker',
							'Spirax' => 'Spirax',
							'Squada One' => 'Squada One',
							'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
							'Sriracha' => 'Sriracha',
							'Stalemate' => 'Stalemate',
							'Stalinist One' => 'Stalinist One',
							'Stardos Stencil' => 'Stardos Stencil',
							'Stint Ultra Condensed' => 'Stint Ultra Condensed',
							'Stint Ultra Expanded' => 'Stint Ultra Expanded',
							'Stoke' => 'Stoke',
							'Strait' => 'Strait',
							'Sue Ellen Francisco' => 'Sue Ellen Francisco',
							'Suez One' => 'Suez One',
							'Sumana' => 'Sumana',
							'Sunshiney' => 'Sunshiney',
							'Supermercado One' => 'Supermercado One',
							'Sura' => 'Sura',
							'Suranna' => 'Suranna',
							'Suravaram' => 'Suravaram',
							'Suwannaphum' => 'Suwannaphum',
							'Swanky and Moo Moo' => 'Swanky and Moo Moo',
							'Syncopate' => 'Syncopate',
							'Tangerine' => 'Tangerine',
							'Taprom' => 'Taprom',
							'Tauri' => 'Tauri',
							'Taviraj' => 'Taviraj',
							'Teko' => 'Teko',
							'Telex' => 'Telex',
							'Tenali Ramakrishna' => 'Tenali Ramakrishna',
							'Tenor Sans' => 'Tenor Sans',
							'Text Me One' => 'Text Me One',
							'The Girl Next Door' => 'The Girl Next Door',
							'Tienne' => 'Tienne',
							'Tillana' => 'Tillana',
							'Timmana' => 'Timmana',
							'Tinos' => 'Tinos',
							'Titan One' => 'Titan One',
							'Titillium Web' => 'Titillium Web',
							'Trade Winds' => 'Trade Winds',
							'Trirong' => 'Trirong',
							'Trocchi' => 'Trocchi',
							'Trochut' => 'Trochut',
							'Trykker' => 'Trykker',
							'Tulpen One' => 'Tulpen One',
							'Ubuntu' => 'Ubuntu',
							'Ubuntu Condensed' => 'Ubuntu Condensed',
							'Ubuntu Mono' => 'Ubuntu Mono',
							'Ultra' => 'Ultra',
							'Uncial Antiqua' => 'Uncial Antiqua',
							'Underdog' => 'Underdog',
							'Unica One' => 'Unica One',
							'UnifrakturCook' => 'UnifrakturCook',
							'UnifrakturMaguntia' => 'UnifrakturMaguntia',
							'Unkempt' => 'Unkempt',
							'Unlock' => 'Unlock',
							'Unna' => 'Unna',
							'VT323' => 'VT323',
							'Vampiro One' => 'Vampiro One',
							'Varela' => 'Varela',
							'Varela Round' => 'Varela Round',
							'Vast Shadow' => 'Vast Shadow',
							'Vesper Libre' => 'Vesper Libre',
							'Vibur' => 'Vibur',
							'Vidaloka' => 'Vidaloka',
							'Viga' => 'Viga',
							'Voces' => 'Voces',
							'Volkhov' => 'Volkhov',
							'Vollkorn' => 'Vollkorn',
							'Voltaire' => 'Voltaire',
							'Waiting for the Sunrise' => 'Waiting for the Sunrise',
							'Wallpoet' => 'Wallpoet',
							'Walter Turncoat' => 'Walter Turncoat',
							'Warnes' => 'Warnes',
							'Wellfleet' => 'Wellfleet',
							'Wendy One' => 'Wendy One',
							'Wire One' => 'Wire One',
							'Work Sans' => 'Work Sans',
							'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
							'Yantramanav' => 'Yantramanav',
							'Yatra One' => 'Yatra One',
							'Yellowtail' => 'Yellowtail',
							'Yeseva One' => 'Yeseva One',
							'Yesteryear' => 'Yesteryear',
							'Yrsa' => 'Yrsa',
							'Zeyada' => 'Zeyada',
							'Zilla Slab' => 'Zilla Slab',
							'Zilla Slab Highlight' => 'Zilla Slab Highlight',
						),
						'default_value' => array(
							0 => 'Montserrat',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5e4fx8af2149f1',
						'label' => 'Variants',
						'name' => 'variants',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'regular' => 'regular',
							'italic' => 'italic',
							500 => '500',
							600 => '600',
							700 => '700',
							800 => '800',
							100 => '100',
							200 => '200',
							300 => '300',
							'700italic' => '700italic',
							900 => '900',
							'900italic' => '900italic',
							'100italic' => '100italic',
							'300italic' => '300italic',
							'500italic' => '500italic',
							'800italic' => '800italic',
							'600italic' => '600italic',
							'200italic' => '200italic',
						),
						'default_value' => array(
							0 => 'regular',
							1 => 700,
						),
						'allow_null' => 0,
						'multiple' => 1,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5e4fx8e70149f2',
						'label' => 'Subsets',
						'name' => 'subsets',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'latin' => 'latin',
							'latin-ext' => 'latin-ext',
							'sinhala' => 'sinhala',
							'greek' => 'greek',
							'hebrew' => 'hebrew',
							'vietnamese' => 'vietnamese',
							'cyrillic-ext' => 'cyrillic-ext',
							'greek-ext' => 'greek-ext',
							'cyrillic' => 'cyrillic',
							'devanagari' => 'devanagari',
							'arabic' => 'arabic',
							'khmer' => 'khmer',
							'tamil' => 'tamil',
							'thai' => 'thai',
							'bengali' => 'bengali',
							'gujarati' => 'gujarati',
							'oriya' => 'oriya',
							'malayalam' => 'malayalam',
							'gurmukhi' => 'gurmukhi',
							'kannada' => 'kannada',
							'telugu' => 'telugu',
							'myanmar' => 'myanmar',
						),
						'default_value' => array(
							0 => 'latin',
						),
						'allow_null' => 0,
						'multiple' => 1,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
				),
			),
			array(
				'key' => 'field_5ed75632c3964gg',
				'label' => 'Text colors',
				'name' => 'text_colors',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed75644c3965gg',
						'label' => 'Dark',
						'name' => 'dark',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#000000',
					),
					array(
						'key' => 'field_5ed7565fc3966gg',
						'label' => 'Light',
						'name' => 'light',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#ffffff',
					),
					array(
						'key' => 'field_5ed75671c3967gg',
						'label' => 'Dark grey',
						'name' => 'dark_grey',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#dddddd',
					),
					array(
						'key' => 'field_5ed75690c3968gg',
						'label' => 'Light grey',
						'name' => 'light_grey',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => '#fafafa',
					),
				),
			),
			array(
				'key' => 'field_5ed75265b8fa0gg',
				'label' => 'Heading size',
				'name' => 'heading_size',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed75271b8fa1gg',
						'label' => 'Small',
						'name' => 'small',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 24,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed75290b8fa2gg',
						'label' => 'Medium',
						'name' => 'medium',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 40,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed752b1b8fa3gg',
						'label' => 'Large',
						'name' => 'large',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 42,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
				),
			),
			array(
				'key' => 'field_5ed75306b8fa4gg',
				'label' => 'Font family',
				'name' => 'font_family',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed75316b8fa5gg',
						'label' => 'Heading',
						'name' => 'heading',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 'Open Sans',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5ed7532bb8fa6gg',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 'Open Sans',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
						'key' => 'field_5ed7a1c23083ahh',
						'label' => 'Text font size',
						'name' => 'text_font_size',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed7a1d73083bhh',
								'label' => 'Body',
								'name' => 'body',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 18,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5ed7a2053083chh',
								'label' => 'Small text',
								'name' => 'small_text',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 16,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5ed7a2333083dhh',
								'label' => 'Medium text',
								'name' => 'medium_text',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 18,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5ed7a23b3083ehh',
								'label' => 'Large text',
								'name' => 'large_text',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 20,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5ed7a2663083fhh',
								'label' => 'Labels',
								'name' => 'labels',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 13,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
						),
					),
			array(
				'key' => 'field_5fjj30bb16ff5bf',
				'label' => 'Buttons',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5ed75092b8f8fgg',
				'label' => 'Small button size',
				'name' => 'small_button_size',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed750bdb8f90gg',
						'label' => 'Vertical padding',
						'name' => 'vertical_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 18,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed750dfb8f91gg',
						'label' => 'Horizontal padding',
						'name' => 'horizontal_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 30,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed750f7b8f92gg',
						'label' => 'Font size',
						'name' => 'font_size',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 14,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
				),
			),
			array(
				'key' => 'field_5ed7515cb8f94gg',
				'label' => 'Medium button size',
				'name' => 'medium_button_size',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed7515cb8f95gg',
						'label' => 'Vertical padding',
						'name' => 'vertical_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 18,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed7515cb8f96gg',
						'label' => 'Horizontal padding',
						'name' => 'horizontal_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 30,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed7515cb8f97gg',
						'label' => 'Font size',
						'name' => 'font_size',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 14,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
				),
			),
			array(
				'key' => 'field_5ed75169b8f98gg',
				'label' => 'Large button size',
				'name' => 'large_button_size',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed75169b8f99gg',
						'label' => 'Vertical padding',
						'name' => 'vertical_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 18,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed75169b8f9agg',
						'label' => 'Horizontal padding',
						'name' => 'horizontal_padding',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 30,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
					array(
						'key' => 'field_5ed75169b8f9bgg',
						'label' => 'Font size',
						'name' => 'font_size',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'default_value' => 14,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 0,
						'max' => '',
						'step' => 1,
					),
				),
			),
			array(
				'key' => 'field_5hhhf30bb16ff5bf',
				'label' => 'Spacing',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5ed8a9af02150pp',
				'label' => 'Paddings',
				'name' => 'paddings',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed8a9c002151pp',
						'label' => 'Headers',
						'name' => 'headers',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed8a9d502152pp',
								'label' => 'Normal padding',
								'name' => 'normal_padding',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => '',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed8aa1802153pp',
										'label' => 'Desktop',
										'name' => 'desktop',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 150,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa4702154pp',
										'label' => 'Tablet',
										'name' => 'tablet',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 120,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa5b02155pp',
										'label' => 'Mobile',
										'name' => 'mobile',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 100,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
								),
							),
							array(
								'key' => 'field_5ed8aa7902157pp',
								'label' => 'Large padding',
								'name' => 'large_padding',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => '',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed8aa7902158pp',
										'label' => 'Desktop',
										'name' => 'desktop',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 200,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa7902159pp',
										'label' => 'Tablet',
										'name' => 'tablet',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 120,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa790215app',
										'label' => 'Mobile',
										'name' => 'mobile',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 100,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
								),
							),
						),
					),
					array(
						'key' => 'field_5ed8aa970215bpp',
						'label' => 'Sections',
						'name' => 'sections',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed8aa970215cpp',
								'label' => 'Normal padding',
								'name' => 'normal_padding',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed8aa970215dpp',
										'label' => 'Desktop',
										'name' => 'desktop',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 120,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa970215epp',
										'label' => 'Tablet',
										'name' => 'tablet',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 100,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa980215fpp',
										'label' => 'Mobile',
										'name' => 'mobile',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 80,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
								),
							),
							array(
								'key' => 'field_5ed8aa9802160pp',
								'label' => 'Large padding',
								'name' => 'large_padding',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed8aa9802161pp',
										'label' => 'Desktop',
										'name' => 'desktop',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 150,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa9802162pp',
										'label' => 'Tablet',
										'name' => 'tablet',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 120,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5ed8aa9802163pp',
										'label' => 'Mobile',
										'name' => 'mobile',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 100,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => '',
									),
								),
							),
						),
					),
				),
			),
			array(
				'key' => 'field_5f30bkkkb16ff5bf',
				'label' => 'Hover',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5ed8ba7e88b0abb',
				'label' => 'Hover colors',
				'name' => 'hover_colors',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5ed8baaf88b0bbb',
						'label' => 'Buttons',
						'name' => 'buttons',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed8bae488b0dbb',
								'label' => 'Primary',
								'name' => 'primary',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'choices' => array(
									'color-primary' => 'color-primary',
									'color-secondary' => 'color-secondary',
									'color-tertiary' => 'color-tertiary',
								),
								'default_value' => array(
									0 => 'color-primary',
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
							array(
								'key' => 'field_5ed8bb8b88b0ebb',
								'label' => 'Secondary',
								'name' => 'secondary',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'choices' => array(
									'color-primary' => 'color-primary',
									'color-secondary' => 'color-secondary',
									'color-tertiary' => 'color-tertiary',
								),
								'default_value' => array(
									0 => 'color-secondary',
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
							array(
								'key' => 'field_5ed8bbbf88b0fbb',
								'label' => 'Tertiary',
								'name' => 'tertiary',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'choices' => array(
									'color-primary' => 'color-primary',
									'color-secondary' => 'color-secondary',
									'color-tertiary' => 'color-tertiary',
								),
								'default_value' => array(
									0 => 'color-tertiary',
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
						),
					),
					array(
						'key' => 'field_5ed8bacd88b0cbb',
						'label' => 'Links',
						'name' => 'links',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed8bbfc88b10bb',
								'label' => 'Default',
								'name' => 'default',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'choices' => array(
									'black' => 'black',
									'color-primary' => 'color-primary',
									'color-secondary-' => 'color-secondary-',
									'color-tertiary' => 'color-tertiary',
								),
								'default_value' => array(
									0 => 'color-primary',
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
							array(
								'key' => 'field_5ed8bc6c88b11bb',
								'label' => 'Light',
								'name' => 'light',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'choices' => array(
									'white' => 'white',
									'color-primary' => 'color-primary',
									'color-secondary-' => 'color-secondary-',
									'color-tertiary' => 'color-tertiary',
								),
								'default_value' => array(
									0 => 'white',
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_5flll30bb16ff5bf',
				'label' => 'Forms',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
						'key' => 'field_5ed79f52a802f',
						'label' => 'Forms',
						'name' => 'forms',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5ed79f67a8030',
								'label' => 'Normal state styles',
								'name' => 'normal_state_styles',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed79f90a8031',
										'label' => 'background',
										'name' => 'background',
										'type' => 'color_picker',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => '#ffffff',
									),
									array(
										'key' => 'field_5ed79fb6a8032',
										'label' => 'Border color',
										'name' => 'border_color',
										'type' => 'color_picker',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => '#dddddd',
									),
									array(
										'key' => 'field_5ed79fdea8033',
										'label' => 'Border radius',
										'name' => 'border_radius',
										'type' => 'select',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'choices' => array(
											'zero' => 'zero',
											'small' => 'small',
											'medium' => 'medium',
											'big' => 'big',
										),
										'default_value' => array(
											0 => 'zero',
										),
										'allow_null' => 0,
										'multiple' => 0,
										'ui' => 0,
										'return_format' => 'value',
										'ajax' => 0,
										'placeholder' => '',
									),
									array(
										'key' => 'field_5ed7a00fa8034',
										'label' => 'Minimum height',
										'name' => 'minimum_height',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 50,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => 1,
									),
									array(
										'key' => 'field_5ed7a6ea3084a',
										'label' => 'Font size',
										'name' => 'font_size',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => 13,
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => 0,
										'max' => '',
										'step' => 1,
									),
								),
							),
							array(
								'key' => 'field_5ed7a05ca8036',
								'label' => 'Focus state styles',
								'name' => 'focus_state_styles',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_5ed7a05da8037',
										'label' => 'background',
										'name' => 'background',
										'type' => 'color_picker',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => '#ffffff',
									),
									array(
										'key' => 'field_5ed7a05da8038',
										'label' => 'Border color',
										'name' => 'border_color',
										'type' => 'color_picker',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'hide_admin' => 0,
										'default_value' => '#dddddd',
									),
								),
							),
						),
					),
			array(
				'key' => 'field_5f30bb16jjjff5bf',
				'label' => 'Responsive',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5e31ac9767c7a',
				'label' => 'Mobile navigation breakpoint',
				'name' => 'mobile_navigation_breakpoint',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 991,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5eddfab5c721dii',
				'label' => 'Responsive heading size',
				'name' => 'responsive_heading_size',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'hide_admin' => 0,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5eddfae1c721fii',
						'label' => 'Tablet',
						'name' => 'tablet',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'table',
						'sub_fields' => array(
							array(
								'key' => 'field_5eddfaf4c7220ii',
								'label' => 'Large',
								'name' => 'large',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 36,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5eddfb16c7221ii',
								'label' => 'Medium',
								'name' => 'medium',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 28,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5eddfb2fc7222ii',
								'label' => 'Small',
								'name' => 'small',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 24,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
						),
					),
					array(
						'key' => 'field_5eddfb4cc7223ii',
						'label' => 'Mobile',
						'name' => 'mobile',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'hide_admin' => 0,
						'layout' => 'table',
						'sub_fields' => array(
							array(
								'key' => 'field_5eddfb4cc7224ii',
								'label' => 'Large',
								'name' => 'large',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 36,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5eddfb4cc7225ii',
								'label' => 'Medium',
								'name' => 'medium',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 28,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
							array(
								'key' => 'field_5eddfb4cc7226ii',
								'label' => 'Small',
								'name' => 'small',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'hide_admin' => 0,
								'default_value' => 24,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 0,
								'max' => '',
								'step' => 1,
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}

function adjustBrightness($hexCode, $adjustPercent) {
    $hexCode = ltrim($hexCode, '#');

    if (strlen($hexCode) == 3) {
        $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
    }

    $hexCode = array_map('hexdec', str_split($hexCode, 2));

    foreach ($hexCode as & $color) {
        $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
        $adjustAmount = ceil($adjustableLimit * $adjustPercent);

        $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }

    return '#' . implode($hexCode);
}

if ( class_exists( 'WPLessPlugin' ) ){
	$less = WPLessPlugin::getInstance();

  $color_primary = get_field('color_primary', 'options') ?: '#000000';
  $color_secondary = get_field('color_secondary', 'options') ?: '#000000';
  $color_tertiary = get_field('color_tertiary', 'options') ?: '#000000';

	$theme_colors = get_field( 'theme_colors', 'options' );

	if ( $theme_colors ) {
		$color_primary = $theme_colors['color_primary'];
	  $color_secondary = $theme_colors['color_secondary'];
	  $color_tertiary = $theme_colors['color_tertiary'];
	} else {
		$color_primary = '#000000';
	  $color_secondary = '#000000';
	  $color_tertiary = '#000000';
	}

	$hover_colors = get_field( 'hover_colors', 'options' );

	if ( $hover_colors ) {
		$button_primary_hover = $hover_colors['buttons']['primary'];

		switch ( $button_primary_hover ) {
			case 'color-primary':
				$button_primary_hover = adjustBrightness( $color_primary, -0.1 );
				break;
			case 'color-secondary':
				$button_primary_hover = $color_secondary;
				break;
			case 'color-tertiary':
				$button_primary_hover = $color_tertiary;
				break;
			default:
				$button_primary_hover = adjustBrightness( $color_primary, -0.1 );
				break;
		}

		$button_secondary_hover = $hover_colors['buttons']['secondary'];

		switch ( $button_secondary_hover ) {
			case 'color-primary':
				$button_secondary_hover = $color_primary;
				break;
			case 'color-secondary':
				$button_secondary_hover = adjustBrightness( $color_secondary, -0.1 );
				$button_secondary_hover = $color_secondary;
				break;
			case 'color-tertiary':
				$button_secondary_hover = $color_tertiary;
				break;
			default:
				$button_secondary_hover = adjustBrightness( $color_secondary, -0.1 );
				break;
		}

		$button_tertiary_hover = $hover_colors['buttons']['tertiary'];

		switch ( $button_tertiary_hover ) {
			case 'color-primary':
				$button_tertiary_hover = $color_primary;
				break;
			case 'color-secondary':
				$button_tertiary_hover = $color_secondary;
				break;
			case 'color-tertiary':
				$button_tertiary_hover = adjustBrightness( $color_tertiary, -0.1 );
				break;
			default:
				$button_tertiary_hover = adjustBrightness( $color_tertiary, -0.1 );
				break;
		}

		$default_link_hover = $hover_colors['links']['default'];

		switch ( $default_link_hover ) {
			case 'black':
				$default_link_hover = '#000000';
				break;
			case 'color-primary':
				$default_link_hover = adjustBrightness( $color_primary, -0.1 );
				break;
			case 'color-secondary':
				$default_link_hover = $color_secondary;
				break;
			case 'color-tertiary':
				$default_link_hover = $color_tertiary;
				break;
			default:
				$default_link_hover = adjustBrightness( $color_primary, -0.1 );
				break;
		}

		$light_link_hover = $hover_colors['links']['light'];

		switch ( $light_link_hover ) {
			case 'white':
				$light_link_hover = '#ffffff';
				break;
			case 'color-primary':
				$light_link_hover = $color_primary;
				break;
			case 'color-secondary':
				$light_link_hover = $color_secondary;
				break;
			case 'color-tertiary':
				$light_link_hover = $color_tertiary;
				break;
			default:
				$light_link_hover = adjustBrightness( $color_primary, -0.1 );
				break;
		}
	} else {
		$button_primary_hover = '#000000';
	  $button_secondary_hover = '#000000';
	  $button_tertiary_hover = '#000000';
		$light_link_hover = '#000000';
		$default_link_hover = '#000000';

	}

  $navigation_background_color = get_field('navigation_background_color', 'options') ?: '#000000';
	$sticky_navigation_background_color = get_field('sticky_navigation_background_color', 'options') ?: '#000000';
	$footer_background_color = get_field('footer_background_color', 'options') ?: '#000000';
  $mobile_navigation_breakpoint = get_field('mobile_navigation_breakpoint', 'options') ?: 991;

	$shadow_cards = get_field('shadow', 'options') ? '34px 62px 125px -25px rgba(50, 50, 93, 0.3)' : 'none';


	$border_color = get_field( 'border_color', 'options' ) ?: '#e8e8e8';
	$box_shadow = get_field( 'box_shadow', 'options' );

	if ( $box_shadow ) {
		$box_shadow = $box_shadow['x'] . 'px ' . $box_shadow['y'] . 'px ' . $box_shadow['blur_radius'] . 'px ' . $box_shadow['spread_radius'] . 'px ' . 'rgba(' . $box_shadow['color']['red'] . ',' . $box_shadow['color']['green'] . ',' . $box_shadow['color']['blue'] . ',' . $box_shadow['color']['alpha'] . ')';
	} else {
		$box_shadow = '0 4px 24px rgba(50, 50, 93, 0.3)';
	}

	$shadow = get_field('shadow', 'options') ? $box_shadow : 'none';

	$small_button = get_field('small_button_size', 'options');

	if ( $small_button ) {
		$small_button_vertical_padding = $small_button['vertical_padding'];
		$small_button_horizontal_padding = $small_button['horizontal_padding'];
		$small_button_font_size = $small_button['font_size'];
	} else {
		$small_button_vertical_padding = 18;
		$small_button_horizontal_padding = 30;
		$small_button_font_size = 14;
	}

	$medium_button = get_field('medium_button_size', 'options');

	if ( $medium_button ) {
		$medium_button_vertical_padding = $medium_button['vertical_padding'];
		$medium_button_horizontal_padding = $medium_button['horizontal_padding'];
		$medium_button_font_size = $medium_button['font_size'];
	} else {
		$medium_button_vertical_padding = 20;
		$medium_button_horizontal_padding = 40;
		$medium_button_font_size = 16;
	}

	$large_button = get_field('large_button_size', 'options');

	if ( $large_button ) {
		$large_button_vertical_padding = $large_button['vertical_padding'];
		$large_button_horizontal_padding = $large_button['horizontal_padding'];
		$large_button_font_size = $large_button['font_size'];
	} else {
		$large_button_vertical_padding = 15;
		$large_button_horizontal_padding = 75;
		$large_button_font_size = 16;
	}

	$border_radius = get_field( 'border_radius', 'options' );

	if ( $border_radius ) {
		$border_radius_small = $border_radius['small'];
		$border_radius_medium = $border_radius['medium'];
		$border_radius_large = $border_radius['large'];
	} else {
		$border_radius_small = 6;
		$border_radius_medium = 16;
		$border_radius_large = 24;
	}

	$heading_size = get_field( 'heading_size', 'options' );

	if ( $heading_size ) {
		$heading_size_small = $heading_size['small'];
		$heading_size_medium = $heading_size['medium'];
		$heading_size_large = $heading_size['large'];
	} else {
		$heading_size_small = 24;
		$heading_size_medium = 40;
		$heading_size_large = 42;
	}

	$font_family = get_field( 'font_family', 'options' );

	if ( $font_family ) {
		$font_family_heading = $font_family['heading'];
		$font_family_text = $font_family['text'];
	} else {
		$font_family_heading = 'Open Sans';
		$font_family_text = 'Open Sans';
	}

	$text_colors = get_field( 'text_colors', 'options' );

	if ( $text_colors ) {
		$color_dark = $text_colors['dark'];
		$color_light = $text_colors['light'];
		$color_dark_grey = $text_colors['dark_grey'];
		$color_light_grey = $text_colors['light_grey'];
	} else {
		$color_dark = '#000000';
		$color_light = '#ffffff';
		$color_dark_grey = '#dddddd';
		$color_light_grey = '#fafafa';
	}

	$forms = get_field( 'forms', 'options' );

	if ( $forms ) {
		$input_focus_border_color = $forms['focus_state_styles']['border_color'] ?: '#ffffff';
		$input_focus_background = $forms['focus_state_styles']['background'] ?: '#ffffff';
		$input_background = $forms['normal_state_styles']['background'] ?: '#ffffff';
		$input_font_size = $forms['normal_state_styles']['font_size'] ?: 13;
		$input_border_color = $forms['normal_state_styles']['border_color'] ?: '#ffffff';
		$input_border_radius = $forms['normal_state_styles']['border_radius'];

		switch ( $input_border_radius ) {
			case 'zero':
				$input_border_radius = 0;
				break;
			case 'small':
				$input_border_radius = $border_radius_small;
				break;
			case 'medium':
				$input_border_radius = $border_radius_medium;
				break;
			case 'big':
				$input_border_radius = $border_radius_large;
				break;
			default:
				$input_border_radius = 0;
				break;
		}

		$input_minimum_height = $forms['normal_state_styles']['minimum_height'];
	} else {
		$input_focus_border_color = '#ffffff';
		$input_focus_background = '#ffffff';
		$input_background = '#ffffff';
		$input_font_size = 13;
		$input_border_color = '#ffffff';
		$input_border_radius = 0;
		$input_minimum_height = 50;
	}

	$text_font_size = get_field( 'text_font_size', 'options' );

	if ( $text_font_size ) {
		$body_font_size = $text_font_size['body'];
		$label_font_size = $text_font_size['labels'];
		$text_large = $text_font_size['large_text'];
		$text_medium = $text_font_size['medium_text'];
		$text_small = $text_font_size['small_text'];
	} else {
		$body_font_size = 18;
		$label_font_size = 13;
		$text_large = 20;
		$text_medium = 16;
		$text_small = 14;
	}

	$paddings = get_field( 'paddings', 'options' );

	if ( $paddings ) {
		$block_padding_large_desktop = $paddings['sections']['large_padding']['desktop'];
		$block_padding_large_tablet = $paddings['sections']['large_padding']['tablet'];
		$block_padding_large_mobile = $paddings['sections']['large_padding']['mobile'];
		$block_padding_normal_desktop = $paddings['sections']['normal_padding']['desktop'];
		$block_padding_normal_tablet = $paddings['sections']['normal_padding']['tablet'];
		$block_padding_normal_mobile = $paddings['sections']['normal_padding']['mobile'];

		$header_padding_large_desktop = $paddings['headers']['large_padding']['desktop'];
		$header_padding_large_tablet = $paddings['headers']['large_padding']['tablet'];
		$header_padding_large_mobile = $paddings['headers']['large_padding']['mobile'];
		$header_padding_normal_desktop = $paddings['headers']['normal_padding']['desktop'];
		$header_padding_normal_tablet = $paddings['headers']['normal_padding']['tablet'];
		$header_padding_normal_mobile = $paddings['headers']['normal_padding']['mobile'];
	} else {
		$block_padding_large_desktop = 150;
		$block_padding_large_tablet = 120;
		$block_padding_large_mobile = 80;
		$block_padding_normal_desktop = 120;
		$block_padding_normal_tablet = 80;
		$block_padding_normal_mobile = 50;

		$header_padding_large_desktop = 200;
		$header_padding_large_tablet = 150;
		$header_padding_large_mobile = 100;
		$header_padding_normal_desktop = 150;
		$header_padding_normal_tablet = 120;
		$header_padding_normal_mobile = 100;
	}

	$responsive_heading_size = get_field( 'responsive_heading_size', 'options' );

	if ( $responsive_heading_size ) {
		$responsive_heading_size_tablet_small = $responsive_heading_size['tablet']['small'];
		$responsive_heading_size_tablet_medium = $responsive_heading_size['tablet']['medium'];
		$responsive_heading_size_tablet_large = $responsive_heading_size['tablet']['large'];

		$responsive_heading_size_mobile_small = $responsive_heading_size['mobile']['small'];
		$responsive_heading_size_mobile_medium = $responsive_heading_size['mobile']['medium'];
		$responsive_heading_size_mobile_large = $responsive_heading_size['mobile']['large'];
	} else {
		$responsive_heading_size_tablet_small = 24;
		$responsive_heading_size_tablet_medium = 28;
		$responsive_heading_size_tablet_large = 36;

		$responsive_heading_size_mobile_small = 24;
		$responsive_heading_size_mobile_medium = 28;
		$responsive_heading_size_mobile_large = 36;
	}

	$footer_theme = get_field('footer_theme', 'options');

	if ( $footer_theme == 'dark' ) {
		$footer_text_color = $color_light;
	} else {
		$footer_text_color = $color_dark;
	}

	// General
  $less->addVariable( 'color-primary', $color_primary );
  $less->addVariable( 'color-secondary', $color_secondary );
  $less->addVariable( 'color-tertiary', $color_tertiary );
  $less->addVariable('menu-breakpoint', $mobile_navigation_breakpoint );
  $less->addVariable('navigation-bg',  $navigation_background_color);
	$less->addVariable('sticky-navigation-bg',  $sticky_navigation_background_color);
  $less->addVariable('footer-bg',  $footer_background_color);
	$less->addVariable('shadow',  $shadow);
	$less->addVariable('shadow-cards',  $shadow_cards);
	$less->addVariable( 'border-color', $border_color );

	// Buttons
	$less->addVariable( 'small-button-vertical-padding', $small_button_vertical_padding );
	$less->addVariable( 'small-button-horizontal-padding', $small_button_horizontal_padding );
	$less->addVariable( 'small-button-font-size', $small_button_font_size );

	$less->addVariable( 'medium-button-vertical-padding', $medium_button_vertical_padding );
	$less->addVariable( 'medium-button-horizontal-padding', $medium_button_horizontal_padding );
	$less->addVariable( 'medium-button-font-size', $medium_button_font_size );

	$less->addVariable( 'large-button-vertical-padding', $large_button_vertical_padding );
	$less->addVariable( 'large-button-horizontal-padding', $large_button_horizontal_padding );
	$less->addVariable( 'large-button-font-size', $large_button_font_size );

	// Border radius
	$less->addVariable( 'border-radius-small', $border_radius_small );
	$less->addVariable( 'border-radius-medium', $border_radius_medium );
	$less->addVariable( 'border-radius-big', $border_radius_large );

	// Heading size
	$less->addVariable( 'heading-size-small', $heading_size_small );
	$less->addVariable( 'heading-size-medium', $heading_size_medium );
	$less->addVariable( 'heading-size-large', $heading_size_large );

	// Font family
	$less->addVariable( 'text-font-family', $font_family_text );
	$less->addVariable( 'heading-font-family', $font_family_heading );

	// Text colors
	$less->addVariable( 'color-dark', $color_dark );
	$less->addVariable( 'color-light', $color_light );
	$less->addVariable( 'color-dark-grey', $color_dark_grey );
	$less->addVariable( 'color-light-grey', $color_light_grey );

	// Forms
	$less->addVariable( 'input-focus-border-color', $input_focus_border_color );
	$less->addVariable( 'input-focus-background', $input_focus_background );
	$less->addVariable( 'input-background', $input_background );
	$less->addVariable( 'input-font-size', $input_font_size );
	$less->addVariable( 'input-border-color', $input_border_color );
	$less->addVariable( 'input-border-radius', $input_border_radius );
	$less->addVariable( 'input-minimum-height', $input_minimum_height );

	// Text font size
	$less->addVariable( 'body-font-size', $body_font_size );
	$less->addVariable( 'label-font-size', $label_font_size );
	$less->addVariable( 'text-large', $text_large );
	$less->addVariable( 'text-medium', $text_medium );
	$less->addVariable( 'text-small', $text_small );

	// Paddings
	$less->addVariable( 'block-padding-large-desktop', $block_padding_large_desktop );
	$less->addVariable( 'block-padding-large-tablet', $block_padding_large_tablet );
	$less->addVariable( 'block-padding-large-mobile', $block_padding_large_mobile );
	$less->addVariable( 'block-padding-normal-desktop', $block_padding_normal_desktop );
	$less->addVariable( 'block-padding-normal-tablet', $block_padding_normal_tablet );
	$less->addVariable( 'block-padding-normal-mobile', $block_padding_normal_mobile );

	$less->addVariable( 'header-padding-large-desktop', $header_padding_large_desktop );
	$less->addVariable( 'header-padding-large-tablet', $header_padding_large_tablet );
	$less->addVariable( 'header-padding-large-mobile', $header_padding_large_mobile );
	$less->addVariable( 'header-padding-normal-desktop', $header_padding_normal_desktop );
	$less->addVariable( 'header-padding-normal-tablet', $header_padding_normal_tablet );
	$less->addVariable( 'header-padding-normal-mobile', $header_padding_normal_mobile );

	// Button hover colors
	$less->addVariable( 'button-primary-hover', $button_primary_hover );
	$less->addVariable( 'button-secondary-hover', $button_secondary_hover );
	$less->addVariable( 'button-tertiary-hover', $button_tertiary_hover );

	// Link hover colors
	$less->addVariable( 'default-link-hover', $default_link_hover );
	$less->addVariable( 'light-link-hover', $light_link_hover );

	// Responsive heading size
	$less->addVariable( 'responsive-heading-size-tablet-small', $responsive_heading_size_tablet_small );
	$less->addVariable( 'responsive-heading-size-tablet-medium', $responsive_heading_size_tablet_medium );
	$less->addVariable( 'responsive-heading-size-tablet-large', $responsive_heading_size_tablet_large );

	$less->addVariable( 'responsive-heading-size-mobile-small', $responsive_heading_size_mobile_small );
	$less->addVariable( 'responsive-heading-size-mobile-medium', $responsive_heading_size_mobile_medium );
	$less->addVariable( 'responsive-heading-size-mobile-large', $responsive_heading_size_mobile_large );

	// Footer
	$less->addVariable( 'footer-text-color', $footer_text_color );
}


function project_scripts() {
  if ( ! is_admin() ) {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/less/style.less' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js' );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js' );
    wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/vendor/select2.min.js' );
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/vendor/aos.js' );
		wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/vendor/headroom.min.js' );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js' );
  }
}
add_action( 'wp_enqueue_scripts', 'project_scripts' );

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   ?>
      <script type="text/javascript">

      jQuery(document).ready(function($){

         $('.quantity-inputs-wrapper').on( 'click', 'button.plus, button.minus', function() {
            var qty = $( this ).parent().find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));

            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }

            $('.qty').trigger('change');

         });

         $('.qty').on('change', function(){
           console.log("teste");
           $("[name='update_cart']").prop('disabled', false).trigger("click");
         });

         $('#coupon_code').on('keyup', function(e) {
           if (e.keyCode == 13) {
             $('[name="apply_coupon"]').trigger('click');
           }
         });

      });

      </script>
   <?php
}

function theme_name_scripts() {
wp_localize_script( 'main-js', 'MyAjax', array(
// URL to wp-admin/admin-ajax.php to process the request
'ajaxurl' => admin_url( 'admin-ajax.php' ),
// generate a nonce with a unique ID "myajax-post-comment-nonce"
// so that you can check it later when an AJAX request is sent
'security' => wp_create_nonce( 'my-special-string' )
));
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

// Catalog page filters
function blog_sidebar() {
  register_sidebar( array(
      'name'          => __( 'Blog sidebar', 'textdomain' ),
      'id'            => 'blog',
      'description'   => __( 'Widgets in this area will be shown on learn more page.', 'textdomain' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<p class="widgettitle m-b-30 font-18 type-medium">',
      'after_title'   => '</p>',
  ) );
}
add_action( 'widgets_init', 'blog_sidebar' );

// Equeue theme options font
function font_selector_styles() {
	$subsets = array();
	$font_element = array();

	if ( have_rows( 'fonts', 'options' ) ) {
		while (have_rows('fonts', 'options')) {
			the_row();

			$variants = get_sub_field( 'variants' );
			$subsets = array_merge( $subsets, get_sub_field( 'subsets' ) );
			$font_name = get_sub_field( 'name' );
			$font_name = str_replace( ' ', '+', $font_name );
			$font_element[] = $font_name . ':' . implode( ',', $variants );
		}

		$subsets = ( empty( $subsets ) ) ? array('latin') : array_unique( $subsets );
		$subset_string = implode( ',', $subsets );
		$font_string = implode( '|', $font_element );
		$request = '//fonts.googleapis.com/css?family=' . $font_string . '&subset=' . $subset_string;

		wp_enqueue_style( 'google-fonts', $request );
	} else {
		$request = 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600,700,900&subset=latin%2Clatin-ext&display=swap';

		wp_enqueue_style( 'google-fonts', $request );
	}
}

add_action( 'wp_enqueue_scripts', 'font_selector_styles' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

if ( !function_exists( 'theme_setup' ) ) {
  function theme_setup() {
    add_theme_support( 'title-tag' );
  }

  add_action( 'after_setup_theme', 'theme_setup' );
}

// Register menus
function register_menu() {
  register_nav_menu('menu-1',__( 'Primary' ));
	register_nav_menu('footer',__( 'Footer' ));
}
add_action( 'admin_init', 'register_menu' );

// Create menus
function create_menus() {
	$menu_name = ['menu-1', 'footer'];
	$menu_location = ['Primary', 'Footer'];

	for ($i=0; $i < sizeof( $menu_name ); $i++) {
		$menu_exists = wp_get_nav_menu_object( $menu_name[$i] );

		if( !$menu_exists ){
		  $menu_id = wp_create_nav_menu( $menu_name[$i] );

		  if( !has_nav_menu( $menu_location[$i] ) ){
		      $locations = get_theme_mod('nav_menu_locations');
		      $locations[$menu_location[$i]] = $menu_id;

					set_theme_mod( 'nav_menu_locations', $locations );
		  }
		}
	}
}

add_action( 'admin_init', 'create_menus' );


function remove_excerpt_brackets($content) {
	return str_replace('[&hellip;]', '...', $content);
}
add_filter('get_the_excerpt', 'remove_excerpt_brackets');

function get_excerpt( $limit, $source = null ){
  $excerpt = $source == null ? get_the_content() : get_the_excerpt( $source );
  $excerpt = preg_replace( " (\[.*?\])",'',$excerpt );
  $excerpt = strip_shortcodes( $excerpt );
  $excerpt = strip_tags( $excerpt );
  $excerpt = substr( $excerpt, 0, $limit );
  $excerpt = substr( $excerpt, 0, strripos($excerpt, " " ) );
  $excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
  $excerpt = $excerpt . '...';

  return $excerpt;
}
