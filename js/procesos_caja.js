$(document).ready(function(){
    // codigo de apoyo
    function reloj() {
        //Variables
        horareal = new Date()
        hora = horareal.getHours()
        minuto = horareal.getMinutes()
        segundo = horareal.getSeconds()
        //Codigo para evitar que solo se vea un numero en los segundos
        comprobarsegundo = new String (segundo)
        if (comprobarsegundo.length == 1)
        segundo = "0" + segundo
        //Codigo para evitar que solo se vea un numero en los minutos
        comprobarminuto = new String (minuto)
        if (comprobarminuto.length == 1)
        minuto = "0" + minuto
        //Codigo para evitar que solo se vea un numero en las horas
        comprobarhora = new String (hora)
        if (comprobarhora.length == 1)
        hora = "0" + hora
        // Codigo para mostrar el reloj en pantalla
        verhora = hora + " : " + minuto + " : " + segundo
        //document.reloj.value = verhora
        document.getElementById('txt_ciem').val(verhora);
    
    }

	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + (dt.getSeconds()+4);
	var apertura = d.getFullYear() + '/' +
		   (month<10 ? '0' : '') + month + '/' +
	    (day<10 ? '0' : '') + day+' | '+time;
		   console.log(apertura);
		   $('#txt_fape').val(apertura);

    //fin de apoyo de codigo
    listar_caja();
    $('#txt_bcaj').keyup(function(){
       var filtro=$('#txt_bcaj').val();
       $(listar_caja(filtro));
    })

    function listar_caja(filtro){
        $.ajax({
            type:"POST",
            url: 'acciones/acciones_caja.php',
            data: {
                accion: 'listar_caja',
                fil: filtro,
            },
            success: function(respuesta){
                console.log(datos);
                if(respuesta=="nodata"){
                    $('#datos').html("No hay datos");
                }else{
                    var datos=JSON.parse(respuesta);
                    var tabla='';
                
                    for(z in datos){
                        $('#dni_caj').html(datos[z].dni_usu);
                        $('#txt_usu').val(datos[z].nom_usu+' '+datos[z].ape_usu);
                        var estado=datos[z].est_caj;
                        var std="";
                        if(estado==1){
                            std="Activo";
                        }else if(estado==2){
                            std="Inactivo";
                        }
                        tabla+='<tr>'+
                            '<td>'+z+'</td>'+
                            '<td>'+datos[z].fec_ape+'</td>'+
                            '<td>'+datos[z].fec_cie+'</td>'+
                            '<td>'+datos[z].mon_ape+'</td>'+
                            '<td>'+datos[z].mon_cie+'</td>'+
                            '<td>'+datos[z].gas_caj+'</td>'+
                            '<td>'+datos[z].nom_usu+' '+datos[z].ape_usu+'</td>'+
                            '<td>'+std+'</td>'+
                            '<td>'+datos[z].nota+'</td>'+
                            '<td>'+
                            '<img id='+datos[z].cod_caj+' src=img/pencil-fill.svg class=modificar width=25 data-bs-toggle="modal" data-bs-target="#modificar_caja">'+
                            '</td>'+
                            '<td>'+
                            '<img id='+datos[z].cod_caj+' src=img/trash.svg class=eliminar width=25>'+
                            '</td>'

                        '</tr>'
                    }
                    $('#datos').html(tabla);
                }
            }
        })
    }//fin de funcion listar

      //EVENTO GUARDAR
      $('#btn_agre').click(function(){
        var f_ape=$('#txt_fape').val();
        var mon_ape=$('#txt_sal').val();
        var dni_caj=$('#dni_caj').html();
        
         if($('#txt_sal').val().trim()==""){
             alert("Ingrese saldo Porfavor");
             $('#txt_sal').focus();
         }else{
             $.ajax({
                 url: "acciones/acciones_caja.php",
                 type: "POST",
                 data:{
                     accion: "agregar_cajas",
                     fec_ape: f_ape,
                     saldo:mon_ape,
                     dni_usu:dni_caj,
                     est_d:1,
                 },
                 success: function(respuesta){
                     console.log(respuesta);
                     Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Caja Aperturada Con Exito',
                     showConfirmButton: false,
                     timer: 1500
                     })
                     $(listar_caja());
                     $('#txt_sal').val("");
                     $('#txt_sal').focus();
                     return true;
 
                 }
             })            
         }
 
 
     })
 




})//cierre de dom