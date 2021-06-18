<?php

if(isset($nombre)){
    echo "Chapo el if";
    $nombre = 'Estamos en salir cabrones';
}

setcookie("nombre_cookie", $nombre??'', time() - 30*24*60*60); //guardamos la cookie
setcookie("nombre_cookie_2", $nombre??'', time() - 30*24*60*60); //guardamos la cookie
setcookie("nombre_cookie_3", $nombre??'', time() - 30*24*60*60); //guardamos la cookie

echo "Borrado satisfactoriamente";

?>