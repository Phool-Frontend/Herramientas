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
            <h1>Crear Administrador</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



    <div class="row">
              <div class="col-md-8">


      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear Administrador</h3>
        </div>
        <div class="card-body">
         
                    <div>
                          <div class="card-body">
                                <div class="form-group">
                                    <label for="usuario">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido">
                                </div>
                                <div class="form-group">
                                    <label for="password">Usuario: </label>
                                    <input type="text" class="form-control" id="usuario" placeholder="Ingrese su usuario">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña: </label>
                                    <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
                                    
                                </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a id="registrarNuevo"><button onClick="addUser()"  class="btn btn-primary">Añadir</button></a>
                          </div>
                      </div>
            
        </div>
        <!-- /.card-body -->
   
      </div>
      <!-- /.card -->
      </div>
          </div>







    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
        include_once 'templates/footer.php';
?>