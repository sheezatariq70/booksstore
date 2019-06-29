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
define( 'DB_NAME', 'ebooksstore' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qVea/+x*MDwVGLN<1w9i^f23$e*2x%km~c*-Ouk7}]]+dqRfZ.Uh&:0<C80>8Rm_' );
define( 'SECURE_AUTH_KEY',  'uyTG@J?^ Z+?cPmJG>[fp0fyal@0w4Y8gn.IXrE!ELSdxQp> 7{n7XZj]{q<%BX=' );
define( 'LOGGED_IN_KEY',    '5r%o/j|T~f+Pbzwu)hryG:[-G7[#=,.$_+n~bn^qu{!^-3+OH{i[!gn8S|QvdBky' );
define( 'NONCE_KEY',        'bi~y+4s@v:t@j3F(#.5A2Y!!~h;Jyy17)wS`Pl*RO6X5[!_6L=wm%*dj4L8}WXb.' );
define( 'AUTH_SALT',        'l{GZb5>IZ/=1~RPs5Xl5d10$nWdqE9dg-;hFoUXdZV.{Sv{:5CVEeT.0@N&m|VY+' );
define( 'SECURE_AUTH_SALT', '_/b6P#9ANv!C&Trzp^cebwz3i{):I U?vDR eN%I:i1@mH7#Ltq<OY?_q:k?m~ND' );
define( 'LOGGED_IN_SALT',   '(2]1FsR7Q-eW9Vc1Bt<D&H1iMQF#jRa7K:;%qJbg@R=O8jNAqms-g^s2butLOb;{' );
define( 'NONCE_SALT',       'yPPWVxQnFk0-m3[?34ajK$N|7M%#<oV2ZQ@X?Hl;uE5T86U:TNZT5 rv<|*vfqWX' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
