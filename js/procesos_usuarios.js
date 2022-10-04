
$(document).ready(function (valor) {
    listar_usuarios();
    function listar_usuarios(dni){
        $.ajax({
            type: "POST",
            url: "acciones/acciones_usuarios.php",
            data:{accion:'listar_usuarios',dni_bus:dni},
            success: function (response) {
                console.log(response);
                if(response=="no_existe"){
                   $('#datos').html("No hay datos");
                }else{
                    var datos=JSON.parse(response);
                    var tabla='';
                
                    for(z in datos){
                        if(datos[z].nivel==1){var niv='Ayudante'}
                        if(datos[z].nivel==2){var niv='Administrador'}
                        if(datos[z].estado==1){
                            var esta='Activo';
                        }
                        if(datos[z].estado==2){
                            var esta='Inactivo';
                        }
        
                        tabla+='<tr>'+
                            '<td>'+datos[z].dni+'</td>'+
                            '<td>'+datos[z].nombre+'</td>'+
                            '<td>'+datos[z].apellidos+'</td>'+
                            '<td>'+datos[z].telefono+'</td>'+
                            '<td>'+datos[z].direccion+'</td>'+
                            '<td> <img src="imagenes/'+datos[z].foto+'" width=40 height=40></td>'+
                            '<td>'+'S/.'+datos[z].sueldo+'</td>'+
                            '<td>'+niv+'</td>'+
                            '<td>'+esta+'</td>'+
                            '<td>'+datos[z].fecha+'</td>'+
                            '<td>'+
                            '<td>'+
                            '<img id='+datos[z].dni+' src=img/pencil-fill.svg class=modificar width=25>'+
                            '</td>'+
                            '<td>'+
                            '<img id='+datos[z].dni+' src=img/trash.svg class=eliminar width=25>'+
                            '</td>'

                        '</tr>'
                    }
                    $('#datos').html(tabla);
    
            }
        }
        });
    }

    $('#tbus_usu').keyup(function (e) { 
        var dni_bus=$(this).val();
        listar_usuarios(dni_bus);
    });

 
//tratamos de agregar de nuevo
$('#agregar').click(insertar_usuario);
function insertar_usuario(e){
    e.preventDefault();
    if($('#tdni').val()==""){
        alert("Ingrese Dni Porfavor");
        $('#tdni').focus();
        return false;
    }else if($('#tnom').val()==""){
        alert("Ingrese Nombre Porfavor");
        $('#tnom').focus();
        return false;
    }else if($('#tape').val()==""){
        alert('Ingrese Apellidos Porfavor');
        $('#tape').focus();
        return false;
    }else if($('#tcon').val()==""){
        alert("Ingrese Contraseña Porfavor");
        $('#tcon').focus();
        return false;
    }else if($('#tniv').val().trim()==""){
        alert("Seleccione Rango de Usuario");
        $('#tniv').focus();
        return false;
    }else{
        var datos_usu= new FormData($('#enviar_datos')[0]);
        $.ajax({
            url: "acciones/cargar_img.php",
            type: "POST",
            data: datos_usu,
            contentType: false,
            processData: false,
            success: function(respuesta){
                console.log(respuesta);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Usuario Guardao Con Exito',
                    showConfirmButton: false,
                    timer: 1500
                    }) 
                listar_usuarios();
                clear_save();
                
            }
        }) 
    }
    

}
$(document).on('click','.eliminar',function(){
 var dni_eli=$(this).attr('id');
 var row = $(this).parents('tr');
 $.ajax({
     type: "POST",
     url: "acciones/acciones_usuarios.php",
     data:{accion:'eliminar',dni:dni_eli},
     success: function (response) {
        listar_usuarios();
         alert("Usuario eliminado con exito");
         $(row).remove();
         listar_usuarios();
     }
 });
});

$(document).on('click','.modificar',function(){
var dni_mod=$(this).attr('id');
$('#mod_act').modal('show');
    $.ajax({
        type: "POST",
        url: "acciones/acciones_usuarios.php",
        data:{accion:'buscar_datos',dni_mod:dni_mod},
        success: function (response) {
            var datos=JSON.parse(response);
            if(datos[0].nivel==1){
                $("#tniv_ac option[value="+ 1 +"]").attr("selected",true);
            }
            if(datos[0].nivel==2){
                $("#tniv_ac option[value="+ 2 +"]").attr("selected",true);
            }
            if(datos[0].estado==1){
                $("#tstd_ac option[value="+ 1 +"]").attr("selected",true);
            }
            if(datos[0].estado==2){
                $("#tstd_ac option[value="+ 2 +"]").attr("selected",true);
            }
           // console.log(datos[0].foto);
            $('#tdni_ac').val(datos[0].dni);
            $('#tnom_ac').val(datos[0].nombre);
            $('#tape_ac').val(datos[0].apellidos);
            $('#tdir_ac').val(datos[0].direccion);
            $('#ttel_ac').val(datos[0].telefono);
            $('#tsue_ac').val(datos[0].sueldo);
            $('#tcon_ac').val(datos[0].password); 
            $('#tfec_ac').val(datos[0].fecha);
            $('#nom_img').val(datos[0].foto);
            $('#tdni_ac').attr("disabled","disabled");
            var ruta_new=datos[0].foto.split('/');
            var ruta_ant=ruta_new[1]+'/'+ruta_new[2];
            $('#img_antigua').attr("src",ruta_ant);
            console.log(datos[0].estado);

        }
    });


});

$('#actualizar').click(actualizar_usuario);
function actualizar_usuario(e){
    e.preventDefault();
    var datos_act_usu= new FormData($('#enviar_actualizar')[0]);
    $.ajax({
        url: "acciones/actualizar_usuarios.php",
        type: "POST",
        data: datos_act_usu,
        contentType: false,
        processData: false,
        success: function(respuesta){
            console.log(respuesta);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Usuario Actualizado Con Exito',
                showConfirmButton: false,
                timer: 1500
                }) 
            listar_usuarios();
            $('#timg_ac').val("");
        }
    })
}
//Funciones de apoyo

function clear_save(){
    $('#tdni').val('');
    $('#tnom').val('');
    $('#tape').val('');
    $('#ttel').val('');
    $('#tdir').val('');
    $('#tstd').val(1).selected;
    $('#tcon').val('');
    $('#tsue').val(0.0);
    $('#timg').val('');
    $('#tniv').val('').selected;
}

});//cierre general