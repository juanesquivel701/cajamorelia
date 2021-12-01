<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tipo de Cuenta
      </h1>
      
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearTCuenta">Crear Tipo Cuenta</button>
        </div>
        <div class="box-body">
          
          <div class="table-responsive">
            <table id="example" class="display TB" style="width:100%">
              <thead>
              <tr>
                <th>ID Cuenta</th>
                <th>Nombre de Cuenta</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>

                <?php 

                  $verTCuenta = new TipoCuentaC();
                  $verTCuenta -> VerTipoCuentaC();

                  $item = null;
                  $valor = null;

                  $editarTCuenta = TipoCuentaC::ETipoCuentaC($item, $valor);

                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Modal Crear Tipo cuenta -->
<div class="modal fade" id="CrearTCuenta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content container-fluid">
      <button style="margin-top: 5px; font-size: 35px; color: red;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-header">
        <h3 class="modal-title" id="myLargeModalLabel"><b>Tipo Cuenta</b></h3>
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

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nombre de Cuenta</label>
                          <input type="text" class="form-control" placeholder="Nombre" name="nombre_cuentaN" autocomplete="off" required>
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

                  $crearTCuenta = new TipoCuentaC();
                  $crearTCuenta -> CrearTipoCuentaC();

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
<!-- Fin Modal Crear Tipo cuenta -->

  <?php 
    $borrarTCuenta = new TipoCuentaC();
    $borrarTCuenta -> BorrarTipoCuentaC();
   ?>

<!-- Modal Editar tipo cuenta -->
<div class="modal fade" id="EditarTCuenta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm">
    
    <div class="modal-content container-fluid">

      <button style="margin-top: 5px; font-size: 35px; color: red;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

      <div class="modal-header">
          <h3 class="modal-title" id="myLargeModalLabel"><b>Editar Tipo de Cuenta</b></h3>
      </div>

      <hr style="border-top: 1px solid blue; margin-top: 5px;">
      
      <form method="post" role="form" enctype="multipart/form-data">
        
        <div class="modal-body">
          
         <div class="box-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <input type="hidden" name="TCid" id="TCid">
                  <label>Nombre de Cuenta</label>
                  <input type="text" class="form-control" placeholder="Nombre" id="nombre_cuentaE" name="nombre_cuentaE" required>
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

        $actualizarTCuenta = new TipoCuentaC();
        $actualizarTCuenta -> ActualizarTipoCuentaC();

        ?>

      </form>

    </div>

  </div>
<!-- Fin Modal Editar tipo cuenta -->
