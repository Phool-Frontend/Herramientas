<?php

header("Content-Type:text/css;charset:UTF-8");
$colorPrincipal = "gold";
$colorTexto = "black";

//***************** Las cookis son temporales mejo en la BD
    if(!isset($_COOKIE["tema"])){
        setcookie("tema","green",99999999,"/");
        $_COOKIE["tema"] = "green";
    }
//***************** Reemplazando por una Base de Datos seria
$gama = array(
    "fondo" => "orange",
    "color" => "white"
    //Ahora se como lo hacia el man de FREDDY ROJAS XD 
);
//*************************************************************
?>

body{
    background:<?php echo $colorPrincipal;   ?>;
    color:<?php echo $colorTexto;   ?>;
}
h1{
    color:<?php echo $_COOKIE["tema"];   ?>;
}
h2{
    text-align:center;
}
.miraPHP{
    background-color:<?php echo  $gama["fondo"]; ?>;
    width:80%;
    height:5vh;
    margin: 0 auto;
}