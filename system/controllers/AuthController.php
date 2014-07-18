<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class AuthController extends Controller
{
    public function __construct( $options ) 
    {
        parent::__construct();
        
        $this->model = new UserModel;
        $this->view = new View('AuthView');
        
        $this->actions = array (
            'login' => 'user_login',
            'close' => 'close_session',
            'default' => 'output_view',
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
    protected function emptyFieldsValidator () 
    {
        $error = false;
        
        if(empty($this->email)) {
            $this->view->errorEmail = 'Debe insertar el email';
            $error = true;
        }
        
        if(empty($this->password)) {
            $this->view->errorPassword = 'Debe insertar la contraseña';
            $error = true;
        }
        
        return $error;
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
    protected function user_login( )
    {
        if(!self::emptyFieldsValidator()) {
            
            if($this->model->login($this->email, $this->password)) {
                $this->redirect('private');
            } else {
                $this->view->errorEmail = 'Usuario o contraseña incorrecto';
            }
        } 
        
        $this->view->email = $this->email;
        $this->view->render();
    }
    
    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
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
