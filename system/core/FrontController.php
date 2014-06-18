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
       $default_controller = $uri_array[0]=='private' ? DEFAULT_PRIVATE_CONTROLLER : DEFAULT_PUBLIC_CONTROLLER;
       $this->class_name = $this->getController($uri_array);  

       // echo 'Controller a invocar recogida<br/>';
       // var_dump($this->class_name);
       // echo '<br/>';
        
       if ($this->class_name=='Private') {
           //FIXME
           /**
            * Ver si esta logeado o con la sesion ya abierta
            */
           $this->class_name = $this->getController($uri_array);  
       } 
         
       if (empty($this->class_name)) $this->class_name = $default_controller; 
           
       // echo 'Action recogido<br/>';
       // var_dump($uri_array);
       // echo '<br/>';
       
       $pathController = SYS_PATH . '/controllers/' . $this->class_name . 'Controller.php';
       
       if(file_exists($pathController)) {
           $this->class_name.= 'Controller';
           new $this->class_name($uri_array);
       } else {
           new PublicationController($this->class_name);
       }
   }

    /**
     * Determines the controller name using the first element of the URI array
     *
     * @param $uri_array array The broken up URI
     * @return string The controller classname
     */
    function getController( &$uri_array )
    {
        $controller = array_shift($uri_array);
        // var_dump($controller);
        if(isset($controller[0]) && $controller[0] == '?')
            return DEFAULT_PUBLIC_CONTROLLER;
        else
            $controller = strtok($controller, '?');
        
        if(!empty($controller))
            return ucfirst($controller);
    }
    
    /**
     * Determines if is a controller class
     *
     * @param $uri_array array The broken up URI
     * @return boolean 
     */
    function isController( $uri_array )
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
    
}