<?php

$nombre = "maru";
$test = [$nombre];
var_dump($test);
// comentarios de una sola línea

/*
comentarios
para más
de una
línea
*/

/*
En esta resolución van a encontrar esto repetido en varios lugares: echo "<br>" y echo "<hr>"
Con el echo imprimo esas etiquetas en el navegador.
<br> es un salto de línea (un enter)
<hr> es una línea horizontal
*/

// EJEMPLO VISTO EN CLASE DE OPERADOR DE COMPARACIÓN
// Prueben de hacer la comparación con 2 iguales y con 3 para ver los diferentes resultados
echo 30 === "30" ? "Son lo mismo": "Son distintos";

echo "<br>";
echo "<hr>";


// RESUELTOS


// -----ARRAYS-----

$persona = [
    "nombre" => "Jon",
    "apellido" => "Snow",
    "edad" => 27,
    "hobbies" => ["Netflix", "Fútbol", "Programar"]
];

$persona["edad"] = 25;
$persona["direccion"] = "Winterfell";
// Si se ejecutara la línea de abajo, estaríamos sobre-escribiendo la posición "hobbies" con el string "Counter Strike" y dejaría de ser una array
// $persona["hobbies"] = "Counter Strike";

// Para agregar un nuevo hobbie al final del array ya existente, agregamos corchetes vacíos 
$persona["hobbies"][] = "Counter Strike";

// Acostúmbrense a hacer var_dump() para ver qué contenido tienen sus variables y debuguear en caso de errores
// var_dump($persona);


// -----CONDICIONALES-----

$numA = 128;
$numB = 44;

// 1. if-ternario para saber cuál es mayor
$numMayor = $numA > $numB ? $numA : $numB;
echo "El número mayor es $numMayor";

echo "<br>";
echo "<hr>";

// 2. se evalúa si el número random es 3 o 5. En caso de ser verdadero, imprime ese número, de lo contrario, imprime el texto del final
$randomNum = rand(1,5);
echo $randomNum == 3 || $randomNum == 5 ? $randomNum : "El número aleatorio no es ni 3 ni 5" ;

echo "<br>";
echo "<hr>";

// 3. reutulizamos la variable $randomNum del ejercicio anterior. Estuctrua if tradicional para ver otro ejemplo de cómo resolverlo
if($randomNum !== 3) {
    echo "El número NO es 3";
} else {
    echo $randomNum;
}

echo "<br>";
echo "<hr>";

// 4.
$numeroAleatorio = rand(1,100);
if($numeroAleatorio > 50) {
    echo "El número es mayor a 50";
} else {
    echo "El número es menor a 50";
}

// Con la  estructura de arriba no estamos contemplando si el número ES 50. En ese caso podríamos intentar atrapar ese caso al principio. Lo dejo comentado para que prueben las dos opciones.

// if($numeroAleatorio == 50) {
//     echo "¡El número es 50!";
// } else if($numeroAleatorio > 50){
//     echo "El número es menor a 50";
// } else {
//     echo "El número es menor a 50";
// }

echo "<br>";
echo "<hr>";

// 5. 

$nombreDeUsuario = "Maru";
$contraseñaDeUsuario =  "123456";

// if($nombreDeUsuario == "admin" && $contraseñaDeUsuario == "1234") {
//     echo "¡Bienvenido!";
// } else {
//     echo "Ocurrió un error en el login. Por favor, vuelva a ingresar los datos.";
// }

// 5. a => agregamos validaciones al condicional de arriba para saber si el error está en la contraseña, el nombre de usuario ó si alguno de los dos está vacío. Lo dejo comentado para que prueben los dos.

if($nombreDeUsuario == "" || $contraseñaDeUsuario == "") {
    echo "Por favor, complete los campos.";
} else if($nombreDeUsuario !== "admin"){
    echo "El nombre de usuario ingresado no es el esperado";
} else if ($contraseñaDeUsuario !== "1234") {
    echo "La contraseña ingresada no es válida";
}

// Prueben de cambiar el valor de las variables $nombreDeUsuario y $contraseñaDeUsuario para testeear qué pasa en cada caso

echo "<br>";
echo "<hr>";

// 6. 

$edad = 14;
$casado = true;
$sexo = "Otro";

if($edad > 18 && !$casado || $sexo == "Otro") {
    echo "Bienvenido";
}

echo "<br>";
echo "<hr>";

// 7.

$cantidadDeAlumnos = 34;
// les dejo comentadas las otras opciones para que vayan probando de a una que pasa en cada caso
// $cantidadDeAlumnos = 100;
// $cantidadDeAlumnos = -100;
// $cantidadDeAlumnos = -1;
// $cantidadDeAlumnos = 1;
// $cantidadDeAlumnos = 0;

if($cantidadDeAlumnos) {
    echo "true";
} else {
    echo "false";
}

echo "<br>";
echo "<hr>";

// 8. 

$numero = 22;
echo $numero % 2 == 0 ? "El número es par" : "El número es impar";

echo "<br>";
echo "<hr>";

// 9.

$nota = 5;

switch($nota) {
    case 1:
    case 2:
    case 3:
        echo "desaprobado";
        break;
    case 4:
    case 5:
        echo "zafamoo vieja";
        break;
    case 6:
    case 7:
    case 8:
        echo "Bien!!";
        break;
    case 9:
        echo "MUY bien!";
        break;
    case 10:
        echo "¡Excelente!";
        break;
    default:
        echo "El número no es válido";
}

?>