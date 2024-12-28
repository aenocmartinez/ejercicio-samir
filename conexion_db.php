<?php
//1. Definición de la función
function guardar_pelicula($movie_name, $realese_year) 
{
    // 2.Configuración de la conexión
    $servidor = "localhost";
    $usuario = "root";//defauld
    $contraseña = "";//defauld
    $baseDeDatos = "db_peliculas";//name defauld

    // 3.Crear conexión
    //La clase mysqli se utiliza para interactuar con la base de datos MySQL.
    $conexion = new mysqli($servidor, $usuario, $contraseña, $baseDeDatos);

    // 4.Verificar la conexión
    //$conexion->connect_error: Comprueba si ocurrió algún error al intentar conectarse.
    if ($conexion->connect_error) {
        //Si hay un error, el script termina con die() y se imprime un mensaje junto con el detalle del error.
        die("Error en la conexión: " . $conexion->connect_error);
    }    
    // 5.Preparar la consulta SQL con valores parametrizados por seguridad para evitar SQL Injection (VALUES (?, ?))
    $sql = "INSERT INTO peliculas (nombre, anio_estreno) VALUES (?, ?)";

    // 6.Preparación de la declaración
    //-prepare($query):Prepara una consulta SQL para su ejecución.
    //- $stmt es una variable que representa un objeto de tipo mysqli_stmt
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    // Vincular parámetros (s = string, i = integer)
    $stmt->bind_param("si", $movie_name, $realese_year);

    $respuesta = false;
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $respuesta = true;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();

    $conexion->close();

    return $respuesta;
}

function listar_peliculas() {
    // Configuración de la conexión
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "db_peliculas";

    // Crear conexión
    $conexion = new mysqli($servidor, $usuario, $contraseña, $baseDeDatos);
    
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }
    
    // Consulta para obtener las películas
    $sql = "SELECT id, nombre, anio_estreno FROM peliculas";
    $resultado = $conexion->query($sql);
    
    $datos = [];
    if ($resultado && $resultado->num_rows > 0) {
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    $conexion->close();

    return $datos;
}

?>