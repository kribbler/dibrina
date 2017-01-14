<?php
/*
* Plugin Name: Love It Pro
 * Plugin URI: http://pippinsplugins.com/love-it-pro
 * Description: Adds a "Love It" link to posts, pages, and custom post types
 * Version: 1.3.0
 * Author: Pippin Williamson
 * Contributors: mordauk, fatmedia
 * Author URI: http://pippinsplugins.com
*/

/**
 * Setup plugin constants
 */

if(!defined('LIP_PLUGIN_DIR')) {
	define('LIP_PLUGIN_DIR', dirname(__FILE__));
}
if(!defined('LIP_PLUGIN_URL')) {
	define('LIP_PLUGIN_URL', plugin_dir_url(__FILE__));
}
if(!defined('LIP_PLUGIN_FILE')) {
	define('LIP_PLUGIN_FILE', __FILE__);
}

if( !defined( 'LIP_PLUGIN_VERSION' ) ) define( 'LIP_PLUGIN_VERSION', '1.1.4' );

$lip_options = get_option('lip_settings');

/**
 * Include required files
 */
include(LIP_PLUGIN_DIR . '/includes/display-functions.php');
include(LIP_PLUGIN_DIR . '/includes/love-functions.php');
include(LIP_PLUGIN_DIR . '/includes/scripts.php');
include(LIP_PLUGIN_DIR . '/includes/widgets.php');