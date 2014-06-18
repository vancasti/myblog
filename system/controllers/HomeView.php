<?php require_once SYS_PATH . '/inc/header.php'; ?>
<div class="container">
<div class="row">
<div class="twelve columns">
    
    <?php 
        function parrafin($string) {
            $article = explode("\n", $string);
            $parrafo = $article[0];
                return( $parrafo ); 
        }  
    
        foreach ($publications as $key => $publication) {
            echo '<article class="publication">
                  <header>'; 
            echo '<h2><a href="'. APP_URI . $publication["url"] . '">' . ucfirst($publication["titulo"]) . '</a></h2><p>';
            echo '<span class="post-meta">';
            echo '<time class="updated" datetime=' . $publication["fpublicacion"] . '>' . $publication["fpublicacion"] . '</time>';
            echo '<span class="posted">, publicado en ' . $publication["categoria"] . '</span>';
            echo '<span class="comments ftr">
                        <i class="fa fa-star"></i>
                        <a href="">' . 2 . ' comentarios</a>
                  </span></span></p>';
            echo '<p><span class="avatar"><img class="blogged-by-img" alt="" src="//www.gravatar.com/avatar/21a5824656e4647a05ac19850530ee05?d=404"></span>';
            echo '<span class="author">' . $publication["autor"]. '</span></p></header>';
            echo '<section class="content">' . parrafin($publication["contenido"]) . '</section>';
            echo '<footer><p><span class="post-tags"><i class="fa fa-tags"></i>';
            
            foreach ($tags as $key => $tag) {
                if($tag["id_publication"] == $publication["id"]) {
                    echo ' ' . $tag["valor"] . ',';
                }
            }
            
            echo '</span></p>';
            echo '<a class="orange" href="">Seguir Leyendo</a>';
            echo '</footer></article><hr>';   
        }
    ?>
       <nav class="nav-pagination">
        <?php echo 'Página ' . $current_page . ' de ' . $PaginationUtil->getTotalPages(); 
            if($current_page > 1 )
                echo '<a class="ftl" href="' . APP_URI . '?page=' . ($current_page - 1) . '">← Página Anterior</a>';
            
            if($current_page < $PaginationUtil->getTotalPages())
                echo '<a class="ftr" href="' . APP_URI . '?page=' . ($current_page + 1) . '">Página Siguiente →</a>';
        ?>
       </nav>
    </div>
    <?php require_once SYS_PATH . '/inc/aside.php'; ?>
</div>
</div>
</div>
<?php require_once SYS_PATH . '/inc/footer.php'; ?>