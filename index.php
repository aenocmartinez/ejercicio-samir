<?php
//1. Incluir el archivo de conexión a la base de datos
include('conexion_db.php');// Importa el archivo conexion_db.php para usar las funciones guardar_pelicula y listar_peliculas.

//2. Inicialización de la variable para mensajes
$mensaje = "";

// 3. Validación de los datos enviados por el formulario
//Se pregunta si existe movie_name y release_year en POST

//La función isset() comprueba si esas variables fueron enviadas a través del formulario
if (isset($_POST['movie_name']) && isset($_POST['release_year']))
{
    //4. Recibimiento de los datos del formulario
    // En este paso, se toman los datos que el usuario envió desde el formulario HTML (a través de $_POST).
    $movie_name = $_POST['movie_name'];
    $realese_year = $_POST['release_year'];
    //Estos valores se asignan a las variables $movie_name y $release_year para que puedan ser usadas más adelante en el código.
    
    //5. Llamada a la función para guardar la película
    //Se espera que la función guardar_pelicula devuelva un valor booleano (true o false). Si devuelve true, significa que la película se guardó correctamente; si devuelve false, significa que hubo un error. El resultado se guarda en la variable $exito
    $exito = guardar_pelicula($movie_name, $realese_year);
    

    //6. Manejo del resultado de la operación (Éxito o error)
    $mensaje = "La película se guardó con éxito.";// Si la función guardar_pelicula devuelve verdadero
    if (!$exito) {
        $mensaje = "La película se guardó con éxito.";//Si la función devuelve falso (indicando que hubo un error).
    }/*else{
        $mensaje = "La pelicula no se guardó"; No me funcionó
    }*/
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listar_peliculas.css">
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
            <input type="number" id="release-year" name="release_year" placeholder="Ingresa el año (Ej: 2024)" min="1888" max="2099" required>
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
    //Código para mostrar mensaje de alerta
    <?php
    if ($mensaje != "") {
        ?>
        alert('<?= $mensaje ?>');//sintaxis de PHP para imprimir el valor de una variable
        <?php
    }
    ?>
</script>