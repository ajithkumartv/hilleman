<?php
/**
 * hilleman functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage hilleman
 * @since hilleman 1.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function theme_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form' ) );
	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
    /*** Register Menus */
    if (function_exists('register_nav_menus'))
    {
        register_nav_menus(
        array(
            'main-menu'         => __( 'Main Menu', 'site' ),
            'footer-menu'       => __( 'Footer Menu', 'site' ),
            )
        );
    }
}
add_action('after_setup_theme', 'theme_setup');



function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/* Add custom class to link in menu */
function _namespace_modify_menuclass($ulclass) {
	$current = [
		'/<a /',
	];
	$replace = [
		'<a class="nav-link" ',
	];
    return preg_replace($current, $replace, $ulclass);
}

// add_filter('wp_nav_menu', '_namespace_modify_menuclass');

add_filter( 'nav_menu_submenu_css_class', 'some_function', 10, 3 );
function some_function( $classes, $args, $depth ){
    foreach ( $classes as $key => $class ) {
    if ( $class == 'sub-menu' ) {
        $classes[ $key ] = 'dropdown-menu dropdown-menu-end';
    }
}

return $classes;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function hilleman_widgets_init() {

	// register_sidebar( array(
	// 	'name'          => 'FAQ left sidebar',
	// 	'id'            => 'faq_left_sidebar',
	// 	'before_widget' => '<div class="hilleman-fqa__nav hilleman-fqa__box nav">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<h2 class="rounded">',
	// 	'after_title'   => '</h2>',
	// ) );
	register_sidebar( array(
		'name'          => 'Home Content',
		'id'            => 'home_content_bar',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Board Of Directors',
		'id'            => 'board_of_directors',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Management Team',
		'id'            => 'management_team',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Content',
		'id'            => 'footer_left_column',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	// register_sidebar( array(
	// 	'name'          => 'Footer Center Column',
	// 	'id'            => 'footer_center_column',
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );
	// register_sidebar( array(
	// 	'name'          => 'Footer Right Column',
	// 	'id'            => 'footer_right_column',
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );
}
add_action( 'widgets_init', 'hilleman_widgets_init' );

// Creating the widget 
class post_content_widget extends WP_Widget {
  
	function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'post_content_widget', 
		  
		// Widget name will appear in UI
		__('Single Post Content', 'wpb_widget_domain'), 
		  
		// Widget description
		array( 'description' => __( 'Widget for displaying single post content', 'wpb_widget_domain' ), ) 
		);
	}
  
	// Creating widget front-end
	  
	public function widget( $args, $instance ) {
		$single_post_name = $instance['single_post_name'];	
		$post_type=get_post_type($single_post_name);
		global $post;
		$post=get_post($single_post_name);
		get_template_part( 'template-parts/content' ,$post_type ); 
	}
       
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'single_post_name' ] ) ) {
		$single_post_name = $instance[ 'single_post_name' ];
		}
		
		?>
		<p>
			<?php
			$custom_query = new WP_Query( 
				array(
					'post_type' => [ 'masthead', 'slider_two_column','footer_left_column','board_of_director','top_banner','management_team' ], 
					'work_type' => 'website_development', 
					'posts_per_page' => 100
				) 
			);
			?>
			<select id="<?php echo $this->get_field_id( 'single_post_name' ); ?>" name="<?php echo $this->get_field_name( 'single_post_name' ); ?>">
				<option>Select Post Type</option>
				<?php
				if ( $custom_query->have_posts() ) : 
					while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
					?>
					<option value="<?php echo get_the_id(); ?>" <?php echo esc_attr( ( $single_post_name == get_the_id() ) ? 'selected' : ''); ?>><?php the_title(); ?></option>
					<?php
					endwhile; 
				endif; 
				?>
			</select>
		</p>
		<?php 
	}
      
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['single_post_name'] = $new_instance['single_post_name'] ?? '';
		return $instance;
	}
 
// Class wpb_widget ends here
} 
 
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'post_content_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Enable logo upload in customization section
function config_custom_logo() { 
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme' , 'config_custom_logo' );





/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );





?>