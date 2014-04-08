<?php

/**
 * Processes output for the Room view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class Error extends Controller
{

    private $_message = NULL;

    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function __construct( )
    {
        $this->_message = "Oops, la página que has solicitado no ha sido encontrada.";
    }

    /**
     * Generates the title of the page
     *
     * @return string The title of the page
     */
    public function get_title( )
    {
        return 'Something went wrong.';
    }

    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    public function output_view( )
    {
        $view = new View('error');
		
        $view->message = $this->_message;
        // $view->home_link = APP_URI;
		// $view->images_path = APP_URI . IMAGES_PATH;

        $view->render();
    }

}
