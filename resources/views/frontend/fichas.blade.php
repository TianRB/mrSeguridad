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
			<h2>Fíchas Técnicas</h2>
		</article>

		<div class="contenedor-video">
			<video src="" autoplay loop></video>
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
		@if (!$articles)
			<article class="producto">
				<h2>No se encuontraron fichas técnicas</h2>
			</article>
		@else
			@foreach ($articles as $catname => $cat)
				<section>
					<h1>{{ $catname }}</h1>
				@foreach ($cat as $a)
					<a href="{{ asset($a->pdf) }}">
						<article class="producto">
							<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
							<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
							<h2>Ver ficha Técnica</h2>
							<h2>{{ $a->title }}</h2>
						</article>
					</a>
				@endforeach
			</section>
			@endforeach
		@endif
	</section>

	<div class="quiero-unirme">
		<article>
			<h2>Sé distribuidor autorizado</h2>
			<p>Al ser parte de nuestro equipo podrás tener acceso a información exclusiva y beneficios</p>
			<div class="btn-unete"> <a href="http://18.221.15.19/mrSeguridad/public/img/unete-guia-distribuidor.png">¡Quiero Unirme!</a> </div>
		</article>
	</div>
	<!-- ****************  CIERRA PRODUCTOS  **************** -->
@endsection
