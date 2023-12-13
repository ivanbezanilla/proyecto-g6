<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM usuario WHERE id = ?;");
$sentencia->execute([$id]);
$proyecto = $sentencia->fetch(PDO::FETCH_OBJ);
if($proyecto === FALSE){
	echo "No existe con ese ID";
	exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar persona</title>
</head>
<body>
	<form method="post" action="actualizar.php">
		<input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
        <br>
		<label for="nombre">Nombre:</label>
		<br>
		<input value="<?php echo $proyecto->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre">
		<br><br>
		<label for="apellidos">Apellidos:</label>
		<br>
		<input value="<?php echo $proyecto->apellidos ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos">
		<br><br>
        <label for="email">Email:</label>
		<br>
		<input value="<?php echo $proyecto->email ?>" name="email" required type="text" id="email" placeholder="Escribe tu email">
		<br><br>
        <label for="pass">Pass:</label>
		<br>
		<input value="<?php echo $proyecto->pass ?>" name="pass" required type="text" id="pass" placeholder="Escribe tu pass">
		<br><br>
		<label for="tipo">Tipo</label>
		<select name="tipo" required name="tipo" id="tipo">

			<option value="">--Selecciona--</option>
			<option <?php echo $proyecto->tipo === 'Alumno' ? "selected='selected'": "" ?> value="Alumno">Alumnno</option>
			<option <?php echo $proyecto->tipo === 'Profesor' ? "selected='selected'": "" ?> value="Profesor">Profesor</option>
            <option <?php echo $proyecto->tipo === 'Administrador' ? "selected='selected'": "" ?> value="Administrador">Administrador</option>
		</select>
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>