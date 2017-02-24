<?php
/**
 * Display Header Text Option Without Custom Headers Theme Customizer
 *
 * @package Display_Header_Text_Option_Without_Custom_Headers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function display_header_text_option_without_custom_headers_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*
	 * Theme has no room for Header Image. No need to customize header text color either.
	 */
	$wp_customize->remove_control( 'header_image' );
	$wp_customize->remove_control( 'header_textcolor' );
}
add_action( 'customize_register', 'display_header_text_option_without_custom_headers_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function display_header_text_option_without_custom_headers_customize_preview_js() {
	wp_enqueue_script( 'display_header_text_option_without_custom_headers_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'display_header_text_option_without_custom_headers_customize_preview_js' );
