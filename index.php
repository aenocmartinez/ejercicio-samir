<?php

include('conexion_db.php');

$mensaje = "";

// Se pregunta si existe movie_name y release_year en POST
if (isset($_POST['movie_name']) && isset($_POST['release_year']))
{
    // Recibimos los datos desde la vista
    $movie_name = $_POST['movie_name'];
    $realese_year = $_POST['release_year'];
    
    $exito = guardar_pelicula($movie_name, $realese_year);

    $mensaje = "La película se guardó con éxito.";
    if (!$exito) {
        $mensaje = "La película se guardó con éxito.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Películas</title>

    <link rel="stylesheet" href="style/guardar_peliculas.css">
</head>
<body>

<div class="form-container">
    <h1>Registrar Película</h1>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="movie-name">Nombre de la Película:</label>
            <input type="text" id="movie-name" name="movie_name" placeholder="Ingresa el nombre" required>
        </div>
        <div class="form-group">
            <label for="release-year">Año de Estreno:</label>
            <input type="number" id="release-year" name="release_year" placeholder="Ingresa el año (ej: 2024)" min="1888" max="2099" required>
        </div>
        <div class="form-actions">
            <button type="submit">Registrar</button>
        </div>
    </form>

    <a href="listar_peliculas.php">Ver películas registradas</a>
</div>

</body>
</html>

<script>
    <?php
    if ($mensaje != "") {
        ?>
        alert('<?= $mensaje ?>');
        <?php
    }
    ?>
</script>