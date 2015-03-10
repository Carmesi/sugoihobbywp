<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'e123456');

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
define('AUTH_KEY',         'Jw,[}jP!0%9Q1.f|zInO6jX@afJK-*kBmg `+Yp *Plb]G^|4i<0>Zc2+2AQsY>3');
define('SECURE_AUTH_KEY',  'LJ~tl);&nre<8f[ne&+(k6:|L}nH5lNra>Kuf_U|KNz)Sz{+c/i]rP:/>vp%5jI/');
define('LOGGED_IN_KEY',    '-P^=zz5{6v^quHf=(H8LFWmEBR6Xn9Ux1Ta%:;D-N^~AVvSCfKS38 g+?6*@C{9P');
define('NONCE_KEY',        '$s&rO{e^MAH;5j0DX52onM,U{Qd6c{3K|u302(ZKJ6u+Bq@m|NyPQUJ:T&FTFhiy');
define('AUTH_SALT',        'tbvA:a>kRWhUmh@$-N[-u*GQ&D+La) }kLzG{S+6svm8+]46YQ|xVd&]h.i72quK');
define('SECURE_AUTH_SALT', 'NA1<et+^$c8W,I:R!~Ja;)P]7-#ahC,rdq2{(v[ ~.U[KU_s:O]hrAk%K#=|+h.|');
define('LOGGED_IN_SALT',   'NJw+OB2`sH5|Gv,FJpQ]A/pWD#K;@m`z-u _u*:HeMw80)0NwW4{wrX#seSNDQ%A');
define('NONCE_SALT',       'W-k7he[b-<C+.]<#Ckm&b}=.mfFvqey>)-WFO.7|Vpr[==K jHB7;0HSJP1!-^/[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sh_';

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
