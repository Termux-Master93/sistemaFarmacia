<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/main_clientes.css">
    <title>Caja</title>
  </head>
  <body>
  <div class="container">

<div class="row mt-4">
      <div class="col-4">
          <h3><i class="fas fa-bars mx-1"></i>Apertura de caja</h3>	
      </div>
    
    <div class="col-4">
  <div class="input-group mb-3">
    <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
    <input type="text" id="txt_bcaj" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
  </div>
      </div>
      <div class="col-4">
        <!-- Button trigger modal -->
          <div class="position-relative">
              <h1 id="ingresar" class="position-absolute start-50 mt-3 translate-middle" data-bs-toggle="modal" data-bs-target="#agregar_categoria"><img style="width: 60px" src="img/add.png"></h1>	
          </div>
      </div>
</div>
</div><!--cierre del buscar-->
<div class="container">
<table class="table table-striped table-hover" border=1 >
<thead class="border border-success">
  <th class="color-cabecera">Codigo</th>
  <th class="color-cabecera">Apertura</th>
  <th class="color-cabecera">Cierre</th>
  <th class="color-cabecera">Monto Apertura</th>
  <th class="color-cabecera">Monto Cierre</th>
  <th class="color-cabecera">gastos</th>
  <th class="color-cabecera">Usuario</th>
  <th class="color-cabecera">estado</th>
  <th class="color-cabecera">Nota</th>
  <th>ACCIONES</th>

</thead>
<tbody id="datos" onload="reloj()">

</tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="agregar_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aperturar Caja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="container">
            <p id="dni_caj" style="display:none">dni</p>
          <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">fecha</span>
                <input type="text" id="txt_fape" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
             </div>
             <div class="input-group input-group-lg mt-4">
                <span class="input-group-text" id="inputGroup-sizing-lg">Usuario</span>
                <input type="text" id="txt_usu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
             </div>
          
              <div class="input-group input-group-lg mt-4">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Saldo</span>
                  <input type="text" id="txt_sal" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
              </div>

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
<div class="modal fade" id="modificar_caja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-lg" style="display:  none;">
          <span class="input-group-text" id="inputGroup-sizing-lg">Codigo</span>
          <input type="text" id="txt_codm" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg">
          <span class="input-group-text" id="inputGroup-sizing-lg">Apertura</span>
          <input type="text" id="txt_apem" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg">
          <span class="input-group-text" id="inputGroup-sizing-lg">Cierre</span>
          <input type="text" name="reloj" id="txt_ciem" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="btn_act" type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
  <script src="js/procesos_caja.js"></script>
  </body>
</html>