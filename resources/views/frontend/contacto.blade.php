@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA SLIDE  **************** -->
<section class="contenedor-slide slider">


	@foreach ($slides as $s)
		<article id="ele2" class="s_element @if($loop->first) s_visible @endif">
			<figure class="fondo-slide"><img src="{{ asset($s->bg_img) }}" alt=""></figure>
			<figure class="producto-slide"><a href="//{{ $s->url }}"><img src="{{ asset($s->image) }}" alt=""></a></figure>
		</article>
	@endforeach

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
		<h2>INTÉGRATE A NUESTRA RED DE DISTRIBUIDORES</h2>
		<p>Obtén acceso a una marca única en el mercado, que ofrece más beneficios y valor agregado que harán crecer tu negocio.</p>
		<div class="btn-unete"> <a href="http://18.221.15.19/mrSeguridad/public/img/unete-guia-distribuidor.png" target="_blank">¡Quiero unirme!</a> </div>
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
		<h2>Conoce nuestras categorías</h2>
		<p>Contamos con categorías para identificar más rápido lo que buscas. Están organizadas de acuerdo al uso y protección que ofrecen y para satisfacer las necesidades del sector industrial en equipo protección personal y vial.</p>
	</article>
	<section class="categorias-index">
		<article>
			<a href="productos/nuevos-productos">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/nuevos-productos-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Nuevos Productos</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/seguridad-vial">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/seguridad-vial-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Seguridad Vial</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-general">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-general-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección General</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-visual">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-visual-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Visual</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-manos">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-para-manos-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección para Manos</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-auditiva">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-auditiva-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Auditiva</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-la-lluvia">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-para-la-lluvia-min.mp4') }}" loop></video>
				</div>
				<div class="texto-categorias">
					<h2>Protección Para la Lluvia</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-respiratoria">
				<div class="contenedor-video-categorias">
					<video src="{{ asset('video/proteccion-respiratoria-min.mp4') }}" loop></video>
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