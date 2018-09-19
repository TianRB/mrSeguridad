@extends('layouts.front')

@section('content')


	@if(!isset($currentcat))
		<?php $currentcat = $main->one_cat()->slug ?>
	@endif



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
				<figure class="fondo-producto-activo"><img src="{{ asset($main->bg_img) }}" alt=""></figure>
			</section>
			<section class="texto-ficha-tecnica">
				<h1 class="{{ $currentcat }}">{{ $main->title }}</h1>
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




	<!-- ****************  ABRE PRODUCTOS RELACIONADOS **************** -->
	<section class="contenedor-otros-productos">
		<div class="pleca-negra"></div>
		<strong>Otros Productos que podrían interesarte</strong>
		@if ($related->isEmpty())
			<article class="producto">
				<h2>No hay productos relacionados</h2>
			</article>
		@else
			<div class="container">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@foreach ($related->chunk(4) as $relatedGroup)
							<div class=" carousel-item @if ($loop->first) active @endif">
								<div class="row">
									@foreach ($relatedGroup as $a)
										<div class="col-md-3">
											<a href="{{ action('FrontController@articleBySlug', ['id' => $a->slug]) }}">
												<article class="producto">
													<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
													<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
													<h2>{{ $a->title }}</h2>
												</article>
											</a>
										</div>
									@endforeach
								</div>
							</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>

				</div>
			</div>

		@endif

	</section>
	{{--
	<!-- ****************  ABRE PRODUCTOS RELACIONADOS RESPALDO **************** -->
	<section class="contenedor-otros-productos">
	<div class="pleca-negra"></div>
	<strong>Otros Productos que podrían interesarte</strong>
	@if ($related->isEmpty())
	<article class="producto">
	<h2>No hay productos relacionados</h2>
</article>
@else
<button type="button" name="button" id="pagination-back"><</button>
@foreach ($related as $a)
<a href="{{ action('FrontController@articleBySlug', ['id' => $a->slug]) }}">
<article class="producto">
<figure class="img-producto"><img src="{{ asset($a->one_pic()) }}" alt=""></figure>
<figure class="fondo-producto"><img src="{{ asset($a->bg_img) }}" alt=""></figure>
<h2>{{ $a->title }}</h2>
</article>
</a>
@endforeach
<button  class="btn" type="button" name="button" id="pagination-forward">></button>
@endif

</section> --}}


<!-- ****************  CIERRA PRODUCTOS RELACIONADOS **************** -->
<style media="screen">
.carousel-item {
	display: none;
}
.carousel-item.active {
	display: inline-flex;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
document.title = '{!! $main->page_title !!}';
$('head').append( '<meta name="description" content="{!! $main->meta_descr !!}">' );
$('.img-mini').on('click', function() {
	var newSource = $(this).attr('src');
	$("#img-main").attr("src",newSource);
});
</script>
@endsection
