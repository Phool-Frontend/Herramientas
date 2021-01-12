<?php
    include("connection.php");


	//Declaron varibles de llegada
	$id 		=	$_REQUEST['id'] ?? '';
	$nombre		=	$_REQUEST['nombre'] ?? '';
	$apellido	=	$_REQUEST['apellido'] ?? '';
	$direccion	=	$_REQUEST['direccion'] ?? '';
	$opcion 	= 	$_REQUEST['opcion']?? '';
	  
	switch($opcion){
		case "agregar": 
			  	if(empty($_REQUEST['id']))
				{
						
						//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
						//Meto la consulta para el stmt
						$consulta_sql = "INSERT into usuarios (nombre,apellido,direccion) values (?,?,?)";

						//Preparo stmt
						$stmt = $conn ->prepare($consulta_sql);

						//Envio las variables
						$stmt->bind_param('sss', $nombre,$apellido,$direccion);

						//Recibe el servidor y rjecutar el la consulta sql
						$stmt->execute();

						//Cierro el stmt y base de datos(consulta)
						$stmt->close();
						$conn->close();
						//*********************************************************************************************
				}
					
				else
				{
					//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "update usuarios set nombre = ? , apellido = ? , direccion = ? WHERE id = ?";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					$stmt->bind_param('sssi', $nombre,$apellido,$direccion,$id);

					//Recibe el servidor y rjecutar el la consulta sql

					$stmt->execute();
					

					//Cierro el stmt y base de datos(consulta)
					$stmt->close();
					$conn->close();
					//*********************************************************************************************
				}
				break;		
	     case "editar":
			   //retrive data
				//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuarios where id = ? ";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					$stmt->bind_param('i',$id);

					//Recibe el servidor y rjecutar el la consulta sql
					$stmt->execute();
					//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
							$stmt->store_result();
							$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
							
					///////////////////////////////////////////////////////////////////////////////////
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($id,$nombre, $apellido,$direccion);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['id'] = $id;
						$arr[$i]['nombre'] = $nombre;
						$arr[$i]['apellido'] = $apellido;
						$arr[$i]['direccion'] = $direccion;
						}
					} else {
						echo 0;
					}
				
					///////////////////////////////////////////////////////////////////////////////////
					//Cierro el stmt y base de datos(consulta)
					$stmt->close();
					$conn->close();

					echo json_encode($arr);
			break;
			 
		case "borrar": 
			   //retrive data
					//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
						//Meto la consulta para el stmt
						$consulta_sql = "Delete FROM usuarios where id = ? ";

						//Preparo stmt
						$stmt = $conn ->prepare($consulta_sql);

						//Envio las variables
						$stmt->bind_param('i',$id);

						//Recibe el servidor y rjecutar el la consulta sql
						$stmt->execute();

				//*********************************************************************************************
				
				//Cierro el stmt
				$stmt->close();
				$conn->close();
				
		    break;  
		case "cargar_datos": 
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuarios ORDER BY id DESC";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					//$stmt->bind_param('i',$id);

					//Recibe el servidor y rjecutar el la consulta sql
					$stmt->execute();
					//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
							$stmt->store_result();
							$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
							
					///////////////////////////////////////////////////////////////////////////////////
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($id,$nombre, $apellido,$direccion);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['id'] = $id;
						$arr[$i]['nombre'] = $nombre;
						$arr[$i]['apellido'] = $apellido;
						$arr[$i]['direccion'] = $direccion;
						}
					} else {
						echo 0;
					}
				
					///////////////////////////////////////////////////////////////////////////////////
					//Cierro el stmt y base de datos(consulta)
					$stmt->close();
					$conn->close();

					echo json_encode($arr);

			break;			  	
		default:
		    echo "No,metiste una opcion valida";
			break;			  	  		
	}
?>