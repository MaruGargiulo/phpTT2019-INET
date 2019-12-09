<?php

require('funciones.php');

if(!estaLogueado()) {
    header('Location: profile.php');
    exit;
} else {
    $usuario = $_SESSION['usuarioLogueado'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar perfil</title>
</head>
<body>
    
<form action='' method='post' enctype="multipart/form-data" style="width:70%;margin:0 auto;">
            <fieldset >
                <legend>Editar perfil</legend>

                <div style="padding:8px;">
                    Nombre:
                    <input type='text' name='name' value="<?= $usuario['name'] ?>"> <br>
                    <?php if(isset($errores['name'])): ?> 
                    <span style="color:red;"><?= $errores['name']?></span>
                    <?php endif; ?>
                </div>  

                <div style="padding:8px;">
                    Email:
                    <input type='text' name='email' value="<?= $usuario['email'] ?>" disabled><br/>
                    <?php if(isset($errores['email'])): ?>
                    <span style="color:red;"><?= $errores['email']?></span>
                    <?php endif; ?>
                </div>

                <div style="padding:8px;">
                    Nombre de usuario:
                    <input type='text' name='username' value="<?= $usuario['username'] ?>" disabled><br/>
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
                    <button type='submit'>Editar</button>
                    <button type="button"><a href="profile.php" style="text-decoration:none;color:inherit;">Volver</a></button>
                </div>
            </fieldset>
        </form>

</body>
</html>