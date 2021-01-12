<?php
    include("connection.php");
	
  	$cmd = $_REQUEST['cmd'];
	switch($cmd){
		case "add":	
				break;		
	     case "edit":   
			break;
			 
		case "delete": 
		    break;  
		case "load_data": 
		    //load all data
			$sql = "SELECT * FROM registros ORDER BY fecha ASC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				$i=-1;
				while($row = $result->fetch_assoc()) {
					$i++;
					$arr[$i]['fecha'] = $row["fecha"];
					$arr[$i]['cantidad'] = $row["cantidad"];
				}
			  }
			echo json_encode($arr);
			break;			  	
		default:
		    
			break;			  	  		
	}
?>