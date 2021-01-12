<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>

<?php require_once "scripts.php"; ?>

	
				<a href="funciones/salir.php" class="btn btn-info"><button>Salir del sistema</button></a>
				<h2>Entraste con exito</h2>
	

<?php
} else {
	header("location:index.php");
	}
 ?>
