@extends('layouts.back')

@section('content')

	<!-- ******************************** CABECERA ******************************** -->



		<div id="contenedor-principal"> <!-- Este div contiene todo lo que se encuentra debajo del header -->

	<!-- ******************************** MENÚ IZQUIERDO ******************************** -->



	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->


			<div class="area-principal">

				<div class="sombra-1 modulo-largo">
					<div class="header-gris">
						<h3>Vendedor</h3>
					</div>

					<!-- ******************************** SUBIR FOTO DE USUARIO ******************************** -->
					<section class="contenedor-create">
						<div class="subir-foto subir-foto-usuario">
							<form action="process-form.php">
	   					 		<input name="input-file-1" id="input-file-1">
							</form>
						</div>
					</section>


					<!-- ******************************** FORMULARIO ******************************** -->
					<form action="" class="form-create">
						<div class="group">
	    					<input type="text" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Name</label>
	  					</div>
	  					<div class="group">
	    					<input type="text" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Apellido</label>
	  					</div>
	  					<div class="group">
	    					<input type="text" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Teléfono</label>
	  					</div>
	  					<div class="group">
	    					<input type="text" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>E-mail</label>
	  					</div>
	  					<div class="group">
	    					<input type="text" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Contraseña</label>
	  					</div>
	  					<div class="group">
	    					<input type="password" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Confirmar contraseña</label>
	  					</div>

	  					<div class="group group-select">
	  						<span class="triangulito"></span>
	  						<select class="browser-default" id="puesto" name="puesto">
						        <option value="" disabled selected>Puesto</option>
						        <option value="Editor" class="editor">Vendedor</option>
						        <option value="Reportero">Jefe Vendedor</option>
					        </select>
	  						<span class="borde-bajo"></span>
	  					</div>



				        <div class="group group-select">
				        	<span class="triangulito"></span>
	  						<select class="browser-default">
						        <option value="" disabled selected>Zona</option>
						        <option value="1">Norte</option>
						        <option value="2">Sur</option>
						        <option value="3">Este</option>
						        <option value="3">Oeste</option>
					        </select>
	  						<span class="borde-bajo"></span>
	  					</div>

	  					<div class="group">
	    					<input type="password" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Meta mensual</label>
	  					</div>
	  					<div class="group">
	    					<input type="password" required>
	    					<span class="highlight"></span>
	    					<span class="bar"></span>
	    					<label>Meta anual</label>
	  					</div>
					</form>



					<!-- ******************************** BOTONES ******************************** -->
					<div class="btns-create">
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
						    Guardar
						</button>
						<button class="btn btn-rectangle btn-flat">
						    <div class="ripple-container">
							<span class="ripple-effect"></span>
						    </div>
						    Eliminar
						</button>
					</div>
				</div>
			</div>
		</div>
<!-- ****************  CIERRA PRODUCTOS RELACIONADOS **************** -->

@endsection

@section('page_scripts')
	<script src="js/custominputfile.js"></script>
@endsection
