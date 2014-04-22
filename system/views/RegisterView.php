<?php require_once SYS_PATH . '/inc/header.php'; ?>
<div class="container">
    <div class="two-thirds column">
            <h4>Registro Usuario</h4>
            <form id="login" method="post" action=<?php echo APP_URI . 'register/new'; ?>>
                <label for="name">nombre</label>
                <?php  if (isset($errorName)) echo '<span class="error">' . $errorName . '</span>'; ?>
                    <input name="name" type="text" />
                <label for="email">email</label>
                <?php  if (isset($errorEmail)) echo '<span class="error">' . $errorEmail . '</span>'; ?>
                    <input name="email" type="text"/>
                <label for="password">password</label>
                <?php  if (isset($errorPassword1)) echo '<span class="error">' . $errorPassword1 . '</span>' ?>
                    <input name="password" type="password"/>
                <label for="password2">repita password</label>
                <?php  if (isset($errorPassword2)) echo '<span class="error">' . $errorPassword2 . '</span>'; ?>
                    <input name="password2" type="password"/>
                <button id="submit">Registrar</button>
            </form>
            <a href=<?php echo APP_URI . 'auth'; ?>>Volver</a>
    </div>
</div>
<?php require_once SYS_PATH . '/inc/footer.php'; ?>