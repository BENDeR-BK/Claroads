<?php
/**
 * Theme basic setup.
 *
 * @package claroads
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'ch_setup' );

if ( ! function_exists ( 'ch_setup' ) ) {

	function ch_setup() {

		load_theme_textdomain( 'claroads', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		register_nav_menus( array(
			'main_menu'   => esc_html__( 'Main menu', 'claroads' ),
			'footer_menu'   => esc_html__( 'Footer menu', 'claroads' ),
			// 'lang_menu'   => esc_html__( 'Lang menu', 'claroads' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-thumbnails' );
		add_image_size( 'progressive', 25, 25, true ); // Кадрирование изображения

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		add_theme_support( 'custom-background', apply_filters( 'sd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-logo' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'responsive-embeds' );
	}
}


add_filter( 'excerpt_more', 'ch_custom_excerpt_more' );

if ( ! function_exists( 'ch_custom_excerpt_more' ) ) {

	function ch_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}

}

// add_filter( 'wp_trim_excerpt', 'ch_all_excerpts_get_more_link' );

// if ( ! function_exists( 'ch_all_excerpts_get_more_link' ) ) {

// 	function ch_all_excerpts_get_more_link( $post_excerpt ) {
// 		if ( ! is_admin() ) {
// 			$post_excerpt = $post_excerpt . ' <a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
// 			'claroads' ) . '</a>';
// 		}
// 		return $post_excerpt;
// 	}

// }

// acf options page

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
	  'page_title'   => 'option',
	  'menu_title'  => 'options',
	  'menu_slug'   => 'theme-general-settings',
	  'capability'  => 'edit_posts',
	  'redirect'    => false
	));
  
}


if(function_exists('A2A_SHARE_SAVE_add_to_content')){
	remove_filter( 'the_content', 'A2A_SHARE_SAVE_add_to_content', 98 );
	remove_action( 'pre_get_posts', 'A2A_SHARE_SAVE_pre_get_posts' );
	add_action('nc_share_post', function() {
		echo do_shortcode('[addtoany]');
	});
	
}