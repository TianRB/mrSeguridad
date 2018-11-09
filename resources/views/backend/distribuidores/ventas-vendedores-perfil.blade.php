@extends('layouts.back')

@section('content')

	<!-- ******************************** CABECERA ******************************** -->



		<div id="contenedor-principal"> <!-- Este div contiene todo lo que se encuentra debajo del header -->

	<!-- ******************************** MENÚ IZQUIERDO ******************************** -->



			<div class="area-principal">

				<!-- ******************************** FOTO DEL USUARIO ******************************** -->

				<div class="contenedor-secundario">
					<div class="izquierda-perfil-usuario">
						<div class="modulo-medio sombra-1 usuario">
						<div class="header-gris header-usuario">
							<h3>Vendedor</h3>
						</div>
						<section class="datos-usuario">
							<figure class="foto-usuario">
								<img src="img/person-7.jpg" alt="">
							</figure>
							<section>
								<h1>Ana Karen García</h1>
								<p><strong>Puesto:</strong> Vendedor</p>
								<p><strong>Zona:</strong> norte</p>
							</section>
						</section>

					</div>
					</div>

					<!-- ******************************** INFORMACIÓN GENERAL DEL USUARIO ******************************** -->
					<div class="derecha-perfil-usuario">
						<div class="modulo-aside sombra-1">
							<div class="header-gris">
								<h3>Información general</h3>
							</div>
							<div class="informacion-general datos-post-usuario">
								<div>
									<h4 style="color:#5D9BFB;">$63,000.00</h4>
									<p>Venta<br>mensual</p>
								</div>
								<div>
									<h4 style="color:#FB5C5D;">$82,000.00</h4>
									<p>Meta<br>mensual</p>
								</div>
								<div>
									<h4 style="color:#F7931D;">$550,000.00</h4>
									<p>Venta<br>anual</p>
								</div>
								<div>
									<h4 style="color:#6FD64B;">$1,000,000.00</h4>
									<p>Meta<br>anual</p>
								</div>
								<div>
									<h4 style="color:#BB3CBF;">98</h4>
									<p>Total de<br>Pedidos</p>
								</div>

							</div>

						</div>
						<div class="modulo-aside sombra-1">
							<div class="header-gris">
								<h3>Número de visitas en sus publicaciones</h3>
							</div>

							<!-- ******************************** AQUÍ SE MUESTRAN LAS GRÁFICAS ******************************** -->
							<div class="canvas">
								<div>
									<canvas id="canvas"></canvas>
								</div>
							</div>
						</div>
					</div>




				</div>
	<!--
				<section class="lista-distribuidores lista-distribuidores-perfil-vendedor sombra-1">
					<div class="header-gris">
						<h3>Distribuidores asignados</h3>
					</div>
					<div class="culumnas-lista-distribuidores">
						<p>Nombre</p>
						<p>Estatus</p>
						<p>Pedidos</p>
						<p>Total Comprado</p>
						<p>Compra de mes Actual</p>
						<p>Meta de mes actual</p>
					</div>
					<div class="contenido-lista-distribuidores contenido-lista-distribuidores-perfil-vendedor">
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>Al corriente</p>
						<p>200</p>
						<p>$100,000.00</p>
						<p>$20,000.00</p>
						<p>$30,000.00</p>
					</div>
					<div class="contenido-lista-distribuidores contenido-lista-distribuidores-perfil-vendedor">
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>Al corriente</p>
						<p>200</p>
						<p>$100,000.00</p>
						<p>$20,000.00</p>
						<p>$30,000.00</p>
					</div>
					<div class="contenido-lista-distribuidores contenido-lista-distribuidores-perfil-vendedor">
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>Al corriente</p>
						<p>200</p>
						<p>$100,000.00</p>
						<p>$20,000.00</p>
						<p>$30,000.00</p>
					</div>
					<div class="contenido-lista-distribuidores contenido-lista-distribuidores-perfil-vendedor">
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>Al corriente</p>
						<p>200</p>
						<p>$100,000.00</p>
						<p>$20,000.00</p>
						<p>$30,000.00</p>
					</div>

				</section>
	-->

				<section class="lista-pedidos lista-pedidos-perfil-vendedor sombra-1">
					<div class="header-gris">
						<h3>Pedidos</h3>
					</div>
					<div class="culumnas-lista-pedidos">
						<p>Clave</p>
						<p>Estado</p>
						<p>Monto</p>
						<p>Distribuidor</p>
						<p>Empresa de envío</p>
						<p>Código de embarque</p>
					</div>
					<div class="contenido-lista-pedidos contenido-lista-pedidos-perfil-vendedor">
						<p><a href="">XASDDDFSFDS</a></p>
						<p>Facturado</p>
						<p>$50,000.00</p>
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>FEDEX</p>
						<p>saxf34ffs</p>
					</div>
					<div class="contenido-lista-pedidos contenido-lista-pedidos-perfil-vendedor">
						<p><a href="">XASDDDFSFDS</a></p>
						<p>Sin facturar</p>
						<p>$50,000.00</p>
						<p><a href="">Juan Felipe Ramirez Tapia</a></p>
						<p>DHL</p>
						<p>saxf34ffs</p>
					</div>

				</section>


			</div>
		</div>







	@endsection

	@section('page_scripts')
	<!-- ******************************** ESTE ES EL CÓDIGO QUE CREA LA GRÁFICA ******************************** -->
	<script>
			var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
			var lineChartData = {
				labels : ["January","February","March","April","May","June","July"],
				datasets : [
					{
						label: "My First dataset",
						fillColor : "rgba(220,220,220,0)",
						strokeColor : "#5D9BFB",
						pointColor : "#5D9BFB",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "#5D9BFB",
						data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
					},



				]

			}

		window.onload = function(){
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myLine = new Chart(ctx).Line(lineChartData, {
				responsive: true
			});
		}


		</script>




@endsection
