<?php

$funcionesEjecutadas = 0;

/*
En este caso estamos definiendo la variable $funcionesEjecutadas en el ámbito global, de modo que, para poder referirnos a ella DENTRO de una función tendremos que aclararlo usando la palabra reservada global.

EJEMPLO

funcion prueba() {
    
    global $funcionesEjecutadas;
    // con esta línea le estoy diciendo: andá al scope global y tomá la variable $funcionesEjecutadas, voy a trabajar con ella adentro del scope de esta función

    // de esta manera, ahora tengo control sobre la misma, pudiento trabajar directamente con ella
    return $funcionesEjecutadas++;
}

*/

require('funciones.php');
require('superficie.php');

function superficieMayor($radio1, $radio2, $radio3) {
    return mayor(circulo($radio1), circulo($radio2), circulo($radio3));
}

echo "<h3>Ejercicio 4</h3>";
echo "La superficie más grande es: " . superficieMayor(5,5,6);

echo "<br><hr><br>";
echo "Ya se ejecutaron " . $funcionesEjecutadas. " funciones";
echo "<br><hr><br>";

echo "<h3>Ejercicio 4</h3>";

$frase = "Me encanta php, a mi también me encanta php!";
echo "La primera ocurrencia de la palabra 'php' está en la posición " . strpos($frase, 'php');

?>