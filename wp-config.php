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

define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'indococodb');

/** MySQL database username */
define('DB_USER', 'adam');

/** MySQL database password */
define('DB_PASSWORD', '591990');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '5$uXBXXHeVh>7R+41*tQoc0cy7bkEWBhI3?jcL!@TS3@hiO%A&bP54#(`R0AK4p%');
define('SECURE_AUTH_KEY',  '0`/jP5idobtp[3#IPR6U8~UD-6q^/!sOC)[M-.k~T9xDRl7XjlWyd!-=}QArlc M');
define('LOGGED_IN_KEY',    'FT+65vbaXgkUje3j}`pQIxIrmX|nGJ$}]W^(hg$7T*rwF&#P;M29WTd^h[V]%?UL');
define('NONCE_KEY',        '0@n(a4@cRahE!{[ZfjAuyRWAbR8^[Ar3Sahq>PZIY4L fvxpxR2hw.+hYG;a1:.P');
define('AUTH_SALT',        'ZN~6QpOde5R+.SLr~07h0L_:ac#62lZI@ 8DBu`qAd$BzYEP7+6Sy%CQ32&%kr0~');
define('SECURE_AUTH_SALT', '.f6W/3klByxCsX cg49]6hT~w.UPIf_P|^ka>aLgAD!>Kj.3Zp[Z:&$i8Q(:J!g ');
define('LOGGED_IN_SALT',   '{5Odqn+J2M/{mFfAO0q,*ao?khf&7S(<-39s}m<^S323gA%!F-b?CK:CbhDE ;KQ');
define('NONCE_SALT',       'gm7XTRh{c3YwWc#yWcpjiTDhiX7xF&BD>$P;gxJ^U<e`Flz`fO*_`:U7J|Id&X5G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'idco_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
