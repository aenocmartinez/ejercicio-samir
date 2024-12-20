<?php

function guardar_pelicula($movie_name, $realese_year) 
{
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
    // Preparar la consulta SQL con valores parametrizados por seguridad para evitar SQL Injection
    $sql = "INSERT INTO peliculas (nombre, anio_estreno) VALUES (?, ?)";

    // Preparar la declaración
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