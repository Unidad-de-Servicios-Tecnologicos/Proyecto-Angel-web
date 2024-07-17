<?php

date_default_timezone_set("America/Lima");
$date = new DateTime();

$fecha_inicio = $date->format('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <!-- Favicon - FIS -->

  <link rel="stylesheet" href="../../assets/css/main.css">

  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">

  <link rel="shortcut icon" href="../../assets/imagenes/LOGO FINAL.png">

  <title>ADMINISTRADOR</title>

  <script type="text/javascript" language="javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
      history.go(1);
    };
  </script>

</head>

<style>
  .a-tag,
  .a-tag:hover {
    text-decoration: none;
    color: white;
  }
</style>

<body>

  <?php
  require '../templates/navbar.php';
  ?>

  <!-- Content Section -->
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-12 row-1">
        <div class="col-md-10 col-xs-12">
          <h3>SISTEMA DE ENCUESTAS</h3>
        </div>
        <br>
        <br>
        <div class="col-12 row">
          <button class="btn btn-success col-6" id="boton_agregar">
            <b>Agregar Encuesta</b>
          </button>
          <button class="btn btn-primary col-6">
            <a href="../user-management/users/index.php" class="a-tag">Información de usuarios</a>
          </button>
        </div>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <h4>Encuestas:</h4>
        <div class="table-responsive">
          <div id="tabla_encuestas"></div>
        </div>
      </div>
    </div>
  </div>



  <!-- /Content Section -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/popper.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="js/encuestas.js"></script>

</body>

</html>

<!-- Modal Agregar Nueva Encuesta -->
<div class="modal fade" id="modal_agregar" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Agregar Nueva Encuesta</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group row">
          <label for="titulo" class="col-sm-3 col-form-label">Título</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="titulo" placeholder="Título" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="fecha_final" value="<?php echo $fecha_inicio ?>" autocomplete="off">
            <p>Fomato: año-mes-día horas:minutos:segundos</p>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="agregarEncuesta()">Agregar Encuesta</button>
        <input type="hidden" id="hidden_id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
      </div>

    </div>
  </div>
</div>

<!-- Modal Modificar Producto -->
<div class="modal fade " id="modal_modificar" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Modificar Producto</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group row">
          <label for="modificar_titulo" class="col-sm-3 col-form-label">Título</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="modificar_titulo" placeholder="Título">
          </div>
        </div>

        <div class="form-group row">
          <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="modificar_descripcion" placeholder="Descripción"></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="fecha_final" class="col-sm-3 col-form-label">Fecha Final</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="modificar_fecha_final" placeholder="Fecha de Cierre" autocomplete="off" value="<?php echo $fecha_inicio ?>">
            <p>Fomato: año-mes-día horas:minutos:segundos</p>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="modificarDetallesEncuesta()">Modificar Encuesta</button>
        <input type="hidden" id="hidden_id_encuesta">
      </div>

    </div>
  </div>
</div>