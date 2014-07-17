<?php require_once SYS_PATH . '/inc/header.php'; ?>
<div class="container">
    <div class="eight columns">
            <h4>Registro Usuario</h4>
            <form id="login" method="post" action=<?php echo APP_URI . 'register/new'; ?>>
                <table class="noborder">
                <tbody>
                    <tr>
                        <td><input name="name" type="text" placeholder="Inserte nombre completo"/></td>
                        <td><?php  if (isset($errorName)) echo '<span class="error">' . $errorName . '</span>'; ?></td>
                    </tr>
                    <tr>
                        <td><input name="email" type="text" placeholder="Inserte email"/></td>
                        <td><?php  if (isset($errorEmail)) echo '<span class="error">' . $errorEmail . '</span>'; ?></td>
                    </tr>
                   <tr>
                       <td><input name="password" type="password" placeholder="Inserte password"/></td>
                       <td><?php  if (isset($errorPassword1)) echo '<span class="error">' . $errorPassword1 . '</span>' ?></td>
                   </tr>
                   <tr>
                       <td><input name="password2" type="password" placeholder="Repita password"/></td>
                       <td><?php  if (isset($errorPassword2)) echo '<span class="error">' . $errorPassword2 . '</span>'; ?></td>
                   </tr>
                </tbody>
                </table>
                <button id="submit">Registrar</button>
            </form>
            <a href=<?php echo APP_URI . 'auth'; ?>>Volver</a>
    </div>
</div>
<?php require_once SYS_PATH . '/inc/footer.php'; ?>