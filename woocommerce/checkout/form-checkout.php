<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
// if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
// 	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
// 	return;
// }

?>
<div class="mainwrapper orderpage">
    
    <div class="container-ca">
        <div class="breadcrumbsect">
            <ul>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>Order Form</li>
            </ul>
        </div>
        
        <div class="form-section">
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
            <input type="hidden" name='shipping_total' id='castomPrice' readonly >
                <?php if ( $checkout->get_checkout_fields() ) : ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <div class="col2-set d-none" id="customer_details">
                        <div class="col-5">
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        </div>

                        <div class="col-5">
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        </div>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>
                
                <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                
                
                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                <div id="order_review" class="woocommerce-checkout-review-order d-none">
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                </div>
                
                <div class="order-box trafficbox">
             

                    <div class="order__header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="title"><?php _e('1. Traffic Type', 'claroads') ?></p>
                            </div>
                            <div class="col-sm-6">
                                <div class="total-price">
                                    <p>
                                        <?php _e('total:', 'claroads') ?>
                                        <span class="totaltext">
                                            $
                                            <span>...</span>
                                            /mo
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order__body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="radio" name="billing_wooccm14" data-valu='0.05' id="trtype1" checked value="Non-unique visitors">
                                <label for="trtype1" class="styledradinp">
                                    <?php _e('<span>Non-unique visitors</span> (Multiple visits from same IP is possible)', 'claroads') ?>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="radio" name="billing_wooccm14" data-valu='0.25' id="trtype2" value="Unique visitors">
                                <label for="trtype2" class="styledradinp">
                                    <?php _e('<span>Unique visitors</span> (24-hour unique IP for each visitor)', 'claroads') ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-box visitorsbox">
                    <div class="order__header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="title"><?php _e('2. Choose Total Visitors', 'claroads') ?>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div class="total-price">
                                    <p>
                                        <?php _e('total:', 'claroads') ?>
                                        <span class="totaltext">
                                            $
                                            <span>...</span>
                                            /mo
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order__body">
                        <div class="rangeslider-wrapp">
                            <div class="rangeslider__header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <output class="output"></output>
                                        <span class="output__inftext"><?php _e('targeted visitors/mo', 'claroads') ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="infotext"><?php _e('Minimum order $10', 'claroads') ?></p>
                                    </div>
                                </div>
                            </div>
                            <input class="rangesl" name='shipping_total2' type="range" min="10000" max="1000000" step="1" value="10000">
                            <div class="rangeslider__footer">
                                <span>10 000</span>
                                <span>1 000 000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-box geoloc">
                    <div class="order__header">
                        <p class="title"><?php _e('3. Geolocation', 'claroads') ?>
                        </p>
                    </div>
                    <div class="order__body">
                        <div class="row">
                            <div class="geoloc__leftsect">
                                <div class="inpfield">
                                    <input type="radio" name="billing_wooccm15" id="geoloc1" checked>
                                    <label for="geoloc1" class="geoloc-radio">
                                        <?php _e('Worldwide', 'claroads') ?>
                                    </label>
                                </div>
                                <div class="inpfield">
                                    <input type="radio" name="billing_wooccm15" id="geoloc2" checked >
                                    <label for="geoloc2" class="geoloc-radio">
                                        <?php _e('Select countries', 'claroads') ?> 
                                    </label>
                                </div>
                            </div>
                            <div class="geoloc__rightsect">
                                <div class="counrtysel2">
                                    <select id="billing_wooccm123" name="billing_wooccm12[]" multiple="multiple"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-box timing-duration">
                    <div class="order__header">
                        <p class="title"><?php _e('4. Timing and Duration', 'claroads') ?>
                        </p>
                    </div>
                    <div class="order__body">
                        <div class="row">
                            <div class="geoloc__leftsect">
                                <p class="tdtext"><?php _e('Traffic delivery speed', 'claroads') ?></p>
                                <div class="inpfield">
                                    <input type="radio" name="billing_wooccm17" value='As fast as possible' id="td1" >
                                    <label for="td1" class="geoloc-radio">
                                        <?php _e('As fast as possible', 'claroads') ?>
                                    </label>
                                </div>
                                <div class="inpfield">
                                    <input type="radio" name="billing_wooccm17" value='Gradual delivery' id="td2" checked>
                                    <label for="td2" class="geoloc-radio">
                                        <?php _e('Gradual delivery <span>(campaign length 1 to 30 days)</span>', 'claroads') ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-box website">
                    <div class="order__header">
                        <p class="title"><?php _e('5. Website', 'claroads') ?>
                        </p>
                    </div>
                    <div class="order__body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inpfield inpfield__textinp">
                                    <input type="text" placeholder="Website Name" name='billing_wooccm11'>
                                    <label for=""><?php _e('Website Name', 'claroads') ?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inpfield inpfield__textinp">
                                    <input type="text" placeholder="Website URL"  name='billing_wooccm13'>
                                    <label for=""><?php _e('Website URL', 'claroads') ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if( ! is_user_logged_in() ) : ?>
                    <div class="order-bottsect">
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>/edit-account"  class="adsbtn adsbtn__blue">
                            <?php _e('login', 'claroads') ?>
                            <span></span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if( is_user_logged_in() ) : ?>
                    <div class="order-bottsect">

                        <?php $accept_text = get_field('accept_text', 'option'); ?>
                        <p class="title"><?php _e('Total USD: $', 'claroads') ?><span>...</span>/mo</p>
                        <div class="checkfield">
                            
                            <input type="checkbox"  id="acceptcheck">
                            <label for="acceptcheck"><?php echo  $accept_text; ?><span class='totalChek'></span></label>
                        </div>
                    
                        <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" disabled class=" adsbtn adsbtn__blue place_order" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '"> Confirm Order <span></span></button>' ); // @codingStandardsIgnoreLine ?>

                    </div>
                <?php endif; ?>
                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

            </form>
        </div>
    </div>
</div>
<script>
        (function ($) {
            $(function () {
                var isoCountries = [{
                        id: 'United-States',
                        text: 'United States'
                    },
                    {
                        id: 'Vietnam',
                        text: 'Vietnam'
                    },
                    {
                        id: 'India',
                        text: 'India'
                    },
                    {
                        id: 'Russia',
                        text: 'Russia'
                    },
                    {
                        id: 'United-Kingdom',
                        text: 'United Kingdom'
                    },
                    {
                        id: 'Thailand',
                        text: 'Thailand'
                    },
                    {
                        id: 'Argentina',
                        text: 'Argentina'
                    },
                    {
                        id: 'China',
                        text: 'China'
                    },
                    {
                        id: 'Turkey',
                        text: 'Turkey'
                    },
                    {
                        id: 'Indonesia',
                        text: 'Indonesia'
                    },
                    {
                        id: 'Kazakhstan',
                        text: 'Kazakhstan'
                    },
                    {
                        id: 'Iran',
                        text: 'Iran'
                    },
                    {
                        id: 'Venezuela',
                        text: 'Venezuela'
                    },
                    {
                        id: 'Malaysia',
                        text: 'Malaysia'
                    },
                    {
                        id: 'Brazil',
                        text: 'Brazil'
                    },
                    {
                        id: 'Lithuania',
                        text: 'Lithuania'
                    },
                    {
                        id: 'Georgia',
                        text: 'Georgia'
                    },
                    {
                        id: 'Ukraine',
                        text: 'Ukraine'
                    },
                    {
                        id: 'Laos',
                        text: 'Laos'
                    },
                    {
                        id: 'Uzbekistan',
                        text: 'Uzbekistan'
                    },
                    {
                        id: 'Jordan',
                        text: 'Jordan'
                    },
                    {
                        id: 'Mexico',
                        text: 'Mexico'
                    },
                    {
                        id: 'Mongolia',
                        text: 'Mongolia'
                    },
                    {
                        id: 'Pakistan',
                        text: 'Pakistan'
                    },
                    {
                        id: 'Iraq',
                        text: 'Iraq'
                    },
                    {
                        id: 'South-Africa',
                        text: 'South Africa'
                    },
                    {
                        id: 'Australia',
                        text: 'Australia'
                    },
                    {
                        id: 'Austria',
                        text: 'Austria'
                    },
                ];

                function formatCountry(country) {
                    if (!country.id) {
                        return country.text;
                    }
                    var $country = $(
                        '<span class="flag-icon flag-icon-' + country.id.toLowerCase() +
                        ' flag-icon-squared"></span>' +
                        '<span class="flag-text">' + country.text + "</span>"
                    );
                    return $country;
                };

                $('input[name="billing_wooccm15"]').change(function () {
					var selectBox = $('#billing_wooccm123');
                 
					if ($('#geoloc2').is(':checked')) {
						$(selectBox).prop('disabled', false);
					} else {
						$(selectBox).prop('disabled', true);
					}
				});

                $("[name='billing_wooccm12[]']").select2({
                    placeholder: "Select a country",
                    templateResult: formatCountry,
                    data: isoCountries
                });

            });
        })(jQuery);
    </script>
    <style>
        .flag-icon-united-states {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-usa.svg');
        }

        .flag-icon-vietnam {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-vietnam.svg');
        }

        .flag-icon-india {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-india.svg');
        }

        .flag-icon-russia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-russia.svg');
        }

        .flag-icon-united-kingdom {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-uk.svg');
        }

        .flag-icon-thailand {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-thailand.svg');
        }

        .flag-icon-argentina {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-argentina.svg');
        }

        .flag-icon-china {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-china.svg');
        }

        .flag-icon-turkey {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-turkey.svg');
        }

        .flag-icon-indonesia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-indonesia.svg');
        }

        .flag-icon-kazakhstan {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-kazakhstan.svg');
        }

        .flag-icon-iran {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-iran.svg');
        }

        .flag-icon-venezuela {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-venezuela.svg');
        }

        .flag-icon-malaysia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-malaysia.svg');
        }

        .flag-icon-brazil {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-brazil.svg');
        }

        .flag-icon-lithuania {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-lithuania.svg');
        }

        .flag-icon-georgia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-georgia.svg');
        }

        .flag-icon-ukraine {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-ukraine.svg');
        }

        .flag-icon-laos {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-laos.svg');
        }

        .flag-icon-uzbekistan {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-uzbekistan.svg');
        }

        .flag-icon-jordan {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-jordan.svg');
        }

        .flag-icon-mexico {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-mexico.svg');
        }

        .flag-icon-mongolia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-mongolia.svg');
        }

        .flag-icon-pakistan {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-pakistan.svg');
        }

        .flag-icon-iraq {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-iraq.svg');
        }

        .flag-icon-south-africa {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-southafrica.svg');
        }

        .flag-icon-australia {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-australia.svg');
        }

        .flag-icon-austria {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-austria.svg');
        }

    </style>
<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
