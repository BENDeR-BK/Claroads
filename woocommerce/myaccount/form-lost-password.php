<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

// do_action( 'woocommerce_before_lost_password_form' );
?>
<main>
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
            <div class="logsection">
                <div class="formlog">
                    <form method="post" class="woocommerce-ResetPassword lost_reset_password signform">
                        <div class="resetpass-sect">
                            <p class="title"><?php _e('Reset Password', 'claroads') ?></p>
                            <p class="subtitle"><?php _e('We will send the password reset code by mail', 'claroads') ?></p>
                           

                            <p class="woocommerce-form-row woocommerce-form-row--first  inpfield inpfield__textinp">
                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
                                <label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
                            </p>


                            <?php do_action( 'woocommerce_lostpassword_form' ); ?> 

                         

                            <?php woocommerce_output_all_notices_cl() ?>
                                
                         

                            <p class="woocommerce-form-row form-row">
                                <input type="hidden" name="wc_reset_password" value="true" />
                                <button type="submit" class="woocommerce-Button adsbtn adsbtn__blue" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Send', 'woocommerce' ); ?><span></span></button>
                            </p>
                            <div class="signform__bottsect">
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e('Return to login', 'claroads') ?></a>
                            </div>

                            <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
                        </div>
                    </form>
                    <!-- <form action="" class="signform">
                        <div class="resetpass-sect">
                           
                            <p class="signform__errortext">Something is wrong. Please check password and email address</p>
                          
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</main>

<?php
do_action( 'woocommerce_after_lost_password_form' );
