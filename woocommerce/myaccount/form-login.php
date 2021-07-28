<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="mainwrapper signpage">
     <!-- animation svg -->
     <svg class="errpic2 errcentpic" width="1235" height="1182" viewBox="0 0 1235 1182" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.1"
            d="M1216.12 590.624C1216.12 916.263 951.852 1180.25 625.857 1180.25C299.862 1180.25 35.5928 916.263 35.5928 590.624C35.5928 264.984 299.862 1 625.857 1C951.852 1 1216.12 264.984 1216.12 590.624Z"
            stroke="white" stroke-width="2" />
        <circle class="circ3" opacity="0.2" cx="35.873" cy="631.622" r="35.873" fill="#4EEAFF" />
        <circle class="circ2" opacity="0.4" cx="35.8733" cy="631.621" r="22.4206" fill="#4EEAFF" />
        <circle class="circ1" cx="35.8732" cy="631.621" r="6.72619" fill="#4EEAFF" />
        <circle class="circ3" opacity="0.15" cx="1195.79" cy="766.918" r="38.4354" fill="white" />
        <circle class="circ2" opacity="0.4" cx="1195.79" cy="766.918" r="17.9365" fill="white" />
        <circle class="circ1"cx="1195.79" cy="766.918" r="5.01331" fill="white" />
    </svg>
    <svg class="errcentpic errpic3" width="1713" height="1697" viewBox="0 0 1713 1697" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.1"
            d="M1712 848.141C1712 1316 1333.01 1695.28 865.5 1695.28C397.992 1695.28 19 1316 19 848.141C19 380.277 397.992 1 865.5 1C1333.01 1 1712 380.277 1712 848.141Z"
            stroke="white" stroke-width="2" />
        <circle class="circ3" opacity="0.1" cx="126.9" cy="1261.96" r="47.4036" fill="white" />
        <circle class="circ2" opacity="0.15" cx="126.9" cy="1261.96" r="29.6273" fill="white" />
        <circle class="circ1" cx="126.9" cy="1261.96" r="6.18308" fill="white" />
        <circle class="circ3" opacity="0.2" cx="56.9728" cy="624.973" r="56.9728" fill="#4EEAFF" />
        <circle class="circ2" opacity="0.5" cx="56.9727" cy="624.973" r="35.608" fill="#4EEAFF" />
        <circle class="circ1" cx="56.9727" cy="624.973" r="7.43123" fill="#4FEAFF" />
    </svg>
    <!-- animation svg END-->

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-12">

    <?php endif; ?>

        <div class="container-ca">
            <div class="logsection">
                <div class="formlog">
               
                    <form class="woocommerce-form woocommerce-form-login login signform" method="post">
                        <div class="login-sect">
                            <?php do_action( 'woocommerce_login_form_start' ); ?>
                            <p class="title"><?php _e('Login to continue', 'claroads') ?></p>
                            
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row-wide inpfield inpfield__textinp">
                                <label for="username"><?php esc_html_e( 'Email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                <input type="text" placeholder="Your Email Address" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide  form-row-wide inpfield inpfield__textinp">
                                <input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Your Password" type="password" name="password" id="password" autocomplete="current-password" />
                                <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                <span class="eye">
                                    <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
                                </span>
                            </p>
                         
                            <?php woocommerce_output_all_notices_cl() ?>
                            <?php do_action( 'woocommerce_login_form' ); ?>

                            
                            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <button type="submit" class="woocommerce-button  woocommerce-form-login__submit adsbtn adsbtn__blue" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?><span></span></button>
                            <div class="signform__bottsect">
                                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot Password?', 'woocommerce' ); ?></a>
                                <p><?php esc_html_e( "Don't have an account yet? ", 'woocommerce' ); ?><a href="<?php echo get_permalink( get_page_by_path( 'registration' ) ); ?>"><?php esc_html_e( 'Registration Now', 'woocommerce' ); ?></a></p>
                            </div>
                            <?php do_action( 'woocommerce_login_form_end' ); ?>
                        </div>
                    </form>
                </div>
            </div >
        </div>
    <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	

</div>

</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php
    if(!is_user_logged_in() && is_page('my-account')){
        echo '<style>.footer {display: none} </style>';
    }
?>