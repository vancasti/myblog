<?php require_once SYS_PATH . '/inc/header.php'; ?>

<div class="container">
    <div class="one-third column">
            <h4>Identificación usuario</h4>
            <form id="login" method="post" action=<?php echo APP_URI . 'auth/login';?>>
                <label for="email">email</label>
                <?php  if (isset($errorEmail)) echo '<span class="error">' . $errorEmail . '</span>'; ?>
                    <input name="email" type="text"/>
                <label for="password">password</label>
                <?php  if (isset($errorPassword)) echo '<span class="error">' . $errorPassword . '</span>'; ?>
                    <input name="password" type="password"/>
                <button id="submit">Log in</button>
            </form>
            <a href=<?php echo  APP_URI . 'register'; ?>>Nuevo Usuario</a>
    </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>