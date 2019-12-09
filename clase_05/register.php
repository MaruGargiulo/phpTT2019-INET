<?php

/*
Otra forma de resolver la pseudo-base de datos que creamos con Json:
    1. Crear el archivo usuarios.json
    2. Escribir adentro un array vacío: []

    Con esto ganamos un paso: cuando decodifiquemos el json de usuarios, ya vamos a tener un array. A ese array le vamos a pushear cada nuevo usuario que se registre, de modo que vamos a tener un array que en cada posición va a tener un array con un usuario diferente.
*/

require('funciones.php');

if($_POST) {

    // ver función validar() en archivo funciones.php
    $errores = validar($_POST);

    if(!$errores) {
        // llamo a la función guardarUsuario() --> me devuelve un array asociativo con los datos que envió el usuario
        $usuario = guardarUsuario($_POST);

        // llamo a la función guardarAvatar() --> guarda la imagen y devuelve le nombre con el que guardé la imagen
        $nombreImagen = guardarAvatar();

        // al array asocativo del nuevo usuario, le creo la posición "avatar" para guardar el nombre de la imagen que subió el usuario
        $usuario['avatar'] = $nombreImagen;

        // me traigo el contenido del archivo usuarios.json
        $listaDeUsuarios = file_get_contents('usuarios.json');

        // convierto ese contenido a formato array para poder manipular los datos
        $arrayUsuarios = json_decode($listaDeUsuarios, true);

        // en la última posicón del array de usuarios me guardo al nuevo usuario
        $arrayUsuarios[] = $usuario;

        // convierto el aray de usuarios a formato json para volver a guardarlo en el archivo de usuarios
        $todosLosUsuarios = json_encode($arrayUsuarios);

        // guardo el json completo de ususarios en usuarios.json 
        file_put_contents('usuarios.json', $todosLosUsuarios);

        // por ahora redirecciono a la misma vista
        header('Location: register.php');
        
        /*
        Más adelante, después de guardar al usuario, deberíamos redireccionarlo a otra vista:
        opción A: redireccionarlo a la vista de login para que inicie sesión
        opción B: loguearlo atomáticamente y redireccionarlo a la vista de perfil

        La clase que viene vamos a ver cómo iniciar y mantener la sesión de un usuario así como también recordar los datos de un usuario en el navegador para que, la próxima vez que ingrese a la url, se autologue
        */
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
