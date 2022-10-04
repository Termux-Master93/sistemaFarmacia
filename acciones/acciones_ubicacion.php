<?php
include_once '../conexion/conexion.php';
if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="listar_ubicacion"){
        $listado="call listar_ubicacion()";
        if(isset($_POST['buscar'])){
            $val_bus=$_POST['buscar'];
            $listado="call filtro_ubicacion('$val_bus')";
        }
        //pra listar el modificar por codigo
        if(isset($_POST['cod_ubicacion'])){
            $cod_mod=$_POST['cod_ubicacion'];
            $listado="call buscar_ubicacion($cod_mod)";
        }
        $rpt=$cnn->query($listado);
        $num_rows=mysqli_num_rows($rpt);
        if($num_rows>0){
            while($filas=mysqli_fetch_assoc($rpt)){
                $array_ubicacion[]=$filas;
            }
            echo json_encode($array_ubicacion,JSON_UNESCAPED_UNICODE);
        }else{
            echo 'nodata';
        }
    
    }
    //PROCESO AGREGAR
    if($accion=="agregar_ubicacion"){
        $ubi=$_POST['nom_ub'];
        $insertar=$cnn->query("call agregar_ubicacion('$ubi')");
        $num_fiu=mysqli_num_rows($insertar);
        if($num_fiu==0){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    //PROCESO ACTUALIZAR
    if($accion=="actualizar_ubicacion"){
        $id_act=$_POST['id_act'];
        $act_ubi=$_POST['n_act'];
        $cnn->query("call actualizar_ubicacion($id_act,'$act_ubi')");
        echo "actualizon exitosa";
    }
    if($accion=="eliminar_ubicacion"){
        $cod_el=$_POST['cod_eu'];
        $cnn->query("call eliminar_ubicacion($cod_el)");
        echo "eliminado";

    }

}//si existe una accion por el metodo d envio

?>