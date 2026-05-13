<?php
use Routers\Router;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

define('__APP_ROOT__', dirname(__DIR__));
define('ROOT_PATH', dirname(__FILE__));
define('ROOT', __FILE__);
define('DS', DIRECTORY_SEPARATOR);
//
$requestUri = $_SERVER["REQUEST_URI"];
$requestUri = explode("/", $requestUri);
//
if(end($requestUri) != null || end($requestUri) != ''){
    $makeUrl = $_SERVER["REQUEST_URI"] . "/";
    header("location: " . $makeUrl);
}
//
require_once(ROOT_PATH . '/framework-files/Core/config_loader.php');
require_once(ROOT_PATH . '/framework-files/Core/database.php');
require_once(ROOT_PATH . '/framework-files/Core/functions.php');
require_once(ROOT_PATH . '/framework-files/routes/web.php');
require_once(ROOT_PATH . '/framework-files/routes/doc.php');
require_once(ROOT_PATH . '/framework-files/routes/doc.php');
require_once(ROOT_PATH . '/framework-files/App/Helper/functions.php');

// die(dirname($_SERVER["REQUEST_URI"].'?'));
// die(empty($_SERVER['HTTPS']) ? 'https' : 'https');

Router::run();

if (env() !== "PROD"){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // error_reporting(0);
}else{
    error_reporting(0);
}
