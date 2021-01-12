<?php
$dni = 72225661;
$link = "https://dni.optimizeperu.com/api/persons/$dni";

//******** Consumir api 
$data = json_decode(file_get_contents("$link"),true);
//*********************
echo "<pre>";
    var_dump($data);
echo "</pre>";

$nombre_reniec  = $data["name"];
$paterno_reniec = $data ["first_name"];
$materno_reniec = $data["last_name"];

?>

<input type="text" value="<?php echo $nombre_reniec  ?>"><br>
<input type="text" value="<?php echo $paterno_reniec ?>"><br>
<input type="text" value="<?php echo $materno_reniec ?>"><br>