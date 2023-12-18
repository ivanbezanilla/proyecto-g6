<?php
if(
	!isset($_POST["nombre"]) || !isset($_POST["fecha"]) || !isset($_POST["hora"]) || !isset($_POST["capacidad"]) || !isset($_POST["id"])
) exit();

include_once "../bd/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$capacidad = $_POST["capacidad"];
try {
	$sentencia = $base_de_datos->prepare("UPDATE clase SET nombre = ?, fecha = ?, hora = ?, capacidad = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$nombre, $fecha, $hora, $capacidad, $id]);
	echo "Los cambios se han guardado correctamente";
}catch(Exception $e){
    echo "Ocurrio un error:" . $e->getMessage();
}
?>