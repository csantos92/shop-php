<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de viajes</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/logo.png" alt="Camiseta Logo" />
					<a href="<?=base_url?>">
						Tienda de viajes
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categories = Utils::showCategories(); ?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">Inicio</a>
					</li>
					<?php while($cat = $categories->fetch_object()):?>
					<li>
						<a href="<?=base_url?>category/show&id=<?=$cat->id?>"><?=$cat->name?></a>
					</li>
					<?php endwhile; ?>
				</ul>
			</nav>

			<div id="content">