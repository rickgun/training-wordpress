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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ss_wordpress');

/** MySQL database username */
define('DB_USER', 'ss');

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

define('AUTH_KEY',         'Fy.q]A(N$(/A00@VIHYL=_5Zct6&S?%n-(J {O~>|nB<-Hyg>m^{flhZ1]af;246');
define('SECURE_AUTH_KEY',  'f_1O[-Nj+9BU3PnDs]Q!LC`46u~MjQqQ^]+{CtCQJ8kNNu&MwX<|Mmwrym4Ka`//');
define('LOGGED_IN_KEY',    'KB[jz8bd|c?|4[t^;9+*%r[I#dq?g`6 $~+v/__P|ev#Koh|XYAw^]P14&yT/-zd');
define('NONCE_KEY',        'OYk6>/{ zq^8l|Veb|!UFVX(jHF>]^r-k->k|4o7s6C}io1i<<RW5s8U.jlEZ`72');
define('AUTH_SALT',        '?P!TIIqB/d;..i5Ij6X8X4^!SND;DV>[dD:TI<:|k4jr+1D`z$2s>?)]}|!As=T/');
define('SECURE_AUTH_SALT', 'fk_@1YH=V-Lz7?+ha>?/;0|ag2,%N#k/3i.NON cC|`344|sr`k+XK=T&6V`p o ');
define('LOGGED_IN_SALT',   'eNJE+yh->[bE?R=(u0g-EjFWg{yrF-cD^E&|jt-^:?Q>JEth_N>*6W-i&X-DF|/T');
define('NONCE_SALT',       '0aT3J&9Quh6r8&xLw:d-#&FAE`6~Pu0=,sw+LD<by;S9a+t+cUDU2gs+cVMG&NS_');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
