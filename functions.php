<?php
/**
 * Functions
 */

/******************************************************************************
						Global Functions
******************************************************************************/

// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
	add_theme_support( 'title-tag' );

//  Add widget support shortcodes
	add_filter('widget_text', 'do_shortcode');

// Support for Featured Images
	add_theme_support( 'post-thumbnails' );

// Custom Background
	add_theme_support( 'custom-background', array('default-color' => 'fff'));

// Custom Header
	add_theme_support( 'custom-header', array(
		'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
		'height'        => '200',
		'flex-height'    => true,
		'uploads'       => true,
		'header-text'   => false
	) );

// Register Navigation Menu
	register_nav_menus( array(
		'header-menu' => 'Header Menu',
		'footer-menu' => 'Footer Menu'
	) );

// Navigation Menu Adjustments

	/* Add class to navigation sub-menu */
	class foundation_navigation extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdrown_menu dropdown\">\n";
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( !empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-dropdown';
		}
			Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
	}

	/* Display Pages In Navigation Menu */
	if ( ! function_exists( 'foundation_page_menu' ) ) :
	function foundation_page_menu() {
		$pages_args = array(
			'sort_column' => 'menu_order, post_title',
			'menu_class'  => '',
			'include'     => '',
			'exclude'     => '',
			'echo'        => true,
			'show_home'   => false,
			'link_before' => '',
			'link_after'  => ''
		);

		wp_page_menu($pages_args);
	}
	endif;


// Create pagination
	function foundation_pagination($query = '') {
		if (empty($query)){
			global $wp_query;
			$query = $wp_query;
		}

		$big = 999999999;

		$links = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'prev_next' => true,
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $query->max_num_pages,
		'type' => 'list'
		)
		);

		$pagination = str_replace('page-numbers','pagination',$links);

		echo $pagination;
	}

// Register Sidebars
	function foundation_widgets_init() {
	/* Sidebar Right */
		register_sidebar( array(
			'id' => 'foundation_sidebar_right',
			'name' => __( 'Sidebar Right' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
	}
	add_action( 'widgets_init', 'foundation_widgets_init' );

// Remove #more anchor from posts
	function remove_more_jump_link($link) {
		$offset = strpos($link, '#more-');
		if ($offset) { $end = strpos($link, '"',$offset); }
		if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');


/******************************************************************************************************************************
				Enqueue Scripts and Styles for Front-End
*******************************************************************************************************************************/

//Run Sick slider on HOME page
include_once(TEMPLATEPATH . '/inc/home-slider.php');


function foundation_scripts_and_styles() {
	if (!is_admin()) {

// Load Stylesheets
	//core
	wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/core/normalize.css', null, null );
	wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.min.css', null, null );

	//plugins
	wp_enqueue_style( 'font-awesome.min', get_template_directory_uri().'/css/plugins/font-awesome.min.css', null, null );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/css/plugins/slick.css', null, null );
	wp_enqueue_style( 'jquery.fancybox', get_template_directory_uri().'/css/plugins/jquery.fancybox.css', null, null );

	//system
	wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*3rd priority*/
	wp_enqueue_style( 'custom', get_template_directory_uri().'/css/custom.css', null, null );/*2nd priority*/
	wp_enqueue_style( 'media-screens', get_template_directory_uri().'/css/media-screens.css', null, null );/*1st priority*/

// Load JavaScripts
	//core
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation.min', get_template_directory_uri() . '/js/foundation.min.js', null, null, true );

	//plugins
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/plugins/respond.js', null, null, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true );
	wp_enqueue_script( 'jquery.matchHeight-min', get_template_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, null, true );
	wp_enqueue_script( 'jquery.fancybox.pack', get_template_directory_uri() . '/js/plugins/jquery.fancybox.pack.js', null, null, true );
//    wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', null, null, true );

	//custom javascript
	wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true ); /* This should go first */

	}
}
add_action( 'wp_enqueue_scripts', 'foundation_scripts_and_styles' );



// Initialise Foundation JS
	function foundation_js_init () {
		echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
	}
	add_action('wp_footer', 'foundation_js_init', 50);



/******************************************************************************
				Additional Functions
*******************************************************************************/
// Register Post Type Slider
	function post_type_slider() {
	$post_type_slider_labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'slide' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New ' ),
		'all_items'          => __( 'All' ),
		'view_item'          => __( 'View' ),
		'search_items'       => __( 'Search for a slide' ),
		'not_found'          => __( 'No slides found' ),
		'not_found_in_trash' => __( 'No slides found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$post_type_slider_args = array(
		'labels'        => $post_type_slider_labels,
		'description'   => 'Display Slider',
		'public'        => true,
		'menu_icon'		 => 'dashicons-format-gallery',
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
		'has_archive'   => true,
		'hierarchical'  => true
	);
	register_post_type( 'slider', $post_type_slider_args );
	}
	add_action( 'init', 'post_type_slider' );


// Stick Admin Bar To The Top
	if (!is_admin()) {
		add_action('get_header', 'my_filter_head');

		function my_filter_head() {
			remove_action('wp_head', '_admin_bar_bump_cb');
		}

		function stick_admin_bar() {
			echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
				@media screen and (max-width: 600px) {
					body.admin-bar { margin-top:46px !important }
					html #wpadminbar{ margin-top: -46px; }
				}
			</style>
			";
		}

		add_action('admin_head', 'stick_admin_bar');
		add_action('wp_head', 'stick_admin_bar');
	}

// Customize Login Screen
	function wordpress_login_styling() { ?>
		<style type="text/css">
			.login #login h1 a {
				background-image: url('<?php echo get_header_image(); ?>');
				background-size: contain;
				width: auto;
				height: 220px;
			}
		   body.login{
			   background-color: #<?php echo get_background_color(); ?>;
			   background-image: url('<?php echo get_background_image(); ?>') !important;
			   background-repeat: repeat;
			   background-position: center center;
		   };

		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

	function admin_logo_custom_url(){
		$site_url = get_bloginfo('url');
		return ($site_url);
	}
	add_filter('login_headerurl', 'admin_logo_custom_url');

// ACF Pro Options Page

	 if( function_exists('acf_add_options_page') ) {

	     acf_add_options_page(array(
	         'page_title'    => 'Theme General Settings',
	         'menu_title'    => 'Theme Settings',
	         'menu_slug'     => 'theme-general-settings',
	         'capability'    => 'edit_posts',
	         'redirect'      => false
	     ));

	 }

/*********************** PUT YOU FUNCTIONS BELOW ********************************/

// add_image_size( 'name', width, height, array('center','center'));


















/*******************************************************************************/


?>