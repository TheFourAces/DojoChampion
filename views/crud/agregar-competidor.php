<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar competidores</title>
    <link rel="stylesheet" href="../css/styles.css">
  <link rel="icon" type="image/x-icon" href="http://localhost/Arreglado/logo.png">

</head>
<body>
<?php
include "../sidebar.php";
?>
<div id="main" style="width:80vw;">

    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Agregar competidores</h2>
                <!-- Formulario para agregar un competidor -->
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-group">
                        <label for="ci">Cédula:</label>
                        <input type="text" class="form-control" id="ci" name="ci" required pattern="[0-9]{8}" maxlength="8" placeholder="Solo numeros, no guiones">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+" title="Solo letras y espacios son permitidos">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required pattern="[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+" title="Solo letras y espacios son permitidos">
                    </div>
                    <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                    <option value="12-13">12-13</option>
                    <option value="14-15">14-15</option>
                    <option value="16-17">16-17</option>
                    <option value="mayores">Mayores</option>
                    </select>
                    <div class="form-group">
                        <label for="fnac">Nacimiento:</label>
                        <input type="date" class="form-control" id="fnac" name="fnac" required>
                    </div>
                    
                    <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar competidor</button>
                </form>

                <!-- Lista de competidors -->
                <?php
                include '../../database/database.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ci = $_POST["ci"];
                    $nombre = $_POST["nombre"];
                    $apellido = $_POST["apellido"];
                    $categoria = $_POST["categoria"];
                    $fnac = $_POST["fnac"];
                    $sexo = $_POST["sexo"];

                    if (!filter_var($ci, FILTER_VALIDATE_INT)) {
                        echo "La cédula no es válida.";
                        return;
                    }

                    if (!filter_var($fnac, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^\d{4}-\d{2}-\d{2}$/')))) {
                        echo "La fecha no es válida.";
                        return;
                    }

                    $sql = "INSERT INTO competidor (ci, nombre, apellido, categoria, fnac, sexo) VALUES ('$ci', '$nombre', '$apellido', '$categoria', '$fnac', '$sexo')";

                    if ($conn->query($sql) === TRUE) {
                        echo "competidor agregado con éxito.";
                    } else {
                        echo "Error al agregar competidor: " . $conn->error;
                    }
                }
                ?>
            </div>
        </div>
    </section>
            </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>