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
		'name'          => 'Strategic Plan',
		'id'            => 'strategic_plan_bar',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Our strategy',
		'id'            => 'our_strategy',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'History And Key Milesone',
		'id'            => 'history_and_milesone',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Hilleman Profile',
		'id'            => 'hilleman_profile',
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
		'name'          => 'Speakers',
		'id'            => 'speakers',
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
	
	register_sidebar( array(
		'name'          => 'Contact Us',
		'id'            => 'contact_us',
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
					'post_type' => [ 
						'masthead', 
						'slider_two_column',
						'footer_left_column',
						'board_of_director',
						'top_banner',
						'management_team',
						'speakers',
						'vission_and_mission',
						'strategic_plan',
						'history_and_milesone',
						'hilleman_profile',
						'contact_us',
					], 
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





class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		//$output .= "\n$indent<ul class=\"sub-menu\">\n";
  
		// Change sub-menu to dropdown menu
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
  
	function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{

		// Most of this code is copied from original Walker_Nav_Menu
		global $wp_query, $wpdb;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		//  $class_names = $value = '';
		//   $has_parent = $wpdb->get_var("SELECT COUNT(meta_id)
		// 							FROM wp_postmeta
		// 							WHERE meta_key='_menu_item_menu_item_parent'
		// 							AND meta_value !='0'
		// 							AND post_id='".$item->ID."'");
		//   $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
		// 						  FROM wp_postmeta
		// 						  WHERE meta_key='_menu_item_menu_item_parent'
		// 						  AND meta_value='".$item->ID."'");

		$output .= '';
		if( !empty( $item->title) ):

			$item_url =  (!empty($item->url))?$item->url:'#';

			$menu_children = $wpdb->get_results("SELECT post_id FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    

			$output .= '
			<li class="nav-item">
			<a href="'. esc_url( $item_url ) .'" class="nav-link">
				'. esc_html( strip_tags( $item->title ) );
				
			if( sizeof( $menu_children ) > 0 ):
				$output .= '<svg viewBox="0 0 10 7" fill="none" xmlns="https://www.w3.org/2000/svg">
				<path d="M1 1L5 5L9 1" stroke="white" stroke-width="2" />
				</svg>';
			endif;

			$output .= '</a> ';
		
			
				if( sizeof( $menu_children ) > 0 ):

				$output .= '<div class="hl-header__menu">
				<div class="content-wrapper">
					<div class="hl-header__menu-inner">';

					$locations = get_nav_menu_locations();
					$menuID =  $locations['main-menu'];
					$menu_all_items = 	wp_get_nav_menu_items( $menuID );

					foreach( $menu_children as $menu_item )
					{
						$sub_menu_head = $wpdb->get_results("SELECT `ID`,`post_title`,`guid`,`post_excerpt` FROM `wp_posts` WHERE `ID` = $menu_item->post_id ORDER BY `menu_order` DESC"  );

						foreach( $sub_menu_head as $sub_menu_item )
						{
							$first_level_title = '';
							$first_level_url = '#';
							foreach($menu_all_items as $menu_child_item)
							{
								if( $menu_child_item->ID == $sub_menu_item->ID):
									//	$output .= '<a href="'.$menu_child_item->url.'" title="'. $menu_child_item->attr_title .'" class="hl-header__sub-menu-link">'.	$menu_child_item->title .'</a>';
									$first_level_title = $menu_child_item->title;
									$first_level_url = $menu_child_item->url;
								endif;
							}

						$output .= '<div class="hl-header__menu-item">
							<div class="hl-header__menu-item-head">'.
							$sub_menu_item->post_excerpt;

							if(!empty($first_level_url) && ($first_level_url!='#')):
								$output .='<a href="'.esc_url($first_level_url).'" class="hl-header__menu-item-title">';
							else:
								$output .='<div class="hl-header__menu-item-title plain-text">';
							endif;

							$output .=esc_html(strip_tags($first_level_title))
								.'<span class="hl-header__menu-item-nav-icon"></span></div>';

							if(!empty($first_level_url) && ($first_level_url!='#')):
								$output .= '</a>';
							else:
								$output .= '</div>';
							endif;


						$output .= '<div class="hl-header__sub-menu">
								<button class="hl-header__back-btn">
									<svg viewBox="0 0 7 12" fill="none" xmlns="https://www.w3.org/2000/svg">
										<path d="M6 11L1 6L6 1" stroke="white"/>
										</svg>
										Back
								</button>';

								foreach($menu_all_items as $menu_child_item)
								{
									if( $menu_child_item->menu_item_parent == $sub_menu_item->ID):
										$output .= '<a href="'.$menu_child_item->url.'" title="'. $menu_child_item->attr_title .'" class="hl-header__sub-menu-link">'. esc_html(strip_tags(	$menu_child_item->title )) .'</a>';
									endif;
								}
							$output .= '</div>
						</div>';
						}
					}
					$output .= '</div>
				</div>
			</div>';
			endif;

			$output .= 
			'</li>
			';
		endif;
	}
  
}



function roots_nav_menu_args($args = '') 
{
	$args['container']  = false;
	$args['depth']      = 2;
	$args['items_wrap'] = '<ul class="nav">%3$s</ul>';
	if (!$args['walker']) {
		$args['walker'] = new Roots_Nav_Walker();
	}
	return $args;
}
?>