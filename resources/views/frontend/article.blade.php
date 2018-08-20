@extends('layouts.front')

@section('content')




	<!-- ****************  ABRE CABECERA ARTICULOS  **************** -->
	<div class="ficha-tecnica">
		<article>
			<section class="miniaturas-producto">
				@foreach($main->pics as $pic)
					<figure><img src="{{ asset($pic->path) }}" alt="" class="img-mini"></figure>
				@endforeach
			</section>
			<section class="img-ficha-tecnica">
				<figure class="img-producto-activo"><img src="{{ asset($main->one_pic()) }}" alt="" id="img-main"></figure>
				<figure class="fondo-producto-activo" ><img src="{{ asset($main->bg_img) }}" alt=""></figure>
			</section>
			<section class="texto-ficha-tecnica">
				<h1>{{ $main->title }}</h1>
				{!! $main->content !!}
				<div class="btn-ficha-tecnica"> <a href="{{ asset($main->pdf) }}">Descargar Ficha Técnica</a> </div>
			</section>

		</article>




		<div class="diagonales">
			<div class="diagonal-uno"></div>
			<div class="diagonal-dos"></div>
			<div class="diagonal-tres"></div>
		</div>
	</div>
	<!-- ****************  CIERRA CABECERA ARTICULOS  **************** -->




	<!-- ****************  ABRE PRODUCTOS  **************** -->
	<section class="contenedor-otros-productos">
		<div class="pleca-negra"></div>
		<strong>Otros Productos que podrían interesarte</strong>
		@foreach ($related->take(4) as $a)
			<a href="/productos/ver/{{ $a->slug }}">
				<article class="producto">
					<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
					<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
					<h2>{{ $a->title }}</h2>
				</article>
			</a>
		@endforeach


	</section>


	<!-- ****************  CIERRA PRODUCTOS  **************** -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
document.title = '{!! $a->page_title !!}';
$('head').append( '<meta name="description" content="{!! $a->meta_descr !!}">' );
$('.img-mini').on('click', function() {
			 var newSource = $(this).attr('src');
			 $("#img-main").attr("src",newSource);
});
</script>
@endsection
