
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="js/navbar.js">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  




  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark "style='background-color: #00324D';>
    <a href="../../index.php" class="nav-logo">
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
          <a href='../../includes/cerrar_sesion.php' class='btn btn-danger' type="button" style='margin-left: 10px'><i class="fa fa-power-off fa-lg"></i></a>
        </div>
      </li>

    </ul>




  </div>
</nav>










