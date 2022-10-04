<?php
  date_default_timezone_set("America/Lima");
	$fecha_ing=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK rel=StyleSheet href="css/productos.css" TYPE="text/css" MEDIA=screen>
    <LINK rel=StyleSheet href="css/usuarios.css" TYPE="text/css" MEDIA=screen>
    <title>Usuarios</title>

  <script>
    function name_image(valor){
      var actual=valor;
      var nuevo=actual.split('fakepath\\');
      var valor=nuevo[1];

    }
  </script>
  </head>
<body>
  
    <!-- Modal para agregar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregando Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="modal-body"  style = "height: 550px">
            <form acction="" method="POST" id="enviar_datos" enctype="multipart/form-data"> 
                <div class="row">
                  <div class="col-6">
                
                      DNI: <input type="text" class="form-control" aria-label="First name" name="tdni" id="tdni" autofocus><br>
                      Nombre: <input type="text" class="form-control" aria-label="First name"  name="tnom" id="tnom"><br>
                      Apellido: <input type="text" class="form-control" aria-label="First name" name="tape" id="tape"><br>
                      Telefono: <input type="text" class="form-control" aria-label="First name" name="ttel" id="ttel"><br>
                      Direccion: <input type="text" class="form-control" aria-label="First name" name="tdir" id="tdir"><br>
                      Dar de baja al Personal:
                      <select id="tstd" name="tstd" class="form-select" size="3" aria-label="size 3 select example">
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactivo</option>
                      </select>
                    </div>

                  <div class="col-6">
                    Contraseña: <input type="password" class="form-control" aria-label="First name" name="tcon" id="tcon"><br>
                    Sueldo: <input type="text" class="form-control" aria-label="First name" name="tsue" id="tsue" value="0.0"><br>
                    Fecha de Ingreso: <input type="date" class="form-control" aria-label="First name" name="tfec" id="tfec" value="<?php echo $fecha_ing;?>"><br>
                    Foto: <input name="timg" type="file"  id="timg" class="form-control"  aria-label="First name"  accept="image/*"><br>
                    Nivel: <select name="tniv" class="form-select"  id="tniv" aria-label="Floating label select example">
                        <option value="" selected>seleccione</option>
                        <option value="1" >Ayudante</option>
                        <option value="2">Administrador</option>
                    </select>
                  </div>
                </div>
            
          </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-primary" id="agregar" name="agregar">Agregar</button>
        
            </div>
        </form>
     </div>
     
  </div>
    
 </div>
</div>
</div>
<!-- Button trigger modal -->
<div class="container">
  		<div class="row mt-4">
  			<div class="col-4">
  				<h3><i class="fas fa-bars mx-1"></i>Listado de Usuarios</h3>	
  			</div>
    		
    		<div class="col-4">
				<div class="input-group mb-3">
				  <input type="text"  id="tbus_usu" class="form-control" placeholder="Ingrese..." aria-label="Recipient's username" aria-describedby="button-addon2">
				  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
				</div>
  			</div>
  			<div class="col-4">
  				<div class="position-relative">
  					<h1 id="boton" class="position-absolute start-50 mt-3 translate-middle tit_agr" data-bs-toggle="modal" data-bs-target="#exampleModal"><i  class="fas fa-user-plus"></i></h1>	
  				</div>
  			</div>
    	</div>

</div><!--cierre de parte del buscador-->
        

        <div class="row ms-5">
          <table class="table table-striped table-hover mt-4 ms-5" id="datos_tabla" border=1 >
            <thead class="border border-success">
              
                    <th class="color-cabecera">DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Foto</th>
                    <th>Sueldo</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Inicio</th>
                
            </thead>
            <tbody id="datos">
           
            </tbody>
            
          </table>
        </div>


<!-- Modal para actualizar -->
<div class="modal fade" id="mod_act" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form acction="" method="POST" id="enviar_actualizar" enctype="multipart/form-data">
        <div class="row">
        <div class="col-5">
                      DNI: <input type="text" class="form-control" aria-label="First name" id="tdni_ac" name="tdni_ac" autofocus><br>
                      Nombre: <input type="text" class="form-control" aria-label="First name" id="tnom_ac" name="tnom_ac"><br>
                      Apellido: <input type="text" class="form-control" aria-label="First name" id="tape_ac" name="tape_ac"><br>
                      Telefono: <input type="text" class="form-control" aria-label="First name" id="ttel_ac" name="ttel_ac"><br>
                      Direccion: <input type="text" class="form-control" aria-label="First name" id="tdir_ac" name="tdir_ac"><br>
                      Dar de baja al Personal:
                      <select id="tstd_ac" name="tstd_ac" class="form-select" size="3" aria-label="size 3 select example">
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactivo</option>
                      </select>
        </div>
        <div class="col-1">
        
        </div>
        <div class="col-5">
        Contraseña: <input type="password" class="form-control" aria-label="First name" id="tcon_ac" name="tcon_ac"><br>
                      Sueldo: <input type="text" class="form-control" aria-label="First name" id="tsue_ac" name="tsue_ac"><br>
                      Fecha de Ingreso: <input id="tfec_ac" name="tfec_ac" type="date" class="form-control" aria-label="First name"><br>
                        Foto: <input type="file" class="form-control" aria-label="First name" id="timg_ac" name="timg_ac" accept="image/*"><br>
                        <div id="respuesta">
                          <div class="row col-12">
                            <div class="col-5">
                                
                            </div> 
                            <div class="col-6">
                              <img  width=60 height=60 id="img_antigua">
                            </div>
                          </div>
                        </div><br>
                          
                      <div class="tniv_ac">  Nivel:
                        <select class="form-select" id="tniv_ac" name="tniv_ac" aria-label="Floating label select example">
                            <option value="1">Ayudante</option>
                            <option value="2">Administrador</option>
                        </select>
                     </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
        </div>
      </form>
      
    </div>

  </div>

</div>


    


    <script src="js/procesos_usuarios.js"></script>
    <script src="js/AjaxUpload.2.0.min.js"></script>
</body>
</html>