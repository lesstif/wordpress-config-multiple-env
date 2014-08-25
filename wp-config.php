<?php
/**
 * The base configurations of the WordPress.
 *
 * This file is a custom version of the wp-config file for multiple
 * environment.
 * Inspired by https://github.com/Abban/WordPress-Config-Bootstrap
 *
 * @package WordPress
 */

// determine PHP is running as standalone or apache module
// if not set just assume PHP run with build-int web server. 
if (!function_exists(apache_getenv)){
    define('WP_ENV', 'local');
}
else {
    //  If no environment is set default to local
    if (apache_getenv('WP_ENV') == false) {
        define('WP_ENV', 'local');
    } else {
        define('WP_ENV', apache_getenv ('WP_ENV'));
    }
}

/**#@-*/

/**
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

// load config for multiple environment
$config_file = ABSPATH . 'wp-config.' . WP_ENV . '.php';
file_exists($config_file) || die ("'$config_file' Not Found!");
require_once($config_file);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
