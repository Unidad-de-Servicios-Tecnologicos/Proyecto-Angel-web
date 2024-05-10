<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angel</title>
    <link rel="shortcut icon" href="assets/images/LOGO FINAL.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="index.php" class="nav-logo">
                <img src="assets/images/Logo Angel - Color_b_n-01.png" alt="Logo de la empresa">
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
                            <form name="form" action="includes/login.php" onsubmit="return isvalid()" method="POST">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="user" name="user" type="text" placeholder="nombre@sena.edu.co" />
                                    <label for="inputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="pass" name="pass" type="password" placeholder="Password" />
                                    <label for="inputPassword">Contraseña</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="inputRememberPassword">Recordar contraseña</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="password.html">Recuperar contraseña</a>
                                    <input class="btn btn-primary" type="submit" id="btn" value="Inicio" name = "submit"/>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Button REGISTRO -->
                <a href="views/Login/registro.php" class="btn bg-white text-dark" role="button""><b>REGISTRO</b></a>
                

                
            </div>
        </div>
    </nav>
<br>
    <div class="quienessomos container">
        <h1 class="quienessomosh1">Quienes somos</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, totam, nostrum hic neque possimus rem exercitationem, tenetur dolore recusandae quos reprehenderit! Sunt enim distinctio unde aliquam eius. Cumque, voluptas vero.
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, totam, nostrum hic neque possimus rem exercitationem, tenetur dolore recusandae quos reprehenderit! Sunt enim distinctio unde aliquam eius. Cumque, voluptas vero
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, totam, nostrum hic neque possimus rem exercitationem, tenetur dolore recusandae quos reprehenderit! Sunt enim distinctio unde aliquam eius. Cumque, voluptas vero.
        </p>

    </div>


    <div class="quienessomos container">
    <div class="image-row">
        <img src="assets/images/Logo Angel - Color_b_n-01.png" alt="Imagen 1">
        <img src="assets/images/Logo Angel - Color_b_n-01.png" alt="Imagen 2">
        <img src="assets/images/Logo Angel - Color_b_n-01.png" alt="Imagen 3">
    </div>
    </div>

<br>

    <footer>
        <div class="footer-content">
            <p>© 2024 Mi Sitio Web. Todos los derechos reservados.</p>
            <p>Realizado por
            <a class="nav-logo">
                <img src="assets/images/Logo_Sena_Servicio_tecnológico_.png" alt="Logo dela ust">
            </a>
            </p>
            
        </div>
    </footer>

    <!-- validacion registro -->
    <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" El campo de email y contraseña se encuentra vacío!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" El campo de email se encuentra vacío!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" El campo de contraseña se encuentra vacío!!!");
                    return false;
                }
                
            }
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>