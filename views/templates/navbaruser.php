
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="js/navbar.js">
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
 



  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark "style='background-color: #00324D';>
    <a href="../usuario/index.php" class="nav-logo">
      <img src="../../assets/imagenes/Logo Angel - Color_b_n-01.png" alt="Logo de la empresa">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        
      
    </ul>
      <ul class="navbar-nav ">
      

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>

          <?php   
            session_start(); 
              if (isset($_SESSION['u_usuario'])) {
                echo "Bienvenid@ " .$_SESSION['u_usuario'] . "\t";} 
          ?>
        </b></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambio de contraseña</a>
          <a class="dropdown-item" href="../usuario/cuenta.php">Datos organizacion</a>
          <a href='../../includes/cerrar_sesion.php' class='btn btn-danger' type="button" style='margin-left: 10px'><i class="fa fa-power-off fa-lg"></i></a>
        </div>
      </li>

    </ul>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../includes/cambiodecontraseña.php">
        <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Contraseñas</label>
        </div>
        <div class="col-auto">
          <input type="password" id="clave" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Debe tener entre 8 y 20 caracteres.
          </span>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>



  </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>






