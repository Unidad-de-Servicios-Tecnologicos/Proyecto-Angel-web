<?php
    require '../templates/navbar.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="shortcut icon" href="../../assets/imagenes/LOGO FINAL.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Favicon - FIS -->
    <link rel="shortcut icon" href="../../assets/imagenes/LOGO FINAL.png">

    <link rel="stylesheet" href="../../assets/css/main.css">

	<link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Datos de la organizacion</h3></div>
                                    <div class="card-body">
                                        <form class="col s12">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Años de experiencia</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Nombre de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Segla de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Nit de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Cargo en la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Naturaleza de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Clase de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>  
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">ciudad de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Departamento e la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Direccion de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Telefono de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Pagina de la organizacion</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput2" required>
                                            </div>    
                                            <div class="mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" id="registro" value="Registrar" name ="submit"/>
                                            </div>             

                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
       <br>
        <script src="../../public/js/jquery-3.3.1.min.js"></script>
        <script src="../../public/js/popper.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="js/encuestas.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

