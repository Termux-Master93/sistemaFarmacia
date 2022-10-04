$(document).ready(function(){
    listar_clientes();
    $('#boton').click(function(){
        $('#tit_agre').show();
        $('#tit_act').hide();
        $('#btn_gua').show();
        $('#btn_act').hide();
        $('#txt_dni').removeAttr('disabled');
        errores();
        clear_form();
    })
    //evento cuando escriva en la caja de buscar 
    $('#txt_bus').keyup(function(){
        var buscador=$('#txt_bus').val();//cacturamos lo que ingresamos en la caja a buscar
        $(listar_clientes(buscador));//llamamos la funcion
    });
    //funcion listar con parametro y aprovechamos para la funcion buscar
    function listar_clientes(buscador){
        var list;
        $.ajax({
            url: 'acciones/procesos_clientes.php',
            type: 'post',
            data: {
                accion: "listar_clientes",
                buscar: buscador,
            },
            success: function(respuesta){
                if(respuesta=="no_data"){
                    alert("no hay considencia");
                }else{
                    var datos=JSON.parse(respuesta);
                    for(i in datos){
                        var dni_cli=datos[i].dni_cli;
                        list+=`<tr>
                                    <td>${dni_cli}</td>
                                    <td>${datos[i].nom_cli}</td>
                                    <td>${datos[i].ape_cli}</td>
                                    <td>${datos[i].tel_cli}</td>
                                    <td>${datos[i].dir_cli}</td>
                                    <td>${datos[i].ruc_cli}</td>
                                    <td><img class="modificar" id="${dni_cli}" data-bs-toggle="modal" data-bs-target="#agregar_cliente" src="img/pencil-fill.svg" alt=""></td>
                                    <td><img class="elimina" id="${dni_cli}" src="img/trash.svg" alt=""></td>
                               </tr>`;
                        $('#datos').html(list);
                    }
                }
                
            }
        });
    }//fin de funcion listar con buscar
    //funcion agregar
    $('#btn_gua').click(function(){
        //primeo enviamos el codigo a consultar 
        var dni_cli=$('#txt_dni').val();
        var nom_Cli=$('#txt_nom').val();
        var ape_cli=$('#txt_ape').val();
        var tel_cli=$('#txt_tel').val();
        var dir_cli=$('#txt_dir').val();
        var ruc_cli=$('#txt_ruc').val();
        if($('#txt_dni').val()==""){
            $('#error3').fadeOut();
            $('#error2').fadeOut();
            $('#error1').fadeIn();
            $('#txt_dni').focus();
            return false;
        }else if($('#txt_nom').val()==""){
            $('#error3').fadeOut();           
            $('#error1').fadeOut();
            $('#txt_nom').focus(); 
            $('#error2').fadeIn();
            return false;
        }else if($('#txt_ape').val()==""){
            $('#error1').fadeOut();
            $('#error2').fadeOut();
            $('#txt_ape').focus();
            $('#error3').fadeIn();
            return false;
        }else{
            $('#error3').fadeOut();
            $.ajax({
                url: "acciones/procesos_clientes.php",
                type: "post",
                data: {
                    dni_cl: dni_cli,
                    nom_cl: nom_Cli,
                    ape_cl: ape_cli,
                    tel_cl: tel_cli,
                    dir_cl: dir_cli,
                    ruc_cl: ruc_cli,
                    accion: "add_clients",
                },
                success: function(respuesta){ 
                    if(respuesta==1){
                        $('#error1').fadeOut(); 
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cliente Guardao Con Exito',
                        showConfirmButton: false,
                        timer: 1500
                        })   
                        clear_form();
                        errores();
                        $('#txt_dni').focus();
                    }else{
                        $('#error1').fadeIn();
                        $('#error1').text("Este Cliente ya existe");
                        $('#txt_dni').val('');
                        errores();
                        $('#error1').fadeIn();
                        $('#txt_dni').focus();
                    }
                    $(listar_clientes()); 
                    
                    
                }
            });            
        }


    });//fin de la funcion add_clients
     
    //funcion eliminar
    $(document).on('click','.elimina',function(){ //cuando en el documento  aga click en la clase eliminar
        var cod_cli=$(this).attr('id'); //cacturamos en la variable el atributo de la direccion id
        var row = $(this).parents('tr');
       $.ajax({
           url: "acciones/procesos_clientes.php",
           type: "post",
           data: { 
                cli_eli: cod_cli,
                accion: "delete"
           },
           success: function(respuesta){
               $(row).remove();
               $(listar_clientes());
               alert("eliminado con exito");
           }
       })   

    });
     //#list the date in the record#
     $(document).on('click','.modificar',function(){
        $('#tit_agre').hide();
        $('#tit_act').show();
        $('#btn_gua').hide();
        $('#btn_act').show();
        $('#txt_dni').attr('disabled','disabled');
        errores();
        var dni_c=$(this).attr('id');
        $.ajax({
            url: "acciones/procesos_clientes.php",
            type: "post",
            data: {
                accion: "listar_clientes",
                dni_mod: dni_c,
            },
            success: function(respuesta){
                var datos=JSON.parse(respuesta);
                console.log(datos);
                $('#txt_dni').val(datos[0].dni_cli);
                $('#txt_nom').val(datos[0].nom_cli);
                $('#txt_ape').val(datos[0].ape_cli);
                $('#txt_tel').val(datos[0].tel_cli);
                $('#txt_dir').val(datos[0].dir_cli);
                $('#txt_ruc').val(datos[0].ruc_cli);    
            }
        })
     })
     //#Update clients the record#
     $('#btn_act').click(function(){
        var dni_cli=$('#txt_dni').val();
        var nom_cli=$('#txt_nom').val();
        var ape_cli=$('#txt_ape').val();
        var tel_cli=$('#txt_tel').val();
        var dir_cli=$('#txt_dir').val();
        var ruc_cli=$('#txt_ruc').val();
        $.ajax({
            url: "acciones/procesos_clientes.php",
            type: "post",
            data: {
                accion: "update_clients",
                dni_c: dni_cli,
                nom_c: nom_cli,
                ape_c: ape_cli,
                tel_c: tel_cli,
                dir_c: dir_cli,
                ruc_c: ruc_cli,
            },
            success:function(respuesta){
                $(listar_clientes());
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cliente Actualizado Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
     });

     //FUNCIONES AUXILIARES DE APOLLO
     function clear_form(){
         $('#txt_dni').val("");
         $('#txt_nom').val("");
         $('#txt_ape').val("");
         $('#txt_tel').val("");
         $('#txt_dir').val("");
         $('#txt_ruc').val("");
     }
     function errores(){
        $('#error1').fadeOut();
        $('#error2').fadeOut();
        $('#error3').fadeOut();
     }
     


});