<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['id_usuario']) && isset($_POST['telefono']) && isset($_POST['celular']) && isset($_POST['email']) && isset($_POST['clave'])) {
        // Incluir archivo de conexión a base de datos
        include("conexion.php");

        // Obtener valores
        $nombre          = $_POST['nombres'];
        $apellido        = $_POST['apellidos'];
        $cedula          = $_POST['id_usuario'];
        $numerofijo      = $_POST['telefono'];
        $celular         = $_POST['celular'];
        $correo          = $_POST['email'];
        $contraseña      = $_POST['clave'];

        $id_tipo_usuario = 2;

        // Preparar la consulta
        $query = "INSERT INTO usuarios (id_usuario, clave, nombres, apellidos, email, id_tipo_usuario, telefono, celular) 
                  VALUES ('$cedula','$contraseña','$nombre','$apellido','$correo','$id_tipo_usuario','$numerofijo','$celular')";

        // Ejecutar la consulta
        if ($con->query($query) === TRUE) {
            header("Location: ../views/login/registro.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $con->error;
        }

        // Cerrar la conexión
        $con->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>



