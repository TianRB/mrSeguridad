@extends('layouts.front')

@section('content')

<div class="registrate-distribuidor">
	<div class="documentos-solicitados">
		<p>Para comenzar el proceso de registro necesitas descargar la siguiente documentación para posteriormente subirla firmada. Si deseas conocer nuestro proceso de alta de distribuidores da <a href="{{ asset('img/unete-guia-distribuidor.png') }}" target="_blank">click aquí</a></p>
		<div class="enlaces-descarga">	
			<a href="{{ asset('img/politicas-devoluciones-distribuidores.pdf') }}" target="_blank">Política de devoluciones 
			para distribuidores</a>
			<a href="{{ asset('img/politica-ventas.pdf') }}" target="_blank">Términos y Política de ventas para distribuidores</a>
		</div>
	</div>

	<h1>¡Unete a nuestra red de distribuidores!</h1>
	<p>Sólo tienes que completar la siguiente solicitud para comenzar el proceso de registro</p>
	<form action="" class="formulario-contacto">
			<ul>
				<li><input type="text" placeholder="Nombre y Apellido"></li>
				<li><input type="text" placeholder="Cargo"></li>
				<li><input type="text" placeholder="Razón social"></li>
				<li><input type="text" placeholder="RFC"></li>
				<li><input type="text" placeholder="Ciudad"></li>
				<li><input type="text" placeholder="Correo Electrónico"></li>
				<li><input type="text" placeholder="Teléfono"></li>
				<li><input type="text" placeholder="Motivo"></li>
				<li><textarea name="" id="" placeholder="¿Cómo podemos ayudarle?"></textarea></li>
				<p>Es indispensable que suba la siguiente documentación para completar el registro:</p>
				<div>
					<span class="file"><input type="file" name="file" id="file" class="inputfile"/></span>
					<label for="file"><span>Solicitud de distribuidor firmada</span></label>
				</div>
				<div>
					<span class="file"><input type="file" name="file" id="file" class="inputfile" /></span>
					<label for="file"><span>Acta constitutiva (personas Morales)</span></label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Política de ventas y de devolución firmada</label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Copia de alta en Hacienda</label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Copia de R.F.C.</label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Identificación Oficial Vigente (IFE o Pasaporte vigente)</label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Copia de comprobante de domicilio a nombre de la empresa y que coincida  con el domicilio fiscal. Puede ser recibo de luz, agua, teléfono, etc.</label>
				</div>
				<div>
					<input type="file" name="file" id="file" class="inputfile" />
					<label for="file">Si cuenta con seguro de transporte, favor de incluir una carta donde indica el número de póliza y nombre de la compañia de seguros.</label>
				</div>
			</ul>
			
			<div class="btn-enviar">enviar</div>
		</form>
</div>


@endsection
