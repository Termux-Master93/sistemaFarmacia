<?php
include("../conexion/conexion.php");
if(isset($_POST['tdni'])){
        $dni=$_POST['tdni'];
        $nom=$_POST['tnom'];
        $ape=$_POST['tape'];
        $dir=$_POST['tdir'];
        $tel=$_POST['ttel'];
        $sue=$_POST['tsue']; 
        $img=$_FILES['timg'];
        $niv=$_POST['tniv'];
        $fec=$_POST['tfec'];
        $con=$_POST['tcon'];
        $est=$_POST['tstd'];

        
               
  
        echo $dni.' '.$nom.' '.$ape.' '.$dir.' '.$tel.' '.$sue.' '.$niv.' '.$fec.' '.$con.' estado: '.$est;
        if ($img["type"]=="image/png" OR $img["type"]=="image/jpg" OR $img["type"]=="image/jpeg"){
                $nom_incriptado="../imagenes/".md5($img["tmp_name"]).".png";
                $agregar="insert into usuarios (dni_usu,nom_usu,ape_usu,dir_usu,tel_usu,sue_usu,fot_usu,niv_usu,fecing_usu,con_usu,est_usu)
                values('$dni','$nom','$ape','$dir','$tel',$sue,'$nom_incriptado',$niv,'$fec','$con',$est)";
                if( mysqli_query($cnn,$agregar) or die("Error en agregar Usuario")){
                        move_uploaded_file($img["tmp_name"],$nom_incriptado);
                        echo "Agregado Correctamente";
                }else{
                        echo 0;
                }       
        }else{
                $agregar="insert into usuarios (dni_usu,nom_usu,ape_usu,dir_usu,tel_usu,sue_usu,fot_usu,niv_usu,fecing_usu,con_usu,est_usu)
                values('$dni','$nom','$ape','$dir','$tel',$sue,'--',$niv,'$fec','$con',$est)";
                if( mysqli_query($cnn,$agregar) or die("Error en agregar Usuario")){
                        echo "Agregado Correctamente";
                }

        }
 
}
?>