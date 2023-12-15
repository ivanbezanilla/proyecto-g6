<?php
include "../bd/base_de_datos.php";
$id= $_GET["id"];
$sentencia = $base_de_datos->prepare("SELECT * FROM clase WHERE id = ?;");
$sentencia -> bindParam (':id', $id, PDO::PARAM_INT);
$sentencia->execute([$id]);

$personas = $sentencia -> fetchAll(PDO::FETCH_OBJ);

?>
<html>
    <body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Pass</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personas as $proyecto){ ?>
            <tr>
                <td><?php echo $proyecto->id ?></td>
                <td><?php echo $proyecto->nombre ?></td>
                <td><?php echo $proyecto->apellidos ?></td>
                <td><?php echo $proyecto->email ?></td>
                <td><?php echo $proyecto->pass ?></td>
                <td><?php echo $proyecto->tipo ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </body>
</html>