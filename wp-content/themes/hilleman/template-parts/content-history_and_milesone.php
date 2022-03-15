<?php
$align_image_to_right   =   get_post_meta( get_the_id(),'align_image_to_right',true);
$history_title          =   get_post_meta( get_the_id(),'history_title',true);
$history_description    =   get_post_meta( get_the_id(),'history_description',true);
$title_part_1          =   get_post_meta( get_the_id(),'title_part_1',true);
$title_part_2          =   get_post_meta( get_the_id(),'title_part_2',true);

$history_images          =   get_post_meta( get_the_id(),'history_image',true);
if(!empty( $history_images)):
    $history_image    =wp_get_attachment_image_src($history_images['ID'],'full');
endif;
?>

<div class="content-wrapper">
    <div class="hl-history-key__wrapper">

        <?php if(!empty($title_part_1)): ?>
            <div class="hl-history-key__header"><?php echo esc_html($title_part_1); ?> <span><?php echo esc_html((!empty($title_part_2)?$title_part_2:'')); ?></span></div>
        <?php endif; ?>

        <?php
        if($align_image_to_right):
        ?>
            <!-- Image Right align -->
            <div class="hl-history-key__content-wrap-outer">
                <div class="hl-history-key__content-wrap1">
                    <?php if(!empty($history_title)): ?>
                        <div class="hl-history-key__body-head"><?php echo esc_html($history_title); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($history_description)): ?>
                        <div class="hl-history-key__body-cont"><?php echo esc_html(strip_tags($history_description)); ?></div>
                    <?php endif; ?>
                </div>
                <div class="hl-history-key__content-wrap2">
                    <?php if(!empty($history_image)): ?>
                        <img src="<?php echo esc_url($history_image[0]); ?>" class="hl-history-key__body-img">
                    <?php endif; ?>
                </div>
            </div>

        <?php
        else:
        ?>
            <!-- Image Left align -->
            <div class="hl-history-key__content-wrap-outer hl-history-key__content-wrap-outer--rev">
                <div class="hl-history-key__content-wrap1">
                    <?php if(!empty($history_title)): ?>
                        <div class="hl-history-key__body-head"><?php echo esc_html($history_title); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($history_description)): ?>
                        <div class="hl-history-key__body-cont"><?php echo esc_html(strip_tags($history_description)); ?></div>
                    <?php endif; ?>
                </div>
                <div class="hl-history-key__content-wrap2">
                    <?php if(!empty($history_image)): ?>
                        <img src="<?php echo esc_url($history_image[0]); ?>" class="hl-history-key__body-img">
                    <?php endif; ?>
                </div>
            </div>

        <?php
        endif;
        ?>
        </div>
    </div>
</div>