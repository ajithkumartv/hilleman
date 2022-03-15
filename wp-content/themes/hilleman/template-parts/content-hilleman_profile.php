<?php
$title_part_1          =   get_post_meta( get_the_id(),'title_part_1',true);
$title_part_2          =   get_post_meta( get_the_id(),'title_part_2',true);

$profile_1_images           =   get_post_meta( get_the_id(),'profile_1_image',true);
if(!empty( $profile_1_images)):
    $profile_1_image    =wp_get_attachment_image_src($profile_1_images['ID'],'full');
endif;
$profile_1_title            =   get_post_meta( get_the_id(),'profile_1_title',true);
$profile_1_description      =   get_post_meta( get_the_id(),'profile_1_description',true);
$profile_1_quotes           =   get_post_meta( get_the_id(),'profile_1_quotes',true);

$profile_2_images           =   get_post_meta( get_the_id(),'profile_2_image',true);
if(!empty( $profile_2_images)):
    $profile_2_image    = wp_get_attachment_image_src($profile_2_images['ID'],'full');
endif;
$profile_2_title            =   get_post_meta( get_the_id(),'profile_2_title',true);
$profile_2_description      =   get_post_meta( get_the_id(),'profile_2_description',true);
$profile_2_quotes           =   get_post_meta( get_the_id(),'profile_2_quotes',true);

$paragraph_1           =   get_post_meta( get_the_id(),'paragraph_1',true);
$paragraph_2           =   get_post_meta( get_the_id(),'paragraph_2',true);

$vaccine_1           =   get_post_meta( get_the_id(),'vaccine_1',true);
$vaccine_1_url           =   get_post_meta( get_the_id(),'vaccine_1_url',true);
$vaccine_2           =   get_post_meta( get_the_id(),'vaccine_2',true);
$vaccine_2_url           =   get_post_meta( get_the_id(),'vaccine_2_url',true);
$vaccine_3           =   get_post_meta( get_the_id(),'vaccine_3',true);
$vaccine_3_url           =   get_post_meta( get_the_id(),'vaccine_3_url',true);
$vaccine_4           =   get_post_meta( get_the_id(),'vaccine_4',true);
$vaccine_4_url           =   get_post_meta( get_the_id(),'vaccine_4_url',true);
$vaccine_5           =   get_post_meta( get_the_id(),'vaccine_5',true);
$vaccine_5_url           =   get_post_meta( get_the_id(),'vaccine_5_url',true);
$vaccine_6           =   get_post_meta( get_the_id(),'vaccine_6',true);
$vaccine_6_url           =   get_post_meta( get_the_id(),'vaccine_6_url',true);
$vaccine_7           =   get_post_meta( get_the_id(),'vaccine_7',true);
$vaccine_7_url           =   get_post_meta( get_the_id(),'vaccine_7_url',true);
$vaccine_8           =   get_post_meta( get_the_id(),'vaccine_8',true);
$vaccine_8_url           =   get_post_meta( get_the_id(),'vaccine_8_url',true);

?>

<!-- Dr. Maurice Hilleman Start -->
<div class="hl-dr-sec">
 
        <div class="content-wrapper">
            <div class="hl-pro-disc-tile">
                            <div class="hl-pro-disc-tile__wrapper">
                        <div class="hl-pro-disc-tile__profile-wrapper">
                            <div class="hl-pro-disc-tile__profile-img-sec">
                                <?php if(!empty($profile_1_image)): ?>
                                    <img src="<?php echo esc_url($profile_1_image[0]); ?>" class="hl-pro-disc-tile__profile-img">
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($profile_1_title)): ?>
                                <div class="hl-pro-disc-tile__profile-heading"><?php echo esc_html($profile_1_title); ?></div>
                            <?php endif; ?>
                            <?php if(!empty($profile_1_description )): ?>
                                <div class="hl-pro-disc-tile__profile-body"><?php echo esc_html( strip_tags($profile_1_description) ); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="hl-pro-disc-tile__pro-cont-wrapper">
                            <?php if(!empty($profile_1_quotes)): ?>
                                <div class="hl-pro-disc-tile__pro-cont-sec"><?php echo esc_html(strip_tags($profile_1_quotes)); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="hl-dr-sec__green-line">&nbsp;</div>   
                    <div class="hl-pro-disc-tile__wrapper hl-pro-disc-tile__wrapper--rev">
                        <div class="hl-pro-disc-tile__profile-wrapper hl-pro-disc-tile__profile-wrapper--rightside">
                            <div class="hl-pro-disc-tile__profile-img-sec">
                                <?php if(!empty($profile_2_image)): ?>
                                    <img src="<?php echo esc_url($profile_2_image[0]); ?>" class="hl-pro-disc-tile__profile-img">
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($profile_2_title)): ?>
                            <div class="hl-pro-disc-tile__profile-heading"><?php echo esc_html($profile_2_title); ?></div>
                            <?php endif; ?>
                            <?php if(!empty($profile_1_description)): ?>
                            <div class="hl-pro-disc-tile__profile-body hl-pro-disc-tile__profile-body--right"><?php echo esc_html( strip_tags($profile_2_description) ); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="hl-pro-disc-tile__pro-cont-wrapper">
                        <?php if(!empty($profile_2_quotes)): ?>
                            <div class="hl-pro-disc-tile__pro-cont-sec"><?php echo esc_html(strip_tags($profile_2_quotes)); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Profile disc ends -->
        <div class="hl-dr-sec__footer-wrap">
            <div class="content-wrapper">
            <div class="hl-dr-sec__footer-text">
                <?php // echo esc_html(strip_tags($paragraph_1)); 
                
                    if(!empty( $paragraph_1 )):
                        $str    =  strip_tags( $paragraph_1, '<p>' );
                
                        $newstr = preg_replace('/<p>(.*?)<\/p>/','<div class="hl-dr-sec__footer-text">$1</div>',$str);
                
                        echo $newstr;
                
                    endif;
                
                ?>
                
            </div>
            <div class="hl-dr-sec__footer-pipe">
                <a href="<?php echo esc_html( $vaccine_1_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_1 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_2_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_2 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_3_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_3 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_4_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_4 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_5_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_5 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_6_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_6 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_7_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_7 ); ?></a>
                <a href="<?php echo esc_html( $vaccine_8_url ); ?>" class="hl-dr-sec__footer-pipe-tag"><?php echo esc_html( $vaccine_8 ); ?></a>
            </div>
            <div class="hl-dr-sec__footer-text">
                <?php // echo esc_html(strip_tags($paragraph_2)); 

                if(!empty( $paragraph_2 )):
                    $str    =  strip_tags( $paragraph_2, '<p>' );
            
                    $newstr = preg_replace('/<p>(.*?)<\/p>/','<div class="hl-dr-sec__footer-text">$1</div>',$str);
            
                    echo $newstr;
            
                endif;
                
                ?>
            </div>
            <div class="hl-dr-sec__footer-text"></div>
        </div>
    </div>

    </div>
    <!-- Dr. Maurice Hilleman ends -->