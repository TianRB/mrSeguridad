$(document).ready(btnMenu);
$(document).ready(firstWord);
$(document).ready(videoHover);



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
}




function btnMenu(){
	$(".rayitas").click(function(){
		if ($(".rayitas").hasClass("rayitas-desactivas")) {
			
			$(".rayitas").removeClass("rayitas-desactivas")
			$(".rayitas").addClass("rayitas-activas")
				$("nav").addClass("nav-activo")
				$(".inicio-sesion").fadeOut()
				$(".ficha-tecnica .miniaturas-producto").addClass("miniaturas-producto-back")
			
		}else{
			setTimeout(function() {
				$(".ficha-tecnica .miniaturas-producto").removeClass("miniaturas-producto-back")
			}, 800);
			setTimeout(function() {
				$(".rayitas").addClass("rayitas-desactivas")
				$(".rayitas").removeClass("rayitas-activas")
				$(".inicio-sesion").fadeIn()
				
			}, 500);
			$("nav").removeClass("nav-activo")
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














