<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'hillemanstaging' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'H_tmyF@T/|1}Cc`u<HvS;~fw>8JH:,}D5&4j;-SReJ=o4#R,[S`}puBoJ<e=IVDj' );
define( 'SECURE_AUTH_KEY',  '_O|cydiNe`E29sE!8IdjS!4&/MICWL;o|*e9BXZkf3N0m}Js{-cS>v?N>wa(u F^' );
define( 'LOGGED_IN_KEY',    'x(%vA*-.x?Dg7X7BvB#`/I^+mRj} q~%,SbV>DhJPWLWj]Wg%R3:%i VK{y9)O9;' );
define( 'NONCE_KEY',        '8TMJP(sJvtx+:Kstpx1os:0PKg^kj/kkitsi7UB4L(mw]QJy+8du?1l<.)~&U!xc' );
define( 'AUTH_SALT',        'UD( Ho@}C!~mE*9kQ[_m~hW]e#NCv;>GKOz2^O8thDGtOTP%`II@D#_d%CADUyvd' );
define( 'SECURE_AUTH_SALT', 'F*0qHIfBuU%E8sTV)h((W8L+C`+zf_$PoD Fg%FM<ApKE>wTVFGGe&NE.>&4e^/%' );
define( 'LOGGED_IN_SALT',   'u>f_pw:`:+Vk]ZbG0H9.(JOMNelXmE+QiM2E/6bB#>D,CcG` B;FTAc+)WhaJ<E}' );
define( 'NONCE_SALT',       'T5$|PN]wz)lli}JuVf`Sd!G,hjB%t:5q+Z?@k)ZxF*S#ksC5{qB=wdoDiY5M8G%m' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
