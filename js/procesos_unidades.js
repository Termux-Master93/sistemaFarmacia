$(document).ready(function(){
    $(listado_unidades());
    $('#txt_buni').keyup(function(){
        var bus_uni=$('#txt_buni').val();
        $(listado_unidades(bus_uni));
    });
    function listado_unidades(bus_uni){
        var lista_uni;
        $.ajax({
            url: 'acciones/acciones_unidades.php',
            type: "POST",
            data: {
                accion: 'listar_unidades',
                buscar: bus_uni,
            },
            success: function(respuesta){
                if(respuesta=="nodata"){
                    lista_uni="No hay unidades registradas";
    
                }else{
                    var datos=JSON.parse(respuesta);
                    for(i in datos){
                        var cod_uni=datos[i].cod_uni;
                        var estado=datos[i].esta;
                        if(estado==1){
                            estado_mostrar="ACTIVO";
                        }else{
                            estado_mostrar="INACTIVO";
                        }
                        lista_uni+=`<tr>
                                    <td>${datos[i].nombre}</td>
                                    <td>${estado_mostrar}</td>
                                    <td><img class="modificar_uni" id="${cod_uni}" data-bs-toggle="modal" data-bs-target="#modificar_unidad" src="img/pencil-fill.svg" alt=""></td>
									<td><img class="elimina_uni" id="${cod_uni}" src="img/trash.svg" alt=""></td>
                                  </tr>`
                    }
                    $('#datos').html(lista_uni);

                }
                
            }
                
        }) //fin de ajax
    }//fin de funcion listar

    //EVENTO GUARDAR
    $('#btn_agre').click(function(){
       var unidad=$('#txt_uni').val();
       var estado=$('#txt_est').val();
        //var estado=$("#txt_est").prop("selectedIndex",1);
        if($('#txt_uni').val().trim()==""){
            alert("Ingrese Unidad Porfavor");
            $('#txt_uni').focus();
        }else{
            $.ajax({
                url: "acciones/acciones_unidades.php",
                type: "POST",
                data:{
                    accion: "agregar_unidad",
                    nom_uni: unidad,
                    est: estado,
                },
                success: function(respuesta){
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Unidad Guardao Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $(listado_unidades());
                    $('#txt_uni').val("");
                    $('#txt_uni').focus();
                    return true;

                }
            })            
        }


    })

    //EVENTO MODIFICAR
    $(document).on('click','.modificar_uni',function(e){
        ;
        var cod_modu=$(this).attr('id');
        $.ajax({
            url: 'acciones/acciones_unidades.php',
            type: 'POST',
            data: {
                accion: 'listar_unidades',
                cod_unidad: cod_modu,
            },
            success:function(respuesta){
                var datos_uni=JSON.parse(respuesta);
                $('#txt_codm').val(datos_uni[0].cod_uni);
                $('#txt_unim').val(datos_uni[0].nombre);
                if(datos_uni[0].esta==1){
                    $("#txt_estm option[value="+1+"]").attr("selected",true);
                }
                if(datos_uni[0].esta==2){
                    $("#txt_estm option[value="+2+"]").attr("selected",true); 
                }
            }
        });
    })
    //EVENTO ELIMINAR
    $(document).on('click','.elimina_uni',function(e){
        var cod_eliu=$(this).attr('id');
        var fila = $(this).parents('tr');
        $.ajax({
            url: "acciones/acciones_unidades.php",
            type: "POST",
            data: {
                accion: 'eliminar_unidad',
                cod_e: cod_eliu,
            },
            success: function(respuesta){
                    Swal.fire({
                        title: 'Estamos Eliminando Proevedor!',
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
                            $(fila).remove();
                            $(listado_unidades());
                            
                        }
                      })

                    
            }
        })
    });
    //EVENTO ACTUALIZAR
    $('#btn_act').click(function(){
        var cod_act=$('#txt_codm').val();
        var nom_act=$('#txt_unim').val();
        var est_act=$('#txt_estm').val();
        $.ajax({
            url: "acciones/acciones_unidades.php",
            type: "POST",
            data: {
                accion: 'actualizar_unidad',
                id_act: cod_act,
                n_act: nom_act,
                esta_act: est_act,
            },
            success: function(respuesta){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Unidad Actualizada Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                $(listado_unidades());
                
            }
        })

    });
})