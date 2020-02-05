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
define( 'DB_NAME', 'tr_travel_cream' );

/** MySQL database username */
define( 'DB_USER', 'wp_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         '7Aw8g68/]1`DMytkPJ{Z^u_j+R/qPL/VeGzQZQiQa%0Wv ?0tY>?~}$`Ox8#Uzdc' );
define( 'SECURE_AUTH_KEY',  '&oC4HuoO8x1YX{kG:1Zr;TZ3>:a>Bn3%+Y8kdzr}#0K/edw/*T(II5Q!=yvmvGn:' );
define( 'LOGGED_IN_KEY',    '<8LTadREe&ef_R4g;$Sw^WQ+S2Aq7iGaVEl|Xl/ber1Gy1 u>e`O^oeHY.RTgqIu' );
define( 'NONCE_KEY',        '-w|1d4#114?UCq51s|?pbO~{/-4KgAM}z*nXpd9GS/k`D&N2.fgik(6r@:yD:VQ{' );
define( 'AUTH_SALT',        '/a;QF/-~@<YTR7L2KR>Df6Zka~++PBo Q)6O&YE:AHxhn .f|FBHhTGYc,qRDLE[' );
define( 'SECURE_AUTH_SALT', 'uL9B}bQ2+R/2VuwF(A@v*f9A.xU3?|RHmND/Je1]~;Xv+cl5mY6D| 9E,lFrny:4' );
define( 'LOGGED_IN_SALT',   'bz?cf75IL*{kU7S|*9nx)/EbMUqvBLEL>Fo[qGB$Pd<G,z9Qnzfp`[V{;Dd}5=O/' );
define( 'NONCE_SALT',       'fR((koPWlPb57-(62WDEfN!iqA$cK0!o*H>jDlGTc.pj1ND?lo;wF*0M:P7]wd+)' );

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
