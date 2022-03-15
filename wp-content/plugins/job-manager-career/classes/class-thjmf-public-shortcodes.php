<?php
/**
 * The file that defines the plugin public functionalities
 *
 * @link       https://themehigh.com
 * @since      1.0.0
 *
 * @package    job-manager-career
 * @subpackage job-manager-career/includes
 */
if(!defined('WPINC')){	die; }

if(!class_exists('THJMF_Public_Shortcodes')):

	class THJMF_Public_Shortcodes extends THJMF_Public{
		private $special_theme = false;
		public function __construct() {
			add_action( 'wp', array( $this, 'prepare_reset_actions') );
			$this->define_variables();
		}

		private function define_variables(){
			$themes = array(
				"Twenty Twenty",
				"Twenty Twenty-One",
				"Twenty Nineteen",
				"Twenty Fifteen"
			);

			$themes = apply_filters( "thjmf_filter_theme_compatibility", $themes );
			$active_theme = get_option( 'current_theme' );

			if( in_array( $active_theme, $themes ) ){
				$this->special_theme = true;
			}
		}

		private function is_filter_enabled( $args ){
			if( $args['enable_location'] || $args['enable_category'] || $args['enable_type'] ){
				return true;
			}
			return false;
		}

		public function shortcode_thjmf_job_listing($atts){
			if( isset( $_POST['thjmf_job_filter'] ) || isset( $_POST['thjmf_filter_load_more'] ) ){
				$this->thjmf_jobs_filter_event(true);
				return;
			}
			ob_start();
			$this->output_jobs( $atts );
			return ob_get_clean();
		}

		public function output_jobs( $atts ){
			global $wp_query,$post;
			$load_more_args = [];
			$settings = THJMF_Utils::get_default_settings();
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			if( isset( $_POST["thjmf_job_paged"] ) ){
				$paged =  absint( $_POST["thjmf_job_paged"] ) + 1;
			}
			$query_args = $this->get_query_arguments( $settings, $paged );
			$filter_args = $this->get_filter_arguments( $settings );
			
			$per_page = get_option( 'posts_per_page' );
			$theme_class = $this->add_theme_compatibiltiy_class();
			get_thjmf_template( 'job-listing-header.php' );
			if ( $this->is_filter_enabled( $filter_args) ) {
				?>
				<form id="thjmf_job_filter_form" name="thjmf_job_filter_form" method="POST" class="<?php echo $theme_class; ?>">
					<?php 
						if ( function_exists('wp_nonce_field') ){
							wp_nonce_field( 'thjmf_filter_jobs', 'thjmf_filter_jobs_nonce' ); 
						}
						get_thjmf_template( 'job-filters.php', $filter_args ); 
					?>
				</form>
				<?php
			}
			echo '<form name="thjmf_load_more_post" method="POST">';
			echo '<input type="hidden" name="thjmf_job_paged" value="'.$paged.'">';
			if ( function_exists('wp_nonce_field') ){
				wp_nonce_field( 'thjmf_load_more_jobs', 'thjmf_load_more_jobs_nonce' ); 
			}
			$jobs = get_thjmf_job_listings( $query_args );
			$load_more_args['thjmf_max_page'] = $this->max_num_pages($per_page, $jobs->found_posts);
			if( $jobs->found_posts ){
				while( $jobs->have_posts() ) {
					$jobs->the_post();
					$listing_args = $this->get_job_meta_tags( $settings );
					$listing_args['layout_class'] = '';
					if( $this->special_theme && apply_filters('thjmf_theme_layout_override', true) ){
						$listing_args['layout_class'] = "thjmf-plugin-layout";
					}
					get_thjmf_template( 'content-job-listing.php', $listing_args );
				}
				wp_reset_postdata(); 
				$this->render_load_more_pagination( $load_more_args, $paged );
			}else{
				get_thjmf_template_part( 'content', 'no-jobs' );
			}

			echo '</form>';
			
			get_thjmf_template( 'job-listing-footer.php' );
		}

		private function get_filter_arguments( $settings ){
			$args = [];
			if( isset( $settings['search_and_filt'] ) && $settings['search_and_filt'] ){
				$filters = $settings['search_and_filt'];
				$args['enable_location'] 	= isset( $filters['search_location'] ) ? $filters['search_location'] : false;
				$args['enable_type'] 		= isset( $filters['search_type'] ) ? $filters['search_type'] : false;
				$args['enable_category'] 	= isset( $filters['search_category'] ) ? $filters['search_category'] : false;
			}

			$args['job_category'] = isset( $_POST['thjmf_filter_category'] ) && !empty( $_POST['thjmf_filter_category'] ) ? sanitize_key($_POST['thjmf_filter_category']) : false;

			$args['job_location'] = isset( $_POST['thjmf_filter_location'] ) && !empty( $_POST['thjmf_filter_location'] ) ? sanitize_key($_POST['thjmf_filter_location']) : false;

			$args['job_type'] = isset( $_POST['thjmf_filter_type'] ) && !empty( $_POST['thjmf_filter_type'] ) ? sanitize_key($_POST['thjmf_filter_type']) : false;

			$args['categories'] = $this->get_taxonomy_terms('category');
			$args['locations'] 	= $this->get_taxonomy_terms('location');
			$args['types'] 		= $this->get_taxonomy_terms('job_type');
			$args['atts'] = $args;
			return $args;
		}

		private function add_theme_compatibiltiy_class(){
			$class = "";
			if( $this->special_theme ){
				$class = "thjmf-filter-columns";
			}
			return $class;
		}

		public function thjmf_jobs_filter_event( $filter_load_more = false){
			$per_page = get_option( 'posts_per_page' );
			$settings = THJMF_Utils::get_default_settings();
			$settings = THJMF_Utils::get_default_settings();
			$q_args = [];

			$q_args['hide_expired'] = isset( $settings['job_detail']['job_hide_expired'] ) ? $settings['job_detail']['job_hide_expired'] : false;
			$q_args['hide_filled'] = isset( $settings['job_detail']['job_hide_filled'] ) ? $settings['job_detail']['job_hide_filled'] : false;
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
			$category = isset( $_POST['thjmf_filter_category'] ) && !empty( $_POST['thjmf_filter_category'] ) ? sanitize_key($_POST['thjmf_filter_category']) : false;
			$location = isset( $_POST['thjmf_filter_location'] ) && !empty( $_POST['thjmf_filter_location'] ) ? sanitize_key($_POST['thjmf_filter_location']) : false;
			$type = isset( $_POST['thjmf_filter_type'] ) && !empty( $_POST['thjmf_filter_type'] ) ? sanitize_key($_POST['thjmf_filter_type']) : false;

			if($category){
				$q_args['category'] = $category;
			}
			if($location){
				$q_args['location'] = $location;
			}
			if($type){
				$q_args['type'] = $type;
			}

			if( isset( $_POST["thjmf_job_paged"] ) ){
				$paged =  absint( $_POST["thjmf_job_paged"] ) + 1;
			}

			$q_args['posts_per_page'] = (int) $per_page*$paged;
			$filter_query_args = $this->get_query_args( $q_args, true );
			$filter_query = new WP_Query( $filter_query_args );
			$q_args['thjmf_max_page'] = $this->max_num_pages($per_page, $filter_query->found_posts);
            $this->render_page_listing_content($filter_query, $q_args, $paged, true, $filter_load_more);
			return;
		}

		private function render_fields_for_filtering( $filter ){
			if( !$filter ){
				return;
			}
			$filter_category = isset($_POST["thjmf_filter_category"]) ? sanitize_text_field($_POST["thjmf_filter_category"]) : "";
			$filter_location = isset($_POST["thjmf_filter_location"]) ? sanitize_text_field($_POST["thjmf_filter_location"]) : "";
			$filter_type = isset($_POST["thjmf_filter_type"]) ? sanitize_text_field($_POST["thjmf_filter_type"]) : "";
			?>
			<input type="hidden" name="thjmf_filter_category" value="<?php echo $filter_category; ?>" />
			<input type="hidden" name="thjmf_filter_location" value="<?php echo $filter_location; ?>" />
			<input type="hidden" name="thjmf_filter_type" value="<?php echo $filter_type; ?>" />
			<?php
		}

		private function render_page_listing_content($loop, $content_args, $paged, $filter=false, $filter_load_more = false){
			$pagenum_link = isset( $content_args['pagenum_link'] ) ? $content_args['pagenum_link'] : "";
			$theme_class = $this->add_theme_compatibiltiy_class();
			if( $this->special_theme && apply_filters('thjmf_theme_layout_override', true) ){
				$args['layout_class'] = "thjmf-plugin-layout";
			}
			?>
			<div id="thjmf-job-listings-box">
				<?php 
				$settings = THJMF_Utils::get_default_settings();
	            $filter_args = $this->get_filter_arguments( $settings );
	            ?>
	            <form id="thjmf_job_filter_form" name="thjmf_job_filter_form" method="POST" class="<?php echo $theme_class; ?>">
					<?php 
						if ( function_exists('wp_nonce_field') ){
							wp_nonce_field( 'thjmf_filter_jobs', 'thjmf_filter_jobs_nonce' ); 
						}
						get_thjmf_template( 'job-filters.php', $filter_args ); 
					?>
				</form>
				<form name="thjmf_load_more_post" method="POST">
					<input type="hidden" name="thjmf_job_paged" value="<?php echo $paged; ?>">
					<?php
					if( ! $loop->have_posts() ) {
						get_thjmf_template( 'content-no-jobs.php' );
					   return false;
					}
					
					$this->render_fields_for_filtering($filter);
					if ( function_exists('wp_nonce_field') ){
						wp_nonce_field( 'thjmf_load_more_jobs', 'thjmf_load_more_jobs_nonce' ); 
					}
					while( $loop->have_posts() ) {
					    $loop->the_post();
					    $listing_args = $this->get_job_meta_tags( $settings );
					    $listing_args['layout_class'] = '';
						if( $this->special_theme && apply_filters('thjmf_theme_layout_override', true) ){
							$listing_args['layout_class'] = "thjmf-plugin-layout";
						}
						get_thjmf_template( 'content-job-listing.php', $listing_args );
					}
					$this->render_load_more_pagination($content_args, $paged, $filter_load_more);
					?>
				</form>
			</div>
			<?php
		}

		private function render_load_more_pagination($args, $paged, $filter_l_m=false){
			echo '<div class="thjmf-load-more-section">';
			if( (int) $args['thjmf_max_page'] != $paged){
	       		?>
	       		<div class="thjmf-load-more-button-wrapper">
	       			<button type="submit" class="button" name="<?php echo $filter_l_m ? "thjmf_filter_load_more" : "thjmf_load_more" ?>" id="thjmf_load_more"> <?php echo __('Load more', 'job-manager-career'); ?></button>
	       		</div>
	       		<?php
	       	}
	       	'</div>';
		}

		public function get_taxonomy_terms( $tax ){
			$terms = THJMF_Utils::get_all_post_terms( $tax );
			return wp_list_pluck( $terms, "name", "slug");
		}

		public function get_query_arguments( $settings, $paged, $filter=false ){
			$args = [];
			$per_page = get_option( 'posts_per_page' );

			$args['hide_expired'] = isset( $settings['job_detail']['job_hide_expired'] ) ? $settings['job_detail']['job_hide_expired'] : false;
			
			$args['hide_filled'] = isset( $settings['job_detail']['job_hide_filled'] ) ? $settings['job_detail']['job_hide_filled'] : false;

			$args['posts_per_page'] = (int) $per_page*$paged;
			$modified_args = $this->get_query_args( $args, $filter );
			return $modified_args;
		}


		private function get_query_args( $q_args, $filter=false){
			$posts_per_page = isset( $q_args['posts_per_page'] ) ? $q_args['posts_per_page'] : false;
			$args = array (
				'posts_per_page'    => $posts_per_page,
				'post_date'			=> 'DESC',
				'post_type'         => THJMF_Utils::get_job_cpt(),
			);

			if( $filter ){
				$category = isset( $q_args['category'] ) ? $q_args['category'] : false;
				$location = isset( $q_args['location'] ) ? $q_args['location'] : false;
				$type = isset( $q_args['type'] ) ? $q_args['type'] : false;
				if( $category && $location || $category && $type || $location && $type){
					$args['tax_query'] = array( 'relation'=>'AND' );
				}
			
				if($category){
					$args['tax_query'][] = array(
						'taxonomy' => 'thjm_job_category',
						'field' => 'slug',
						'terms' => $category
					);
				}
				if($location){
					$args['tax_query'][] = array(
						'taxonomy' => 'thjm_job_locations',
						'field' => 'slug',
						'terms' => $location
					);
				}
				if($type){
					$args['tax_query'][] = array(
						'taxonomy' => 'thjm_job_type',
						'field' => 'slug',
						'terms' => $type
					);
				}
			}
			$hide_filled = isset( $q_args['hide_filled'] ) ? $q_args['hide_filled'] : false;
			$hide_expired = isset( $q_args['hide_expired'] ) ? $q_args['hide_expired'] : false;

			if($hide_filled && $hide_expired){
				$args['meta_query'] = array( 'relation'=>'AND' );
			}

			if( $hide_filled == '1'){
	    		$args['meta_query'][] = array(
					'key'       => THJMF_Utils::get_filled_meta_key(),
				    'value'   	=> '',
				    'compare' 	=> '=',
				);
			}

			if( $hide_expired == '1'){
	    		$args['meta_query'][] = array(
	    			'relation'	=> 'OR',
	    			array(
						'key'       => THJMF_Utils::get_expired_meta_key(),
					    'value'   	=> '',
					    'compare' 	=> '=',
					),
					array(
					    'key' => THJMF_Utils::get_expired_meta_key(), // Check the start date field
		                'value' => date('Y-m-d'), // Set today's date (note the similar format)
		                'compare' => '>=', // Return the ones greater than today's date
		                'type' => 'DATE' // Let WordPress know we're working with date
					),
	    		);
			}
			return $args;
		}

		public function prepare_reset_actions(){
            global $post;

            if( isset($_POST["thjmf_job_filter_reset"]) ){
            	if ( ! isset( $_POST['thjmf_filter_jobs_nonce'] )  || ! wp_verify_nonce( $_POST['thjmf_filter_jobs_nonce'], 'thjmf_filter_jobs' ) ){
	   				wp_die('Sorry, your nonce did not verify.');
	   				exit;
				}
				if( has_shortcode( $post->post_content, THJMF_Utils::$shortcode) ){

                	global $wp;
                	$pagename = ( get_query_var( 'pagename' ) ) ? get_query_var( 'pagename' ) : false;
					if( $pagename ){
						wp_safe_redirect( home_url( $pagename ) );
					}
            	}
            }
            
            if( isset($_POST["thjmf_load_more"])){
            	if ( ! isset( $_POST['thjmf_load_more_jobs_nonce'] )  || ! wp_verify_nonce( $_POST['thjmf_load_more_jobs_nonce'], 'thjmf_load_more_jobs' ) ){
	   				wp_die('Sorry, your nonce did not verify.');
	   				exit;
				}
            }
        }

	}
	
endif;