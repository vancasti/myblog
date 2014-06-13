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
    public function output_view( )
    {
        $this->view->render();            
    }
    
    protected function user_login( )
    {
        // var_dump($_POST);
        // $this->view = new View('AuthView');
        $error = false;
        
        if(!empty($_POST['email']))
            $email = $this->sanitize($_POST['email']);
        else {
            $this->view->errorEmail = 'Debe insertar el email';
            $error = true;
        }
        
        if(!empty($_POST['password']))
            $password = $this->sanitize($_POST['password']);
        else {
            $this->view->errorPassword = 'Debe insertar la contraseña';
            $error = true;
        }
        
        if(!$error) {
            if($this->model->login($email, $password)) {
                $this->redirect('private');
            } else {
                $this->view->errorEmail = 'Usuario o contraseña incorrecto';
                $this->view->render();
            }
        } else {
            $this->view->render();
        }
        
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
