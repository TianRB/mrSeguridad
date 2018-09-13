@extends('layouts.back')

@section('content')

  <!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->

  		<div class="area-principal">

  			<!-- ******************************** ESTÁ SECCIÓN CONTIENE LOS FILTROS DE BUSQUEDA ******************************** -->
  			<div class="sombra-1 modulo-largo">
  				<div class="header-gris">
  					<h3>Filtro de búsqueda de artículos</h3>
  				</div>

  				<div class="filtro-notas">




  	  				<div class="grupo-filtro-notas">
  	  					<span class="triangulito"></span>
  	  					<select class="browser-default" id="puesto" name="puesto">
  						    <option value="" disabled selected>Categoría</option>
  						    <option value="Editor" class="editor">Nuevos productos</option>
  						    <option value="Reportero">Seguridad vial</option>
  						    <option value="Jefe de Redacción">Protección general</option>
  						    <option value="Jefe de Redacción">Protección visual</option>
  						    <option value="Jefe de Redacción">Protección para manos</option>
  						    <option value="Jefe de Redacción">Protección auditiva</option>
  						    <option value="Jefe de Redacción">Protección para lluvias</option>
  						    <option value="Jefe de Redacción">Protección respiratoria</option>
  					    </select>
  	  				</div>


  					<div>
  						<div class="btn-filtro buscador">
  						    <input type="text" placeholder="Buscar">
  							 <span class="icon-menu"></span>
  						</div>
  					</div>


  				</div>

  			</div>


  			<!-- ******************************** ESTÁ SECCIÓN MUESTRA LOS ARTÍCULOS EXISTENTES ******************************** -->
  			<div class="area-principal-articulos">

          @foreach ($articles as $a)
          <div class="sombra-1 modulo-largo lista-articulos"> <!-- Articulo UNO -->
  					<article>
  						<figure><img src="{{ $a->one_pic() }}" alt=""></figure><!-- Foto del artículo -->
  						<section>
  							<div class="texto-card-articulos">
  								<h2>{{ $a->title}}</h2><!-- Título del artículo -->
  								<div class="contenido">{!! $a->content !!}</div><!-- Extracto del artículo -->
  								<div class="datos-publi">
  									<div><strong>Categoría:</strong> {{ $a->categories()->pluck('name')->implode(', ') }}</div> <!-- Autor -->
  									<div><strong>Fecha:</strong>{{ $a->created_at }}</div> <!-- Fecha de publicación -->
  								</div>
  							</div>

  							<!-- BOTONES -->
  							<div class="btns-notas" style="display:flex;">
                  <a href="{{ url('articles/'.$a->id.'/edit') }}">
                  <button class="btn btn-rectangle btn-raised">
  						    		<div class="ripple-container">
  										<span class="ripple-effect"></span>
  						    		</div>
  						    		Editar
  								</button>
                  </a>
                  <a href="{{ url('articles/add_image/'.$a->id) }}">
                  <button class="btn btn-rectangle btn-raised">
  						    		<div class="ripple-container">
  										<span class="ripple-effect"></span>
  						    		</div>
  						    		Editar Imagenes
  								</button>
                  </a>
                  <!-- borrar -->

                  <form action="{{ action('ArticleController@destroy', ['id' => $a->id]) }}" method="POST" class="no-margin">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                      <button class="btn btn-rectangle btn-raised btn-basura" type="submit">
      						    		<div class="ripple-container">
      										<span class="ripple-effect"></span>
      						    		</div>
      						    		 <span class="icon-borrar"></span>
      								</button>
                  </form>
  							</div>
  						</section>
  					</article>
  				</div>
        @endforeach


  			</div>
  		</div>

@endsection
