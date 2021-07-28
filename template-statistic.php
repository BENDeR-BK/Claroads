<?php /*Template Name: traffic-statistic*/ 

get_header();?>

    <main>
        <div class="mainwrapper traffstat">
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
            </div>
            <div class="traffstat__topscreen">
                <div class="container-ca">
                    <p class="section-title"><?php echo the_field('page_title');?></p>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <p class="traffstat__title">
                                <span><?php echo the_field('page_intro_text_first');?></span>
                                <?php echo the_field('page_intro_text_second');?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="traffstat__content">
                <div class="container-ca">
                    <div class="row">
                        <div class="col-xl-5 offset-xl-2">
                            <div class="traffstat__table">
                                <div class="traffstat__table-head">
                                    <p class="traffstat__table-num">№</p>
                                    <p class="traffstat__table-cn"><?php _e('Сountry Name', 'claroads') ?></p>
                                    <p class="traffstat__table-visit"><?php _e('Average Daily Non-Unique visitors', 'claroads') ?></p>
                                </div>
                                <div class="traffstat__table-body">
                                    <?php $i = 1; while( have_rows('countries') ): the_row(); 
                                        $country_name = get_sub_field('country_name');
                                        $country_flag_image = get_sub_field('country_flag_image');
                                        $country_visit = get_sub_field('country_visit');
                                        ?>

                                        <div class="traffstat__countryrow">
                                            <div class="country-rownum">
                                                <span><?php echo $i; ++$i;?></span>
                                            </div>
                                            <div class="country-rowname">
                                                <p>
                                                    <img src="<?php echo $country_flag_image['url']; ?>" alt="flag">
                                                    <span><?php echo $country_name; ?></span>
                                                </p>
                                            </div>
                                            <div class="country-rownvisit">
                                                <p>
                                                    <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/icon-visitors.svg" alt="flag">
                                                    <span><?php echo $country_visit; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="traffic-buybox">
                                <p>
                                    <span><?php echo the_field('traffic_text_firts');?></span>
                                    <?php echo the_field('traffic_ttext_second');?>
                                </p>
                                <a href="<?php echo the_field('traffic_tbutton_link');?>" type="submit" class="adsbtn">
                                    <?php echo the_field('traffic_tbutton_text');?>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tableContainer"></div>
    </main>
<?php

get_footer(); ?>

<script>
    var flags = {
        "AD": "Andorra",
        "AE": "United Arab Emirates",
        "AF": "Afghanistan",
        "AG": "Antigua and Barbuda",
        "AI": "Anguilla",
        "AL": "Albania",
        "AM": "Armenia",
        "AO": "Angola",
        "AQ": "Antarctica",
        "AR": "Argentina",
        "AS": "American Samoa",
        "AT": "Austria",
        "AU": "Australia",
        "AW": "Aruba",
        "AX": "\u00c5land Islands",
        "AZ": "Azerbaijan",
        "BA": "Bosnia and Herzegovina",
        "BB": "Barbados",
        "BD": "Bangladesh",
        "BE": "Belgium",
        "BF": "Burkina Faso",
        "BG": "Bulgaria",
        "BH": "Bahrain",
        "BI": "Burundi",
        "BJ": "Benin",
        "BL": "Saint Barthélemy",
        "BM": "Bermuda",
        "BN": "Brunei Darussalam",
        "BO": "Bolivia, Plurinational State of",
        "BQ": "Caribbean Netherlands",
        "BR": "Brazil",
        "BS": "Bahamas",
        "BT": "Bhutan",
        "BV": "Bouvet Island",
        "BW": "Botswana",
        "BY": "Belarus",
        "BZ": "Belize",
        "CA": "Canada",
        "CC": "Cocos (Keeling) Islands",
        "CD": "Congo, the Democratic Republic of the",
        "CF": "Central African Republic",
        "CG": "Republic of the Congo",
        "CH": "Switzerland",
        "CI": "C\u00f4te d'Ivoire",
        "CK": "Cook Islands",
        "CL": "Chile",
        "CM": "Cameroon",
        "CN": "China (People's Republic of China)",
        "CO": "Colombia",
        "CR": "Costa Rica",
        "CU": "Cuba",
        "CV": "Cape Verde",
        "CW": "Cura\u00e7ao",
        "CX": "Christmas Island",
        "CY": "Cyprus",
        "CZ": "Czech Republic",
        "DE": "Germany",
        "DJ": "Djibouti",
        "DK": "Denmark",
        "DM": "Dominica",
        "DO": "Dominican Republic",
        "DZ": "Algeria",
        "EC": "Ecuador",
        "EE": "Estonia",
        "EG": "Egypt",
        "EH": "Western Sahara",
        "ER": "Eritrea",
        "ES": "Spain",
        "ET": "Ethiopia",
        "EU": "Europe",
        "FI": "Finland",
        "FJ": "Fiji",
        "FK": "Falkland Islands (Malvinas)",
        "FM": "Micronesia, Federated States of",
        "FO": "Faroe Islands",
        "FR": "France",
        "GA": "Gabon",
        "GB-ENG": "England",
        "GB-NIR": "Northern Ireland",
        "GB-SCT": "Scotland",
        "GB-WLS": "Wales",
        "GB": "United Kingdom",
        "GD": "Grenada",
        "GE": "Georgia",
        "GF": "French Guiana",
        "GG": "Guernsey",
        "GH": "Ghana",
        "GI": "Gibraltar",
        "GL": "Greenland",
        "GM": "Gambia",
        "GN": "Guinea",
        "GP": "Guadeloupe",
        "GQ": "Equatorial Guinea",
        "GR": "Greece",
        "GS": "South Georgia and the South Sandwich Islands",
        "GT": "Guatemala",
        "GU": "Guam",
        "GW": "Guinea-Bissau",
        "GY": "Guyana",
        "HK": "Hong Kong",
        "HM": "Heard Island and McDonald Islands",
        "HN": "Honduras",
        "HR": "Croatia",
        "HT": "Haiti",
        "HU": "Hungary",
        "ID": "Indonesia",
        "IE": "Ireland",
        "IL": "Israel",
        "IM": "Isle of Man",
        "IN": "India",
        "IO": "British Indian Ocean Territory",
        "IQ": "Iraq",
        "IR": "Iran, Islamic Republic of",
        "IS": "Iceland",
        "IT": "Italy",
        "JE": "Jersey",
        "JM": "Jamaica",
        "JO": "Jordan",
        "JP": "Japan",
        "KE": "Kenya",
        "KG": "Kyrgyzstan",
        "KH": "Cambodia",
        "KI": "Kiribati",
        "KM": "Comoros",
        "KN": "Saint Kitts and Nevis",
        "KP": "Korea, Democratic People's Republic of",
        "KR": "Korea, Republic of",
        "KW": "Kuwait",
        "KY": "Cayman Islands",
        "KZ": "Kazakhstan",
        "LA": "Laos (Lao People's Democratic Republic)",
        "LB": "Lebanon",
        "LC": "Saint Lucia",
        "LI": "Liechtenstein",
        "LK": "Sri Lanka",
        "LR": "Liberia",
        "LS": "Lesotho",
        "LT": "Lithuania",
        "LU": "Luxembourg",
        "LV": "Latvia",
        "LY": "Libya",
        "MA": "Morocco",
        "MC": "Monaco",
        "MD": "Moldova, Republic of",
        "ME": "Montenegro",
        "MF": "Saint Martin",
        "MG": "Madagascar",
        "MH": "Marshall Islands",
        "MK": "Macedonia, the former Yugoslav Republic of",
        "ML": "Mali",
        "MM": "Myanmar",
        "MN": "Mongolia",
        "MO": "Macao",
        "MP": "Northern Mariana Islands",
        "MQ": "Martinique",
        "MR": "Mauritania",
        "MS": "Montserrat",
        "MT": "Malta",
        "MU": "Mauritius",
        "MV": "Maldives",
        "MW": "Malawi",
        "MX": "Mexico",
        "MY": "Malaysia",
        "MZ": "Mozambique",
        "NA": "Namibia",
        "NC": "New Caledonia",
        "NE": "Niger",
        "NF": "Norfolk Island",
        "NG": "Nigeria",
        "NI": "Nicaragua",
        "NL": "Netherlands",
        "NO": "Norway",
        "NP": "Nepal",
        "NR": "Nauru",
        "NU": "Niue",
        "NZ": "New Zealand",
        "OM": "Oman",
        "PA": "Panama",
        "PE": "Peru",
        "PF": "French Polynesia",
        "PG": "Papua New Guinea",
        "PH": "Philippines",
        "PK": "Pakistan",
        "PL": "Poland",
        "PM": "Saint Pierre and Miquelon",
        "PN": "Pitcairn",
        "PR": "Puerto Rico",
        "PS": "Palestine",
        "PT": "Portugal",
        "PW": "Palau",
        "PY": "Paraguay",
        "QA": "Qatar",
        "RE": "Réunion",
        "RO": "Romania",
        "RS": "Serbia",
        "RU": "Russian Federation",
        "RW": "Rwanda",
        "SA": "Saudi Arabia",
        "SB": "Solomon Islands",
        "SC": "Seychelles",
        "SD": "Sudan",
        "SE": "Sweden",
        "SG": "Singapore",
        "SH": "Saint Helena, Ascension and Tristan da Cunha",
        "SI": "Slovenia",
        "SJ": "Svalbard and Jan Mayen Islands",
        "SK": "Slovakia",
        "SL": "Sierra Leone",
        "SM": "San Marino",
        "SN": "Senegal",
        "SO": "Somalia",
        "SR": "Suriname",
        "SS": "South Sudan",
        "ST": "Sao Tome and Principe",
        "SV": "El Salvador",
        "SX": "Sint Maarten (Dutch part)",
        "SY": "Syrian Arab Republic",
        "SZ": "Swaziland",
        "TC": "Turks and Caicos Islands",
        "TD": "Chad",
        "TF": "French Southern Territories",
        "TG": "Togo",
        "TH": "Thailand",
        "TJ": "Tajikistan",
        "TK": "Tokelau",
        "TL": "Timor-Leste",
        "TM": "Turkmenistan",
        "TN": "Tunisia",
        "TO": "Tonga",
        "TR": "Turkey",
        "TT": "Trinidad and Tobago",
        "TV": "Tuvalu",
        "TW": "Taiwan (Republic of China)",
        "TZ": "Tanzania, United Republic of",
        "UA": "Ukraine",
        "UG": "Uganda",
        "UM": "US Minor Outlying Islands",
        "US": "United States",
        "UY": "Uruguay",
        "UZ": "Uzbekistan",
        "VA": "Holy See (Vatican City State)",
        "VC": "Saint Vincent and the Grenadines",
        "VE": "Venezuela, Bolivarian Republic of",
        "VG": "Virgin Islands, British",
        "VI": "Virgin Islands, U.S.",
        "VN": "Vietnam",
        "VU": "Vanuatu",
        "WF": "Wallis and Futuna Islands",
        "WS": "Samoa",
        "XK": "Kosovo",
        "YE": "Yemen",
        "YT": "Mayotte",
        "ZA": "South Africa",
        "ZM": "Zambia",
        "ZW": "Zimbabwe"
    }
    var jsonData = [{"type":"TT","searches":97480,"cpc":"0.000026"},{"type":"MY","searches":55,"cpc":"0.00"},{"type":"VC","searches":552,"cpc":"0.000030"},{"type":"MA","searches":1481833,"cpc":"0.000031"},{"type":"SA","searches":1546003,"cpc":"0.000033"},{"type":"JM","searches":8,"cpc":"0.00"},{"type":"JM","searches":86417,"cpc":"0.000030"},{"type":"BE","searches":164915,"cpc":"0.000040"},{"type":"IM","searches":226,"cpc":"0.000031"},{"type":"MD","searches":149444,"cpc":"0.000036"},{"type":"SX","searches":2812,"cpc":"0.000048"},{"type":"AL","searches":12,"cpc":"0.00"},{"type":"PT","searches":13,"cpc":"0.00"},{"type":"DE","searches":5,"cpc":"0.00"},{"type":"VE","searches":583,"cpc":"0.00"},{"type":"NZ","searches":84535,"cpc":"0.000042"},{"type":"VI","searches":23143,"cpc":"0.000024"},{"type":"TZ","searches":58164,"cpc":"0.000056"},{"type":"CM","searches":39749,"cpc":"0.000084"},{"type":"BZ","searches":28184,"cpc":"0.000027"},{"type":"PA","searches":190335,"cpc":"0.000067"},{"type":"KG","searches":210470,"cpc":"0.000055"},{"type":"LV","searches":48010,"cpc":"0.000135"},{"type":"PW","searches":295,"cpc":"0.000030"},{"type":"LY","searches":8,"cpc":"0.00"},{"type":"CA","searches":698745,"cpc":"0.000054"},{"type":"RW","searches":8,"cpc":"0.00"},{"type":"CD","searches":8653,"cpc":"0.000083"},{"type":"RS","searches":112,"cpc":"0.00"},{"type":"NP","searches":540827,"cpc":"0.000028"},{"type":"PF","searches":2293,"cpc":"0.000024"},{"type":"JO","searches":1736493,"cpc":"0.000027"},{"type":"BA","searches":29,"cpc":"0.00"},{"type":"MG","searches":52269,"cpc":"0.000042"},{"type":"EH","searches":43,"cpc":"0.000030"},{"type":"KM","searches":2754,"cpc":"0.000039"},{"type":"GP","searches":20233,"cpc":"0.000037"},{"type":"BA","searches":179248,"cpc":"0.000028"},{"type":"HT","searches":18463,"cpc":"0.000028"},{"type":"LT","searches":12,"cpc":"0.00"},{"type":"MG","searches":17,"cpc":"0.00"},{"type":"SE","searches":561011,"cpc":"0.000039"},{"type":"CV","searches":7478,"cpc":"0.000041"},{"type":"TO","searches":8962,"cpc":"0.000051"},{"type":"CN","searches":13310159,"cpc":"0.000035"},{"type":"LR","searches":8739,"cpc":"0.000074"},{"type":"BR","searches":36,"cpc":"0.00"},{"type":"LS","searches":14186,"cpc":"0.000027"},{"type":"ZW","searches":75792,"cpc":"0.000030"},{"type":"CI","searches":41057,"cpc":"0.000085"},{"type":"RO","searches":572423,"cpc":"0.000025"},{"type":"NR","searches":10,"cpc":"0.000030"},{"type":"AE","searches":895307,"cpc":"0.000025"},{"type":"DO","searches":314085,"cpc":"0.000033"},{"type":"LA","searches":2133575,"cpc":"0.000031"},{"type":"NZ","searches":0,"cpc":"0.00"},{"type":"FO","searches":56,"cpc":"0.000035"},{"type":"RU","searches":5,"cpc":"0.00"},{"type":"FR","searches":946016,"cpc":"0.000039"},{"type":"CL","searches":4,"cpc":"0.00"},{"type":"CH","searches":0,"cpc":"0.00"},{"type":"GW","searches":109,"cpc":"0.000027"},{"type":"FM","searches":12334,"cpc":"0.000065"},{"type":"DK","searches":103422,"cpc":"0.000076"},{"type":"GI","searches":59,"cpc":"0.000025"},{"type":"HU","searches":195417,"cpc":"0.000122"},{"type":"GA","searches":16997,"cpc":"0.000033"},{"type":"GN","searches":10144,"cpc":"0.000142"},{"type":"UZ","searches":3204659,"cpc":"0.000021"},{"type":"KN","searches":1849,"cpc":"0.000036"},{"type":"SG","searches":494574,"cpc":"0.000081"},{"type":"ME","searches":24611,"cpc":"0.000026"},{"type":"ST","searches":114,"cpc":"0.000024"},{"type":"YE","searches":47270,"cpc":"0.000029"},{"type":"PY","searches":744082,"cpc":"0.000032"},{"type":"GB","searches":165,"cpc":"0.00"},{"type":"MZ","searches":4,"cpc":"0.00"},{"type":"NE","searches":16462,"cpc":"0.000039"},{"type":"UG","searches":217732,"cpc":"0.000097"},{"type":"MT","searches":9266,"cpc":"0.000034"},{"type":"CO","searches":37,"cpc":"0.00"},{"type":"FK","searches":110,"cpc":"0.000041"},{"type":"CC","searches":9,"cpc":"0.000108"},{"type":"SK","searches":0,"cpc":"0.00"},{"type":"TG","searches":17749,"cpc":"0.000039"},{"type":"BI","searches":4,"cpc":"0.00"},{"type":"GR","searches":187706,"cpc":"0.000033"},{"type":"AT","searches":12,"cpc":"0.00"},{"type":"TL","searches":32237,"cpc":"0.000022"},{"type":"KR","searches":4,"cpc":"0.00"},{"type":"XK","searches":65685,"cpc":"0.000017"},{"type":"CG","searches":24464,"cpc":"0.000158"},{"type":"BL","searches":68,"cpc":"0.000036"},{"type":"IR","searches":4201525,"cpc":"0.000058"},{"type":"PG","searches":68304,"cpc":"0.000029"},{"type":"TR","searches":6142002,"cpc":"0.000033"},{"type":"ME","searches":8,"cpc":"0.00"},{"type":"PK","searches":3002115,"cpc":"0.000037"},{"type":"CY","searches":4,"cpc":"0.00"},{"type":"IE","searches":73306,"cpc":"0.000061"},{"type":"TV","searches":23,"cpc":"0.000059"},{"type":"TW","searches":854253,"cpc":"0.000037"},{"type":"AO","searches":112434,"cpc":"0.000092"},{"type":"BS","searches":14174,"cpc":"0.000035"},{"type":"MN","searches":4,"cpc":"0.00"},{"type":"UY","searches":0,"cpc":"0.00"},{"type":"MQ","searches":5940,"cpc":"0.000036"},{"type":"ID","searches":8792111,"cpc":"0.000031"},{"type":"LU","searches":4444,"cpc":"0.000053"},{"type":"PE","searches":16,"cpc":"0.00"},{"type":"NL","searches":307503,"cpc":"0.000045"},{"type":"AX","searches":1252,"cpc":"0.000063"},{"type":"KW","searches":346138,"cpc":"0.000030"},{"type":"AM","searches":8,"cpc":"0.00"},{"type":"MN","searches":1621528,"cpc":"0.000034"},{"type":"IN","searches":11531437,"cpc":"0.000030"},{"type":"US","searches":799,"cpc":"0.00"},{"type":"IS","searches":17671,"cpc":"0.000045"},{"type":"GF","searches":4890,"cpc":"0.000057"},{"type":"DO","searches":4,"cpc":"0.00"},{"type":"AZ","searches":763207,"cpc":"0.000083"},{"type":"ET","searches":4,"cpc":"0.00"},{"type":"SY","searches":203722,"cpc":"0.000068"},{"type":"CW","searches":13326,"cpc":"0.000016"},{"type":"PL","searches":492148,"cpc":"0.000060"},{"type":"NI","searches":34887,"cpc":"0.000029"},{"type":"MU","searches":8,"cpc":"0.00"},{"type":"DJ","searches":2508,"cpc":"0.000044"},{"type":"CH","searches":67659,"cpc":"0.000077"},{"type":"SA","searches":8,"cpc":"0.00"},{"type":"NC","searches":13641,"cpc":"0.000035"},{"type":"QA","searches":4,"cpc":"0.00"},{"type":"MW","searches":48588,"cpc":"0.000400"},{"type":"MA","searches":105,"cpc":"0.00"},{"type":"VU","searches":12496,"cpc":"0.000022"},{"type":"SC","searches":5829,"cpc":"0.000048"},{"type":"GQ","searches":4749,"cpc":"0.000032"},{"type":"MR","searches":12083,"cpc":"0.000024"},{"type":"DM","searches":18336,"cpc":"0.000031"},{"type":"SL","searches":4553,"cpc":"0.000175"},{"type":"CA","searches":61,"cpc":"0.00"},{"type":"IT","searches":439,"cpc":"0.00"},{"type":"SR","searches":67593,"cpc":"0.000025"},{"type":"ZA","searches":2262281,"cpc":"0.000033"},{"type":"TH","searches":8,"cpc":"0.00"},{"type":"HN","searches":131672,"cpc":"0.000029"},{"type":"SH","searches":514,"cpc":"0.000045"},{"type":"BB","searches":28190,"cpc":"0.000024"},{"type":"PH","searches":1213155,"cpc":"0.000054"},{"type":"VN","searches":53,"cpc":"0.00"},{"type":"TD","searches":2843,"cpc":"0.000053"},{"type":"ML","searches":9171,"cpc":"0.000167"},{"type":"AL","searches":445657,"cpc":"0.000032"},{"type":"KH","searches":752088,"cpc":"0.000029"},{"type":"NL","searches":8,"cpc":"0.00"},{"type":"GG","searches":29,"cpc":"0.000037"},{"type":"ER","searches":7479,"cpc":"0.000028"},{"type":"AU","searches":207911,"cpc":"0.000050"},{"type":"FJ","searches":107440,"cpc":"0.000030"},{"type":"GE","searches":2400535,"cpc":"0.000041"},{"type":"ZA","searches":4,"cpc":"0.00"},{"type":"FR","searches":12,"cpc":"0.00"},{"type":"GD","searches":1090,"cpc":"0.000033"},{"type":"DZ","searches":1458360,"cpc":"0.000034"},{"type":"BQ","searches":100,"cpc":"0.000023"},{"type":"AT","searches":61095,"cpc":"0.000105"},{"type":"LB","searches":353477,"cpc":"0.000029"},{"type":"SZ","searches":7199,"cpc":"0.000035"},{"type":"TH","searches":8355291,"cpc":"0.000029"},{"type":"RW","searches":38110,"cpc":"0.000024"},{"type":"YE","searches":4,"cpc":"0.00"},{"type":"QA","searches":233456,"cpc":"0.000032"},{"type":"UG","searches":4,"cpc":"0.00"},{"type":"JP","searches":341268,"cpc":"0.000073"},{"type":"IR","searches":4,"cpc":"0.00"},{"type":"GL","searches":8263,"cpc":"0.000052"},{"type":"CU","searches":8882,"cpc":"0.000082"},{"type":"AD","searches":8682,"cpc":"0.000039"},{"type":"CF","searches":442,"cpc":"0.000029"},{"type":"YT","searches":9269,"cpc":"0.000037"},{"type":"MX","searches":2763251,"cpc":"0.000126"},{"type":"AI","searches":641,"cpc":"0.000044"},{"type":"BD","searches":1505619,"cpc":"0.000023"},{"type":"GU","searches":10795,"cpc":"0.000051"},{"type":"TZ","searches":4,"cpc":"0.00"},{"type":"GT","searches":322271,"cpc":"0.000037"},{"type":"EE","searches":18584,"cpc":"0.000096"},{"type":"EG","searches":1640499,"cpc":"0.000033"},{"type":"HK","searches":756404,"cpc":"0.000030"},{"type":"NA","searches":22801,"cpc":"0.000058"},{"type":"UA","searches":26,"cpc":"0.00"},{"type":"MF","searches":2052,"cpc":"0.000025"},{"type":"GH","searches":356857,"cpc":"0.000190"},{"type":"BY","searches":730937,"cpc":"0.000039"},{"type":"GY","searches":6706,"cpc":"0.000027"},{"type":"BO","searches":233938,"cpc":"0.000038"},{"type":"CZ","searches":4,"cpc":"0.00"},{"type":"HR","searches":35997,"cpc":"0.000040"},{"type":"BR","searches":6420093,"cpc":"0.000075"},{"type":"OM","searches":591853,"cpc":"0.000078"},{"type":"BI","searches":3508,"cpc":"0.000043"},{"type":"DE","searches":15307888,"cpc":"0.000031"},{"type":"NG","searches":4,"cpc":"0.00"},{"type":"AG","searches":4889,"cpc":"0.000032"},{"type":"BH","searches":114958,"cpc":"0.000057"},{"type":"JE","searches":287,"cpc":"0.000029"},{"type":"SN","searches":37696,"cpc":"0.000082"},{"type":"TN","searches":29,"cpc":"0.00"},{"type":"KY","searches":673,"cpc":"0.000037"},{"type":"PT","searches":213277,"cpc":"0.000052"},{"type":"RS","searches":350322,"cpc":"0.000026"},{"type":"SI","searches":39044,"cpc":"0.000051"},{"type":"CZ","searches":177630,"cpc":"0.000030"},{"type":"GH","searches":20,"cpc":"0.00"},{"type":"GM","searches":43280,"cpc":"0.000028"},{"type":"CR","searches":65309,"cpc":"0.000028"},{"type":"MM","searches":336012,"cpc":"0.000050"},{"type":"AW","searches":1992,"cpc":"0.000033"},{"type":"KR","searches":1346961,"cpc":"0.000066"},{"type":"CL","searches":1384040,"cpc":"0.000065"},{"type":"IL","searches":1075465,"cpc":"0.000025"},{"type":"TJ","searches":383471,"cpc":"0.000042"},{"type":"KE","searches":104,"cpc":"0.00"},{"type":"BG","searches":17,"cpc":"0.00"},{"type":"CO","searches":1385445,"cpc":"0.000083"},{"type":"MX","searches":25,"cpc":"0.00"},{"type":"TN","searches":727839,"cpc":"0.000033"},{"type":"TM","searches":137855,"cpc":"0.000078"},{"type":"SD","searches":450576,"cpc":"0.000019"},{"type":"LT","searches":48213,"cpc":"0.000044"},{"type":"MH","searches":5403,"cpc":"0.000073"},{"type":"EC","searches":342913,"cpc":"0.000042"},{"type":"ES","searches":905478,"cpc":"0.000035"},{"type":"GB","searches":602784,"cpc":"0.000044"},{"type":"LK","searches":662389,"cpc":"0.000025"},{"type":"AS","searches":15776,"cpc":"0.000066"},{"type":"BW","searches":83896,"cpc":"0.000037"},{"type":"RU","searches":14030163,"cpc":"0.000068"},{"type":"BG","searches":244730,"cpc":"0.000068"},{"type":"SS","searches":5709,"cpc":"0.000037"},{"type":"AU","searches":18,"cpc":"0.00"},{"type":"VG","searches":84,"cpc":"0.000029"},{"type":"MP","searches":183,"cpc":"0.000036"},{"type":"MU","searches":73042,"cpc":"0.000032"},{"type":"MZ","searches":42939,"cpc":"0.000097"},{"type":"KZ","searches":1,"cpc":"0.00"},{"type":"GR","searches":8,"cpc":"0.00"},{"type":"FI","searches":60757,"cpc":"0.000085"},{"type":"VE","searches":4674850,"cpc":"0.000037"},{"type":"UA","searches":2329545,"cpc":"0.000061"},{"type":"SK","searches":49464,"cpc":"0.000034"},{"type":"AM","searches":700481,"cpc":"0.000076"},{"type":"AR","searches":18,"cpc":"0.00"},{"type":"JP","searches":0,"cpc":"0.00"},{"type":"KZ","searches":4589403,"cpc":"0.000033"},{"type":"UY","searches":80903,"cpc":"0.000036"},{"type":"BE","searches":4,"cpc":"0.00"},{"type":"CN","searches":0,"cpc":"0.000076"},{"type":"MO","searches":19413,"cpc":"0.000039"},{"type":"SV","searches":84959,"cpc":"0.000026"},{"type":"KI","searches":100,"cpc":"0.000030"},{"type":"BD","searches":4,"cpc":"0.00"},{"type":"HT","searches":4,"cpc":"0.00"},{"type":"RO","searches":45,"cpc":"0.00"},{"type":"VN","searches":19571141,"cpc":"0.000068"},{"type":"GE","searches":16,"cpc":"0.00"},{"type":"BF","searches":4277,"cpc":"0.000141"},{"type":"LB","searches":4,"cpc":"0.00"},{"type":"SB","searches":6527,"cpc":"0.000024"},{"type":"MY","searches":3217254,"cpc":"0.000042"},{"type":"ET","searches":349960,"cpc":"0.000021"},{"type":"MC","searches":1775,"cpc":"0.000033"},{"type":"GT","searches":4,"cpc":"0.00"},{"type":"NO","searches":96007,"cpc":"0.000116"},{"type":"MS","searches":2,"cpc":"0.00"},{"type":"IT","searches":1073485,"cpc":"0.000034"},{"type":"NG","searches":326142,"cpc":"0.000075"},{"type":"ES","searches":12,"cpc":"0.00"},{"type":"HU","searches":3,"cpc":"0.00"},{"type":"DZ","searches":68,"cpc":"0.00"},{"type":"AZ","searches":4,"cpc":"0.00"},{"type":"KE","searches":676946,"cpc":"0.000042"},{"type":"IN","searches":1213,"cpc":"0.00"},{"type":"CY","searches":41041,"cpc":"0.000039"},{"type":"BT","searches":55948,"cpc":"0.000023"},{"type":"RE","searches":17398,"cpc":"0.000036"},{"type":"AE","searches":12,"cpc":"0.00"},{"type":"MK","searches":106079,"cpc":"0.000024"},{"type":"TR","searches":8,"cpc":"0.00"},{"type":"AF","searches":39980,"cpc":"0.000027"},{"type":"MK","searches":25,"cpc":"0.00"},{"type":"ET","searches":0,"cpc":"0.000027"},{"type":"CK","searches":1456,"cpc":"0.000046"},{"type":"PE","searches":794272,"cpc":"0.000174"},{"type":"WS","searches":30305,"cpc":"0.000022"},{"type":"US","searches":7304960,"cpc":"0.000040"},{"type":"BW","searches":4,"cpc":"0.00"},{"type":"JO","searches":8,"cpc":"0.00"},{"type":"MV","searches":166356,"cpc":"0.000030"},{"type":"PS","searches":402068,"cpc":"0.000032"},{"type":"LY","searches":828384,"cpc":"0.000023"},{"type":"PL","searches":13,"cpc":"0.00"},{"type":"CI","searches":4,"cpc":"0.00"},{"type":"PR","searches":65986,"cpc":"0.000036"},{"type":"PH","searches":98,"cpc":"0.00"},{"type":"SO","searches":90892,"cpc":"0.000031"},{"type":"HR","searches":28,"cpc":"0.00"},{"type":"IQ","searches":1960641,"cpc":"0.000032"},{"type":"MD","searches":0,"cpc":"0.00"},{"type":"BM","searches":337,"cpc":"0.000038"},{"type":"SG","searches":9,"cpc":"0.00"},{"type":"TC","searches":1484,"cpc":"0.000036"},{"type":"ZM","searches":85135,"cpc":"0.000066"},{"type":"LC","searches":2848,"cpc":"0.000030"},{"type":"BN","searches":89231,"cpc":"0.000101"},{"type":"SM","searches":549,"cpc":"0.000034"},{"type":"AR","searches":10374264,"cpc":"0.000037"},{"type":"BJ","searches":17874,"cpc":"0.000284"}]
    // jQuery.each(jsonData, function(i, item) {
        // console.log(item.type);
        // <?php $ajas = admin_url( 'admin-ajax.php' ); ?>
        // jQuery.ajaxSetup({
        //         dataType: 'json',
        //         url: "<?php echo $ajas; ?>",
        //         type:  'get',
        //         beforeSend: function(request) {
        //             request.setRequestHeader("User-Agent","https://login.claroads.com/rates.php");
        //         },
        //         success:  function (data) {
        //             var i = 0;
        //             var table = '<table class="mainTable"><tr><th>item</th><th>image</th><th>description</th></tr>';
        //             data = $.parseJSON(data)
        //                 jQuery.each(jsonData, function (idx, obj) {                                   
        //                     table += ('<tr>');
        //                     table += ('<td>' + obj.Title + '</td>');
        //                     table += ('<td><img src="' + obj.ImageURLs.Thumb + '"></td>');
        //                     table += ('<td>' + obj.Description + '</td>');
        //                     table += ('</tr>');
        //                 });
        //             table += '</table>';
        //             jQuery("#tableContainer").html(table);

        //         },
        //         error: function(XMLHttpRequest, textStatus, errorThrown) {
        //             console.log("some error");
        //         }
        // });
        
    // });
    var table = '<table class="mainTable"><tr><th>item</th><th>image</th><th>description</th></tr>';
        
    jQuery.each(jsonData, function (idx, obj) {     
        var fl =  obj.type;    
        var url = obj.type.toLowerCase();
        // console.log(fl);                    
        table += ('<tr>');
        table += ('<td> <img src="<?php echo SD_THEME_IMAGE_URI; ?>/flag/'+url+'.png"> ' + flags[fl] +'</td>');
        table += ('<td>' + obj.searches + '</td>');
        table += ('<td>' + obj.cpc + '</td>');
        table += ('</tr>');
    });
    table += '</table>';
    jQuery("#tableContainer").html(table);

    
    console.log(flags.AM);
    
        $.ajaxSetup({
        beforeSend: function(request) {
        request.setRequestHeader("User-Agent","InsertUserAgentStringHere");
        }
        });
       
        
</script>