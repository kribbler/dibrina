<?php
/**
 * Theme License.
 */

// This is the URL our updater / license checker pings. 
define( 'EDD_SL_STORE_URL', 'http://pixelobject.com' ); 

// The name of your product. 
define( 'EDD_SL_THEME_NAME', 'Nibiru' ); 



/***********************************************
* This is our updater
***********************************************/

if ( !class_exists( 'EDD_SL_Theme_Updater' ) ) {
	// Load our custom theme updater
	include( dirname( __FILE__ ) . '/EDD_SL_Theme_Updater.php' );
}

function edd_sl_sample_theme_updater() {

	$test_license = trim( get_option( 'edd_sample_theme_license_key' ) );

	$edd_updater = new EDD_SL_Theme_Updater( array(
			'remote_api_url' 	=> EDD_SL_STORE_URL, 	// Our store URL that is running EDD
			'version' 			=> '2.1.1', 				// The current theme version we are running
			'license' 			=> $test_license, 		// The license key (used get_option above to retrieve from DB)
			'item_name' 		=> EDD_SL_THEME_NAME,	// The name of this theme
			'author'			=> 'Pixelobject'	// The author's name
		)
	);
}
add_action( 'admin_init', 'edd_sl_sample_theme_updater' );


/***********************************************
* Add our menu item
***********************************************/

function edd_sample_theme_license_menu() {
	add_theme_page( 'Nibiru License', 'Nibiru License', 'manage_options', 'nibiru-license', 'edd_sample_theme_license_page' );
}
add_action('admin_menu', 'edd_sample_theme_license_menu');



/***********************************************
* Sample settings page, substitute with yours
***********************************************/

function edd_sample_theme_license_page() {
	$license 	= get_option( 'edd_sample_theme_license_key' );
	$status 	= get_option( 'edd_sample_theme_license_key_status' );
	?>
	<div class="wrap">
		<h2><?php _e('Theme License Options','po_license'); ?></h2>
		<form method="post" action="options.php">

			<?php settings_fields('edd_sample_theme_license'); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							<?php _e('License Key','po_license'); ?>
						</th>
						<td>
							<input id="edd_sample_theme_license_key" name="edd_sample_theme_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>" />
							<label class="description" for="edd_sample_theme_license_key"><?php _e('Enter your license key','po_license'); ?></label>
						</td>
					</tr>
					<?php if( false !== $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php _e('Activate License','po_license'); ?>
							</th>
							<td>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<span style="color:green;"><?php _e('active','po_license'); ?></span>
									<?php wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>
									<input type="submit" class="button-secondary" name="edd_theme_license_deactivate" value="<?php _e('Deactivate License','po_license'); ?>"/>
								<?php } else {
									wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>
									<input type="submit" class="button-secondary" name="edd_theme_license_activate" value="<?php _e('Activate License','po_license'); ?>"/>
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

function edd_sample_theme_register_option() {
	// creates our settings in the options table
	register_setting('edd_sample_theme_license', 'edd_sample_theme_license_key', 'edd_theme_sanitize_license' );
}
add_action('admin_init', 'edd_sample_theme_register_option');


/***********************************************
* Gets rid of the local license status option
* when adding a new one
***********************************************/

function edd_theme_sanitize_license( $new ) {
	$old = get_option( 'edd_sample_theme_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'edd_sample_theme_license_key_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}

/***********************************************
* Illustrates how to activate a license key.
***********************************************/

function edd_sample_theme_activate_license() {

	if( isset( $_POST['edd_theme_license_activate'] ) ) {
	 	if( ! check_admin_referer( 'edd_sample_nonce', 'edd_sample_nonce' ) )
			return; // get out if we didn't click the Activate button

		global $wp_version;

		$license = trim( get_option( 'edd_sample_theme_license_key' ) );

		$api_params = array(
			'edd_action' => 'activate_license',
			'license' => $license,
			'item_name' => urlencode( EDD_SL_THEME_NAME )
		);

		$response = wp_remote_get( add_query_arg( $api_params, EDD_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "active" or "inactive"

		update_option( 'edd_sample_theme_license_key_status', $license_data->license );

	}
}
add_action('admin_init', 'edd_sample_theme_activate_license');

/***********************************************
* Illustrates how to deactivate a license key.
* This will descrease the site count
***********************************************/

function edd_sample_theme_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['edd_theme_license_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'edd_sample_nonce', 'edd_sample_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'edd_sample_theme_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license' 	=> $license,
			'item_name' => urlencode( EDD_SL_THEME_NAME ) // the name of our product in EDD
		);

		// Call the custom API.
		$response = wp_remote_get( add_query_arg( $api_params, EDD_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' )
			delete_option( 'edd_sample_theme_license_key_status' );

	}
}
add_action('admin_init', 'edd_sample_theme_deactivate_license');



/***********************************************
* Illustrates how to check if a license is valid
***********************************************/

function edd_sample_theme_check_license() {

	global $wp_version;

	$license = trim( get_option( 'edd_sample_theme_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( EDD_SL_THEME_NAME )
	);

	$response = wp_remote_get( add_query_arg( $api_params, EDD_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

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