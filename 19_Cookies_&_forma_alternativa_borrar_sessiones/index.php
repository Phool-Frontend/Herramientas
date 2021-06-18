<html>
<body>
<form action="" method="post">
<p>Ingrese su nombre: <input type="text" name="nombre"></p>
<p><input type="submit" name="enviar" value="Enviar"></p>
</form>
</body>
</html>


<?php

$nombre = 'Default vacio';
if(isset($_POST["enviar"]))
{

$nombre = $_POST["nombre"];
if($nombre == ''){
    $nombre = 'VACIO PAPU mete tu filtro JS para que no pueda enviar vacio';
}

setcookie("nombre_cookie_3", $nombre, time() + 30*24*60*60); //guardamos la cookie
header("Location:/galletita");

}

if($_COOKIE["nombre_cookie_3"]??''){
    echo "El valor de la cookie nombre_cookie es: " . $_COOKIE["nombre_cookie_3"]; //imprimimos el valor 
}




?>