<?php


// include 'saludo.php';
/* Si hago un include de un archivo que no existe, el script se sigue ejecutando y hace el echo de "Soy inluir!". */

// require('saludo.php');
/* Si hago un require de un archivo que no existe, el script se rompe y corta la ejecución, por lo tanto no hará el echo de "Soy incluir!" */


echo "Soy incluir!";

?>