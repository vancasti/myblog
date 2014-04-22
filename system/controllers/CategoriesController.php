<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class CategoriesController extends Controller
{
    public function __construct( $options ) 
    {
        parent::__construct($options);
        
        // $this->model = new UserModel;
        
        $this->view = new View('CategoriesView');
        
        $this->actions = array (
            'add' => 'add_category',
            'edit' => 'edit_category',
            'update' => 'update_category',
            'delete' => 'delete_category',
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
    
    protected function add_category( )
    {
        
    }
    
    protected function edit_category( )
    {
        
    }
}
?>
