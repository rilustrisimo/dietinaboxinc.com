<?php
/**
 * Melro Realty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Diet
 */

if ( ! function_exists( 'diet_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function diet_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Melro Realty, use a find and replace
		 * to change 'diet' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'diet', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'diet' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'diet_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'diet_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function diet_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'diet_content_width', 640 );
}
add_action( 'after_setup_theme', 'diet_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function diet_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'diet' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'diet' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'diet_widgets_init' );

function validate_voucher($data) {
	$voucher = $data->get_param('code');
	$discount_voucher = get_field('discount_voucher_codes', get_page_by_path('discount-codes'));
	$codes = $discount_voucher['body'];
	$discount_value = 0;
	$found = false;
	
	for($i = 0; $i < count($codes) && !$found; $i++) {
		$code = $codes[$i];
		
		if(strcasecmp($code[0]['c'], $voucher) == 0) {
			$found = true;
			$discount_value = $code[1]['c'];
		}
	}
	
	return [
		'status' => $found,
		'discount' => $discount_value
	];
}

function validate_discount_voucher() {
	register_rest_route('voucher/v1', 'check', array(
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => 'validate_voucher'
	));
}
add_action('rest_api_init', 'validate_discount_voucher');

/**
 * Enqueue scripts and styles.
 */
function diet_scripts() {
	wp_enqueue_style( 'diet-style', get_stylesheet_uri() );

	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/custom-styles.css', array('diet-style'), '1.0');

	wp_enqueue_style( 'daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css' );
	
	wp_enqueue_style( 'timepicker-style', get_template_directory_uri() . '/vendors/timepicker/jquery.timepicker.min.css' );

	wp_enqueue_script( 'diet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'diet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery', 'popper-js'), '20151215', true );

	wp_enqueue_script( 'moment-js', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'daterangepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array(), '20151215', true );

	wp_enqueue_script( 'timepicker-js', get_template_directory_uri() . '/vendors/timepicker/jquery.timepicker.min.js', array(), '20151215', true );

	wp_enqueue_script( 'google-places', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAgwjtpf1SpIXZdfos55iTFLnYXFMSkv18&libraries=places', array(), '20151215', true );
	
	wp_enqueue_script( 'sweetalert-js', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', array(), '20151215', true );

	wp_enqueue_script( 'cookies-js', 'https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/src/js.cookie.min.js', array(), '1.0', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), '20151215', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/Theme.js', array('jquery'), '2.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'diet_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/***
 * Create Query Function
 */

function createQuery($posttype, $meta_query = array(), $numberposts = -1, $orderby = 'date', $order = 'ASC') {
	$args = array(
		'orderby'			=> $orderby,
		'order'				=> $order,
		'numberposts'	=> $numberposts,
		'post_type'		=> $posttype,
		'meta_query'    => array($meta_query)
	);

	$the_query = new WP_Query( $args );

	return $the_query;
}


function getAllProducts(){
	$p = createQuery('products', array('key' => 'product_category', 'value' => 'meal-plan', 'compare' => '='));

	return $p->posts;
}

function getAllAddons(){
	$p = createQuery('products', array('key' => 'product_category', 'value' => 'addons', 'compare' => '='));

	return $p->posts;
}


add_action( 'wp_ajax_menu_plans_content', 'menu_plans_content' );
add_action( 'wp_ajax_nopriv_menu_plans_content', 'menu_plans_content' ); 


function menu_plans_content(){
	$pid = (int)$_POST['pid'];
	$ptitle = $_POST['ptitle'];

	$shortdata = get_field('product_short_description', $pid);
	$descdata = get_field('product_description', $pid);

	$menu = $_POST['menu'];

	$content = "";
	$content .= '<div class="container"><div class="row">';

	$content .= '<div class="col-md-5">';
	$content .= "<h1>".$ptitle."</h1>";
	$content .= "<h2>".$shortdata."</h2>";
	$content .= $descdata;
	$content .= '<div class="custom-modal__close btn btn-close"><i class="fas fa-arrow-left"></i> Back</div>';
	$content .= get_field('price_chart_button', $pid);
	$content .= '<a href="'.get_permalink(22670).'" class="btn product-btn">Subscribe Now</a>';
	$content .= '</div>';

	$content .= '<div class="col-md-7 menu-container">';

	$content .= urldecode($menu);
	$content .= '<div class="menu-prev tog disabled"><i class="fas fa-chevron-left"></i></div>';
	$content .= '<div class="menu-next tog" data-row="3"><i class="fas fa-chevron-right"></i></div>';

	$content .= '</div>';

	$content .= '</div></div>';


	wp_send_json_success($content);
}

add_action( 'init',  'createPostTypes'); 


function createPostTypes() {
	$post_types = array(
		/**
		 * added classes here
		 */
		
		array(
			'post_type'		=> 'products',
			'singular_name' => 'Product',
			'plural_name'	=> 'Products',
			'menu_icon' 	=> 'dashicons-store',
			'supports'		=> array( 'title', 'thumbnail')
		)
	);

	/*
	* Added Theme Post Types
	*
	*/
	// Uncomment the $a_post_types declaration to register your custom post type
	
	$a_post_types = $post_types;

	if( !empty( $a_post_types ) ) {
		foreach( $a_post_types as $a_post_type ) {
			$a_defaults = array(
				'supports'		=> $a_post_type['supports'],
				'has_archive'	=> TRUE
			);

			$a_post_type = wp_parse_args( $a_post_type, $a_defaults );

			if( !empty( $a_post_type['post_type'] ) ) {

				$a_labels = array(
					'name'				=> $a_post_type['plural_name'],
					'singular_name'		=> $a_post_type['singular_name'],
					'menu_name'			=> $a_post_type['plural_name'],
					'name_admin_bar'		=> $a_post_type['singular_name'],
					'add_new_item'			=> 'Add New '.$a_post_type['singular_name'],
					'new_item'			=> 'New '.$a_post_type['singular_name'],
					'edit_item'			=> 'Edit '.$a_post_type['singular_name'],
					'view_item'			=> 'View '.$a_post_type['singular_name'],
					'all_items'			=> 'All '.$a_post_type['plural_name'],
					'search_items'			=> 'Search '.$a_post_type['plural_name'],
					'parent_item_colon'		=> 'Parent '.$a_post_type['plural_name'],
					'not_found'			=> 'No '.$a_post_type['singular_name'].' found',
					'not_found_in_trash'	=> 'No '.$a_post_type['singular_name'].' found in Trash'
				);

				$a_args = array(
					'labels'				=> $a_labels,
					'show_in_menu'			=> true,
					'show_ui'				=> true,
					'rewrite'				=> array( 'slug' => $a_post_type['post_type'] ),
					'capability_type'		=> 'post',
					'has_archive'			=> $a_post_type['has_archive'],
					'supports'				=> $a_post_type['supports'],
					'publicly_queryable' 	=> true,
					'public' 				=> true,
					'query_var' 			=> true,
					'menu_icon'				=> $a_post_type['menu_icon']
				);

				register_post_type( $a_post_type['post_type'], $a_args );
			}
		}
	}
}


add_action( 'wp_ajax_process_cart', 'process_cart' );
add_action( 'wp_ajax_nopriv_process_cart', 'process_cart' ); 

function process_cart(){
	register_session_new();

	$cart = $_POST['cart'];
	$_SESSION['cart'] = $cart;

	wp_send_json_success(array('cart' => $_SESSION['cart'],'redirect' => get_permalink(22704)));
}


function register_session_new(){
    if( ! session_id() ) {
       session_start();

	   if(isset($_GET['testmode']) && $_GET['testmode'] == "1"){
			$_SESSION['testmode'] = true;
	   }

	   if(isset($_GET['testmode']) && $_GET['testmode'] == "0"){
			unset($_SESSION['testmode']);
   		}
     }
 }

add_action('init', 'register_session_new');

add_filter('og_image_init', 'my_og_image_init');
function my_og_image_init($images)
{
    if ( is_front_page() || is_home() ) {
        $images[] = 'https://www.dietinaboxinc.com/wp-content/uploads/2022/01/seo.jpg';
    }
    return $images;
}

add_filter('og_og_description_meta', 'my_og_og_description_meta');
function my_og_og_description_meta($description)
{
    if ( is_home() ) {
        return '<meta property="og:description" content="Revolutionizing the way people perceive healthy meals" />';
    }
    return $description;
}
