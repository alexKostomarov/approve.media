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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'approve_media' );

/** MySQL database username */
define( 'DB_USER', '' );

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
define('AUTH_KEY',         ',Tf>MvgfexpVGR18bVc)g{HD{l-v,>$eh,:`W7*_Wg`@?1HV~{F!KW?L}Ay_v]BqI=G');
define('SECURE_AUTH_KEY',  '+%$?LCg-6gSrbEa;z;rfg}%#$gR*1]]_q}nA]|e]A]i{Iu1pL0GmiXZ8@?Y|n[`U]=');
define('LOGGED_IN_KEY',    '?zr(V)Gc#,S#g  33U txRM)]}[?1W;ZVfg=GXnoR{*PB204a#jn.HL|~!5EO- X,x');
define('NONCE_KEY',        'l.`(M8F%k]53+]wt^l0GBsjEWb.l`+br`1hCqGH/RG=6.4LBL$[`1iUCLmJC}TVJ');
define('AUTH_SALT',        'Y,?B)/S$+7cC$H#5=|A0qAQN-qI={>GJF|WnE-+J`5K(o]IaBTzg8T}^qXOW5+*M');
define('SECURE_AUTH_SALT', 'yq$L*4 e4VZ~fdgVn?pw1.Xo/[i5 #>+M%%yPWs{c8Da-(X[o+^s`KTA%>ben]dt@3j');
define('LOGGED_IN_SALT',   '4{YA-<.i@9ezFkgfdUO&R,LEnnuixA|ZKy**WP/:+^B|>oWXrg-l`|-GLFEB.=8lo.;');
define('NONCE_SALT',       '|_@d~i(TB/dPgfd-IyG2OA^GZb|dq-j>oaljg;;TvR$x#,q+]8Z(B5K>[~&,oW:M}Nq');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
