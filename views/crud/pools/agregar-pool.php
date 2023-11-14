<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar competidores</title>
    <link rel="stylesheet" href="../../css/styles.css">
  <link rel="icon" type="image/x-icon" href="http://localhost/Arreglado/logo.png">

</head>
<body>
<?php
include "../../sidebar.php";
?>
<div id="main" style="width:80vw;">

    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Agregar pool</h2>
                <!-- Formulario para agregar un competidor -->
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-group">
                        <label for="id_pool">ID Pool:</label>
                        <input type="text" class="form-control" id="id_pool" name="id_pool" required pattern="[0-9]{10}" maxlength="10" placeholder="Hasta 10 digitos">
                    </div>
                    <div class="form-group">
                        <label for="ci_competidor">Ci Competidor:</label>
                        <input type="text" class="form-control" id="ci_competidor" name="ci_competidor" required pattern="[0-9]{8}" maxlength="8" placeholder="Solo numeros, sin guiones">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar pool</button>

                </form>
                <!-- Lista de competidors -->
                <?php
                include '../../../database/database.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id_pool = $_POST["id_pool"];
                    $ci_competidor = $_POST["ci_competidor"];

                    if (!filter_var($ci_competidor, FILTER_VALIDATE_INT)) {
                        echo "La cédula no es válida.";
                        return;
                    }

                    $sql = "INSERT INTO pool (id_pool, ci_competidor) VALUES ('$id_pool', '$ci_competidor')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Pool agregada con éxito.";
                    } else {
                        echo "Error al agregar pool: " . $conn->error;
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