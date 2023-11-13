<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">

</head>
<body>

<form class="form_main" action="index.php" method="post">
    <p class="heading">Login</p>
    <div class="inputContainer">
        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
        <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
        </svg>
    
    <input placeholder="Cedula de Identidad" name="ci" id="ci" class="inputField" type="text">
    </div>
    
<div class="inputContainer">
    <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
    </svg>
    <input placeholder="Contraseña" name="contraseña" id="contraseña" class="inputField" type="password">
</div>
              
           
<button id="button">Loguear</button>
</form>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
include "database/database.php";
// Comprobar si se ha enviado el formulario
if (isset($_POST["ci"]) && isset($_POST["contraseña"])) {

    // Obtener los datos del formulario
    $ci = $_POST["ci"];
    $contraseña = $_POST["contraseña"];

    // Conectarse a la base de datos
    $conn = get_connection();

    // Consultar la tabla juez para comprobar las credenciales
    $sql_juez = "SELECT * FROM juez WHERE ci = ? AND contraseña = ?";
    $stmt_juez = $conn->prepare($sql_juez);
    $stmt_juez->bind_param("ss", $ci, $contraseña);
    $stmt_juez->execute();
    $result_juez = $stmt_juez->get_result();

    // Consultar la tabla administrativo para comprobar las credenciales
    $sql_administrativo = "SELECT * FROM administrativo WHERE ci = ? AND contraseña = ?";
    $stmt_administrativo = $conn->prepare($sql_administrativo);
    $stmt_administrativo->bind_param("ss", $ci, $contraseña);
    $stmt_administrativo->execute();
    $result_administrativo = $stmt_administrativo->get_result();

    // Si las credenciales se encuentran en la tabla juez, iniciar sesión como juez
    if ($result_juez->num_rows == 1) {

        // Obtener los datos del usuario
        $fila_juez = $result_juez->fetch_assoc();

        // Iniciar la sesión
        session_start();
        $_SESSION["usuario"] = $fila_juez["id"];
        $_SESSION["tipo_usuario"] = "Juez";

        // Redirigir al usuario a la página principal de juez
        header("Location: views/competidores.php");
    } else if ($result_administrativo->num_rows == 1) {

        // Obtener los datos del usuario
        $fila_administrativo = $result_administrativo->fetch_assoc();

        // Iniciar la sesión
        session_start();
        $_SESSION["usuario"] = $fila_administrativo["id"];
        $_SESSION["tipo_usuario"] = "Administrador";

        // Redirigir al usuario a la página principal de administradores
        header("Location: views/competidores.php");
    } else {

        // Las credenciales no son correctas
        echo "<div class='alert alert-danger'>Las credenciales son incorrectas.</div>";
    }

    // Cerrar la conexión a la base de datos
    $stmt_juez->close();
    $conn->close();
}

?>

</body>
</html>