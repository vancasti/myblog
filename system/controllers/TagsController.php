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
        
        $this->model = new TagModel;
        $this->view = new View('ListTemplateView');
        
        $this->actions = array (
            'add' => 'add_tag',
            'edit' => 'edit_tag',
            'update' => 'update_tag',
            'delete' => 'delete_tag',
            'default' => 'list_tag'
        );
        
        $this->executeAction($options);
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
    protected function add_tag( )
    {
        if(!empty($this->name_entity)) {
            
            if($this->model->create($this->name_entity))
                array_push($this->messages, array('info', 'Tag insertado correctamente!'));
            else 
                array_push($this->messages, array('error', 'Error al insertar el tag'));
        }
        
        $this->list_tag();
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function edit_tag( )
    {
        if(!empty($this->name_entity)) {
            
            if($this->model->update($this->id_entity, $this->name_entity))
                array_push($this->messages, array('info', 'Tag editado correctamente!'));
            else 
                array_push($this->messages, array('error', 'Error al editar el tag'));
        }
            
        $this->list_tag();
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function delete_tag()
    {
        if($this->model->delete($this->id_entity))
            array_push($this->messages, array('info', 'Tag eliminado correctamente!'));
        else 
            array_push($this->messages, array('error', 'Error al eliminar el tag'));
        
        $this->list_tag();
    }
    
     /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function list_tag($current_page = 1) 
    {
        $this->view->numElements = $numElements = $this->model->numFindElements();
        $this->view->PaginationUtil = $PaginationUtil = new PaginationUtil($current_page, $numElements);
        $this->view->current_page = $current_page;
        $this->view->entities = $this->model->getByPagination($PaginationUtil->getFirstElement(), ITEMS_PER_PAGE);
        $this->view->url_paginator = 'private/tags/';
        $this->view->title = 'Tags';
        $this->view->messages = $this->messages;
        
        $this->output_view();
    }
    
}
?>
