<?php
$title_part_1           =   get_post_meta( get_the_id(),'title_part_1',true);
$title_part_2           =   get_post_meta( get_the_id(),'title_part_2',true);
$form_source_code       =   get_post_meta( get_the_id(),'form_source_code',true);
$form_source_code_tab_2 =   get_post_meta( get_the_id(),'form_source_code_tab_2',true);
$form_source_code_tab_3 =   get_post_meta( get_the_id(),'form_source_code_tab_3',true);

$address_1_title        =   get_post_meta( get_the_id(),'address_1_title',true);
$address_1              =   get_post_meta( get_the_id(),'address_1',true);
$address_2_title        =   get_post_meta( get_the_id(),'address_2_title',true);
$address_2              =   get_post_meta( get_the_id(),'address_2',true);
$contact_descripton     =   get_post_meta( get_the_id(),'contact_descripton',true);

$image                  =   get_post_meta( get_the_id(),'image',true);
if(!empty( $image )):
    $bg_image           =   wp_get_attachment_image_src($image['ID'],'full');
endif;
?>

 
 <!-- Contact-us Start -->
 <div class="hl-contactus">
        <div class="content-wrapper ">
            <?php if(!empty($title_part_1)): ?>
            <h2 class="hl-heading"><?php echo esc_html($title_part_1); ?> <span><?php echo esc_html( (!empty($title_part_2 ))?$title_part_2 :'' ); ?></span></h2>
            <?php endif; ?>
            <div class="hl-contactus__inner">

                <!-- <div class="hl-contactus__form-section">
                    <?php
                        // if(!empty( $form_source_code )):
                        //     echo $form_source_code;
                        // endif;
                    ?>
                    <ul class="nav nav-pills hl-contactus__tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-enquiry-tab" data-toggle="pill" href="#pills-enquiry" role="tab" aria-controls="pills-enquiry" aria-selected="true">General Enquiry </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-media-tab" data-toggle="pill" href="#pills-media" role="tab" aria-controls="pills-media" aria-selected="false">Media</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-careers-tab" data-toggle="pill" href="#pills-careers" role="tab" aria-controls="pills-careers" aria-selected="false">Careers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-enquiry" role="tabpanel" aria-labelledby="pills-enquiry-tab">
                            <?php
                                if(!empty( $form_source_code )):
                                    echo $form_source_code;
                                endif;
                            ?>
                        </div>
                        <div class="tab-pane fade" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">
                            <?php
                                if(!empty( $form_source_code_tab_2 )):
                                    echo $form_source_code_tab_2;
                                endif;
                            ?>
                        </div>
                        <div class="tab-pane fade" id="pills-careers" role="tabpanel" aria-labelledby="pills-careers-tab">
                            <?php
                                if(!empty( $form_source_code_tab_3 )):
                                    echo $form_source_code_tab_3;
                                endif;
                            ?>
                        </div>
                    </div>

                </div> -->
                <div class="hl-contactus__form-section">

                    <ul class="nav nav-tabs hl-contactus__tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="enquiry-tab" data-bs-toggle="tab" data-bs-target="#enquiry" type="button" role="tab" aria-controls="enquiry" aria-selected="true">General Enquiry</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="false">Media</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="careers-tab" data-bs-toggle="tab" data-bs-target="#careers" type="button" role="tab" aria-controls="careers" aria-selected="false">Careers</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="enquiry" role="tabpanel" aria-labelledby="enquiry-tab">
                            <?php
                                if(!empty( $form_source_code )):
                                    echo $form_source_code;
                                endif;
                            ?>
                        </div>
                        <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                            <?php
                                if(!empty( $form_source_code_tab_2 )):
                                    echo $form_source_code_tab_2;
                                endif;
                            ?>
                        </div>
                        <div class="tab-pane fade" id="careers" role="tabpanel" aria-labelledby="careers-tab">
                            <?php
                                if(!empty( $form_source_code_tab_3 )):
                                    echo $form_source_code_tab_3;
                                endif;
                            ?>
                        </div>
                    </div>


                </div>


                <div class="hl-contactus__details-section">
                    <!-- <div class="hl-contactus__continental-view">
                        <?php if(!empty( $bg_image )): ?>
                            <img src="<?php echo esc_html( $bg_image[0] ); ?>" alt="">
                        <?php endif; ?>                       
                    </div> -->
                    
                    <div class="hl-contactus__continental-view">
                        <?php echo do_shortcode( '[mappress mapid=1]' ); ?>
                    </div>

                    <div class="hl-contactus__details-box">
                        <div class="hl-contactus__detials-box-head">
                            <?php if(!empty( $address_1_title )){ echo esc_html( $address_1_title ); } ?>
                        </div>
                        <div>
                            <?php if(!empty( $address_1 )){ echo  $address_1 ; } ?>
                        </div>
                    </div>
                    <div class="hl-contactus__details-box">
                        <div class="hl-contactus__detials-box-head">
                        <?php if(!empty( $address_2_title )){ echo esc_html( $address_2_title ); } ?>
                        </div>
                        <div>
                        <?php if(!empty( $address_2 )){ echo  $address_2 ; } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hl-contactus__bottom-txt">
                <?php
                if(!empty($contact_descripton)):
                    echo $contact_descripton;
                endif;
                ?>
            </div>
            
            <!-- <p class="hl-contactus__bottom-txt">Journalists are invited to contact the Hilleman Laboratories media relations team for enquiries about the company, its innovations or news and announcements. <br> Please email <a href="mailto:communications@hilleman-labs.org" class="hl-contactus__link">communications@hilleman-labs.org</a>                with your request.</p>
         -->
        </div>
    </div>
    <!-- Contact-us End -->