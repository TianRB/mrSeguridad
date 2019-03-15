@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA SLIDE  **************** -->
<section class="contenedor-slide slider">


	@foreach ($slides as $s)
		<article id="ele2" class="s_element @if($loop->first) s_visible @endif">
			<figure class="fondo-slide"><img src="{{ asset($s->bg_img) }}" alt=""></figure>
			<figure class="producto-slide"><a href="//{{ $s->url }}"><img src="{{ asset($s->image) }}" alt=""></a></figure>
		</article>
	@endforeach

{{--
	<article id="ele2" class="s_element s_visible">
		<figure class="fondo-slide"><img src="img/fondo-slide-2.png" alt=""></figure>
		<figure class="producto-slide"><a href="http://18.221.15.19/mrSeguridad/public/productos/ver/tenis-industrial-con-casquillo-sp1042/nuevos-productos"><img src="img/producto-slide-2.png" alt=""></a></figure>
		<!-- <div class="texto-slide">
			<h2>Casco</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div> -->
	</article>
	<article id="ele1" class="s_element">
		<figure class="fondo-slide"><img src="img/fondo-slide-3.png" alt=""></figure>
		<figure class="producto-slide"><img src="img/producto-slide-3.png" alt=""></figure>
		<!-- <div class="texto-slide">
			<h2>Paliacate</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div> -->
	</article>
	<article id="ele1" class="s_element">
		<figure class="fondo-slide"><img src="img/fondo-slide-4.png" alt=""></figure>
		<figure class="producto-slide"><img src="img/producto-slide-4.png" alt=""></figure>
		<div class="texto-slide">
			<h2>Paliacate</h2>
			<p>dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<a href=""><div class="btn-slide">ver más</div><div class="btn-linea"></div></a>
		</div>
	</article> --}}


	<div class="nav-slide">
		<ul>
			<li id="btnSig"><span class="icon-arrow-left2"></span></li>
			<li id="btnAnt"><span class="icon-arrow-right2"></span></li>
		</ul>
	</div>
</section>
<!-- ****************  TERMINA SLIDE  **************** -->



<!-- ****************  ABRE UNETE AL EQUIPO  **************** -->
<div class="contenedor-unete">
	<a href="{{ url('/formulario') }}" >
		<div class="unete unete-uno">
			<article>
				<h2>INTÉGRATE A NUESTRA RED DE DISTRIBUIDORES</h2>
				<p>Obtén acceso a una marca única en el mercado, que ofrece más beneficios y valor agregado que harán crecer tu negocio.</p>
				<div class="btn-unete"> ¡Quiero unirme!</div>
			</article>
			<div class="diagonales">
				<div class="diagonal-uno"></div>
				<div class="diagonal-dos"></div>
				<div class="diagonal-tres"></div>
			</div>

			<div class="contenedor-video">
				<video src="video/video-distribuidor.mp4" autoplay loop></video>
			</div>

		</div>
	</a> 
	<a href="{{ url('/nosotros') }}" >
		<div class="unete unete-dos">
			<article>
				<h2>BENEFICIOS PARA NUESTROS USUARIOS FINALES</h2>
				<p>Utilizando nuestros equipos podrás concentrarte plenamente en tu actividad diaria sin preocuparte de más.</p>
				<div class="btn-unete"> ¡Quiero saber más!</div>
			</article>
			<div class="diagonales">
				<div class="diagonal-uno"></div>
				<div class="diagonal-dos"></div>
				<div class="diagonal-tres"></div>
			</div>

			<div class="contenedor-video">
				<video src="video/video-usuario-final.mp4" autoplay loop></video>
			</div>

		</div>
	</a> 
</div>
<!-- ****************  CIERRA UNETE AL EQUIPO  **************** -->



<!-- ****************  ABRE CATEGORÍAS  **************** -->
{{--  USAR ESTO PARA JALAR CATEGORIAS DE DB
@foreach ($categories as $c)
<article>
	<div class="contenedor-video-categorias">
		<video src="video/fondo-unete-dos.mp4" autoplay loop></video>
	</div>
	<div class="texto-categorias">
		<h2>{{ $c->name }}</h2>
	</div>
</article>
@endforeach
 --}}
<div class="seccion-categorias">
	<article>
		<h2>Conoce nuestras categorías</h2>
		<p>Contamos con categorías para identificar más rápido lo que buscas. Están organizadas de acuerdo al uso y protección que ofrecen y para satisfacer las necesidades del sector industrial en equipo protección personal y vial.</p>
	</article>
	<section class="categorias-index">
		<article>
			<a href="productos/nuevos-productos">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/nuevos-productos.png') }}"><img class="active" src="{{ asset('img/nuevos-productos.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Nuevos Productos</h2>
				</div>
				<div class="new-label"></div>
			</a>
		</article>
		<article>
			<a href="productos/senalizacion">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/senalizacion.png') }}"><img class="active" src="{{ asset('img/senalizacion.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Señalización</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/ropa-vial">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/ropa-vial.png') }}"><img class="active" src="{{ asset('img/ropa-vial.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Ropa Vial</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-general">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/proteccion-general.png') }}"><img class="active" src="{{ asset('img/proteccion-general.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección General</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-anticaidas">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/anticaidas.png') }}"><img class="active" src="{{ asset('img/anticaidas.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección Anticaidas</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/calzado-industrial">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/calzado.png') }}"><img class="active" src="{{ asset('img/calzado.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Calzado Industrial</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-visual">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/visual.png') }}"><img class="active" src="{{ asset('img/visual.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección Visual</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-manos">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/manos.png') }}"><img class="active" src="{{ asset('img/manos.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección para Manos</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-auditiva">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/auditiva.png') }}"><img class="active" src="{{ asset('img/auditiva.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección Auditiva</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-para-la-lluvia">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/lluvia.png') }}"><img class="active" src="{{ asset('img/lluvia.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección Para la Lluvia</h2>
				</div>
			</a>
		</article>
		<article>
			<a href="productos/proteccion-respiratoria">
				<div class="contenedor-video-categorias">
					<img class="static" src="{{ asset('img/respiratoria.png') }}"><img class="active" src="{{ asset('img/respiratoria.gif') }}">
				</div>
				<div class="texto-categorias">
					<h2>Protección Respiratoria</h2>
				</div>
			</a>
		</article>
		
	</section>

</div>

<!-- ****************  CIERRA CATEGORIAS **************** -->



@endsection
