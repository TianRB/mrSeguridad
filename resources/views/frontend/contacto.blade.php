@extends('layouts.front')

@section('content')

<div class="contenedor-general-politicas">

	<div class="contenedor-pdf-politicas">
				
				
				<div class="documentos-solicitados">
					<h1>Políticas</h1>
					<p>Descarga y conoce nuestras políticas, especialmente diseñadas para generar el ambiente de trabajo ideal entre MR y nuestra red de distribuidores.</p>
					<a href="{{ asset('img/politicas-devoluciones-distribuidores.pdf') }}" target="_blank">Política de devoluciones para distribuidores</a>
					<a href="{{ asset('img/politica-ventas.pdf') }}" target="_blank">Términos y Política de ventas para distribuidores</a>
				</div>
	</div>
	<div class="contenedor-politicas">
			<!--<section>
					<h3>¿Quieres ser distribuidor?</h3>
					<p>Hacemos el proceso rápido, sin mucho esfuerzo y te ahorramos mucho dinero!</p>
					<a href="{{ url('/formulario') }}"><div class="btn-registrate">¡Quiero unirme!</div></a>
				

			</section>-->
			
			<section>
				<h3>¿Ya tienes cuenta?</h3>
				<form action="" class="formulario-contacto">
					<ul>
						<li><input type="text" placeholder="Usuario"></li>
						<li><input type="text" placeholder="Contraseña"></li>
					</ul>
				<div class="btn-registrate">Iniciar sesión</div>
				</form>
			</section>
	</div>
</div>

@endsection
