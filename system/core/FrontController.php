<?php

/**
 * An abstract class that lays the groundwork for all controllers
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class FrontController
{
    private $class_name;

    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
   function __construct($uri_array) 
   {
       // var_dump($uri_array);
       $default_controller = $uri_array[0]=='private' ? DEFAULT_PRIVATE_CONTROLLER : DEFAULT_PUBLIC_CONTROLLER;
       
       $this->class_name = $this->get_controller($uri_array);  

       // echo 'Controller a invocar recogida<br/>';
       // var_dump($this->class_name);
       // echo '<br/>';
        
       if ($this->class_name=='PrivateController') {
           /**
            * Ver si esta logeado o con la sesion ya abierta
            */
           $this->class_name = $this->get_controller($uri_array);  
       } 
         
       if (empty($this->class_name)) { $this->class_name = $default_controller; }
           
       // echo 'Action recogido<br/>';
       // var_dump($uri_array);
       // echo '<br/>';
       
       $pathController = SYS_PATH . '/controllers/' . $this->class_name . '.php';
       $controller = file_exists($pathController) ? new $this->class_name($uri_array) : new Error();
       
   }
   
   /**
     * Breaks the URI into an array at the slashes
     *
     * @return array The broken up URI
     */
    function parse_uri( $uri_array)
    {
        $uri_array = explode('/', $uri_array);
    }

    /**
     * Determines the controller name using the first element of the URI array
     *
     * @param $uri_array array The broken up URI
     * @return string The controller classname
     */
    function get_controller( &$uri_array )
    {
        $controller = array_shift($uri_array);
        // var_dump($controller);
        if(isset($controller[0]) && $controller[0] == '?')
            return DEFAULT_PUBLIC_CONTROLLER;
        else
            $controller = strtok($controller, '?');
        // var_dump($firstChunk);
        // echo '<br/>';
        if(!empty($controller))
            return ucfirst($controller) . 'Controller';
    }
    
    function is_a_controller( $uri_array )
    {
        if (is_array($uri_array)) {
            $last_array = array_pop($uri_array);
            $fichero = explode('.', $last_array);
        } else {
            $fichero = explode('.', $uri_array);
        }
        
        $extension = end($fichero);
        
        if($extension == 'php') {
            // echo $fichero[0] . ' es un fichero php<br/>';
            $this->class_name = $fichero[0];
            return false;
        }
        else {
            // echo $fichero[0] . ' no es un fichero php<br/>';
        }
        
        return true;
    }
    
    function get_last( $uri_array )
    {
        $controller = array_pop($uri_array);
        return ucfirst($controller);
    }
    
}