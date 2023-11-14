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
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar_ci"])) {
    // Obtén el valor de la cédula a buscar
    $buscar_ci = $_POST["buscar_ci"];

    // Realiza la consulta para buscar al competidor por cédula
    $sql = "SELECT * FROM competidor WHERE ci = '$buscar_ci'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Si se encontró al competidor, muestra sus datos
        echo "<table class='mitabla table-responsive table-striped table-bordered'>";

        // Imprimir la cabecera de la tabla
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido</th>";
        echo "<th>Edad</th>";
        echo "<th>Categoria</th>";
        echo "<th>Sexo</th>";
        echo "<th>CI</th>";
        echo "</tr>";
        echo "</thead>";
      
        // Imprimir los datos de los competidores
        while ($fila = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $fila["nombre"] . "</td>";
          echo "<td>" . $fila["apellido"] . "</td>";
          echo "<td>" . calcular_edad($fila["fnac"]) . "</td>";
          echo "<td>" . $fila["categoria"] . "</td>";
          echo "<td>" . $fila["sexo"] . "</td>";
          echo "<td>" . $fila["ci"] . "</td>";
          echo "</tr>";
        }
      
        // Cerrar la tabla Bootstrap
        echo "</table>";
    }
}
  // Conectarse a la base de datos
  $conn = get_connection();

  // Consultar la tabla competidores
  $sql = "SELECT * FROM competidor";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();

  // Inicializar la tabla Bootstrap
  echo "<table class='mitabla table-responsive table-striped table-bordered'>";

  // Imprimir la cabecera de la tabla
  echo "<thead>";
  echo "<tr>";
  echo "<th>Nombre</th>";
  echo "<th>Apellido</th>";
  echo "<th>Edad</th>";
  echo "<th>Categoria</th>";
  echo "<th>Sexo</th>";
  echo "<th>CI</th>";
  echo "</tr>";
  echo "</thead>";

  // Imprimir los datos de los competidores
  while ($fila = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["nombre"] . "</td>";
    echo "<td>" . $fila["apellido"] . "</td>";
    echo "<td>" . calcular_edad($fila["fnac"]) . "</td>";
    echo "<td>" . $fila["categoria"] . "</td>";
    echo "<td>" . $fila["sexo"] . "</td>";
    echo "<td>" . $fila["ci"] . "</td>";
    echo "</tr>";
  }

  // Cerrar la tabla Bootstrap
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
        <li><a href="crud/agregar-competidor.php">Agregar</a></li>
        <li><a href="crud/editar-competidor.php">Editar</a></li>
        <li><a href="crud/eliminar-competidor.php">Eliminar</a></li>
    </ul>
</div>
</div>
</div>
</body>
</html>