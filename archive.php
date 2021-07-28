<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package claroads
 */

get_header();?>

<div id="primary" class="content-area">
<main id="main" class="site-main">

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
            <section class="blog-content">
                <p class="section-title">Blog</p>
                <div class="row">
                    <?php $td_posts = array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'post_status' => 'publish',
                    );
                    $td_posts_list = new WP_Query( $td_posts );
                    if( $td_posts_list->have_posts() ): ?>
            
                        <?php while( $td_posts_list->have_posts() ): $td_posts_list->the_post(); ?>
                            <div class="col-xl-4">
                                <a href="<?php the_permalink(); ?>" class="postlink">
                                    <div class="postbig">
                                        <div class="picwrapp progressive replace" data-href="<?php echo get_the_post_thumbnail_url( $td_posts_list->post->ID, 'large' ); ?>">
                                            <?php the_post_thumbnail('progressive', array(
                                                    'class' => "preview",
                                                    'alt'   => 'image',
                                                )); 
                                            ?>
                                        </div>
                                        <div class="postbig__descr">
                                            <p class="title">
                                                <?php the_title(); ?>
                                            </p>
                                            <p class="descr">
                                            <?php the_excerpt(); ?>

                                                
                                            </p>
                                            <p class="date"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                    <div class="col-xl-4">
                        <?php $td_posts = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'offset' => 1,
                            'post_status' => 'publish',
                        );
                        $td_posts_list = new WP_Query( $td_posts );
                        if( $td_posts_list->have_posts() ): ?>
                
                            <?php while( $td_posts_list->have_posts() ): $td_posts_list->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="postlink">
                                    <div class="postmiddle">
                                        <div class="picwrapp progressive replace" data-href="<?php echo get_the_post_thumbnail_url( $td_posts_list->post->ID, 'large' ); ?>">
                                            <?php the_post_thumbnail('progressive', array(
                                                    'class' => "preview",
                                                    'alt'   => 'image',
                                                )); 
                                            ?>
                                        </div>
                                        <div class="postmiddle__descr">
                                            <div class="postmiddle__descr-wrapp">
                                                <p class="title"><?php the_title(); ?></p>
                                                <p class="date"><?php echo get_the_date(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            <?php endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="col-xl-4">
                        <?php $td_posts = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'offset' => 3,
                            'post_status' => 'publish',
                        );
                        $td_posts_list = new WP_Query( $td_posts );
                        if( $td_posts_list->have_posts() ): ?>
                
                            <?php while( $td_posts_list->have_posts() ): $td_posts_list->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="postlink">
                                    <div class="postsmall">
                                        <div class="picwrapp progressive replace" data-href="<?php echo get_the_post_thumbnail_url( $td_posts_list->post->ID, 'large' ); ?>">
                                            <?php the_post_thumbnail('progressive', array(
                                                    'class' => "preview",
                                                    'alt'   => 'image',
                                                )); 
                                            ?>
                                        </div>
                                        <div class="postsmall__descr">
                                            <div class="postsmall__descr-wrapp">
                                                <p class="title"><?php the_title(); ?></p>
                                                <p class="date"><?php echo get_the_date(); ?></p>	
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="col-xl-12">
                        <div class="row">
                            <?php $td_posts = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'offset' => 7,
                                'post_status' => 'publish',
                            );
                            $td_posts_list = new WP_Query( $td_posts );
                            if( $td_posts_list->have_posts() ): ?>
                
                                <?php while( $td_posts_list->have_posts() ): $td_posts_list->the_post(); ?>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <a href="#" class="postlink">
                                            <div class="postbottom">
                                                <div class="picwrapp progressive replace" data-href="<?php echo get_the_post_thumbnail_url( $td_posts_list->post->ID, 'large' ); ?>">
                                                    <?php the_post_thumbnail('progressive', array(
                                                            'class' => "preview",
                                                            'alt'   => 'image',
                                                        )); 
                                                    ?>
                                                </div>
                                                <div class="postbott__descr">
                                                    <p class="title"><?php the_title(); ?></p>
                                                    <p class="descr">
                                                        <?php the_excerpt(); ?>
                                                    </p>
                                                    <p class="date"><?php echo get_the_date(); ?></p>	
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; wp_reset_postdata(); ?>
                        
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php	get_template_part( 'template-parts/sections/buytraffic' );?>

    </div>

</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
