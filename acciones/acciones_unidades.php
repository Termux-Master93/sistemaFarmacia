<?php
include_once '../conexion/conexion.php';
if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="listar_unidades"){
        $listado="call listado_unidades(@codigo)";
        if(isset($_POST['buscar'])){
            $val_bus=$_POST['buscar'];
            $listado="call filtro_unidades('$val_bus')";
        }
        //pra listar el modificar por codigo
        if(isset($_POST['cod_unidad'])){
            $cod_mod=$_POST['cod_unidad'];
            $listado="call buscar_unidad('$cod_mod')";
        }
        $rpt=$cnn->query($listado);
        $num_rows=mysqli_num_rows($rpt);
        if($num_rows>0){
            while($filas=mysqli_fetch_assoc($rpt)){
                $array_unidades[]=$filas;
            }
            echo json_encode($array_unidades,JSON_UNESCAPED_UNICODE);
        }else{
            echo 'nodata';
        }
    
    }
    //PROCESO AGREGAR
    if($accion=="agregar_unidad"){
        $uni=$_POST['nom_uni'];
        $est=$_POST['est'];
        $insertar=$cnn->query("call agregar_unidad('$uni',$est)");
        $num_fiu=mysqli_num_rows($insertar);
        if($num_fiu==0){
            echo 1;
        }else{
            echo 0;
        }
        
        
    }
    //PROCESO ACTUALIZAR
    if($accion=="actualizar_unidad"){
        $id_act=$_POST['id_act'];
        $act_uni=$_POST['n_act'];
        $esta_act=$_POST['esta_act'];
        $cnn->query("call actualizar_unidad($id_act,'$act_uni',$esta_act)");
        echo "actualizon exitosa";
    }
    if($accion=="eliminar_unidad"){
        $cod_el=$_POST['cod_e'];
        $cnn->query("call eliminar_unidad($cod_el)");
        echo "eliminado";

    }

}//si existe una accion por el metodo d envio

?>