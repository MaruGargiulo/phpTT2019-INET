<?php

var_dump($_POST);

// valido si el usuario envió información
if($_POST) {
    // creo un array vacío de errores
    $errores = [];

    if($_POST['nombre'] == '') {
        // creo un nuevo índice con la clave 'nombre' en el array de errores
        $errores['nombre'] = 'El nombre es obligatorio';
    }

    if($_POST['email'] == '') {
        // creo un nuevo índice con la clave 'nombre' en el array de errores
        $errores['email'] = 'El email es obligatorio';
    }

    var_dump($errores);

    /* if(!$errores) {
        var_dump('listoo');
    } */
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body> 
    <form action="" method="POST">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="" style="display:block">
        
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= isset($errores['nombre'])?>" style="display:block">

        <input type="submit">

    </form>
</body>
</html>