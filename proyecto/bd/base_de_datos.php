<?php
$contraseña = "Alisal2023";
$usuario = "grupo6";
$nombre_base_de_datos = "PAPRM";
try{
    $base_de_datos = new PDO('mysql:host=192.168.6.164;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
    echo "Ocurrio algo con la base de datos:" . $e->getMessage();
}
?>
