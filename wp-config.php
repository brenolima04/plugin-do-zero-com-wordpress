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
define( 'DB_NAME', 'alura' );

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
define( 'AUTH_KEY',         '>G#i*J_zhs~q)Tg|?k>nZR*HjJdCH|Ryzz_-h_DYhO-l!5JVLLY=~dA_CrO+,mR ' );
define( 'SECURE_AUTH_KEY',  '{]bE+|A?^agrQO6]kk-/i:&qMS{hfQzh<S73{^gY)*hfl H6J@B3Cy/<sGNx~}0P' );
define( 'LOGGED_IN_KEY',    'Db/BHY:a#}5jzAEEF8prd,f^34ZnU#92p$_4vB<fTKHbG>CLzoH%]RAw}|G4@`x3' );
define( 'NONCE_KEY',        'WL#iH? Bu6Q!c4vtP>Tk-3k%u22ggYM f!(7O2^Kfkh%(DTCOYJt%]=ZD^{z@aJ-' );
define( 'AUTH_SALT',        'n3_#4(] aw@r7<RefE9Il2?.!Z{uUvzi>K|543Z^ Ooccv[528+/s_AZi_E7R?_`' );
define( 'SECURE_AUTH_SALT', 'dA~8gq+w9_NcS$_8 )FeM4w (32DW,w&$-46SP~+#Ig$m6[>yzvGK] &oDAhRaK$' );
define( 'LOGGED_IN_SALT',   ')+:;+*crhJ~&5{rg7kmQVV`q:0={WAH&AeH*KyDt(/T^yEpdMq2]VLt?>%wa6TyS' );
define( 'NONCE_SALT',       'JjvK9w9e@S#71(V&{? }D$g/Q1aYNFZI6v,lBMGOIj(O?8Z4&,Ad{&k}Nrn1x9q3' );
define ( 'OPENWEATHER_API_KEY', 'f4b08891c8c454702a41812cbe6e48e2' );
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
