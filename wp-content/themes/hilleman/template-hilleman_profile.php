<?php
/*
* Template Name: Hilleman Profile
*/
?>


<?php get_header(); ?>
<?php
if ( is_active_sidebar( 'hilleman_profile' ) ) :
	dynamic_sidebar( 'hilleman_profile' );
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


