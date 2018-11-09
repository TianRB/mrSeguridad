@extends('layouts.back')

@section('page_styles')
	<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('content')
	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->
	<div class="area-principal">
		<!-- ******************************** Botones que definen si la públicación será escrita o video ( Esto sirve para definir una subcategoría en la base de datos ) ******************************** -->

		<!-- ******************************** ÁREA PARA CREAR LA NOTA ******************************** -->
		<div class="contenedor-secundario"> <!-- Este contenedor tiene tanto el aside derecho como el área para crear la nota -->
			<div class="div-izquierdo">
				<div class="modulo-medio sombra-1">
					<div class="header-gris">
						<h3>Artículo</h3>
					</div>
					<form action="{{ url('articles/'.$article->id) }}" method="POST" class="formulario-articulo" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT" />

						<div class="group">
							<input type="text" name = "title" value="{{ $article->title }}" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Título de la nota</label>
						</div>

						<textarea class="ckeditor" id="ckeditor" name="content" required>{!! $article->content !!}</textarea>

						<div class="etiquetas-seo">
							<h5>Etiquetas SEO</h5>
							<div class="group">
								<input type="text" name="page_title" value="{{ $article->page_title }}" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Etiqueta Title</label>
							</div>
							<div class="group">
								<input type="text" name="meta_descr" value="{{ $article->meta_descr }}" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Etiqueta Meta Description</label>
							</div>
						</div>
						<div class="btns-create-article">
							<button class="btn btn-rectangle btn-raised" type="submit">
								<div class="ripple-container">
									<span class="ripple-effect"></span>
								</div>
								Guardar
							</button>
							<a href="{{ url('articles/')}}"><button class="btn btn-rectangle btn-flat">
								<div class="ripple-container">
									<span class="ripple-effect"></span>
								</div>
								Regresar
							</button></a>
						</div>
					{{-- </form> --}}
				</div>
			</div> <!-- Esta etiqueta cierra toda la columna izquierda, la cual contiene el área para crear la nota -->

			<!-- ******************************** ASIDE ******************************** -->

			<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
				<div class="modulo-aside sombra-1">
					<div class="header-gris">
						<h3>Extras</h3>
					</div>

					<!-- ******************************** CHECKBOX ******************************** -->
					<h5>Categorías:</h5>

					<div class="checkbox-container">
						@foreach($categories as $c)
							<div class="check-awesome" class="form-group">
								<input type="checkbox" name="category[]" class="checkbox" value="{{ $c->id }}" @if ($article->categories->contains($c)) checked @endif></input>
									<label for="check-me">
										{{ $c->name }}
									</label>
								</div>
							@endforeach
						</div>

						<!-- ******************************** ARCHIVOS ******************************** -->
						<div class="modulo-aside">
							<h5>Ficha Técnica:</h5>
							<label for="pdf">Ficha Técnica (PDF)</label>

							<div>
								<button style="display:block;width:120px; height:30px;" onclick="event.preventDefault();document.getElementById('getFile').click();">Da click aqui para cambiar la ficha técnica</button>
								<input type='file' name="pdf" id="getFile" style="display:none">
							</div>
						</div>
						<div class="modulo-aside sombra-1" style="padding-top:5px;">
						</form>

							<!-- ******************************** SUBIR FOTO ******************************** -->

							<h5>Fondo:</h5>

							<section class="contenedor-create foto-articulo contenedor-crear-foto-uno">

								<div class="subir-fondo-articulo" style="outline:2px dashed #CCC">
									<form action="{{ route('articles.add_background_image', $article->id) }}" method="POST" enctype="multipart/form-data" maxfiles="1" class=" formulario-articulo img-bg" id="img-bg">
										{{ csrf_field() }}
										@if ($article->bg_img != null)
											<div style="position:relative;">
												{{--<div style=""><a href="{{route('articles.erase_background_image',$article->id)}}" style="background-color:#000;padding:1em;position:absolute;z-index: 2;">borrar</a></div>--}}
												<img src="{{url($article->bg_img)}}" style="width:100%;height:auto;z-index:1;top:0;" alt="">
											</div>
										@else
											<div class="fallback">
												<input type="file" name="bg_img">
											</div>
										@endif
									</form>
								</div>
							</section>

							<h5>Productos:</h5>
							<section class="contenedor-create foto-articulo contenedor-crear-foto-dos">
								<div class="subir-foto-articulo">
									<form method="POST" action="{{ route('articles.add_article_images', $article->id) }}" enctype="multipart/form-data" maxfiles="4" class=" formulario-articulo img-article" id="img-article">
										{{ csrf_field() }}
										@if ($article->pics())
										@if (count($article->pics()) > 0)
											<div style="display:flex;flex-flow:row wrap;">
												@foreach ($article->pics as $ap)
													<div style="height:auto;max-height:130px;width:50%;">
														<a href="{{route('articles.erase_image',$ap->id)}}" style="z-index:10">borrar</a>
														<img src="{{url($ap->path)}}" alt="" style="height:auto;max-height:130px;width:100%;">
													</div>
												@endforeach
											</div>
										@else
											<div class="fallback">
												<input type="file" name="imagen" multiple>
											</div>
										@endif
										@endif
									</form>
								</div>
							</section>

							<!-- ******************************** BOTONES ******************************** -->

							<div class="btns-create-article" style="display:none">
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
						{{-- <label for="bg_img">Imagen de fondo</label>
						<input type="file" name="bg_img" placeholder="Subir fondo">

						<label for="image">Imagenes de Producto</label>
						<input id="image" name="image[]" type="file" class="file" multiple="" placeholder="Subir imagenes"/> --}}


						<!-- ******************************** BOTONES ******************************** -->



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
@endsection

@section('page_scripts')
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/dropzone-config.js') }}"></script>

<script type="text/javascript">
CKEDITOR.replace('ckeditor');

// Si hay errores, mostrarlos en consola
@if ($errors->any()) @foreach ($errors->all() as $error)
	console.log('{!! $error !!}');
@endforeach @endif

//Configuración adicional para dropzone
//Add existing files into dropzone
@if (count($article->pics()) > 0)
var existingFiles = [
	@foreach ($article->pics as $ap)
		{ name: "{{$ap->path}}", size: {{filesize($ap->path)}} },
	@endforeach
];
for (i = 0; i < existingFiles.length; i++) {
	console.log(existingFiles[i]);
	dzfg.emit("addedfile", existingFiles[i]);
	dzfg.emit("thumbnail", existingFiles[i], "{{ asset('img/article_pictures/') }}");
	dzfg.emit("complete", existingFiles[i]);
	console.log('added file from server');
}
@endif

</script>
@endsection

{{-- dd(filesize($article->pics()->get()->pop()->path)) --}}
