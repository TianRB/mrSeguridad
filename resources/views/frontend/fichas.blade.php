@extends('layouts.front')

@section('content')

	<!-- ****************  ABRE CABECERA ARTICULOS  **************** -->
	<div class="cabecera-articulos cabecera-fichas-tecnicas">
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
	<section class="contenedor-fichas-tecnicas">
		@if (!$articles)
			<article class="producto">
				<h1>No se encuontraron fichas técnicas</h1>
			</article>
		@else
			@foreach ($articles as $catname => $cat)
				<section>
					<h2>{{ $catname }}</h2>
				@foreach ($cat as $a)
					
						<article class="producto">
							<div class="imagenes-ficha">
								<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
								<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
							</div>
							<div class="texto-ficha-tecnica">
								<p>{{ $a->title }}</p>
								<a href="{{ asset($a->pdf) }}" target="_blank">
									<p>Ver ficha Técnica</p>
								</a>
							</div>
						</article>
					
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
