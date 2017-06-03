<?php
/**
 * TF Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TF Construction
 */

if ( ! function_exists( 'tf_construction_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tf_construction_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TF Construction, use a find and replace
	 * to change 'tf-construction' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tf-construction', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	//
	add_theme_support( 'custom-background', array( 'default-color' => '#FFFFFF' ));
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	));
	
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
		'primary' => esc_html__( 'Primary', 'tf-construction' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	
	add_theme_support( 'woocommerce' );

	add_image_size( 'tf-construction-fullwidth', '825', '350', true);
	add_image_size( 'tf-construction-home-thumb', '285', '230', true);
}
endif;
add_action( 'after_setup_theme', 'tf_construction_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tf_construction_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tf_construction_content_width', 640 );
}
add_action( 'after_setup_theme', 'tf_construction_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tf_construction_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tf-construction' ),
		'id'            => 'sidebar-widget-area',
		'description'   => esc_html__('Sidebar Widget Area', 'tf-construction' ),
		'before_widget' => '<div id="%1$s" class="row sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
    		'name' => esc_html__( 'Footer Widget Area', 'tf-construction' ),
    		'id' => 'footer-widget-area',
    		'description' => esc_html__( 'footer widget area', 'tf-construction' ),
    		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 footer_widget widget %2$s">',
    		'after_widget'  =>  '</div>',
    		'before_title'  =>  '<div class="row widget_head widget-heading"><h2>',
    		'after_title'   =>  '</h2></div>', 
		) );
	
}
add_action( 'widgets_init', 'tf_construction_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tf_construction_scripts() {
	
	
	wp_enqueue_style( 'tf-construction-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,300,500,600,700,800,900'); 
    wp_enqueue_style( 'font-awesome',  get_template_directory_uri()."/css/font-awesome.min.css");
    wp_enqueue_style( 'bootstrap',  get_template_directory_uri()."/css/bootstrap.min.css");
    wp_enqueue_style( 'animate',  get_template_directory_uri()."/css/animate.min.css");
    wp_enqueue_style( 'simplelightbox',  get_template_directory_uri()."/css/simplelightbox.css");
    wp_enqueue_style( 'swiper',  get_template_directory_uri()."/css/swiper.min.css");
    wp_enqueue_style( 'tf-construction-style', get_stylesheet_uri() );
    
    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); 	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'simple-lightbox', get_template_directory_uri() . '/js/simple-lightbox.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'tf-construction-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'tf-construction-custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.min.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
 
    wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js');
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	
}
add_action( 'wp_enqueue_scripts', 'tf_construction_scripts' );




require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/themefarmer-customizer.php';
require get_template_directory() . '/inc/themefarmer-sanitize-cb.php';
require get_template_directory() . '/inc/themefarmer-variables.php';
require get_template_directory() . '/inc/themefarmer-walker.php';
require get_template_directory() . '/inc/themefarmer-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-info.php';

