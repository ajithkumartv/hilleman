<?php

$left_column_title_part_1 = get_post_meta( get_the_id(),'left_column_title_part_1',true);
$left_column_title_part_2 = get_post_meta( get_the_id(),'left_column_title_part_2',true);
$vission_title = get_post_meta( get_the_id(),'vission_title',true);
$vission_description = get_post_meta( get_the_id(),'vission_description',true);

$vission_image_row  =   get_post_meta(get_the_id(),'vission_image',true);
if(!empty( $vission_image_row )):
    $vission_image  = wp_get_attachment_image_src($vission_image_row['ID'],'full');
endif;

$mission_title = get_post_meta( get_the_id(),'mission_title',true);
$mission_description = get_post_meta( get_the_id(),'mission_description',true);
$mission_image_row  =   get_post_meta(get_the_id(),'mission_image',true);
if(!empty( $mission_image_row )):
    $mission_image  = wp_get_attachment_image_src($mission_image_row['ID'],'full');
endif;

$right_column_title_part_1 = get_post_meta( get_the_id(),'right_column_title_part_1',true);
$right_column_title_part_2 = get_post_meta( get_the_id(),'right_column_title_part_2',true);


$item_1_title    = get_post_meta( get_the_id(),'item_1_title',true);
$item_1_description  = get_post_meta( get_the_id(),'item_1_description',true);
$item_1_icon_row  =   get_post_meta(get_the_id(),'item_1_icon',true);
if(!empty( $item_1_icon_row )):
    $item_1_icon  = wp_get_attachment_image_src($item_1_icon_row['ID'],'full');
endif;

$item_2_title    = get_post_meta( get_the_id(),'item_2_title',true);
$item_2_description  = get_post_meta( get_the_id(),'item_2_description',true);
$item_2_icon_row  =   get_post_meta(get_the_id(),'item_2_icon',true);
if(!empty( $item_2_icon_row )):
    $item_2_icon  = wp_get_attachment_image_src($item_2_icon_row['ID'],'full');
endif;

$item_3_title    = get_post_meta( get_the_id(),'item_3_title',true);
$item_3_description  = get_post_meta( get_the_id(),'item_3_description',true);
$item_3_icon_row  =   get_post_meta(get_the_id(),'item_3_icon',true);
if(!empty( $item_3_icon_row )):
    $item_3_icon  = wp_get_attachment_image_src($item_3_icon_row['ID'],'full');
endif;

$item_4_title    = get_post_meta( get_the_id(),'item_4_title',true);
$item_4_description  = get_post_meta( get_the_id(),'item_4_description',true);
$item_4_icon_row  =   get_post_meta(get_the_id(),'item_4_icon',true);
if(!empty( $item_4_icon_row )):
    $item_4_icon  = wp_get_attachment_image_src($item_4_icon_row['ID'],'full');
endif;

$item_5_title    = get_post_meta( get_the_id(),'item_5_title',true);
$item_5_description  = get_post_meta( get_the_id(),'item_5_description',true);
$item_5_icon_row  =   get_post_meta(get_the_id(),'item_5_icon',true);
if(!empty( $item_5_icon_row )):
    $item_5_icon  = wp_get_attachment_image_src($item_5_icon_row['ID'],'full');
endif;

$item_6_title    = get_post_meta( get_the_id(),'item_6_title',true);
$item_6_description  = get_post_meta( get_the_id(),'item_6_description',true);
$item_6_icon_row  =   get_post_meta(get_the_id(),'item_6_icon',true);
if(!empty( $item_6_icon_row )):
    $item_6_icon  = wp_get_attachment_image_src($item_6_icon_row['ID'],'full');
endif;


?>


<!-- Vision and mission Start -->
<div class="hl-box-sec content-wrapper">
        <div class="hl-box-sec__wrap">
            <?php if(!empty($left_column_title_part_1 ) ): ?>
            <div class="hl-heading"><?php echo esc_html($left_column_title_part_1); ?> <span><?php echo (!empty($left_column_title_part_2))?$left_column_title_part_2:''; ?></span></div>
            <?php endif; ?>
            <div class="hl-box-sec__wrap-sec">
                <?php if(!empty($vission_image[0])): ?>
                <div class="hl-box-sec__image" style="background-image: url(<?php echo esc_url( $vission_image[0] ); ?>);"></div>                    
                <?php endif; ?>
                <div class="hl-box-sec__cnt">
                    <?php if(!empty($vission_title)): ?>
                    <div class="hl-tile-h__cnt-head"><?php echo esc_html($vission_title); ?></div>
                    <?php endif; ?>
                    <p class="hl-tile-h__cnt-desk">
                        <?php 
                        if(!empty($vission_description)):
                            echo esc_html(strip_tags( $vission_description )); 
                        endif;
                        ?>
                    </p>
                </div>
            </div>
            <div class="hl-box-sec__wrap-sec hl-box-sec__wrap-sec--rev">
                <?php if(!empty( $mission_image[0] )): ?>
                <div class="hl-box-sec__image" style="background-image: url(<?php echo esc_url( $mission_image[0] ); ?>);"></div>                    
                <?php endif; ?>
                <div class="hl-box-sec__cnt">
                    <?php if(!empty($mission_title)): ?>
                    <div class="hl-tile-h__cnt-head"><?php echo esc_html($mission_title); ?></div>
                    <?php endif; ?>
                    <p class="hl-tile-h__cnt-desk">
                        <?php 
                        if(!empty( $mission_description )):
                            echo esc_html( strip_tags( $mission_description ) ) ;
                        endif;
                        ?>    
                    </p>
                </div>
            </div>
            
        </div>
        <div class="hl-box-sec__wrap">
            <?php if(!empty($right_column_title_part_2)): ?>
            <div class="hl-heading"><?php echo esc_html( $right_column_title_part_1 ); ?> <span><?php echo (!empty($right_column_title_part_2))?$right_column_title_part_2:''; ?></span></div>
            <?php endif; ?>
            <div class="hl-box-sec__circle-wrapper">
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty($item_1_icon[0])): ?>
                        <img src="<?php echo esc_url($item_1_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                        <?php 
                            if(!empty( $item_1_title )):
                                echo esc_html( $item_1_title ); 
                            endif;
                        ?>
                        </div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_1_description)):
                                echo esc_html( strip_tags($item_1_description) ); 
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty($item_2_icon[0])): ?>    
                        <img src="<?php echo esc_url($item_2_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                            <?php 
                            if(!empty($item_2_title)):
                                echo esc_html( $item_2_title );
                            endif;
                            ?>
                        </div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_2_description)):
                                echo esc_html( strip_tags($item_2_description) );
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty($item_3_icon[0])): ?>
                        <img src="<?php echo esc_url($item_3_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                            <?php 
                            if(!empty($item_3_title)):
                                echo esc_html( $item_3_title ); 
                            endif;
                            ?></div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_3_description)):
                                echo esc_html( strip_tags($item_3_description) );
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty($item_4_icon[0])): ?>
                        <img src="<?php echo esc_url($item_4_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                            <?php 
                            if(!empty($item_4_title)):
                                echo esc_html( $item_4_title ); 
                            endif;
                            ?>
                        </div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_4_description)):
                                echo esc_html( strip_tags($item_4_description) );
                            endif; 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty($item_5_icon[0])): ?>
                        <img src="<?php echo esc_url($item_5_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                            <?php 
                            if(!empty($item_5_title)):
                                echo esc_html( $item_5_title );
                            endif;
                            ?>
                        </div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_5_description)):
                                echo esc_html( strip_tags($item_5_description) );
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($item_6_title)): ?>
                <div class="hl-box-sec__circle-tile">
                    <div class="hl-box-sec__circle">
                        <?php if(!empty( $item_6_icon[0] )): ?>
                        <img src="<?php echo esc_url($item_6_icon[0]); ?>" class="hl-box-sec__circle-icon">
                        <?php endif; ?>
                    </div>
                    <div class="hl-box-sec__circle-cont">
                        <div class="hl-box-sec__circle-head">
                            <?php 
                            if(!empty( $item_6_title )):
                                echo esc_html( $item_6_title ); 
                            endif;
                            ?>
                        </div>
                        <div class="hl-box-sec__circle-body">
                            <?php 
                            if(!empty($item_6_description)):
                                echo esc_html( strip_tags($item_6_description) );
                            endif;
                            ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Vision and mission end -->