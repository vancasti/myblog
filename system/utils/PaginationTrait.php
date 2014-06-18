<?php

/**
 * Util class pagination
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
trait PaginationTrait
{
    public function include_pagination($current_page, $numItemsPage)
    {
        $this->view->numElements = $numElements = $this->model->numFindElements();
        $this->view->PaginationUtil = $PaginationUtil = new PaginationUtil($current_page, $numElements, $numItemsPage);
        $this->view->current_page = $current_page;
        $this->view->entities = $this->entities = $this->model->getByPagination($PaginationUtil->getFirstElement(), $numItemsPage);
    }
}