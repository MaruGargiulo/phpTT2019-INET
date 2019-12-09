<?php 

session_start();

if($_POST) {
    if(isset($_POST['reiniciar'])) {
        $_SESSION['contador'] = 0;
    }
    if(isset($_POST['incrementar'])) {
        $_SESSION['contador']++;
    }
    header('Location: mostrar.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contador</title>
</head>
<body>
    <h4>Setear contador</h4>
    <form action="" method="POST">
        <button type="submit" name="reiniciar">Reiniciar</button>
        <button type="submit" name="incrementar">Incrementar</button>
    </form>
</body>
</html>