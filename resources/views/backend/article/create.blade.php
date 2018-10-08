@extends('layouts.back')

@section('content')


	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->


	<div class="area-principal">

		<!-- ******************************** Botones que definen si la públicación será escrita o video ( Esto sirve para definir una subcategoría en la base de datos ) ******************************** -->

		<!--
		<div class="sombra-1 modulo-largo">
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
</div>
-->


<!-- ******************************** ÁREA PARA CREAR LA NOTA ******************************** -->
<form action="{{ route('articles.store') }}" method="POST" class="formulario-articulo" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="contenedor-secundario"> <!-- Este contenedor tiene tanto el aside derecho como el área para crear la nota -->
		<div class="div-izquierdo">
			<div class="modulo-medio sombra-1">
				<div class="header-gris">
					<h3>Artículo</h3>
				</div>


				<div class="group">
					<input type="text" name = "title" value="{{ old('title') }}" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Título de la nota</label>
				</div>

				<textarea class="ckeditor" id="ckeditor" name="content" required>{{ old('content') }}</textarea>

				<div class="etiquetas-seo">
					<h5>Etiquetas SEO</h5>
					<div class="group">
						<input type="text" name="page_title" value="{{ old('page_title') }}" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Etiqueta Title</label>
					</div>
					<div class="group">
						<input type="text" name="meta_descr" value="{{ old('meta_descr') }}" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Etiqueta Meta Description</label>
					</div>
				</div>
			</div>
		</div> <!-- Esta etiqueta cierra toda la columna izquierda, la cual contiene el área para crear la nota -->

		<!-- ******************************** ASIDE ******************************** -->
		<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
			<div class="modulo-aside sombra-1">
				<div class="header-gris">
					<h3>Extras</h3>
				</div>
				<!-- ******************************** CHECKBOX ******************************** -->

				<div class="checkbox-container">
					@foreach($categories as $c)
						@if ($loop->first)
							<div class="check-awesome" class="form-group">
								<input type="checkbox" name="category[]" class="checkbox" value="{{ $c->id }}" checked>
								<label for="check-me">
									{{ $c->name }}
								</label>
							</div>
						@else
							<div class="check-awesome" class="form-group">
								<input type="checkbox" name="category[]" class="checkbox" value="{{ $c->id }}">
								<label for="check-me">
									{{ $c->name }}
								</label>
							</div>
						@endif
					@endforeach

				</div>

				<!-- ******************************** CHECKBOX ******************************** -->
				<div class="modulo-aside">
					<h5>Ficha Técnica:</h5>
					<label for="pdf">Ficha Técnica (PDF)</label>

					<div>
						<button style="display:block;width:120px; height:30px;" onclick="event.preventDefault();document.getElementById('getFile').click();">Selecciona una ficha técnica</button>
						<input type='file' name="pdf" id="getFile" style="display:none">
					</div>
				</div>
				<div class="modulo-aside sombra-1" style="padding-top:5px;padding-bottom:10px;min-height:130px;">

					<!-- ******************************** SUBIR FOTO ******************************** -->


					<section class="contenedor-create foto-articulo contenedor-crear-foto-dos" style="background-color: #ccc">
						<div class="subir-foto-articulo">
							<button onclick="document.getElementById('submit').click();"><h5>Guarda el Artículo para subir imágenes</h5></button>
							<div style="display:flex;flex-flow:row wrap;">
							</div>
							<div class="fallback">
							</div>
						</div>
					</section>

				</div>	<!-- ******************************** BOTONES ******************************** -->

				<div class="btns-create-article">
					<button class="btn btn-rectangle btn-raised" type="submit" id="submit">
						<div class="ripple-container">
							<span class="ripple-effect"></span>
						</div>
						Crear
					</button>
					<a href="{{ url('articles/')}}"><button class="btn btn-rectangle btn-flat">
						<div class="ripple-container">
							<span class="ripple-effect"></span>
						</div>
						Regresar
					</button></a>

				</div>

			</div>

			<!-- ******************************** INFORMACIÓN DE LA PUBLICACIÓN ******************************** -->

		</div><!-- Esta etiqueta cierra toda la columna derecha -->
	</div>
</form>

</div>
@endsection

@section('page_scripts')

	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript">
	CKEDITOR.replace('ckeditor');

	@if ($errors->any())
	@foreach ($errors->all() as $error)
	console.log('{!! $error !!}');
	@endforeach
	@endif
</script>

@endsection
