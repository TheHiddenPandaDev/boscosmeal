<?php
define('WP_HOME', 'http://localhost/boscosmeal');
define('WP_SITEURL', 'http://localhost/boscosmeal');
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'boscosmeal' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'test' );
/** Database hostname */
define( 'DB_HOST', 'db' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
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
define( 'AUTH_KEY',          '=;/cwIU{Z[<liA+yrxz7V3cY.?Jo8Ea<33= b|_/i~uB1EjN9lCPgY6y8UwRL k>' );
define( 'SECURE_AUTH_KEY',   'OSk3$0*.@df*e3w832RhwPC/95T69/).rbTd@(J#)ordR(:jAS+c6zw?[1.z]~FM' );
define( 'LOGGED_IN_KEY',     '}.Aa39z+wI<OJz+x8LTc$6XV9&6:+:Gk^;]/fj05Xz@fo.mE[O|G6lxp^Nn/!X<i' );
define( 'NONCE_KEY',         'zhH!8 okLLn,Tzk,7wRsza*5gPB ^l3G .O;eQh1hh4^t^elHOwzx@$u/{K]0xLF' );
define( 'AUTH_SALT',         'S8![i!2Tkb:WhRpMG!>.f]4n1|Z+ mN4URZvU$JLbo1A>`h|$*&{6H3A<-(QoPA7' );
define( 'SECURE_AUTH_SALT',  'B_F@93[CHz{vStV]I.tc&11:e6c%!%{:kwG6?lH&^0s>cEx=E$</+5TS,B+{pu9e' );
define( 'LOGGED_IN_SALT',    '&,.~#.Cw*e6,`VAj?w+tx!6EJ dpk:t^<>GplttR;Jt+h5Z5U%.E4z7b2nF2RZ?3' );
define( 'NONCE_SALT',        'Cwqf]!F8j+K<,/:rTVRm0!owgkR~SAe7,_-y/.L0s7xUC`}^O&`<1u2PnQ|lSS#{' );
define( 'WP_CACHE_KEY_SALT', '1`8G%(v;no1B!6.+HQm<[mSGoQT9Ah[Kdw)p&rL&rkMkxvV58d.$XMyS|`chmZ1?' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nvz_';
/* Add any custom values between this line and the "stop editing" line. */
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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
