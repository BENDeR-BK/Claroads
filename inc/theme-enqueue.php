<?php
/**
 * claroads enqueue scripts
 *
 * @package claroads
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'claroads_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function claroads_scripts() {

		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		// Styles
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/main.min.css' );

		wp_enqueue_style( 'sd-styles', get_template_directory_uri() . '/assets/css/main.min.css', array(), $css_version );
		wp_enqueue_style( 'sd-aos-style', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), $css_version );
		wp_enqueue_style( 'sd-rangeslider', get_template_directory_uri() . '/assets/css/rangeslider.css', array(), $css_version );
		wp_enqueue_style( 'sd-common', get_template_directory_uri() . '/assets/css/common.css', array(), $css_version );
		wp_enqueue_style( 'sd-select', get_template_directory_uri() . '/assets/css/select2.min.css', array(), $css_version );
		wp_enqueue_style( 'sd-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $css_version );



		
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/custom.min.js' );

		wp_enqueue_script( 'sd-aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), $js_version, true );

		wp_enqueue_script( 'nm-libs', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), $js_version, true );

		wp_enqueue_script( 'nm-mix', 'https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.js', array('jquery'), $js_version, true );
		

		wp_enqueue_script( 'nm-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array('nm-libs'), $js_version, true );
		wp_enqueue_script( 'nm-select', get_template_directory_uri() . '/assets/js/select2.min.js', array('nm-libs'), $js_version, true );
		wp_enqueue_script( 'nm-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('nm-libs'), $js_version, true );
		wp_enqueue_script( 'nm-rangeslider', get_template_directory_uri() . '/assets/js/rangeslider.js', array('nm-libs'), $js_version, true );
		wp_enqueue_script( 'nm-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('nm-libs'), $js_version, true );

		wp_enqueue_script( 'nm-bs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('nm-libs'), $js_version, true );
		wp_enqueue_script( 'nm-common', get_template_directory_uri() . '/assets/js/common.js', array('nm-libs'), $js_version, true );

		
		wp_localize_script( 'nm-custom', '$nm_js', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'claroads_scripts' );