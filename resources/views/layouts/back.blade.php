<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Artículos</title>
	<link rel="stylesheet" href="{{ asset('css/back.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- ******************************** CABECERA ******************************** -->
	<header class="sombra-1">
		<div id="logo-back">
			<div class="desplegador-menu"><span class="icon-menu"></span></div>
			<figure></figure>
		</div>

		<div class="inicio-sesion"><!-- Este div abre los datos de la persona que inicia sesión -->
			<div class="contenedor-inicio-sesion">
				<div class="fecha"></div>
				<div class="avatar">
					<div class="usuario-avatar">Ana Karen García</div>
					<figure>
						<img src="{{ asset('img/person-7.jpg') }}" alt="">
					</figure>
				</div>
			</div>
		</div><!-- Este div cierra los datos de la persona que inicia sesión -->

	</header>



	<div id="contenedor-principal"> <!-- Este div contiene todo lo que se encuentra debajo del header -->

<!-- ******************************** MENÚ IZQUIERDO ******************************** -->
		<div class="menu">
			<nav class="nav">
				<section class="seccion">
					<h4><span class="icon-user"></span> Usuarios <span class="icon-flecha-abajo"></span> </h4>
					<ul class="bloque">
						<li>
							<a href="http://demo.topotv.com/back/create-user.html">Crear usuario</a>
						</li>
						<li>
							<a href="http://demo.topotv.com/back/view-users.html">Ver usuarios</a>
						</li>
					</ul>
				</section>

				<section class="seccion">
					<h4><span class="icon-articulos"></span> Artículos <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ url('articles/create') }}">Crear artículo</a>
						</li>
						<li>
							<a href="{{ url('articles/') }}">Ver artículos existentes</a>
						</li>
					</ul>
				</section>
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Categorías <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						{{-- <li>
							<a href="">Crear categoría</a>
						</li> --}}
						<li>
							<a href="http://demo.topotv.com/back/view-categories.html">Ver categorías existentes</a>
						</li>
					</ul>
				</section>

			</nav>
		</div> <!-- Este div cierra el menú izquierdo-->

			@yield('content')

	</div>
</div>






<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/material.js') }}"></script>


</body>
</html>
