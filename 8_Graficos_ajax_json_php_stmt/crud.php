<?php
    include("connection.php");
	
	  $opcion = $_REQUEST['opcion'] ?? '';
	  
	switch($opcion){
		
		case "cargar_datos": 
			//load all data
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT fecha,cantidad FROM registros ORDER BY fecha ASC";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Recibe el servidor y rjecutar el la consulta sql
					$stmt->execute();
					//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
							$stmt->store_result();
							$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
					///////////////////////////////////////////////////////////////////////////////////
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($fecha,$cantidad);
					
					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['fecha'] = $fecha;
						$arr[$i]['cantidad'] = $cantidad;
					
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
		echo "Tas jodido no hay mas opciones";
		    
		break;			  	  		
	}
?>