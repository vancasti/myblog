<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<!-- <form method="post" id="edit_category" action="<?php echo APP_URI . 'private/categories/edit'; ?>"> -->
<!-- <form method="post" id="delete_category" action="<?php echo APP_URI . 'private/categories/delete'; ?>"></form>  -->

<div class="container">
    <div class="two-thirds columns">
            <div class="example">
            <br/>
            <!-- <p>Listado de Categorias</p> -->
            <table>
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <!-- <th>Núm. Publicaciones</th> -->
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    // var_dump($categories);
                    foreach ($categories as $key => $category) {
                        echo '<form id="edit_category' . $category["id"] . '" method="post" action="' . APP_URI . 'private/categories/edit">';
                        echo '<tr>';
                        echo '<td>' . $category["id"] . '</td>';
                        echo '<td>' . '<input type="text" value="'. $category["valor"] . '" name="name_category"></input></td>';
                        echo '<input type="hidden" value="' . $category["id"] . '" name="id_category"></input>';
                        echo '<td>';
                        echo '<button type="submit" class="buttongrid" form="edit_category'. $category["id"] . '"><img src="'. $app->get('images_path') .'/pencil-icon.png"></img></button>';
                        echo '<a href="' . APP_URI . 'private/categories/delete/' . $category["id"] . '"><img src="'. $app->get('images_path') .'/close-icon.png"></img></a>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                    }
                        echo '<form id="add_category" method="post" action="' . APP_URI . 'private/categories/add">';
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>' . '<input type="text" name="name_category"></input></td>';
                        echo '<td>';
                        echo '<button type="submit" class="buttongrid" form="add_category"><img src="'. $app->get('images_path') .'/add-icon.png"></img></button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                ?>
                </tbody>
            </table>
            <div id="pag">
                <?php
                    echo '<span class="paginator">';
                    echo '<a href="'. APP_URI . 'private/categories/' . $previous_page . '"> << Previous</a>';
                    echo '<a href="'. APP_URI . 'private/categories/1">1</a>';
                    
                    for ($i=$current_page - 5; $i < $current_page + 5; $i++) { 
                        if($i > 1 && $i < $total_pages) {
                            echo '<a href="'. APP_URI . 'private/categories/' . $i. '">' . $i . '</a>';
                        } 
                    }
                    
                    if($total_pages > 1) 
                        echo '<a href="'. APP_URI . 'private/categories/' . $total_pages . '">' . $total_pages . '</a>';
                    echo '<a href="'. APP_URI . 'private/categories/' . $next_page . '"> Next >></a>';
                ?>
            </div>
            </div>
       </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>