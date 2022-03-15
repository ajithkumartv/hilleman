<?php
$title_part_1   =   get_post_meta( get_the_id(),'title_part_1',true);
$title_part_2   =   get_post_meta( get_the_id(),'title_part_2',true);
$description    =   get_post_meta( get_the_id(),'description',true);

$pod        =   pods( 'board_of_director', get_the_id() );
$related    =   $pod->field( 'bord_directors' );

// Start Data collectio and Sorting 
$member_array   =   [];
if ( ! empty( $related ) ) 
{   $i = 0;
    foreach ( $related as $rel ) 
    {  
        $id = $rel[ 'ID' ];         
        $member_image_rec    =  get_post_meta( $id,'member_image',true);
        if(!empty($member_image_rec)):
            $member_image    =  wp_get_attachment_image_src($member_image_rec['ID'],'full');
        else:
            $member_image[0] = get_bloginfo( 'template_directory' ).'/images/user-img.jpg';
        endif;

        $member_dp          =   $member_image[0];
        $member_name        =  get_post_meta( $id,'member_name',true);
        $member_position    =  get_post_meta( $id,'member_position',true);
        $member_description =  get_post_meta( $id,'member_description',true);
        $sort_priority      =   get_post_meta( $id,'sort_priority',true);
        $member_item        =   [
            'id'                =>  $id,
            'member_dp'         =>  $member_dp,
            'member_name'       =>  $member_name,
            'member_position'   =>  $member_position,
            'member_description'=>  $member_description,
            'sort_priority'     =>  $sort_priority,
        ];
        array_push($member_array, $member_item);
    }
}
function sortByOrder($a, $b): int{
    return $a['sort_priority'] > $b['sort_priority'];
}
usort($member_array, 'sortByOrder');

// End Data collectio and Sorting 
?>

<!-- Board of Directors Start -->
<div class="hl-board-directors">
        <div class="content-wrapper">
            <?php if( !empty( $title_part_1 ) ): ?>
                <h2 class="hl-heading"><?php echo esc_html($title_part_1); ?>
                    <?php if( !empty( $title_part_2 ) ): ?>
                        <span><?php echo esc_html( $title_part_2 ); ?></span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if(!empty( $description )): ?>
                <!-- <div class="hl-board-directors__desk"> -->
                    <?php echo str_replace('<p>','<p class="hl-board-directors__desk">', $description); ?>
                <!-- </div> -->
            <?php endif; ?>
            
            <div class="hl-board-directors__outer">
            
                <?php
                if ( ! empty( $related ) && !empty($member_array) ) 
                {
                    foreach ( $member_array as $rec ) 
                    { 
                        $id                 =   $rec['id'];
                        $member_image[0]    =   $rec['member_dp'];
                        $member_name        =   $rec['member_name'];
                        $member_position    =   $rec['member_position'];
                        $member_description =   $rec['member_description'];
                        ?>
                        <div class="hl-tile-director">
                            <div class="hl-tile-director__img-outer">
                                <?php if( !empty( $member_image[0] ) ): ?>
                                    <img src="<?php echo esc_url( $member_image[0] ); ?>" alt="image" class="hl-img">
                                <?php else: ?>
                                <!-- <img src="<?php echo get_bloginfo( 'template_directory' ).'/images/user-img.jpg';  ?>" alt="image" class="hl-img"> -->
                                <?php endif; ?>
                            </div>
                            <div class="hl-tile-director__cnt">
                                <?php if(!empty( $member_name )): ?>
                                    <div class="hl-tile-director__name"><?php echo esc_html( $member_name ); ?></div>
                                <?php endif; ?>
                                <?php if(!empty( $member_position )): ?>
                                    <p class="hl-tile-director__details"><?php echo esc_html( $member_position ); ?></p>
                                <?php endif; ?>
                                <a href="javascript: void(0);" title="View Profile" class="hl-btn" data-bs-toggle="modal" data-bs-target="#director-<?php echo $id; ?>">View Profile<svg viewBox="0 0 16 16" fill="none"
                                        xmlns="https://www.w3.org/2000/svg">
                                        <circle cx="8" cy="8" r="7" stroke="#259B97" />
                                        <path d="M6.5999 11.0801L9.3999 8.28008L6.5999 5.48008" stroke="#259B97" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Directors modal start -->
                        <div class="modal fade hl-director-modal" id="director-<?php echo $id; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="hl-director-modal__profile">
                                            <div class="hl-tile-director__img-outer">
                                                <?php if(!empty($member_image[0])): ?>
                                                    <img src="<?php echo esc_url( $member_image[0] ); ?>" alt="image" class="hl-img">
                                                <?php endif; ?>
                                            </div>
                                            <div class="hl-tile-director__cnt">
                                                <?php if(!empty( $member_name )): ?>
                                                    <div class="hl-tile-director__name"><?php echo esc_html( $member_name ); ?></div>
                                                <?php endif; ?>
                                                <?php if(!empty( $member_position )): ?>
                                                    <p class="hl-tile-director__details"><?php echo esc_html( $member_position ); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- <div class="hl-director-modal__desk"> -->
                                            <?php echo str_replace('<p>','<p class="hl-director-modal__desk">', $member_description ); ?>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Directors modal end -->
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    
    <!-- Board of Directors End -->