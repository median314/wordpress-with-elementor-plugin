<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-server' );

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
define( 'AUTH_KEY',         'qcF.j,DoLcq/UyASj>.|-#QhNXSub2:_4f8O2dtB$4Z;PNQX:{%*u)ptn9m0OsC;' );
define( 'SECURE_AUTH_KEY',  '[1b>E.AA0t0Oqd75c:NYa_A3u <8<HYlz7my<_PtVqH<![h0{`0mZ< .f|:X{-ZT' );
define( 'LOGGED_IN_KEY',    'Q(SvS)5>>TT<fBJq^n&f%^3i#Li!gg]P28Rv95rAg!v3X!k,ghY0>(qxC8(O=+L=' );
define( 'NONCE_KEY',        'INLawn!~U>&9V+L;IA(Z8o;c1B}4(UtA@cT]GYcu!IN~`ofr:C9V;(BKW_5G-mT@' );
define( 'AUTH_SALT',        'hZ81Ir(Q<Mn#!FrNHqG#J^L,aG4rR!,PhCcqnPPkC6oN%O68luK#5Gb,IGA*<2|9' );
define( 'SECURE_AUTH_SALT', 'LLQ;izv|IUM7eazTcFM,l=ud`R3]?wzu]%v58(S$!)b?bMwoZ,x&ru&N9X8X$hfO' );
define( 'LOGGED_IN_SALT',   '#3PHrFp*W^vh~(&aaxeuVa7%L0&+n!4_(!sBzfG/o#aP~:>T>`b(@x#`.H5MZ~JM' );
define( 'NONCE_SALT',       'TxyazK?M]}^`dw9(&9$jrXl?ry|&<1VU;HQmD3=hIzj8[a<$SI/Y3y4Foc205neQ' );

define( 'WP_ENVIRONMENT_TYPE', 'local' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
