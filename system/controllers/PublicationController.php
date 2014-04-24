<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class PublicationController extends Controller
{
    public function __construct( $options ) 
    {
        $this->model = new PublicationModel;
        
        $this->view = new View('PublicationAddView');
        
        $this->actions = array (
            'add' => 'add_publication',
            'edit' => 'edit_publication',
            'update' => 'update_publication',
            'delete' => 'delete_publication',
            'list' => 'list_publication',
        );
        
        //var_dump($options);
        
        $this->validation_errors = array ();
        
        $this->executeAction($options);
        
        $this->output_view();
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
        
        $modelCategories = new CategoryModel;
        $modelTags = new TagModel;
        
        $this->view->categories = $modelCategories->getAll();
        $this->view->tags = $modelTags->getAll();
        $this->view->render();
    }
    
    protected function emptyValidator ($fields) {
            
        $error = false;
        
        foreach ($fields as $key => $field) {
            if(!empty($_POST[$field]))
                $name = $this->sanitize($_POST[$field]);
            else {
                array_push($this->validation_errors, 'Debe insertar el ' . $field);
                $error = true;
            }
        }
        
        return $error;
    }
    
    protected function add_publication () {
        
        $fields = array('titulo', 'fecha', 'contenido');
        
        $error = $this->emptyValidator($fields);
        
        // var_dump($_POST);
        
        if(!$error) {
            echo $this->modelPublications->create($titulo, $contenido, $fpublicacion, $id_categoria);
        } else {
            // var_dump($this->validation_errors);
            $this->view->validation_errors = $this->validation_errors;
            $this->output_view();
        }
    }
    
    protected function edit_publication( )
    {
        
    }
    
    protected function list_publication( )
    {
        $view = new View('PublicationListView');
        $view->render();
    }
}
?>
