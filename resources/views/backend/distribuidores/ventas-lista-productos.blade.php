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
						<h3>Filtro de búsqueda de Productos</h3>
					</div>

					<div class="filtro-usuarios">


						<div class="grupo-filtro-usuarios">
							<span class="triangulito"></span>
		  					<select class="browser-default" id="puesto" name="puesto">
							    <option value="" disabled selected>Línea</option>
							    <option value="Editor" class="editor">Seguridad Vial</option>
							    <option value="Reportero">Protección General</option>
							    <option value="Jefe de Redacción">Protección Visual</option>
							    <option value="Jefe de Redacción">Protección para Manos</option>
							    <option value="Jefe de Redacción">Protección Auditiva</option>
							    <option value="Jefe de Redacción">Protección para Lluvia</option>
							   	<option value="Jefe de Redacción">Protección Respiratoria</option>
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
				<div class="sombra-1 modulo-largo lista-productos"> <!--Cada usuario creado debe estár dentro de este contendeor por ejemplo este es el usuario uno. Te dejo tres usuarios de ejemplo para que te des una idea pero deben aparecer todos los existentes-->
					<article>
						<figure>
							<img src="img/careta-soldador.png" alt="">
						</figure>
						<section class="caracteristicas-producto">
							<table>
								<tr>
									<th>Clave</th>
									<th>Descripción</th>
									<th>Línea</th>
									<th>Existencias</th>
								</tr>
								<tr>
									<td>DQC127S2XL</td>
									<td>Overol Tychem costura sencilla C/CAPT-2x</td>
									<td>SP</td>
									<td>384,000</td>
								</tr>
							</table>
						</section>
					</article>

				</div>

				<div class="sombra-1 modulo-largo lista-productos"> <!--Cada usuario creado debe estár dentro de este contendeor por ejemplo este es el usuario uno. Te dejo tres usuarios de ejemplo para que te des una idea pero deben aparecer todos los existentes-->
					<article>
						<figure>
							<img src="img/careta-soldador.png" alt="">
						</figure>
						<section class="caracteristicas-producto">
							<table>
								<tr>
									<th>Clave</th>
									<th>Descripción</th>
									<th>Línea</th>
									<th>Existencias</th>
								</tr>
								<tr>
									<td>DQC127S2XL</td>
									<td>Overol Tychem costura sencilla C/CAPT-2x</td>
									<td>SP</td>
									<td>384,000</td>
								</tr>
							</table>
						</section>
					</article>

				</div>








			</div>
		</div>




@endsection

@section('page_scripts')


@endsection
