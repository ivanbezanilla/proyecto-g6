<?php
if(
	!isset($_POST["nombre"]) || !isset($_POST["fecha"]) || !isset($_POST["hora"]) || !isset($_POST["capacidad"]) || !isset($_POST["profesor"]) || !isset($_POST["id"])
) exit();

include_once "../bd/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$capacidad = $_POST["capacidad"];
$profesor = $_POST["profesor"];

$sentencia = $base_de_datos->prepare("UPDATE clase SET Nombre = ?, Fecha = ?, Hora = ?, Capacidad = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $fecha, $hora, $capacidad, $id]);
if($resultado === TRUE) echo "Los cambios se han guardado correctamente";
else echo "No se ha conseguido guardar los cambios";
?>