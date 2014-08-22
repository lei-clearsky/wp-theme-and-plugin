<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'yl7C%[wxlx9r+-`hSj=7Sy]%uzY,gvpP-29iqsA {*ZT#D/zK;p||p?r#)I_FAV3');
define('SECURE_AUTH_KEY',  'j[ENt4?U|-//p1=YU>u{-]xl?3>l#QP(u=>3SsB-%`|VvZkB@}Dl_cN#Xc,D*Jic');
define('LOGGED_IN_KEY',    '1&W|}KUL(~P:{[F q/+NIyQ2f,EzY6Xn0upIGiYk:!%9BpB&tG#7Pcql5RMgw1$m');
define('NONCE_KEY',        '^BII%6U*>138l&sS8p1_*c+~[v<o02rR6-1On>^ kax[H1&dABC3xYP,VJmc|?}_');
define('AUTH_SALT',        '||M/vpOCa;>_0k#J,##R7g}^P,G[yYcg|%s6vo|^).FBtQ0cH!f:?w`:iv`u^t8`');
define('SECURE_AUTH_SALT', 'YpTg-%:!Y0LTh-03QEO=Y][}Vi%9j@2Lx?)~ioga1XQVpi76to,l<aGG;}(,wN,M');
define('LOGGED_IN_SALT',   '/p,;PL,!O6Hd4#4z JV#Rmg{+KP!RN^brqZ+3sH7=K^lXCukTJ+jpu?,gs,xj]Zu');
define('NONCE_SALT',       'V|2y]FJ{|DY|4!|Z6g``(9+>n~6.%3w7I(aqRoWFgk:]UN2*A/@~oo}r6D{7N`<X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
