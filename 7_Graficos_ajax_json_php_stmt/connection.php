<?php
	////mysql datbase connection
	$nombre_servidor = "localhost";
	$nombre_usuario = "root";
	$contra = "";
	$base_datos = "morris";
	
	// Create connection
	$conn = new mysqli($nombre_servidor, $nombre_usuario, $contra,$base_datos);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>