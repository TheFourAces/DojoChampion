<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar competidores</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
<div id="mySidebar">
  <img src="../../logo.png" alt="">
  <a href="../competidores.php" class="texto">Competidores</a>
</div>
<div id="main" style="width:80vw;">

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Eliminar competidor por Cédula</h2>

            <!-- Formulario de búsqueda -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="form-group">
                    <label for="buscar_ci">Cédula del competidor:</label>
                    <input type="text" class="form-control" id="buscar_ci" name="buscar_ci" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <?php
include '../../database/database.php';

// Verifica si el formulario de búsqueda ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar_ci"])) {
    // Obtén el valor de la cédula a buscar
    $buscar_ci = $_POST["buscar_ci"];

    // Realiza la consulta para buscar al competidor por cédula
    $sql = "SELECT * FROM competidor WHERE ci = '$buscar_ci'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si se encontró al competidor, muestra sus datos
        $row = $result->fetch_assoc();
        echo "<h3>Información del competidor:</h3>";
        echo "<p>Cédula: " . $row["ci"] . "</p>";
        echo "<p>Nombre: " . $row["nombre"] . "</p>";
        echo "<p>Apellido: " . $row["apellido"] . "</p>";
        echo "<p>Categoria: " . $row["categoria"] . "</p>";
        echo "<p>Nacimiento: " . $row["fnac"] . "</p>";
        echo "<p>Sexo: " . $row["sexo"] . "</p>";

        // Agrega un mensaje de confirmación antes de eliminar al competidor
        echo "<div class='alert alert-warning'>¿Está seguro de que desea eliminar a este competidor?</div>";

        // Agrega un botón para eliminar al competidor
        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
        echo '<input type="hidden" name="ci" value="' . $buscar_ci . '">';
        echo '<button type="submit" class="btn btn-danger" name="eliminar">Eliminar competidor</button>';
        echo '</form>';
    } else {
        // Si no se encontró al competidor, muestra un mensaje de error
        echo "No se encontró ningún competidor con esa cédula.";
    }
}

// Verifica si el formulario de eliminación ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    // Obtén la cédula del competidor a eliminar
    $ci = $_POST["ci"];

    // Valida la cédula del competidor
    if (!filter_var($ci, FILTER_VALIDATE_INT)) {
        echo "La cédula no es válida.";
        return;
    }

    // Realiza la consulta para eliminar al competidor de la base de datos
    $sql = "DELETE FROM competidor WHERE ci = '$ci'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../competidores.php");
    } else {
        echo "Error al eliminar competidor: " . $conn->error;
    }
}

$conn->close();
?>

        </div>
    </div>
</div>
</div>

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
