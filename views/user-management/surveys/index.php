<?php

$pathName = realpath(__DIR__ . "/..");
require "../../../guards/authentication.guard.php";

$authGuard = new AuthenticationGuard();
$authGuard->isAdminBySessionId();

require "../../../services/AdminService.php";

$adminService = new AdminService();
$userId = $_GET["userId"];

$selectedUser = $adminService->getUserInformationById($userId);
$surveys = $adminService->getSurveysByUserId($userId);

$authGuard->notPermittedHTML($surveys && $selectedUser, "El usuario no tiene encuestas");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../styles/global.css">
</head>

<style>
    .main-container {

        margin-top: 5rem;
    }

    .data-container {

        margin-bottom: 1rem;
    }
</style>

<body>

    <main class="container main-container">

        <ul class="data-container">
            <li class="card card-1 data-child">

                <h4><?php echo $selectedUser["nombres"]; ?></h4>
                <h5><?php echo $selectedUser["apellidos"]; ?></h5>
                <p><?php echo $selectedUser["email"]; ?></p>

            </li>

            <li class="card card-1 data-child">

                <p><strong>Telefono del usuario: </strong><?php echo $selectedUser["telefono"]; ?></p>
                <p><strong>Celular del usuario: </strong><?php echo $selectedUser["celular"]; ?></p>
            </li>

            <li class="card card-1 data-child">

                <p><strong>Nombre de la organización: </strong><?php echo $selectedUser["nombre_de_la_or"]; ?></p>
                <p><strong>Sigla de la organización: </strong><?php echo $selectedUser["sigla_de_la_or"]; ?></p>
                <p><strong>Cargo de la organización: </strong><?php echo $selectedUser["cargo_en_la_or"]; ?></p>
            </li>

        </ul>
        <table class="table table-striped" id="surveyTable">
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
                            <button data-survey-table-on-click="showOptions" data-survey-table-id="<?php echo $row["id_encuesta"]; ?>" class="btn btn-primary">Ver preguntas</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </main>
    <?php
    include_once "../../../includes/providers/rightSectionBarProvider.html";
    ?>
    <script src="./main.js" type="module" await></script>
</body>

</html>