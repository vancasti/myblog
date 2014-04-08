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
       
       if (empty($this->uri_array)) {
            $this->class_name = 'Home';
       } else {
           $ini = parse_ini_file(SYS_PATH . '/utils/urls.ini');
           if(isset($ini[$this->uri_array]))
                $this->class_name = $ini[$this->uri_array];
       }
           
       // var_dump($this->class_name);    
       
       // Tries to initialize the requested view, or else throws a 404 error
       $pathController = SYS_PATH . '/controllers/' . $this->class_name . '.php';
       $controller = file_exists($pathController) ? new $this->class_name() : new Error();
       $controller->output_view();
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
