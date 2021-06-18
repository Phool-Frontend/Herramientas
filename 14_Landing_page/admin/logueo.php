<?php
        
        include_once 'funciones/funciones.php';      
        include_once 'templates/header.php';
        
?>

<body class="login-page" style="min-height: 512.391px;">

     
<!---******************************************************************** --->
<div class="login-box">
      <div class="login-logo">
        <a href="../index.php"><b>XRL8</b>Framework</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Iniciar Sesion</p>
     
<div>
                    <div class="input-group mb-3">
                          <input type="text" id="usuario" class="form-control" placeholder="Usuario">
                      <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                          <input type="password" id="password" class="form-control" placeholder="Password">
                          <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                      </div>
                    </div>
                    <div class="row-la-baticaga">
                        <div class="col-xs-12 ">
                       
                          <button id="entrarSistema" type="button" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                         

                        </div>
                        <!-- /.col -->
                    </div>
</div>

      
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>

 
 </body>


 
  <?php
        include_once 'templates/footer-login.php';
  ?>