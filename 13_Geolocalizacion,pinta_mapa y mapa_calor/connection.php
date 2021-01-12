<?php
	////mysql datbase connection
	$nombre_servidor = "localhost";
	$nombre_usuario = "root";
	$contra = "";
	$base_de_datos = "google_maps";
	
	// Create connection
	$conn = new mysqli($nombre_servidor, $nombre_usuario, $contra,$base_de_datos);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}



// to get the max_allowed_packet
$maxp = $conn->query( 'SELECT @@global.max_allowed_packet' )->fetch_array();
//echo $maxp[ 0 ];
// to set the max_allowed_packet to 500MB
$conn->query( 'SET @@global.max_allowed_packet = ' . 500 * 1024 * 1024 );
?>	