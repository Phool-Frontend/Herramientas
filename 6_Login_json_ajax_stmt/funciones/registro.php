<?php 
	require_once "conexion.php";
	

		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);

		if(buscaRepetido($usuario,$password,$conn)==1){
			echo 2;
		}else{
			
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
			//Meto la consulta para el stmt
			$consulta_sql = "INSERT into usuarios (nombre,apellido,usuario,password) values (?,?,?,?)";

			//Preparo stmt
			$stmt = $conn ->prepare($consulta_sql);

			//Envio las variables
			$stmt->bind_param('ssss', $nombre,$apellido,$usuario,$password);

			//Recibe el servidor y rjecutar el la consulta sql
			$stmt->execute();

			//Cierro el stmt
			$stmt->close();
			//*********************************************************************************************

			echo 1;
		}


		function buscaRepetido($user,$pass,$conn){
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
			//Meto la consulta para el stmt
			$consulta_sql = "SELECT * from usuarios where usuario = ? and password = ? ";

			//Preparo stmt
			$stmt = $conn ->prepare($consulta_sql);

			//Envio las variables
			$stmt->bind_param('ss', $user,$pass);

			//Recibe el servidor y rjecutar el la consulta sql
			$stmt->execute();

			////////////////////////////////////////////////////////////////////////////////
			//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
			$stmt->store_result();
			$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
			////////////////////////////////////////////////////////////////////////////////
			//Cierra el stmt
			$stmt->close();

			
			if($conta > 0){
				return 1;
			}else{
				return 0;
			}
		}
$conn->close();

 ?>