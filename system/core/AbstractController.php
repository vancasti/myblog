<?php

/**
 * An abstract class that lays the groundwork for all controllers
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
abstract class Controller
{

    protected $actions = array();
    protected $messages = array();
    protected $model = NULL;
    protected $view = NULL;
    protected static $nonce = NULL;
    private $prueba = "";

    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function __construct( )
    {
         $this->process_petition();
    }
    
    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    protected final function process_petition( ) 
    {
        // $parameters = !empty($_GET) ? $_GET : $_POST;
        
        $parameters = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET : $_POST;
        
        foreach ($parameters as $parameter => $value) {
            $this->{$parameter} = $this->sanitize($value);
        }
    }
    
    /**
     * Generates a nonce that helps prevent XSS and duplicate submissions
     *
     * @return string The generated nonce
     */
    protected final function generate_nonce( )
    {
        // Checks for an existing nonce before creating a new one
        if (empty(self::$nonce)) {
            self::$nonce = base64_encode(uniqid(NULL, TRUE));
			// var_dump(self::$nonce);
            $_SESSION['nonce'] = self::$nonce;
        }

        return self::$nonce;
    }

    /**
     * Checks for a valid nonce
     *
     * @return bool TRUE if the nonce is valid; otherwise FALSE
     */
    protected final function check_nonce( )
    {
        if (
            isset($_SESSION['nonce']) && !empty($_SESSION['nonce'])
            && isset($_POST['nonce']) && !empty($_POST['nonce'])
            && $_SESSION['nonce']===$_POST['nonce']
        ) {
            $_SESSION['nonce'] = NULL;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Handles form submissions
     *
     * @param $action string The form action being performed
     * @return void
     */
    protected function handle_form_submission( $action )
    {
        if ($this->check_nonce()) {
            // Calls the method specified by the action
            $output = $this->{$this->actions[$action]}();

            if (is_array($output) && isset($output['room_id'])) {
                $room_id = $output['room_id'];
            } else {
                throw new Exception('Form submission failed.');
            }

            header('Location: ' . APP_URI . 'room/' . $room_id);
            exit;
        } else {
            throw new Exception('Invalid nonce.');
        }
    }

    /**
     * Performs basic input sanitization on a given string
     *
     * @param $dirty string The string to be sanitized
     * @return string The sanitized string
     */
    protected final function sanitize( $dirty )
    {
        if(is_array($dirty)) {
            foreach ($dirty as $key => $item) {
                $dirty[$key] = htmlentities(strip_tags($item), ENT_QUOTES);
            }
            
            return $dirty;
        } else {
            return htmlentities(strip_tags($dirty), ENT_QUOTES);
        }
    }
    
    /**
     * Performs basic input sanitization on a given string
     *
     * @param $url Url to redirect
     * @return string The sanitized string
     */
    protected function redirect( $url )
    {
        header("Location: " . APP_URI . $url);
    }
    
    /**
     * Execute the corresponding action
     *
     * @param $options Array with action and params
     * 
     */
    protected function executeAction( $options )
    {
        if(!empty($options[0]) && array_key_exists($options[0], $this->actions)) {
            $action = $options[0];
            unset($options[0]);
            if(!empty($options))
                $output = $this->{$this->actions[$action]}($options[1]);
            else
                $output = $this->{$this->actions[$action]}();
        } else {
            if(!empty($options[0])) {
                $output = $this->{$this->actions["default"]}($options[0]);
            } else
                $output = $this->{$this->actions["default"]}();
        }
    }

    /**
     * Sets the title for the view
     *
     * @return string The text to be used in the <title> tag
     */
    // abstract public function get_title( );

    /**
     * Loads and outputs the view's markup
     *
     * @return void
     */
    abstract public function output_view( );

}