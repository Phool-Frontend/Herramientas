<?php 
		include_once('../../includes/funciones/bd_conexion.php');
	   
////////////////////////		
		
///////////////////////////////// CRUD AJAX-JSON-GITHUB NO METERSE PLIS HOMBRES TRABAJANDO
$cmd = $_REQUEST['cmd'] ?? '';

	switch($cmd){
		case "add":
			//////////// ESE FILTRO DE FACU AUTODIDACTA SOLO FUNCIONA PARA USUARIO Y CONTRASEÑA QUE NO SE REPITA
			if(empty($_REQUEST['id']))
			{	
							$nombre=$_POST['nombre'];
							$apellido=$_POST['apellido'];
							$usuario=$_POST['usuario'];
							$password=sha1($_POST['password']);
							
							function buscaRepetido($user,$pass,$conn){
								$sql="SELECT * from usuarios 
									where usuario='$user' and password='$pass'";
								$result = mysqli_query($conn,$sql);

								if(mysqli_num_rows($result) > 0){
									return 1;
								}else{
									return 0;
								}
							}

							if(buscaRepetido($usuario,$password,$conn)==1){
								echo 2;
							}else{
								$sql="INSERT into usuarios (nombre,apellido,usuario,password)
									values ('$nombre','$apellido','$usuario','$password')";
								echo $result=mysqli_query($conn,$sql);
							}

			}
			else
			{
							
							$nombre=$_POST['nombre'];
							$apellido=$_POST['apellido'];
							$usuario=$_POST['usuario'];
							$password=sha1($_POST['password']);
							
							function buscaRepetido($user1,$pass2,$conn){
								
								$sql="SELECT * from usuarios 
									where usuario='$user1' and password='$pass2'";
								$result = mysqli_query($conn,$sql);

								if(mysqli_num_rows($result) > 0){
									return 1;
								}else{
									return 0;
								}
							}

							if(buscaRepetido($usuario,$password,$conn)==1){
								echo 2;
							}else{
								$sql = "update `usuarios` set `nombre`='".$_REQUEST['nombre']."', 
								`apellido`='".$_REQUEST['apellido']."', 
								`usuario`='".$_REQUEST['usuario']."', 
								`password`='".$password."' WHERE id='".$_REQUEST['id']."'";	
								$result = $conn->query($sql); 	

								echo 3;
							}
				
				
			}
				
							  	
		

				break;		
		 case "edit":	
			  //retrive data
				$sql = "SELECT * FROM usuarios where id='".$_REQUEST['id']."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					$i=-1;
					while($row = $result->fetch_assoc()) {
						$i++;
						$arr[$i]['id'] = $row["id"];
						$arr[$i]['nombre'] = $row["nombre"];
						$arr[$i]['usuario'] = $row["usuario"];
						$arr[$i]['apellido'] = $row["apellido"];
						$arr[$i]['password'] = $row["password"];
					}
				} else {
					echo "0 results";
				}
				$conn->close();
				echo json_encode($arr);
				/////////////////////////////// 
			break;
			 
		case "delete": 
			  //Borrar data
				$sql = "Delete FROM usuarios where id='".$_REQUEST['id']."'";
				$result = $conn->query($sql);
				$conn->close();
				
		    break;  
		case "load_data": 
			//load all data
				$sql = "SELECT * FROM usuarios ORDER BY id DESC";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					$i=-1;
					while($row = $result->fetch_assoc()) {
						$i++;
						$arr[$i]['id'] = $row["id"];
						$arr[$i]['nombre'] = $row["nombre"];
						$arr[$i]['apellido'] = $row["apellido"];
						$arr[$i]['usuario'] = $row["usuario"];
						$arr[$i]['password'] = $row["password"];
					}
				}
				echo json_encode($arr);
			break;

			case "muestra_al_admin_que_se_logueo":
				die();
				$sql="SELECT nombre from usuarios where usuario='$usuario' and password='$pass'";
				$result=mysqli_query($conn,$sql);
				echo $result;
				print_r($result);
			break;	

		default:
		    
			break;			  	  		
		}

	 
	



?>

<?php
///////////////////////////// CRUD - EFECTOS -XRL8 /////////////

		$opcion = $_GET['opcion'] ?? '';
		$nombre_efecto = $_REQUEST['nombre_efecto'] ?? '';
		$contenido = $_REQUEST['contenido'] ?? '';
		$observacion = $_REQUEST['observacion'] ?? '';
		$idDocumentacion = $_REQUEST['id'] ?? '';

        switch($opcion){
			
            case "cargar_datos": 
				$sql = "SELECT * FROM documentacion ORDER BY idDocumentacion DESC";
                $resultado = $conn->query($sql);
                if ($resultado->num_rows > 0) {
                    // output data of each row
                    $i=-1;
                    while($row = $resultado->fetch_assoc()) {
                        $i++;
                        $arr[$i]['idDocumentacion'] = $row["idDocumentacion"];
                        $arr[$i]['nombre_efecto'] = $row["nombre_efecto"];
                        $arr[$i]['contenido'] = $row["contenido"];
                        $arr[$i]['observacion'] = $row["observacion"];   
                    }
                }
            	echo json_encode($arr);
            
            break;	

            case "agregar":
                    //print_r($_REQUEST);
                    //die;
                    if(empty($idDocumentacion))
                    {
                    ///Insertion
                    //echo "llega al if de agregar sin antecedentes";
                    //die;
                    $sql = "INSERT INTO `documentacion` (`nombre_efecto`, `contenido`,`observacion`)
                        VALUES ('".$nombre_efecto."', '".$contenido."','".$observacion."');";

                     //echo $sql;
                     //die;
                    }
                    else
                    {
                        $sql = "update `documentacion` set `nombre_efecto`='".$nombre_efecto."', 
                                `contenido`='".$contenido."',`observacion`='".$observacion."' WHERE idDocumentacion='".$idDocumentacion."'";
                        

                    }
                        
                    $resultado = $conn->query($sql);   
                    break;		
            case "editar":
                //echo "LLEGASTE A EDITAR";
				$sql = "SELECT * FROM documentacion where idDocumentacion='".$idDocumentacion."'";                 
                $resultado = $conn->query($sql);
				if ($resultado->num_rows > 0) {
					// output data of each row
					$i=-1;
					while($row = $resultado->fetch_assoc()) {
						$i++;
						$arr[$i]['idDocumentacion'] = $row["idDocumentacion"];
						$arr[$i]['nombre_efecto'] = $row["nombre_efecto"];
                        $arr[$i]['contenido'] = $row["contenido"];
                        $arr[$i]['observacion'] = $row["observacion"];
					}
				} else {
                    //echo "0 results";
                    $arr = 0;
				}
				$conn->close();
				echo json_encode($arr);
				/////////////////////////////// 
                break;
                
            case "borrar": 
               
				$sql = "Delete FROM documentacion where idDocumentacion='".$idDocumentacion."'";
				$result = $conn->query($sql);
                $conn->close();
                 
                echo $sql;
				
                break;  
            		  	
            default:

                break;			  	  		
        }

?>