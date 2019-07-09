
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




  @extends('layouts.back')
  
  @section('content')
  
  <!-- ******************************** CABECERA ******************************** -->
  
  
  
  <div id="contenedor-principal">
    <!-- Este div contiene todo lo que se encuentra debajo del header -->
  
    <!-- ******************************** MENÚ IZQUIERDO ******************************** -->
  
  
  
    <!-- ******************************** AREA PRINCIPAL: Se refiera al área que se encuentra debajo del header y a la derecha del menú izquierdo ******************************** -->
  
  
    <div class="area-principal">

      <form action="{{route('importExcel.post')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="excel">File:</label>
        <input type="file" name="excel">
        <input type="submit" value="Submit" name="submit">
      </form>
  
    </div>
  </div>
  <!-- ****************  CIERRA PRODUCTOS RELACIONADOS **************** -->
  
  @endsection
  
  @section('page_scripts')
  <script src="js/custominputfile.js"></script>
  @endsection