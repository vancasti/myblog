<?php require_once SYS_PATH . '/inc/header.php'; ?>

<form class="content container clearfix">

<section class="error">
	
    <h4><?php echo $message; ?></h4>
    
    <br/>
    
    <img src="<?php echo $app->get('images_path') ?>/homer-error.gif"></img>
    
    <p>
        <a href="<?php echo APP_URI; ?>">&larr; volver a la página principal</a>
    </p>

</section>

</form>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>
