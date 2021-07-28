<?php
get_header(); ?>

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
                <section class="blogopen-wrapper">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="blogopen-sect">
                                <div class="blogcontentwrapper">
                                    <div class="blogcontent">
                                        <h1><?php the_title(); ?></h1>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <?php the_content(); ?>
                                        <?php endwhile; // End of the loop. ?>		
                                    </div>
                                    <!-- <img src="<?php echo SD_THEME_IMAGE_URI; ?>/blogpic.jpg" alt="image"> -->
                                    
                                </div>
                                <div class="blogdate">
                                    <div class="leftbox">
                                        <p class="date"><?php echo get_the_date(); ?></p>
                                        <p class="title">
                                            <?php the_title(); ?>
                                        </p>
                                    </div>
                                    <div class="rightbox">
                                        <p class="listtitle">Share:</p>
                                   
                                        <?php do_action('nc_share_post'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php	get_template_part( 'template-parts/sections/buytraffic' );?>
           
        </div>
    </main>

<?php get_footer();
