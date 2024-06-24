<?php

  	require "../../includes/conexion.php";

  	$id_encuesta = $_GET['id_encuesta'];
 	$query2 = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
  	$respuesta2 = $con->query($query2);

  	$query3 = "SELECT encuestas.titulo, encuestas.descripcion, preguntas.id_pregunta, preguntas.id_encuesta, preguntas.id_tipo_pregunta 
		FROM preguntas
		INNER JOIN encuestas
		ON preguntas.id_encuesta = encuestas.id_encuesta
		WHERE preguntas.id_encuesta = '$id_encuesta'";
	$respuesta3 = $con->query($query3);
	$row3 = $respuesta3->fetch_assoc();


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

  <title>Sistema de encuestas</title>
</head>
<body>


	
<?php
    require '../templates/navbar.php';
?>
  	
  	<center>
 	<div class="container text-center">
 		<hr /> 
 		<h1 class="text-info"><?php echo $row3['titulo'] ?></h1>
 		<p><?php echo $row3['descripcion'] ?></p>
 		<form action="procesar.php" method="Post" autocomplete="off">


 		<input type="hidden" id="id_encuesta" name="id_encuesta" value="<?php echo $id_encuesta ?>" />

 		<hr />
 		<?php

 			$i = 1; 
			while (($row2 = $respuesta2->fetch_assoc())) {

			$id = $row2['id_pregunta'];

			$query = "SELECT preguntas.id_pregunta, preguntas.titulo, preguntas.id_tipo_pregunta, opciones.id_opcion, opciones.valor
				FROM opciones
				INNER JOIN preguntas
				ON preguntas.id_pregunta = opciones.id_pregunta
                WHERE preguntas.id_pregunta = $id
				ORDER BY opciones.id_pregunta, opciones.id_opcion";

			$respuesta = $con->query($query);

		 ?>
		 	<div class="card">
			 <div class="card-header text-info"><?php echo "$i. " . $row2['titulo'] ?></div>
			<div class="card-body card-description">
			
		<?php 
			while (($row = $respuesta->fetch_assoc())) {

		 ?>
			<div class="radio" align="left"; style="margin-left: 5%";>
		      <label><input class="form-check-input" type="radio" name="<?php echo $row['id_pregunta'] ?>" value="<?php echo $row['id_opcion'] ?>" required> <?php echo $row['valor'] ?></label>
		    </div>

		
		<?php 	
			}
			$i++;
		?>
		</div>
		</div>


		<?php
		}
		 ?>
		 	
		<br/>
		<a href="index.php" class="btn btn-primary">Regresar</a>
		
		</form>
 	</div>
	</center>


    
  	<!-- Optional JavaScript -->
  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../../public/js/jquery-3.3.1.min.js"></script>
  	<script src="../../public/js/popper.min.js"></script>
  	<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>