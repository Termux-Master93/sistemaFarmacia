$(document).ready(function(){
    $(listar_productos());
    //funcion listar
    $('#txt_bpro').keyup(function(){
        var bus_pro=$('#txt_bpro').val();
        $(listar_productos(bus_pro));
    });
    function listar_productos(bus_pro){
        var lista_pro;
        $.ajax({
            url: "acciones/acciones_productos.php",
            type: "POST",
            data: {
                accion: 'listar_producto',
                buscar: bus_pro,
            },
            success: function(respuesta){
                if(respuesta=="nodata"){
                    lista_pro="Inaxistente";
                }else{
                    var datosp=JSON.parse(respuesta);
                    console.log(datosp);
                    for(i in datosp){
                        var cod_p=datosp[i].cod_pro;
                        lista_pro+=`<tr>
                                        <td>${cod_p}</td>
                                        <td>${datosp[i].nom_pro}</td>
                                        <td>${datosp[i].mar_pro}</td>
                                        <td>${datosp[i].des_pro}</td>
                                        <td>${datosp[i].lote}</td>
                                        <td>${datosp[i].composicion}</td>
                                        <td>${datosp[i].fec_fab}</td>
                                        <td>${datosp[i].fecha_venc}</td>
                                        <td>${datosp[i].fecha_canje}</td>
                                        <td>${datosp[i].nom_ubi}</td>
                                        <td>${datosp[i].nom_cat}</td>
                                        <td>${datosp[i].sto_pro}</td>
                                        <td>${datosp[i].stock_min}</td>
                                        <td>${datosp[i].stock_max}</td>
                                        <td><img class="modificar_pro" id="${cod_p}" data-bs-toggle="modal" data-bs-target="#modificar_unidad" src="img/pencil-fill.svg" alt=""></td>
                                        <td><img class="elimina_pro" id="${cod_p}" src="img/trash.svg" alt=""></td>
                                        <td><img class="presentacion" id="${cod_p}" src="img/prese.webp" alt="" style="width: 40px; height:40px"></td>

                                    </tr>`
                                    
                    }
                    $('#datos_p').html(lista_pro);
                    
                }
            }
        });
    };



})//cierre de dom