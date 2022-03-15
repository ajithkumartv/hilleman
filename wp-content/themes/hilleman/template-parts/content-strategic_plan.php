<?php
$title_part_1   =   get_post_meta( get_the_id(),'title_part_1',true);
$title_part_2   =   get_post_meta( get_the_id(),'title_part_2',true);
$description    =   get_post_meta( get_the_id(),'description',true);
?>

<div class="hl-strategic"> 
    <div class="content-wrapper">
        <div class="hl-strategic__sec">
            <?php if(!empty( $title_part_1 )): ?>
            <div class="hl-strategic__header"><?php echo esc_html($title_part_1); ?> <span><?php echo (!empty($title_part_2))?$title_part_2:''; ?></span>
            </div>
            <?php endif; ?>

            <!-- <div class="hl-strategic__body">
                <?php
                    if(!empty( $description )):
                        echo esc_html( $description );
                    endif;
                ?>
            </div> -->
<?php

    // $str = '<div style = "text-align:left;" class="ref"> Text </div>';
    // $newstr = preg_replace('/<div [^<]*?class="([^<]*?ref.*?)">(.*?)<\/div>/','<p class="$1">$2</p>',$str);
    // echo $newstr;

    if(!empty( $description )):
        $str    =  strip_tags( $description, '<p>' );

        $newstr = preg_replace('/<p>(.*?)<\/p>/','<div class="hl-strategic__body">$1</div>',$str);

        echo $newstr;

    endif;

?>
         </div>    
    </div>
</div>