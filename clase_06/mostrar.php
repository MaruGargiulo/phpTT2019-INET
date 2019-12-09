<?php
session_start();
session_destroy();
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
    <h4> <?= $_SESSION['contador'] ? $_SESSION['contador'] : "El contador está en 0, aún no fué seteado."; ?></h4>
    <a href="modificar.php" style="text-decoration:none;color:black"><button>volver</button></a>
</body>
</html>