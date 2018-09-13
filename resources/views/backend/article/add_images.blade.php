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
				</div> -->




	<!-- ******************************** ASIDE ******************************** -->
					<div class="div-derecho">  <!-- Esta etiqueta abre toda la columna derecha -->
						<div class="modulo-aside sombra-1" style="padding-top:5px;">

				<!-- ******************************** SUBIR FOTO ******************************** -->
							<h5>Fondo:</h5>
										<form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data" class="dropzone formulario-articulo" id="myDropzone2">
							<section class="contenedor-create foto-articulo contenedor-crear-foto-uno">
								<div class="subir-foto-articulo">

					     {{ csrf_field() }}

										<div class="table table-striped" class="files" id="">

											<div id="" class="file-row">
													<!-- This is used as the file preview template -->
													<div>
																	<span class="preview"><img data-dz-thumbnail /></span>
													</div>
													<div>
																	<p class="name" data-dz-name></p>
																	<strong class="error text-danger" data-dz-errormessage></strong>
													</div>
													<div>
																	<p class="size" data-dz-size></p>
																	<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
																			<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
																	</div>
													</div>
												</div>
											</div>
											<div class="fallback">
													<input name="bg_img" id="input-file-1">
											</div>
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
									</form>

							<h5>Productos:</h5>
							<form method="POST" action="{{ route('articles.add_article_images', $article->id) }}" enctype="multipart/form-data" class="dropzone formulario-articulo" id="myDropzone">
							<section class="contenedor-create foto-articulo contenedor-crear-foto-dos">
								<div class="subir-foto-articulo">
						    {{ csrf_field() }}
										<div class="table table-striped" class="dropzone-previews" id="previews">

											</div>
									 <div class="dz-message">
										 <div class="message">
						          <p>Arrastra aquí los archivos <br> o click para seleccionar <br>
						           (máximo {{ 4-$article->pics()->count() }} imágenes)
						          </p>
						         </div>
									 </div>
										<div class="fallback">
										 	<input type="file" name="imagen" multiple>
										</div>


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
		</div> <!-- Este div cierrta el área principal, osea todo lo que se encuentra debajo del header -->
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
