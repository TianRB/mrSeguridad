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
{{--  USAR ESTO PARA JALAR CATEGORIAS DE DB
@foreach ($categories as $c)
<article>
	<div class="contenedor-video-categorias">
		<video src="video/fondo-unete-dos.mp4" autoplay loop></video>
	</div>
	<div class="texto-categorias">
		<h2>{{ $c->name }}</h2>
	</div>
</article>
@endforeach
 --}}
<div class="seccion-categorias">
	<article>
		<h2>Sé distribuidor autorizado</h2>
		<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
	</article>
	<section class="categorias-index">
		@foreach ($categories as $c)
		<article>
			<a href="productos/{{ $c->slug }}">
				<div class="contenedor-video-categorias">
					<video src="{{ $c->video }}" autoplay loop></video>
				</div>
				<div class="texto-categorias">
					<h2>{{ $c->name }}</h2>
				</div>
			</a>
		</article>
		@endforeach
	</section>

</div>

<!-- ****************  CIERRA CATEGORIAS **************** -->



@endsection
