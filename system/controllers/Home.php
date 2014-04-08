<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class Home extends Controller
{

    /**
     * Overrides the parent constructor to avoid an error
     *
     * @return bool TRUE
     */
    public function __construct( )
    {
        // $this->output_view();
    }

    /**
     * Generates the title of the page
     *
     * @return string The title of the page
     */
    public function get_title( )
    {
        return 'Realtime Q&amp;A';
    }

    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    public function output_view( )
    {
        $view = new View('home');
        $view->nonce = $this->generate_nonce();

        // Action URIs for form submissions
        // $view->join_action = APP_URI . 'room/join';
        // $view->create_action = APP_URI . 'room/create';

        $view->render();
    }

}
