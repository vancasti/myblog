<div id="pag">
    <?php
        echo '<span class="paginator">';
        echo '<a href="'. APP_URI . $url_paginator . $PaginationUtil->getPreviousPage() . '"> << Previous</a>';
        echo '<a href="'. APP_URI . $url_paginator . '1">1</a>';
        
        for ($i=$current_page - 5; $i < $current_page + 5; $i++) { 
            if($i > 1 && $i < $PaginationUtil->getTotalPages()) {
                echo '<a href="'. APP_URI . $url_paginator . $i. '">' . $i . '</a>';
            } 
        }
        
        if($PaginationUtil->getTotalPages() > 1) 
            echo '...<a href="'. APP_URI . $url_paginator . $PaginationUtil->getTotalPages() . '">' . $PaginationUtil->getTotalPages() . '</a>';
        echo '<a href="'. APP_URI . $url_paginator . $PaginationUtil->getNextPage() . '"> Next >></a>';
    ?>
</div>