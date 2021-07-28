<?php /*Template Name: Order*/ 

get_header();?>

<main>
    <!-- <div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div> -->
        <div class="mainwrapper orderpage">
            <div class="container-ca">
                <div class="breadcrumbsect">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Order Form</li>
                    </ul>
                </div>
                <div class="form-section">
                    <form action="#" class='checkout '>
                        <div class="order-box trafficbox">
                            <div class="order__header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="title">1. Traffic Type</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="total-price">
                                            <p>
                                                total:
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
                                        <input type="radio" name="trafftype" id="trtype1" checked value="0.05">
                                        <label for="trtype1" class="styledradinp">
                                            <span>Non-unique visitors</span> (Multiple visits from same IP is possible)
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="radio" name="trafftype" id="trtype2" value="0.25">
                                        <label for="trtype2" class="styledradinp">
                                            <span>Unique visitors</span> (24-hour unique IP for each visitor)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-box visitorsbox">
                            <div class="order__header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="title">2. Choose Total Visitors
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="total-price">
                                            <p>
                                                total:
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
                                                <span class="output__inftext">targeted visitors/mo</span>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="infotext">Minimum order $10</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="rangesl" name='shipping_total' type="range" min="10000" max="1000000" step="1" value="10000">
                                    <div class="rangeslider__footer">
                                        <span>10 000</span>
                                        <span>1 000 000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-box geoloc">
                            <div class="order__header">
                                <p class="title">3. Geolocation
                                </p>
                            </div>
                            <div class="order__body">
                                <div class="row">
                                    <div class="geoloc__leftsect">
                                        <div class="inpfield">
                                            <input type="radio" name="geoloc" id="geoloc1" checked>
                                            <label for="geoloc1" class="geoloc-radio">
                                                Worldwide
                                            </label>
                                        </div>
                                        <div class="inpfield">
                                            <input type="radio" name="geoloc" id="geoloc2" checked>
                                            <label for="geoloc2" class="geoloc-radio">
                                                Select countries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="geoloc__rightsect">
                                        <div class="counrtysel2">
                                            <select id="country-select" name="country" multiple="multiple"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-box timing-duration">
                            <div class="order__header">
                                <p class="title">4. Timing and Duration
                                </p>
                            </div>
                            <div class="order__body">
                                <div class="row">
                                    <div class="geoloc__leftsect">
                                        <p class="tdtext">Traffic delivery speed</p>
                                        <div class="inpfield">
                                            <input type="radio" name="timedur" id="td1" checked>
                                            <label for="td1" class="geoloc-radio">
                                                As fast as possible
                                            </label>
                                        </div>
                                        <div class="inpfield">
                                            <input type="radio" name="timedur" id="td2" checked>
                                            <label for="td2" class="geoloc-radio">
                                                Gradual delivery <span>(campaign length 1 to 30 days)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-box website">
                            <div class="order__header">
                                <p class="title">5. Website
                                </p>
                            </div>
                            <div class="order__body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inpfield inpfield__textinp">
                                            <input type="text" placeholder="Website Name">
                                            <label for="">Website Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inpfield inpfield__textinp">
                                            <input type="text" placeholder="Website URL">
                                            <label for="">Website URL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-bottsect">
                            <input type="text" name='shipping_total' id='castomPrice'>
                            <p class="title">Total USD: $<span>...</span>/mo</p>
                            <div class="checkfield">
                                
                                <input type="checkbox"  id="acceptcheck">
                                <label for="acceptcheck">I accept the ClaroAds.com <a href="#" target='_blank'>terms</a>
                                    and conditions, and will be charged $XXX</label>
                            </div>
                            <!-- <input type="submit" id="ajax-order-btn" class="button" value="Place Order via AJAX" /> -->
                            <!-- <button type="submit" id="ajax-order-btn" class="adsbtn adsbtn__blue">
                                Confirm Order
                                <span></span>
                            </button> -->
		                    <?php echo apply_filters( 'woocommerce_order_button_html', 
                                '<button type="submit" 
                                class=" adsbtn adsbtn__blue" 
                                name="woocommerce_checkout_place_order" 
                                id="ajax_btn" value="' . esc_attr( $order_button_text ) . '" 
                                data-value="' . esc_attr( $order_button_text ) . '"> Confirm Order <span></span></button>' ); // @codingStandardsIgnoreLine ?>
                            
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <script>
        (function ($) {
            $(function () {
                var isoCountries = [{
                        id: 'US',
                        text: 'United States'
                    },
                    {
                        id: 'VT',
                        text: 'Vietnam'
                    },
                    {
                        id: 'IN',
                        text: 'India'
                    },
                    {
                        id: 'RU',
                        text: 'Russia'
                    },
                    {
                        id: 'UK',
                        text: 'United Kingdom'
                    },
                    {
                        id: 'TH',
                        text: 'Thailand'
                    },
                    {
                        id: 'AR',
                        text: 'Argentina'
                    },
                    {
                        id: 'CH',
                        text: 'China'
                    },
                    {
                        id: 'TK',
                        text: 'Turkey'
                    },
                    {
                        id: 'IND',
                        text: 'Indonesia'
                    },
                    {
                        id: 'KZ',
                        text: 'Kazakhstan'
                    },
                    {
                        id: 'IN',
                        text: 'Iran'
                    },
                    {
                        id: 'VZ',
                        text: 'Venezuela'
                    },
                    {
                        id: 'MA',
                        text: 'Malaysia'
                    },
                    {
                        id: 'BR',
                        text: 'Brazil'
                    },
                    {
                        id: 'LT',
                        text: 'Lithuania'
                    },
                    {
                        id: 'GR',
                        text: 'Georgia'
                    },
                    {
                        id: 'UA',
                        text: 'Ukraine'
                    },
                    {
                        id: 'LS',
                        text: 'Laos'
                    },
                    {
                        id: 'UZ',
                        text: 'Uzbekistan'
                    },
                    {
                        id: 'JN',
                        text: 'Jordan'
                    },
                    {
                        id: 'MX',
                        text: 'Mexico'
                    },
                    {
                        id: 'MG',
                        text: 'Mongolia'
                    },
                    {
                        id: 'PK',
                        text: 'Pakistan'
                    },
                    {
                        id: 'IQ',
                        text: 'Iraq'
                    },
                    {
                        id: 'SA',
                        text: 'South Africa'
                    },
                    {
                        id: 'AU',
                        text: 'Australia'
                    },
                    {
                        id: 'AS',
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

                $("[name='country']").select2({
                    placeholder: "Select a country",
                    templateResult: formatCountry,
                    data: isoCountries
                });

            });
        })(jQuery);
    </script>
    <style>
        .flag-icon-us {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-usa.svg');
        }

        .flag-icon-vt {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-vietnam.svg');
        }

        .flag-icon-in {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-india.svg');
        }

        .flag-icon-ru {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-russia.svg');
        }

        .flag-icon-uk {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-uk.svg');
        }

        .flag-icon-th {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-thailand.svg');
        }

        .flag-icon-ar {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-argentina.svg');
        }

        .flag-icon-ch {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-china.svg');
        }

        .flag-icon-tk {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-turkey.svg');
        }

        .flag-icon-ind {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-indonesia.svg');
        }

        .flag-icon-kz {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-kazakhstan.svg');
        }

        .flag-icon-in {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-iran.svg');
        }

        .flag-icon-vz {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-venezuela.svg');
        }

        .flag-icon-ma {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-malaysia.svg');
        }

        .flag-icon-br {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-brazil.svg');
        }

        .flag-icon-lt {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-lithuania.svg');
        }

        .flag-icon-gr {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-georgia.svg');
        }

        .flag-icon-ua {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-ukraine.svg');
        }

        .flag-icon-ls {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-laos.svg');
        }

        .flag-icon-uz {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-uzbekistan.svg');
        }

        .flag-icon-jn {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-jordan.svg');
        }

        .flag-icon-mx {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-mexico.svg');
        }

        .flag-icon-mg {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-mongolia.svg');
        }

        .flag-icon-pk {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-pakistan.svg');
        }

        .flag-icon-iq {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-iraq.svg');
        }

        .flag-icon-sa {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-southafrica.svg');
        }

        .flag-icon-au {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-australia.svg');
        }

        .flag-icon-as {
            background-image: url('<?php echo SD_THEME_IMAGE_URI; ?>/flags/flag-austria.svg');
        }

    </style>
<?php get_footer(); ?>


