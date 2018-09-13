@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA SLIDE  **************** -->
<section class="contenedor-slide slider">

	<article id="ele2" class="s_element s_visible">
		<figure class="fondo-slide"><img src="img/fondo-slide-2.png" alt=""></figure>
		<figure class="producto-slide"><img src="img/producto-slide-2.png" alt=""></figure>
		<div class="texto-slide">
			<h2>Casco</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div>
	</article>
	<article id="ele1" class="s_element">
		<figure class="fondo-slide"><img src="img/fondo-slide-3.png" alt=""></figure>
		<figure class="producto-slide"><img src="img/producto-slide-3.png" alt=""></figure>
		<!-- <div class="texto-slide">
			<h2>Paliacate</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div> -->
	</article>
	<article id="ele1" class="s_element">
		<figure class="fondo-slide"><img src="img/fondo-slide-1.png" alt=""></figure>
		<figure class="producto-slide"><img src="img/producto-slide-1.png" alt=""></figure>
		<div class="texto-slide">
			<h2>Paliacate</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div>
	</article>


	<nav class="nav-slide">
		<ul>
			<li id="btnAnt"><span class="icon-arrow-left2"></span></li>
			<li id="btnSig"><span class="icon-arrow-right2"></span></li>
		</ul>
	</nav>
</section>
<!-- ****************  TERMINA SLIDE  **************** -->



<!-- ****************  ABRE UNETE AL EQUIPO  **************** -->
<div class="unete">
	<article>
		<h2>Sé distribuidor autorizado</h2>
		<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
		<div class="btn-unete"> <a href="">¡Quiero Unirme!</a> </div>
	</article>
	<div class="diagonales">
		<div class="diagonal-uno"></div>
		<div class="diagonal-dos"></div>
		<div class="diagonal-tres"></div>
	</div>

	<div class="contenedor-video">
		<video src="video/fondo-unete-dos.mp4" autoplay loop></video>
	</div>

</div>
<!-- ****************  CIERRA UNETE AL EQUIPO  **************** -->



<!-- ****************  ABRE CATEGORÍAS  **************** -->

<div class="seccion-categorias">
	<article>
		<h2>Sé distribuidor autorizado</h2>
		<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
	</article>
	<section class="categorias-index">
		<article>
			<a href="productos/nuevos-productos">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/nuevos-productos-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Nuevos Productos</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/seguridad-vial">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/seguridad-vial-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Seguridad Vial</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-general">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-general-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección General</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-visual">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-visual-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Visual</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-manos">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-para-manos-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección para Manos</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-auditiva">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-auditiva-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Auditiva</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-la-lluvia">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-para-la-lluvia-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Para la Lluvia</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-respiratoria">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-respiratoria-min.mp4') }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Respiratoria</h2>
				</div>
			</a>
		</article>
	</section>

</div>

<!-- ****************  CIERRA CATEGORIAS **************** -->



@endsection
