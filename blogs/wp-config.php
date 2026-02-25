<?php
/**
 * The base configuration for WordPress
 *
 * @package WordPress
 */

// Environment detection
$is_live = (
    (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'a-c-m-e.in') !== false) ||
    (strpos(__FILE__, '/home/u133917450/') !== false)
);

if ($is_live) {
    define( 'DB_NAME', 'u133917450_wealthgenius' );
    define( 'DB_USER', 'admin' );
    define( 'DB_PASSWORD', 'wealthGenius-2026' );
    define( 'DB_HOST', 'localhost' );

    define( 'WP_HOME', 'https://a-c-m-e.in/wealthGenius/blogs' );
    define( 'WP_SITEURL', 'https://a-c-m-e.in/wealthGenius/blogs' );
} else {
    define( 'DB_NAME', 'wealthgenius' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', 'localhost' );

    define( 'WP_HOME', 'http://localhost:8080/web/wealth-genius-new/blogs' );
    define( 'WP_SITEURL', 'http://localhost:8080/web/wealth-genius-new/blogs' );
}

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
