<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/main_clientes.css">
    <title>Ubicaciones</title>
  </head>
  <body>
  <div class="container">

<div class="row mt-4">
      <div class="col-4">
          <h3><i class="fas fa-bars mx-1"></i>Lista de Ubicaciones</h3>	
      </div>
    
    <div class="col-4">
  <div class="input-group mb-3">
    <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
    <input type="text" id="txt_bubi" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
  </div>
      </div>
      <div class="col-4">
        <!-- Button trigger modal -->
          <div class="position-relative">
              <h1 id="ingresar" class="position-absolute start-50 mt-3 translate-middle" data-bs-toggle="modal" data-bs-target="#agregar_ubicacion"><img style="width: 60px" src="img/add.png"></h1>	
          </div>
      </div>
</div>
</div><!--cierre del buscar-->
<div class="container">
<table class="table table-striped table-hover" border=1 >
<thead class="border border-success">
  <th class="color-cabecera">Ubicaciones</th>
  <th>ACCIONES</th>

</thead>
<tbody id="datos">

</tbody>
</table>
</div>



<!-- Modal -->
<div class="modal fade" id="agregar_ubicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Ubicaciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-lg">
          <span class="input-group-text" id="inputGroup-sizing-lg">Ubicacion</span>
          <input type="text" id="txt_ubi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="btn_agre" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--modal modificar-->
<div class="modal fade" id="modificar_ubicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-lg" style="display:  none;">
          <span class="input-group-text" id="inputGroup-sizing-lg">Ubicacion</span>
          <input type="text" id="txt_codm" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg">
          <span class="input-group-text" id="inputGroup-sizing-lg">Ubicacion</span>
          <input type="text" id="txt_ubim" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="btn_act" type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
  <script src="js/procesos_ubicacion.js"></script>
  </body>
</html>