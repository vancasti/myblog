<?php require_once SYS_PATH . '/inc/header.php'; ?>
<div class="container">

<!-- start portfolio -->
<div class="row">
<div class="twelve columns">
    
    <?php 
        foreach ($publications as $key => $publication) {
            echo '<article class="publication">
                  <header>'; 
            echo '<h2>' . ucfirst($publication["titulo"]) . '</h2><p>';
            echo '<span class="post-meta">';
            echo '<time class="updated" datetime=' . $publication["fpublicacion"] . '>' . $publication["fpublicacion"] . '</time>';
            echo '<span class="posted">, publicado en ' . $publication["categoria"] . '</span>';
            echo '<span class="comments ftr">
                        <i class="fa fa-star"></i>
                        <a href="">' . 2 . ' comentarios</a>
                  </span></span></p>';
            echo '<p><span class="avatar"><img class="blogged-by-img" alt="" src="//www.gravatar.com/avatar/21a5824656e4647a05ac19850530ee05?d=404"></span>';
            echo '<span class="author">' . $publication["autor"]. '</span></p></header>';
            echo '<section class="content">' . $publication["contenido"] . '</section>';
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
    
    <article class="publication">
        <header>
            <h2>Example Post With Syntax Highlighter</h2>
            <p>
                <span class="post-meta">
                    <time class="updated" datetime="2012-05-03"> 9 Junio de 2014, </time>
                    <span class="posted">publicado en Categoria</span>
                    <span class="comments ftr">
                        <i class="fa fa-star"></i>
                        <a href="">2 comentarios</a>
                    </span>
                </span>
            </p>
            <p>
                <span class="avatar">
                    <img class="blogged-by-img" alt="" src="//www.gravatar.com/avatar/21a5824656e4647a05ac19850530ee05?d=404">
                </span>
                <span class="author">Cristina Campos Gil</span>
            </p>
        </header>
        <section class="content">
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.</p>
        </section>
        <footer>
            <p>
                <span class="post-tags">
                    <i class="fa fa-tags"></i>
                    design, typography, art, media 
                </span>
            </p>
            <a class="orange" href="">Seguir leyendo</a>
        </footer>
        </article>
        <hr>
       <nav class="nav-pagination">
        <?php echo 'Página ' . $current_page . ' de ' . $PaginationUtil->getTotalPages(); 
            if($current_page > 1 )
                echo '<a class="ftl" href="' . APP_URI . '?page=' . ($current_page - 1) . '">← Página Anterior</a>';
            
            if($current_page < $PaginationUtil->getTotalPages())
                echo '<a class="ftr" href="' . APP_URI . '?page=' . ($current_page + 1) . '">Página Siguiente →</a>';
        ?>
            <!-- <a class="ftr" href="<?php echo APP_URI . '?page=' . ($current_page + 1) ?>">Página Siguiente →</a> -->
       </nav>
     <!-- <article class="publication">
        <header>
            <h2>Example Post With Syntax Highlighter</h2>
            <p>
                <span class="post-meta">
                    <time class="updated" datetime="2012-05-03"> 9 Junio de 2014, </time>
                    <span class="posted">publicado en Categoria</span>
                    <span class="comments ftr">
                        <i class="fa fa-star"></i>
                        <a href="">2 comentarios</a>
                    </span>
                </span>
            </p>
            <p>
                <span class="avatar">
                    <img class="blogged-by-img" alt="" src="//www.gravatar.com/avatar/21a5824656e4647a05ac19850530ee05?d=404">
                </span>
                <span class="author">Cristina Campos Gil</span>
            </p>
        </header>
        <section class="content">
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis.</p>
        </section>
        <footer>
            <p>
                <span class="post-tags">
                    <i class="fa fa-tags"></i>
                    design, typography, art, media 
                </span>
            </p>
            <a class="orange" href="">Seguir leyendo</a>
        </footer>
     </article> -->
    </div>
    <aside class="four columns">
    <section class="about">
        <header>
            <h4>Sobre mí</h4>
        </header>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean consequat porttitor elementum. Mauris pulvinar semper
        lobortis.[…]</p>
   </section>
   <section class="famous-posts">
       <header>
           <h4>Lo más comentado</h4>
       </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis. […]</p>
   </section>
   <section class="famous-posts">
       <header>
           <h4>Subscribete a mi blog</h4>
       </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis. […]</p>
   </section>
   <section class="famous-posts">
       <header>
           <h4>Sigueme en</h4>
       </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenean consequat porttitor elementum. Mauris pulvinar semper
            lobortis. […]</p>
   </section>
   </aside>
</div>
</div>
</div>
<!-- end portfolio -->
<!-- end container -->
<?php require_once SYS_PATH . '/inc/footer.php'; ?>