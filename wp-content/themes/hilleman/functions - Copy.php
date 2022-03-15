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


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		//$output .= "\n$indent<ul class=\"sub-menu\">\n";
  
		// Change sub-menu to dropdown menu
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
  
	function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	  // Most of this code is copied from original Walker_Nav_Menu
	  global $wp_query, $wpdb;
	  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  
	  $class_names = $value = '';

	  $has_parent = $wpdb->get_var("SELECT COUNT(meta_id)
								FROM wp_postmeta
								WHERE meta_key='_menu_item_menu_item_parent'
								AND meta_value !='0'
								AND post_id='".$item->ID."'");
  
	  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	  $classes[] = 'nav-item-' . $item->ID;

		if($has_parent > 0)
		{
			$args->add_li_class = '';
		}else
		{
			$args->add_li_class = 'nav-item';
		}
	  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	  $class_names = ' class="' . esc_attr( $class_names ) . '"';
  
	  $id = apply_filters( 'nav_menu_item_id', 'nav-item-'. $item->ID, $item, $args );
	  $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
  
	  $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
							  FROM wp_postmeta
							  WHERE meta_key='_menu_item_menu_item_parent'
							  AND meta_value='".$item->ID."'");

	


 
	  $output .= $indent . '<li' . $id . $value . $class_names .'>';
  
	  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	  $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  
	  
	  $class_attrib = 'nav-link';
	  // Check if menu item is in main menu
	  if ( $depth == 0 && $has_children > 0  ) {
		  // These lines adds your custom class and attribute
		  $class_attrib .= ' dropdown-toggle';
		  $attributes .= ' data-toggle="dropdown"';
	  }

	if($has_parent > 0)
	{
		$class_attrib = 'dropdown-item';
	}

	  $attributes .= ' class="'.$class_attrib.'"';

	  $item_output = $args->before;
	  $item_output .= '<a'. $attributes .'>';
	  $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
  
	  // Add the caret if menu level is 0
	  if ( $depth == 0 && $has_children > 0  ) {
		  $item_output .= ' <b class="caret"></b>';
	  }
  
	  $item_output .= '</a>';
	  $item_output .= $args->after;
  
	  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
  
  }

  if ( is_admin() ) {
	add_action( 'admin_menu', 'add_admin_menu' );
}

function add_admin_menu() {
	add_options_page(
		'hilleman Settings',
		'hilleman Settings',
		'manage_options',
		'options-hilleman-settings.php',
		'hilleman_settings_page'
	);
	add_action( 'admin_init', 'register_hilleman_settings' );
}

function register_hilleman_settings() {
	//register our settings
	register_setting( 'hilleman-settings-group', 'contact_text' );
	register_setting( 'hilleman-settings-group', 'contact_email' );
	register_setting( 'hilleman-settings-group', 'blog_text' );
	register_setting( 'hilleman-settings-group', 'faq_text' );
	register_setting( 'hilleman-settings-group', 'faq_search_not_fount' );
}

function hilleman_settings_page() {
?>
<div class="wrap">
<h1>hilleman Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'hilleman-settings-group' ); ?>
    <?php do_settings_sections( 'hilleman-settings-group' ); ?>
    <table class="form-table">
		<tr valign="top">
			<th colspan="2"><h2 class="title">Contact</h2></th>
		</tr>
        <tr valign="top">
        <th scope="row">Contact Text</th>
        <td><input type="text" name="contact_text" value="<?php echo esc_attr( get_option('contact_text') ); ?>" class="regular-text" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Contact Email</th>
        <td><input type="text" name="contact_email" value="<?php echo esc_attr( get_option('contact_email') ); ?>"  class="regular-text" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Blog Text</th>
        <td><input type="text" name="blog_text" value="<?php echo esc_attr( get_option('blog_text') ); ?>"  class="regular-text" /></td>
        </tr>

		<tr valign="top">
        <th scope="row">Faq Text</th>
        <td><input type="text" name="faq_text" value="<?php echo esc_attr( get_option('faq_text') ); ?>"  class="regular-text" /></td>
        </tr>

		<tr valign="top">
        <th scope="row">Faq Search Not Found Message</th>
        <td><input type="text" name="faq_search_not_fount" value="<?php echo esc_attr( get_option('faq_search_not_fount') ); ?>"  class="regular-text" /></td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>