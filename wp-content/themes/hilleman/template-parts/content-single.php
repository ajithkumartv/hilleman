<div class="hl-banner hl-banner--inner">
    <div class="hl-banner__item">
         <div class="hl-banner__img-sec">
            <?php if(!empty(get_the_post_thumbnail_url())): ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="hl-img mobile-hidden">
            <?php else: ?>
                <img src="<?php echo get_bloginfo( 'template_url' ); ?>/images/job-banner-desk.png" alt="" class="hl-img mobile-hidden">
            <?php endif; ?>

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
                }else
                {
                    echo '<img src="'.get_bloginfo( 'template_url' ).'/images/job-banner-mob.png" alt="" width="100%" class="only-mobile">';
                }
            ?>
            <!-- /Mobile banner Image -->
                        
        </div>

        <div class="content-wrapper hl-banner__inner">
            <div class="hl-banner__content">
                            </div>
        </div>
    </div>
</div>

<div class="hl-board-directors">
        <div class="content-wrapper">
                <h2 class="hl-heading"><?php echo the_title(); ?> </h2>

                <?php // echo get_the_content(); ?>

                <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
                
        </div>
</div>



