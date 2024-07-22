<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro de usuario</title>
  <link rel="shortcut icon" href="../../assets/imagenes/LOGO FINAL.png">
  <link rel="stylesheet" type="text/css" href="../../assets/css/styles2.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/login.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<style>
    .warn-alert {
        width: auto;         
        color: #ff4d4d;
        margin: 10px 0;

        
}
</style>


<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>PROYECTO ANGEL</h1>
        </div>

        <div class="formbg-outer">
          <div class="formbg2">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">REGISTRO DE USUARIO</span>
                    <form class="form-signin" action="../../includes/registrarUsuario.php" id="onRegister" method="POST" >
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="nombres" id="nombres" type="text" required/>
                                    <label for="nombres">Nombres</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" name="apellidos" id="apellidos" type="text" required/>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="id_usuario" id="id_usuario" type="text" required/>
                                    <label for="id_usuario">Cedula</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" name="telefono" id="telefono" type="text" required/>
                                    <label for="telefono">Numero fijo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" name="celular" id="celular" type="text" required/>
                                    <label for="celular">Numero celular</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" autocomplete="off" required/>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="clave" id="clave" type="password" aria-describedby="clave" required/>
                            <label for="clave">Contraseña</label>
                            <div class="col-auto">
                              <span id="clave" class="form-text">
                                Debe tener entre  8 y 100 Caracteres.
                              </span>
                            </div>     
                        </div>       
                        <div class="mt-4 mb-0">
                            <center><button class="btn btn-primary" type="submit">Guardar</button></center>
                        </div>
                        <br>
                        <div class="reset-pass">
                              <a href="../../index.php">Inicio</a>
                              <a href="login.php">Inicio de sesion</a>
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
	<!-- js -->
<script src="../../public/js/register.js"></script>
</html>


