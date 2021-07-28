

<section class="buytraff">
    <div class="container-ca">
        <div class="row">
            <div class="col-xl-9 col-lg-8 d-flex align-items-center">
                <?php
                    $buy_traffic_title = get_field('buy_traffic_title', 'option');
                    if( $buy_traffic_title ): ?>
                        <h2>
                            <span><?php echo esc_attr( $buy_traffic_title['buy_traffic_title_first'] ); ?></span>
                            <?php echo esc_attr( $buy_traffic_title['buy_traffic_title_second'] ); ?>
                        </h2>
                    <?php endif; 
                ?>
            </div>
            <div class="col-xl-3 col-lg-4 d-flex align-items-center justify-content-lg-end">
                <?php
                    $buy_traffic_button = get_field('buy_traffic_button', 'option');
                    if( $buy_traffic_button ): ?>
                        <a href="<?php echo esc_attr( $buy_traffic_button['button_link'] ); ?>" class="adsbtn">
                            <?php echo esc_attr( $buy_traffic_button['button_text'] ); ?><span></span>
                        </a>
                    <?php endif; 
                ?>
            </div>
        </div>
    </div>
</section>