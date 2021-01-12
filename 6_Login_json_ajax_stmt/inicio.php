<?php 	
		require_once "templates/header.php"; 
		require_once "funciones/sesiones.php"; 
?>

	
				<a href="funciones/salir.php" class="btn btn-info"><button>Salir del sistema</button></a>
				<h2>Entraste con exito</h2>
				<h1>USUARIO:<?php echo $_SESSION['user']; ?></h1>
				<h1>CONTRASEÑA<?php echo $_SESSION['pass']; ?></h1>
				<h1>ID:<?php echo $_SESSION['id']; ?></h1>
				<h1>NOMBRE:<?php echo $_SESSION['nombre']; ?></h1>
				<h1>APELLIDO:<?php echo $_SESSION['apellido']; ?></h1>
	

<?php 
		require_once "templates/footer.php"; 
?>