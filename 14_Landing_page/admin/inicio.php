<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>

			
<!--******************** la plantilla en si*************** -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			<h2>Bienvenido!!!</h2>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <h2 class="page-header">Resumen De Registros</h2>
 
      <div class="row">
                    <div class="col-lg-3 col-6">
                            algo de registros
                      <!-- small card -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>
                              
                          </h3>

                          <p>Total Registrados</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user"></i>
                        </div>
                        <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- Registrados -->      
                    <div class="col-lg-3 col-6">
                            algo de registros
                      <!-- small card -->
                      <div class="small-box bg-orange">
                        <div class="inner">
                          <h3>
                             
                          </h3>

                          <p>Total Pagados</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- Pagados -->
                    <div class="col-lg-3 col-6">
						algo de registros
                      <!-- small card -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3>
                              
                          </h3>

                          <p>Total Sin Pagar</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-times"></i>
                        </div>
                        <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- Sin Pagar -->
                    <div class="col-lg-3 col-6">
						algo de cosulta sql
                      <!-- small card -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>
                             
                          </h3>

                          <p>Ganancias totales</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- Sin Pagar -->
      </div><!--.row-->

      <h2 class="page-header">Regalos</h2>

      <div class="row">
            <div class="col-lg-3 col-6">
						Consulta sql
                          <!-- small card -->
                          <div class="small-box bg-teal">
                                  <div class="inner">
                                    <h3>
                                       
                                    </h3>

                                    <p>Pulseras</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-gift"></i>
                                  </div>
                                  <a href="lista-registrados.php" class="small-box-footer">
                                  Más Información <i class="fas fa-arrow-circle-right"></i>
                                  </a>
                          </div>
            </div><!-- Regalos -->
            <div class="col-lg-3 col-6">
						algo de registros sql
                          <!-- small card -->
                          <div class="small-box bg-maroon">
                                  <div class="inner">
                                    <h3>
                                        
                                    </h3>

                                    <p>Etiquetas</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-gift"></i>
                                  </div>
                                  <a href="lista-registrados.php" class="small-box-footer">
                                    Más Información <i class="fas fa-arrow-circle-right"></i>
                                  </a>
                          </div>
            </div><!-- Etiquetas -->
            <div class="col-lg-3 col-6">
						algo de registros consulta sql
                          <!-- small card -->
                          <div class="small-box bg-purple">
                                  <div class="inner">
                                    <h3>
                                        
                                    </h3>

                                    <p>Plumas</p>
                                  </div>
                                  <div class="icon">
                                    <i class="fas fa-gift"></i>
                                  </div>
                                  <a href="lista-registrados.php" class="small-box-footer">
                                    Más Información <i class="fas fa-arrow-circle-right"></i>
                                  </a>
                          </div>
            </div><!-- Plumas -->
      </div><!--.row-->    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--**************************************************************************************************-->

  

  <?php
        include_once 'templates/footer.php';        
  ?>

  
  