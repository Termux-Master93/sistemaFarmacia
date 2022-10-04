$(document).ready(function(){
    $(listado_categorias());
    $('#txt_bcat').keyup(function(){
        var bus_cat=$('#txt_bcat').val();
        $(listado_categorias(bus_cat));
    });
    function listado_categorias(bus_cat){
        var lista_cat;
        $.ajax({
            url: 'acciones/acciones_categorias.php',
            type: "POST",
            data: {
                accion: 'listar_categorias',
                buscar: bus_cat,
            },
            success: function(respuesta){
                if(respuesta=="nodata"){
                    lista_cat="No hay categorias registradas";
    
                }else{
                    var datos=JSON.parse(respuesta);
                    for(i in datos){
                        var cod_cat=datos[i].cod_cat;
                        lista_cat+=`<tr>
                                    <td>${datos[i].nom_cat}</td>
                                    <td><img class="modificar_cat" id="${cod_cat}" data-bs-toggle="modal" data-bs-target="#modificar_categoria" src="img/pencil-fill.svg" alt=""></td>
									<td><img class="elimina_cat" id="${cod_cat}" src="img/trash.svg" alt=""></td>
                                  </tr>`
                    }
                    $('#datos').html(lista_cat);

                }
                
            }
                
        }) //fin de ajax
    }//fin de funcion listar

    //EVENTO GUARDAR
    $('#btn_agre').click(function(){
       var unidad=$('#txt_cat').val();
        //var estado=$("#txt_est").prop("selectedIndex",1);
        if($('#txt_cat').val().trim()==""){
            alert("Ingrese Categoria Porfavor");
            $('#txt_cat').focus();
        }else{
            $.ajax({
                url: "acciones/acciones_categorias.php",
                type: "POST",
                data:{
                    accion: "agregar_categorias",
                    nom_cat: unidad,
                },
                success: function(respuesta){
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Categoria Guardao Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $(listado_categorias());
                    $('#txt_cat').val("");
                    $('#txt_cat').focus();
                    return true;

                }
            })            
        }


    })

    //EVENTO MODIFICAR
    $(document).on('click','.modificar_cat',function(e){
        ;
        var cod_modc=$(this).attr('id');
        $.ajax({
            url: 'acciones/acciones_categorias.php',
            type: 'POST',
            data: {
                accion: 'listar_categorias',
                cod_categoria: cod_modc,
            },
            success:function(respuesta){
                var datos_cat=JSON.parse(respuesta);
                $('#txt_codm').val(datos_cat[0].cod_cat);
                $('#txt_catm').val(datos_cat[0].nom_cat);
            }
        });
    })
    //EVENTO ELIMINAR
    $(document).on('click','.elimina_cat',function(e){
        var cod_elic=$(this).attr('id');
        var row = $(this).parents('tr');
        $.ajax({
            url: "acciones/acciones_categorias.php",
            type: "POST",
            data: {
                accion: 'eliminar_categoria',
                cod_e: cod_elic,
            },
            success: function(respuesta){
                    Swal.fire({
                        title: 'Estamos Eliminando Categoria!',
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
                            $(listado_categorias());
                            
                        }
                      })

                    
            }
        })
    });
    //EVENTO ACTUALIZAR
    $('#btn_act').click(function(){
        var cod_act=$('#txt_codm').val();
        var nom_act=$('#txt_catm').val();
        $.ajax({
            url: "acciones/acciones_categorias.php",
            type: "POST",
            data: {
                accion: 'actualizar_categoria',
                id_act: cod_act,
                n_act: nom_act,
            },
            success: function(respuesta){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Categoria Actualizada Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                $(listado_categorias());
                
            }
        })

    });
})