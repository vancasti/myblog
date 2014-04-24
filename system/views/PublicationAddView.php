<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo $app->get('js_path'); ?>/jquery/jquery.datetimepicker.css"/>
<script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $app->get('js_path'); ?>/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo $app->get('js_path'); ?>/jquery/jquery.datetimepicker.js"></script>

<div class="container">
    <div class="two-thirds columns">
            <br/>
            Opciones
            <hr/>
            <?php  if(isset($validation_errors)) {
                       echo '<p>';
                       foreach ($validation_errors as $key => $error) {
                            echo '<span class="error">' . $error . '</span>';  
                       }
                       echo '</p>';
                   }
            ?>
            <form id="new_publication" class="noborder" method="post" action="<?php echo APP_URI . 'private/publication/add'; ?>">
             <table>
                <tbody>
                    <tr>
                        <td><label for="titulo">Título</label></td>
                        <td><input type="text" name="titulo"></input></td>
                        <td><label for="category">Categoria</label></td>
                        <td>
                            <select name="category">
                            <?php foreach ($categories as $key => $category):
                                echo '<option value="' . $category["id"] . '">' . $category["valor"] . '</option>';
                            endforeach
                            ?>    
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha y hora</label></td>
                        <td><input id="fecha" name="fecha" type="text"/></td>
                        <td><label for="tag">Tag</label></td>
                        <td>
                            <select name="tag">
                                <?php foreach ($tags as $key => $tag):
                                    echo '<option value="' . $tag["id"] . '">' . $tag["valor"] . '</option>';
                                endforeach
                            ?> 
                            </select>
                        </td>
                    </tr>
                </tbody>
                </table>
                Editor
                <hr/>
                   <textarea name="contenido" style="width:100%;height:500px;"></textarea>
                   <br/>
                   <button id="submit">Publicar</button>
            </form>
       </div>
</div>

<script type="text/javascript">
$('#fecha').datetimepicker()
    .datetimepicker();
</script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>