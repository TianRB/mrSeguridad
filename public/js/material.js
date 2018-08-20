
$(document).ready(menuDesplegable);



/************* MENU DESPLEGABLE ************************/

function menuDesplegable(){

  $(".desplegador-menu").click(function(){
    if($(".menu").hasClass("menu-desplegado")) {
        $(".menu ").removeClass("menu-desplegado")
    } else{
      $(".menu").addClass("menu-desplegado")
    };
  })
}

/************* ACORDION MENÚ IZQUIERDO ************************/
 $(function(){
   $('.bloque').hide();
   $('.nav h4').on('click',function(){
     if($(this).next().is(':visible')){
       $(this).next().slideUp();
     }
     if($(this).next().is(':hidden')){
       $('.nav h4').next().slideUp();
       $(this).next().slideDown();
    }
   });
})




/************* INPUTS MATERIAL ************************/

$(document).ready(function() {

  $('input').blur(function() {

    // check if the input has any value (if we've typed into it)
    if ($(this).val())
      $(this).addClass('used');
    else
      $(this).removeClass('used');
  });

});




/************* BTN-RIPPLE ************************/

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


/************* INPUT PARA SUBIR ARCHIVOS ************************/
//   $(document).ready(function(e){
//   $('#input-file-1, #input-file-2').customFile({
//     type : 'image' // set 'all' or just leave default settings for all-type file selector
//   });
// });





/************* CHECKBOX  ************************/

  // per css-tricks restarting css animations
// http://css-tricks.com/restart-css-animation/
$('label').click(function() {

  // find the first span which is our circle/bubble
  var el = $(this).children('span:first-child');

  // add the bubble class (we do this so it doesnt show on page load)
  el.addClass('circle');

  // clone it
  var newone = el.clone(true);

  // add the cloned version before our original
  el.before(newone);

  // remove the original so that it is ready to run on next click
  $("." + el.attr("class") + ":last").remove();
});
