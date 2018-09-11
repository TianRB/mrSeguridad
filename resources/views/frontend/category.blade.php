@extends('layouts.front')

@section('content')

	<!-- ****************  ABRE CABECERA ARTICULOS  **************** -->
	<div class="cabecera-articulos">
		{{-- <article>
			<h2>Sé distribuidor autorizado</h2>
			<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
			<div class="btn-unete"> <a href="">¡Quiero Unirme!</a> </div>
		</article> --}}

		<article>
			<h2>{{ $currentcat->name }}</h2>
		</article>

		<div class="contenedor-video">
			<video src="{{ asset($currentcat->video) }}" autoplay loop></video>
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
		@if ($articles->isEmpty())
			<article class="producto">
				<h2>No hay productos en esta categoria</h2>
			</article>
		@else
			@foreach ($articles as $a)
				<a href="{{ action('FrontController@articleBySlug', ['id' => $a->slug, 'currentcat' => $currentcat->slug]) }}">
					<article class="producto">
						<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
						<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
						<h2>{{ $a->title }}</h2>
					</article>
				</a>
			@endforeach
		@endif
	</section>
	<!-- ****************  CIERRA PRODUCTOS  **************** -->
@endsection
