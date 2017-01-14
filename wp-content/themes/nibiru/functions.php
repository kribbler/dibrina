<?php
/**
 * Functions and definitions.
 */

/* LICENSE
--------------------------------------------------------- */ 
require_once('inc/license.php');

/* OPTIONS
--------------------------------------------------------- */ 
require_once('inc/po-options.php');


/* METABOXES
--------------------------------------------------------- */ 
 
include_once 'metaboxes/wpalchemy/MetaBox.php';
include_once 'metaboxes/wpalchemy/MediaAccess.php';
include_once 'metaboxes/slider-spec.php';
include_once 'metaboxes/page-spec.php';
include_once 'metaboxes/client-spec.php';
include_once 'metaboxes/portfolio-spec.php';
include_once 'metaboxes/team-spec.php';
include_once 'metaboxes/carousel-spec.php';
include_once 'metaboxes/format-spec.php';
include_once 'metaboxes/footer-spec.php';
include_once 'metaboxes/footer-column-spec.php';


/* CONTENT WIDTH
--------------------------------------------------------- */ 
if ( ! isset( $content_width ) ) $content_width = 1140;



/* LOVE IT
--------------------------------------------------------- */ 
include_once('inc/love-it-pro/love-it-pro.php');


/* METABOXES STYLES
--------------------------------------------------------- */ 

if (is_admin()) add_action('admin_enqueue_scripts', 'po_metabox_style');
if ( ! function_exists( 'po_metabox_style' ) ) {
	function po_metabox_style() {
		wp_enqueue_style('wpalchemy-metabox', get_template_directory_uri() . '/metaboxes/meta.css');
	}
}

/* THEME SETUP
--------------------------------------------------------- */ 

if ( ! function_exists( 'pixelobject_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function po_pixelobject_setup() {

	/**
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'pixelobject', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'small-thumb', 50, 50, true);
	
	/*
	 * Lets WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'pixelobject_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'po_pixelobject_setup' );

 
/* LOAD SCRIPTS AND STYPES
--------------------------------------------------------- */ 

if ( ! function_exists( 'po_pixelobject_scripts' ) ) {
function po_pixelobject_scripts() {
	global $wp_styles;
	
	wp_register_style( 'po-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'po-bootstrap-style' );
	wp_enqueue_style( 'po-style', get_stylesheet_uri() );
	wp_enqueue_style( 'po-ie', get_template_directory_uri() . '/css/ie.css', array( 'po-style' ), '20121010' );
	$wp_styles->add_data( 'po-ie', 'conditional', 'lte IE 9' );
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'po-google-font', "$protocol://fonts.googleapis.com/css?family=" . get_theme_mod( 'family_code','Source+Sans+Pro:300,400,600') );
	wp_register_style( 'po-font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style( 'po-font-awesome' );
	wp_register_style( 'po-linecons', get_template_directory_uri() . '/css/linecons.css');
	wp_enqueue_style( 'po-linecons' );
	
	wp_enqueue_script( 'po-jquery1102', get_template_directory_uri() . '/js/jquery1102.js', array(), '1102', false );
	wp_register_script('po-googlemaps', ('http://maps.google.com/maps/api/js?sensor=false'), false, null, true);
    wp_enqueue_script('po-googlemaps');
	wp_enqueue_script( 'po-jquery192', get_template_directory_uri() . '/js/jquery192.js', array(), '192', true );
	wp_enqueue_script( 'po-appear', get_template_directory_uri() . '/js/jquery.appear.js', array(), '033', true );
	wp_enqueue_script( 'po-theme-plugins', get_template_directory_uri() . '/js/theme-plugins.js', array(), '1', true );
	wp_enqueue_script( 'po-view', get_template_directory_uri() . '/js/view.min.js?auto', array(), '1', true );
	wp_enqueue_script( 'po-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array(), '1', true );
	wp_enqueue_script( 'po-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), '411', true );
	wp_enqueue_script( 'po-stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array(), '1', true );
	wp_enqueue_script( 'po-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '303', true );
	wp_enqueue_script( 'po-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '262', true );
	wp_enqueue_script( 'po-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'po-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'po-main-script', get_template_directory_uri() . '/js/script.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
}
add_action( 'wp_enqueue_scripts', 'po_pixelobject_scripts' );


/* LOAD CUSTOMISER STYLES
--------------------------------------------------------- */ 
require_once('inc/custom-styles.php');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Use Bootstrap Menu
 */

if ( ! function_exists( 'po_bootstrap_menu_usage' ) ):
  function po_bootstrap_menu_usage() {
    // Adds the main menu
    register_nav_menus( array(
      'header-menu' => __( 'Header Menu','po_menu_locations' ),
	  'footer-menu' => __( 'Footer Menu','po_menu_locations' ),
    ) );
  }
endif;
add_action( 'after_setup_theme', 'po_bootstrap_menu_usage' );

require_once 'inc/nav.php';

/**
 * Removes auto formatting
*/

add_filter("the_content", "po_content_filter");
 
if ( ! function_exists( 'po_content_filter' ) ) { 
function po_content_filter($content) {
 
	// array of custom shortcodes requiring the fix 
	$block = join("|",array("slider_details","slider_column","slider_button","slider_text","slider_titles","slider_gallery","slider_gallery_no_controls","slider_images","nav_bar","nav_bar_noslide","section","section1","section2","column","column1","column2","header","text","media","button","iconbox","count","progress_bar","portfolio_showcase","portfolio_footer","portfolio_details","carousel","googlemaps","team","clients","testimonials","social","social_person","social_footer"));
 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;
 
}
}

/*
 * Editor Styles
 */


if ( ! function_exists( 'po_add_editor_styles' ) ) {
function po_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
}
add_action( 'init', 'po_add_editor_styles' );


/**
 * Add breadcrumbs
*/
require_once 'inc/breadcrumbs.php';

/**
 * Add pagination
*/
require_once 'inc/pagination.php';


/**
 * Custom background
*/
$defaults = array(
	'default-color'          => '#15191B',
	'wp-head-callback'       => '_custom_background_cb'
);
add_theme_support( 'custom-background', $defaults );


/**
 * Get the first link.
 */

if ( ! function_exists( 'po_get_link_url' ) ) {
function po_get_link_url() {
    $content = get_the_content();
    $has_url = get_url_in_content( $content );

    return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
}

/**
 * Register Sidebar
 */
$args = array(
	'name'          => __( 'Sidebar', 'pixelobject' ),
	'id'            => 'po-sidebar',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );

/**
 * Tag Cloud
 */
 
 
if ( ! function_exists( 'po_tag_cloud_custom' ) ) {	
function po_tag_cloud_custom( $args ) {
	$args['smallest'] = 13;
	$args['largest'] = 13;
	$args['unit'] = 'px';
	return $args;
}
}
add_filter( 'widget_tag_cloud_args', 'po_tag_cloud_custom' );

if ( ! function_exists( 'po_portfolio_archive_args' ) ) {
function po_portfolio_archive_args( $query ) {
	$category = get_theme_mod( 'portfolio_category');
	$order = get_theme_mod( 'portfolio_order','DESC');
	$orderby = get_theme_mod( 'portfolio_orderby','date');
	
    if ( is_post_type_archive( 'portfolio' ) ) {
        // Display 50 posts for a custom post type called 'movie'
        $query->set( 'orderby', $orderby );
		$query->set( 'order', $order );
		$query->set( 'portfolio_categories', $category );
		
        return;
    }
}
}
add_action( 'pre_get_posts', 'po_portfolio_archive_args', 1 );


/**
 * Sanitize functions
*/

if ( ! function_exists( 'po_sanitize_checkbox' ) ) {
function po_sanitize_checkbox( $input ) {
    if ( $input == 'show' ) {
        return 'show';
    } else {
        return '';
    }
}
}
