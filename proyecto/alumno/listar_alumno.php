<?php
include "../bd/base_de_datos.php";
$id= 1;
$sentencia = $base_de_datos->query("SELECT * FROM clase WHERE id = ?;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>