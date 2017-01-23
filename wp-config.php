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
define('DB_NAME', 'wp16poltava');

/** MySQL database username */
define('DB_USER', 'wp16poltava');

/** MySQL database password */
define('DB_PASSWORD', '4C4k2I4u');

/** MySQL hostname */
define('DB_HOST', 'wp16poltava.it-dev-lab.com');

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

define('AUTH_KEY',         'x3|^<@B-UP =N0Yuur-WGe3bt-cQf6S;G~77xFCxK&_R+[hOSv^UH2^y87P>%?~H');
define('SECURE_AUTH_KEY',  '&c+>NV)o>=@@ kswa4q_`fO)g$vyJ{Wgl.yxiujnT-KK@|fW7ct|^6 q%4~vFGVP');
define('LOGGED_IN_KEY',    'a~EBNRmUa9.01/IMX7[h6mEHMlv5|JN]Lg0s(>XEz&UG#0783SW)`;K]jo7T3|z8');
define('NONCE_KEY',        'h/.>VcpxUFz%k_qIL*Qh_h+|Krh2AQ.rKa Wi=?J+!@Jm0QW:U32v_Kl2(+J;B*I');
define('AUTH_SALT',        'DO,35h*O.^v6Ojd+J1)Izk|kLL-CqoAa9ON|dkA[GBV0XBa^T+Cm-G1ssQys0?p3');
define('SECURE_AUTH_SALT', '53BSU-Aq.r;2rQ_A-A1;^UN_[Esin!%+w@s`xluJ1l`H2Y4o<46iO-tRB+iN_%Ww');
define('LOGGED_IN_SALT',   ',El$ex/IGyf:-}M@Om.]p[^>`O|4?Nygm+g{6SDlYG:H<QF6<XS*S|yKjOd,R%Gh');
define('NONCE_SALT',       '0R4Gl2Zi(-GE@:-rtC!cD}|;L5^w38ph>Zi~+1iw|45pV`)di;Qrr9xoWYy4=;Qr');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tms_';

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
define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/tms/wp-content' );
define( 'WP_CONTENT_URL', 'wp16poltava.it-dev-lab.com/tms/wp-content');
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
define( 'SCRIPT_DEBUG', true );
define('WP_MEMORY_LIMIT', '64M');
define('WP_CACHE', false );
define('EMPTY_TRASH_DAYS', 7 );
define('WP_HOME', 'http://wp16poltava.it-dev-lab.com/');
define('WP_SITEURL', 'http://wp16poltava.it-dev-lab.com/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
