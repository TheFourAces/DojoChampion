<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Katas</title>
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
<div class="tabla">

  <?php
  include "../database/database.php";

  // Conectarse a la base de datos
  $conn = get_connection();

  // Consultar la tabla competidores
  $sql = "SELECT * FROM kata";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();

  // Inicializar la tabla Bootstrap
  echo "<table class='mitabla table-responsive table-striped table-bordered'>";

  // Imprimir la cabecera de la tabla
  echo "<thead>";
  echo "<tr>";
  echo "<th>Numero</th>";
  echo "<th>Nombre</th>";
  echo "</tr>";
  echo "</thead>";

  // Imprimir los datos de los competidores
  while ($fila = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["numeroKata"] . "</td>";
    echo "<td>" . $fila["nombreKata"] . "</td>";
    echo "</tr>";
  }

  // Cerrar la tabla Bootstrap
  echo "</table>";

  // Cerrar la conexión a la base de datos
  $stmt->close();
  $conn->close();
  ?>

</div>
</div>
</body>
</html>