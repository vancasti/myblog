<?php

/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class HomeController extends Controller
{

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
    
    
    public function getTags($publications)
    {
        $array_ids = array();
        
        foreach ($publications as $key => $publication) {
            array_push($array_ids, $publication["id"]);
        }
        // var_dump($array_ids);
        
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
        
        $this->view->numElements = $numElements = $this->model->numFindElements();
        $this->view->PaginationUtil = $PaginationUtil = new PaginationUtil($this->page, $numElements);
        $this->view->current_page = $this->page;
        $this->view->publications = $this->publications = $this->model->getByPagination($PaginationUtil->getFirstElement(), 5);
        $this->view->tags = $this->tags = $this->getTags($this->publications);
        // $this->view->url_paginator = 'private/categories/';
        
        // var_dump($this->tags);
        $this->view->render();
    }

}
