<?php

/**
 * The initialization script for the app
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
initconfig(); 

// Parses the URI
$uri_array = parse_uri();

//Invoke front controller
new FrontController($uri_array);

//-----------------------------------------------------------------------------
// Initializes environment variables
//-----------------------------------------------------------------------------

function initconfig( )
{

// Server path to this app (i.e. /var/www/vhosts/realtime/httpdocs/realtime)
define('APP_PATH', dirname(__FILE__));

// App folder, relative from web root (i.e. /realtime)
define('APP_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

// URL path to the app (i.e. http://example.org/realtime/)
define(
    'APP_URI',
    remove_unwanted_slashes('http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . APP_FOLDER . '/')
);

// Server path to the system folder (for includes)
define('SYS_PATH', APP_PATH . '/system');

//-----------------------------------------------------------------------------
// Initializes the app
//-----------------------------------------------------------------------------

// Starts the session
if (!isset($_SESSION)) {
    session_start();
}

// Loads the configuration variables
require_once SYS_PATH . '/config/config.php';
require_once SYS_PATH . '/core/FrontController.php';
require_once SYS_PATH . '/core/AppContext.php';
// require_once SYS_PATH . '/core/DataBase.php';

// Turns on error reporting if in debug mode
if (DEBUG===TRUE) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL^E_STRICT);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

// Sets the timezone to avoid a notice
date_default_timezone_set(APP_TIMEZONE);

// Registers class_loader() as the autoload function
spl_autoload_register('class_autoloader');

//set application default values
$app = AppContext::instance();

$app->set('css_array', array ('base.css','layout.css','skeleton.css','styles.css','tables.css'));
$app->set('css_path', remove_unwanted_slashes(APP_URI . CSS_PATH));
$app->set('js_path', remove_unwanted_slashes(APP_URI . JS_PATH));
$app->set('images_path', remove_unwanted_slashes(APP_URI . IMAGES_PATH));

}

/**
 * Breaks the URI into an array at the slashes
 *
 * @return array The broken up URI
 */
function parse_uri( )
{
    // Removes any subfolders in which the app is installed
    $real_uri =  preg_replace('~^'.APP_FOLDER. '/' . '~', '', $_SERVER['REQUEST_URI'], 1);
    
    // $array = parse_url($real_uri);
    // var_dump($array);

    return explode('/', $real_uri);
}

/**
 * Removes unwanted slashes (except in the protocol)
 *
 * @param $dirty_path string The path to check for unwanted slashes
 * @return string The cleaned path
 */
function remove_unwanted_slashes( $dirty_path )
{
    return preg_replace('~(?<!:)//~', '/', $dirty_path);
}

/**
 * Autoloads classes as they are instantiated
 *
 * @param $class_name string The name of the class to be loaded
 * @return bool Returns TRUE on success (Exception on failure)
 */
function class_autoloader( $class_name )
{
    // Defines all of the valid places a class file could be stored
    $possible_locations = array(
        SYS_PATH . '/utils/' . $class_name . '.php',
        SYS_PATH . '/models/' . $class_name . '.php',
        SYS_PATH . '/controllers/' . $class_name . '.php',
        SYS_PATH . '/core/Abstract' . $class_name . '.php',
    );

    // Loops through the location array and checks for a file to load
    foreach ($possible_locations as $loc) {
        if (file_exists($loc)) {
            require_once $loc;
            return TRUE;
        }
    }

    // Fails because a valid class wasn't found
    throw new Exception("Class $class_name wasn't found.");
}
