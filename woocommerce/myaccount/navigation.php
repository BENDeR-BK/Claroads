<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

$icons = [
    'orders' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.1111 5H20V6.77778H11.1111V5ZM11.1111 8.55556H16.4444V10.3333H11.1111V8.55556ZM11.1111 13.8889H20V15.6667H11.1111V13.8889ZM11.1111 17.4444H16.4444V19.2222H11.1111V17.4444ZM4 5H9.33333V10.3333H4V5ZM5.77778 6.77778V8.55556H7.55556V6.77778H5.77778ZM4 13.8889H9.33333V19.2222H4V13.8889ZM5.77778 15.6667V17.4444H7.55556V15.6667H5.77778Z" fill="#3E3E3E"></path></svg>',
    'edit-account' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9577 14.3062V16.0456C9.57369 16.0456 8.24641 16.5954 7.2678 17.574C6.28919 18.5526 5.73941 19.8799 5.73941 21.2638H4C4 19.4186 4.73304 17.6489 6.03785 16.344C7.34266 15.0392 9.11237 14.3062 10.9577 14.3062ZM10.9577 13.4365C8.07458 13.4365 5.73941 11.1013 5.73941 8.21824C5.73941 5.33516 8.07458 3 10.9577 3C13.8407 3 16.1759 5.33516 16.1759 8.21824C16.1759 11.1013 13.8407 13.4365 10.9577 13.4365ZM10.9577 11.6971C12.8797 11.6971 14.4365 10.1403 14.4365 8.21824C14.4365 6.29619 12.8797 4.73941 10.9577 4.73941C9.0356 4.73941 7.47883 6.29619 7.47883 8.21824C7.47883 10.1403 9.0356 11.6971 10.9577 11.6971ZM13.2145 18.4912C13.1043 18.0272 13.1043 17.5437 13.2145 17.0797L12.3518 16.5813L13.2215 15.075L14.0843 15.5734C14.4305 15.2454 14.8491 15.0035 15.3062 14.8672V13.8713H17.0456V14.8672C17.5083 15.0046 17.9257 15.2498 18.2675 15.5734L19.1303 15.075L20 16.5813L19.1373 17.0797C19.2474 17.5435 19.2474 18.0266 19.1373 18.4904L20 18.9887L19.1303 20.495L18.2675 19.9967C17.9213 20.3247 17.5027 20.5666 17.0456 20.7029V21.6987H15.3062V20.7029C14.8491 20.5666 14.4305 20.3247 14.0843 19.9967L13.2215 20.495L12.3518 18.9887L13.2145 18.4912ZM16.1759 19.0896C16.5219 19.0896 16.8537 18.9521 17.0984 18.7075C17.343 18.4628 17.4805 18.131 17.4805 17.785C17.4805 17.439 17.343 17.1072 17.0984 16.8626C16.8537 16.6179 16.5219 16.4805 16.1759 16.4805C15.8299 16.4805 15.4981 16.6179 15.2534 16.8626C15.0088 17.1072 14.8713 17.439 14.8713 17.785C14.8713 18.131 15.0088 18.4628 15.2534 18.7075C15.4981 18.9521 15.8299 19.0896 16.1759 19.0896Z" fill="#3E3E3E"></path></svg>',
    'customer-logout' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.52632 17.4737H8.21053V19.1579H18.3158V5.68421H8.21053V7.36842H6.52632V4.84211C6.52632 4.61877 6.61504 4.40457 6.77296 4.24665C6.93089 4.08872 7.14508 4 7.36842 4H19.1579C19.3812 4 19.5954 4.08872 19.7534 4.24665C19.9113 4.40457 20 4.61877 20 4.84211V20C20 20.2233 19.9113 20.4375 19.7534 20.5955C19.5954 20.7534 19.3812 20.8421 19.1579 20.8421H7.36842C7.14508 20.8421 6.93089 20.7534 6.77296 20.5955C6.61504 20.4375 6.52632 20.2233 6.52632 20V17.4737ZM8.21053 11.5789H14.1053V13.2632H8.21053V15.7895L4 12.4211L8.21053 9.05263V11.5789Z" fill="#3E3E3E"></path></svg>',
];
?>
<div class="mainwrapper _mainwrapper_personalinfo acc">
    <div class="container-ca">
        <div class="breadcrumbsect">
            <span>
                <a href="<?php echo get_home_url();?>"><?php echo  get_the_title(get_option('page_on_front'));?> </a>
            </span> / 
            <?php
                if(function_exists('bcn_display')) {
                    bcn_display();
                }
            ?>
        </div>

        <section class="acc-content">
            <div class="row">
                <div class="acc__leftsect">
                    <div class="acc__menu">
                        <nav class="_woocommerce-MyAccount-navigation ">
                            <ul>
                                <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                    <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                        <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"> <?php echo $icons[$endpoint] ?><?php echo esc_html( $label ); ?></a>
                                    </li>
                                <?php endforeach; ?>
                             
                            </ul>
                        </nav>
                    </div>
                </div>


<?php do_action( 'woocommerce_after_account_navigation' ); ?>
