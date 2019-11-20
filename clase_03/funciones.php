<?php

global $funcionesEjecutadas;

echo "<h3>Ejercicio 1.a</h3>";

function mayor($num1, $num2, $num3) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return $num1 > $num2 && $num1 > $num3 ? $num1 : ( $num2 > $num3 ? $num2 : $num3);
};

echo mayor(22,145,102);

echo "<br><hr>";

echo "<h3>Ejercicio 1.b</h3>";

function tabla($base, $limite) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    $secuencia = [];
    for($i = $base; $i <= $limite; $i++) {
        $secuencia[] = $i;
    };
    return $secuencia;  
};

var_dump(tabla(12, 22));

echo "<br><hr>";

echo "<h3>Ejercicio 1.c</h3>";

function mayorModificada($num1, $num2, $num3 = 100) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    return $num1 > $num2 && $num1 > $num3 ? $num1 : ($num2 > $num3 ? $num2 : $num3);
};

echo mayorModificada(150,45);

echo "<br><hr>";

echo "<h3>Ejercicio 1.d</h3>";

function tablaModificada($base, $limite = 100) {
    global $funcionesEjecutadas;
    $funcionesEjecutadas++;

    $secuencia = [];
    for($i = $base; $i <= $limite; $i++) {
        $secuencia[] = $i;
    };
    return $secuencia;  
};

var_dump(tablaModificada(55));


?>