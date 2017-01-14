<?php  
/**
* Plugin Name: PixelBundle
* Plugin URI: http://pixelobject.com/
* Description: Create compelling and engaging content with our plugin bundle.
* Version: 1.7
* Author: Pixelobject
* Author URI: http://pixelobject.com/
* License: GPL12
*/

define( 'PO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once PO_PLUGIN_PATH . 'inc/bundle.php';

// this is the URL our updater / license checker pings.
define( 'EDD_PIXELBUNDLE_URL', 'http://pixelobject.com' );

// the name of your product. 
define( 'EDD_PIXELBUNDLE_NAME', 'PixelBundle' );

if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	// load our custom updater
	include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}

function edd_sl_pixelbundle_plugin_updater() {

	// retrieve our license key from the DB
	$license_key = trim( get_option( 'edd_pixelbundle_license_key' ) );

	// setup the updater
	$edd_updater = new EDD_SL_Plugin_Updater( EDD_PIXELBUNDLE_URL, __FILE__, array( 
			'version' 	=> '1.7', 				// current version number
			'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
			'item_name' => EDD_PIXELBUNDLE_NAME, 	// name of this plugin
			'author' 	=> 'Pixelobject'  // author of this plugin
		)
	);

}
add_action( 'admin_init', 'edd_sl_pixelbundle_plugin_updater', 0 );


/************************************
* the code below is just a standard
* options page. Substitute with 
* your own.
*************************************/

function edd_pixelbundle_license_menu() {
	add_plugins_page( 'PixelBundle License', 'PixelBundle License', 'manage_options', 'pixelbundle-license', 'edd_pixelbundle_license_page' );
}
add_action('admin_menu', 'edd_pixelbundle_license_menu');

function edd_pixelbundle_license_page() {
	$license 	= get_option( 'edd_pixelbundle_license_key' );
	$status 	= get_option( 'edd_pixelbundle_license_status' );
	?>
	<div class="wrap">
		<h2><?php _e('PixelBundle License Options'); ?></h2>
		<form method="post" action="options.php">
		
			<?php settings_fields('edd_pixelbundle_license'); ?>
			
			<table class="form-table">
				<tbody>
					<tr valign="top">	
						<th scope="row" valign="top">
							<?php _e('License Key'); ?>
						</th>
						<td>
							<input id="edd_pixelbundle_license_key" name="edd_pixelbundle_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
							<label class="description" for="edd_pixelbundle_license_key"><?php _e('Enter your license key'); ?></label>
						</td>
					</tr>
					<?php if( false !== $license ) { ?>
						<tr valign="top">	
							<th scope="row" valign="top">
								<?php _e('Activate License'); ?>
							</th>
							<td>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<span style="color:green;"><?php _e('active'); ?></span>
									<?php wp_nonce_field( 'edd_pixelbundle_nonce', 'edd_pixelbundle_nonce' ); ?>
									<input type="submit" class="button-secondary" name="edd_license_deactivate_pixelbundle" value="<?php _e('Deactivate License'); ?>"/>
								<?php } else {
									wp_nonce_field( 'edd_pixelbundle_nonce', 'edd_pixelbundle_nonce' ); ?>
									<input type="submit" class="button-secondary" name="edd_license_activate_pixelbundle" value="<?php _e('Activate License'); ?>"/>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>	
			<?php submit_button(); ?>
		
		</form>
	<?php
}

function edd_pixelbundle_register_option() {
	// creates our settings in the options table
	register_setting('edd_pixelbundle_license', 'edd_pixelbundle_license_key', 'edd_pixelbundle_sanitize_license' );
}
add_action('admin_init', 'edd_pixelbundle_register_option');

function 		edd_pixelbundle_sanitize_license( $new ) {
	$old = get_option( 'edd_pixelbundle_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'edd_pixelbundle_license_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}



/************************************
* this illustrates how to activate 
* a license key
*************************************/

function edd_pixelbundle_activate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['edd_license_activate_pixelbundle'] ) ) {

		// run a quick security check 
	 	if( ! check_admin_referer( 'edd_pixelbundle_nonce', 'edd_pixelbundle_nonce' ) ) 	
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'edd_pixelbundle_license_key' ) );
			

		// data to send in our API request
		$api_params = array( 
			'edd_action'=> 'activate_license', 
			'license' 	=> $license, 
			'item_name' => urlencode( EDD_PIXELBUNDLE_NAME ), // the name of our product in EDD
			'url'       => home_url()
		);
		
		// Call the custom API.
		$response = wp_remote_get( add_query_arg( $api_params, EDD_PIXELBUNDLE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		// $license_data->license will be either "valid" or "invalid"

		update_option( 'edd_pixelbundle_license_status', $license_data->license );

	}
}
add_action('admin_init', 'edd_pixelbundle_activate_license');


/***********************************************
* Illustrates how to deactivate a license key.
* This will descrease the site count
***********************************************/

function edd_pixelbundle_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['edd_license_deactivate_pixelbundle'] ) ) {

		// run a quick security check 
	 	if( ! check_admin_referer( 'edd_pixelbundle_nonce', 'edd_pixelbundle_nonce' ) ) 	
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'edd_pixelbundle_license_key' ) );
			

		// data to send in our API request
		$api_params = array( 
			'edd_action'=> 'deactivate_license', 
			'license' 	=> $license, 
			'item_name' => urlencode( EDD_PIXELBUNDLE_NAME ), // the name of our product in EDD
			'url'       => home_url()
		);
		
		// Call the custom API.
		$response = wp_remote_get( add_query_arg( $api_params, EDD_PIXELBUNDLE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' )
			delete_option( 'edd_pixelbundle_license_status' );

	}
}
add_action('admin_init', 'edd_pixelbundle_deactivate_license');


/************************************
* this illustrates how to check if 
* a license key is still valid
* the updater does this for you,
* so this is only needed if you
* want to do something custom
*************************************/

function edd_pixelbundle_check_license() {

	global $wp_version;

	$license = trim( get_option( 'edd_pixelbundle_license_key' ) );
		
	$api_params = array( 
		'edd_action' => 'check_license', 
		'license' => $license, 
		'item_name' => urlencode( EDD_PIXELBUNDLE_NAME ),
		'url'       => home_url()
	);

	// Call the custom API.
	$response = wp_remote_get( add_query_arg( $api_params, EDD_PIXELBUNDLE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );


	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	if( $license_data->license == 'valid' ) {
		echo 'valid'; exit;
		// this license is still valid
	} else {
		echo 'invalid'; exit;
		// this license is no longer valid
	}
}


if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {

/* PORTFOLIO CATEGORIES TAXONOMY
------------------------------------------------------- */  

function po_portfolio_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'po_gallery_cat' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'po_gallery_cat' ),
		'search_items'      => __( 'Search Categories', 'po_portfolio_cat' ),
		'all_items'         => __( 'All Categories', 'po_portfolio_cat' ),
		'parent_item'       => __( 'Parent Category', 'po_portfolio_cat' ),
		'parent_item_colon' => __( 'Parent Category:', 'po_portfolio_cat' ),
		'edit_item'         => __( 'Edit Category', 'po_portfolio_cat' ),
		'update_item'       => __( 'Update Category', 'po_portfolio_cat' ),
		'add_new_item'      => __( 'Add New', 'po_portfolio_cat' ),
		'new_item_name'     => __( 'New Category Name', 'po_portfolio_cat' ),
		'menu_name'         => __( 'Categories', 'po_gallery_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $args );
}
add_action( 'init', 'po_portfolio_cat' );



/* PORTFOLIO POST TYPE
------------------------------------------------------- */  

function po_portfolios() {
	
	$portfolioname = get_theme_mod( 'portfolio_name','Portfolio');
	$portfolioslug = get_theme_mod( 'portfolio_slug');

	$labels = array(
		'name'                => $portfolioname,
		'singular_name'       => $portfolioname,
		'menu_name'           => $portfolioname,
		'parent_item_colon'   => __( 'Parent:', 'po_portfolio' ),
		'all_items'           => $portfolioname,
		'view_item'           => __( 'View Item', 'po_portfolio' ),
		'add_new_item'        => __( 'Add New', 'po_portfolio' ),
		'add_new'             => __( 'Add New', 'po_portfolio' ),
		'edit_item'           => __( 'Edit Item', 'po_portfolio' ),
		'update_item'         => __( 'Update Item', 'po_portfolio' ),
		'search_items'        => __( 'Search Items', 'po_portfolio' ),
		'not_found'           => __( 'No items found', 'po_portfolio' ),
		'not_found_in_trash'  => __( 'No items found in Trash', 'po_portfolio' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'po_portfolio' ),
		'description'         => __( 'Portfolio', 'po_portfolio' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', ),
		'taxonomies'          => array( 'portfolio_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-format-image',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'           => array( 'slug' => $portfolioslug ,'with_front' => false ),
	);
	register_post_type( 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_portfolios', 0 );

}

if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {

/* TEAM CATEGORIES TAXONOMY
------------------------------------------------------- */  

function po_team_cat() {
	
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'po_gallery_cat' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'po_gallery_cat' ),
		'search_items'      => __( 'Search Categories' , 'po_team_cat' ),
		'all_items'         => __( 'All Categories', 'po_team_cat' ),
		'parent_item'       => __( 'Parent Category', 'po_team_cat' ),
		'parent_item_colon' => __( 'Parent Category:', 'po_team_cat' ),
		'edit_item'         => __( 'Edit Category', 'po_team_cat' ),
		'update_item'       => __( 'Update Category', 'po_team_cat' ),
		'add_new_item'      => __( 'Add New Category', 'po_team_cat' ),
		'new_item_name'     => __( 'New Category Name', 'po_team_cat' ),
		'menu_name'         => __( 'Categories', 'po_gallery_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'team-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'team_categories', array( 'team' ), $args );
}
add_action( 'init', 'po_team_cat' );



/* TEAM POST TYPE
------------------------------------------------------- */  

function po_teams() {
	
	$teamname = get_theme_mod( 'team_name','Team');
	$teamslug = get_theme_mod( 'team_slug');

	$labels = array(
		'name'                => $teamname,
		'singular_name'       => $teamname,
		'menu_name'           => $teamname,
		'parent_item_colon'   => __( 'Parent:', 'po_team' ),
		'all_items'           => $teamname,
		'view_item'           => __( 'View Item', 'po_team' ),
		'add_new_item'        => __( 'Add New', 'po_team' ),
		'add_new'             => __( 'Add New', 'po_team' ),
		'edit_item'           => __( 'Edit Item', 'po_team' ),
		'update_item'         => __( 'Update Item', 'po_team' ),
		'search_items'        => __( 'Search Items', 'po_team' ),
		'not_found'           => __( 'No Items found', 'po_team' ),
		'not_found_in_trash'  => __( 'No Items found in Trash', 'po_team' ),
	);
	$args = array(
		'label'               => __( 'Team', 'po_team' ),
		'description'         => __( 'Team', 'po_team' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'team_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'           => array( 'slug' => $teamslug ,'with_front' => false ),
	);
	register_post_type( 'team', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_teams', 0 );
}


/* CLIENT CATEGORIES TAXONOMY
------------------------------------------------------- */  

function po_client_show_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Client Categories', 'taxonomy general name', 'po_client_show_cat' ),
		'singular_name'     => _x( 'Client Category', 'taxonomy singular name', 'po_client_show_cat' ),
		'search_items'      => __( 'Search Client Categories', 'po_client_show_cat' ),
		'all_items'         => __( 'All Client Categories', 'po_client_show_cat' ),
		'parent_item'       => __( 'Parent Client Category', 'po_client_show_cat' ),
		'parent_item_colon' => __( 'Parent Client Category:', 'po_client_show_cat' ),
		'edit_item'         => __( 'Edit Client Category', 'po_client_show_cat' ),
		'update_item'       => __( 'Update Client Category', 'po_client_show_cat' ),
		'add_new_item'      => __( 'Add New Client Category', 'po_client_show_cat' ),
		'new_item_name'     => __( 'New Client Category Name', 'po_client_show_cat' ),
		'menu_name'         => __( 'Client Categories', 'po_client_show_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'client-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'client_categories', array( 'clients' ), $args );
}
add_action( 'init', 'po_client_show_cat' );



/* CLIENT POST TYPE
------------------------------------------------------- */  

function po_client_shows() {

	$labels = array(
		'name'                => _x( 'Clients', 'Post Type General Name', 'po_client_show' ),
		'singular_name'       => _x( 'Clients', 'Post Type Singular Name', 'po_client_show' ),
		'menu_name'           => __( 'Clients', 'po_client_show' ),
		'parent_item_colon'   => __( 'Parent Client:', 'po_client_show' ),
		'all_items'           => __( 'Clients', 'po_client_show' ),
		'view_item'           => __( 'View Clients', 'po_client_show' ),
		'add_new_item'        => __( 'Add New', 'po_client_show' ),
		'add_new'             => __( 'Add New', 'po_client_show' ),
		'edit_item'           => __( 'Edit Client', 'po_client_show' ),
		'update_item'         => __( 'Update Client', 'po_client_show' ),
		'search_items'        => __( 'Search Client', 'po_client_show' ),
		'not_found'           => __( 'No cliens found', 'po_client_show' ),
		'not_found_in_trash'  => __( 'No clients found in Trash', 'po_client_show' ),
	);
	$args = array(
		'label'               => __( 'Clients', 'po_client_show' ),
		'description'         => __( 'Clients', 'po_client_show' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'client_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-businessman',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'clients', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_client_shows', 0 );

/* CAROUSEL GROUPS TAXONOMY
------------------------------------------------------- */  

function po_carousel_groups() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Carousel Categories', 'taxonomy general name', 'po_carousels_cat' ),
		'singular_name'     => _x( 'Carousel Category', 'taxonomy singular name', 'po_carousels_cat' ),
		'search_items'      => __( 'Search Carousel Categories', 'po_carousels_cat' ),
		'all_items'         => __( 'All Carousel Categories', 'po_carousels_cat' ),
		'parent_item'       => __( 'Parent Carousel Category', 'po_carousels_cat' ),
		'parent_item_colon' => __( 'Parent Carousel Category:', 'po_carousels_cat' ),
		'edit_item'         => __( 'Edit Carousel Category', 'po_carousels_cat' ),
		'update_item'       => __( 'Update Carousel Category', 'po_carousels_cat' ),
		'add_new_item'      => __( 'Add New Carousel Category', 'po_carousels_cat' ),
		'new_item_name'     => __( 'New Carousel Category Name', 'po_carousels_cat' ),
		'menu_name'         => __( 'Carousel Categories', 'po_carousels_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'carousel-group' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'carousel_groups', array( 'carousel' ), $args );
}
add_action( 'init', 'po_carousel_groups' );



/* CAROUSEL POST TYPE
------------------------------------------------------- */  

function po_carousel() {

	$labels = array(
		'name'                => _x( 'Carousel', 'Post Type General Name', 'po_carousels' ),
		'singular_name'       => _x( 'Carousel', 'Post Type Singular Name', 'po_carousels' ),
		'menu_name'           => __( 'Carousel', 'po_carousels' ),
		'parent_item_colon'   => __( 'Parent Carousel:', 'po_carousels' ),
		'all_items'           => __( 'Carousels', 'po_carousels' ),
		'view_item'           => __( 'View Carousel Item', 'po_carousels' ),
		'add_new_item'        => __( 'Add New', 'po_carousels' ),
		'add_new'             => __( 'Add New', 'po_carousels' ),
		'edit_item'           => __( 'Edit Carousel Item', 'po_carousels' ),
		'update_item'         => __( 'Update Carousel Item', 'po_carousels' ),
		'search_items'        => __( 'Search Carousel Items', 'po_carousels' ),
		'not_found'           => __( 'No Carousel items found', 'po_carousels' ),
		'not_found_in_trash'  => __( 'No Carousel items found in Trash', 'po_carousels' ),
	);
	$args = array(
		'label'               => __( 'Carousel', 'po_carousels' ),
		'description'         => __( 'Carousel', 'po_carousels' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'carousel_groups' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-slides',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'carousel', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_carousel', 0 );

/* TESTIMONIALS CATEGORY TAXONOMY
------------------------------------------------------- */  

function po_testimonial_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Testimonial Categories', 'taxonomy general name', 'po_testimonial_cat' ),
		'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name', 'po_testimonial_cat' ),
		'search_items'      => __( 'Search Testimonial Categories', 'po_testimonial_cat' ),
		'all_items'         => __( 'All Testimonial Categories', 'po_testimonial_cat' ),
		'parent_item'       => __( 'Parent Testimonial Category', 'po_testimonial_cat' ),
		'parent_item_colon' => __( 'Parent Testimonial Category:', 'po_testimonial_cat' ),
		'edit_item'         => __( 'Edit Testimonial Category', 'po_testimonial_cat' ),
		'update_item'       => __( 'Update Testimonial Category', 'po_testimonial_cat' ),
		'add_new_item'      => __( 'Add New Testimonial Category', 'po_testimonial_cat' ),
		'new_item_name'     => __( 'New Testimonial Category Name', 'po_testimonial_cat' ),
		'menu_name'         => __( 'Testimonial Categories', 'po_testimonial_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonial-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'testimonial_categories', array( 'testimonials' ), $args );
}
add_action( 'init', 'po_testimonial_cat' );



/* TESTIMONIALS POST TYPE
------------------------------------------------------- */  

function po_testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'po_testimonial' ),
		'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name', 'po_testimonial' ),
		'menu_name'           => __( 'Testimonials', 'po_testimonial' ),
		'parent_item_colon'   => __( 'Parent Testimonials:', 'po_testimonial' ),
		'all_items'           => __( 'Testimonials', 'po_testimonial' ),
		'view_item'           => __( 'View Testimonials', 'po_testimonial' ),
		'add_new_item'        => __( 'Add New', 'po_testimonial' ),
		'add_new'             => __( 'Add New', 'po_testimonial' ),
		'edit_item'           => __( 'Edit Testimonials', 'po_testimonial' ),
		'update_item'         => __( 'Update Testimonials', 'po_testimonial' ),
		'search_items'        => __( 'Search Testimonials', 'po_testimonial' ),
		'not_found'           => __( 'No Testimonials found', 'po_testimonial' ),
		'not_found_in_trash'  => __( 'No testimonials found in Trash', 'po_testimonial' ),
	);
	$args = array(
		'label'               => __( 'Testimonials', 'po_testimonial' ),
		'description'         => __( 'Testimonials', 'po_testimonial' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'testimonial_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-editor-quote',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'testimonials', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_testimonials', 0 );

/* FOOTER COLUMN TAXONOMY
------------------------------------------------------- */  

function po_footer_column_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Footer Column Categories', 'footer column general name', 'po_footer_column_cat' ),
		'singular_name'     => _x( 'Footer Column Category', 'footer column singular name', 'po_footer_column_cat' ),
		'search_items'      => __( 'Search Footer Column Categories', 'po_footer_column_cat' ),
		'all_items'         => __( 'All Footer Column Categories', 'po_footer_column_cat' ),
		'parent_item'       => __( 'Parent Footer Column Category', 'po_footer_column_cat' ),
		'parent_item_colon' => __( 'Parent Footer Column Category:', 'po_footer_column_cat' ),
		'edit_item'         => __( 'Edit Footer Column Columnonial Category', 'po_footer_column_cat' ),
		'update_item'       => __( 'Update Footer Column Category', 'po_footer_column_cat' ),
		'add_new_item'      => __( 'Add New Footer Column Category', 'po_footer_column_cat' ),
		'new_item_name'     => __( 'New Footer Column Category Name', 'po_footer_column_cat' ),
		'menu_name'         => __( 'Footer Column Categories', 'po_footer_column_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'footer-column-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'footer_column_categories', array( 'footer_column' ), $args );
}
add_action( 'init', 'po_footer_column_cat' );



/* FOOTER COLUMN POST TYPE
------------------------------------------------------- */  

function po_footer_column() {

	$labels = array(
		'name'                => _x( 'Footer Columns', 'Post Type General Name', 'po_footer_column' ),
		'singular_name'       => _x( 'Footer Column', 'Post Type Singular Name', 'po_footer_column' ),
		'menu_name'           => __( 'Footer Columns', 'po_footer_column' ),
		'parent_item_colon'   => __( 'Parent Footer Column:', 'po_footer_column' ),
		'all_items'           => __( 'Footer Columns', 'po_footer_column' ),
		'view_item'           => __( 'View Footer Column', 'po_footer_column' ),
		'add_new_item'        => __( 'Add New', 'po_footer_column' ),
		'add_new'             => __( 'Add New', 'po_footer_column' ),
		'edit_item'           => __( 'Edit Footer Column', 'po_footer_column' ),
		'update_item'         => __( 'Update Footer Column', 'po_footer_column' ),
		'search_items'        => __( 'Search Footer Columns', 'po_footer_column' ),
		'not_found'           => __( 'No Footer Column found', 'po_footer_column' ),
		'not_found_in_trash'  => __( 'No Footer Column found in Trash', 'po_footer_column' ),
	);
	$args = array(
		'label'               => __( 'Footer Columns', 'po_footer_column' ),
		'description'         => __( 'Footer Columns', 'po_footer_column' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'footer_column_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-align-center',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'footer_column', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_footer_column', 0 );


if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {

/* SLIDER TITLES CATEGORY TAXONOMY
------------------------------------------------------- */  

function po_slider_title_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Slider Title Categories', 'taxonomy general name', 'po_slider_title_cat' ),
		'singular_name'     => _x( 'Slider Title Category', 'taxonomy singular name', 'po_slider_title_cat' ),
		'search_items'      => __( 'Search Slider Title Categories', 'po_slider_title_cat' ),
		'all_items'         => __( 'All Slider Title Categories', 'po_slider_title_cat' ),
		'parent_item'       => __( 'Parent Slider Title Category', 'po_slider_title_cat' ),
		'parent_item_colon' => __( 'Parent Slider Title Category:', 'po_slider_title_cat' ),
		'edit_item'         => __( 'Edit Slider Title Category', 'po_slider_title_cat' ),
		'update_item'       => __( 'Update Slider Title Category', 'po_slider_title_cat' ),
		'add_new_item'      => __( 'Add New Slider Title Category', 'po_slider_title_cat' ),
		'new_item_name'     => __( 'New Slider Title Category Name', 'po_slider_title_cat' ),
		'menu_name'         => __( 'ST Categories', 'po_slider_title_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'slider-title-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'slider_title_categories', array( 'slider_titles' ), $args );
}
add_action( 'init', 'po_slider_title_cat' );



/* SLIDER TITLES POST TYPE
------------------------------------------------------- */  

function po_slider_titles() {

	$labels = array(
		'name'                => _x( 'Slider Titles', 'Post Type General Name', 'po_slider_title' ),
		'singular_name'       => _x( 'Slider Titles', 'Post Type Singular Name', 'po_slider_title' ),
		'menu_name'           => __( 'Slider Titles', 'po_slider_title' ),
		'parent_item_colon'   => __( 'Parent Slider Titles:', 'po_slider_title' ),
		'all_items'           => __( 'Slider Titles', 'po_slider_title' ),
		'view_item'           => __( 'View Slider Titles', 'po_slider_title' ),
		'add_new_item'        => __( 'Add New', 'po_slider_title' ),
		'add_new'             => __( 'Add New', 'po_slider_title' ),
		'edit_item'           => __( 'Edit Slider Titles', 'po_slider_title' ),
		'update_item'         => __( 'Update Slider Titles', 'po_slider_title' ),
		'search_items'        => __( 'Search Slider Titles', 'po_slider_title' ),
		'not_found'           => __( 'No Slider Titles found', 'po_slider_title' ),
		'not_found_in_trash'  => __( 'No Slider Titles found in Trash', 'po_slider_title' ),
	);
	$args = array(
		'label'               => __( 'Slider Titles', 'po_slider_title' ),
		'description'         => __( 'Slider Titles', 'po_slider_title' ),
		'labels'              => $labels,
		'supports'            => array( 'title'),
		'taxonomies'          => array( 'slider_title_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-editor-paste-text',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider_titles', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_slider_titles', 0 );

}

/* GALLERY CATEGORY TAXONOMY
------------------------------------------------------- */  

function po_gallery_cat() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'po_gallery_cat' ),
		'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'po_gallery_cat' ),
		'search_items'      => __( 'Search Gallery Categories', 'po_gallery_cat' ),
		'all_items'         => __( 'All Gallery Categories', 'po_gallery_cat' ),
		'parent_item'       => __( 'Parent Gallery Category', 'po_gallery_cat' ),
		'parent_item_colon' => __( 'Parent Gallery Category:', 'po_gallery_cat' ),
		'edit_item'         => __( 'Edit Gallery Category', 'po_gallery_cat' ),
		'update_item'       => __( 'Update Gallery Category', 'po_gallery_cat' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'po_gallery_cat' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'po_gallery_cat' ),
		'menu_name'         => __( 'Gallery Categories', 'po_gallery_cat' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery-category' ),
	);
	
	// create a new taxonomy
	register_taxonomy( 'gallery_categories', array( 'gallery' ), $args );
}
add_action( 'init', 'po_gallery_cat' );


/* GALLERY POST TYPE
------------------------------------------------------- */  

function po_galleries() {

	$labels = array(
		'name'                => _x( 'Galleries', 'Post Type General Name', 'po_gallery' ),
		'singular_name'       => _x( 'Galleries', 'Post Type Singular Name', 'po_gallery' ),
		'menu_name'           => __( 'Galleries', 'po_gallery' ),
		'parent_item_colon'   => __( 'Parent Gallery:', 'po_gallery' ),
		'all_items'           => __( 'Galleries', 'po_gallery' ),
		'view_item'           => __( 'View Gallery', 'po_gallery' ),
		'add_new_item'        => __( 'Add New', 'po_gallery' ),
		'add_new'             => __( 'Add New', 'po_gallery' ),
		'edit_item'           => __( 'Edit Gallery', 'po_gallery' ),
		'update_item'         => __( 'Update Gallery', 'po_gallery' ),
		'search_items'        => __( 'Search Galleries', 'po_gallery' ),
		'not_found'           => __( 'No Galleries found', 'po_gallery' ),
		'not_found_in_trash'  => __( 'No Galleries found in Trash', 'po_gallery' ),
	);
	$args = array(
		'label'               => __( 'Gallery', 'po_gallery' ),
		'description'         => __( 'Gallery', 'po_gallery' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'gallery_categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-images-alt2',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'gallery', $args );

}

// Hook into the 'init' action
add_action( 'init', 'po_galleries', 0 );




/* SECTION SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_section_button( $buttons ) {
   array_push( $buttons, "|", "section" );
   return $buttons;
}

function po_add_section_plugin( $plugin_array ) {
   $plugin_array['section'] = plugins_url('/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_section_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_section_plugin' );
      add_filter( 'mce_buttons', 'po_register_section_button' );
   }

}

add_action('init', 'po_section_button');

if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
} else {

/* sectionportfolio SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_sectionportfolio_button( $buttons ) {
   array_push( $buttons, "|", "sectionportfolio" );
   return $buttons;
}

function po_add_sectionportfolio_plugin( $plugin_array ) {
   $plugin_array['sectionportfolio'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_sectionportfolio_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_sectionportfolio_plugin' );
      add_filter( 'mce_buttons', 'po_register_sectionportfolio_button' );
   }

}

add_action('init', 'po_sectionportfolio_button');

}


/* COLUMN SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_column_button( $buttons ) {
   array_push( $buttons, "|", "column" );
   return $buttons;
}

function po_add_column_plugin( $plugin_array ) {
   $plugin_array['column'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_column_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_column_plugin' );
      add_filter( 'mce_buttons', 'po_register_column_button' );
   }

}

add_action('init', 'po_column_button');


/* NEWROW SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_newrow_button( $buttons ) {
   array_push( $buttons, "|", "newrow" );
   return $buttons;
}

function po_add_newrow_plugin( $plugin_array ) {
   $plugin_array['newrow'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_newrow_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_newrow_plugin' );
      add_filter( 'mce_buttons', 'po_register_newrow_button' );
   }

}

add_action('init', 'po_newrow_button');



/* HEADER SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_header_button( $buttons ) {
   array_push( $buttons, "|", "header" );
   return $buttons;
}

function po_add_header_plugin( $plugin_array ) {
   $plugin_array['header'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_header_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_header_plugin' );
      add_filter( 'mce_buttons', 'po_register_header_button' );
   }

}

add_action('init', 'po_header_button');


/* TEXT SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_text_button( $buttons ) {
   array_push( $buttons, "|", "text" );
   return $buttons;
}

function po_add_text_plugin( $plugin_array ) {
   $plugin_array['text'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_text_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_text_plugin' );
      add_filter( 'mce_buttons', 'po_register_text_button' );
   }

}

add_action('init', 'po_text_button');


/* MEDIA SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_pomedia_button( $buttons ) {
   array_push( $buttons, "|", "pomedia" );
   return $buttons;
}

function po_add_pomedia_plugin( $plugin_array ) {
   $plugin_array['pomedia'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_pomedia_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_pomedia_plugin' );
      add_filter( 'mce_buttons', 'po_register_pomedia_button' );
   }

}

add_action('init', 'po_pomedia_button');


/* BUTTON SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_po_button_button( $buttons ) {
   array_push( $buttons, "|", "po_button" );
   return $buttons;
}

function po_add_po_button_plugin( $plugin_array ) {
   $plugin_array['po_button'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_po_button_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_po_button_plugin' );
      add_filter( 'mce_buttons', 'po_register_po_button_button' );
   }

}

add_action('init', 'po_po_button_button');


/* ICONBOX SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_iconbox_button( $buttons ) {
   array_push( $buttons, "|", "iconbox" );
   return $buttons;
}

function po_add_iconbox_plugin( $plugin_array ) {
   $plugin_array['iconbox'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_iconbox_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_iconbox_plugin' );
      add_filter( 'mce_buttons', 'po_register_iconbox_button' );
   }

}

add_action('init', 'po_iconbox_button');

/* COUNT SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_count_button( $buttons ) {
   array_push( $buttons, "|", "count" );
   return $buttons;
}

function po_add_count_plugin( $plugin_array ) {
   $plugin_array['count'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_count_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_count_plugin' );
      add_filter( 'mce_buttons', 'po_register_count_button' );
   }

}

add_action('init', 'po_count_button');

/* PROGRESS BAR SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_progress_button( $buttons ) {
   array_push( $buttons, "|", "progress" );
   return $buttons;
}

function po_add_progress_plugin( $plugin_array ) {
   $plugin_array['progress'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_progress_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_progress_plugin' );
      add_filter( 'mce_buttons', 'po_register_progress_button' );
   }

}

add_action('init', 'po_progress_button');

if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {

/* PORTFOLIO SHOWCASE SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_portfolios_button( $buttons ) {
   array_push( $buttons, "|", "portfolios" );
   return $buttons;
}

function po_add_portfolios_plugin( $plugin_array ) {
   $plugin_array['portfolios'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_portfolios_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_portfolios_plugin' );
      add_filter( 'mce_buttons', 'po_register_portfolios_button' );
   }

}

add_action('init', 'po_portfolios_button');
}

if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {


/* PORTFOLIO DETAILS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_portfoliod_button( $buttons ) {
   array_push( $buttons, "|", "portfoliod" );
   return $buttons;
}

function po_add_portfoliod_plugin( $plugin_array ) {
   $plugin_array['portfoliod'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_portfoliod_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_portfoliod_plugin' );
      add_filter( 'mce_buttons', 'po_register_portfoliod_button' );
   }

}

add_action('init', 'po_portfoliod_button');
}


/* CAROUSEL SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_carousel_button( $buttons ) {
   array_push( $buttons, "|", "carousel" );
   return $buttons;
}

function po_add_carousel_plugin( $plugin_array ) {
   $plugin_array['carousel'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_carousel_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_carousel_plugin' );
      add_filter( 'mce_buttons', 'po_register_carousel_button' );
   }

}

add_action('init', 'po_carousel_button');


/* GOOGLEMAPS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_googlemaps_button( $buttons ) {
   array_push( $buttons, "|", "googlemaps" );
   return $buttons;
}

function po_add_googlemaps_plugin( $plugin_array ) {
   $plugin_array['googlemaps'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_googlemaps_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_googlemaps_plugin' );
      add_filter( 'mce_buttons', 'po_register_googlemaps_button' );
   }

}

add_action('init', 'po_googlemaps_button');


/* CLIENTS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_clients_button( $buttons ) {
   array_push( $buttons, "|", "clients" );
   return $buttons;
}

function po_add_clients_plugin( $plugin_array ) {
   $plugin_array['clients'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_clients_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_clients_plugin' );
      add_filter( 'mce_buttons', 'po_register_clients_button' );
   }

}

add_action('init', 'po_clients_button');

if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {

/* TEAM SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_team_button( $buttons ) {
   array_push( $buttons, "|", "team" );
   return $buttons;
}

function po_add_team_plugin( $plugin_array ) {
   $plugin_array['team'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_team_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_team_plugin' );
      add_filter( 'mce_buttons', 'po_register_team_button' );
   }

}

add_action('init', 'po_team_button');

}


/* TESTIMONIALS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_testimonials_button( $buttons ) {
   array_push( $buttons, "|", "testimonials" );
   return $buttons;
}

function po_add_testimonials_plugin( $plugin_array ) {
   $plugin_array['testimonials'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_testimonials_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_testimonials_plugin' );
      add_filter( 'mce_buttons', 'po_register_testimonials_button' );
   }

}

add_action('init', 'po_testimonials_button');


/* SOCIAL SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_social_button( $buttons ) {
   array_push( $buttons, "|", "social" );
   return $buttons;
}

function po_add_social_plugin( $plugin_array ) {
   $plugin_array['social'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_social_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_social_plugin' );
      add_filter( 'mce_buttons', 'po_register_social_button' );
   }

}

add_action('init', 'po_social_button');


/* SOCIAL PERSON SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_social_person_button( $buttons ) {
   array_push( $buttons, "|", "social_person" );
   return $buttons;
}

function po_add_social_person_plugin( $plugin_array ) {
   $plugin_array['social_person'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_social_person_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_social_person_plugin' );
      add_filter( 'mce_buttons', 'po_register_social_person_button' );
   }

}

add_action('init', 'po_social_person_button');


/* TWEETS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_tweets_button( $buttons ) {
   array_push( $buttons, "|", "tweets" );
   return $buttons;
}

function po_add_tweets_plugin( $plugin_array ) {
   $plugin_array['tweets'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_tweets_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_tweets_plugin' );
      add_filter( 'mce_buttons', 'po_register_tweets_button' );
   }

}

add_action('init', 'po_tweets_button');


/* RECENT POSTS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_recent_posts_button( $buttons ) {
   array_push( $buttons, "|", "recent_posts" );
   return $buttons;
}

function po_add_recent_posts_plugin( $plugin_array ) {
   $plugin_array['recent_posts'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_recent_posts_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_recent_posts_plugin' );
      add_filter( 'mce_buttons', 'po_register_recent_posts_button' );
   }

}

add_action('init', 'po_recent_posts_button');

if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
} else {

/* FOOTER PORTFOLIO SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_footer_portfolio_button( $buttons ) {
   array_push( $buttons, "|", "footer_portfolio" );
   return $buttons;
}

function po_add_footer_portfolio_plugin( $plugin_array ) {
   $plugin_array['footer_portfolio'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_footer_portfolio_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_footer_portfolio_plugin' );
      add_filter( 'mce_buttons', 'po_register_footer_portfolio_button' );
   }

}

add_action('init', 'po_footer_portfolio_button');

}

if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
} else {

/* GO TO SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_goto_button( $buttons ) {
   array_push( $buttons, "|", "goto" );
   return $buttons;
}

function po_add_goto_plugin( $plugin_array ) {
   $plugin_array['goto'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_goto_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_goto_plugin' );
      add_filter( 'mce_buttons', 'po_register_goto_button' );
   }

}

add_action('init', 'po_goto_button');
}

if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
} else {

/* ODOMETER SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_odometer_button( $buttons ) {
   array_push( $buttons, "|", "odometer" );
   return $buttons;
}

function po_add_odometer_plugin( $plugin_array ) {
   $plugin_array['odometer'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_odometer_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_odometer_plugin' );
      add_filter( 'mce_buttons', 'po_register_odometer_button' );
   }

}

add_action('init', 'po_odometer_button');

}

/* RECENT POSTS SHORTCODE BUTTON
------------------------------------------------------- */  

function po_register_recentposts_button( $buttons ) {
   array_push( $buttons, "|", "recentposts" );
   return $buttons;
}

function po_add_recentposts_plugin( $plugin_array ) {
   $plugin_array['recentposts'] = plugins_url( '/js/shortcode-buttons/shortcode-buttons.js', __FILE__ );
   return $plugin_array;
}

function po_recentposts_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'po_add_recentposts_plugin' );
      add_filter( 'mce_buttons', 'po_register_recentposts_button' );
   }

}

add_action('init', 'po_recentposts_button');