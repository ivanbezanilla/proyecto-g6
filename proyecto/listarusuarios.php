<?php
include_once "/proyecto-g6/proyecto/bd/base_de_datos.php";
<<<<<<< HEAD
$sentencia = $base_de_datos->query("SELECT * FROM usuario;");
=======
$sentencia = $base_de_datos->query("SELECT * FROM proyecto;");
>>>>>>> ae3e0f93493dfd7d065a113d27dbfec9a82f6881
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla de usuarios</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
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
				<th>Editar</th>
				<th>Eliminar</th>
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
				<td><a href="<?php echo "editar.php?id=" . $proyecto->id?>">Editar</a></td>
				<td><a href="<?php echo "eliminar.php?id=" . $proyecto->id?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>