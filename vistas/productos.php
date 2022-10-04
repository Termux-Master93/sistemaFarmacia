<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Productos</title>
  </head>
  <body>
    <div class="container">

        <div class="row mt-4">
  			<div class="col-4">
  				<h3><i class="fas fa-bars mx-1"></i>Lista de Clientes</h3>	
  			</div>
    		
    		<div class="col-4">
          <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
          </div>
  			</div>
  			<div class="col-4">
  				<div class="position-relative">
  					<h1 id="boton" class="position-absolute start-50 mt-3 translate-middle" data-bs-toggle="modal" data-bs-target="#agregar_producto"><i  class="fas fa-user-plus"></i></h1>	
  				</div>
  			</div>
    	</div>
    </div><!--cierre del buscar-->
    <div class="container ">
      <table class="table table-striped table-hover" border=1 >
        <thead class="border border-success ">
          <th class="color-cabecera">CODIGO</th>
          <th>PRODUCTO</th>
          <th>MARCA</th>
          <th>DESCRIPCIÓN</th>
          <th>Lote</th>
          <th>COMPOSICION</th>
          <th>FABRICACION</th>
          <th>VENCIMIENTO</th>
          <th>CANJE</th>
          <th>UBICACION</th>
          <th>CATEGORIA</th>
          <th>STOCK</th>
          <th>STOCK MINIMO</th>
          <th>STOCK MAXIMO</th>
          <th>ACCIONES</th>
        </thead>
  
        <tbody id="datos_p">
 
        </tbody>
      </table>
    </div>




<!-- Modal -->
<div class="modal fade" id="agregar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
              <div class="mb-3">
                <label for="txt_cod" class="form-label">Codigo</label>
                <input type="text" class="form-control" id="txt_cod" placeholder="Ingrese Id">
              </div>
            
            <div class="mb-3">
              <label for="txt_pro" class="form-label">Medicamento</label>
              <input type="text" class="form-control" id="txt_pro" placeholder="Ingrese..!">
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Ingrese..!" id="txt_des" style="height: 100px"></textarea>
              <label for="txt_des">Descripcion</label>
            </div>
            <div class="mb-3">
              <label for="txt_mar" class="form-label">Marca</label>
              <input type="text" class="form-control" id="txt_mar" placeholder="Ingrese..!">
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Ingrese..!" id="txt_com" style="height: 100px"></textarea>
              <label for="txt_com">Composición</label>
            </div>
            
          </div><!--cierre primer columna-->

          <div class="col-4">
              <label for="cod_pro" class="col-form-label">Categoria:</label>
              <div class="input-group">	  
      					<input class="form-control form-control-lg" list="buscar_cat" id="cod_cat" placeholder="Busque..!">
      					<datalist id="buscar_cat">
      					</datalist>
      				  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
      				</div>

              <label for="cod_pro" class="col-form-label">Unidad:</label>
              <div class="input-group">	  
      					<input class="form-control form-control-lg" list="buscar_uni" id="cod_uni" placeholder="Busque..!">
      					<datalist id="buscar_uni">
      					</datalist>
      				  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
      				</div>
              <div class="mb-3">
                <label for="txt_lot" class="form-label">Lote</label>
               <input type="text" class="form-control" id="txt_lot" placeholder="Ingrese..!">
              </div>
              <div class="mb-3">
               <label for="txt_stc" class="form-label">Stock</label>
                <input type="number" class="form-control" id="txt_stc" placeholder="Ingrese..!">
              </div>
              <div class="mb-3">
               <label for="txt_smin" class="form-label">Stock Minimo</label>
                <input type="number" class="form-control" id="txt_smin" placeholder="Ingrese..!">
              </div>
              <div class="mb-3">
               <label for="txt_stm" class="form-label">Stock Maximo</label>
                <input type="number" class="form-control" id="txt_stm" placeholder="Ingrese..!">
              </div>
          </div>

          <div class="col-4">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </div>

        </div>

        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="js/procesos_productos.js"></script>
    <script src="js/AjaxUpload.2.0.min.js"></script>
  </body>
</html>