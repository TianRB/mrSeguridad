<!DOCTYPE html>
<html lang="es">
<head>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>MR Seguridad</title>
</head>
<body>
<header>
	<figure class="logo">
		<a href="http://18.221.15.19/mrSeguridad/public/">
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
	<div class="inicio-sesion">
		<a href="">Regístrate</a>
		<a href="http://18.221.15.19/mrSeguridad/public/login">Inicio de Sesión</a>
		<a href="{{ asset('img/catalogo-mr.pdf') }}" target="_blank" class="descargar-catalogo">Descargar Catálogo</a>
	</div>
	<nav>
	<div class="circulo-rojo"></div>
		<ul>
			@foreach ($categories as $c)
				<li><a href="{{ url('productos/'.$c->slug) }}">{{ $c->name }}</a></li>
			@endforeach
		</ul>
	</nav>
</header>


@yield('content')


<!-- ****************  ABRE FOOTER  **************** -->
<div class="contacto" id="contacto">
	<div class="fondo-contacto"></div>
	<article>
		<h2>Ubica tu distribuidor más cercano</h2>
		<p>Cada una de nuestras categorías está diseñada para cubrir una necesidad básica en nuestro día laboral: <strong>un trabajo seguro</strong></p>
	</article>
		<div class="mapa">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15007976.465466967!2d-111.65082483132548!3d23.313699520377405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses-419!2smx!4v1533860657728" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
		<h3>Mantente en Contacto</h3>
		<form action="" class="formulario-contacto">
			<ul>
				<li><input type="text" placeholder="Nombre y Apellido"></li>
				<li><input type="text" placeholder="Correo Electrónico"></li>
				<li><input type="text" placeholder="Teléfono"></li>
				<li><textarea name="" id="" placeholder="¿Cómo podemos ayudarle?"></textarea></li>
			</ul>
			<div class="btn-enviar">enviar</div>
		</form>
</div>

<footer>
	<p>Aviso de Privacidad 2018 © Copyright MR SEGURIDAD - Av. Fidelidad, Col. Industrial Bruno Pagliai, Veracruz Ver. C.P. 91697 Tel.: (229) 986 20 49 - Fabricante de equipo de proteccion personal, seguridad industrial y vial, Equipo de seguridad industrial, Equipo de seguridad vial, Equipo de protección visual, Equipo de protección para manos, Equipo de protección auditiva, Equipo de protección respiratoria, Equipo de protección para la lluvia Veracruz México</p>
</footer>
<!-- ****************  CIERRA FOOTER  **************** -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>


</body>
</html>
