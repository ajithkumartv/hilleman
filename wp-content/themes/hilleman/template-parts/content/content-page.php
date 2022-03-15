<?php wp_head(); ?> 
<style>
    html {
    /* margin-top: 0px !important; */
    }
</style>
<?php if(!empty( get_the_post_thumbnail_url() )): ?>
    <div class="hl-banner hl-banner--inner">
        <div class="hl-banner__item">
            <div class="hl-banner__img-sec">

                <!-- Desktop banner Image -->
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="hl-img mobile-hidden">
                    <!-- /Desktop banner Image -->

                <!-- Mobile banner Image -->
                <?php
                // Image comming from the plugin ** Dynamic Featured Image **, plugin URL: https://wordpress.org/plugins/dynamic-featured-image/
                if( class_exists('Dynamic_Featured_Image') ) 
                { 
                    global $dynamic_featured_image; $featured_images = $dynamic_featured_image->get_featured_images( ); 
                    //You can now loop through the image to display them as required 
                    foreach($featured_images as $featured_image) 
                    { 
                        echo '<img src="'.$featured_image['full'].'" alt="" width="100%" class="only-mobile">';
                        break;
                    } 
                } 
                ?>
                <!-- /Mobile banner Image -->
                
            </div>

            <!-- <div class="content-wrapper hl-banner__inner">
                <div class="hl-banner__content"></div>
            </div> -->
        </div>
    </div>
<?php endif; ?> 

<div class="hl-board-directors">
        <div class="content-wrapper">
            <h2 class="hl-heading"><?php echo the_title(); ?><span></span></h2>

                <?php // echo get_the_content(); ?>

                    <?php
                    the_content();

                    // wp_link_pages(
                    //     array(
                    //         'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                    //         'after'    => '</nav>',
                    //         /* translators: %: Page number. */
                    //         'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                    //     )
                    // );
                    ?>
            
        </div>
</div>

<?php wp_footer(); ?>

