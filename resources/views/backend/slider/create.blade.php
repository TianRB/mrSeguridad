@extends('layouts.back')

@section('content')


	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->


	<div class="area-principal">

<!-- ******************************** ÁREA PARA CREAR LA NOTA ******************************** -->
<form action="{{ route('sliders.store') }}" method="POST" class="formulario-articulo" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="contenedor-secundario"> <!-- Este contenedor tiene tanto el aside derecho como el área para crear la nota -->
		<div class="div-izquierdo">
			<div class="modulo-medio sombra-1">
				<div class="header-gris">
					<h3>Slider</h3>
				</div>


				<div class="group">
					<input type="text" name = "title" value="{{ old('title') }}" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Título de slider</label>
				</div>


					<div class="group">
						<input type="text" name="description" value="{{ old('description') }}" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Descripción</label>
					</div>
					<div class="group">
						<input type="text" name="url" value="{{ old('url') }}" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>URL</label>
					</div>
			</div>
		</div> <!-- Esta etiqueta cierra toda la columna izquierda, la cual contiene el área para crear la nota -->

		<!-- ******************************** ASIDE ******************************** -->
		<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
			<div class="modulo-aside sombra-1">
				<div class="header-gris">
				</div>


				<!-- ******************************** BOTONES ******************************** -->

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


@endsection
