@extends('layouts.back')

@section('content')


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


	<!-- ******************************** ÁREA PARA CREAR LA NOTA ******************************** -->
	<div class="contenedor-secundario"> <!-- Este contenedor tiene tanto el aside derecho como el área para crear la nota -->
		<div class="div-izquierdo">
			<div class="modulo-medio sombra-1">
				<div class="header-gris">
					<h3>Artículo</h3>
				</div>
				<form action="{{ route('articles.store') }}" method="POST" class="formulario-articulo" enctype="multipart/form-data">
          {{ csrf_field() }}
					<!--<div class="group">
  						<input type="text" required>
  						<span class="highlight"></span>
  						<span class="bar"></span>
  						<label>URL del Video</label>
						</div>-->
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
        <label for="pdf">Ficha Técnica (PDF)</label>
        <input type="file" name="pdf" placeholder="Subir Ficha técnica (PDF recomendado)">

				<label for="bg_img">Imagen de fondo</label>
        <input type="file" name="bg_img" placeholder="Subir fondo">

				<label for="image">Imagenes de Producto</label>
				<input id="image" name="image[]" type="file" class="file" multiple="" placeholder="Subir imagenes"/>
	<!-- ******************************** BOTONES ******************************** -->

				<div class="btns-create-article">
					<button class="btn btn-rectangle btn-raised" type="submit">
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
      </form>

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
