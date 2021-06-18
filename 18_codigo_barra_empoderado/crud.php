<?php

require_once "php/conexion.php";
$conn = conexion();



$opcion         =   $_POST['opcion'] ?? '';
$id_producto    =   $_POST['id'] ?? '';
$nombre         =   $_POST['nombre'] ?? '';
$precio         =   $_POST['precio'] ?? '';
$cantidad       =   $_POST['cantidad'] ?? '';
$codigo_barra   =   $_POST['codigo_barra'] ?? '';
$barra_edi		=	$_POST['barra_edi']??'';
$confirma		=   $_POST['confirma'] ?? '';
$buscar_pro_ma	=   $_POST['buscar_pro_ma'] ?? '';
$id				=	$_POST['id_producto'] ?? '';


				
switch ($opcion) {
    case 'agregar':
		
		
        if(empty($_REQUEST['id'])){
			
						//var_dump($codigo_barra);
						//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
						//Meto la consulta para el stmt
						$consulta_sql = "INSERT into productos (nombre,precio,cantidad,codigo_barra) values (?,?,?,?)";

						//Preparo stmt
						$stmt = $conn ->prepare($consulta_sql);
						
						//Envio las variables
						$stmt->bind_param('siii', $nombre,$precio,$cantidad,$codigo_barra);
						
						//Recibe el servidor y ejecutar el la consulta sql
						$stmt->execute();
					
						
						///////////////////////////////// SACANDO EL ULTIMO ID /////////////////////
						if($confirma == 'no'):
									//Metemos  ID-hora-dia-año
									$ultimo_id = mysqli_insert_id($conn);					
									$cod_barra_com = $ultimo_id.$codigo_barra;
									//$cod_barra_com = 11;
									//var_dump($cod_barra_com);

									//echo $cod_barra_com;
									$consulta_sql = "update productos set codigo_barra = ? WHERE id_producto = ?";
									//Preparo stmt
									$stmt = $conn ->prepare($consulta_sql);
									//Envio las variables
									$stmt->bind_param('ii', $cod_barra_com,$ultimo_id);
									//Recibe el servidor y rjecutar el la consulta sql
									$stmt->execute();
						endif;
						////////////////////////////////////////////////////////////////////////////
						//Cierro el stmt y base de datos(consulta)
						$stmt->close();
						$conn->close();
						//*********************************************************************************************
				}
					
				else
				{
					
					//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "update productos set nombre = ? , precio = ? , cantidad = ? , codigo_barra = ? WHERE id_producto = ?";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					$stmt->bind_param('siiii', $nombre,$precio,$cantidad,$barra_edi,$id_producto);

					//Recibe el servidor y rjecutar el la consulta sql

					$stmt->execute();
					
					
					//Cierro el stmt y base de datos(consulta)
					$stmt->close();
					$conn->close();
					//*********************************************************************************************
			}

			echo "Se agrego correctamente";
				
    break;

    case 'mostrar':
		
        //echo "MOSTRAR .PHP";
		//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					$consulta_sql = "SELECT * FROM productos";

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
					
					
					$stmt->bind_result($id_producto,$nombre, $precio,$cantidad,$codigo_barra);
					if ($conta > 0){
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['id_producto'] = $id_producto;
						$arr[$i]['nombre'] = $nombre;
						$arr[$i]['precio'] = $precio;
						$arr[$i]['cantidad'] = $cantidad;
						$arr[$i]['codigo_barra'] = $codigo_barra;
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

    case 'borrar':
	
				//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
						//Meto la consulta para el stmt
						$consulta_sql = "DELETE FROM productos where id_producto = ? ";

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

				echo "Borrado server";
    break;

    case 'editar':
				
				//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM productos where id_producto = ? ";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					$stmt->bind_param('i',$id_producto);

					//Recibe el servidor y rjecutar el la consulta sql
					$stmt->execute();
					//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
							$stmt->store_result();
							$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
							
					///////////////////////////////////////////////////////////////////////////////////
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($id_producto,$nombre, $precio,$cantidad,$codigo_barra);
					
					
					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['id_producto'] = $id_producto;
						$arr[$i]['nombre'] = $nombre;
						$arr[$i]['precio'] = $precio;
						$arr[$i]['cantidad'] = $cantidad;
						$arr[$i]['codigo_barra'] = $codigo_barra;
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
	
	case 'venta_producto':
			
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT id_producto,nombre,precio,cantidad FROM productos where codigo_barra = ? ";

					//Preparo stmt
					$stmt = $conn ->prepare($consulta_sql);

					//Envio las variables
					$stmt->bind_param('i',$buscar_pro_ma);

					//Recibe el servidor y rjecutar el la consulta sql
					$stmt->execute();
					//mysqli_num_rows para que salga en stmt se usa: lo siguiente en ese orden
							$stmt->store_result();
							$conta = $stmt->num_rows;//siendo este el mysqli_num_rows de los stmts
							
					///////////////////////////////////////////////////////////////////////////////////
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($id_producto,$nombre, $precio,$cantidad);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
						$i++;
						$arr[$i]['id_producto'] = $id_producto;
						$arr[$i]['nombre'] = $nombre;
						$arr[$i]['precio'] = $precio;
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
        echo "No existe opcion";
    break;
}



?>