<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/inicio-sesion.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
	<title>Inicio de sesión</title>
</head>
<body>
	<article class="inicio-sesion">
		<section class="form">
			<figure><img src="img/logo-mr.png" alt=""> </figure>
			<form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
				<div class="group input-sesion">
    					<input type="text" name="email" required>
    					<span class="highlight"></span>
    					<span class="bar"></span>
    					<label>Usuario</label>
  					</div>
  					<div class="group input-sesion">
    					<input type="password" type="password" name="password" required>
    					<span class="highlight"></span>
    					<span class="bar"></span>
    					<label>Contraseña</label>
  					</div>
			<button class="btn btn-rectangle btn-raised" type="submit">
				<div class="ripple-container">
					<span class="ripple-effect"></span>
				</div>
				Ingresar
			</button>
    </form>

		</section>
	</article>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
	var ripple = document.querySelectorAll('.ripple-container');
/*Guardamos un array con todos los botones. Para compatibilidad con navegadores
antiguos puedes reemplazar el querySelectorAll con un getElementsByClassName*/
[].forEach.call(ripple, function(e) {
  e.addEventListener('click', function(e) {
    /*Esto se activará cada vez que haya un click en un botón*/
    var offset = this.parentNode.getBoundingClientRect();
    //Toma los limites del padre (el padre es el <button> para
    //los botones, o el <div> principal en la imagen
    var effect = this.querySelector('.ripple-effect');
    //Toma SOLO el span ripple-effect que está dentro del boton clicado

    /*pageX y pageY devuelven el punto de la página en el cual se hizo clic,
    siendo el origen la esquina superior izquierda. En offset.top y offset.left
    tenemos almacenados la distancia al origen de la esquina superior izquierda
    del botón. La resta de estos elementos nos indicará el punto en el cual se
    hizo clic, teniendo como origen la esquina superior izquierda del botón*/
    effect.style.top = (e.pageY - offset.top) + "px";
    effect.style.left = (e.pageX - offset.left) + "px";

    this.classList.add('ripple-effect-animation'); //Agregamos la clase con la animación

  }, false);

  /*Cuando la animación finalice, se disparan eventos llamando a removeAnimation,
  este método eliminará la clase ripple-effect-animation*/
  e.addEventListener('animationend', removeAnimation);
  e.addEventListener('webkitAnimationEnd', removeAnimation);
  e.addEventListener('oanimationend', removeAnimation);
  e.addEventListener('MSAnimationEnd', removeAnimation);
});

function removeAnimation() {
  if (this.classList) {
    this.classList.remove('ripple-effect-animation');
  } else {
    this.className = this.className.replace(new RegExp('(^|\\b)' + 'ripple-effect-animation'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
  }
}
@if ($errors->any())
  @foreach ($errors->all() as $error)
      console.log('{!! $error !!}');
  @endforeach
@endif
</script>

</body>
</html>
