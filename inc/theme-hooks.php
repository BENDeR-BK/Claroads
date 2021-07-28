<?php
/**
 * Custom hooks.
 *
 * @package claroads
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



function address_mobile_address_bar() {
	$color = "#1bd0e0";
	//this is for Chrome, Firefox OS, Opera and Vivaldi
	echo '<meta name="theme-color" content="'.$color.'">';
	//Windows Phone **
	echo '<meta name="msapplication-navbutton-color" content="'.$color.'">';
	// iOS Safari
	echo '<meta name="apple-mobile-web-app-capable" content="yes">';
	echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
}
add_action( 'wp_head', 'address_mobile_address_bar' );