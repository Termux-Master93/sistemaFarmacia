<?php
include_once '../conexion/conexion.php';
if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="listar_caja"){
        $listado="call listar_cajas()";
        if(isset($_POST['fil'])){
            $val_bus=$_POST['fil'];
            $listado="call filtro_cajas('$val_bus')";
        }
        //pra listar el modificar por codigo*/

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
    
    }//fin de listado

        //PROCESO AGREGAR
    if($accion=="agregar_cajas"){
        $f_ape=$_POST['fec_ape'];
        $sal=$_POST['saldo'];
        $estado=$_POST['est_d'];
        $user=$_POST['dni_usu'];
        $nulo=null;
        $insertar=$cnn->query("call agregar_cajas('$f_ape',$sal,$user,$estado)");
        $num_fic=mysqli_num_rows($insertar);
        if($num_fic==0){
            echo 1;
        }else{
            echo 0;
        }
            
    }
    

}//si existe una accion por el metodo d envio

?>