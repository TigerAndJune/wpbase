<?php

// different environments based on their respective domains names
// add as many case as needed, then add the corresponding file in ./config
$files =  glob(dirname( __FILE__ ) . '/config/*.{json}', GLOB_BRACE);
foreach($files as $file) {
    $obj = json_decode(file_get_contents($file));
    if ($obj->{'domain'} === $_SERVER['SERVER_NAME']) {
        // redefine all the necessary settings variables (dealing with errors mostly)
        foreach ($obj->{'variables'} as $variable_name => $variable_value) {
            ini_set($variable_name, $variable_value);
        }
        // defines all the constants according to the configuration file
        foreach ($obj->{'constants'} as $constant_name => $constant_value) {
            define($constant_name, $constant_value);
        }
        $settings_received = true;
    }
}
// If no file was found
if (!isset($settings_received) or ($settings_received != true)) {
    echo '<h1>Missing an environment settings file for ' . $_SERVER['SERVER_NAME'] . '</h1>';
    exit;
} else {
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
}
