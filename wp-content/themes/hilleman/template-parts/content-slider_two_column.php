<?php

$title_right_column_slider = get_post_meta(get_the_id(),'title_right_column_slider',true);
$sub_title_right_column_slider = get_post_meta(get_the_id(),'sub_title_right_column_slider',true);
$image_right_column_slider = get_post_meta(get_the_id(),'image_right_column_slider',true);
$readmore_text  = get_post_meta(get_the_id(),'readmore_text',true);
$read_more_url  = get_post_meta(get_the_id(),'read_more_url',true);
$title_part_1  = get_post_meta(get_the_id(),'title_part_1',true);
$title_part_2  = get_post_meta(get_the_id(),'title_part_2',true);

$pod = pods( 'slider_two_column', get_the_id() );
$related = $pod->field( 'items' );

?>
<!-- Our Capabilities Start -->
<div class="hl-Capabilities">
        <div class="content-wrapper">
            <?php if(!empty( $title_part_1 )): ?>
            <h2 class="hl-heading"><?php echo esc_html($title_part_1); ?> <span><?php echo esc_html($title_part_2); ?></span></h2>
            <?php endif; ?>
            <div class="hl-Capabilities__outer">
                <div class="hl-Capabilities__slider">

                <?php

                if ( ! empty( $related ) ) {
                    foreach ( $related as $rel ) { 
                        $id = $rel[ 'ID' ];
                        $desctription   =   get_post_meta( $id, 'slider_item_description', true );
                        $slide_readmore_text  =   get_post_meta( $id, 'slider_item_read_more_text', true );
                        $dlide_readmore_url   =   get_post_meta( $id, 'slider_item_read_more_url', true );
                        
                        $slider_item_image  =   get_post_meta($id,'slider_item_image',true);
                        if(!empty($slider_item_image)):
                            $mobile_bg_image    =   wp_get_attachment_image_src($slider_item_image['ID'],'full');
                        endif;
                        ?>
                            <div class="hl-tile-h">
                                <div class="hl-tile-h__img">
                                    <?php if(!empty( $mobile_bg_image )): ?>
                                        <img src="<?php echo esc_url( $mobile_bg_image[0] ); ?>" alt="image" class="hl-img">
                                    <?php endif; ?>
                                </div>
                                <div class="hl-tile-h__cnt">
                                    <?php if(!empty($desctription)): ?>
                                        <p class="hl-tile-h__cnt-desk">
                                            <?php echo esc_html( strip_tags($desctription) ); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if(!empty($slide_readmore_text)): ?>
                                        <a href="<?php echo esc_url($dlide_readmore_url); ?>" title="Read More" class="hl-btn"><?php echo esc_html($slide_readmore_text); ?>
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="https://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="7" stroke="#259B97"/>
                                            <path d="M6.5999 11.0801L9.3999 8.28008L6.5999 5.48008" stroke="#259B97"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php
                    } 
                } 
                ?>
                </div>

                <div class="hl-tile-with-bg">
                    <div class="hl-tile-with-bg__head"><?php echo esc_html((!empty($title_right_column_slider))?$title_right_column_slider:''); ?><br /><span><?php echo esc_html( (!empty($sub_title_right_column_slider))?$sub_title_right_column_slider:'' ); ?></span></div>
                    <img src="<?php echo get_bloginfo( 'template_directory' );?>/images/flower-bg.png" alt="image" class="hl-tile-with-bg__img">
                    <?php if(!empty($readmore_text)): ?>
                        <a href="<?php echo esc_url( (!empty($read_more_url))? $read_more_url : '' ); ?>" title="Read More" class="hl-btn hl-btn--green">
                            <?php echo esc_html($readmore_text); ?>
                            <svg viewBox="0 0 16 16" fill="none" xmlns="https://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7" stroke="#259B97"/>
                            <path d="M6.5999 11.0801L9.3999 8.28008L6.5999 5.48008" stroke="#259B97"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Capabilities End -->