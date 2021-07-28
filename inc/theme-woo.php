<?php

// Код в functions.php
add_action( 'woocommerce_created_customer', 'truemisha_save_fields', 25 );
function truemisha_save_fields( $user_id ) {
	

	if (isset($_POST['billing_first_name'])) {
		update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta($user_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	}
	if (isset($_POST['billing_Last_name'])) {
		update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['billing_Last_name']));
		update_user_meta($user_id, 'billing_Last_name', sanitize_text_field($_POST['billing_Last_name']));
	}
	if (isset($_POST['billing_phone'])) {
		update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
	}
	if (isset($_POST['billing_skype'])) {
		update_user_meta($user_id, 'billing_skype', sanitize_text_field($_POST['billing_skype']));
	}
	if (isset($_POST['billing_company'])) {
		update_user_meta($user_id, 'billing_company', sanitize_text_field($_POST['billing_company']));
	}
	if (isset($_POST['billing_vat'])) {
		update_user_meta($user_id, 'billing_vat', sanitize_text_field($_POST['billing_vat']));
	}
	if (isset($_POST['billing_country'])) {
		update_user_meta($user_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
	}
	if (isset($_POST['billing_address'])) {
		update_user_meta($user_id, 'billing_address', sanitize_text_field($_POST['billing_address']));
	}
	if (isset($_POST['billing_city'])) {
		update_user_meta($user_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
	}
	if (isset($_POST['billing_state'])) {
		update_user_meta($user_id, 'billing_state', sanitize_text_field($_POST['billing_state']));
	}
	if (isset($_POST['billing_zip'])) {
		update_user_meta($user_id, 'billing_zip', sanitize_text_field($_POST['billing_zip']));
	}
}

// Видаляємо пункти меню
add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links' );
function remove_my_account_links( $menu_links ){
	//unset( $menu_links['edit-address'] ); // Addresses
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	//unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	unset( $menu_links['orders'] ); // Remove Orders
	//unset( $menu_links['downloads'] ); // Disable Downloads
	unset( $menu_links['edit-account'] ); // Remove Account details tab
	unset( $menu_links['customer-logout'] ); // Remove Logout link
	return $menu_links;
 
}

// змінити порядок і назву сторінок
function my_account_menu_order() {
	$menuOrder = array(
	  'edit-account'       => __( 'Personal Info', 'woocommerce' ),
	  'orders'             => __( 'Orders', 'woocommerce' ),
	  'customer-logout'    => __( 'Log out', 'woocommerce' ),
	);
	return $menuOrder;
  }
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


// change error message (Forgot Password) 
function woocommerce_output_all_notices_cl() {
	echo '<p class="signform__errortext">';
	wc_print_notices();
	echo '</p>';
}
///////////////////////


add_action('wp_ajax_ajax_load', 'submited_ajax_load_data');
add_action( 'wp_ajax_nopriv_ajax_load', 'submited_ajax_load_data' );

function submited_ajax_load_data(){
    $loadData = array(
        'rangesl' => '10000',
        'trtype1' => '0.05',
        'trtype2' => '0.25',
        'totalVisitorsPrice' => number_format( 0.05 * 10000 / 1000, 2 ) ,
    );
    
    echo json_encode($loadData);

    die();
} 

add_action('wp_ajax_ajax_calc', 'submited_ajax_calc_data');
add_action( 'wp_ajax_nopriv_ajax_calc', 'submited_ajax_calc_data' );

function submited_ajax_calc_data(){
    if( isset($_POST['rangesl']) && ! empty($_POST['rangesl']) ) {

		$calcData = array(
			'rangesl' => $rangesl = $_POST['rangesl'],
			'trafficTypeVal' => $trafficTypeVal = $_POST['trafficTypeVal'],
	
			'resCalc' => $resCalc = number_format($trafficTypeVal * $rangesl / 1000, 2)
		);
       
        echo json_encode($calcData);
    }
   
    die();
} 



add_action( 'woocommerce_checkout_create_order', 'change_total_on_checking', 20, 1 );
function change_total_on_checking( $order ) {
    // Get order total
    // $rangesl = $_POST['rangesl'];
    // $trafficTypeVal = $_POST['billing_wooccm14'];

    // if ($trafficTypeVal == 'Non-unique visitors') {
    //     $resCalc = number_format( 0.05 * $rangesl / 1000, 2);
    // }
    // elseif($trafficTypeVal == 'Unique visitors' ){
    //     $resCalc = number_format( 0.25 * $rangesl / 1000, 2);
    // }
    // else {
    //     return ;
    // }

    $rangesl = $_POST['shipping_total'];

    $total = $order->get_total();

    // Set the new calculated total
    $order->set_total( $rangesl );
}







/**
 * Automatically add product to cart on visit
 */
add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart() {
	if ( ! is_admin() ) {
		$product_id = 25; //replace with your own product id
		$found = false;
		//check if product already in cart
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->get_id() == $product_id )
					$found = true;
			}
			// if product not found, add it
			if ( ! $found )
				WC()->cart->add_to_cart( $product_id );
		} else {
			// if no products in cart, add it
			WC()->cart->add_to_cart( $product_id );
		}
	}
}


add_filter( 'woocommerce_account_orders_columns', 'change_account_order_sorting' );
function change_account_order_sorting( $columns ) {

	$columns = [
		'order-number'  => __( 'Order number', 'woocommerce' ),
		'order-status'  => __( 'Status', 'woocommerce' ),
		'order-date'    => __( 'Date', 'woocommerce' ),
		'order-actions' => __( 'TRAFFIC TYPE', 'woocommerce' ),
		'order-total'   => __( 'Price', 'woocommerce' ),

	];

	return $columns;

}
// add_filter( 'woocommerce_my_account_my_orders_query', 'my_account_orders_query_change_sorting' );
// function my_account_orders_query_change_sorting( $args ) {
//     $args['order'] = 'ASC'; // Default is 'DESC'

//     return $args;
// }

