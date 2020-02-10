<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Artículos</title>
	<link rel="stylesheet" href="{{ asset('css/back.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
	@yield('page_styles')
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
					<h4><span class="icon-user"></span> Mi perfíl <span class="icon-flecha-abajo"></span> </h4>
					<ul class="bloque">
						<li>
							<a href="{{ url('/users/perfil') }}">Ver perfil</a>
						</li>
						<li>
							<a href="{{ url('/users/perfil/vendedores') }}">Ver perfil (vendedor)</a>
						</li>
						<li>
							<a href="">Editar Perfil</a>
						</li>
					</ul>
				</section>
				@role('admin')
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Vendedores <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="">Lista de vendedores</a>
						</li>
						<li>
							<a href="{{ url('/users/create') }}">Crear Vendedor</a>
						</li>
					</ul>
				</section>
				@endrole
				@role('admin')
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Distribuidores <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ url('/users/index')}}">Autorizados</a>
						</li>
						<li>
							<a href="http://demo.topotv.com/back/view-categories.html">Solicitantes</a>
						</li>

					</ul>
				</section>
				@endrole
				@role('admin')
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Subir Excel de Usuarios <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ route('importExcel.get')}}">Entrar</a>
						</li>
					</ul>
				</section>
				@endrole
				@role(['designer','admin'])
				<section class="seccion">
					<h4><span class="icon-articulos"></span> Productos <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						@role('admin')
						<li>
							<a href="{{ url('users/productos/') }}">Productos (distribuidores)</a>
						</li>
						<li>
							<a href="{{ url('users/vendedores/') }}">Productos (vendedores)</a>
						</li>
						@endrole
						@role(['designer','admin'])
						<li>
							<a href="{{ url('articles/create') }}">Crear Producto</a>
						</li>
						<li>
							<a href="{{ url('articles/') }}">Todos los productos</a>
						</li>
						@endrole
						@role('admin')
						<li>
							<a href="">Productos existentes</a>
						</li>
						<li>
							<a href="">Productos disponibles</a>
						</li>
						<li>
							<a href="">Productos agotados</a>
						</li>
						@endrole
					</ul>
				</section>
				@endrole
				@role('admin')
				<section class="seccion">
					<h4><span class="icon-articulos"></span> Pedidos <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="">Todos los pedidos</a>
						</li>
						<li>
							<a href="">Aprovados</a>
						</li>
						<li>
							<a href="">En espera</a>
						</li>
						<li>
							<a href="">cancelados</a>
						</li>
					</ul>
				</section>
				@endrole
				@role('admin')
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Categorías <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						{{-- <li>
							<a href="">Crear categoría</a>
						</li> --}}
						<li>
							<a href="{{ url('categories/') }}">Ver categorías existentes</a>
						</li>
					</ul>
				</section>
				@endrole
				@role(['designer','admin'])
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Slides <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						{{-- <li>
							<a href="">Crear categoría</a>
						</li> --}}
						<li>
							<a href="{{ url('sliders/create') }}">Crear Slide</a>
						</li>
						<li>
							<a href="{{ url('sliders/') }}">Ver slides existentes</a>
						</li>
					</ul>
				</section>
				@endrole
				<!--@role(['distributor','admin'])
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Perfil <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ route('distributors.perfil') }}">Mi Perfil</a>
						</li>
					</ul>
				</section>
				@endrole
				@role(['distributor','admin'])
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Facturas <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ route('distributors.facturas') }}">Facturas</a>
						</li>
					</ul>
				</section>
				@endrole
				@role(['distributor','admin'])
				<section class="seccion">
					<h4><span class="icon-categorias"></span> Pedidos <span class="icon-flecha-abajo"></span></h4>
					<ul class="bloque">
						<li>
							<a href="{{ route('distributors.pedidos') }}">Mis Pedidos</a>
						</li>
					</ul>
				</section> 
				@endrole-->

			</nav>
		</div> <!-- Este div cierra el menú izquierdo-->

			@yield('content')

	</div>
</div>






<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/material.js') }}"></script>

@yield('page_scripts')

</body>
</html>
