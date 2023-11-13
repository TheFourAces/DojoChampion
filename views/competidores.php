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
  <script src="js/crud.js"></script>
</head>
<body>
<div id="mySidebar">
  <a href="#">Competidores</a>
</div>
<div id="main">
<div class="tabla">

  <?php
  include "../database/database.php";

  // Conectarse a la base de datos
  $conn = get_connection();

  // Consultar la tabla competidores
  $sql = "SELECT * FROM competidor";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();

  // Inicializar la tabla Bootstrap
  echo "<table class='table table-responsive table-striped table-bordered'>";

  // Imprimir la cabecera de la tabla
  echo "<thead>";
  echo "<tr>";
  echo "<th>Nombre</th>";
  echo "<th>Apellido</th>";
  echo "<th>Edad</th>";
  echo "<th>Sexo</th>";
  echo "</tr>";
  echo "</thead>";

  // Imprimir los datos de los competidores
  while ($fila = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["nombre"] . "</td>";
    echo "<td>" . $fila["apellido"] . "</td>";
    echo "<td>" . calcular_edad($fila["fnac"]) . "</td>";
    echo "<td>" . $fila["sexo"] . "</td>";
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