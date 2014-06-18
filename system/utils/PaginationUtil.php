<?php

/**
 * Util class pagination
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class PaginationUtil
{
    private $total_pages,
            $first_element,
            $previous_page,
            $next_page;
              
    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function __construct($current_page, $numElements, $numItemsPage)
    {
        $this->total_pages = ceil($numElements / $numItemsPage);
        $this->first_element = ($current_page * $numItemsPage) - $numItemsPage;
        $this->previous_page = $current_page > 1 ? $current_page - 1 : 1;
        $this->next_page = $current_page < $this->total_pages ? $current_page + 1 : $this->total_pages;
    }
    
    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function getPreviousPage()
    {
        return $this->previous_page;
    }
    
    
     /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function getNextPage()
    {
        return $this->next_page;
    }
    
     /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function getTotalPages()
    {
        return $this->total_pages;
    }    
    
    /**
     * Initializes the view
     *
     * @param $options array Options for the view
     * @return void
     */
    public function getFirstElement()
    {
        return $this->first_element;
    }   
    
}

?>
