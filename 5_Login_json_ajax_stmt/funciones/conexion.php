<?php
 
$conn = new mysqli('localhost','root','','pruebas2');
    
if($conn->connect_error){
	echo $error=$conn->connect_error;
}