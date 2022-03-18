<?php
/*
* Template Name: gallery
*/
?>


<?php get_header(); ?>

<?php
// if ( is_active_sidebar( 'strategic_plan_bar' ) ) :
// 	dynamic_sidebar( 'strategic_plan_bar' );
// endif;	
// if ( have_posts() ) {

// 	// Load posts loop.
// 	while ( have_posts() ) {
// 		the_post();
// 		get_template_part( 'template-parts/content' );
// 	}

// } else {
// 	get_template_part( 'template-parts/content/content', 'none' );

// }
?>


    <!-- Banner Strat -->
    <div class="hl-banner hl-banner--inner">
        <div class="hl-banner__item">
            <div class="hl-banner__img-sec">
                <img src="../wp-content/uploads/2021/10/job-banner-desk.png" alt="" width="100%" class="hl-img mobile-hidden">
                <img src="../wp-content/uploads/2021/10/job-banner-mob.png" alt="" width="100%" class="hl-img only-mobile">
            </div>


        </div>
    </div>
    <!-- Banner End -->
    <!-- Work with us Start -->

    <div class="hl-board-directors">
        <div class="content-wrapper">

            <h2 class="hl-heading">Highlights of the Hilleman Laboratories <span>Singapore Launch Event </span></h2>
            <?php echo do_shortcode( '[foogallery id="829"]' ); ?>

            <br/><br/><br/>
            <h2 class="hl-heading">Hilleman Vaccines & Biologics  <span>Symposium 2022</span></h2>
            <?php echo do_shortcode( '[foogallery id="839"]' ); ?>

        </div>
    </div>
    <!-- Work with us End -->


<?php  get_footer(); ?>


