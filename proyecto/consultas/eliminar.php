<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM usuario WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salio mal";
?>