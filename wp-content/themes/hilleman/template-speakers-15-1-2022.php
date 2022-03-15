<?php
/*
* Template Name: Speakers
*/
?>
<?php get_header(); ?>


 <!-- strategy-start -->
 <div class="">
        <!-- Banner Strat -->
        <div class="hl-banner hl-banner--inner">
            <div class="hl-banner__item">
                <div class="hl-banner__img-sec">
                    <img src="../wp-content/themes/hilleman/images/Hilleman-vaccine-banner-mob.jpg" alt="" class="hl-img only-mobile">
                    <img src="../wp-content/themes/hilleman/images/Hilleman-vaccine-banner.jpg" alt="" class="hl-img mobile-hidden">
                </div>
            </div>
        </div>
        <!-- Banner End -->
        <!-- vaccine development Start -->
        <div class="hl-vaccine-deve">
            <div class="content-wrapper">
                <h2 class="hl-heading">Hilleman Laboratories: Breaking New Ground in Vaccine Development</h2>
                <p class="hl-vaccine-deve__desk">In 2021, Hilleman Laboratories embarked on a globalization strategy, establishing its new headquarters in Singapore. To commemorate this milestone, Hilleman Laboratories is organising a two-day summit in Singapore, with a series of events
                    taking place over 22 & 23 February 2022. The meeting on 23 February will bring together global leaders in public health, government officials, renowned scientists and industry experts in vaccine and biologics development to discuss
                    significant issues and trending topics in this field.</p>
                <div class="hl-vaccine-deve__img-outer"><img src="../wp-content/themes/hilleman/images/HLScSym2022_ceremony.jpg" class="hl-vaccine-deve__img"></div>
                <div class="hl-vaccine-deve__btn-outer">
                    <!-- <a href="#" class="hl-vaccine-deve__btn hl-vaccine-deve__btn--mar" title="download agenda">download agenda</a>
                <a href="#" class="hl-vaccine-deve__btn hl-vaccine-deve__btn--mar" title="register for your virtual pass now!">register for your virtual pass now!</a> -->
                    <a href="#" title="download agenda" class="hl-btn hl-btn--bg hl-vaccine-deve__btn--mar">download agenda</a>
                    <a href="#" title="register for your virtual pass now!" class="hl-btn hl-btn--bg hl-vaccine-deve__btn--mar">register for your virtual pass now!</a>
                </div>

            </div>
        </div>

        <!-- vaccine development End -->
    </div>
    <!-- strategy-end -->





		<?php
		if ( is_active_sidebar( 'speakers' ) ) :
			dynamic_sidebar( 'speakers' );
		endif;	

		
		?>



	


<?php  get_footer(); ?>


