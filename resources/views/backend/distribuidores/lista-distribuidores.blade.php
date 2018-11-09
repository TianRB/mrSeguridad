@extends('layouts.back')

@section('content')

	<!-- ******************************** CABECERA ******************************** -->



		<div id="contenedor-principal"> <!-- Este div contiene todo lo que se encuentra debajo del header -->

	<!-- ******************************** MENÚ IZQUIERDO ******************************** -->



	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->


			<div class="area-principal">
				<!-- ******************************** ESTÁ SECCIÓN CONTIENE LOS FILTROS DE BUSQUEDA ******************************** -->
				<div class="sombra-1 modulo-largo">
					<div class="header-gris">
						<h3>Filtro de búsqueda de usuarios</h3>
					</div>

					<div class="filtro-usuarios">




		  				<div class="grupo-filtro-usuarios">
		  					<span class="triangulito"></span>
		  					<select class="browser-default" id="puesto" name="puesto">
							    <option value="" disabled selected>Zona</option>
							    <option value="Editor" class="editor">Norte</option>
							    <option value="Reportero">Sur</option>
							    <option value="Jefe de Redacción">Este</option>
							    <option value="Jefe de Redacción">Oeste</option>
						    </select>
		  				</div>

		  				<div class="grupo-filtro-usuarios">
							<span class="triangulito"></span>
		  					<select class="browser-default" id="puesto" name="puesto">
							    <option value="" disabled selected>Estatus</option>
							    <option value="Editor" class="editor">Deudor</option>
							    <option value="Reportero">Cumplido</option>
						    </select>
		  				</div>


						<div class="grupo-filtro-usuarios">
							<span class="triangulito"></span>
		  					<select class="browser-default" id="puesto" name="puesto">
							    <option value="" disabled selected>Meta mensual</option>
							    <option value="Editor" class="editor">Cumplida</option>
							    <option value="Reportero">No cumplida</option>
						    </select>
		  				</div>


						<div>
							<div class="btn-filtro buscador">
							    <input type="text">
								 <span class="icon-buscar"></span>
							</div>
						</div>


					</div>

				</div>

				<!-- ******************************** ESTÁ SECCIÓN CONTIENE TODOS LOS ADMINISTRADORES DADOS DE ALTA ******************************** -->
				<div class="sombra-1 modulo-largo lista-usuarios"> <!--Cada usuario creado debe estár dentro de este contendeor por ejemplo este es el usuario uno. Te dejo tres usuarios de ejemplo para que te des una idea pero deben aparecer todos los existentes-->
					<article>
						<figure class="foto-lista-users"><img src="img/person-7.jpg" alt=""></figure>
						<section>
							<div class="texto-card">
								<h2>Karen García</h2>
								<div class="datos-publi">
									<div><strong>Zona:</strong> Norte </div>
									<div><strong>Estatus:</strong>Cumplido</div>
								</div>
							</div>
							<div class="texto-card texto-card-dos">
								<div class="datos-publi">
									<div><p>Meta Mensual:</p><p>$25,000.00</p></div>
									<div class="no-superada"><p>Venta Mensual:</p><p><strong>$10,000.00</strong></p></div>
								</div>
							</div>
							<div class="btn-lista-usuarios">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Editar
								</button>
								<a href="http://demo.topotv.com/back/user-perfil.html">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Ver
								</button>
								</a>

								<button class="btn btn-rectangle btn-raised btn-basura">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		 <span class="icon-borrar"></span>
								</button>
							</div>
						</section>
					</article>
				</div>

				<div class="sombra-1 modulo-largo lista-usuarios"> <!-- Usuario DOS -->
					<article>
						<figure class="foto-lista-users"><img src="img/person-8.jpg" alt=""></figure>
						<section>
							<div class="texto-card">
								<h2>Juan Lopez</h2>
								<div class="datos-publi">
									<div><strong>Zona:</strong> Norte </div>
									<div><strong>Estatus:</strong>Deudor</div>
								</div>
							</div>
							<div class="texto-card texto-card-dos">
								<div class="datos-publi">
									<div><p>Meta Mensual:</p><p>$25,000.00</p></div>
									<div class="superada"><p>Venta Mensual:</p><p><strong>$30,000.00</strong></p></div>
								</div>
							</div>
							<div class="btn-lista-usuarios">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Editar
								</button>
								<a href="http://demo.topotv.com/back/user-perfil.html">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Ver
								</button>
								</a>

								<button class="btn btn-rectangle btn-raised btn-basura">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		 <span class="icon-borrar"></span>
								</button>
							</div>
						</section>
					</article>
				</div>


				<div class="sombra-1 modulo-largo lista-usuarios"> <!-- Usuario DOS -->
					<article>
						<figure class="foto-lista-users"><img src="img/matusa.png" alt=""></figure>
						<section>
							<div class="texto-card">
								<h2>Matusa</h2>
								<div class="datos-publi">
									<div><strong>Zona:</strong> Norte </div>
									<div><strong>Estatus:</strong>Cumplido</div>
								</div>
							</div>
							<div class="texto-card texto-card-dos">
								<div class="datos-publi">
									<div><p>Meta Mensual:</p><p>$25,000.00</p></div>
									<div class="superada"><p>Venta Mensual:</p><p><strong>$30,000.00</strong></p></div>
								</div>
							</div>
							<div class="btn-lista-usuarios">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Editar
								</button>
								<a href="http://demo.topotv.com/back/user-perfil.html">
								<button class="btn btn-rectangle btn-raised">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		Ver
								</button>
								</a>

								<button class="btn btn-rectangle btn-raised btn-basura">
						    		<div class="ripple-container">
										<span class="ripple-effect"></span>
						    		</div>
						    		 <span class="icon-borrar"></span>
								</button>
							</div>
						</section>
					</article>
				</div>






			</div>
		</div>

		
@endsection

@section('page_scripts')


@endsection
