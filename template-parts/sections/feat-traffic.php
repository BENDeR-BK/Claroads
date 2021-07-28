<section class="feat-traffic">
    <div class="container-ca">
        <p class="section-title"><?php echo the_field('feat-traffic_title');?></p>
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="feat-traffic__section">
                    <?php $i = 1; while( have_rows('feat-traffic') ): the_row(); 
                        $image = get_sub_field('feat-traffic_image');
                        $title = get_sub_field('feat-traffic_title');
                        $text = get_sub_field('feat-traffic_text');
                        ?>
                       
                        <div class="row" data-aos="<?php echo ($i % 2 ) ? "fade-up-right" : "fade-up-left";?>" data-aos-delay="400" data-aos-duration="800">
                            <div class="descrblock">
                                <h3><span class="num"><?php echo ($i < 10 ) ? "0" : " ";?><?php echo $i; ++$i;?></span><?php echo $title; ?></h3>
                                <div class="descrbox">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                            <div class="picblock">
                                <img class='preview' src="<?php echo $image['sizes']['progressive']; ?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
