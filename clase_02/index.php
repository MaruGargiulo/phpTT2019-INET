<?php

echo "<h3>Ejercicio 1</h3>";

for($i = 0; $i <= 10; $i++) { 
 echo "2 x $i = " . $i * 2 . "<br>";
}

echo "<br><hr><br>";

echo "<h3>Ejercicio 2</h3>";

$numero = 100;
while($numero >= 85) {
echo $numero . "<br>";
$numero--; 
}

echo "<br><hr><br>";

echo "<h3>Ejercicio 3</h3>";

$contador = 1;
while($contador <= 5) {
echo $contador * 2 . "<br>";
$contador++;
}

echo "<br><hr><br>";

echo "<h3>Ejercicio 4</h3>";

$cantCaras = 0;
$cantTiros = 0;

while($cantCaras < 5) {
    $cantTiros++;
    $moneda = rand(0,1);
    if($moneda == 1) {
        $cantCaras++;
    }
}

echo "Llevó $cantTiros tiros sacar 5 veces cara.";

echo "<br><hr><br>";

echo "<h3>Ejercicio 5</h3>";

$nombres = ["Homero", "Marge", "Bart", "Lisa", "Maggie"];

echo "<p>Con un for</p>";

for($i=0;$i < count($nombres); $i++) {
    echo $nombres[$i] . "<br>";
}

echo "<p>Con un while</p>";

$indiceNombres = 0;

while($indiceNombres < count($nombres)) {
    echo $nombres[$indiceNombres] . "<br>";
    $indiceNombres++;
}

echo "<p>Con un do-while</p>";

$indiceNombresDW = 0;
do {
    echo $nombres[$indiceNombresDW] . "<br>";
    $indiceNombresDW++;
} while($indiceNombresDW < count($nombres));

echo "<p>Con un foreach</p>";

foreach($nombres as $nombre) {
    echo $nombre . "<br>";
}

echo "<br><hr><br>";

echo "<h3>Ejercicio 6</h3>";

$arrayNum = [];
for($i=0; $i < 10; $i++) {
    $arrayNum[] = rand(0,10);
}

foreach($arrayNum as $num) {
    if($num == 5) {
        echo "Se encontró un 5!";
        break;
    }
    echo $num . "<br>";
}

echo "<br><hr><br>";

echo "<h3>Ejercicio 7</h3>";

$numRandom = [];
for($i=0; $i < 100; $i++) {
    $numRandom[] = rand(0,10);
}

$numPares = 0;
foreach($numRandom as $num) {
    if($num % 2 == 0) {
        $numPares++;
    }
}

echo "De los 100 números del array de número aleatorios, $numPares son pares";

echo "<br><hr><br>";

echo "<h3>Ejercicio 8</h3>";

$mascota = [
    "animal" => "perro",
    "edad" => 2,
    "altura" => 0.75,
    "nombre" => "Fido"
];

foreach($mascota as $clave => $valor) {
    echo "$clave: $valor <br>";
}

?>