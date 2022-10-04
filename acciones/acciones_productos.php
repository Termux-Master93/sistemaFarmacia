<?php
include_once '../conexion/conexion.php';
if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="listar_producto"){
        $listado="CALL listar_productos();";
        if(isset($_POST['buscar'])){
            $val_fil=$_POST['buscar'];
            $listado="CALL filtro_productos('$val_fil')";
        }
        $rptp=$cnn->query($listado);
        $num_filpro=mysqli_num_rows($rptp);
        if($num_filpro>0){
            while($filas_pro=mysqli_fetch_assoc($rptp)){
                $array_productos[]=$filas_pro;
            }
            echo json_encode($array_productos,JSON_UNESCAPED_UNICODE);
        }else{
            echo "nodata";
        }   
    }
}//fin de las acciones

?>