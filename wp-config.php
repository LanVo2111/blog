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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '9S9J*h.Fm` Z##o5#=>K%y|b=5eAtT|M,vw0`P|R0Fod{][<#dC eOW>ui6#3VcW');
define('SECURE_AUTH_KEY',  'ou<j*rE0]sLb*#o48sYLWZl{uz47-]/ap4/%R[J|Q<$u7E7[&#uz<&E}TmZ|u#`Y');
define('LOGGED_IN_KEY',    'F^D|ES8/(zmXr,j+ i- VPd3-1Lt44?fCSX+R/lbJtwq[*a{d8sB&NG?!m.:+[D3');
define('NONCE_KEY',        'f!Yt IxTZ=>@aR,_3bL>ezHRl*N_&(]L&/=}y-;p-T~*?6$`;%z)H?}I=neHE6X}');
define('AUTH_SALT',        'OpUU6O7P|R+V1fXZpc|5aCF|+7Y?ADgawytPgC+sT=CV?GDS-/Q6j8S2szmSP:BE');
define('SECURE_AUTH_SALT', 'aK/4kx9n/uQe(-B{g~x,J,*`#-wgY6**jnZd32V<+?-U!Y@y7fMt|_Cq+dHOgJmK');
define('LOGGED_IN_SALT',   'GhZgG3ge]~@I:=1r^7Qi*,XV_Ve1 FGMQL3NVWx]Pg.3[4gU(RKPFF]YYK>9%ozu');
define('NONCE_SALT',       'Q4%y_L=fAx?;Ek?[p#X*3JkT<6?<>%OV1 lLdNK2{x1%xS%o6bSe)[oZNZkpx1hw');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

//mail: seulmin2111@gmail.com
//pass: Lanase@123
