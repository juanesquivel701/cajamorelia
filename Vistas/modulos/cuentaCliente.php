<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cuenta de Clientes
      </h1>
      
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearCCliente">Crear Cuenta de Clientes</button>
        </div>
        <div class="box-body">
          
          <div class="table-responsive">
            <table id="example" class="display TB" style="width:100%">
              <thead>
              <tr>
                <th>ID Cliente Cuenta</th>
                <th>Saldo Actual</th>
                <th>Fecha Contratación</th>
                <th>Fecha Último Movimiento</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>

                <?php 

                  $verCClientes = new CuentaClientesC();
                  $verCClientes -> VerCuentaClientesC();

                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Modal Crear Cuenta Cliente -->
<div class="modal fade" id="CrearCCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container-fluid">
      <button style="margin-top: 5px; font-size: 35px; color: red;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-header">
        <h3 class="modal-title" id="myLargeModalLabel"><b>Cuenta Cliente</b></h3>
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

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>ID Cliente</label>
                            <select class="form-control" id="clienteN" name="clienteN" required="">
                              <option>Seleccionar</option>
                              <?php  
                                $verIdCliente = new CuentaClientesC();
                                $verIdCliente -> VerIdClientesC();
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>ID Cuenta</label>
                            <select class="form-control" id="cuentaN" name="cuentaN" required="">
                              <option>Seleccionar</option>
                              <?php  
                                $verIdCuenta = new CuentaClientesC();
                                $verIdCuenta -> VerIdCuentaC();
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Saldo Actual</label>
                          <input type="text" class="form-control" placeholder="Saldo Actual" name="saldo_actualN" autocomplete="off" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Fecha Contratación</label>
                          <input type="date" class="form-control" placeholder="Fecha Contratación" name="fecha_contratacionN" autocomplete="off" required>
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

                  $crearCCliente = new CuentaClientesC();
                  $crearCCliente -> CrearCuentaClientesC();

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
<!-- Fin Modal Crear Cuenta Cliente -->

  <?php 
    $borrarCCliente = new CuentaClientesC();
    $borrarCCliente -> BorrarCuentaClientesC();
   ?>