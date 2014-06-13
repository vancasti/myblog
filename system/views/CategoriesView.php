<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<script type="text/javascript">
function changeAction(btn, id_category) {
    document.getElementById('edit_category' + id_category).action = document.getElementById('edit_category' + id_category).action + btn.value;
}
</script>

<div class="container">
    <div class="two-thirds columns">
            <div class="example">
            <br/>
            <?php require_once SYS_PATH . '/inc/messages.php'; ?>
            <table>
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($categories as $key => $category) {
                        echo '<form id="edit_category' . $category["id"] . '" method="post" action="' . APP_URI . 'private/categories/">';
                        echo '<tr>';
                        echo '<td>' . $category["id"] . '</td>';
                        echo '<td>' . '<input type="text" value="'. $category["valor"] . '" name="name_category"></input></td>';
                        echo '<td>';
                        echo '<input type="hidden" value="'. $category["id"] .'" id="id_category" name="id_category"></input>';
                        echo '<button type="submit" class="buttongrid" form="edit_category' . $category["id"] . '" onclick="changeAction(this,'. $category["id"] . ')" value="edit"><img src="'. $app->get('images_path') .'/pencil-icon.png"></img></button>';
                        echo '<button type="submit" class="buttongrid" form="edit_category' . $category["id"] . '" onclick="changeAction(this,'. $category["id"] . ')" value="delete"><img src="'. $app->get('images_path') .'/close-icon.png"></img></button>';
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
            <?php require_once SYS_PATH . '/inc/pagination.php'; ?>
            </div>
       </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>