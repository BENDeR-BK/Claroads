<?php /*Template Name: Terms*/ 

get_header();?>

<main>
        <div class="mainwrapper acc">
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
                <section class="terms-wrapper">
                    <p class="section-title"><?php echo the_field('page_title');?></p>
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="terms-section">
                                <?php $i = 1; while( have_rows('terms_item') ): the_row(); 
                                    $title = get_sub_field('term_title');
                                    $text = get_sub_field('term_description');
                                    ?>

                                    <div class="termsbox">
                                        <p class="termsbox__title"><span><?php echo ($i < 10 ) ? "0" : " ";?><?php echo $i; ++$i;?></span><?php echo $title; ?></p>
                                        <div class="termsbox__descr">
                                            <?php echo $text; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                           
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php get_template_part( 'template-parts/sections/buytraffic' );?>
        </div>
    </main>

<?php get_footer(); ?>