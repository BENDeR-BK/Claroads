<?php /*Template Name: FAQ*/ 

get_header();?>

<main>
        <div class="mainwrapper faq">
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
                <section class="faq-content">
                    <p class="section-title"><?php echo the_field('page_title');?></p>
                    <div class="faq-qustions">
                        <?php $i = 1; while( have_rows('faq_item') ): the_row(); 
                            $title = get_sub_field('question');
                            $text = get_sub_field('answer');
                            ?>
                            <div class="faq-qustionbox">
                                <div class="num"><?php echo ($i < 10 ) ? "0" : " ";?><?php echo $i; ++$i;?></div>
                                <div class="cont">
                                    <p class="title"><?php echo $title; ?></p>
                                    <div class="descr">
                                        <p>
                                            <?php echo $text; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            </div>
            <?php	get_template_part( 'template-parts/sections/buytraffic' );?>
        </div>
    </main>

<?php get_footer(); ?>