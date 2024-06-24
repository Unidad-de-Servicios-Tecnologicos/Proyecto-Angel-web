<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="../../assets/imagenes/LOGO FINAL.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">
    
</head>

<style>
    .warn-alert {
        width: auto;         
        color: #ff4d4d;
        margin: 10px 0;
}

</style>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark nav">
        <div class="container">
                <a href="../../index.php" class="nav-logo">
                    <img src="../../assets/imagenes/Logo Angel - Color_b_n-01.png" alt="Logo de la empresa">
                </a>
                <div class="">
                    <!-- Button INICIO SESION -->
                    <a href="login.php" class="btn bg-white text-dark" role="button""><b>INICIO DE SESION</b></a>
                </div>
        </div>
    </nav>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 overflow-auto">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear usuario</h3></div>
                                    <div class="card-body overflow-auto">
                                        <form action="../../includes/registrar.php" id="onRegister" class='overflow-auto' method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="inputFirstName" id="inputFirstName" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">Nombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="inputLastName" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="id" id="id" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">Cedula</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="phone" id="inputLastName" type="text" placeholder="Enter your last name"/>
                                                        <label for="inputLastName">Numero fijo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="phoneNumber" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Numero celular</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputEmail" id="inputEmail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword6" type="password" placeholder="Crear contraseña" aria-describedby="passwordHelpInline" required/>
                                                <label for="inputPassword6">Contraseña</label>
                                                <div class="col-auto">
                                                    <span id="passwordHelpInline" class="form-text">
                                                    Debe tener entre  8 y 100 Caracteres.
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" id="registro" value="Registrar" name ="submit"/>
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
        <!-- <script src="js/scripts.js"></script> -->
        <script src="../../public/js/register.js"></script>
    </body>
</html>

<?php

include_once '../templates/footer.php';

?>