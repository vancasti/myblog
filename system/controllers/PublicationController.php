<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class PublicationController extends Controller
{
    private $requireFields; 
    
    public function __construct( $options ) 
    {
        parent::__construct();
        
        $this->model = new PublicationModel;
        $this->view = new View('PublicationAddView');
        
        $this->actions = array (
            'add' => 'add_publication',
            'edit' => 'edit_publication',
            'update' => 'update_publication',
            'delete' => 'delete_publication',
            'list' => 'list_publication',
            'default' => 'output_view'
        );
        
        $this->requireFields = array('titulo', 'fecha', 'contenido'); 
        
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
        $id_publication = isset($this->id) ? $this->id : 0;
        
        // var_dump($id_publication);
        
        $modelCategories = new CategoryModel;
        $modelTags = new TagModel;
        
        $this->view->categories = $modelCategories->getAll();
        $this->view->tags = $modelTags->getAll();
        
        if($id_publication) { //if equals to 1
            $this->view->publication = $this->model->getByID($id_publication);    
        }
        
        $this->view->render();
    }
    
    protected function emptyFieldsValidator () 
    {
        $error = false;
        
        foreach ($this->requireFields as $field) {
            
            if(empty($this->$field)) {
                $articulo = (substr($field, -1) == 'a') ? 'la ' : 'el ';
                array_push($this->messages, array('error', 'Debe insertar ' . $articulo . $field));
                $error = true;
            }

        }
        
        return $error;
    }
    
    protected function add_publication () 
    {
        $error = $this->emptyFieldsValidator();
        
        $publication = array(':titulo' => $this->titulo, 
                             ':url' => strtolower(str_replace(' ', '-', $this->titulo)),
                             ':contenido' => $_POST["contenido"],
                             ':fcreacion' => date('Y-m-d h:i:s'),
                             ':fpublicacion' => $this->fecha,
                             ':id_autor' => $_SESSION['id_usuario'],
                             ':id_categoria' => $this->categoria);
                             
        if(!$error) {
            $id_publication = $this->model->create($publication);
            
            if(!empty($id_publication)) {
                
                foreach ($this->tags as $key => $id_tag) {
                    $this->model->insertAssociatedTag($id_publication, $id_tag);
                }
                
                array_push($this->messages, array('info', 'Operación realizada correctamente!'));
                $this->list_publication();
                die;
                
            } else {
                array_push($this->messages, array('info', 'Error al insertar la publicación'));
            }
        }
        
        $this->view->messages = $this->messages;
        $this->output_view();
    }
    
    protected function edit_publication( )
    {
        $error = $this->emptyFieldsValidator();
        
        $publication = array(':id' => $this->id, 
                             ':titulo' => $this->titulo, 
                             ':url' => strtolower(str_replace(' ', '-', $this->titulo)),
                             ':contenido' => $_POST["contenido"],
                             ':fpublicacion' => $this->fecha,
                             ':id_autor' => $_SESSION['id_usuario'],
                             ':id_categoria' => $this->categoria);
        
        if(!$error) {
                             
            if ($this->model->update($publication)) {
                array_push($this->messages, array('info', 'Operación realizada correctamente!'));
                $this->list_publication();
                die;
            } else {
                array_push($this->messages, array('info', 'Error al modificar la publicación'));
            }
        }
        
        $this->view->messages = $this->messages;
        $this->output_view();     
        
    }

    protected function delete_publication( )
    {
        if($this->model->delete($this->id)) 
            array_push($this->messages, array('info', 'Publicación eliminada correctamente!'));
        else 
            array_push($this->messages, array('error', 'Error al eliminar la publicación'));
        
        $this->list_publication();
    }
    
    protected function list_publication($current_page = 1)
    {
        $this->view = new View('ListPublicationsView');
        $this->view->numElements = $numElements = $this->model->numFindElements();
        $this->view->PaginationUtil = $PaginationUtil = new PaginationUtil($current_page, $numElements);
        $this->view->current_page = $current_page;
        $this->view->entities = $this->model->getByPagination($PaginationUtil->getFirstElement(), ITEMS_PER_PAGE);
        $this->view->url_paginator = 'private/publication/list/';
        $this->view->messages = $this->messages;
        
        $this->view->render();
    }
}
?>
