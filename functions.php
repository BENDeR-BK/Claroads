<?php
/**
 * claroads functions and definitions
 *
 * @package claroads
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Define constant
 */
$theme = wp_get_theme();

if ( ! empty( $theme['Template'] ) ) {
	$theme = wp_get_theme( $theme['Template'] );
}

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

define( 'SD_THEME_NAME', $theme['Name'] );
define( 'SD_THEME_SLUG', $theme['Template'] );
define( 'SD_THEME_VERSION', $theme['Version'] );
define( 'SD_THEME_DIR', get_template_directory() );
define( 'SD_THEME_URI', get_template_directory_uri() );
define( 'SD_THEME_IMAGE_URI', get_template_directory_uri() . '/assets/img' );
define( 'SD_INC_DIR', wp_normalize_path( SD_THEME_DIR . DS . 'inc') );

$smoky_dance_includes = array(
	// Base Theme
	'/theme-settings.php',                  // Initialize theme default settings.
	'/theme-ajax.php',                  // ajax
	'/theme-setup.php',                           // Theme setup and custom theme supports.
	'/theme-widgets.php',                         // Register widget area.
	'/theme-enqueue.php',                         // Enqueue scripts and styles.
	'/theme-optimize.php',
	'/template-tags.php',                   // Custom template tags for this theme.
	'/theme-pagination.php',                      // Custom pagination for this theme.
	'/theme-hooks.php',                           // Custom hooks.
	'/theme-woo.php',                           // Custom woocommerce functions.
	'/theme-extras.php',                          // Custom functions that act independently of the theme templates.
	'/tgm/khl-register-plugins.php',        // Register Plugins.
	'/classes/class-nav-walker.php',
	'/classes/class-seo-walker.php',
);

foreach ( $smoky_dance_includes as $file ) {
	// Retrieve the name of the highest priority template file that exists, optionally loading that file.
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}



remove_action('load-update-core.php','wp_update_themes'); 
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;")); 
wp_clear_scheduled_hook('wp_update_themes');




/**
 * Add the code below to your theme's functions.php file
 * to add a confirm password field on the register form under My Accounts.
 */ 
function woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);




// видаляємо поля чекаута
add_filter( 'woocommerce_checkout_fields' , 'customize_checkout_fields' );
function customize_checkout_fields( $fields ) {
	// unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	// unset($fields['billing']['billing_email']);
	unset($fields['account']['account_username']);
	unset($fields['account']['account_password']);
	return $fields;
}

	


add_action('wp_footer', 'checkout_billing_email_js_ajax' );
function checkout_billing_email_js_ajax() {
    // Only on Checkout
    // if( is_checkout() && ! is_wc_endpoint_url() ) :
    ?>
    <script type="text/javascript">
    jQuery(function($){
        // if (typeof wc_checkout_params === 'undefined') 
        //     return false;

        $(document.body).on("click", "#ajax_btn " ,function(evt) {
			console.log($('form.checkout').serializeArray());
			console.log($('form.checkout2').serializeArray());
			console.log($('form.customorder').serializeArray());

            var totalVisitors = $('.rangesl'),
                trafficTypeVal = $('input[name="trafftype"]:checked').val()


            evt.preventDefault();
            

            $.ajax({
                type:    'POST',
                url: $nm_js.ajaxurl,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                enctype: 'multipart/form-data',
                data: {
                    'action': 'ajax_order',
                    'fields': $('form.checkout').serializeArray(),
                    'user_id': <?php echo get_current_user_id(); ?>,
                    'rangesl': totalVisitors.val(),
                    'trafficTypeVal': trafficTypeVal
                },
                success: function (result) {
                    var res = JSON.parse(result)
                    console.log(res); // For testing (to be removed)
                },
                error:   function(error) {
                    console.log(error); // For testing (to be removed)
                }
            });
        });
    });
    </script>
    <?php
    // endif;
}






add_action('wp_ajax_ajax_order', 'submited_ajax_order_data');
add_action( 'wp_ajax_nopriv_ajax_order', 'submited_ajax_order_data' );
function submited_ajax_order_data() {
    if( isset($_POST['fields']) && ! empty($_POST['fields']) ) {

        $rangesl = $_POST['rangesl'];
        $trafficTypeVal = $_POST['trafficTypeVal'];
        if ($trafficTypeVal == '0.05') {
            $resCalc = number_format( 0.05 * $rangesl / 1000, 2);
        }
        elseif($trafficTypeVal == '0.25' ){
            $resCalc = number_format( 0.25 * $rangesl / 1000, 2);
        }
        else {
            return ;
        }

       

        $order    = new WC_Order();
        $cart     = WC()->cart;
        $checkout = WC()->checkout;
        $data     = [];

        

        // Loop through posted data array transmitted via jQuery
        foreach( $_POST['fields'] as $values ){
            // Set each key / value pairs in an array
			$data[$values['name']] = $values['value'];
			// echo 'values=>'.$values['value'].'.' ;
        }

        $cart_hash          = md5( json_encode( wc_clean( $cart->get_cart_for_session() ) ) . $cart->total );
        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();

        // Loop through the data array
        foreach ( $data as $key => $value ) {
            // Use WC_Order setter methods if they exist
            if ( is_callable( array( $order, "set_{$key}" ) ) ) {
                $order->{"set_{$key}"}( $value );

            // Store custom fields prefixed with wither shipping_ or billing_
            } elseif ( ( 0 === stripos( $key, 'billing_' ) || 0 === stripos( $key, 'shipping_' ) )
                && ! in_array( $key, array( 'shipping_method', 'shipping_total', 'shipping_tax' ) ) ) {
                $order->update_meta_data( '_' . $key, $value );
            }
        }

        $order->set_created_via( 'checkout' );
        $order->set_cart_hash( $cart_hash );
        $order->set_customer_id( apply_filters( 'woocommerce_checkout_customer_id', isset($_POST['user_id']) ? $_POST['user_id'] : '' ) );
        $order->set_currency( get_woocommerce_currency() );
        $order->set_prices_include_tax( 'yes' === get_option( 'woocommerce_prices_include_tax' ) );
        $order->set_customer_ip_address( WC_Geolocation::get_ip_address() );
        $order->set_customer_user_agent( wc_get_user_agent() );
        $order->set_customer_note( isset( $data['order_comments'] ) ? $data['order_comments'] : '' );
        $order->set_payment_method( isset( $available_gateways[ $data['payment_method'] ] ) ? $available_gateways[ $data['payment_method'] ]  : $data['payment_method'] );
        $order->set_shipping_total( $cart->get_shipping_total() );
        $order->set_discount_total( $cart->get_discount_total() );
        $order->set_discount_tax( $cart->get_discount_tax() );
        $order->set_cart_tax( $cart->get_cart_contents_tax() + $cart->get_fee_tax() );
        $order->set_shipping_tax( $cart->get_shipping_tax() );
        $order->set_total(  $resCalc );

        $checkout->create_order_line_items( $order, $cart );
        $checkout->create_order_fee_lines( $order, $cart );
        $checkout->create_order_shipping_lines( $order, WC()->session->get( 'chosen_shipping_methods' ), WC()->shipping->get_packages() );
        $checkout->create_order_tax_lines( $order, $cart );
        $checkout->create_order_coupon_lines( $order, $cart );

        /**
         * Action hook to adjust order before save.
         * @since 3.0.0
         */
        do_action( 'woocommerce_checkout_create_order', $order, $data );

        // Save the order.
        $order_id = $order->save();

        do_action( 'woocommerce_checkout_update_order_meta', $order_id, $data );

        // echo 'New order created with order ID: #'.$order_id.'.' ;
        echo $order ;
    }
    die();
}



// add_filter('woocommerce_add_error', 'change_email_error');
// function change_email_error( $message ) {
//     if ($message == 'Enter a username or email address.' ) {
//         $message = 'Enter a username';
//     }
//     if ($message == 'Invalid username or email.' ) {
//         $message = 'Invalid username';
//     }
//     return $message;
// }



// add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
// function woo_custom_redirect_after_purchase() {
// 	global $wp;
// 	if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) {
// 		wp_redirect( 'http://localhost:8888/woocommerce/custom-thank-you/' );
// 		exit;
// 	}
// }




// add_action('wp_footer', 'checkout_billing_email_js_ajax_c' );
function checkout_billing_email_js_ajax_c() {
    // Only on Checkout
    if( is_checkout() && ! is_wc_endpoint_url() ) :
    ?>
    <script type="text/javascript">
    jQuery(function($){
        if (typeof wc_checkout_params === 'undefined') 
            return false;

        $(document.body).on("click", "#ajax-order-btn" ,function(evt) {

            var totalVisitors = $('.rangesl'),
                trafficTypeVal = $('input[name="trafftype"]:checked').val()
            evt.preventDefault();

            $.ajax({
                type:    'POST',
                url: wc_checkout_params.ajax_url,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                enctype: 'multipart/form-data',
                data: {
                    'action': 'ajax_order',
                    'fields': $('form.checkout').serializeArray(),
                    'rangesl': totalVisitors.val(),
                    'trafficTypeVal': trafficTypeVal,

                    'user_id': <?php echo get_current_user_id(); ?>,
                },
                success: function (result) {
                    console.log(result); // For testing (to be removed)
                },
                error:   function(error) {
                    console.log(error); // For testing (to be removed)
                }
            });
        });
    });
    </script>
    <?php
    endif;
}

// add_action('wp_ajax_ajax_order_c', 'submited_ajax_order_data_c');
// add_action( 'wp_ajax_nopriv_ajax_order_c', 'submited_ajax_order_data_c' );
function submited_ajax_order_data_c() {
    if( isset($_POST['fields']) && ! empty($_POST['fields']) ) {

        
        $rangesl = $_POST['rangesl'];
        $trafficTypeVal = $_POST['trafficTypeVal'];
        if ($trafficTypeVal == '0.05') {
            $resCalc = number_format( 0.05 * $rangesl / 1000, 2);
        }
        elseif($trafficTypeVal == '0.25' ){
            $resCalc = number_format( 0.25 * $rangesl / 1000, 2);
        }
        else {
            return ;
        }

        $order    = new WC_Order();
        $cart     = WC()->cart;
        $checkout = WC()->checkout;
        $data     = [];

        // Loop through posted data array transmitted via jQuery
        foreach( $_POST['fields'] as $values ){
            // Set each key / value pairs in an array
            $data[$values['name']] = $values['value'];
        }

        $cart_hash          = md5( json_encode( wc_clean( $cart->get_cart_for_session() ) ) . $cart->total );
        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();

        // Loop through the data array
        foreach ( $data as $key => $value ) {
            // Use WC_Order setter methods if they exist
            if ( is_callable( array( $order, "set_{$key}" ) ) ) {
                $order->{"set_{$key}"}( $value );

            // Store custom fields prefixed with wither shipping_ or billing_
            } elseif ( ( 0 === stripos( $key, 'billing_' ) || 0 === stripos( $key, 'shipping_' ) )
                && ! in_array( $key, array( 'shipping_method', 'shipping_total', 'shipping_tax' ) ) ) {
                $order->update_meta_data( '_' . $key, $value );
            }
        }

        $order->set_created_via( 'checkout' );
        $order->set_cart_hash( $cart_hash );
        $order->set_customer_id( apply_filters( 'woocommerce_checkout_customer_id', isset($_POST['user_id']) ? $_POST['user_id'] : '' ) );
        $order->set_currency( get_woocommerce_currency() );
        $order->set_prices_include_tax( 'yes' === get_option( 'woocommerce_prices_include_tax' ) );
        $order->set_customer_ip_address( WC_Geolocation::get_ip_address() );
        $order->set_customer_user_agent( wc_get_user_agent() );
        $order->set_customer_note( isset( $data['order_comments'] ) ? $data['order_comments'] : '' );
        $order->set_payment_method( isset( $available_gateways[ $data['payment_method'] ] ) ? $available_gateways[ $data['payment_method'] ]  : $data['payment_method'] );
        $order->set_shipping_total( $cart->get_shipping_total() );
        $order->set_discount_total( $cart->get_discount_total() );
        $order->set_discount_tax( $cart->get_discount_tax() );
        $order->set_cart_tax( $cart->get_cart_contents_tax() + $cart->get_fee_tax() );
        $order->set_shipping_tax( $cart->get_shipping_tax() );
        // $order->set_total( $resCalc );
        $order->set_total( $cart->get_total($resCalc) );

        $checkout->create_order_line_items( $order, $cart );
        $checkout->create_order_fee_lines( $order, $cart );
        $checkout->create_order_shipping_lines( $order, WC()->session->get( 'chosen_shipping_methods' ), WC()->shipping->get_packages() );
        $checkout->create_order_tax_lines( $order, $cart );
        $checkout->create_order_coupon_lines( $order, $cart );

        /**
         * Action hook to adjust order before save.
         * @since 3.0.0
         */
        do_action( 'woocommerce_checkout_create_order', $order, $data );

        // Save the order.
        $order_id = $order->save();

        do_action( 'woocommerce_checkout_update_order_meta', $order_id, $data );

        echo 'New order created with order ID: #'.$order_id.'.' ;

        WC()->cart->total *= 0.25;
        var_dump( WC()->cart->total);
    }
    die();
}




