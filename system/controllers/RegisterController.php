<?php

/**
 * Generates output for the Home view
 *
 * @registeror Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class RegisterController extends Controller
{
    public function __construct( $options ) 
    {
        $this->model = new UserModel;
        
        $this->view = new View('RegisterView');
        
        $this->actions = array (
            'new' => 'user_register',
            'index' => 'output_view'
        );
        
        //var_dump($options);
        
        $this->executeAction($options);
        
        // if(!empty($options[0])) {
            // if(array_key_exists($options[0], $this->actions)) {
                // $output = $this->{$this->actions[$options[0]]}();
                // die;
            // }
        // } 
//         
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
        // $this->view = new View('registerView');
        // $this->view->nonce = $this->generate_nonce();
        $this->view->render();            
    }
    
    protected function user_register( )
    {
        // var_dump($_POST);
        // $this->view = new View('RegisterView');
        $error = false;
        
        if(!empty($_POST['name']))
            $name = $this->sanitize($_POST['name']);
        else {
            $this->view->errorName = 'Debe insertar el nombre';
            $error = true;
        }
        
        if(!empty($_POST['email']))
            $email = $this->sanitize($_POST['email']);
        else {
            $this->view->errorEmail = 'Debe insertar el email';
            $error = true;
        }
        
        if(!empty($_POST['password']))
            $password = $this->sanitize($_POST['password']);
        else {
            $this->view->errorPassword1 = 'Debe insertar la contraseña';
            $error = true;
        }
        
        if(!empty($_POST['password2']))
            $password2 = $this->sanitize($_POST['password2']);
        else {
            $this->view->errorPassword2 = 'Debe repetir la contraseña';
            $error = true;
        }
        
        if(!empty($_POST['password']) && !empty($_POST['password2'])) {
            if($password!=$password2) {
                $this->view->errorPassword2 = 'Las contraseñas deben ser iguales';
                $error = true;
            }
        }
        
        if(!$error) {
            echo $this->model->create($name, $email, $password) ?  'Insert OK' :  'Insert fail';
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
