$(document).ready(function () {
    var usu=$('#dni_usu').val();
    console.log(usu);
    $.ajax({
        url: 'acciones/proceso_index.php',
        type: "POST",
        data: {
            accion: 'lista_usuario',
            val_user: usu,
        },
        success: function(respuesta){   
            var datos=JSON.parse(respuesta);
            var usuario=datos[0].datos;
            var img_u=datos[0].fot_usu;
            $('#imagen_usu').attr("src",`imagenes/${img_u}`);

            $('#nom_user').html(usuario);
        }
    }); 
     $('#ventas').click(function (e) { 
        $('#contenido').load("vistas/ventas.php");
        
    });
    $('#caja').click(function (e) { 
        $('#contenido').load("vistas/caja.php");
    });
    $('#clientes').click(function (e) { 
        $('#contenido').load("vistas/clientes.php");
    });

    $('#productos').click(function (e) { 
        $('#contenido').load("vistas/productos.php")       
    });
    $('#categorias').click(function (e) { 
        $('#contenido').load("vistas/categorias.php")       
    });
    $('#unidades').click(function (e) { 
        $('#contenido').load("vistas/unidades.php")       
    });
    $('#ubicacion').click(function (e) { 
        $('#contenido').load("vistas/ubicacion.php")       
    });

    $('#x2').click(function(e){
        $('#contenido').load("vistas/compras.php");
    });
    $('#clientes').click(function (e) { 
        $('#contenido').load("vistas/clientes.php");
        
    });
    $('#usuarios').click(function (e) { 
        $('#contenido').load("vistas/usuarios.php");
        
    });
    $('#proevedor').click(function (e) { 
        $('#contenido').load("vistas/proeevedores.php");
    });
    $('#cerrar_sesion').click(function (e) { 
        $.ajax({
            type: "POST",
            url: "sesion/cerrar-secion.php",
            data:{accion:'cerrar'},
            success: function (response) {
                $(window).attr('location','sesion/acceso.php')
              //  window.location.href="location:sesion/acceso.php";
            }
        });
    });
});
