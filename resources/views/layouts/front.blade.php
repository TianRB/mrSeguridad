<!DOCTYPE html>
<html lang="es">
<head>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="UTF-8">
	<title>MR Seguridad</title>
</head>
<body>
	<div class="cuadro-negro"></div>
	<header>
		<figure class="logo">
			<a href="{{ url('/') }}">
				<img src="{{ asset('img/logo.png') }}" alt="mr Seguridad">
			</a>

		</figure>
		<div class="menu-principal">
			<div class="rayitas rayitas-desactivas">
				<div class="rayita rayita-uno"></div>
				<div class="rayita rayita-dos"></div>
				<div class="rayita rayita-tres"></div>
			</div>
		</div>

	</header>

	<nav>

		<ul>
			<form class="" method="POST" id="searchFilter" action="{{ route('front.search') }}">
				{{ csrf_field() }}
				<input class="buscador" type="text" value=""  name="search" placeholder="Buscar producto" autocomplete="off">
				<button class="hidden" type="submit"></button>
			</form>
			<p>Categorías de productos</p>
			@foreach ($categories as $c)
				<li><a href="{{ url('productos/'.$c->slug) }}">{{ $c->name }}</a></li>
			@endforeach
		</ul>

		<div class="inicio-sesion">
			<a href="{{ url('/formulario') }}">Regístrate</a>
			<a href="{{ url('/login') }}">Inicio de Sesión</a>
			<a href="{{ asset('img/catalogo-mr.pdf') }}" target="_blank" class="descargar-catalogo">Descargar Catálogo</a>
		</div>

		<div class="nosotros-menu">
			<a href="{{ url('/extra') }}">Somos</a>
			<a href="{{ url('/contacto') }}">Políticas</a>
		</div>
		<div class="redes">
			<p>Siguenos en nuestras redes sociales</p>
			<a href="https://www.facebook.com/MRSeguridad/" target="_blank"><span class="icon-facebook2"></span></a>
			<a href="https://www.instagram.com/explore/locations/156784164367692/mexico/veracruz-llave-veracruz-llave-mexico/mr-seguridad/?hl=es-la" target="_blank"><span class="icon-instagram"></span></a>
			<a href="https://www.youtube.com/user/MRSeguridadVer" target="_blank"><span class="icon-youtube"></span></a>
		</div>
	</nav>
	<div class="flechas-antes-despues">
		<button class="btn-antes-despues" onclick="window.history.back();"><div class="back"></div></button>
		<button class="btn-antes-despues" onclick="window.history.forward();"><div class="front"></div></button>
	</div>

	@yield('content')


	<!-- ****************  ABRE FOOTER  **************** -->
	<div class="contacto" id="contacto">
		<div class="fondo-contacto"></div>
		<article>
			<h2>Aquí puedes encontrar a tu distribuidor más cercano.</h2>
		</article>
		<div class="mapa">
			{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15007976.465466967!2d-111.65082483132548!3d23.313699520377405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses-419!2smx!4v1533860657728" frameborder="0" style="border:0" allowfullscreen></iframe> --}}

			<iframe src="https://www.google.com/maps/d/embed?mid=1yPFOAraRgZI_xOJCpoGbNUqU57x1UYgu" frameborder="0" style="border:0" allowfullscreen></iframe>

		</div>
		<h3>Queremos escucharte</h3>
		<form action="" class="formulario-contacto">
			<ul>
				<li><input type="text" placeholder="Nombre y Apellido"></li>
				<li><input type="text" placeholder="Correo Electrónico"></li>
				<li><input type="text" placeholder="Teléfono"></li>
				<li><input type="text" placeholder="Estado desde dónde se comunican"></li>
				<li><textarea name="" id="" placeholder="¿Cómo podemos ayudarle?"></textarea></li>
			</ul>
			<div class="checkbox-container">
				<p>¿Quién eres?</p>
				<div class="check-awesome" class="form-group">
					<input type="radio" name="category[]" class="checkbox" value="">
					<label for="check-me">Distribuidor</label>
				</div>
				<div class="check-awesome" class="form-group">
					<input type="radio" name="category[]" class="checkbox" value="">
					<label for="check-me">Usuario Final</label>
				</div>
				<div class="check-awesome" class="form-group">
					<input type="radio" name="category[]" class="checkbox" value="">
					<label for="check-me">Otro</label>
				</div>
			</div>
			<div class="btn-enviar">enviar</div>
		</form>
	</div>

	<footer>
		<p>Aviso de Privacidad 2018 © Copyright MR SEGURIDAD - Av. Fidelidad, Col. Industrial Bruno Pagliai, Veracruz Ver. C.P. 91697 Tel.: (229) 986 20 49 - Fabricante de equipo de proteccion personal, seguridad industrial y vial, Equipo de seguridad industrial, Equipo de seguridad vial, Equipo de protección visual, Equipo de protección para manos, Equipo de protección auditiva, Equipo de protección respiratoria, Equipo de protección para la lluvia Veracruz México</p>
	</footer>
	<!-- ****************  CIERRA FOOTER  **************** -->


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<script type="application/javascript">
	jQuery('input[type=file]').change(function(){
		var filename = jQuery(this).val().split('\\').pop();
		var idname = jQuery(this).attr('id');
		console.log(jQuery(this));
		console.log(filename);
		console.log(idname);
		jQuery('span.'+idname).next().find('span').html(filename);
	});

	Cookies.set('name','{!! $categories->toJson() !!}');
	console.log(Cookies.get('name'));

	</script>


</body>
</html>
