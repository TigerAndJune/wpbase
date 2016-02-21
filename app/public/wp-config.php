<?php

// Load database info and environment parameters
if ( file_exists( dirname( __FILE__ ) . '/../prod-config.php' ) ) {
    define( 'WP_LOCAL_DEV', false );
    include( dirname( __FILE__ ) . '/../prod-config.php' );
} elseif ( file_exists( dirname( __FILE__ ) . '/../stage-config.php' ) ) {
    define( 'WP_LOCAL_DEV', false );
    include( dirname( __FILE__ ) . '/../stage-config.php' );
} else {
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/../local-config.php' );
}

// Custom content directory
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// Database settings (do not change)
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

// Table prefix (change if multiple installs in same database)
$table_prefix  = 'wp_';

// Hide errors by default
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG', false);

// Disable automatic updates
define( 'AUTOMATIC_UPDATER_DISABLED', false );

// Bootstrap WordPress
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/cms/' );
}
require_once(ABSPATH . 'wp-settings.php');
