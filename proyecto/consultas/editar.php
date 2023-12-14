<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../bd/base_de_datos.php";
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            font-size: 16px;
        }

        select {
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Editar usuario</h1>
    <form method="post" action="actualizar.php">
        <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
        <label for="nombre">Nombre:</label>
        <input value="<?php echo $proyecto->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre">
        <label for="apellidos">Apellidos:</label>
        <input value="<?php echo $proyecto->apellidos ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos">
        <label for="email">Email:</label>
        <input value="<?php echo $proyecto->email ?>" name="email" required type="text" id="email" placeholder="Escribe tu email">
        <label for="pass">Pass:</label>
        <input value="<?php echo $proyecto->pass ?>" name="pass" required type="text" id="pass" placeholder="Escribe tu pass">
        <label for="tipo">Privilegios</label>
        <select name="tipo" required name="tipo" id="tipo">
            <option value="">--Selecciona--</option>
            <option <?php echo $proyecto->tipo === 'alumno' ? "selected='selected'": "" ?> value="alumno">Alumno</option>
            <option <?php echo $proyecto->tipo === 'profesor' ? "selected='selected'": "" ?> value="profesor">Profesor</option>
            <option <?php echo $proyecto->tipo === 'administrador' ? "selected='selected'": "" ?> value="administrador">Administrador</option>
        </select>
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>