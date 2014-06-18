<?php require_once SYS_PATH . '/inc/header.php'; ?>
<div class="container">
<div class="row">
<div class="sixteen columns">
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>
    
    <?php 
            echo '<article class="publication"><header>'; 
            echo '<h1><a href="'. APP_URI . $publication["url"] . '">' . ucfirst($publication["titulo"]) . '</a></h1><p>';
            echo '<span class="post-meta">';
            echo '<time class="updated" datetime=' . $publication["fpublicacion"] . '>' . $publication["fpublicacion"] . '</time>';
            echo '<span class="posted">, publicado en ' . $publication["categoria"] . '</span>';
            echo '<span class="post-tags ftr"><i class="fa fa-tags"></i>';
            
            foreach ($tags as $key => $tag) {
                if($tag["id_publication"] == $publication["id"]) {
                    echo ' ' . $tag["valor"] . ',';
                }
            }
            
            echo '</span>';
            echo '<p class="author"><span class="avatar"><img class="blogged-by" alt="" src="//www.gravatar.com/avatar/21a5824656e4647a05ac19850530ee05?d=404"></span>';
            echo '<span><i class="fa fa-user"></i>' . ' ' . $publication["autor"] . '</span>';
            echo '<span class="envelope"><i class="fa fa-envelope"></i>' .  ' ' . $publication["email"] . '</span>';
            echo '<span class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-type="button_count"></span>';
            echo '</p></header>';
            echo '<section class="content">' . $publication["contenido"] . '</section>';
    ?>
    </div>
</div>
</div>
</div>
<?php require_once SYS_PATH . '/inc/footer.php'; ?>