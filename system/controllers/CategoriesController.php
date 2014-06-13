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
        parent::__construct();
        
        $this->model = new CategoryModel;
        $this->view = new View('ListTemplateView');
        
        $this->actions = array (
            'add' => 'add_category',
            'edit' => 'edit_category',
            'update' => 'update_category',
            'delete' => 'delete_category',
            'default' => 'list_category'
        );
        
        $this->executeAction($options);
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
        $this->view->render();
    }
    
     /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function add_category( )
    {
        if(!empty($this->name_entity)) {
            
            if($this->model->create($this->name_entity)) 
                array_push($this->messages, array('info', 'Categoría insertada correctamente!'));
            else 
                array_push($this->messages, array('error', 'Error al insertar la categoría'));
        }
        
        $this->list_category();
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function edit_category( )
    {
        if(!empty($this->name_entity)) {
            
            $object = array(':id' => $this->id_entity, 
                            ':valor' => $this->name_entity); 
            
            if($this->model->update($object)) 
                array_push($this->messages, array('info', 'Categoría editada correctamente!'));
            else 
                array_push($this->messages, array('error', 'Error al editar la categoría'));
        }
        
        $this->list_category();
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function delete_category()
    {
        if($this->model->delete($this->id_entity)) 
            array_push($this->messages, array('info', 'Categoría eliminada correctamente!'));
        else 
            array_push($this->messages, array('error', 'Error al eliminar la categoría'));
        
        $this->list_category();
    }
    
     /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function list_category($current_page = 1) 
    {
        $this->view->numElements = $numElements = $this->model->numFindElements();
        $this->view->PaginationUtil = $PaginationUtil = new PaginationUtil($current_page, $numElements);
        $this->view->current_page = $current_page;
        $this->view->entities = $this->model->getByPagination($PaginationUtil->getFirstElement(), ITEMS_PER_PAGE);
        $this->view->url_paginator = 'private/categories/';
        $this->view->messages = $this->messages;
        
        // $similarity = levenshtein("cat", "cot");
        
        $this->output_view();
    }
    
}
?>
