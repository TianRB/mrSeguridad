$(document).ready(btnMenu);
$(document).ready(firstWord);
$(document).ready(videoHover);
$(document).ready(hoverito);


if($("html").width()>1000){
$(document).on("scroll",function(){
    if($(document).scrollTop()>750){
        $(".contenedor-primario-dos").css("position","fixed");
         $(".contenedor-primario-dos").css("top","0");
    } else{
        $(".contenedor-primario-dos").css("position","absolute");
        $(".contenedor-primario-dos").css("top","750px");
    }

    if($(document).scrollTop()>1400){
        $(".contenedor-primario-tres").css("position","fixed");
         $(".contenedor-primario-tres").css("top","0");
    } else{
        $(".contenedor-primario-tres").css("position","absolute");
        $(".contenedor-primario-tres").css("top","1400px");
    }
});

}

/*$(document).on("scroll",function(){
    if($(document).scrollTop()>100){
        $("nav").css("position", "fixed")
         $("nav").css("margin-top", "-100px")
    } else{
    	 $("nav").css("position", "absolute")
        $("nav").css("margin-top", "0px")
    }
});*/






function hoverito(){
	$(".img-magnifier-container").hover(function(){
    $(".texto-ficha-tecnica").css("opacity", "0");
    }, function(){
    $(".texto-ficha-tecnica").css("opacity", "1");
});
}



function videoHover(){
	var figure = $(".categorias-index article").hover( hoverVideo, hideVideo );

	function hoverVideo(e) {  
	    $('video', this).get(0).play(); 
	}

	function hideVideo(e) {
	    $('video', this).get(0).pause(); 
	}
}


function firstWord(){
$(".texto-categorias h2").html(function(){
  var text= $(this).text().trim().split(" ");
  var first = text.shift();
  return (text.length > 0 ? "<span class='first-word'>"+ first + "</span> " : first) + text.join(" ");
});

$(".texto-ficha-tecnica h1").html(function(){
  var text= $(this).text().trim().split(" ");
  var last = text.pop();
  return text.join(" ") + (text.length > 0 ? " <span class='codigo-producto'>" + last + "</span>" : last);
});

$(".contenedor-productos .producto h2").html(function(){
  var text= $(this).text().trim().split(" ");
  var last = text.pop();
  return text.join(" ") + (text.length > 0 ? " <span class='codigo-producto-dos'>" + last + "</span>" : last);
});

}




function btnMenu(){
	$(".rayitas").click(function(){
		if ($(".rayitas").hasClass("rayitas-desactivas")) {
			
			$(".rayitas").removeClass("rayitas-desactivas")
			$(".rayitas").addClass("rayitas-activas")
				$("nav").addClass("nav-activo")
				$(".cuadro-negro").addClass("cuadro-negro-activo")
				$(".redes").fadeIn()
				$(".contenedor-total").addClass("contenedor-total-activo")
				$(".ficha-tecnica .miniaturas-producto").addClass("miniaturas-producto-back")
				$("body").css("position","fixed")
				setTimeout(function() {
					$(".redes").addClass("redes-activo")
				}, 800);
			
		}else{
			$("body").css("position","relative")
			$(".cuadro-negro").removeClass("cuadro-negro-activo")
			$(".redes").fadeOut()
			setTimeout(function() {
				$(".ficha-tecnica .miniaturas-producto").removeClass("miniaturas-producto-back")
			}, 800);
			setTimeout(function() {
				$(".rayitas").addClass("rayitas-desactivas")
				$(".rayitas").removeClass("rayitas-activas")
				
			}, 500);
			$("nav").removeClass("nav-activo")
			$(".redes").removeClass("redes-activo")
			$(".contenedor-total").removeClass("contenedor-total-activo")
		}
	})
}







$(document).ready(function(){
	

var t=setInterval(function(){avanzar();},6000);

	$('#btnAnt').click(function()
	{
		var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					
					$(value).removeClass('s_visible');
					
					if(index==0)
					{
						$($('.slider').find('.s_element').get(size-1)).addClass('s_visible');
						return false;
					}
					else
					{
						$($('.slider').find('.s_element').get(index-1)).addClass('s_visible');	
						return false;
					}
				}
		});
	});
	$('#btnSig').click(function()
	{
		var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					
					$(value).removeClass('s_visible');
					
					if(index+1<size)
					{
						$($('.slider').find('.s_element').get(index+1)).addClass('s_visible');
						return false;
					}
					else
					{
						$($('.slider').find('.s_element').get(0)).addClass('s_visible');	
						return false;
					}
				}
		});
	});
	
	
	
});


function avanzar()
{
	var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					$(value).removeClass('s_visible');
					
					if(index+1<size)
					{
						setTimeout(function() {
							$($('.slider').find('.s_element').get(index+1)).addClass('s_visible');
							return false;
						}, 1000);
						
					}
					else
					{
						setTimeout(function() {
							$($('.slider').find('.s_element').get(0)).addClass('s_visible');	
							return false;
						}, 1000);
						
					}
				}
		});
}














