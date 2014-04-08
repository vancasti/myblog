<?php

/**
 * An abstract class that lays the groundwork for all controllers
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class FrontController
{

    private $uri_array = array();
    private $class_name;
    private $options;

    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
   function __construct($uri_array) 
   {
       $this->uri_array = $uri_array;
       
       $this->class_name = $this->get_controller_classname($uri_array);
       $this->options = $uri_array;
       
       if (empty($class_name) || $class_name == 'Index.php') {
            $class_name = 'Home';
       }

       // Tries to initialize the requested view, or else throws a 404 error
       $pathController = SYS_PATH . '/controllers/' . $class_name . '.php';
            
       $controller = file_exists($pathController) ? new $class_name($this->options) : new Error('Oops, la página que has solicitado no ha sido encontrada.');
   }
    
    /**
     * Determines the controller name using the first element of the URI array
     *
     * @param $uri_array array The broken up URI
     * @return string The controller classname
     */
    function get_controller_classname( &$uri_array )
    {
        $controller = array_shift($uri_array);
        return ucfirst($controller);
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


}
