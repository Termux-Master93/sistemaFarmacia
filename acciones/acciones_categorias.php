<?php
include_once '../conexion/conexion.php';
if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="listar_categorias"){
        $listado="call listar_categorias()";
        if(isset($_POST['buscar'])){
            $val_bus=$_POST['buscar'];
            $listado="call filtro_categorias('$val_bus')";
        }
        //pra listar el modificar por codigo
        if(isset($_POST['cod_categoria'])){
            $cod_mod=$_POST['cod_categoria'];
            $listado="call buscar_categoria($cod_mod)";
        }
        $rpt=$cnn->query($listado);
        $num_rows=mysqli_num_rows($rpt);
        if($num_rows>0){
            while($filas=mysqli_fetch_assoc($rpt)){
                $array_categorias[]=$filas;
            }
            echo json_encode($array_categorias,JSON_UNESCAPED_UNICODE);
        }else{
            echo 'nodata';
        }
    
    }
    //PROCESO AGREGAR
    if($accion=="agregar_categorias"){
        $cat=$_POST['nom_cat'];
        $insertar=$cnn->query("call agregar_categorias('$cat')");
        $num_fic=mysqli_num_rows($insertar);
        if($num_fic==0){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    //PROCESO ACTUALIZAR
    if($accion=="actualizar_categoria"){
        $id_act=$_POST['id_act'];
        $act_cat=$_POST['n_act'];
        $cnn->query("call actualizar_categoria($id_act,'$act_cat')");
        echo "actualizon exitosa";
    }
    if($accion=="eliminar_categoria"){
        $cod_el=$_POST['cod_e'];
        $cnn->query("call eliminar_categoria($cod_el)");
        echo "eliminado";

    }

}//si existe una accion por el metodo d envio

?>