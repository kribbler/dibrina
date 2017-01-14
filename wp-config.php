<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eVPYxec-@x![=2pmn+P`,~cu;4r{N8Zv%:]tP~6rDOj+M+|e~TR&D7srlr7+bn?.');
define('SECURE_AUTH_KEY',  'INQpQ;$NA?0-6~:+S+C/iW~i+AV8e8h,(~g!qvu4BxKvT${T?=-Y$s~g}Jt8kw&`');
define('LOGGED_IN_KEY',    '%z$ j(Cd3AakffNZE>E*c__{l-k BJ U@;:`oDpHh,P403B2.a;nw32z~wsoMRF`');
define('NONCE_KEY',        'w*IW><3$n<hp^Y]lPy~R,]sAk]UV<Y_!cD+GZ* Y;CsL~hBQOENL}p-dnPt{pz2V');
define('AUTH_SALT',        'd~B--hvOE3D}iLe9Y}SRun82V->!<K;sz)0:~[Ci0&jM[a>3fBXv{0J)K~x]tL+[');
define('SECURE_AUTH_SALT', '8u}A6br[4ns=Z`}}k1IK>=<+4-0u<Pb/:R|rmBth]7q+P/n:nRfQZ/ys=lvmQ#tJ');
define('LOGGED_IN_SALT',   'KOLkT|Db|buYK{weUfFwNk_vNJcwItVTH/B0aRnhQlPq<]518ST }Wi]mvki>E[q');
define('NONCE_SALT',       'n|vcd0YLEI`B2-CIvbDwyC-_2RN` [pO82{9Y&.iQs(}d5Fd( W-+F*v`Y<~-%33');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
