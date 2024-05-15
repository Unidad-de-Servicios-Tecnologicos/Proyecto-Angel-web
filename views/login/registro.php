<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                <div class="">
                    <!-- Button INICIO DE SESION -->
                    <button type="button" class="btn bg-white text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <b>INICIO DE SESION</b>
                    </button>

                    <!-- Modal -->
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Inicio de sesion</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form name="form" action="includes/login.php" id="loginForm" onsubmit="return isvalid()" method="POST">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="user" name="user" type="text" placeholder="nombre@sena.edu.co" required/>
                                        <label for="inputEmail">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="pass" name="pass" type="password" placeholder="Password" required/>
                                        <label for="inputPassword">Contraseña</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="recuperarcontraseña.php">Recuperar contraseña</a>
                                        <input class="btn btn-primary" type="submit" id="btn" value="Inicio" name = "submit"/>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </nav>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear usuario</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Apellido</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">Cedula</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Numero fijo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Numero celular</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword6" type="password" placeholder="Crear contraseña" aria-describedby="passwordHelpInline"/>
                                                <label for="inputPassword6">Contraseña</label>
                                                <div class="col-auto">
                                                    <span id="passwordHelpInline" class="form-text">
                                                    Must be 8-20 characters long.
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" id="registro" value="Registrar" name = "submit"/>
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