<?php
    include_once("connection.php");


	//Declaron varibles de llegada
	$id 		=	$_REQUEST['id'] ?? '';
	$nombre		=	$_REQUEST['nombre'] ?? '';
    $direccion	=	$_REQUEST['direccion'] ?? '';
    $ciudad	    =	$_REQUEST['ciudad'] ?? '';
    $distrito   =   $_REQUEST['distrito'] ?? '';
    
    $latitud    =   $_REQUEST['latitud'] ?? '';
    $longitud   =   $_REQUEST['longitud'] ?? '';

	$opcion 	= 	$_REQUEST['opcion']?? '';
	switch($opcion){
		case "agregar": 
			  	if(empty($_REQUEST['id']))
				{
						
						//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
						//Meto la consulta para el stmt
						$consulta_sql = "INSERT into usuario_maps (nombre,direccion,ciudad,distrito,latitud,longitud) values (?,?,?,?,?,?)";

						//Preparo stmt
						$stmt = $conn ->prepare($consulta_sql);

						//Envio las variables
						$stmt->bind_param('ssssdd', $nombre,$direccion,$ciudad,$distrito,$latitud,$longitud);

						//Recibe el servidor y rjecutar el la consulta sql
						$stmt->execute();

                        echo $latitud;
						//Cierro el stmt y base de datos(consulta)
						$stmt->close();
						$conn->close();
						//*********************************************************************************************
				}
					
				else
				{
					echo "Aqui es update :v";
				}
		break;		  
        
        case "cargar_datos": 
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuario_maps ORDER BY id ASC";

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
					$stmt->bind_result($id,$nombre,$direccion,$ciudad,$distrito,$latitud,$longitud);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
                        $i++;
                        $arr[$i]['id'] = $id;
						$arr[$i]['nombre'] = $nombre;
                        $arr[$i]['direccion'] = $direccion;
                        $arr[$i]['ciudad'] = $ciudad;
                        $arr[$i]['distrito'] = $distrito;
                        $arr[$i]['lat'] = $latitud;
                        $arr[$i]['lng'] = $longitud;
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

		case "cargar_calor": 
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuario_maps ORDER BY id ASC";

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
					$stmt->bind_result($id,$nombre,$direccion,$ciudad,$distrito,$latitud,$longitud);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
                        $i++;
                        $arr[$i]['id'] = $id;
						$arr[$i]['nombre'] = $nombre;
                        $arr[$i]['direccion'] = $direccion;
                        $arr[$i]['ciudad'] = $ciudad;
                        $arr[$i]['distrito'] = $distrito;
                        $arr[$i]['lat'] = $latitud;
                        $arr[$i]['lng'] = $longitud;
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

		case "cargar_calor_metod_github":
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuario_maps ORDER BY id ASC";

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
					$stmt->bind_result($id,$nombre,$direccion,$ciudad,$distrito,$latitud,$longitud);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
                        $i++;
                        $arr[$i]['latitud'] = $latitud;
                        $arr[$i]['longitud'] = $longitud;
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

		case "cargar_llegar_local": 
			//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
					//Meto la consulta para el stmt
					
					$consulta_sql = "SELECT * FROM usuario_maps ORDER BY id ASC";

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
					$stmt->bind_result($id,$nombre,$direccion,$ciudad,$distrito,$latitud,$longitud);
					

					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
                        $i++;
                        $arr[$i]['id'] = $id;
						$arr[$i]['nombre'] = $nombre;
                        $arr[$i]['direccion'] = $direccion;
                        $arr[$i]['ciudad'] = $ciudad;
                        $arr[$i]['distrito'] = $distrito;
                        $arr[$i]['lat'] = $latitud;
                        $arr[$i]['lng'] = $longitud;
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
		
		case "cargar_pinta_mapa": ////////// USANDO API
			
			$guardar_data		=	$_REQUEST['guardar_data']?? '';	
			$pais_region		=	$_GET['pais_region']?? '';
			$distrito_local		=	$_GET['distrito_local']?? '';
				/*
					echo "<pre>";
						print_r($_REQUEST);
					echo "</pre>";
					die();			
				*/
			
		
						$tipo_busqueda = $_GET['tipo_busqueda']?? '';
						if($tipo_busqueda == 'automatica'){
						
					
							$url_dinamica = 'https://nominatim.openstreetmap.org/search.php?q='.$pais_region.'/%20'.$distrito_local.'&polygon_geojson=1&format=jsonv2';
							
							$httpOptions = [
								"http" => [
									"method" => "GET",
									"header" => "User-Agent: Nominatim-Test"
								]
							];
			
							$streamContext = stream_context_create($httpOptions);
							$json = file_get_contents($url_dinamica,false, $streamContext);
							$decoded = json_decode($json, true);
							//$decoded = json_encode(json_decode($json, true));
							//$coordenadas_magicas = $decoded[0]["geojson"]["coordinates"][0]; //Buscados general
							//echo json_encode($decoded);	
								
							
							//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
												//Meto la consulta para el stmt
												$nombre_mapa = $pais_region.','.$distrito_local;
			
												$entra = json_encode($decoded[0]["geojson"]["coordinates"][0]);
													
												$boundingbox = json_encode($decoded[0]["boundingbox"]);
			
												$tipo_poligono = json_encode($decoded[0]["geojson"]["type"]);
			
												$consulta_sql = "INSERT into dibuja_mapa (nombre_mapa,coordenadas,boundingbox,tipo_poligono) values (?,?,?,?)";
			
												//Preparo stmt
												$stmt = $conn ->prepare($consulta_sql);
			
												//Envio las variables
												$stmt->bind_param('ssss', $nombre_mapa,$entra,$boundingbox,$tipo_poligono);
			
												//Recibe el servidor y rjecutar el la consulta sql
												$stmt->execute();
			
												//Cierro el stmt y base de datos(consulta)
												$stmt->close();
												$conn->close();
							//*********************************************************************************************
							
						
						}else if($tipo_busqueda == 'manual'){
			
							$guardar_data		=	$_GET['guardar_data']?? '';
							$url_manual 		= 	$_GET['link_insertado']?? '';
			
							$httpOptions = [
								"http" => [
									"method" => "GET",
									"header" => "User-Agent: Nominatim-Test"
								]
							];
							$streamContext = stream_context_create($httpOptions);
							$json = file_get_contents($url_manual,false, $streamContext);
							$decoded = json_decode($json, true);
							//$coordenadas_magicas = $decoded["geometry"]["coordinates"]; //Buscados X MUCH0S DETALLES
							//echo json_encode($coordenadas_magicas);
							echo json_encode($decoded);		
								
						}else{
							echo "Algo paso";
							return true;
						}
			

			

		break;

		case "guardar_pinta_mapa":
			//echo "<pre>";
			//		print_r($_REQUEST);
			//echo"</pre>";
			//die();
			$guardar_data		=	$_REQUEST['guardar_data']?? '';
			$color_mapa			= 	$_REQUEST['color_mapa']?? '';	

			if($guardar_data == 'manual'){
					echo "Se guardar MANUAL";
					$url_manual 		= 	$_REQUEST['link_insertado']?? '';
			
					$httpOptions = [
							"http" => [
							"method" => "GET",
							"header" => "User-Agent: Nominatim-Test"
						]
					];
					$streamContext = stream_context_create($httpOptions);
					$json = file_get_contents($url_manual,false, $streamContext);
					$decoded = json_decode($json, true);
			
					

					$nombre_mapa 		= $decoded["names"]["name"]?? '';
					$boundingbox		= "Geometry";
					$tipo_poligono	 	= json_encode($decoded['geometry']['type']?? '');
					$coordenadas_mapa 	= json_encode($decoded["geometry"]["coordinates"][0]?? '');

					if($decoded['geometry']['type'] == 'LineString'){
						echo "Entro a la wuada";
						$coordenadas_mapa 	= json_encode($decoded["geometry"]["coordinates"]);
					}else if($decoded[0]['geojson']["coordinates"] != ''){
						echo "Es de la antigua escuela";
						var_dump($decoded[0]['geojson']["coordinates"]);
					}
					//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
										//Meto la consulta para el stmt
										$consulta_sql = "INSERT into dibuja_mapa (nombre_mapa,coordenadas,boundingbox,tipo_poligono,color_mapa) values (?,?,?,?,?)";
	
										//Preparo stmt
										$stmt = $conn ->prepare($consulta_sql);
	
										//Envio las variables
										$stmt->bind_param('sssss', $nombre_mapa,$coordenadas_mapa,$boundingbox,$tipo_poligono,$color_mapa);
	
										//Recibe el servidor y rjecutar el la consulta sql
										$stmt->execute();
	
										//Cierro el stmt y base de datos(consulta)
										$stmt->close();
										$conn->close();
					//*********************************************************************************************
					
					/*
					echo "<pre>";
						var_dump($coordenadas_mapa);
					echo "</pre>";
					*/
				
			}else{	
					echo "Se guardar AUTOMATICO";
					$pais_region	= $_REQUEST["pais_region"];
					$distrito_local	= $_REQUEST["distrito_local"];
					

					$url_dinamica = 'https://nominatim.openstreetmap.org/search.php?q='.$pais_region.'/%20'.$distrito_local.'&polygon_geojson=1&format=jsonv2';
							
					$httpOptions = [
						"http" => [
							"method" => "GET",
							"header" => "User-Agent: Nominatim-Test"
						]
					];
	
					$streamContext = stream_context_create($httpOptions);
					$json = file_get_contents($url_dinamica,false, $streamContext);
					$decoded = json_decode($json, true);
					//$decoded = json_encode(json_decode($json, true));
					//$coordenadas_magicas = $decoded[0]["geojson"]["coordinates"][0]; //Buscados general
					//echo json_encode($decoded);	
						
					
					//************************* STMT -> Prepara - Envia - Recive - Cierra *************************
										//Meto la consulta para el stmt
										$nombre_mapa = $pais_region.','.$distrito_local;
	
										$entra = json_encode($decoded[0]["geojson"]["coordinates"][0]);
											
										$boundingbox = json_encode($decoded[0]["boundingbox"]);
	
										$tipo_poligono = json_encode($decoded[0]["geojson"]["type"]);

	
										$consulta_sql = "INSERT into dibuja_mapa (nombre_mapa,coordenadas,boundingbox,tipo_poligono,color_mapa) values (?,?,?,?,?)";
	
										//Preparo stmt
										$stmt = $conn ->prepare($consulta_sql);
	
										//Envio las variables
										$stmt->bind_param('sssss', $nombre_mapa,$entra,$boundingbox,$tipo_poligono,$color_mapa);
	
										//Recibe el servidor y rjecutar el la consulta sql
										$stmt->execute();
	
										//Cierro el stmt y base de datos(consulta)
										$stmt->close();
										$conn->close();
					//*********************************************************************************************
			}

		break;

		case "cargar_mapas_pintados": 
					$consulta_sql = "SELECT * FROM dibuja_mapa";
					$stmt = $conn ->prepare($consulta_sql);
					$stmt->execute();
							$stmt->store_result();
							$conta = $stmt->num_rows;
					//Son los valores del select que pediste en mi caso nombre y apellido
					$stmt->bind_result($id,$nombre_mapa,$coordenadas,$boundingbox,$tipo_poligono,$color_mapa);
					if ($conta > 0) {
						$i = -1;
						while($row = $stmt->fetch()) {
                        $i++;
                        $arr[$i]['id'] 				= $id;
						$arr[$i]['nombre_mapa'] 	= $nombre_mapa;
						$arr[$i]['coordenadas'] 	= $coordenadas;
						$arr[$i]['boundingbox'] 	= $boundingbox;
						$arr[$i]['tipo_poligono'] 	= $tipo_poligono;
						$arr[$i]['color_mapa']		= $color_mapa;
						}
					} else {
						echo 0;
					}
					$stmt->close();
					$conn->close();

					
					echo json_encode($arr);
	
					
		break;

		

		default:
		    echo "No,metiste una opcion valida";
		break;			  	  		
	}
?>