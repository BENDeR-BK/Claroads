<?php /*Template Name: registration*/

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
get_header();?>

    <div class="mainwrapper signuppage">
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
            <circle class="circ1" cx="1195.79" cy="766.918" r="5.01331" fill="white" />
        </svg>
        <svg class="errcentpic errpic3" width="1713" height="1697" viewBox="0 0 1713 1697" fill="none"
            xmlns="http://www.w3.org/2000/svg">
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
        <div class="container-ca">
            <div class="formsign ">
                
                
                <form method="post" class="woocommerce-form woocommerce-form-register register signform" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                    <div class="signupform__header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="title"><?php _e('Account Sign Up', 'claroads') ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p class="infotext"><?php _e('Already have an account?', 'claroads') ?> <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e('Login', 'claroads') ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="signupform__body">
                        <?php do_action( 'woocommerce_register_form_start' ); ?>
                        <div class="datailssect">
                            <p class="datails__title"><?php _e('Account Details', 'claroads') ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <input type="email" placeholder="Your Email Address" class="" name="email" id="reg_email"  value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                                        <label for="reg_email"><?php esc_html_e( 'Email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" class="" placeholder="Username" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>                                   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <input type="password" placeholder="Your Password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                                        <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <span class="eye">
                                            <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <label for="reg_password2"><?php _e( 'Confirm', 'woocommerce' ); ?> <span class="required">*</span></label>
                                        <input type="password"  placeholder="Confirm Your Password" class="" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
                                        <span class="eye">
                                            <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_first_name = ! empty( $_POST[ 'billing_first_name' ] ) ? $_POST[ 'billing_first_name' ] : ''; ?>
                                        <label for="billing_first_name"><?php esc_html_e( 'First Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Your First name" class="input-text" name="billing_first_name" id="billing_first_name" value="<?php  $billing_first_name  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_Last_name = ! empty( $_POST[ 'billing_Last_name' ] ) ? $_POST[ 'billing_Last_name' ] : ''; ?>
                                        <label for="billing_Last_name"><?php esc_html_e( 'Last Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Your Last name" class="input-text" name="billing_Last_name" id="billing_Last_name" value="<?php  $billing_Last_name  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_phone = ! empty( $_POST[ 'billing_phone' ] ) ? $_POST[ 'billing_phone' ] : ''; ?>
                                        <label for="billing_phone"><?php esc_html_e( 'Phone', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="tel" placeholder="Your Phone" class="nummask" name="billing_phone" id="billing_phone" value="<?php  $billing_phone  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_skype = ! empty( $_POST[ 'billing_skype' ] ) ? $_POST[ 'billing_skype' ] : ''; ?>
                                        <label for="billing_skype"><?php esc_html_e( 'Skype Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Your Skype Name" name="billing_skype" id="billing_skype" value="<?php  $billing_skype  ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="datailssect">
                            <p class="datails__title"><?php _e('User Details', 'claroads') ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_company = ! empty( $_POST[ 'billing_company' ] ) ? $_POST[ 'billing_company' ] : ''; ?>
                                        <label for="billing_company"><?php esc_html_e( 'Company', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Company Name" class="input-text" name="billing_company" id="billing_company" value="<?php  $billing_company  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_vat = ! empty( $_POST[ 'billing_vat' ] ) ? $_POST[ 'billing_vat' ] : ''; ?>
                                        <label for="billing_vat"><?php esc_html_e( 'VAT', 'woocommerce' ); ?>&nbsp;</label>
                                        <input type="text" placeholder="Company VAT Number"  name="billing_vat" id="billing_vat" value="<?php  $billing_vat  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_country = ! empty( $_POST[ 'billing_country' ] ) ? $_POST[ 'billing_country' ] : ''; ?>
                                        <label for="billing_country"><?php esc_html_e( 'Country', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Your Country"  name="billing_country" id="billing_country" value="<?php  $billing_country  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_address = ! empty( $_POST[ 'billing_address' ] ) ? $_POST[ 'billing_address' ] : ''; ?>
                                        <label for="billing_address"><?php esc_html_e( 'Address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Street Address"  name="billing_address" id="billing_address" value="<?php  $billing_address  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_city = ! empty( $_POST[ 'billing_city' ] ) ? $_POST[ 'billing_city' ] : ''; ?>
                                        <label for="billing_city"><?php esc_html_e( 'City', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                        <input type="text" placeholder="Your City"  name="billing_city" id="billing_city" value="<?php  $billing_city  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_state = ! empty( $_POST[ 'billing_state' ] ) ? $_POST[ 'billing_state' ] : ''; ?>
                                        <label for="billing_state"><?php esc_html_e( 'State/Province', 'woocommerce' ); ?></label>
                                        <input type="text" placeholder="Your State/Province"  name="billing_state" id="billing_state" value="<?php  $billing_state  ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="inpfield inpfield__textinp">
                                        <?php  $billing_zip = ! empty( $_POST[ 'billing_zip' ] ) ? $_POST[ 'billing_zip' ] : ''; ?>
                                        <label for="billing_zip"><?php esc_html_e( 'ZIP', 'woocommerce' ); ?></label>
                                        <input type="text" placeholder="ZIP"  name="billing_zip" id="billing_zip" value="<?php  $billing_zip  ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>  
                        
                        


                        <!-- <?php do_action( 'woocommerce_register_form' ); ?> -->
                        
                        <div class="order-bottsect">
                            <div class="checkfield">
                                <input type="checkbox" id="acceptcheck">
                                <label for="acceptcheck"><?php _e('I have read and agree with the terms and conditions.', 'claroads') ?></label>
                            </div>
                            <p class="woocommerce-form-row form-row">
                                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit adsbtn adsbtn__blue" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Sign Up', 'woocommerce' ); ?><span></span></button>
                            </p>
                        </div>
                    </div>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>
                
            </div>
        </div>
    </div>

<?php wp_footer(); ?>
