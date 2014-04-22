<?php
/**
* A sample configuration file
*
* The variables below need to be filled out with environment specific data.
*
* @author Victor Castiñeira <vancasti86@gmail.com>
* 
*/

// Set up an array for constants
$_C = array();

//-----------------------------------------------------------------------------
// General configuration options
//-----------------------------------------------------------------------------

$_C['APP_TIMEZONE'] = 'Europe/Madrid';
$_C['DEFAULT_PUBLIC_CONTROLLER'] = 'HomeController';
$_C['DEFAULT_PRIVATE_CONTROLLER'] = 'PrivateController';

//-----------------------------------------------------------------------------
// Database credentials
//-----------------------------------------------------------------------------

$_C['DB_HOST'] = 'localhost:3306';
$_C['DB_NAME'] = 'dev_blogg';
$_C['DB_USER'] = 'root';
$_C['DB_PASS'] = 'renacens';

//-----------------------------------------------------------------------------
// Enable debug mode (strict error reporting)
//-----------------------------------------------------------------------------

$_C['DEBUG'] = TRUE;

//-----------------------------------------------------------------------------
// Folder's assets
//-----------------------------------------------------------------------------

$_C['CSS_PATH'] = 'assets/styles';
$_C['IMAGES_PATH'] = 'assets/images';
$_C['JS_PATH'] = 'assets/js';

//-----------------------------------------------------------------------------
// Converts the constants array into actual constants
//-----------------------------------------------------------------------------

foreach ($_C as $constant=>$value) {
    define($constant, $value);
}
