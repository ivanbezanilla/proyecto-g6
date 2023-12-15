<?php
include "../bd/base_de_datos.php";
$id= 1;
$sentencia = $base_de_datos->query("SELECT * FROM clase WHERE id = ?;");
$sentencia -> $bindParam(':id', $id, PDO::PARAM_INT);
$sentencia -> execute();

$personas = $sentencia -> fetchAll(PDO::FETCH_OBJ);

if (personas) {
    foreach ($personas as $persona) {
        echo "ID:" . $personas -> id . "<br>";
        echo "Nombre:" . $persona -> nombre . "<br>";
    }
} else {
    echo "No se encontraton resultados";
}
?>