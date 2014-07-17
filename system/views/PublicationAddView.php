<?php require_once SYS_PATH . '/inc/header.php'; ?>
<?php require_once SYS_PATH . '/inc/menu.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo $app->get('js_path'); ?>/jquery/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo $app->get('js_path'); ?>/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo $app->get('js_path'); ?>/jquery/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL . '/tinymce/tinymce.min.js'; ?>"></script>

<div class="container">
    <div class="two-thirds columns">
            <br/>
            Opciones
            <hr/>
            <?php require_once SYS_PATH . '/inc/messages.php'; ?>
            <form id="new_publication" class="noborder" method="post" action="<?php echo APP_URI . 'private/publication/'. (isset($publication)? 'edit' : 'add'); ?>">
             <table>
                <tbody>
                    <tr>
                        <td><label for="titulo">Título</label></td>
                        <td><input type="text" name="titulo" value="<?php if(isset($publication)) echo $publication["titulo"]; ?>"></input></td>
                        <td><label for="categoria">Categoria</label></td>
                        <td>
                            <select name="categoria">
                            <?php foreach ($categories as $key => $category):
                                echo '<option value="' . $category["id"] . '"' . ($category["id"]==$publication["id_categoria"] ? 'selected' : '') . '>' . $category["valor"] . '</option>';
                            endforeach
                            ?>    
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha publicación</label></td>
                        <td><input id="fecha" name="fecha" type="text" value="<?php if(isset($publication)) echo $publication["fpublicacion"]; ?>"/></td>
                        <td><label for="tags">Tags</label></td>
                        <td>
                            <select name="tags[]" multiple>
                                <?php foreach ($tags as $key => $tag):
                                    echo '<option value="' . $tag["id"] . '">' . $tag["valor"] . '</option>';
                                endforeach
                                ?> 
                            </select>
                        </td>
                    </tr>
                </tbody>
                <?php
                    if(isset($publication)) 
                        echo '<input type="hidden" value="'. $publication["id"] .'" name="id"></input>';
                ?>
                </table>
                Editor
                <hr/>
                   <textarea name="contenido" style="width:100%;height:500px;"><?php if(isset($publication)) echo $publication["contenido"]; ?></textarea>
                   <br/>
                   <button id="submit">Publicar</button>
            </form>
       </div>
</div>

<script type="text/javascript">
$('#fecha').datetimepicker({
        format:'Y-m-d H:i',
});
</script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern jbimages"
    ],
    toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>