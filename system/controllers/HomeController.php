<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
class HomeController extends Controller
{
    use PaginationTrait;
    
    /**
     * Overrides the parent constructor to avoid an error
     *
     * @return bool TRUE
     */
    public function __construct( )
    {
        parent::__construct();
        
        $this->model = new PublicationModel;
        $this->view = new View('HomeView');
        
        $this->output_view();
    }

    /**
     * Generates the title of the page
     *
     * @return string The title of the page
     */
    public function get_title( )
    {
        return 'Realtime Q&amp;A';
    }
    
    /**
     * Generates the title of the page
     * @param Publication's list
     * @return string The title of the page
     */
    public function getTags($publications)
    {
        $array_ids = array();
        
        foreach ($publications as $key => $publication) {
            array_push($array_ids, $publication["id"]);
        }
        
        return $this->model->getAssociatedTags($array_ids);
    }

    /**
    * Loads and outputs the view's markup
    *
    * @return void
    */
    public function output_view( )
    {
        if(!isset($this->page)) $this->page = 1;
        
        self::include_pagination($this->page, PUBLICATIONS_PER_PAGE);
        $this->view->tags = $this->tags = $this->getTags($this->entities);
        
        $this->view->render();
    }

}
