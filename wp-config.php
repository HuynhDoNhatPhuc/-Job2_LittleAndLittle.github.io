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
define( 'DB_NAME', 'littleandlittle' );

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
define( 'AUTH_KEY',         's}QZAxSuW0-&)VS|oEd^ 3O|`ZTCHjc:Bo0u<0Mx~kp=ib(@NV4(eT(TEU(gh2Rr' );
define( 'SECURE_AUTH_KEY',  'F)PEG ZXiTgT,XN=|> i^dxT<v<YvX[[hUIAVQ>vdE/loBpgs&N)/94I_VVon@r`' );
define( 'LOGGED_IN_KEY',    'Q>{0Asguqp4?wnb{%K?yV{*):Z4 5;O *!r5KmQ~FX6ac<cuJx?T8B,P5)>MJf/J' );
define( 'NONCE_KEY',        '>)2ptpc1[R*4Ah33eZ.7hIsv>P`{$/e,i[=dt<EC$]iNi8ew@o_A8?RYH&9HEQ]?' );
define( 'AUTH_SALT',        'macQ%c-<~Q|]Ln&9!)D|5-q81eJ>OmX~-9EH(#v;:|Po=5`F: U$(z neN&:Cmh2' );
define( 'SECURE_AUTH_SALT', 'eG1qboArYPwgeoR$JfMELHK:ty:yr@E}S?i@=q|(Z3:&{-0O+_J<$A9&oc!:x`wg' );
define( 'LOGGED_IN_SALT',   '(;Cl9|k MwpCl9,7r*2c760VumRr}u}0W_[,;+aFR?PB%rBE)|iGcW(}$q50(d+I' );
define( 'NONCE_SALT',       '`8M0CnC?c=1Ha3[GC*)41IObzB^E_IPIj;&E%GWeO-ctcVZ<d,fAz#fUXH:}8M/k' );

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
