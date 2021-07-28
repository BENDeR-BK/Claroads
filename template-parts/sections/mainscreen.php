<section class="mainscreen">
    <div class="maintestpic-wrapp">
        <img class="maintestpic-tabl" src="<?php echo SD_THEME_IMAGE_URI; ?>/tabletpic1.png" alt="image">
        <img class="maintestpic-mob" src="<?php echo SD_THEME_IMAGE_URI; ?>/mobpic1.png" alt="image">
        <img class="mainanim mainscpic1" src="<?php echo SD_THEME_IMAGE_URI; ?>/animation-pic/main1.svg" alt="image">
        <img class="mainanim mainscpic2" src="<?php echo SD_THEME_IMAGE_URI; ?>/animation-pic/main2.svg" alt="image">
        <svg class="mainanim mainscpic3" width="1324" height="1324" viewBox="0 0 1324 1324" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle opacity="0.3" cx="661" cy="662" r="460" stroke="white" stroke-width="2" />
            <circle class="circ3" opacity="0.2" cx="202" cy="694" r="28" fill="#4EEAFF" />
            <circle class="circ2" opacity="0.4" cx="202" cy="694" r="17.5" fill="#4EEAFF" />
            <circle class="circ1" cx="202" cy="694" r="5.25" fill="#4EEAFF" />
            <circle class="circ3" opacity="0.15" cx="505" cy="230" r="14" fill="white" />
            <circle class="circ2" opacity="0.2" cx="505" cy="230" r="4.26087" fill="white" />
            <circle class="circ1" opacity="0.4" cx="505" cy="230" r="1.82609" fill="white" />
            <circle class="circ3" opacity="0.15" cx="1028" cy="939" r="30" fill="white" />
            <circle class="circ2" opacity="0.4" cx="1028" cy="939" r="14" fill="white" />
            <circle class="circ1" cx="1028" cy="939" r="3.91304" fill="white" />
        </svg>
        <svg class="mainanim mainscpic4" width="1324" height="1324" viewBox="0 0 1324 1324" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle class="" opacity="0.2" cx="662" cy="662" r="661" stroke="white" stroke-width="2" />
            <circle class="circ3" opacity="0.1" cx="85" cy="985" r="37" fill="white" />
            <circle class="circ2" opacity="0.15" cx="85" cy="985" r="23.125" fill="white" />
            <circle class="circ1" cx="84.9999" cy="985" r="4.82609" fill="white" />
            <circle class="circ3" opacity="0.2" cx="116" cy="289" r="57" fill="#4EEAFF" />
            <circle class="circ2" opacity="0.5" cx="116" cy="289" r="35.625" fill="#4EEAFF" />
            <circle class="circ1" cx="116" cy="289" r="7.43478" fill="#4FEAFF" />
        </svg>

    </div>
    <div class="container-ca">
        <div class="row">
            <div class="col-12">
                <div class="ovhidd">
                <?php
                    $title_intro = get_field('title_intro');
                    if( $title_intro ): ?>
                        <h1>
                            <span class="trtext" data-aos="example-anim1" data-aos-delay="300"
                                data-aos-duration="700"><?php echo esc_attr( $title_intro['title_top_intro'] ); ?></span>
                            <span class="gentext" data-aos="example-anim1" data-aos-delay="400"
                                data-aos-duration="700"><?php echo esc_attr( $title_intro['title_bottom_intro'] ); ?></span>
                        </h1>
                    <?php endif; 
                ?>
                </div>
            </div>
            <div class="col-sm-11 offset-md-1">
                <div class="mainscreen__botsect">
                    <div class="mainscreen__descr" data-aos="fade-up" data-aos-delay="700"
                        data-aos-duration="800">
                        <?php the_field('text_intro'); ?>
                    </div>
                    <?php 
                        $button_intro = get_field('button_intro');
                        if( $button_intro ): ?>
                            <a href="<?php echo esc_attr( $button_intro['button_link_intro'] ); ?>" class="adsbtn" data-aos="fade-up" data-aos-delay="1000"
                                data-aos-duration="800"><?php echo esc_attr( $button_intro['button_text_intro'] ); ?><span></span>
                            </a>
                        <?php endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>