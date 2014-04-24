<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class TagsController extends Controller
{
    public function __construct( $options ) 
    {
        parent::__construct($options);
        
        $this->model = new tagModel;
        
        $this->view = new View('TagsView');
        
        $this->actions = array (
            'add' => 'add_tag',
            'edit' => 'edit_tag',
            'update' => 'update_tag',
            'delete' => 'delete_tag',
        );
        
        $this->options = $options;
        
        //var_dump($options);
        
        $this->executeAction($options);
        
        $this->list_tags();
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
    
     /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function add_tag( )
    {
        // var_dump($_POST['name_tag']);
        $name_categoria = $this->sanitize($_POST['name_tag']);
        if(!empty($name_categoria)) {
            $this->model->create($name_categoria);
        }
        
        $this->redirect('private/tags');
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function edit_tag( )
    {
        // var_dump($_POST['id_tag']);
        // var_dump($_POST['name_tag']);
        
        $id_categoria = $this->sanitize($_POST['id_tag']);
        $name_categoria = $this->sanitize($_POST['name_tag']);
        
        $this->model->update($id_categoria, $name_categoria);
        $this->redirect('private/tags');
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function delete_tag()
    {
        // var_dump($this->options);
        
        $id_categoria = $this->options[1];
        
        $this->model->delete($id_categoria);
        $this->redirect('private/tags');
    }
    
     /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function list_tags() {
        
        // var_dump($options);
        $current_page = isset($this->options[0]) ? $this->options[0] : 1;
        
        $numElements = $this->model->numFindElements();
        // var_dump($numElements);
        
        $total_pages = ceil($numElements / ITEMS_PER_PAGE);
        $first_element = ($current_page * ITEMS_PER_PAGE) - ITEMS_PER_PAGE; // 0 * 20 = 0 , 1 * 20 = 20, 2 * 20 = 40
        
        $this->view->previous_page = $current_page > 1 ? $current_page - 1 : 1;
        $this->view->next_page = $current_page < $total_pages ? $current_page + 1 : $total_pages;
        $this->view->total_pages = $total_pages;
        $this->view->current_page = $current_page;
        // $this->view->numElements = $numElements;
        $this->view->tags = $this->model->getByPagination($first_element, ITEMS_PER_PAGE);
        $this->view->render();
        
    }
    
}
?>
