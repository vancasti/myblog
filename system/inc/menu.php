<div class="container grey">
    <div class="two-thirds column">
        <nav>
        <ul>
            <li><a href=<?php echo APP_URI . 'private'; ?>>Home</a></li>
            <li><a href=<?php echo APP_URI . 'private/publication'; ?>>Redactar</a></li>
            <li><a href=<?php echo APP_URI . 'private/categories'; ?>>Categorias</a></li>
            <li><a href=<?php echo APP_URI . 'private/publication/list'; ?>>Publicaciones</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href=<?php echo APP_URI . 'private/tags'; ?>>Tags</a></li>
        </ul>
    </nav>
    </div>
    <div class="one-third column">
        
        <?php if(isset($_SESSION["nombre_usuario"])) {
            echo '<div id="admin_info">';
              echo '<ul>';
                echo '<li>' . 'Logged as ' . $_SESSION["nombre_usuario"] . '</li>'; 
                echo '<li>' . '<a title="Opcion 4" href='. APP_URI . 'admin/close>Cerrar</a>' . '</li>';
              echo '</ul>';
            echo '</div>';
        } else {
            echo 'No session opened';
        }?>
        
    </div>
</div>