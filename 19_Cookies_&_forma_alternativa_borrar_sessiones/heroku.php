<?php 
// session_start();
// var_dump($_SESSION);

if($_COOKIE["nombre_cookie"]??''){
    print_r($_COOKIE['nombre_cookie']);
}else{
    echo "NO hay valores mano :v";
}


?>