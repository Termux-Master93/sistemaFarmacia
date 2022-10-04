$(document).ready(function(){
    $(listado_ubicacion());
    $('#txt_bubi').keyup(function(){
        var bus_ubi=$('#txt_bubi').val();
        $(listado_ubicacion(bus_ubi));
    });
    function listado_ubicacion(bus_ubi){
        var lista_ubi;
        $.ajax({
            url: 'acciones/acciones_ubicacion.php',
            type: "POST",
            data: {
                accion: 'listar_ubicacion',
                buscar: bus_ubi,
            },
            success: function(respuesta){
                if(respuesta=="nodata"){
                    lista_ubi="No hay Ubiccaiones registradas";
    
                }else{
                    var datos=JSON.parse(respuesta);
                    for(i in datos){
                        var cod_ubi=datos[i].cod_uvi;
                        lista_ubi+=`<tr>
                                    <td>${datos[i].nom_ubi}</td>
                                    <td><img class="modificar_ubi" id="${cod_ubi}" data-bs-toggle="modal" data-bs-target="#modificar_ubicacion" src="img/pencil-fill.svg" alt=""></td>
									<td><img class="elimina_ubi" id="${cod_ubi}" src="img/trash.svg" alt=""></td>
                                  </tr>`
                    }
                    $('#datos').html(lista_ubi);

                }
                
            }
                
        }) //fin de ajax
    }//fin de funcion listar

    //EVENTO GUARDAR
    $('#btn_agre').click(function(){
       var ubica=$('#txt_ubi').val();
        //var estado=$("#txt_est").prop("selectedIndex",1);
        if($('#txt_ubi').val().trim()==""){
            alert("Ingrese Ubicacion Porfavor");
            $('#txt_ubi').focus();
        }else{
            $.ajax({
                url: "acciones/acciones_ubicacion.php",
                type: "POST",
                data:{
                    accion: "agregar_ubicacion",
                    nom_ub: ubica,
                },
                success: function(respuesta){
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ubicacion Guardao Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $(listado_ubicacion());
                    $('#txt_ubi').val("");
                    $('#txt_ubi').focus();
                    return true;

                }
            })            
        }


    })

    //EVENTO MODIFICAR
    $(document).on('click','.modificar_ubi',function(e){
        var cod_modu=$(this).attr('id');
        $.ajax({
            url: 'acciones/acciones_ubicacion.php',
            type: 'POST',
            data: {
                accion: 'listar_ubicacion',
                cod_ubicacion: cod_modu,
            },
            success:function(respuesta){
                var datos_ubi=JSON.parse(respuesta);
                $('#txt_codm').val(datos_ubi[0].cod_uvi);
                $('#txt_ubim').val(datos_ubi[0].nom_ubi);
            }
        });
    })
    //EVENTO ELIMINAR
    $(document).on('click','.elimina_ubi',function(e){
        var cod_eliu=$(this).attr('id');
        var row = $(this).parents('tr');
        $.ajax({
            url: "acciones/acciones_ubicacion.php",
            type: "POST",
            data: {
                accion: 'eliminar_ubicacion',
                cod_eu: cod_eliu,
            },
            success: function(respuesta){
                    Swal.fire({
                        title: 'Estamos Eliminando Ubicacion!',
                        html: 'I will close in <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                          Swal.showLoading()
                          const b = Swal.getHtmlContainer().querySelector('b')
                          timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                          }, 100)
                        },
                        willClose: () => {
                          clearInterval(timerInterval)
                        }
                      }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            $(row).remove();
                            $(listado_ubicacion());
                            
                        }
                      })
            }
        })
    });
    //EVENTO ACTUALIZAR
    $('#btn_act').click(function(){
        var cod_act=$('#txt_codm').val();
        var nom_act=$('#txt_ubim').val();
        $.ajax({
            url: "acciones/acciones_ubicacion.php",
            type: "POST",
            data: {
                accion: 'actualizar_ubicacion',
                id_act: cod_act,
                n_act: nom_act,
            },
            success: function(respuesta){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ubicacion Actualizada Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                $(listado_ubicacion());
                
            }
        })

    });
})