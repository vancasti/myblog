<?php require_once SYS_PATH . '/inc/header.php'; ?>

<div class="container">
    <div class="nine columns">
            <h4>Identificación usuario</h4>
            <form id="login" method="post" action=<?php echo APP_URI . 'auth/login';?>>
                <table class="noborder">
                <tbody>
                    <tr>
                        <td><input name="email" type="email" placeholder="Inserte email" value="<?php if(isset($email)) echo $email; ?>"/></td>
                        <td><?php  if (isset($errorEmail)) echo '<span class="error">' . $errorEmail . '</span>'; ?></td>
                    </tr>
                    <tr>
                        <td><input name="password" type="password" placeholder="Inserte password" /></td>
                        <td><?php  if (isset($errorPassword)) echo '<span class="error">' . $errorPassword . '</span>'; ?></td>
                    </tr>
                </tbody>
                </table>
                <button id="submit">Log in</button>
            </form>
            <a href=<?php echo  APP_URI . 'register'; ?>>Nuevo Usuario</a>
    </div>
</div>

<?php require_once SYS_PATH . '/inc/footer.php'; ?>