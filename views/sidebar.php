<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra Lateral</title>
  <!-- Agregar Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <style>
    .sidebar {
      background-color: #333;
      min-height: 100vh;
      padding: 1rem;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 0.5rem 0;
    }
    .sidebar a:hover {
      background-color: #555;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Barra lateral -->
      <div class="col-md-3 col-lg-2 sidebar">
        <h3 class="text-white">Mi Barra Lateral</h3>
        <a href="#">Inicio</a>
        <a href="#">Acerca de</a>
        <a href="#">Servicios</a>
        <a href="#">Contacto</a>
      </div>
      <!-- Contenido principal -->
    </div>
  </div>
  <!-- Agregar Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>