<?php

    function conexion(){
        $conexion = mysqli_connect(
            'localhost','root','','codigo_barra',

        );

        return $conexion;
    }
?>