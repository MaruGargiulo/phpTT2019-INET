<?php

require('funciones.php');

if(estaLogueado()) {
    header('Location: profile.php');
    exit;
}

if($_POST) {

    $errores = validarRegistro($_POST);

    if(!$errores) {
    
        $usuarioNuevo = crearUsuario($_POST);
        $nombreImagen = guardarAvatar();
        $usuarioNuevo['avatar'] = $nombreImagen;
        guardarUsuario($usuarioNuevo);
        header('Location: loguin.php');
       
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

        <form action='' method='post' enctype="multipart/form-data" style="width:70%;margin:0 auto;">
            <fieldset >
                <legend>Registrate</legend>

                <div style="padding:8px;">
                    Nombre:
                    <input type='text' name='name' value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Ingresá tu nombre"> <br>
                    <?php if(isset($errores['name'])): ?> 
                    <span style="color:red;"><?= $errores['name']?></span>
                    <?php endif; ?>
                </div>  

                <div style="padding:8px;">
                    Email:
                    <input type='text' name='email' value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Ingresá tu email"><br/>
                    <?php if(isset($errores['email'])): ?>
                    <span style="color:red;"><?= $errores['email']?></span>
                    <?php endif; ?>
                </div>

                <div style="padding:8px;">
                    Nombre de usuario:
                    <input type='text' name='username' value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Ingresá un nombre de usuario"><br/>
                    <?php if(isset($errores['username'])): ?>
                    <span style="color:red;"><?= $errores['username']?></span>
                    <?php endif; ?>
                </div>

                <div style="padding:8px;">
                    Avatar:
                    <input type='file' name='avatar'><br>
                    <?php if(isset($errores['avatar'])): ?>
                    <span style="color:red;"><?= $errores['avatar']?></span>
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
                    Repetir contraseña:
                    <input type='password' name='confirm-password' placeholder="Repetí la contraseña igresada"><br>
                    <?php if(isset($errores['repassword'])): ?>
                    <span style="color:red;"><?= $errores['repassword']?></span>
                    <?php endif; ?>
                </div>
                
                <div>
                    <input type='submit' name='Submit' value='Enviar' />
                </div>
            </fieldset>
        </form>
    
    </body>
</html>
