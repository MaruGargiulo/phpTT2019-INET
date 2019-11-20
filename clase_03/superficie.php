<?php

echo "<h3>Ejercicio 2.a - 2.b - 2.c - 2.d</h3>";

function triangulo($base, $altura) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return $base * ($altura / 2);
}

function rectangulo($base, $altura) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return $base * $altura;
}

function cuadrado($base) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return $base * $base;
}

function circulo($radio) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return pi() * $radio * $radio;
}


echo "Superficie triángulo:" . triangulo(6,4);
echo "<br>";

echo "Superficie rectángulo:" . rectangulo(4,12);
echo "<br>";

echo "Superficie cuadrado:" . cuadrado(4);
echo "<br>";

echo "Superficie circulo:" . circulo(12);
echo "<br>";
?>