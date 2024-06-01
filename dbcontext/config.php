<?php
require realpath(__DIR__ . '/../vendor/autoload.php');

use Dotenv\Dotenv;
// Determine the environment
$isLocal = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
// Load the appropriate .env file
if ($isLocal) {
    $dotenv = Dotenv::createImmutable(__DIR__, './../.env.development');
} else {
    $dotenv = Dotenv::createImmutable(__DIR__, './../.env.production');
}
$dotenv->load();
// Define constants
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_DATABASE', $_ENV['DB_DATABASE']);
define('API_KEY', $_ENV['API_KEY']);
define('API_URL', $_ENV['API_URL']);
define('MEDIA_URL', $_ENV['MEDIA_URL']);
define('ROOT_URL', $_ENV['ROOT_URL']);
define('SIGNIN_URL', $_ENV['SIGNIN_URL']);
define('CONNECTION_STRING', $_ENV['CONNECTION_STRING']);
define('DEBUG_MODE', filter_var($_ENV['DEBUG_MODE'], FILTER_VALIDATE_BOOLEAN));
define('DSA', filter_var($_ENV['DSA'], FILTER_VALIDATE_BOOLEAN));
