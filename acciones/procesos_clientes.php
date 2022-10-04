<?php
include("../conexion/conexion.php");
    if($_POST['accion']){
        $accion=$_POST['accion'];//recojemos la accion de js
        if($accion=="listar_clientes"){ //si es igual lo que resivimos  en la accion
            $listar="SELECT * FROM cliente ORDER BY ape_cli";
            if(isset($_POST['buscar'])){
                $buscar=$_POST['buscar'];
                $listar="SELECT * FROM cliente WHERE dni_cli LIKE '%$buscar%' OR nom_cli LIKE '%$buscar%'";
            }
            if(isset($_POST['dni_mod'])){
                $dni_bus=$_POST['dni_mod'];
                $listar="SELECT * FROM cliente WHERE dni_cli='$dni_bus'";
            }
            $rpta=$cnn->query($listar);
            $num_rows=mysqli_num_rows($rpta);
            if($num_rows > 0){
                while($fila=mysqli_fetch_array($rpta)){
                    $list_client[]=$fila;
                }
                echo json_encode($list_client,JSON_UNESCAPED_UNICODE);            
            }else{
                echo "no_data";
            }           
        }//fin de proceso listado 
        /** PROCESO AGREGAR **/  
        if($accion=="add_clients"){
            if(isset($_POST['dni_cl'])){
                $dni=$_POST['dni_cl'];
                $nom=$_POST['nom_cl'];
                $ape=$_POST['ape_cl'];
                $tel=$_POST['tel_cl'];
                $dir=$_POST['dir_cl'];
                $ruc=$_POST['ruc_cl'];
                $consult_clients="SELECT * FROM cliente WHERE dni_cli='$dni'";
                $rpts=$cnn->query($consult_clients);
                $row=mysqli_num_rows($rpts);
                if($row==0){
                    $add_record="INSERT INTO cliente VALUES('$dni','$nom','$ape','$tel','$dir','$ruc')";
                    $cnn->query($add_record);
                    echo 1;
                }else{
                    echo 0;
                }
            }

        }//fin de proceso Add 
        //# processes the updates#
        if($accion=="update_clients"){
            if(isset($_POST['dni_c'])){
                $dni_act=$_POST['dni_c'];
                $nom_act=$_POST['nom_c'];
                $ape_act=$_POST['ape_c'];
                $tel_act=$_POST['tel_c'];
                $dir_act=$_POST['dir_c'];
                $ruc_act=$_POST['ruc_c'];

                $update="UPDATE cliente SET dni_cli='$dni_act',nom_cli='$nom_act',ape_cli='$ape_act',tel_cli='$tel_act',dir_cli='$dir_act',ruc_cli='$ruc_act' WHERE dni_cli='$dni_act'";
                $cnn->query($update);
                echo "actualizado";
            }
        }
      
        /** PROCESO ELIMINAR **/
        if($accion=="delete"){
            if(isset($_POST['cli_eli'])){
                $id_cli=$_POST['cli_eli'];
                $delete="DELETE FROM cliente WHERE dni_cli='$id_cli'";
                $cnn->query($delete);
                echo $id_cli;   
            }
           
        }//fin de proceso DElete 


    }
?>