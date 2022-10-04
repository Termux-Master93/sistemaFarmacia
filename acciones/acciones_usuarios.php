<?php
include("../conexion/conexion.php");
$accion=$_POST['accion'];

if($accion=='listar_usuarios'){
    $listar="select * from usuarios order by nom_usu";
    if(isset($_POST['dni_bus'])){
        $dni=$_POST['dni_bus'];
        $listar="select * from usuarios where dni_usu like '%$dni%' order by nom_usu";
    }
    $res=mysqli_query($cnn,$listar) or die("Error en listar");
    $res_usu=mysqli_num_rows($res);
    if($res_usu>0){
        while($f=mysqli_fetch_array($res)){
            $usuarios[]=array(
                'dni'=>$f['dni_usu'],
                'nombre'=>$f['nom_usu'],
                'apellidos'=>$f['ape_usu'],
                'direccion'=>$f['dir_usu'],
                'telefono'=>$f['tel_usu'],
                'sueldo'=>$f['sue_usu'],
                'foto'=>$f['fot_usu'],
                'nivel'=>$f['niv_usu'],
                'fecha'=>$f['fecing_usu'],
                'estado'=>$f['est_usu'],
            );
        }
        echo json_encode($usuarios);
    }else{
        echo "no_existe";
    }
    
}



if($accion=='eliminar'){
    $dni_eli=$_POST['dni'];
    $listar="SELECT * FROM usuarios WHERE dni_usu='$dni_eli'";
    $resp=mysqli_query($cnn,$listar) or die("error en listar para eliminar imagen");
    while($f=mysqli_fetch_array($resp)){
        unlink($f['fot_usu']);
    }
    $eliminar="delete from usuarios where dni_usu='$dni_eli'";
    mysqli_query($cnn,$eliminar) or die("Error en eliminar");
    
    echo "Eliminado Correctamente";
}

if($accion=='buscar_datos'){
    $dni_mod=$_POST['dni_mod'];
    $consulta="select * from usuarios where dni_usu='$dni_mod'";
    $res=mysqli_query($cnn,$consulta) or die("Error en buscar");
    while($f=mysqli_fetch_array($res)){
        $usuarios[]=array(
            'dni'=>$f['dni_usu'],
            'nombre'=>$f['nom_usu'],
            'apellidos'=>$f['ape_usu'],
            'direccion'=>$f['dir_usu'],
            'telefono'=>$f['tel_usu'],
            'sueldo'=>$f['sue_usu'],
            'foto'=>$f['fot_usu'],
            'nivel'=>$f['niv_usu'],
            'fecha'=>$f['fecing_usu'],
            'password'=>$f['con_usu'],
            'estado'=>$f['est_usu'],
        );
        echo json_encode($usuarios);
    }
}


?>