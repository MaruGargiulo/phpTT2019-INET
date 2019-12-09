<?php

require('funciones.php');

if(estaLogueado()) {
    header('Location: profile.php');
    exit;
}

if($_POST) {

    $errores = validarLoguin();
    if(!$errores) {
        $usuario = buscarUsuarioPorEmail($_POST['email']);
        if( isset($_POST['recordarme']) ) {
            recordarUsuario($_POST['email']);
        }
        loguearUsuario($usuario);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Contact us</title>
</head>
<body>

        <form action='' method='post' style="width:70%;margin:0 auto;">
            <fieldset >
                <legend>Logueate</legend>

                <div style="padding:8px;">
                    Email:
                    <input type='text' name='email' value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Ingresá tu email"><br/>
                    <?php if(isset($errores['email'])): ?> 
                    <span style="color:red;"><?= $errores['email']?></span>
                    <?php endif; ?>
                </div>

                <div style="padding:8px;">
                    Contraseña:
                    <input type='password' name='password' placeholder="Ingresá una contraseña"><br>
                    <?php if(isset($errores['password'])): ?> 
                    <span style="color:red;"><?= $errores['password']?></span>
                    <?php endif; ?>
                </div>
                
                <div style="padding:8px;">
                    <label style="display:block;"><input type="checkbox" name="recordarme">Recordarme</label>
                </div>

                <div>
                    <input type='submit' value='Enviar'/>
                </div>

            </fieldset>
        </form>
    
    </body>
</html>
