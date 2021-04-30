<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'basicshortcode' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q)DTi ;^txY?U#0jp*Yo~<kO%C=+#jv)N^W) v8hxSnthY%d4[F7z7=J<el9zZG>' );
define( 'SECURE_AUTH_KEY',  '2{o&CbCY=>x.$kp[6maYn,1g2bCFZqWyVC>{bIG.C3_m%#GR]4^XBr5l%-euqa$Q' );
define( 'LOGGED_IN_KEY',    'Db:{Zd-?8f+(~H4yF{,x0DKDTwJ@5,9OqjH9h01yAoh=K%&.l<>Gj&t]4b#qH1mo' );
define( 'NONCE_KEY',        'c6&!m.q+3[& ong^OA(tw6xuoKJ~M!V/zM fE@^~cy{i,}fDCY-M=B3g*!n0v%78' );
define( 'AUTH_SALT',        'W@oJaY6|SnBsj7.~J/ed^y~y65mI|N?A=u6:[w-S;YqEQ5-/o6%4_b|mLZ|nal1b' );
define( 'SECURE_AUTH_SALT', 'ntZdw%Gneb0,:Ac[h.u~JnA+Z@XozGK$uTjiVIcAK4i@5m+3%fJE-kO~*wI+BSh2' );
define( 'LOGGED_IN_SALT',   'm68(DN~0A|x8tJcbCZ=$CJc0}q;XR7B:;B?$1:lTOlpVbgrr4w7o} S@q1G?+2Df' );
define( 'NONCE_SALT',       'O-I(ZcygdChbuN; =,SOyr0Y9Gv,6ZMWii;e:IFD&wPl,Av(okmt,_Q+sZsrih2!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
// define( 'WP_DEBUG', true );
// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
