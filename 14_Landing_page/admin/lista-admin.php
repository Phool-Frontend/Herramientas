<?php

include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'funciones/funciones.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Administradores</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!--xxx Main content -->
          
    <section class="content">
          
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            
                            
                                <div class="table-responsive">
                                  <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>Usuario</th>
                                          <th>Contraseña</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                    </thead>
                                    <tbody id="id_body">
                                    </tbody>
                                  </table>
                                  <div class="clearfix"></div>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                      <!---Add new-->
                      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">Add</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <input class="form-control " type="text"  id="nombre" placeholder="Nombre">
                              </div>
                              <div class="form-group">
                                <input class="form-control " type="text" id="usuario" placeholder="Usuario">
                              </div>
                              <div class="form-group">
                                <input class="form-control " type="text" id="apellido" placeholder="Apellido">
                              </div>
                              <div class="form-group">
                                <input class="form-control " type="text" id="password" placeholder="Contraseña">
                              </div>
                            </div>
                            <div class="modal-footer ">
                              <input type="hidden" id="id">
                              <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onClick="addUser()"><span class="glyphicon glyphicon-ok-sign"></span>Add</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>


                    

    </section>

    <!--xxx /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
        include_once 'templates/footer.php';
?>