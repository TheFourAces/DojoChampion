<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar competidor</title>
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
                <h2>Editar Pool</h2>
                <!-- Formulario para editar un competidor -->
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-group">
                        <label for="idvieja">Id Vieja:</label>
                        <input type="text" class="form-control" id="idvieja" name="idvieja" required pattern="[0-9]{9}" maxlength="9" placeholder="Hasta 9 digitos">
                    </div>
                    <div class="form-group">
                        <label for="id_pool">ID Pool:</label>
                        <input type="text" class="form-control" id="id_pool" name="id_pool" required pattern="[0-9]{9}" maxlength="9" placeholder="Hasta 9 digitos">
                    </div>
                    <div class="form-group">
                        <label for="ci_competidor">Ci Competidor:</label>
                        <input type="text" class="form-control" id="ci_competidor" name="ci_competidor" required pattern="[0-9]{8}" maxlength="8" placeholder="Solo numeros, sin guiones">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar pool</button>

                </form>

                <?php
include '../../../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idvieja = $_POST["idvieja"];
    $id_pool = $_POST["id_pool"];
    $ci_competidor = $_POST["ci_competidor"];

    $sql = "UPDATE pool SET id_pool='$id_pool', ci_competidor='$ci_competidor' WHERE id_pool='$idvieja'";

    if ($conn->query($sql) === TRUE) {
        echo "Pool editado con éxito.";
    } else {
        echo "Error al editar competidor: " . $conn->error;
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