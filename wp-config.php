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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

 define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_6_8' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '#j2j&B}oxnk/o&Qe0CM*<jT:W<7)7g++*H5]4DElC85V~LD|r+{?GCtS1afewLuT' );
define( 'SECURE_AUTH_KEY',  '.m!;SX=WsXS;e|cKa9t&Y@M<uj*~q!O*.n`7HEdfhy=SJxP 5,JQ]usO8mNr@1IY' );
define( 'LOGGED_IN_KEY',    'E.uly,!9*TK9+%CUa1iC.p!~:(4m&*&?n2B} Q5k,fdPu|1@KZ4eY[5JlV4WC#8.' );
define( 'NONCE_KEY',        '[FgN]{#zCtk<i| 8pl(Yinx8)o:[T_.}&PTim/i;h693avA[nSnpFvU1C}n*=BCS' );
define( 'AUTH_SALT',        '#0QzAszvxfUm/5Td%bMg5%h+([}p-&u7f2<TJd#?KH!;FD5zN-R$<&67+}poo&8/' );
define( 'SECURE_AUTH_SALT', 'K?{&9K(o8=;, mM0Uj^[nGO&/xZz)9uf$27!1T>Skp7^Ncq]Btuy_c4iF#k!x*Zh' );
define( 'LOGGED_IN_SALT',   '9|EN_nzy5/??6+geAezkjNz0O~UqSrU9) hPOD-~ kBxb)0+W17 FT~9:KU) {[ ' );
define( 'NONCE_SALT',       ',M239DaRm/88bJqq,}CxKI8;0kzu5tj2#/9o.@#jardpYQ2*R;Fm5KJ`~z.N@v<r' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
