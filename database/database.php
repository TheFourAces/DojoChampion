<?php
// Configuración de la conexión a la base de datos
define("DB_HOST", "127.0.0.1");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "cuk");

// Crear una conexión a la base de datos
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Verificar si hay errores de conexión
if (mysqli_connect_error()) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Función para obtener la conexión a la base de datos
function get_connection() {
    global $conn;
    return $conn;
}

// Función para cerrar la conexión a la base de datos
function close_connection() {
    global $conn;
    mysqli_close($conn);
}

// Función para calcular la edad
function calcular_edad($fecha_nacimiento) {
    $hoy = new DateTime();
    $fecha_nacimiento = new DateTime($fecha_nacimiento);
    $diferencia = $hoy->diff($fecha_nacimiento);
    return $diferencia->y;
}