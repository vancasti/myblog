<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class PublicationsController extends Controller
{
    public function __construct( $options ) 
    {
        // $this->model = new UserModel;
        
        $this->view = new View('PublicationsView');
        
        $this->actions = array (
            'add' => 'add_publication',
            'edit' => 'edit_publication',
            'update' => 'update_publication',
            'delete' => 'delete_publication',
        );
        
        //var_dump($options);
        
        $this->executeAction($options);
        
        $this->view->render();
    }
    
     /**
     * Generates the title of the page
     *
     * @return string The title of the page
     */
    public function get_title( )
    {
        return 'Admin page';
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    public function output_view( )
    {
    }
    
    protected function add_publication( )
    {
        
    }
    
    protected function edit_publication( )
    {
        
    }
}
?>
