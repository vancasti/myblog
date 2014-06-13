<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<script type="text/javascript">
function changeAction(btn, id_entity) {
    document.getElementById('edit_entity' + id_entity).action = document.getElementById('edit_entity' + id_entity).action + btn.value;
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
                    <?php
                        if(!empty($entities)) {
                            $columns = array_keys($entities[0]);
                        
                            foreach ($columns as $key => $column) {
                                echo '<th>' . ucfirst($column) . '</th>';
                            }
                        }
                    ?>
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($entities as $key => $entity) :
                        echo '<form id="edit_entity' . $entity["id"] . '" method="post" action="' . APP_URI . $url_paginator . '"">';
                        echo '<tr>';
                        echo '<td>' . $entity["id"] . '</td>';
                        echo '<td>' . '<input type="text" value="'. $entity["valor"] . '" name="name_entity"></input></td>';
                        echo '<td>';
                        echo '<input type="hidden" value="'. $entity["id"] .'" id="id_entity" name="id_entity"></input>';
                        echo '<button type="submit" class="buttongrid" form="edit_entity' . $entity["id"] . '" onclick="changeAction(this,'. $entity["id"] . ')" value="edit"><img src="'. $app->get('images_path') .'/pencil-icon.png"></img></button>';
                        echo '<button type="submit" class="buttongrid" form="edit_entity' . $entity["id"] . '" onclick="changeAction(this,'. $entity["id"] . ')" value="delete"><img src="'. $app->get('images_path') .'/close-icon.png"></img></button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                    endforeach;
                        echo '<form id="add_entity" method="post" action="' . APP_URI . $url_paginator .'add">';
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>' . '<input type="text" name="name_entity"></input></td>';
                        echo '<td>';
                        echo '<button type="submit" class="buttongrid" form="add_entity"><img src="'. $app->get('images_path') .'/add-icon.png"></img></button>';
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