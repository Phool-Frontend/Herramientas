<?php 
        require_once('../../includes/funciones/bd_conexion.php');
        
		session_start();
	
        
		//Definicion de variables
		$usuario			=	$_POST['usuario'];
		$pass				=	sha1($_POST['password']);
		

		
		$sql="SELECT * from usuarios where usuario='$usuario' and password='$pass'";
		$result=mysqli_query($conn,$sql);

		
		if(mysqli_num_rows($result) > 0){
			
			$fila = $result->fetch_row();
			$nombre = $fila[1];
			$apellido = $fila[2];
			
			$_SESSION['nombre']		=   $nombre;
			$_SESSION['user']		=	$usuario;
			$_SESSION['apellido']	=	$apellido;
			
			echo 1;

		}else{
			echo 0;
		}


 ?>