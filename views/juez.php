<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Competidores</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="icon" type="image/x-icon" href="http://localhost/Arreglado/logo.png">

</head>
<body>
<?php
include "sidebar.php";
?>
<div id="main">
            <!-- Formulario de búsqueda -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="form-group">
                    <label for="buscar_ci">Cédula del competidor:</label>
                    <input type="text" class="form-control" id="buscar_ci" name="buscar_ci" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
<div class="tabla">

<?php
include "../database/database.php";

// Conectarse a la base de datos
$conn = get_connection();

// Verificar si se ha enviado el formulario de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar_ci"])) {
    // Obtén el valor de la cédula a buscar
    $buscar_ci = $_POST["buscar_ci"];

    // Realiza la consulta para buscar al competidor por cédula
    $sql = "SELECT pool.id_pool, pool.ci_competidor, competidor.nombre, competidor.apellido, competidor.categoria, competidor.fnac, competidor.sexo, competidor.ci FROM pool
    JOIN competidor ON pool.ci_competidor = competidor.ci
    WHERE competidor.ci = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $buscar_ci);
    $stmt->execute();
    $result = $stmt->get_result();

    // Imprimir la tabla con los resultados de la búsqueda
    echo "<table class='mitabla table-responsive table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>idpool</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Edad</th>";
    echo "<th>Categoria</th>";
    echo "<th>Sexo</th>";
    echo "<th>CI</th>";
    echo "</tr>";
    echo "</thead>";

    // Imprimir los datos de los competidores encontrados
    while ($fila = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id_pool"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["apellido"] . "</td>";
        echo "<td>" . calcular_edad($fila["fnac"]) . "</td>";
        echo "<td>" . $fila["categoria"] . "</td>";
        echo "<td>" . $fila["sexo"] . "</td>";
        echo "<td>" . $fila["ci"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Cerrar la conexión a la base de datos
    $stmt->close();
}

// Consultar la tabla competidores (sin filtro de búsqueda)
$sql = "SELECT pool.id_pool, pool.ci_competidor, competidor.nombre, competidor.apellido, competidor.categoria, competidor.fnac, competidor.sexo, competidor.ci FROM pool
JOIN competidor ON pool.ci_competidor = competidor.ci";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Imprimir la tabla completa
echo "<table class='mitabla table-responsive table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th>idpool</th>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";
echo "<th>Edad</th>";
echo "<th>Categoria</th>";
echo "<th>Sexo</th>";
echo "<th>CI</th>";
echo "</tr>";
echo "</thead>";

while ($fila = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["id_pool"] . "</td>";
    echo "<td>" . $fila["nombre"] . "</td>";
    echo "<td>" . $fila["apellido"] . "</td>";
    echo "<td>" . calcular_edad($fila["fnac"]) . "</td>";
    echo "<td>" . $fila["categoria"] . "</td>";
    echo "<td>" . $fila["sexo"] . "</td>";
    echo "<td>" . $fila["ci"] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>


<div class="dropdown-container">
    <button type="button" id="button" class="button dropdown-toggle" data-toggle="dropdown">
        Opciones
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="crud/pools/agregar-pool.php">Agregar</a></li>
        <li><a href="crud/pools/editar-pool.php">Editar</a></li>
        <li><a href="crud/pools/eliminar-pool.php">Eliminar</a></li>
    </ul>
</div>
</div>
</div>
</body>
</html>