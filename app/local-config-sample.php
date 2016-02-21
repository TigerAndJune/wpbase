<?php
// Database info
define('DB_NAME', 'local_db_name');
define('DB_USER', 'local_db_user');
define('DB_PASSWORD', 'local_db_password');
define('DB_HOST', 'localhost'); // localhost:8888 if using MAMP defaults

// Show errors for local dev environment
ini_set( 'display_errors', E_ALL );
define( 'WP_DEBUG_DISPLAY', true );
define('WP_DEBUG', true);
