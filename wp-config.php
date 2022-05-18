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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'create-plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'kUNB-( `)^W=;PkldP~##Azmq3Y7)]D}0q%O]1&.EQ~i2-qgLs^|ha_*w]GdCQ .' );
define( 'SECURE_AUTH_KEY',  'S0N2Y4R43Egw9z=RS3.)P_?+>A%PJx0Nn&dNm1eE.>H;&Yv`B55iu/_Vf]8iqjv}' );
define( 'LOGGED_IN_KEY',    '`.D+:X#zIl7h<<:!j^CznIYO68PPq@?G^r=i33Vp@dl;1Z04dISst8M[v9r`Zu.%' );
define( 'NONCE_KEY',        'S7|sJrTd,<=fk[q?/Mz|T?LUc+D&q$1p?#X~$ULoMJW>;-~6lS(fg5%{9;Hy.v7R' );
define( 'AUTH_SALT',        'bz$h8#aW$2N_>_EY$4;w{l&HRZC=FG[b(^VNx.hgeI7[So)^l)F,8A&gf+i&PBh9' );
define( 'SECURE_AUTH_SALT', 'z1.9(f~_H:1(kOO`*Q;.~T}4,V.92Be|=DzgdSND#lApIs0+JU^LHVVuPPj_YYf2' );
define( 'LOGGED_IN_SALT',   'gmsrR+M](wd+I}Opip.Z_1~SZMzTk.@* ^2*H|6N%cu7qdN-t9RY1_C.Ks>5X[F=' );
define( 'NONCE_SALT',       'tY-XBss]zW;Q_WIFWe/jHBb(6_O#yJx%oQ,A)Zq%i8>;p qHO]a%C.6dd[.]Sb Z' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
