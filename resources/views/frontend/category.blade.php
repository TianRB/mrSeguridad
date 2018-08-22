@extends('layouts.front')

@section('content')

	<!-- ****************  ABRE CABECERA ARTICULOS  **************** -->
	<div class="cabecera-articulos">
		<article>
			<h2>Sé distribuidor autorizado</h2>
			<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
			<div class="btn-unete"> <a href="">¡Quiero Unirme!</a> </div>
		</article>


		<div class="contenedor-video">
			<video src="{{ asset('video/fondo-articulos.mp4') }}" autoplay loop></video>
		</div>

		<div class="diagonales">
			<div class="diagonal-uno"></div>
			<div class="diagonal-dos"></div>
			<div class="diagonal-tres"></div>
		</div>
	</div>
	<!-- ****************  CIERRA CABECERA ARTICULOS  **************** -->


	<!-- ****************  ABRE PRODUCTOS  **************** -->
	<section class="contenedor-productos">
	@foreach ($articles->take(4) as $a)
		<a href="{{ action('FrontController@articleBySlug', ['id' => $a->slug]) }}">
		<article class="producto">
			<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
			<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
			<h2>{{ $a->title }}</h2>
		</article>
	</a>
	@endforeach

	</section>
	<!-- ****************  CIERRA PRODUCTOS  **************** -->
@endsection
