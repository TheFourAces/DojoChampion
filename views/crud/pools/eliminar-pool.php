<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar competidores</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
  <link rel="icon" type="image/x-icon" href="http://localhost/Arreglado/logo.png">

</head>
<body>
    
<?php
include "../../sidebar.php";
?>
<div id="main" style="width:80vw;">

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Eliminar pool por ID</h2>

            <!-- Formulario de búsqueda -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="form-group">
                    <label for="buscar_id">Id Pool:</label>
                    <input type="text" class="form-control" id="buscar_id" name="buscar_id" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <?php
include '../../../database/database.php';

// Verifica si el formulario de búsqueda ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar_id"])) {
    // Obtén el valor de la cédula a buscar
    $buscar_id = $_POST["buscar_id"];
    // Realiza la consulta para buscar al competidor por cédula
    $sql = "SELECT * FROM pool WHERE id_pool = '$buscar_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si se encontró al competidor, muestra sus datos
        $row = $result->fetch_assoc();
        echo "<h3>Información de la pool:</h3>";
        echo "<p>Id Pool: " . $row["id_pool"] . "</p>";
        echo "<p>Ci: " . $row["ci_competidor"] . "</p>";

        // Agrega un mensaje de confirmación antes de eliminar al competidor
        echo "<div class='alert alert-warning'>¿Está seguro de que desea eliminar esta pool?</div>";

        // Agrega un botón para eliminar al competidor
        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
        echo '<input type="hidden" name="id_pool" value="' . $buscar_id . '">';
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
    $id_pool = $_POST["id_pool"];

    // Valida la cédula del competidor
    if (!filter_var($id_pool, FILTER_VALIDATE_INT)) {
        echo "La cédula no es válida.";
        return;
    }

    // Realiza la consulta para eliminar al competidor de la base de datos
    $sql = "DELETE FROM pool WHERE id_pool = '$id_pool'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../juez.php");
    } else {
        echo "Error al eliminar el pool: " . $conn->error;
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
