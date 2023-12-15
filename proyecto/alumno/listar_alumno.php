<?php
include "../bd/base_de_datos.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

} else {
    echo "El ID de usuario no está definido en la sesión.";
}
echo "$id";
//$id = $_SESSION["id"];
$sentencia = $base_de_datos->prepare("SELECT a.* FROM clase a INNER JOIN alumno_clase b on a.id=b.Clase_ID WHERE b.Alumno_ID=?;");
$sentencia->execute([$id]);
$personas = $sentencia -> fetchAll(PDO::FETCH_OBJ);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista del alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            /*height: 100vh;*/
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header, nav {
            width: 100%;
            display: block;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.8); /* Fondo negro con opacidad */
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center; /* Centrar elementos del menú */
        }

        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff; /* Color del texto del menú */
            padding: 8px 15px;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Cambiar color al pasar el cursor */
        }

        table {
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px; /* Ajusta el margen superior */
        }
        input[type="submit"] {
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #fff;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
    <body>
    <table>
        <thead>
            <tr>
                <th>ID Clase</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personas as $proyecto){ ?>
            <tr>
                <td><?php echo $proyecto->id ?></td>
                <td><?php echo $proyecto->nombre ?></td>
                <td><?php echo $proyecto->fecha ?></td>
                <td><?php echo $proyecto->hora ?></td>
                <td><?php echo $proyecto->capacidad ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </body>
</html>