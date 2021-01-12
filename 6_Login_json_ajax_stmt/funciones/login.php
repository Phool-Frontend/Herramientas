<?php 
require_once "conexion.php";

		session_start();
	
	
		$usuario	=	$_POST['usuario'];
		$pass		=	sha1($_POST['password']);

//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
//Meto la consulta para el stmt
$consulta_sql = "SELECT id,nombre,apellido from usuarios where usuario = ? AND password = ? ";

//Preparo stmt
$stmt = $conn ->prepare($consulta_sql);

//Envio las variables
$stmt->bind_param('ss', $usuario,$pass);

//Recibe el servidor y rjecutar el la consulta sql
$stmt->execute();
////////////////////////////////////////////////////////////////////////////////
			//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
			$stmt->store_result();
			$contador = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
////////////////////////////////////////////////////////////////////////////////
//Son los valores del select que pediste en mi caso nombre y apellido
$stmt->bind_result($id,$nombre, $apellido);

if($contador > 0){
		while($stmt->fetch()){//Aqui se hace la peticion es primo del fetch en JS que es ajax
			//echo $nombre.'<br>';//Tambien salia usando get_result de stmt pero olia mal :v
			//echo $apellido.'<br>';
			$_SESSION['id']	=	$id;
			$_SESSION['nombre']	=	$nombre;
			$_SESSION['apellido']	=	$apellido;
		}	
			$_SESSION['user']	=	$usuario;
			$_SESSION['pass']	=	$pass;

		//echo "Este es el usuario que creo no saldra: ".$usuario;
		echo 1;
}else{
	echo 0;
}

$stmt->close();
$conn->close();


 ?>