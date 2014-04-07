<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class User extends Controller
{
	public function __construct( $options ) 
	{
		parent::__construct($options);
		
		$this->model = new UserModel;
		
		$this->actions = array (
			'addAction' => 'add_new_user',
		);
		
		if(array_key_exists($options[0], $this->actions)) {
			$this->handle_form_submission($options[0]);
			exit;
		} else {
			// If we get here, no valid form was submitted...
		}
	}
	
	 /**
     * Generates the title of the page
     *
     * @return string The title of the page
     */
    public function get_title( )
    {
        return 'Users page';
    }

    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    public function output_view( )
    {
        $view = new View('user');
        $view->nonce = $this->generate_nonce();
		
		//image folder
		$view->images_path = IMAGES_PATH;

        // Action URIs for form submissions
        $view->join_action = APP_URI . 'room/join';
        $view->create_action = APP_URI . 'room/create';

        $view->render();			
    }
	
	protected function add_new_user( )
	{
		$room_id = $this->sanitize($_POST['room_id']);
		$sayer_id = $this->sanitize($_POST['sayer_id']);
		
		// echo 'Foo!';
		return $this->model->update_foo_count($room_id, $sayer_id);
	}
}
?>
