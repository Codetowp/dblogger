<?php
/**
 * dblogger functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dblogger
 */

if ( ! function_exists( 'dblogger_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dblogger_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dblogger use a find and replace
		 * to change 'dblogger' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dblogger', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'Primary', 'dblogger' ),
			'footer-menu' => esc_html__( 'Footer', 'dblogger' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dblogger_custom_background_args', array(
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
			)
		);
		/**
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( 'assets/css/editor-style.css', 'dblogger' );
		
		// WooCommerce supported here
		add_theme_support( 'woocommerce' );		
	}
endif;
add_action( 'after_setup_theme', 'dblogger_setup' );

/**
 * Set the content width in pixels for video embed, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
 
function dblogger_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dblogger_content_width', 750 );
}
add_action( 'after_setup_theme', 'dblogger_content_width', 0 );

/**
 * Global variables for category listing
 */ 

global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ( $options_categories_obj as $category ) {
	$options_categories[ $category->cat_ID ] = $category->cat_name;
}

/**
 * Fonts
 */

function demo_fonts() {
	// Font options
	$fonts = array(
		get_theme_mod( 'dblogger_paragraph_font', customizer_library_get_default( 'primary-font' ) ),
		get_theme_mod( 'dblogger_heading_font_family', customizer_library_get_default( 'secondary-font' ) ),
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'demo_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'demo_fonts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dblogger_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dblogger' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dblogger' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" style="visibility: visible; animation-name: fadeInUp;">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	// Custom Widgets of the theme
	require get_template_directory() . '/inc/widgets/social.php';
    require get_template_directory() . '/inc/styles.php';
	require get_template_directory() . '/inc/customizer-library.php';
}
add_action( 'widgets_init', 'dblogger_widgets_init' );
	// Custom Theme Functions
	require get_template_directory() . '/inc/lib/related-post.php';
	require get_template_directory() . '/inc/lib/print_styles.php';
	require get_template_directory() . '/inc/widgets/recentpost.php';
	// Custom Theme Image Sizes
	add_image_size( 'dblogger_recent_post', 60, 60,  array( 'top', 'center' ) );
	add_image_size( 'dblogger_header', 1900, 560,  array( 'top', 'center' ) );
	add_image_size( 'dblogger_homepage', 570, 350,  array( 'top', 'center' ) );
	add_image_size( 'dblogger_theme', 375, 210,  array( 'top', 'center' ) );
	add_image_size( 'dblogger_single_article', 1900, 500,  array( 'top', 'center' ) );
	add_image_size( 'dblogger_related_post', 250, 140,  array( 'top', 'center' ) );

/**
 * Breadcrumb Function
 */
 
function the_breadcrumb() {
	if ( ! is_home() ) {
		echo '<a href="';
		echo esc_url( home_url( 'home' ) );
		echo '">';
		echo esc_html_e( 'Home', 'dblogger' );
		echo '</a> / ';
		if ( is_category() || is_single() ) {
			the_category( ',' );
		} elseif ( is_page() ) {
			echo the_title();
		}
	}
}

/**
 * Enqueue scripts and styles.
 */

function dblogger_css_styles(){
    wp_enqueue_style( 'dblogger-bootstrap' , get_template_directory_uri() . '/assets/css/bootstrap.css' );
    wp_enqueue_style( 'dblogger-font-awesome' , get_template_directory_uri() . '/assets/css/font-awesome.css' );
    wp_enqueue_style( 'dblogger-animate' , get_template_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'dblogger-style' , get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'dblogger-googleapis', 'https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700|Montserrat:100,200,300,300i,400,500,600,700,800,900' );    
}
add_action( 'wp_enqueue_scripts', 'dblogger_css_styles' );

function dblogger_js_scripts() {
	wp_enqueue_script( 'dblogger-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'dblogger-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );          
	} 
	wp_enqueue_script( 'jquery' );    
    wp_enqueue_script( 'dblogger-modernizr-min', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '20151215', true );      
    wp_enqueue_script( 'dblogger-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true );    
    wp_enqueue_script( 'dblogger-SmoothScroll', get_template_directory_uri() . '/assets/js/SmoothScroll.js', array(), '20151215', true );    
    wp_enqueue_script( 'dblogger-jquery-isotope', get_template_directory_uri() . '/assets/js/jquery.isotope.js', array(), '20151215', true );    
    wp_enqueue_script( 'dblogger-main', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true );    
    wp_enqueue_script( 'dblogger-wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );    
}
add_action( 'wp_enqueue_scripts', 'dblogger_js_scripts' );
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function dblogger_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'dblogger_custom_excerpt_length', 999 );

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
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
