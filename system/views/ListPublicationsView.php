<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<script type="text/javascript">
function changeAction(btn, id_entity) {
    switch(btn.value)
    {
        case ('edit'): 
        document.getElementById('edit_entity' + id_entity).action = document.getElementById('edit_entity' + id_entity).action.replace('/list/', '?id=' + id_entity);
        break;
        case ('delete'):
        document.getElementById('edit_entity' + id_entity).action = document.getElementById('edit_entity' + id_entity).action.replace('list/', 'delete');
        break;
    }
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
                            unset($columns[3]);
                            unset($columns[8]);
                            foreach ($columns as $column) {
                                echo '<th>' . ucfirst($column) . '</th>';
                            }
                        }
                    ?>
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($entities as $entity) :
                        echo '<form id="edit_entity' . $entity["id"] . '" method="post" action="' . APP_URI . $url_paginator . '"">';
                        echo '<tr>';
                        echo '<td>' . $entity["id"] . '</td>';
                        echo '<td>' . $entity["titulo"] . '</td>';
                        echo '<td>' . $entity["url"] . '</td>';
                        echo '<td>' . $entity["fcreacion"] . '</td>';
                        echo '<td>' . $entity["fmodificacion"] . '</td>';
                        echo '<td>' . $entity["fpublicacion"] . '</td>';
                        echo '<td>' . $entity["categoria"] . '</td>';
                        echo '<td>';
                        echo '<input type="hidden" value="'. $entity["id"] .'" id="id_entity" name="id"></input>';
                        echo '<button type="submit" class="buttongrid" form="edit_entity' . $entity["id"] . '" onclick="changeAction(this,'. $entity["id"] . ')" value="edit"><img src="'. $app->get('images_path') .'/pencil-icon.png"></img></button>';
                        echo '<button type="submit" class="buttongrid" form="edit_entity' . $entity["id"] . '" onclick="changeAction(this,'. $entity["id"] . ')" value="delete"><img src="'. $app->get('images_path') .'/close-icon.png"></img></button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '</form>';
                    endforeach;
               ?>
                </tbody>
            </table>
            <?php require_once SYS_PATH . '/inc/pagination.php'; ?>
            </div>
       </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>