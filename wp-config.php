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
define('DB_NAME', 'genesis');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'P[Xxe8`^gSs<)(cQdq|UQa!!OJ8fc%9MJPK2b>L@Tkw^A${},ZsAk(<J}jlbx_}t');
define('SECURE_AUTH_KEY',  'Rw?5h[a5^Qy0,H?T`p}ft1Lw1K)nt?%o6+I;JvXt4wNeRVf.wwx>QNcbLeGWyy+i');
define('LOGGED_IN_KEY',    'O{g|A?MzPacB34GO|g%~F6E^-S{zHS:k;M1d(^+bHx)W!0XK1+R]r#Q6rCzQHN(g');
define('NONCE_KEY',        '_B|7`-|(Am*?V{|no#DL?^N^Ofl,t^VJ_t+E9+.&1B3KcCfB&e:3.B>SWx)?j=<O');
define('AUTH_SALT',        'g~,00[28!+s;U76%lP9B=r,%9UlM=e#SiTg<2,0$!%m{PTT[~=S{fe*+y;)vw:f<');
define('SECURE_AUTH_SALT', '=,b0c+@j(Lwc1ApV;/MT5yx9&d0*vgzuyj+XPpDi;h0$ojaERY3~.kn%[y}Hlsh*');
define('LOGGED_IN_SALT',   '~(Sb{@:rzQi(-n$0}D[Z-aM_6z4YLR0yTD?kr|ZM{LhOou+&0@0IJ<l;BB3G4/(v');
define('NONCE_SALT',       'lx(R805-Hs-M!_U~Ha=hfa#u9*YWqItD{85N8|L5AHl7x2&KR!1t6{D<^=@Bq8)&');

/**#@-*/

define('WP_HOME','http://localhost/genesis/');
define('WP_SITEURL','http://localhost/genesis');


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
