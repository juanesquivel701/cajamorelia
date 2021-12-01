<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Clientes
      </h1>
      
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearCliente">Crear Clientes</button>
        </div>
        <div class="box-body">
          
          <div class="table-responsive">
            <table id="example" class="display TB" style="width:100%">
              <thead>
              <tr>
                <th>ID Cliente</th>
                <th>Nombre Completo</th>
                <th>RFC</th>
                <th>CURP</th>
                <th>Fecha de alta</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>

                <?php 

                  $verClientes = new ClientesC();
                  $verClientes -> VerClientesC();

                  $item = null;
                  $valor = null;

                  $editarCliente = ClientesC::EClienteC($item, $valor);

                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Modal Crear Cliente -->
<div class="modal fade" id="CrearCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container-fluid">
      <button style="margin-top: 5px; font-size: 35px; color: red;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-header">
        <h3 class="modal-title" id="myLargeModalLabel"><b>Cliente</b></h3>
      </div>
      <hr style="border-top: 1px solid green; margin-top: 5px;">
      <div class="modal-body">
       <div class="row container-fluid">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" placeholder="Nombre" name="nombreN" autocomplete="off" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Apellido Paterno</label>
                          <input type="text" class="form-control" placeholder="Apellido Paterno" name="apellido_paternoN" autocomplete="off" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Apellido Materno</label>
                          <input type="text" class="form-control" placeholder="Apellido Materno" name="apellido_maternoN" autocomplete="off">
                        </div>
                      </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>RFC</label>
                            <input type="text" class="form-control" placeholder="RFC" name="rfcN" autocomplete="off" required>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>CURP</label>
                            <input type="text" class="form-control" placeholder="CURP" name="curpN" autocomplete="off" required>
                          </div>
                        </div>
                        
                    </div>
                      
                  </div>

                  <div class="form-actions">
                    <div class="text-right">
                      <button type="submit" class="btn btn-success">Guardar</button>
                      <button type="reset" class="btn btn-primary">Limpiar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                    </div>
                  </div>

                  <?php 

                  $crearCliente = new ClientesC();
                  $crearCliente -> CrearClienteC();

                  ?>

                </form>
              </div>
            </div>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Crear Cliente -->

  <?php 
    $borrarCliente = new ClientesC();
    $borrarCliente -> BorrarClienteC();
   ?>

<!-- Modal Editar Cliente -->
<div class="modal fade" id="EditarCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    
    <div class="modal-content container-fluid">

      <button style="margin-top: 5px; font-size: 35px; color: red;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

      <div class="modal-header">
          <h3 class="modal-title" id="myLargeModalLabel"><b>Editar Cliente</b></h3>
      </div>

      <hr style="border-top: 1px solid blue; margin-top: 5px;">
      
      <form method="post" role="form" enctype="multipart/form-data">
        
        <div class="modal-body">
          
         <div class="box-body">

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <input type="hidden" name="Cid" id="Cid">
                  <label>Nombre</label>
                  <input type="text" class="form-control" placeholder="Nombre" id="nombreE" name="nombreE" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label>Apellido Paterno</label>
                  <input type="text" class="form-control" placeholder="Apellido Paterno" id="apellido_paternoE" name="apellido_paternoE">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label>Apellido Materno</label>
                  <input type="text" class="form-control" placeholder="Apellido Materno" id="apellido_maternoE" name="apellido_maternoE">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>RFC</label>
                  <input type="text" class="form-control" placeholder="RFC" id="rfcE" name="rfcE">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>CURP</label>
                  <input type="text" class="form-control" placeholder="CURP" id="curpE" name="curpE">
              </div>
            </div>

          </div>

         </div> 

        </div>


        <div class="modal-footer">
          
          <button type="submit" class="btn btn-success">Guardar</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>

        </div>

        <?php

        $actualizarCliente = new ClientesC;
        $actualizarCliente -> ActualizarClienteC();

        ?>

      </form>

    </div>

  </div>
<!-- Fin Modal Editar Cliente -->
