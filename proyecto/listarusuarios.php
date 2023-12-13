<?php
include "./bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM usuario;");
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
				<td><a href="<?php echo "./consultas/editar.php?id=" . $proyecto->id?>">Editar</a></td>
				<td><a href="<?php echo "./consultas/eliminar.php?id=" . $proyecto->id?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>