<?php

	$productos = [
		0 => [
			"id" => 1,
			"titulo" => "Celu 1",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-1.jpg",
			"enOferta" => true,
		],
		1 => [
			"id" => 2,
			"titulo" => "Celu 2",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-2.jpg",
			"enOferta" => false,
		],
		2 => [
			"id" => 3,
			"titulo" => "Celu 3",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-3.jpg",
			"enOferta" => true,
		],
		3 => [
			"id" => 4,
			"titulo" => "Celu 4",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-1.jpg",
			"enOferta" => false,
		],
		4 => [
			"id" => 5,
			"titulo" => "Celu 5",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-2.jpg",
			"enOferta" => true,
		],
		5 => [
			"id" => 6,
			"titulo" => "Celu 6",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-3.jpg",
			"enOferta" => true,
		],
		6 => [
			"id" => 7,
			"titulo" => "Celu 7",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-1.jpg",
			"enOferta" => true,
		],
		7 => [
			"id" => 8,
			"titulo" => "Celu 8",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-2.jpg",
			"enOferta" => false,
		],
		8 => [
			"id" => 9,
			"titulo" => "Celu 9",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-3.jpg",
			"enOferta" => true,
		],
		9 => [
			"id" => 10,
			"titulo" => "Celu 10",
			"descripcion" => "Lorem impsum",
			"precio" => 300,
			"imagen" => "img-pdto-1.jpg",
			"enOferta" => true,
		]
	];

	$navBar = ["Home", "Quienes", "Servicios", "Portfolio", "Sucursales", "Contacto"];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="container">

		<!-- cabecera -->
		<header class="main-header">
			<img src="images/logo.jpg" alt="logotipo" class="logo">

			<a href="#" class="toggle-nav">
				<span class="fa fa-bars"></span>
			</a>

			<nav class="main-nav">
				<ul>
					<?php foreach($navBar as $item): ?>
					<li><a href=""><?=$item?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</header>

		<!-- banner -->
		<section class="banner">
			<img src="images/img-banner.jpg" alt="banner">
		</section>

		<!-- productos -->
		<section class="vip-products">
			<?php foreach($productos as $indice => $producto): ?>
				<article class="product">
					<div class="photo-container">
						<img class="photo" src="images/<?=$producto["imagen"]?>" alt="pdto "<?=$producto["id"]?>>
						<img class="special" src="images/img-nuevo.png" alt="plato nuevo">
						<a class="zoom" href="#">Ampliar foto</a>
					</div>
					<h2><?=$producto["titulo"] ?></h2>
					<p><?=$producto["descripcion"]?></p>
					<a class="more" href="#">ver más</a>
					<p><?= $producto["enOferta"] ? "EN OFERTA" : "" ; ?></p>
				</article>
			<?php endforeach; ?>
		</section>

		<footer class="main-footer">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">quienes</a></li>
				<li><a href="#">servicios</a></li>
				<li><a href="#">portfolio</a></li>
				<li><a href="#">sucursales</a></li>
				<li><a href="#">contacto</a></li>
			</ul>
		</footer>
	</div>

	</body>
</html>
