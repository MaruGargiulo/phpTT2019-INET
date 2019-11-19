<?php 

$paises = [
    "Argentina" => [
      "esAmericano" => true,
      "ciudades" => ["Buenos Aires", "Córdoba", "Santa Fé"]
    ],
    "Brasil" => [
      "esAmericano" => true,
      "ciudades" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"]
    ],
    "Colombia" => [
      "esAmericano" => true,
      "ciudades" => ["Cartagena", "Bogota", "Barranquilla"]
    ],
    "Francia" => [
      "esAmericano" => false,
      "ciudades" => ["Paris", "Nantes", "Lyon"]
    ],
    "Italia" => [
      "esAmericano" => false,
      "ciudades" => ["Roma", "Milan", "Venecia"]
    ],
    "Alemania" => [
      "esAmericano" => false,
      "ciudades" => ["Munich", "Berlin", "Frankfurt"]
    ]
  ];


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
    
    <h2>Lista de Países de América</h2>

    <!-- Recorro el array de paises. En la variable $pais guardo el índice (nombre de cada país) y en $data el valor de ese índice(array de cada país con su info: esAmericano y ciudades) -->
    <?php foreach($paises as $pais => $data) : ?>
    <!-- En $data (array) pregunto si el índice "esAmericano" es true. Se puede simplificar así también: $data["esAmericano"] -->
    <?php if($data["esAmericano"] === true) : ?>
    <!-- Si es americano, imprimo las ciudades -->
        <p> Las ciudades de <?= $pais ?> son: </p>
        <ul>
        <!-- En $data["ciudades"] tengo el array de ciudades de ese país americano. Lo recorro para imprimi cada una -->
        <?php foreach($data["ciudades"] as $ciudad) : ?>
        <li> <?= $ciudad; ?> </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php endforeach; ?>

</body>
</html>