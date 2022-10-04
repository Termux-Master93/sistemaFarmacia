$(document).ready(function() {
//operacion para mostrar y ocultar agregando clases predifinidas
	var mostrar=0;
	$('.mostrar').on('click', function(){
		if (mostrar==1) {
			$('.contenedor-menu').addClass("contenedor-menu2");
			mostrar=0;
		}else{
			$('.contenedor-menu').removeClass("contenedor-menu2");
			mostrar=1;
		}
		
	})
	var ver=0;
	$('#mostrar_pro').on('click', function(){
		if(ver==1){
			$('.sub_pro li').css("display", "block");
			ver=0;
		}else{
			$('.sub_pro li').css("display", "none");
			ver=1;
		}
		
	})
	
	$('#ventas').on('click', function(){
		if(ver==1){
			$('.items_ven li').css("display", "block");
			ver=0;
		}else{
			$('.items_ven li').css("display", "none");
			ver=1;
		}
		
	})
})

