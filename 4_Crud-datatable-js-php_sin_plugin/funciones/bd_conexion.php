<?php 
  //$conn = new mysqli('       HOST         ','  USUARIO     ','CONTRASEÑA','   NOMBRE BD ');**** Con este me dio en CleverCloud && Heroku
        //$conn = new mysqli('localhost','root','','gdlwebcamp');
        //CleverCloud 13 abril funcionando
        //$conn = new mysqli('bsqpto5f0ivbvawvl5ha-mysql.services.clever-cloud.com','u6q3ommjq5mtqsx3','QkP52Eo1hItWrm07dz6R','bsqpto5f0ivbvawvl5ha');
    //$conn = new mysqli('fdb25.awardspace.net','3003464_agenda','agenda123','3003464_agenda');
    $conn = new mysqli('localhost', 'root','','contactos');
    
    if($conn->connect_error) {
      echo $error = $conn->connect_error;
    }


    
?>