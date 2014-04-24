<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<!-- <form method="post" id="edit_tag" action="<?php echo APP_URI . 'private/tags/edit'; ?>"> -->
<!-- <form method="post" id="delete_tag" action="<?php echo APP_URI . 'private/tags/delete'; ?>"></form>  -->

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
                    // var_dump($tags);
                    foreach ($tags as $key => $tag) {
                        echo '<form id="edit_tag' . $tag["id"] . '" method="post" action="' . APP_URI . 'private/tags/edit">';
                        echo '<tr>';
                        echo '<td>' . $tag["id"] . '</td>';
                        echo '<td>' . '<input type="text" value="'. $tag["valor"] . '" name="name_tag"></input></td>';
                        echo '<input type="hidden" value="' . $tag["id"] . '" name="id_tag"></input>';
                        echo '<td>';
                        echo '<button type="submit" class="buttongrid" form="edit_tag'. $tag["id"] . '"><img src="'. $app->get('images_path') .'/pencil-icon.png"></img></button>';
                        echo '<a href="' . APP_URI . 'private/tags/delete/' . $tag["id"] . '"><img src="'. $app->get('images_path') .'/close-icon.png"></img></a>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                    }
                        echo '<form id="add_tag" method="post" action="' . APP_URI . 'private/tags/add">';
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>' . '<input type="text" name="name_tag"></input></td>';
                        echo '<td>';
                        echo '<button type="submit" class="buttongrid" form="add_tag"><img src="'. $app->get('images_path') .'/add-icon.png"></img></button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                ?>
                </tbody>
            </table>
            <div id="pag">
                <?php
                    echo '<span class="paginator">';
                    echo '<a href="'. APP_URI . 'private/tags/' . $previous_page . '"> << Previous</a>';
                    echo '<a href="'. APP_URI . 'private/tags/1">1</a>';
                    
                    for ($i=$current_page - 5; $i < $current_page + 5; $i++) { 
                        if($i > 1 && $i < $total_pages) {
                            echo '<a href="'. APP_URI . 'private/tags/' . $i. '">' . $i . '</a>';
                        } 
                    }
                    if($total_pages > 1)
                        echo '<a href="'. APP_URI . 'private/tags/' . $total_pages . '">' . $total_pages . '</a>';
                    echo '<a href="'. APP_URI . 'private/tags/' . $next_page . '"> Next >></a>';
                ?>
            </div>
            </div>
       </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>