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
        <div id="admin_info">
            <ul>
        <?php if(isset($_SESSION["nombre_usuario"])) {
                echo '<li><i class="fa fa-user"></i>';
                echo $_SESSION["nombre_usuario"]; 
                echo '<li>' . '<a title="Opcion 4" href='. APP_URI . 'admin/close>Cerrar</a>' . '</li>';
        } else {
            echo '<li>No session opened</li>';
        }?>
            </ul>
        </div>
        
    </div>
</div>