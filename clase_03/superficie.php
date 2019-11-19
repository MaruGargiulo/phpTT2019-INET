<?php

echo "<h3>Ejercicio 2.a - 2.b - 2.c - 2.d</h3>";

function triangulo($base, $altura) {
    return $base * ($altura / 2);
}

function rectangulo($base, $altura) {
    return $base * $altura;
}

function cuadrado($base) {
    return $base * $base;
}

function circulo($radio) {
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