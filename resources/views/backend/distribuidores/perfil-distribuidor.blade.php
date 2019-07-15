@extends('layouts.back')

@section('content')

	<!-- ******************************** CABECERA ******************************** -->



		<div id="contenedor-principal"> <!-- Este div contiene todo lo que se encuentra debajo del header -->

	<!-- ******************************** MENÚ IZQUIERDO ******************************** -->



	<!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->
	<div class="area-principal">

		<!-- ******************************** FOTO DEL USUARIO ******************************** -->

		<div class="contenedor-secundario">
			<div class="izquierda-perfil-usuario">
				<div class="modulo-medio sombra-1 usuario">
				<div class="header-gris header-usuario">
					<h3>Distribuidor</h3>
				</div>
				<section class="datos-usuario">
					<!--<figure class="foto-usuario">
						<img src="img/matusa.png" alt="">
					</figure>-->
					<section>
						<h1>Juan Perez Lopez</h1>
						<p><strong>No. de cliente:</strong> 1233424</p>
						<p><strong>P. Legal:</strong> Persona física</p>
						<p><strong>RFC:</strong> PLJ800213MJ9</p>
						<p><strong>Zona:</strong> Norte</p>
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
							<p>Compra<br>mensual</p>
						</div>
						<div>
							<h4 style="color:#FB5C5D;">$82,000.00</h4>
							<p>Meta<br>mensual</p>
						</div>
						<div>
							<h4 style="color:#F7931D;">$550,000.00</h4>
							<p>Compra<br>anual</p>
						</div>
						<div>
							<h4 style="color:#6FD64B;">$1,000,000.00</h4>
							<p>Meta<br>anual</p>
						</div>
						<div>
							<h4 style="color:#BB3CBF;">$0</h4>
							<p>Monto<br>adeudado</p>
						</div>
					</div>

				</div>
				<div class="modulo-aside sombra-1">
					<div class="header-gris">
						<h3>Estadisticas de compra</h3>
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



		<section class="lista-pedidos lista-pedidos-perfil-vendedor sombra-1">
			<div class="header-gris">
				<h3>Pedidos</h3>
			</div>
			<div class="culumnas-lista-pedidos">
				<p>Fecha</p>
				<p>Factura</p>
				<p>Paquetería</p>
				<p>No. de guía</p>
				<p>Sucursal</p>
				<p>No. de paquetes</p>
			</div>
			<div class="contenido-lista-pedidos contenido-lista-pedidos-perfil-vendedor">
				<p>20/10/2018</p>
				<p><a href="">Descargar</a></p>
				<p>Fedex</p>
				<p>3131233534</p>
				<p>Monterrey</p>
				<p>4</p>
			</div>
			<div class="contenido-lista-pedidos contenido-lista-pedidos-perfil-vendedor">
				<p>20/10/2018</p>
				<p><a href="">Descargar</a></p>
				<p>Fedex</p>
				<p>1233424353</p>
				<p>Monterrey</p>
				<p>2</p>
			</div>

		</section>


	</div>
</div>






@endsection

@section('page_scripts')
	<script src="{{ asset('js/Chart.js') }}"></script>
	<!-- ******************************** ESTE ES EL CÓDIGO QUE CREA LA GRÁFICA ******************************** -->
	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July","Agosto","Sep"],
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
