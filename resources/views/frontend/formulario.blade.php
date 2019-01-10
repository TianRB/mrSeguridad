@extends('layouts.front')

@section('content')

<div class="registrate-distribuidor">
	<div class="encabezado-distribuidor">
		<p>Proceso de alta de distribuidor</p>
	</div>
	<div class="documentos-solicitados">
		<p>Para comenzar el proceso de registro necesitas descargar la siguiente documentación para posteriormente subirla firmada. Si deseas conocer nuestro proceso de alta de distribuidores da <a href="{{ asset('img/unete-guia-distribuidor.png') }}" target="_blank">click aquí</a></p>

		<p>1. Descarga Solicitud de distribuidor y Políticas (ventas y devolución).</p>
		<p>2. Llena la solicitud y junto con las políticas, enviarlas firmadas (los tres documentos).</p>
		<p>3. Envíanos por correo o desde esta sección (upload) los tres documentos anteriores más: <br> RFC, Acta, Alta SAT, IFE.</p>
		<div class="enlaces-descarga">
			<a href="{{ asset('img/politicas-devoluciones-distribuidores.pdf') }}" target="_blank">Política de devolución</a>
			<a href="{{ asset('img/politica-ventas.pdf') }}" target="_blank">Política de Ventas</a>
		</div>
	</div>

	<h1>¡Unete a nuestra red de distribuidores!</h1>
	<p>Sólo tienes que completar la siguiente solicitud para comenzar el proceso de registro</p>
	<form action="{{ route('send.register') }}" class="" style="background-color:#ccc">
			<ul>
				<li><input type="text" name="nombre" placeholder="Nombre y Apellido"></li>
				<li><input type="text" name="cargo" placeholder="Cargo"></li>
				<li><input type="text" name="razonsocial" placeholder="Razón social"></li>
				<li><input type="text" name="rfc" placeholder="RFC"></li>
				<li><input type="text" name="ciudad" placeholder="Ciudad"></li>
				<li><input type="text" name="mail" placeholder="Correo Electrónico"></li>
				<li><input type="text" name="telefono" placeholder="Teléfono"></li>
				<li><input type="text" name="motivo" placeholder="Motivo"></li>
				<li><textarea name="mensaje" placeholder="¿Cómo podemos ayudarle?"></textarea></li>
				<p>Es indispensable que suba la siguiente documentación para completar el registro:</p>
				<div>
					<input type="file" name="politicaventas"/>
					<label for="file"><span>Política de ventas</span></label>
				</div>
				<div>
					<input type="file" name="politicadevolucion"/>
					<label for="file"><span>Política de devolución</span></label>
				</div>
				<div>
					<input type="file" name="politicacredito"/>
					<label for="file"><span>Política de crédito</span></label>
				</div>
				<div>
					<input type="file" name="ordencompra"/>
					<label for="file"><span>Ordén de compra</span></label>
				</div>
				<div>
					<input type="file" name="serviciofletes"/>
					<label for="file"><span>Servicio de fletes</span></label>
				</div>
				<div>
					<input type="file" name="solicituddistribuidor"/>
					<label for="file"><span>Solicitud distribuidor</span></label>
				</div>
				<div>
					<input type="file" name="solicitudcredito"/>
					<label for="file"><span>Solicitud de crédito</span></label>
				</div>

			</ul>

			<input class="btn-enviar" type="submit" value="Enviar">
		</form>
</div>


@endsection
