<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet"  href="css/main.css">
   <link rel="stylesheet"  href="css/bootstrap.min.css">
   <link rel="stylesheet"  href="css/css/all.min.css">
    <title>Hello, world!</title>
  </head>
  <?php
    session_start();
    $user=$_SESSION['usuarios']['dni_usu'];
    if(!isset($_SESSION['usuarios']['dni_usu'])){

      echo"No ha iniciado sesion";
      header("location:./sesion/acceso.php");
    }else{
      //$foto_per=$_SESSION['usuarios']['fot_usu'];
      
    }

  ?>
  <body>
   <header>
     
      <span class="mostrar"><i class="fas fa-bars"></i></span>
      <div class="container">
              <div class="col-4 position-absolute top-0 end-0 pe-5 pt-0">
                <div class="row">
                  <div class="col-6 mt-0 pt-0">
                  
                    <span><img id="imagen_usu" class="pb-3 mb-2 pt-0 col-3"  style="width: 4rem; height: 4.8rem;margin-left:-330px;"><span id="nom_user" class="fs-5"></span></span>     
                  </div>
                  <div class="col-2 pt-3">
                       <h5 id="cerrar_sesion" class="cerrar">Cerrar sesion</h5>
                  </div>
                    
                </div>

              </div>
          </div>
        </div>
      </div>
    </header> 
  <main >

     <div class="contenedor-menu ">
        <li id="ventas"><span class="icon1"><i class="fas fa-house-user"></i></span><h6 class="texto1">INICIO</h6></li>
          <ul class="sub_pro items_ven">
                <li id="caja">Caja</li>
            </ul>
        <li id="clientes"><span class="icon2"><i class="fas fa-child"></i></span><h6 class="texto2">CLIENTES</h6></li>
        <li id="mostrar_pro"><span class="icon3"><i class="fas fa-graduation-cap"></i></span><h6 class="texto3">PRODUCTOS</h6>

       </li>
        <ul class="sub_pro">
                <li id="productos">Listado</li>
                <li id="categorias">Categorias</li>
                <li id="unidades">Unidades</li>
                <li id="ubicacion">Ubicacion</li>
                <li id="presentacion">Presentacion</li>
            </ul>
        <li id="inicio"><span class="icon4"><i class="fas fa-sticky-note"></i></span><h6 class="texto4">VENTAS</h6></li>
        <li id="usuarios"><span class="icon5"><i class="fas fa-user-tie"></i></span><h6 class="texto5">USUARIOS</h6></li>
        <li id="proevedor"><span class="icon6"><i class="fas fa-chalkboard-teacher"></i></i></span><h6 class="texto5">PROEEVEDOR</h6></li>
     </div>
      <input type="text" id="dni_usu" value="<?php echo $user?>" style="display:none">
      <div id="contenido" class="crud">
        
      </div>
    </div>

   </main>

    
   <script  src="js/js/all.min.js"></script>
    <script  src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery.PrintArea.js"></script><!--libreria imprimir-->
    <script src="js/procesos_index.js"></script>
    <script src="js/main.js"></script>
   
  </body>
</html>