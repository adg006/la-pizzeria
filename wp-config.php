<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_lapizzeria' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '{E2T4OIH$gW(1)Iugx(kt`sBY86q.^p&^r8p$$uS2?VD0e&owhn0N.wuH*y5-mIs' );
define( 'SECURE_AUTH_KEY',  '3eHd*{>Gw2&-RT[`*Qr_UL)P-q{kmttS-I]:Sv%JS1CTZ~P<l|*j2idXbBqC/&:x' );
define( 'LOGGED_IN_KEY',    '{d23RNQqag_v,#3hpfndjB$tPTe]hDj$w]|*8r1LC[p68)pXQ_V$pvZmjXhzKNb[' );
define( 'NONCE_KEY',        'j4{*lcSfrx_f;zm;,R.L{}G$ryI2Ex,=[p.4a.vfSxBMa`XAiMZ~AX%1=Cuu/P`C' );
define( 'AUTH_SALT',        'b%![F2~DL:_`<I)8a!aTm1D@u3n:c7X}YK9QWY$JM]L*KGDjT[z0gI1)V/o$dj;H' );
define( 'SECURE_AUTH_SALT', 'F!czpB5 0uYoy .0CV}%;^%O|^SZLyA{_Us.:50zv>^=|O//_Uh8mUf/^S7^n[3]' );
define( 'LOGGED_IN_SALT',   '`|% )_yta$&7if>EEGK=(A~tWV10b{ X}{ucapg4*}VP7vG@wnymwM<nHuOi);6w' );
define( 'NONCE_SALT',       'UXdN~j9Tw%uTCat#z&*dFySkaHg`&vcQh9[V]x%mLNl[7h!dKy.Bb0N4jf{W}MhC' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
