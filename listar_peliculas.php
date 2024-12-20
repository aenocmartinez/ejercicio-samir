<?php
include('conexion_db.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Películas</title>
    <link rel="stylesheet" href="style/listar_peliculas.css">
</head>
<body>
    <h1>Listado de Películas</h1>

    <?php

    $datos = listar_peliculas();

    // Tiene registros
    if (sizeof($datos) > 0) 
    {
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Película</th>
                    <th>Año de estreno</th>
                </tr>
                <?php
                foreach($datos as $dato) 
                {
                    ?>
                    <tr>
                        <td><?= $dato['id'] ?></td>
                        <td><?= $dato['nombre'] ?></td>
                        <td><?= $dato['anio_estreno'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </thead>
        </table>
    <?php
    }
    else
    {
        ?>
        <p>No hay películas registradas.</p>
        <?php
    }
    ?>
    

    <button class="regresar"><a href="index.php">Regresar</a></button>

</body>
</html>
