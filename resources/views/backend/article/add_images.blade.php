@extends('layouts.back')

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
									<form action="{{-- route('pictures.store') --}}" method="POST" class="formulario-articulo" enctype="multipart/form-data" id="">
					          {{ csrf_field() }}
										<input name="bg_img" id="input-file-1">
									</form>
								</div>
							</section>

							@if ($article->pics()->count() < 4)
							<h5>Productos:</h5>
							<section class="contenedor-create foto-articulo contenedor-crear-foto-dos">
								<div class="subir-foto-articulo">
									<form method="POST" action="{{ route('articles.add_images', $article->id) }}" enctype="multipart/form-data" class="dropzone" id="myDropzone">
						       {{ csrf_field() }}
									 <div class="dz-message">
										 <div class="message">
						          <p>Arrastra aquí los archivos <br> o click para seleccionar <br>
						           (máximo {{ 4-$article->pics()->count() }} imágenes)
						          </p>
						         </div>
									 </div>
										<div class="fallback">
										 	<input type="file" name="image" multiple>
										</div>
										<div class="">
											<button type="submit" id="dz-submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</section>
							@else
							Has subido el máximo de fotos
						  @endif
							@if ($article->pics()->count() > 0)
						  <div class="col-md-5 mt-5">
						   <div class="row">
						    @foreach ($article->pics as $ap)
						    <div class="col-md-6">
						     <div style="background-image:url('{{url($ap->path)}}');background-size:cover;background-position:center;min-height:200px;">
						     </div>
						     <!-- borrar -->
						     <form action="{{route('pictures.destroy', $ap->id)}}" method="POST" class="m-0">
						     {{ csrf_field() }}
						     <input type="hidden" name="_method" value="DELETE" />
						     <button class="btn btn-danger" type="submit"><i class="fa fa-trash" /></i></button>
						     </form>
						    </div>

						    @endforeach
						   </div>
						  </div>
						  @endif



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
		<script type="text/javascript">

		$("#dz-submit").click(function (e) {
	    e.preventDefault();
	    myDropzone.processQueue();
		});

		</script>

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
