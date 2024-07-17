<?php

require "./services/AdminService.php";

$pathName = realpath(__DIR__ . "/..");
$adminService = new AdminService();
$surveys = $adminService->getSurveysByUserId(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./global.css">
</head>

<body>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Inicio de la encuesta</th>
                <th scope="col">Fecha final de la encuesta</th>
                <th scope="col">Estado de la encuesta</th>
                <th scope="col">Descripcion de la encuesta</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table">

            <?php
            foreach ($surveys as $row) {
            ?>
                <tr>
                    <td><?php echo $row["titulo"] ?></td>
                    <td><?php echo $row["fecha_inicio"] ?></td>
                    <td><?php echo $row["fecha_final"] ?></td>
                    <td class="<?php echo $row["estado"] == "1" ? "bg-primary" : "bg-danger" ?>"><?php echo $row["estado"] ?></td>
                    <td><?php echo $row["descripcion"] ?></td>
                    <td>
                        <button data-survey-table-on-click="showOptions">Mas</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php
    include_once "./includes/providers/rightSectionBarProvider.html";
    ?>
    <script src="./survey.js" type="module" await></script>
</body>

</html>