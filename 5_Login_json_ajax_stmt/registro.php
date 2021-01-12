<?php 

		require_once "templates/header.php"; 

?>

<fieldset class="frm_general">
  					<legend>REGISTRO:</legend>
					<input type="text" id="nombre" placeholder="Ingrese su nombre" >		
					<input type="text" id="apellido" placeholder="Ingrese su apellido" >		
					<input type="text" id="usuario" placeholder="Ingrese su usuario" >
					<input type="text" id="password" placeholder="Ingrese su contraseña" >
				
					<a id="registrarNuevo"><button>Registrar</button></a>
					<a href="index.php"><button>Login</button>	</a>
			 					
</fieldset>

			
<?php 

		require_once "templates/footer.php"; 

?>