<?php
$pod = pods( 'masthead', get_the_id() );
$related = $pod->field( 'masthead_items_field' );
?>

<div class="hl-banner hl-banner__slider">
    <?php
    if ( ! empty( $related ) ) 
    {
        foreach ( $related as $rel ) 
        { 
            $id = $rel[ 'ID' ];
            //get_post_meta( $id, 'slider_item_description', true );

            $mast_head_title = get_post_meta( $id,'mast_head_title',true);
            $mast_head_sub_title = get_post_meta( $id,'mast_head_sub_title',true);
            $read_more_text = get_post_meta( $id,'read_more_text',true);
            $read_more_url = get_post_meta( $id,'read_more_url',true);
            $clickable_banner = get_post_meta( $id,'clickable_banner',true);
//echo 'Clickable_banner - ' . $clickable_banner ;
            $masthead_background_desk_top  =get_post_meta($id,'masthead_background_desk_top',true);
            if(!empty( $masthead_background_desk_top)):
                $desktop_bg_image    =wp_get_attachment_image_src($masthead_background_desk_top['ID'],'full');
            endif;
            $masthead_background_mobile  =get_post_meta($id,'masthead_background_mobile',true);
            if(!empty($masthead_background_mobile)):
                $mobile_bg_image    =wp_get_attachment_image_src($masthead_background_mobile['ID'],'full');
            endif;
            ?>
           
            <div class="hl-banner__item"> 
                <?php if(!empty( $clickable_banner )): ?>
                    <a href="<?php echo  (!empty($read_more_url))? $read_more_url : '#'; ?>">
                <?php endif; ?>
                <div class="hl-banner__img-sec">
                    <?php if( !empty( $mobile_bg_image[0] ) ): ?>
                        <img src="<?php echo esc_url( $mobile_bg_image[0] ); ?>" alt="" class="hl-img only-mobile">
                    <?php endif; ?>
                    <?php if( !empty( $desktop_bg_image[0] ) ): ?>
                        <img src="<?php echo esc_url( $desktop_bg_image[0] ); ?>" alt="" class="hl-img mobile-hidden">
                    <?php endif; ?>
                </div>
                
                <div class="content-wrapper hl-banner__inner">
                    
                    <div class="hl-banner__content">
                        <h2 class="hl-banner__head">
                            <?php if( !empty( $mast_head_title) ): ?>
                                <span class="hl-banner__head-sub"><?php echo esc_html( $mast_head_title ); ?></span>
                            <?php endif; 
                                if(!empty($mast_head_sub_title)): 
                                    echo esc_html( $mast_head_sub_title );
                                endif;
                            ?>
                        </h2>
                        <?php if(empty( $clickable_banner )): ?>
                            <?php if(!empty( $read_more_text )): ?>
                                <a href="<?php echo  (!empty($read_more_url))? $read_more_url : '#'; ?>" title="Explore" class="hl-btn"><?php echo esc_html($read_more_text); ?><svg viewBox="0 0 27 28" fill="none" xmlns="https://www.w3.org/2000/svg">
                                <rect width="27" height="28" rx="13.5" fill="#259B97"/>
                                <path d="M14 20L20 14L14 8" stroke="white" stroke-width="2"/>
                                <path d="M7 14L20 14" stroke="white" stroke-width="2"/>
                                </svg></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <?php if(!empty( $clickable_banner )): ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <?php
        }
    }
    ?>

    <div class="hl-banner__nav-wrapper">
        <div class="content-wrapper">
            <!-- <div class="hl-banner__nav-outer">
                <div class="hl-banner__nav hl-banner__prev"><img src="<?php echo get_bloginfo( 'template_directory' );?>/images/arrow-left-white.svg" alt=""></div>
                <div class="hl-banner__nav hl-banner__next"><img src="<?php echo get_bloginfo( 'template_directory' );?>/images/arrow-right-white.svg" alt=""></div>
            </div> -->
        </div>
    </div>

</div>
<!-- Banner End -->
