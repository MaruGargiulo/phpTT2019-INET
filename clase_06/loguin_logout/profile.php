<?php
session_start();
$usuario = $_SESSION['usuarioLogueado'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>¡Hola <?= $usuario['name'] ?>!</h2>
    <hr>
    <p>Email: <?= $usuario['email'] ?> </p>
    <img src="avatars/<?= $usuario['avatar'] ?>" width="300px">
    <div>
        <button type="button"><a href="edit-profile.php" style="text-decoration:none;color:inherit;">Editar perfl</a></button>
        <button type="button"><a href="sesion-controller.php" style="text-decoration:none;color:inherit;">Cerrar sesión</a></button>
    </div>
</body>
</html>