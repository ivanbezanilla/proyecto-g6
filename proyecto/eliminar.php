<?php
if(!isset($_GET["id"]) exit);
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM proyecto WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
/* que tal */
else echo "Algo salio mal";
?>