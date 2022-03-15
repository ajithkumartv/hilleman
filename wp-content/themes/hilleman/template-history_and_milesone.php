<?php
/*
* Template Name: History And Key Milestone
*/
?>


<?php get_header(); ?>
<?php
if ( is_active_sidebar( 'history_and_milesone' ) ) :

	dynamic_sidebar( 'history_and_milesone' );
endif;	
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content' );
	}



} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content', 'none' );

}
?>
<?php  get_footer(); ?>


