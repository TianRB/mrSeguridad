@extends('layouts.back')
@section('page_styles')
	<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection
@section('content')

	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->

<div class="area-principal">

<!-- ******************************** ASIDE ******************************** -->

<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
	<div class="modulo-aside sombra-1" style="padding-top:5px;">

		<!-- ******************************** SUBIR FOTO ******************************** -->

		<h5>Fondo:</h5>

		<section class="contenedor-create foto-articulo contenedor-crear-foto-uno">

			<div class="subir-foto-articulo">
				@if ($article->bg_img != null)
					<div style="position:relative;">
						<a href="{{route('articles.erase_background_image',$article->id)}}" style="background-color:#000;padding:1em;position:absolute;z-index: 2;">borrar</a>
						<img src="{{url($article->bg_img)}}" style="width:100%;height:auto;z-index:1;top:0;" alt="">
					</div>
				@else
					<form action="{{ route('articles.add_background_image', $article->id) }}" method="POST" enctype="multipart/form-data" class="dropzone formulario-articulo" id="myDropzone2">
						{{ csrf_field() }}
						<div class="fallback">
							<input name="bg_img" id="input-file-1">
						</div>
					</form>
				@endif
			</div>
		</section>

		<h5>Productos:</h5>
		<section class="contenedor-create foto-articulo contenedor-crear-foto-dos">
			<div class="subir-foto-articulo">
				<form method="POST" action="{{ route('articles.add_article_images', $article->id) }}" enctype="multipart/form-data" class="dropzone formulario-articulo" id="myDropzone">
					{{ csrf_field() }}
					@if (count($article->pics()) > 0)
						<div style="display:flex;flex-flow:row wrap;">
							@foreach ($article->pics as $ap)
								<div style="height:auto;max-height:130px;width:50%;">
									<a href="{{route('articles.erase_image',$ap->id)}}">borrar</a>
									<img src="{{url($ap->path)}}" alt="" style="height:auto;max-height:130px;width:100%;">
								</div>
							@endforeach
						</div>
					@else
						<div class="fallback">
							<input type="file" name="imagen" multiple>
						</div>
					@endif
				</form>
			</div>
		</section>

		<!-- ******************************** BOTONES ******************************** -->

		<div class="btns-create-article">
			<button type="submit" id="dz-submit"  class="btn btn-rectangle btn-raised">
				<div class="ripple-container">
					<span class="ripple-effect"></span>
				</div>
				Crear
			</button>
			<button class="btn btn-rectangle btn-flat">
				<div class="ripple-container">
					<span class="ripple-effect"></span>
				</div>
				Eliminar
			</button>

		</div>

	</div>

	<!-- ******************************** INFORMACIÓN DE LA PUBLICACIÓN ******************************** -->

</div><!-- Esta etiqueta cierra toda la columna derecha -->




</div>

</div>
</div> <!-- Este div cierrta el área principal, osea todo lo que se encuentra debajo del header -->
@endsection
@section('page_scripts')
	<script src="{{ asset('js/dropzone.js') }}"></script>
	<script src="{{ asset('js/dropzone-config.js') }}"></script>
@endsection
{{-- @extends('layouts.back')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">



<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->


<div class="area-principal">

<!-- ******************************** Botones que definen si la públicación será escrita o video ( Esto sirve para definir una subcategoría en la base de datos ) ******************************** -->

<!-- <div class="sombra-1 modulo-largo">
<div class="header-gris">
<h3>Tipo de Publicación</h3>
</div>
<div class="btns-create-article">
<button class="btn btn-rectangle btn-raised">
<div class="ripple-container">
<span class="ripple-effect"></span>
</div>
Video-nota
</button>
<button class="btn btn-rectangle btn-flat">
<div class="ripple-container">
<span class="ripple-effect"></span>
</div>
Nota Escrita
</button>

</div>
</div> -->




<!-- ******************************** ASIDE ******************************** -->
<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
<div class="modulo-aside sombra-1">

<!-- ******************************** SUBIR FOTO ******************************** -->
<h5>Fondo:</h5>
<section class="contenedor-create foto-articulo contenedor-crear-foto-uno">
<div class="subir-foto-articulo">
<form action="process-form.php">
<input name="input-file-1" id="input-file-1">
</form>
</div>
</section>
<h5>Productos:</h5>
<section class="contenedor-create foto-articulo contenedor-crear-foto-dos">
<div class="subir-foto-articulo">
<form action="process-form.php">
<input name="input-file-2" id="input-file-2">
</form>
</div>
</section>



<!-- ******************************** BOTONES ******************************** -->

<div class="btns-create-article">
<button class="btn btn-rectangle btn-raised">
<div class="ripple-container">
<span class="ripple-effect"></span>
</div>
Crear
</button>
<button class="btn btn-rectangle btn-flat">
<div class="ripple-container">
<span class="ripple-effect"></span>
</div>
Eliminar
</button>

</div>
</div>

<!-- ******************************** INFORMACIÓN DE LA PUBLICACIÓN ******************************** -->

<!-- <div class="modulo-aside sombra-1">
<div class="header-gris">
<h3>Información General</h3>
</div>
<div class="informacion-general">
<p><strong>Estado: </strong>Publicado</p>
<p><strong>Fecha: </strong>20/marzo/2016</p>
<p><strong>Autor: </strong>Ana Karen García</p>
</div>

</div> -->
</div><!-- Esta etiqueta cierra toda la columna derecha -->




</div>

</div>
</div> <!-- Este div cierrta el área principal, osea todo lo que se encuentra debajo del header -->

<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/dropzone-config.js') }}"></script>

@endsection --}}
