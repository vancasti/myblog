<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class HomeController extends Controller
{

    /**
     * Overrides the parent constructor to avoid an error
     *
     * @return bool TRUE
     */
    public function __construct( )
    {
        $this->view = new View('HomeView');
        $this->view->render();
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
        // $view = new View('HomeView');
        // $view->nonce = $this->generate_nonce();
        // $view->render();
    }

}
