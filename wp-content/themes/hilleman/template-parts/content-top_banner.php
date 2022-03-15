<?php
$banner_title = get_post_meta( get_the_id(),'banner_title',true);

$banner_image_desk_top  =get_post_meta(get_the_id(),'banner_image_desk_top',true);
if(!empty( $banner_image_desk_top )):
    $desktop_bg_image    =wp_get_attachment_image_src($banner_image_desk_top['ID'],'full');
endif;
$banner_image_mobile  =get_post_meta(get_the_id(),'banner_image_mobile',true);
if(!empty( $banner_image_mobile )):
    $mobile_bg_image    =wp_get_attachment_image_src($banner_image_mobile['ID'],'full');
endif;
?>

<!-- Banner Strat -->
<div class="hl-banner hl-banner--inner">
    <div class="hl-banner__item">
        <div class="hl-banner__img-sec">
            
            <?php if(!empty($mobile_bg_image)): ?>
                <img src="<?php echo esc_url( $mobile_bg_image[0] ); ?>" alt="" class="hl-img only-mobile">
            <?php endif; ?>
            <?php if(!empty( $desktop_bg_image )): ?>
                <img src="<?php echo esc_url($desktop_bg_image[0]); ?>" alt="" class="hl-img mobile-hidden">
            <?php endif; ?>
            
        </div>

        <div class="content-wrapper hl-banner__inner">
            <div class="hl-banner__content">
                <?php if(!empty( $banner_title )): ?>
                    <h2 class="hl-banner__head hl-banner__head--adjust-text"><?php echo esc_html( $banner_title ); ?></h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->