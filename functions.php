<?php
/**
 * Display Header Text Option Without Custom Headers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Display_Header_Text_Option_Without_Custom_Headers
 */

if ( ! function_exists( 'display_header_text_option_without_custom_headers_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function display_header_text_option_without_custom_headers_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enabling WordPress core custom header support solely for "Display Site Title and Tagline" option.
	 * See inc/customizer.php for removal of the "Header Image" Customizer panel.
	 */
	add_theme_support( 'custom-header', array(
		'wp-head-callback' => 'display_header_text_option_without_custom_headers_style',
	) );
}
endif;
add_action( 'after_setup_theme', 'display_header_text_option_without_custom_headers_setup' );

/**
 * Styles the header text displayed on the blog.
 */
function display_header_text_option_without_custom_headers_style() {
	/*
	 * If header text is set to display, let's bail.
	 */
	if ( display_header_text() ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	</style>
	<?php
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
