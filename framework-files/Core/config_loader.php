<?php

require(dirname(dirname(__FILE__)). DS . "..". DS ."config.php");
require (dirname(dirname(__FILE__)) . DS . 'Classes'.DS.'Tools'.DS.'AutoLoader.php');

$autoLoader = new AutoLoader();
$autoLoader->setPath(ROOT_PATH . DS . 'framework-files');
$autoLoader->setExt('php');

spl_autoload_register(array($autoLoader, 'loadApp'));
spl_autoload_register(array($autoLoader, 'loadModulos'));
spl_autoload_register(array($autoLoader, 'loadCore'));
spl_autoload_register(array($autoLoader, 'load'));

/*
    DEV = Developer enviorment
    PROD = Production enviorment
*/
// $ENV = "DEV";
$OS = "linux";
// $OS = "windows";

$CSRF = true; // turn off to Postman tests

session_start();
session_regenerate_id();

//load config string into arrays
$c_arr = json_decode( $config_string, true );

function getConfig( $key, $default = null) {
	
	Global $c_arr;

	if ( isset( $c_arr[$key] ) ) {
	    return $c_arr[$key];
	}

	return $default;
}

//some superglobal defines
define("APP_VERSION", "1.1.6");
define("ENVIRONMENT", getConfig("environment"));
define("APP_URL", getConfig("app_url"));
define("FRAMEWORK_FILES", APP_URL."framework-files/");