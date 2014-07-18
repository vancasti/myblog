<?php

/**
 * Generates output for the Home view
 *
 * @registeror Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class RegisterController extends Controller
{
    public $model, 
           $view, 
           $actions;
    
    public function __construct( $options ) 
    {
        parent::__construct();
        
        $this->model = new UserModel;
        $this->view = new View('RegisterView');
        
        $this->actions = array (
            'new' => 'user_register',
            'default' => 'output_view'
        );
        
        $this->requireFields = array('name', 'email', 'password', 'password2'); 
        $this->executeAction($options);
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    protected function emptyFieldsValidator () 
    {
        $error = false;
        
        foreach ($this->requireFields as $field) {
            
            if(empty($this->$field)) {
                $articulo = (substr($field, -1) == 'a') ? 'la ' : 'el ';
                $var_name = 'error' . ucwords($field);
                $this->view->{$var_name} = 'Debe insertar ' . $articulo . $field;
                $error = true;
            }
            
        }
        
        return $error;
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
    
    protected function user_register( )
    {
        $error = false;
        $error = self::emptyFieldsValidator();
        
        if(!empty($this->password) && !empty($this->password2) && $this->password!=$this->password2) {
                $this->view->errorPassword2 = 'Los password deben ser iguales';
                $error = true;
        }
        
        if(!$error) {
            if($this->model->create($this->name, $this->email, $this->password))
                $this->redirect('auth');
            else
                $this->view->errorName = 'No se ha podido realizar el registro correctamente';
        } 
        
        $this->view->name = $this->name;
        $this->view->email = $this->email;
        $this->view->render();
    }

    protected function close_session( )
    {
        //Libera todas las variables de sesión
        session_unset(); 
        //libera la sesión actual, elimina cualquier dato de la sesión.
        session_destroy();
        $this->redirect('admin');
    }
}
?>
