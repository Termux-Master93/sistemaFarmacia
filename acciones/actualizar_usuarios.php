
<?php
include("../conexion/conexion.php");
if(isset($_POST['tdni_ac'])){
    $dni=$_POST['tdni_ac'];
    $nom=$_POST['tnom_ac'];
    $ape=$_POST['tape_ac'];
    $dir=$_POST['tdir_ac'];
    $tel=$_POST['ttel_ac'];
    $sue=$_POST['tsue_ac'];
    $img=$_FILES['timg_ac'];
    $niv=$_POST['tniv_ac'];
    $fec=$_POST['tfec_ac'];
    $con=$_POST['tcon_ac'];
    $est=$_POST['tstd_ac'];
}

if ($img["type"]=="image/png" OR $img["type"]=="image/jpg" OR $img["type"]=="image/jpeg"){  
    $listar="SELECT * FROM usuarios WHERE dni_usu='$dni'";
    $resp=mysqli_query($cnn,$listar) or die("error en listar para eliminar imagen");
    while($f=mysqli_fetch_array($resp)){
        unlink($f['fot_usu']);
    }
    $nom_incriptado_nuevo="../imagenes/".md5($img["tmp_name"]).".png";
     $actualizar="update usuarios set nom_usu='$nom',ape_usu='$ape',dir_usu='$dir',tel_usu='$tel',sue_usu=$sue,fot_usu='$nom_incriptado_nuevo',niv_usu=$niv,fecing_usu='$fec',con_usu='$con',est_usu=$est where dni_usu='$dni'";
            mysqli_query($cnn,$actualizar) or die("ERROR EN ACTUALIZAR");
            move_uploaded_file($img["tmp_name"],$nom_incriptado_nuevo);
            echo "Actualizado Correctamente";
        
}else{
    $actualizar="update usuarios set nom_usu='$nom',ape_usu='$ape',dir_usu='$dir',tel_usu='$tel',sue_usu=$sue,niv_usu=$niv,fecing_usu='$fec',con_usu='$con',est_usu=$est where dni_usu='$dni'";
           mysqli_query($cnn,$actualizar) or die("ERROR EN ACTUALIZAR");
           //move_uploaded_file($img["tmp_name"],$nom_incriptado_nuevo);
           echo "Actualizado Correctament2";

}

?>