<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="shortcut icon" href="../../assets/images/LOGO FINAL.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark nav">
        <div class="container">
                <a href="../../index.php" class="nav-logo">
                    <img src="../../assets/images/Logo Angel - Color_b_n-01.png" alt="Logo de la empresa">
                </a>
        </div>
    </nav>
        <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Recuperar contraseña</h3></div>
                                        <div class="card-body">
                                            <div class="small mb-3 text-muted">Ingrese su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña.</div>
                                            <form>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                    <label for="inputEmail">Email</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="small" href="../../index.php">Volver a iniciar sesión</a>
                                                    <a class="btn btn-primary" href="login.html">Restablecer contraseña</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
        </div>
        <br>
            
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php

include_once '../templates/footer.php';

?>